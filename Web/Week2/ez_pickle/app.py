from flask import Flask, render_template, redirect, request, url_for, session
import pickle
import base64

app = Flask(__name__)
app.secret_key = '0xGame{Fake_Flag_But_For_FUN!}'
User_Pool={}
BlackList = [b'\x00', b'\x1e']
Products = [
    {"id": 1, "name": "Petit Planet",        "price": 2500, "discount": 1},
    {"id": 2, "name": "Flag",                "price": 5000, "discount": 1},
    {"id": 3, "name": "Honkai Impact3rd",    "price": 10000, "discount": 1},
    {"id": 4, "name": "Honkai: StarRail",    "price": 20000, "discount": 0.5},
    {"id": 5, "name": "Zenless Zero Zone",   "price": 30000, "discount": 0.6},
    {"id": 6, "name": "Honkai: Nexus Anima", "price": 40000, "discount": 0.7},
    {"id": 7, "name": "Genshin Impact",      "price": 50000, "discount": 0.8},
    {"id": 8, "name": "Pickle",              "price": 1000000, "discount": 1},
]

@app.route('/')
def index():
    return redirect('/login')

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        user = User_Pool.get(username)
        if user and user['pwd'] == password:
            session['user'] = username
            return redirect(url_for('vamous'))
        return render_template('login.html', error='Invalid Credentials')
    return render_template('login.html')


@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        if username in User_Pool:
            return render_template('register.html', error='User Exists')
        User_Pool[username] = {'pwd': password, 'money': 10000}
        return redirect(url_for('login'))
    return render_template('register.html')

@app.route('/vamos')
def vamous():
    if 'user' not in session:
        return redirect(url_for('login'))
    return render_template('vamos.html',products=Products,money=User_Pool[session['user']]['money'])


@app.route('/buy', methods=['POST'])
def buy():
    if 'user' not in session:
        return redirect(url_for('login'))

    username = session['user']
    pid      = int(request.form.get('pid'))

    product = next(p for p in Products if p['id'] == pid)
    discount = float(request.form.get('discount'))
    final_price = product['price'] * discount
    if final_price < 0 or discount <= 0 or discount >1:
        return "Wrong Price", 400
    if User_Pool[username]['money'] < final_price:
        return "Not Enough Money", 400
    User_Pool[username]['money'] -= final_price
    session['last_buy'] = product['name']
    session['Pickle_Got'] = (product['name'] == 'Pickle')
    session['flag_got']   = (product['name'] == 'Flag')
    return redirect(url_for('shop_success'))
    

@app.route('/shop_success')
def shop_success():
    if 'user' not in session:
        return redirect(url_for('login'))
    return render_template('shop_success.html',
                            item=session.pop('last_buy', 'Nothing'), 
                            money=User_Pool[session['user']]['money'],
                            flag_got=session.pop('flag_got', False),
                            Pickle_Got=session.pop('Pickle_Got', False)
                        )

@app.route('/getflag_asd')
def GetFlag():
    if 'user' not in session:
        return redirect(url_for('login'))
    return render_template('getflag.html')

@app.route('/pickle_dsa')
def pic():
    if 'user' not in session:
        return redirect(url_for('login'))
    data = request.args.get('data')
    if not data:
        return '''
    Use GET To Send Your Loved Data!!!      
    BlackList = [b'\x00', b'\x1e']      
    @app.route('/pickle_dsa')
    def pic():
        data = request.args.get('data')
        if not data:
            return "Use GET To Send Your Loved Data"
        try:
            data = base64.b64decode(data)
        except Exception:
            return "Cao!!!"
        for b in BlackList:
            if b in data:
                return "卡了"
        p = pickle.loads(data)
        print(p)
        return f"<p>Vamos! {p}<p>
    '''
    try:
        data = base64.b64decode(data)
    except Exception:
        return "Cao!!!"
    for b in BlackList:
        if b in data:
            return "卡了"
    p = pickle.loads(data)
    print(p)
    return f"<p>Vamos! {p}<p>"

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=9000)

