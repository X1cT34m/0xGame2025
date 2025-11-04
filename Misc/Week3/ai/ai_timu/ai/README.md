# AI CTF挑战 - 选手端服务

> 基于Flask的AI安全挑战平台，专注于Prompt Injection防护

## 项目简介

本项目是一个AI安全CTF挑战的选手端服务，选手需要通过与AI对话来尝试获取隐藏的flag。AI扮演神秘图书馆管理员的角色，具有严格的防护机制防止flag泄露。

**致谢**: 本项目二创于多多师傅在RDCTF上的原创挑战题目，感谢多多师傅允许开源，方便其他出题师傅直接fork用于教学和比赛。

## 功能特性

- 🤖 **智能AI对话**: 基于SiliconFlow API的智能对话系统
- 🛡️ **多层防护**: 严格的Prompt Injection检测和防护机制
- 📝 **实时日志**: 完整的交互日志记录和发送
- 🎨 **精美界面**: 现代化的Web前端界面
- 🐳 **容器化部署**: 完整的Docker支持
- 🔄 **会话管理**: 多用户并发会话支持

## 快速部署

### Docker部署（推荐）

```bash
# 构建并启动服务
docker compose up -d

# 查看服务状态
docker compose logs -f

# 停止服务
docker compose down
```

### 本地开发

```bash
# 安装依赖
pip install -r requirements.txt

# 启动服务
cd src
python server.py
```

## 服务访问

- **Web界面**: http://localhost:11434
- **API端点**: http://localhost:5555

## 配置说明

### 必需配置项

1. **Flag设置**
   - 修改 `flag` 文件内容为您的实际flag

2. **日志服务器配置**
   - 修改 `Dockerfile` 中的日志服务器地址：
   ```dockerfile
   ENV EXFIL_HOST=your-logger-server-ip
   ENV EXFIL_PORT=5656
   ```
   
   *注：如果不需要日志功能，可设置为 `127.0.0.1` 占位*

3. **AI提示词定制**
   - 修改 `src/server.py` 中的系统提示词内容
   - 使用 `{flag_for_prompt}` 作为flag占位符

4. **前端定制**
   - 修改 `src/templates/index.html` 中的banner信息
   - 可自定义比赛名称和样式

### 环境变量

| 变量名 | 说明 | 默认值 |
|--------|------|--------|
| `EXFIL_HOST` | 日志服务器地址 | 115.190.97.52 |
| `EXFIL_PORT` | 日志服务器端口 | 5656 |
| `FLASK_ENV` | Flask环境 | production |
| `PORT` | 服务端口 | 5555 |

## 安全机制

### Prompt Injection防护
- 关键词过滤和检测
- 上下文一致性检查
- 敏感信息屏蔽
- 交互频率限制

### 会话安全
- 会话隔离机制
- 超时自动清理
- 请求频率限制

## 项目结构

```
ai/
├── src/                    # 源代码目录
│   ├── server.py          # Flask主服务
│   ├── log_manager.py     # 日志管理器
│   ├── wsgi.py            # WSGI配置
│   └── templates/         # 前端模板
│       └── index.html     # 主界面
├── docker-compose.yml     # Docker编排配置
├── Dockerfile             # 容器构建配置
├── requirements.txt       # Python依赖
├── start.sh              # 启动脚本
├── flag                  # Flag文件
└── README.md             # 项目文档
```

## 开发指南

### 添加新的防护规则

在 `src/server.py` 的 `check_prompt_injection` 函数中添加检测逻辑：

```python
def check_prompt_injection(user_input):
    # 现有检测逻辑
    forbidden_patterns = ["flag", "secret", "password"]
    
    # 添加新的检测规则
    if "your-pattern" in user_input.lower():
        return True
    
    return False
```

### 自定义AI行为

修改 `src/server.py` 中的对话处理逻辑：

```python
async def chat_with_ai(user_input, session_id):
    # 自定义AI响应逻辑
    system_prompt = """你的自定义提示词...
    flag: {flag_for_prompt}
    """
```

## 故障排除

### 常见问题

1. **服务无法启动**
   - 检查Docker服务状态
   - 确认端口11434和5555未被占用

2. **AI无响应**
   - 检查网络连接
   - 验证SiliconFlow API密钥

3. **日志发送失败**
   - 确认日志服务器地址正确
   - 检查防火墙设置

### 日志查看

```bash
# 查看容器日志
docker compose logs -f

# 查看特定服务日志
docker compose logs ai-service
```

## 许可证

本项目基于开源协议发布，可用于教学和比赛用途。

---

**安全提示**: 在生产环境中使用时，请务必修改所有默认配置和敏感信息！