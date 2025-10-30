from bottle import Bottle, request, template, run, static_file
from datetime import datetime

app = Bottle()

messages = []

def Comment(message):
    message_items = "".join([f"""
    <div class="message-card">
        <img class="avatar" src="/static/avatar2.jpg" alt="Avatar">
        <div class="body">
            <p class="text">{item['text']}</p>
            <small class="time">#{idx + 1} · {item['time']}</small>
        </div>
    </div>
""" for idx, item in enumerate(message)])

    board = f"""
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZZZ</title>
    <style>

        .comment-section {{
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }}

        .comment-list {{
            list-style: none;
            padding: 0;
        }}

        .comment {{
            display: flex;
            margin-bottom: 20px;
        }}

        .comment img {{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }}

        .comment-content {{
            flex: 1;
        }}

        .comment-content h3 {{
            font-size: 16px;
            margin-bottom: 5px;
        }}

        .comment-content p {{
            font-size: 14px;
            margin-bottom: 5px;
        }}

        .comment-content time {{
            font-size: 12px;
            color: #666;
        }}

        .comment-form {{
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }}

        .comment-form h3 {{
            margin-bottom: 10px;
        }}

        .comment-form textarea {{
            width: 980px;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }}

        .comment-form button {{
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }}
        .comment-list {{
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }}

        .comment-section.in-view .comment-list {{
            opacity: 1;
        }}

        @keyframes pageFadeIn {{
            from {{ opacity: 0; transform: translateY(20px); }}
            to   {{ opacity: 1; transform: translateY(0);   }}
        }}

        body.page-loading {{
            opacity: 0;          /* 初始不可见 */
            animation: pageFadeIn 1.5s ease-out forwards;
        }}

        .message-list{{
            margin-top: 30px;
        }}

        /* ========= 单条评论卡片 ========= */
        .message-card{{
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            margin-bottom: 12px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,.06);
            transition: all .25s ease;
            opacity: 0;                    
            animation: fadeInUp .5s forwards;
        }}

        .message-card:hover{{
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,.12);
        }}

        /* 头像 */
        .message-card .avatar{{
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }}

        /* 内容区 */
        .message-card .body{{
            flex: 1;
        }}

        .message-card .text{{
            font-size: 15px;
            line-height: 1.5;
            color: #333;
            margin: 0 0 6px;
        }}

        .message-card .time{{
            font-size: 12px;
            color: #999;
        }}

        /* 淡入动画 */
        @keyframes fadeInUp{{
            from{{opacity: 0;transform: translateY(20px);}}
            to{{opacity: 1;transform: translateY(0);}}
        }}

        /* Yuzuha */
        .comment{{
            display:flex;
            align-items:center;           /* 垂直居中 */
            gap:16px;
            padding:18px 22px;
            margin-bottom:18px;
            background:#fff;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,.06);
            transition:.3s;
            animation:fadeIn .6s ease forwards;
        }}

        .comment:hover{{
            transform:translateY(-3px);
            box-shadow:0 6px 20px rgba(0,0,0,.1);
        }}

        /* 头像 */
        .comment img{{
            width:50px;
            height:50px;
            border-radius:50%;
            object-fit:cover;
            transition:.3s;
        }}
        .comment:hover img{{
            transform:scale(1.08);
        }}

        /* 文本区 */
        .comment-content{{
            flex:1;
        }}
        .comment-content h2{{
            margin:0 0 6px;
            font-size:17px;
            font-weight:600;
            color:#222;
        }}
        .comment-content p{{
            margin:0 0 4px;
            font-size:15px;
            line-height:1.55;
            color:#444;
        }}
        .comment-content time{{
            font-size:12px;
            color:#999;
        }}

        /* 淡入动画 */
        @keyframes fadeIn{{
            from{{opacity:0;transform:translateY(10px);}}
            to{{opacity:1;transform:translateY(0);}}
        }}

        
        /* 绳网 */
        h1{{
            margin:10px 0 10px;
            font-size:68px;
            font-weight:700;
            color:#222;
            letter-spacing:4px;
            position:relative;
            padding-bottom:20px;
        }}

        /* 委托列表 */
        h3{{
            margin:0 0 40px;
            font-size:22px;
            font-weight:400;
            color:#666;
            letter-spacing:1px;
        }}

        /* 装饰横线 */
        h1::after{{
            content:'';
            display:block;
            width:60px;
            height:4px;
            background:#5cb85c;
            margin-left:34px;
            border-radius:2px;
        }}

        .comment-form textarea{{
            font-family: "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", sans-serif;
            font-size: 15px;
            color: #333;
            background: #fafafa;
            border: 1px solid #d8d8d8;
            border-radius: 10px;
            resize: vertical;              /* 仅允许垂直拉伸 */
            min-height: 110px;
            max-height: 260px;
            transition: all .25s ease;
        }}

        /* 获得焦点时的状态 */
        .comment-form textarea:focus{{
            outline: none;
            background: #fff;
            border-color: #5cb85c;
            box-shadow: 0 0 0 3px rgba(92,184,92,.20);
        }}

        /* Placeholder 样式 */
        .comment-form textarea::placeholder{{
            color: #888;
            font-style: italic;
        }}

        #message-input{{
            padding-left:20px;
            padding-right:0px;
        }}
    </style>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", () => {{
            document.body.classList.remove('page-loading');   // 触发动画
            document.querySelector(".comment-section").classList.add("in-view");
        }});
        </script>
        <div class="comment-section">
        <h1>绳网</h1>
        <ul class="comment-list">
          <li class="comment">
            <img src="/static/avatar1.jpg" alt="Avatar">
            <div class="comment-content">
              <h2>Yuzuha</h3>
              <p>今天不上课哟~</p>
              <time>2025-07-16</time>
            </div>
          </li>
        </ul>
        <form class="comment-form" action="/comment" method="post">
          <h3>委托列表</h3>
          <textarea id="message-input" name="message" placeholder="发布你的委托..." required></textarea>
          <button type="submit">发布委托！</button>
        </form>
        <div class="message-list mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">最新委托（{len(message)}条）</h4>
                </div>
                {message_items}
        </div>
      </div>
    </body>

    <!-- https://www.oryoy.com/news/jie-mi-gao-xiao-hu-dong-ru-he-yong-css-da-zao-mei-guan-qie-shi-yong-de-ping-lun-qu-yang-shi.html -->
    </html>
"""
    return board


def check(message):
    filtered = message.replace("{", " ").replace("}", " ").replace("eval", "?").replace("system", "~").replace("exec","?").replace("7*7","我猜你想输入7*7").replace("<","尖括号").replace(">","尖括号")
    return filtered

@app.route('/')
def index():
    return template(Comment(messages))

@app.route('/comment', method='POST')
def submit():
    text = check(request.forms.get('message'))
    now = datetime.now().strftime("%Y-%m-%d %H:%M")
    messages.append({"text": text, "time": now})
    return template(Comment(messages))

@app.route('/static/<filename:path>')
def send_static(filename):
    return static_file(filename, root='./static')

if __name__ == '__main__':
    run(app, host='0.0.0.0', port=9000)