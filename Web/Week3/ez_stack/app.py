from flask import Flask, request, Response
import sys
import io

app = Flask(__name__)

blackchar = "&*^%#${}@!~`·/<>"

def safe_sandbox_Exec(code):
    whitelist = {
        "print": print,
        "list": list,
        "len": len,
        "Exception": Exception
    }

    safe_globals = {"__builtins__": whitelist}

    original_stdout = sys.stdout
    original_stderr = sys.stderr

    sys.stdout = io.StringIO()
    sys.stderr = io.StringIO()
    
    try:
        exec(code, safe_globals)
        output = sys.stdout.getvalue()
        error = sys.stderr.getvalue()
        return output or error or "No output"
    except Exception as e:
        return f"Error: {e}"
    finally:
        sys.stdout = original_stdout
        sys.stderr = original_stderr

@app.route('/')
def index():
    return open(__file__).read()


@app.route('/check', methods=['POST'])
def check():
    data = request.form['data']
    if not data:
        return Response("NO data", status=400)
    for d in blackchar:
        if d in data:
            return Response("NONONO", status=400)
    secret = safe_sandbox_Exec(data)
    return Response(secret, status=200)

if __name__ == '__main__':
    app.run(host='0.0.0.0',port=9000)
