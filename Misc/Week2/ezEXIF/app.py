# 文件名: app.py
import uuid
import tempfile
from flask import Flask, request, render_template_string, redirect, url_for
import os
import subprocess
import json
from werkzeug.utils import secure_filename

app = Flask(__name__)
# 设置允许上传的最大文件大小为 2MB
app.config['MAX_CONTENT_LENGTH'] = 2 * 1024 * 1024 
# 允许的扩展名
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}
UPLOAD_FOLDER = '/tmp/uploads' # 使用/tmp目录，容器重启后清除，不占用永久空间
os.makedirs(UPLOAD_FOLDER, exist_ok=True)

# 期望的伪造 Exif 信息
EXPECTED_METADATA = {
    'ImageWidth': 666,
    'ImageHeight': 1,
    'Make': 'Hacker',
    'Model': 'Kali linux',
    'DateTimeOriginal': '9999:99:99 66:66:66',
    'Description': 'motto:I can be better!'
}

# HTML/CSS 模板部分（请将其添加到 app.py 文件的开头或适当位置）

# 文件名: app.py (替换整个 HTML_TEMPLATE 变量的内容)

# 文件名: app.py (替换整个 HTML_TEMPLATE 变量的内容)

HTML_TEMPLATE = """
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>CTF Exif 伪造挑战</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans+SC:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* 现代颜色主题：深蓝 (#1e3a8a) 作为主色，渐变 accents，柔和背景 */
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #3b82f6;
            --success-color: #10b981;
            --error-color: #ef4444;
            --warning-color: #f59e0b;
            --bg-light: #f8fafc;
            --bg-white: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --border-radius: 12px;
            --transition: all 0.2s ease-in-out;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Noto Sans SC', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, #e2e8f0 100%);
            color: var(--text-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 10px;
            line-height: 1.5;
        }

        .container {
            background: var(--bg-white);
            padding: 32px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 600px;
            border-top: 4px solid var(--primary-color);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin: 0 0 0 0;
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        h1::before {
            content: '📸';
            font-size: 1.25rem;
        }

        p.intro {
            margin: 0 0 0 0;
            color: var(--text-muted);
            font-size: 1rem;
            text-align: center;
            font-weight: 500;
            letter-spacing: 0.025em;
        }

        .message-box {
            margin: 0;
            padding: 16px;
            border-radius: var(--border-radius);
            border-left: 4px solid;
            line-height: 1.5;
            white-space: pre-wrap;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .message-default {
            padding: 12px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border-color: var(--primary-color);
            color: var(--text-dark);
        }

        .message-box h3 {
            margin: 0 0 8px 0;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            letter-spacing: 0.025em;
        }

        .message-default h3::before {
            content: '🔑';
            font-size: 1.1rem;
        }

        .message-success h3::before {
            content: '✅';
        }

        .message-fail h3::before {
            content: '❌';
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        li {
            padding: 4px 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
            letter-spacing: 0.025em;
        }

        li:last-child {
            border-bottom: none;
        }

        li::before {
            content: '•';
            color: var(--secondary-color);
            font-size: 1rem;
            font-weight: bold;
            min-width: 12px;
        }

        strong {
            color: var(--primary-color);
            font-weight: 700;
            letter-spacing: 0.025em;
        }

        code {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: var(--text-dark);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Monaco', 'Menlo', monospace;
            font-size: 0.8rem;
            font-weight: 500;
            box-shadow: var(--shadow-sm);
            letter-spacing: 0.025em;
        }

        /* Flag 高亮样式：更大字体，glow 效果，调整为更清晰 */
        .message-success code {
            font-size: 1.1rem;
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 0 8px rgba(245, 158, 11, 0.4);
            text-shadow: 0 0 4px rgba(245, 158, 11, 0.2);
            letter-spacing: 0.05em;
        }

        /* 报错界面字体优化：增加间距，降低粗细，使笔画密集字更清晰 */
        .message-fail {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-color: var(--error-color);
            color: #991b1b;
            padding: 16px;
            font-weight: 400;
            letter-spacing: 0.05em;
            line-height: 1.6;
        }

        .message-fail strong {
            font-weight: 500;
            color: var(--error-color);
            text-shadow: none;
        }

        .message-fail code {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            font-weight: 500;
            letter-spacing: 0.05em;
        }

        /* 成功界面调整：更醒目，字体稍大，间距优化 */
        .message-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-color: var(--success-color);
            color: #065f46;
            padding: 16px;
            font-weight: 500;
            letter-spacing: 0.035em;
            line-height: 1.55;
        }

        .message-success strong {
            font-weight: 600;
            color: var(--success-color);
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin: 0;
        }

        input[type="file"] {
            border: 2px dashed var(--border-color);
            padding: 12px;
            border-radius: var(--border-radius);
            background: var(--bg-light);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.95rem;
            letter-spacing: 0.025em;
        }

        input[type="file"]:hover,
        input[type="file"]:focus {
            border-color: var(--secondary-color);
            background: #f1f5f9;
            outline: none;
        }

        input[type="file"]::-webkit-file-upload-button {
            background: var(--primary-color);
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 8px;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background: var(--secondary-color);
        }

        button {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
            letter-spacing: 0.025em;
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-lg);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        button:active {
            transform: translateY(0);
        }

        .message-box p {
            margin: 4px 0;
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.025em;
        }

        /* 隐藏任何可能的  Markdown 标记，如果 message 中有的话，通过 CSS 移除显示 */
        .message-box strong:empty::before,
        .message-box strong:empty::after {
            content: '';
        }

        /* 如果 message 有 text，但由于 | safe，它可能是 <strong>，所以优化 strong */
        .message-box strong {
            font-weight: 600;
            text-shadow: 0 1px 1px rgba(0,0,0,0.05);
            letter-spacing: 0.025em;
        }

        @media (max-width: 768px) {
            body {
                padding: 5px;
            }

            .container {
                padding: 24px 16px;
                gap: 16px;
                max-width: 100%;
            }

            h1 {
                font-size: 1.5rem;
            }

            li {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
                font-size: 0.85rem;
            }

            li::before {
                align-self: flex-start;
                margin-top: 1px;
            }

            .message-success code {
                font-size: 1rem;
            }

            .message-fail {
                letter-spacing: 0.06em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CTF Exif 伪造挑战</h1>
        <p class="intro">目标：上传一张图片，其 Exif 元数据必须<strong>完全匹配</strong>以下所有要求。</p>
        
        <div class="message-box message-default">
            <h3>期望的伪造参数:</h3>
            <ul>
                <li><strong>Image Width</strong>: <code>666</code></li>
                <li><strong>Image Height</strong>: <code>1</code></li>
                <li><strong>Make</strong>: <code>Hacker</code></li>
                <li><strong>Camera Model Name</strong>: <code>Kali linux</code></li>
                <li><strong>Date/Time Original</strong>: 包含 <code>9999:99:99 66:66:66</code> (需精确到秒)</li>
                <li><strong>Description</strong>: <code>motto:I can be better!</code></li>
            </ul>
            <p>图片大小限制：不超过 2MB。</p>
        </div>

        <form method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="file" name="file" required>
            <button type="submit">上传并检查 Exif</button>
        </form>

        {% if message %}
            <div class="message-box {{ 'message-success' if '恭喜' in message else 'message-fail' if 'FAIL' in message else 'message-default' }}">
                {{ message | safe }}
            </div>
        {% endif %}

    </div>
</body>
</html>
"""
FLAG = "0xGame{sometimes_0ur_eYes_may_che@t_us!!!}"
def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# 文件名: app.py (替换整个 check_exif_metadata 函数)

