<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8" />
  <title>Upload</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <style>
    :root {
      --primary: #0066ff;
      --primary-hover: #0052cc;
      --bg: #f5f7fa;
      --card-bg: #ffffff;
      --radius: 8px;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      --font: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: var(--font);
      background: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .wrapper {
      display: flex;
      flex-direction: column;
      gap: 40px;
      max-width: 480px;
      width: 100%;
      padding: 0 20px;
    }
    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      padding: 30px 35px;
      box-shadow: var(--shadow);
    }
    h2 {
      margin-top: 0;
      margin-bottom: 20px;
      font-size: 22px;
      color: #333;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    input[type="file"] {
      font-size: 14px;
    }
    input[type="text"] {
      padding: 10px 12px;
      border: 1px solid #ccd1d9;
      border-radius: var(--radius);
      font-size: 14px;
      transition: border-color .2s;
    }
    input[type="text"]:focus {
      border-color: var(--primary);
      outline: none;
    }
    button {
      padding: 11px 18px;
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      background: var(--primary);
      border: none;
      border-radius: var(--radius);
      cursor: pointer;
      transition: background .2s;
    }
    button:hover {
      background: var(--primary-hover);
    }

    .file-label {
      display: inline-block;
      padding: 11px 18px;
      background: var(--primary);
      color: #fff;
      border-radius: var(--radius);
      cursor: pointer;
      font-size: 14px;
      transition: background .2s;
    }
    .file-label:hover {
      background: var(--primary-hover);
    }
    input[type="file"] {
      display: none;
    }
    .file-name {
      margin-top: 6px;
      font-size: 13px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="card">
      <h2>上传文件</h2>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label class="file-label">
          选择文件
          <input type="file" name="file" id="uploadFile" required onchange="showFileName()" />
        </label>
        <div class="file-name" id="fileNameText">未选择文件</div>
        <button type="submit">立即上传</button>
      </form>
    </div>

    <div class="card">
      <h2>查询文件</h2>
      <form action="index.php" method="POST">
        <input type="text" name="file" placeholder="请输入你喜欢的文件名" required />
        <button type="submit">查询</button>
      </form>
    </div>
  </div>

  <script>
    function showFileName() {
      const fileInput = document.getElementById('uploadFile');
      const fileNameText = document.getElementById('fileNameText');
      fileNameText.textContent = fileInput.files[0]
        ? fileInput.files[0].name
        : '未选择文件';
    }
  </script>
</body>
</html>

<?php
error_reporting(0);
class MaHaYu{
    public $HG2;
    public $ToT;
    public $FM2tM;
    public function __construct()
    {
      $this -> ZombiegalKawaii();
    }
    
    public function ZombiegalKawaii()
    {
      $HG2 = $this -> HG2;
      if(preg_match("/system|print|readfile|get|assert|passthru|nl|flag|ls|scandir|check|cat|tac|echo|eval|rev|report|dir/i",$HG2))
      {
        die("这这这你也该绕过去了吧");
      }
      else{
        $this -> ToT = "这其实是来占位的";

      }
    }

    public function __destruct()
    {
      $HG2 = $this -> HG2;
      $FM2tM = $this -> FM2tM;
      echo "Wow";
      var_dump($HG2($FM2tM));
    }
}

$file=$_POST['file'];
if(isset($_POST['file']))
{
    if (preg_match("/'[\$%&#@*]|flag|file|base64|go|git|login|dict|base|echo|content|read|convert|filter|date|plain|text|;|<|>/i", $file))
    {
        die("对方撤回了一个请求，并企图萌混过关");
    }
    echo base64_encode(file_get_contents($file));
}