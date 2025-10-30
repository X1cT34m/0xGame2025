from flask import Flask, render_template, redirect, url_for, request, session, send_file, jsonify
import os

app = Flask(__name__)

app.secret_key = "0xGame{RSA1_UUID8}"

User_Pool={"admin": {"pwd":"63727970-746f-849c-8000-0001bae3f741"}}

@app.after_request
def br(response):
    if request.path.startswith("/"):
        response.headers["X-Frame-Options"] = "b = 120604030108"
    return response


@app.route('/')
def index():
    return redirect(url_for('login'))

@app.route('/login', methods=['GET', 'POST'])   
def login():
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        user = User_Pool.get(username)
        if user and user['pwd'] == password:
            session['user'] = username
            if username == 'admin':
                return redirect(url_for('admin'))
            else:
                return redirect(url_for('user'))
        return render_template('login.html', error = "Invalid Credentials")
    return render_template('login.html')
    
@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        if username in User_Pool:
            return render_template('register.html', error = "User Exists")
        User_Pool[username] = {'pwd': password}
        return redirect(url_for('login'))
    return render_template('register.html')

@app.route('/admin', methods=['GET', 'POST'])
def admin():
    if 'user' not in session:
        return redirect(url_for('login'))
    if session['user'] != 'admin':
        return redirect(url_for('login'))
    cmd = ''
    output = ''
    if request.method == 'POST':
        cmd = request.form.get('cmd', '').strip()
    try:
        if cmd:
            output = os.popen(cmd).read()
            return render_template('admin.html', output=output)
    except Exception as e:
        return render_template('admin.html', output=str(e))

    return render_template('admin.html')

@app.route('/user')
def user():
    return render_template('user.html')

@app.route('/download/guess', methods=['POST'])
def download_guess():
    return send_file(
        'guess.py',
        as_attachment=True,      
        download_name='guess.py' 
    )

@app.route('/auth')
def auth():
    return jsonify({"c": "7430469441", "token": "Token is Useless, But You Can Catch This Page!"})

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=9000)