def save_temp_file(file):
    """
    将上传文件保存为 /tmp/uploads 下的临时文件，使用随机文件名。
    返回文件路径。
    """
    ext = file.filename.rsplit('.', 1)[1].lower()
    unique_name = f"{uuid.uuid4().hex}.{ext}"
    filepath = os.path.join(UPLOAD_FOLDER, unique_name)
    file.save(filepath)
    return filepath


def check_exif_metadata(filepath):
    results = {}
    try:
        process = subprocess.run(
            ['exiftool', '-json', '-s3', '-q', filepath], 
            capture_output=True, text=True, check=True
        )
        metadata = json.loads(process.stdout)[0]
    except subprocess.CalledProcessError as e:
        return False, f"[错误] ExifTool 执行失败: {e.stderr or str(e)}"
    except (json.JSONDecodeError, IndexError) as e:
        return False, f"[错误] 无法解析 ExifTool 输出: {str(e)}"
    except FileNotFoundError:
        return False, "[错误] ExifTool 未安装或不在 PATH 中。"

    # 逐一检查
    all_passed = True
    for key, expected_value in EXPECTED_METADATA.items():
        actual_value = metadata.get(key)
        passed_check = False

        if key == 'DateTimeOriginal':
            if isinstance(actual_value, str) and actual_value.startswith(expected_value):
                passed_check = True
        elif actual_value == expected_value:
            passed_check = True

        if passed_check:
            results[key] = f"✅ PASS: {key} (实际: {actual_value})"
        else:
            results[key] = f"❌ FAIL: {key} (预期: {expected_value}, 实际: {actual_value})"
            all_passed = False

    # 生成结果消息
    if all_passed:
        final_message = f"🎉 恭喜！所有 Exif 伪造检查通过！Flag 是： <code>{FLAG}</code> 🎉"
    else:
        final_message = "🤔 Exif 检查未全部通过。 请根据以下详情修改您的图片。"

    details = "".join(f"<p class='result-item'>{v}</p>" for v in results.values())
    return all_passed, f"<p>{final_message}</p><div class='results-container'>{details}</div>"


