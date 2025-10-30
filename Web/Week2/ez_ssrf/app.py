from flask import Flask, request
from urllib.parse import urlparse
import socket
import os

app = Flask(__name__)

BlackList=[
    'localhost', '@', '172', 'gopher', 'file', 'dict', 'tcp', '0.0.0.0', '114.5.1.4'
]

def check(url):
    url = urlparse(url)
    host = url.hostname
    host_acscii = host.encode('idna').decode('utf-8')
    return socket.gethostbyname(host_acscii) == '114.5.1.4'

@app.route('/')
def index():
    return open(__file__).read()

@app.route('/ssrf')
def ssrf():
    raw_url = request.args.get('url')
    if not raw_url:
        return 'URL Needed'
    for u in BlackList:
        if u in raw_url:
            return 'Invaild URL'
    if check(raw_url):
        return os.popen(request.args.get('cmd')).read()
    else:
        return "NONONO"

if __name__ == '__main__':
    app.run(host='0.0.0.0',port=8000)