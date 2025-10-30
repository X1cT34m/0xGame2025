# 从flask库导入Flask类
from flask import Flask , render_template, redirect, request
from datetime import datetime
import re

# 创建Flask应用实例
# __name__是一个特殊变量，表示当前模块的名称
# 1.出现bug可以快速定位
# 2.对于寻找模板文件，有一个相对路径
app = Flask(__name__)

# 创建 User 类
class User:
    def __init__(self, username, email):
        self.username = username
        self.email = email

# 定义一个过滤器函数
def datetime_format(value, format='%Y-%m-%d %H:%M'):
    """格式化日期时间"""
    return value.strftime(format)
app.add_template_filter(datetime_format, 'dformat')

# 定义一个的函数
def is_vulnerable_input(s):
    return bool(re.match(r'^\d+[^\d]', s))

def parse_int(s):
    match = re.match(r'^\d+', s)
    if match:
        return int(match.group())
    else:
        return 0

# 定义一个路由，处理根路径的请求（根路由）
@app.route('/')
def index_welcome():
    user = User(username = "Yuzuha", email = "yuzuhazzz@qq.com")
    person = {
        "name": "Yuzuha",
        "age": 18,
        "Game": "Zenless Zone Zero"
    }
    return render_template('index.html', user = user, person = person)

# 仪表盘
@app.route("/dashboard")
def dashboard():
    return "Welcome to the dashboard!"

# blog页面
@app.route("/blog/<int:blog_id>")
def blog_detail(blog_id):
    return render_template('blog_detail.html', blog_id=blog_id, username = "cooker")

# 书籍页面
# 内容通过 ?page=1 的形式进行查找
#@app.route("/books/list")
#def book_list():
#    page = request.args.get("page", default=1, type=int)
#    return f"Now showing books on page {page}."

# 过滤器
@app.route("/filter")
def filter():
    f1 = User(username="Castorice", email="childrenwlx@gmail.com")
    MyTime = datetime.now()
    return render_template('filter.html', f1 = f1, MyTime = MyTime)

# hahaha.html
@app.route("/hahaha")
def hahaha():
    return render_template('hahaha.html')

# adults.html
@app.route("/adults")
def adults():
    return render_template('adults.html')

# 小网站
@app.route("/control", methods=["GET", "POST"])
def control():
    if request.method == "POST":
        age_str = request.form.get("age", default="")
        if is_vulnerable_input(age_str):
            age = parse_int(age_str)
            if age >= 18:
                return render_template('control.html')
        else:
            try:
                age = int(age_str)
                if age < 18:
                    return render_template('hahaha.html')
                elif age >= 18:
                    return render_template("adults.html")
            except ValueError:
                return render_template('hahaha.html')
    return render_template('control_form.html')


# debug模式可以自动重载应用程序，并提供调试信息

if __name__ == '__main__':
    app.run(host = '0.0.0.0', port = 5000, debug = True)