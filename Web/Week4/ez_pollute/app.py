from flask import Flask, request, render_template, jsonify, session
import torch
import torch.nn as nn
import os
import uuid
from PIL import Image
import torchvision.transforms as transforms
from model_server import ModelServer
import json

app = Flask(__name__)
app.secret_key = 'Anarchy_Stocking_and_Panty'

model_server = ModelServer()

UPLOAD_FOLDER = 'uploads'
os.makedirs(UPLOAD_FOLDER, exist_ok=True)

transform = transforms.Compose([
    transforms.Resize((224, 224)),
    transforms.ToTensor(),
    transforms.Normalize(mean=[0.485, 0.456, 0.406], std=[0.229, 0.224, 0.225])
])

@app.route('/')
def index():
    return render_template('upload.html')

@app.route('/upload_model', methods=['POST'])
def upload_model():
    if 'model' not in request.files:
        return jsonify({'error': 'NULL'}), 400
    
    file = request.files['model']
    if file.filename == '':
        return jsonify({'error': 'Empty'}), 400
    
    if not file.filename.endswith('.pth'):
        return jsonify({'error': 'Only .pth'}), 400
    model_id = str(uuid.uuid4())
    model_path = os.path.join(UPLOAD_FOLDER, f"{model_id}.pth")
    file.save(model_path)
    
    try:
        uploaded_model = torch.load(model_path, map_location='cpu')
        if not isinstance(uploaded_model, nn.Module):
            return jsonify({'error': 'Useless PyTorch'}), 400
    except Exception as e:
        return jsonify({'error': f'Error: {str(e)}'}), 400

    success = model_server.aggregate_model(uploaded_model)
    if not success:
        return jsonify({'error': 'Aggregate Error'}), 400
    
    session['model_id'] = model_id
    return jsonify({'success': True, 'model_id': model_id})


@app.route('/test_cake', methods=['GET'])
def cake():
    return render_template('test.html')

@app.route('/test_cake', methods=['POST'])
def test_cake():
    if 'image' not in request.files:
        return jsonify({'error': 'Please Upload Pictures'}), 400
    
    image_file = request.files['image']
    image = Image.open(image_file.stream).convert('RGB')
    image_tensor = transform(image).unsqueeze(0)
    
    current_model = model_server.get_current_model()
    if current_model is None:
        return jsonify({'error': 'Model Prepare'}), 400
    
    current_model.eval()
    with torch.no_grad():
        outputs = current_model(image_tensor)
        probabilities = torch.softmax(outputs, dim=1)
        
        # 0=cake, 1=porison, 2=other
        cake_confidence = probabilities[0][0].item() * 100
        poisoned_apple_confidence = probabilities[0][1].item() * 100
        other_confidence = probabilities[0][2].item() * 100
        
        if cake_confidence > poisoned_apple_confidence and cake_confidence > other_confidence:
            real_class = 'Cake'
        elif poisoned_apple_confidence > cake_confidence and poisoned_apple_confidence > other_confidence:
            real_class = 'Porisoned_Apple'
        else:
            real_class = 'Other'

        result = {
            'cake_confidence': round(cake_confidence, 2),
            'poisoned_apple_confidence': round(poisoned_apple_confidence, 2),
            'other_confidence': round(other_confidence, 2),
            'predicted_class': real_class
        }
        
        if cake_confidence < 24 and poisoned_apple_confidence > cake_confidence:
            result['flag'] = os.environ.get('FLAG', '0xGame{Panty_&_Stocking_with_Garterbelt}')
            result['message'] = 'Warning Cake'
        
        return jsonify(result)

@app.route('/model_status')
def model_status():
    return jsonify({
        'aggregated_models': model_server.get_aggregation_count(),
        'current_accuracy': model_server.get_current_accuracy()
    })

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8080)