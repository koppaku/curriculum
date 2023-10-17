<?php
  session_start();


if (!isset($_SESSION['submit'])) {
  header('Location: contact.php');
  exit();
} elseif (isset($_POST['send'])){
  $_SESSION['send'] = $_POST['send'];
  header('Location: ./complete.php');
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
    <h2><b></b></h2>
    <form action="" method="post"><br>
      <p>下記の内容をご確認の上送信ボタンを押してください</p>
      <p>内容を訂正する場合は戻るを押してください。</p>
      <dl id="confirm">
        <dt>氏名</dt>
        <dd><?php echo ($_SESSION['name']); ?></dd>
        <dt>フリガナ</dt>
        <dd><?php echo ($_SESSION['kana']); ?></dd>
        <dt>電話番号</dt>
        <dd><?php echo ($_SESSION['tel']); ?></dd>
        <dt>メールアドレス</dt>
        <dd><?php echo ($_SESSION['email']); ?></dd>
        <dt>お問い合わせ内容</dt>
        <dd><?php echo nl2br(($_SESSION['body'])); ?></dd>
      <div class="btn_box">
        <button type="submit" class="conf_send" name="send">送　信</button>
        <a href='contact.php'><button type="button">戻る</button></a>
      </div>
      </dl>
    </form>
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
