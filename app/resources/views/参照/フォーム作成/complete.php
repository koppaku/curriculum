<?php
  session_start();

  if (!isset($_SESSION['send'])) {
    header('Location: ./contact.php');
    exit();
  }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>サーバーサイド基礎 課題form</title>
  <link rel="stylesheet" type="text/css" href="base.css">
</head>
<body>
  <nav id="navi">
    <div class="box-left">
      <a href="index.php#top"><img src="images/logo.png" id="logo"></a>
    </div>
    <div class="box-middle">
      <a href="index.php#service">施設</a>
      <a href="index.php#recommend">体験</a>
      <a href="index.php#event">特集</a>
      <a href="index.php#news">お知らせ</a>
      <a href="contact.php">お問い合わせ</a>
    </div>
    <div class="box-right">
    </div>
  </nav>
<section>
  <div id="contact_box">
    <h2><b>お問い合わせ</b></h2>
    <div id="complete">
      <p>お問い合わせ頂きありがとうございます。</p>
      <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
      <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p><br>
      <a href="index.php"<?php $_SESSION = array();?>>トップへ戻る</a>
    </div>
</section>

<footer>
  <div id="icon-box">
    <img src="images/twitter.png">
    <img src="images/instagram.png">
    <img src="images/facebook.png">
  </div>
  <div id="footer">
    <div class="xxx">
      <p>XXXX XXX XXXX</p>
      <p>XXX XXXXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXX XXXXX XXXX</p>
      <p>XXXX XXX XXXX</p>
    </div>
    <div class="xxx xxx">
      <p>XXXX XXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXXXXXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXXXXXXXX XXXX</p>
    </div>
    <div class="xxx xxx">
      <p>XXXX XXX XXXX</p>
      <p>XXXXXXXXX XXXX</p>
      <p>XXX XXXXX XXXX</p>
      <p>XXX XXXXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXXX XXXXXXXXX</p>
    </div>
    <div class="xxx xxx-right">
      <p>XXXXXXXXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXXX XXX XXXX</p>
      <p>XXXXXXX XXXX</p>
      <p>XXXX XXX XXXX</p>
    </div>
  </div>
</footer>

</body>
</html>
