<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ez_XXE</title>
    <style>
* {
     margin: 0;
     padding: 0;
 }

 html {
     height: 100%;
 }

 body {
     height: 100%;
 }

 .container {
     height: 100%;
     background-image: linear-gradient(to right, #fbc2eb, #a6c1ee);
 }

 .login-wrapper {
     background-color: #fff;
     width: 358px;
     height: 588px;
     border-radius: 15px;
     padding: 0 50px;
     position: relative;
     left: 50%;
     top: 50%;
     transform: translate(-50%, -50%);
 }

 .header {
     font-size: 38px;
     font-weight: bold;
     text-align: center;
     line-height: 200px;
 }

 .input-item {
     display: block;
     width: 100%;
     margin-bottom: 20px;
     border: 0;
     padding: 10px;
     border-bottom: 1px solid rgb(128, 125, 125);
     font-size: 15px;
     outline: none;
 }

 .input-item:placeholder {
     text-transform: uppercase;
 }

 .btn {
    text-align: center;
    padding: 10px;
    width: 100%;
    margin-top: 40px;
    background-image: linear-gradient(to right, #a6c1ee, #fbc2eb);
    color: #fff;
    border: none;         
    border-radius: 8px;    
    cursor: pointer;   
    font-size: 16px;
    transition: opacity .25s;
}

.btn:hover {
    opacity: .85;
}

textarea {
        width: 100%;
        height: 160px;
        resize: vertical;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        font-family: Consolas, monospace;
        font-size: 14px;
}

textarea::placeholder{
        color: #888;
        font-family: Consolas, monospace;
        font-size: 13px;
        font-style: italic;
        opacity: 1;
    }

 .msg {
     text-align: center;
     line-height: 88px;
 }

 a {
     text-decoration-line: none;
     color: #abc1ee;
 }
    </style>
</head>
<body>
<div class="container">
        <div class="login-wrapper">
            <div class="header">Message</div>
            <div class="form-wrapper">
                <form method="POST" action="">
                <textarea name="xml" placeholder="Input Your Want"></textarea>
                <button type="submit" class="btn">Send</button>
                </form>
            </div>
            <div class="msg">
                Wanna Quit?
                <a href="login.php">Logout</a>
            </div>
        </div>
    </div>

</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $xmlfile = file_get_contents("php://input");

	$dom = new DOMDocument();
	$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD); 
	$creds = simplexml_import_dom($dom);
    echo "<pre>" . htmlspecialchars($dom->textContent) . "</pre>";
    exit;
}
?>

<script>
document.querySelector('form').addEventListener('submit', async (e) => {
    e.preventDefault();          
    const xml = document.querySelector('textarea[name="xml"]').value.trim();
    if (!xml) return alert('Empty XML');

    const res = await fetch('', {          
        method: 'POST',
        headers: { 'Content-Type': 'application/xml' },
        body: xml
    });
    const txt = await res.text();    
    document.body.innerHTML = '<pre>' + txt + '</pre>';
});
</script>
