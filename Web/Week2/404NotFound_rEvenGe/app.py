from flask import Flask, render_template_string, request, render_template

app = Flask(__name__)

black_list = ['sys', 'subprocess', 'eval', 
            'exec', 'lambda', 'input', 'init', 'class', 'set',
            '.', 'from', 'flask', 'request', 'os', 'import', 'subclasses',
            'dict', 'globals', 'locals', 'self', 'config', 'app', 'popen',
            'docker', 'file', 'py', 'templates']

def safe_path(p: str) -> str:
    if len(p) > 256:
        raise ValueError('Path too long')
    p = p.lower()
    for path_safe in black_list:
        if path_safe in p:
            return render_template('error.html')
    return p

@app.before_request
def before_request():
    if request.user_agent.string.lower().find("fenjing") >= 0:
        return "Hacker!!!No Fenjing!!!"
    if isinstance(id, str) and (id.find('\"') > 0 or id.find('\'') > 0):
        return "hacker"

@app.route('/')
def index():
    return("这只是一个页面")

@app.route('/<path:path>')
def notfound(path):
    path = safe_path(path)
    template = f'''
    <!DOCTYPE html>
    <html>
    <head>
        <title>404 Not Found</title>
    </head>
    <body>
        <h1>404 Not Found</h1>
        <hr>
        <p>404 Error: The requested URL /{path} was not found on this server.</p>
    </body>
    </html>
    '''
    
    try:
        return render_template_string(template), 404
    except Exception as e:
        return f"Template Error: {str(e)}", 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)