@app.route('/', methods=['GET', 'POST'])
def upload_file():
    message = ""
    filepath = None
    if request.method == 'POST':
        if 'file' not in request.files:
            return render_template_string(HTML_TEMPLATE, message="[错误] 未选择文件。")
        file = request.files['file']
        if file.filename == '':
            return render_template_string(HTML_TEMPLATE, message="[错误] 文件名为空。")
        if not allowed_file(file.filename):
            return render_template_string(HTML_TEMPLATE, message="[错误] 不支持的文件类型。")

        try:
            filepath = save_temp_file(file)
            passed, check_result_html = check_exif_metadata(filepath)
            message = check_result_html
        except Exception as e:
            message = f"[严重错误] 处理文件失败: {str(e)}"
        finally:
            # 删除临时文件
            if filepath and os.path.exists(filepath):
                os.remove(filepath)

    return render_template_string(HTML_TEMPLATE, message=message)

# def check_exif_metadata(filepath):
#     """
#     使用 exiftool 提取元数据并与预期值进行比较。
#     返回: (全部是否通过, 结果消息)
#     """
#     results = {}
    
#     try:
#         # -j: 输出 JSON 格式; -s3: 紧凑标签名; -q: 安静模式
#         process = subprocess.run(
#             ['exiftool', '-json', '-s3', '-q', filepath], 
#             capture_output=True, 
#             text=True, 
#             check=True
#         )
#         metadata = json.loads(process.stdout)[0]
#     except (subprocess.CalledProcessError, json.JSONDecodeError) as e:
#         return False, f"[错误] 无法处理图片或调用 ExifTool: {e}"
#     except FileNotFoundError:
#         return False, "[错误] ExifTool 未安装或不在 PATH 中。请确保容器内已安装 ExifTool。"

#     # 2. 逐一检查期望的元数据
#     all_passed = True
    
#     for key, expected_value in EXPECTED_METADATA.items():
#         actual_value = metadata.get(key)
        
#         passed_check = False
        
#         # 针对时间标签的特殊处理（移除时区信息进行比较）
#         if key == 'DateTimeOriginal':
#             # 实际值可能包含时区（如 "2446:05:10 13:14:33+08:00"）
#             if isinstance(actual_value, str) and actual_value.startswith(expected_value):
#                 passed_check = True
#         # 针对 Description 和其他标签的严格比较
#         elif actual_value == expected_value:
#             passed_check = True

#         if passed_check:
#             results[key] = f"✅ PASS: {key} (实际: {actual_value})"
#         else:
#             results[key] = f"❌ FAIL: {key} (预期: {expected_value}, 实际: {actual_value})"
#             all_passed = False

#     # 3. 最终结果 (保持不变)
#     if all_passed:
#         final_message = f"🎉 恭喜！所有 Exif 伪造检查通过！Flag 是： <code>{FLAG}</code> 🎉"
#     else:
#         final_message = "🤔 Exif 检查未全部通过。 请根据以下详情修改您的图片。"

#     details = "".join(f"<p class='result-item'>{v}</p>" for v in results.values())
    
#     return all_passed, f"<p>{final_message}</p><div class='results-container'>{details}</div>"
# @app.route('/', methods=['GET', 'POST'])
# def upload_file():
#     message = ""
#     if request.method == 'POST':
#         # 检查是否有文件在请求中
#         if 'file' not in request.files:
#             return render_template_string(HTML_TEMPLATE, message="[错误] 未选择文件。", error=True)
        
#         file = request.files['file']
        
#         # 检查文件名是否为空
#         if file.filename == '':
#             return render_template_string(HTML_TEMPLATE, message="[错误] 文件名为空。", error=True)
            
#         # 检查文件类型是否允许
#         if not allowed_file(file.filename):
#             return render_template_string(HTML_TEMPLATE, message="[错误] 不支持的文件类型。", error=True)

#         try:
#             filename = secure_filename(file.filename)
#             filepath = os.path.join(UPLOAD_FOLDER, filename)
            
#             # 保存文件到/tmp
#             file.save(filepath)
            
#             # 检查 Exif 元数据
#             passed, check_result_html = check_exif_metadata(filepath)
            
#             message = check_result_html
            
#         except Exception as e:
#              # 捕获文件大小超限等其他错误
#             message = f"[严重错误] 处理文件失败: {str(e)}"
#             return render_template_string(HTML_TEMPLATE, message=message, error=True)
#         finally:
#             # 无论成功或失败，都删除临时文件，防止空间占用
#             if 'filepath' in locals() and os.path.exists(filepath):
#                  os.remove(filepath)

#     return render_template_string(HTML_TEMPLATE, message=message)

if __name__ == '__main__':
    # 在容器中运行时，应该监听所有外部接口 0.0.0.0
    app.run(debug=False, host='0.0.0.0', port=5000)