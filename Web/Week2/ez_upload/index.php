<?php
error_reporting(0);
$username = "Trailblazer";
#$logs_file = __DIR__."/logs";
#if (!is_dir(dirname($logs_file))) mkdir(dirname($logs_file), 0755, true);
$msg = '';
$pathShow = '';
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['avatar'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        // 白名单
        if (!in_array($ext, ['png'])) {
            $msg = 'Only PNG are allowed.';
        } else {
            $file_name = $file['name'];
            file_put_contents("check.php","{$file_name}.",FILE_APPEND);
            $saveName = md5(uniqid() . $file['name']) . '.' . $ext;
            $savePath = $uploadDir . '/' . $saveName;
            move_uploaded_file($file['tmp_name'], $savePath);
            $pathShow = 'uploads/' . $saveName;
            }
        }
    } else { 
        $msg = 'Upload Avatar You Love';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我其实什么都不要!</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="card">
    <h2>Welcome, <span class="uname"><?= htmlspecialchars($username) ?></span>!</h2>
    <img id="preview" src="<?= $pathShow ?: 'default.png' ?>" alt="avatar">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="avatar" accept="image/*" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
        <button type="submit">Upload</button>
    </form>
    <?php if ($msg): ?>
        <p class="warn"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>
    <?php if ($pathShow): ?>
        <p class="info">Avatar Saved At : <code><?= $pathShow ?></code></p>
    <?php endif; ?>
</div>
</body>
</html>

<!-- check.php -->