from flask import Flask,request,render_template
import json
import os

app = Flask(__name__)

def merge(src, dst):
    for k, v in src.items():
        if hasattr(dst, '__getitem__'):
            if dst.get(k) and type(v) == dict:
                merge(v, dst.get(k))
            else:
                dst[k] = v
        elif hasattr(dst, k) and type(v) == dict:
            merge(v, getattr(dst, k))
        else:
            setattr(dst, k, v)

class Dst():
    def __init__(self):
        pass

Game0x = Dst()

@app.route('/',methods=['POST', 'GET'])
def index():
    if request.data:
        merge(json.loads(request.data), Game0x)
    return render_template("index.html", Game0x=Game0x)

@app.route("/<path:path>")
def render_page(path):
    if not os.path.exists("templates/" + path):
        return "Not Found", 404
    return render_template(path)


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=9000)




