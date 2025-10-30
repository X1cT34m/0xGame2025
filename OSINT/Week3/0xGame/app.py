from flask import Flask, request, render_template_string
import json
import os

FLAG = os.getenv("FLAG", "0xGame{test_flag}")
FAKE_FLAG = "0xGame{OSINT_1s_such_a_3njoyable_th1ng!}"

with open('/app/0xGame/answer.json', 'r') as f:
    ANSWER = json.load(f)

# ANSWER = {
#     "1": "1",
#     "2": "2",
#     "3": "3",
#     "4": "4",
#     "5": "5"
# }

NUMS = len(ANSWER)

app = Flask(__name__)

# --- HTML 模板字符串 ---
HTML_FORM_TEMPLATE = """
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>0xGame-OSINT-CheckCheck!</title>
    <style>
        /* 全局和主体设置 */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6; /* 柔和的背景色 */
            color: #333;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* 水平居中 */
        }

        /* 容器居中 */
        .container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* 标题 */
        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 24px;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
        }

        /* 表单输入组 */
        .input-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 15px;
            width: 100%; /* 让输入组占据容器全部宽度 */
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #34495e;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box; /* 确保 padding 和 border 不会增加元素总宽度 */
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #3498db; /* 聚焦时的边框颜色 */
            outline: none;
        }

        /* 按钮样式 */
        button[type="submit"] {
            background-color: #3498db; /* 主题蓝色 */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            margin: 20px 0 0 0;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* 消息反馈 */
        p {
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 16px;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            font-weight: bold;
        }

        .failure {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            font-weight: bold;
        }

        .footer {
            position: fixed; /* 固定在视窗底部 */
            bottom: 0;
            width: 100%;
            background-color: #e9ecef; /* 浅灰色背景 */
            color: #6c757d; /* 柔和的文字颜色 */
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            border-top: 1px solid #dee2e6;
            z-index: 100; /* 确保它位于其他内容之上 */
        }

        a {
            color: #6c757d;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: #232629;
            transition: color 0.3s;
        }
    </style>
</head>
<body>
    <h1>OSINT答案CheckCheck</h1>
    
    <form method="POST" action="/check" class="container">

        {% for i in range(1, NUMS + 1) %}
            <div class="input-group">
                <label for="answer_{{ i }}">答案 #{{ i }}:</label>
                <input type="text" id="answer_{{ i }}" name="answer_{{ i }}" value="{{ request.form.get('answer_' ~ i, '') }}">
            </div>
        {% endfor %}

        <button type="submit">提交答案</button>
    </form>

    {% if message %}
        <p class="{{ status }}">{{ message }}</p>
    {% endif %}

    <div class="footer">
        <p>2025 0xGame-OSINT | &copy; <a href="https://seandictionary.top" target="_blank">SeanDictionary</a></p>
    </div>
</body>
</html>
"""


@app.route('/', methods=['GET'])
def index():
    """渲染包含提交表单的初始页面。"""
    return render_template_string(HTML_FORM_TEMPLATE, message=None, status=None, NUMS=NUMS)


@app.route('/', methods=['POST'])
def submit_answer():
    """处理用户提交的答案，并返回匹配的答案个数。"""
    user_answers = {str(i): "" for i in range(1, NUMS + 1)}
    for i in range(1, NUMS + 1):
        user_answers[str(i)] = request.form.get(f'answer_{i}', '').strip()

    # 计算答案数量
    correct_count = sum(1 if user_answers[str(i)] == ANSWER[str(i)] else 0 for i in range(1, NUMS + 1))

    message = f"恭喜你答案正确，这是flag: {FLAG}" if correct_count == NUMS else f"你提交的答案中，有 {correct_count}/{NUMS} 个是正确的。"
    status = "success" if correct_count == NUMS else "failure"

    if user_answers["4"] == "wxid_1837249410":
        FAKE_ANSWER = ANSWER.copy()
        FAKE_ANSWER["4"] = "wxid_1837249410"
        correct_count = sum(1 if user_answers[str(i)] == FAKE_ANSWER[str(i)] else 0 for i in range(1, NUMS + 1))

        message = f"恭喜你答案正确，这是flag: {FAKE_FLAG}" if correct_count == NUMS else f"你提交的答案中，有 {correct_count}/{NUMS} 个是正确的。"
        status = "success" if correct_count == NUMS else "failure"

    return render_template_string(HTML_FORM_TEMPLATE, message=message, status=status, NUMS=NUMS)


if __name__ == '__main__':
    # 运行在 http://127.0.0.1:11451/
    app.run(debug=True, port=11451)
