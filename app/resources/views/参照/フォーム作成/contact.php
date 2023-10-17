<?php

session_start();

//エラーメッセージ
$error = [];
$check = [];

if (isset($_POST['name'])) {
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
  if ($name === '') {
    $error[] = '氏名は必須項目です';
    $check['name'] = 'blank';
  } elseif (strlen($name) > 20) {
    $error[] = '名前は10文字以内で入力してださい';   
    $check['name'] = 'ng';
  }

} elseif(isset($_SESSION['name'])) {
  $_POST['name'] = $_SESSION['name'];
}

if (isset($_POST['kana'])) {
  $kana = htmlspecialchars($_POST['kana'], ENT_QUOTES, "UTF-8");
  if ($kana === '') {
    $error[] = 'フリガナは必須項目です';
    $check['kana'] = 'blank';
  } elseif (strlen($kana) > 20) {
    $error[] = 'フリガナは10文字以内で入力してださい';
    $check['kana'] = 'ng';
  }
} elseif(isset($_SESSION['kana'])) {
  $_POST['kana'] = $_SESSION['kana'];
}

if (isset($_POST['tel'])) {
  $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");
  if ($tel === '') {
    $error[] = '電話番号は必須項目です';
    $check['tel'] = 'blank';
  } elseif( !preg_match("/^0[0-9]{9,10}$/", $tel)) {
    $error[] = '電話番号を入力してださい'; 
    $check['tel'] = 'ng';    
  }
} elseif(isset($_SESSION['tel'])) {
  $_POST['tel'] = $_SESSION['tel'];
}

if (isset($_POST['email'])) {
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
  if ($email === '') {
    $error[] = 'メールアドレスは必須項目です';
    $check['email'] = 'blank';
  } elseif (!filter_var( $email,  FILTER_VALIDATE_EMAIL ) ){
    $error[] = 'メールアドレスが正しくありません';
    $check['email'] = 'ng';    

  }
} elseif(isset($_SESSION['email'])) {
  $_POST['email'] = $_SESSION['email'];
}

if (isset($_POST['body'])) {
  $body = htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");
  if ($body === '') {
    $error[] = 'お問い合わせ内容は必須項目です';
    $check['body'] = 'blank';
  }
} elseif(isset($_SESSION['body'])) {
  $_POST['body'] = $_SESSION['body'];
}

if (isset($_POST['submit'])){
  if(count($error) > 0){
    function func_alert($error){
      $errorss = '';
    foreach($error as $errors){
      $errorss .= $errors."\\n";
    }
    echo "<script>alert('$errorss')</script>";  
    }
    func_alert($error);
  } else {
    $_SESSION['name'] = $name;
    $_SESSION['kana'] = $kana;
    $_SESSION['tel'] = $tel;
    $_SESSION['email'] = $email;
    $_SESSION['body'] = $body;
    $_SESSION['submit'] = $_POST['submit'];
    header('Location: ./confirm.php');
    exit();
  } 
} else {
  $_SESSION = array();
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
    <form action="" method="post">
      <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
      <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
      <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
      <p><span class="required">*</span>は必須項目となります。</p>
      <dl>
        <dt><label for="name">氏名</label><span class="required">*</span></dt>
        <?php
        if(isset($check['name'])){
          if($check['name'] === 'blank'){
            echo '<p class = "required" >名前は必須項目です</p>';
          } elseif($check['name'] === 'ng') {
            echo '<p class = "required" >名前は10文字以内で入力してださい</p>';
          } 
        }
        ?>
        <dd><input type="text" name="name" id="name" placeholder="山田太郎" value="<?php if(isset($_POST['name'])){ echo htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");} ?>"></dd>

        <dt><label for="kana">フリガナ</label><span class="required">*</span></dt>
        <?php
        if(isset($check['kana'])){
          if($check['kana'] === 'blank'){
            echo '<p class = "required" >フリガナは必須項目です</p>';
          } elseif($check['kana'] === 'ng') {
            echo '<p class = "required" >フリガナは10文字以内で入力してださい</p>';
          }
        }
        ?>
        <dd><input type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php if(isset($_POST['kana'])){ echo htmlspecialchars($_POST['kana'], ENT_QUOTES, "UTF-8");} ?>"></dd>

        <dt><label for="tel">電話番号</label></dt>
        <?php
        if(isset($check['tel'])){
          if($check['tel'] === 'blank'){
            echo '<p class = "required" >電話番号は必須項目です</p>';
          } elseif($check['tel'] === 'ng'){
            echo '<p class = "required" >電話番号が正しくありません</p>';
          }
        }
        ?>    

        <dd><input type="text" name="tel" id="tel" placeholder="09012345678" value="<?php if(isset($_POST['tel'])){ echo htmlspecialchars($_POST['tel'], ENT_QUOTES, "UTF-8");} ?>"></dd>

        <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
        <?php
        if(isset($check['email'])){
          if($check['email'] === 'blank'){
            echo '<p class = "required" >メールアドレスは必須項目です</p>';
          } elseif($check['email'] === 'ng') {
            echo '<p class = "required" >メールアドレスが正しくありません</p>';
          }
        }
        ?>
        <dd><input type="text" name="email" id="email" placeholder="test@test.co.jp" value="<?php if(isset($_POST['email'])){ echo htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");} ?>"></dd>

      </dl>
      <h3><label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label></h3>
      <?php
        if(isset($check['body'])){
          if($check['body'] === 'blank'){
            echo '<p class = "required" >お問い合わせは必須項目です</p>';
          }
        }
        ?>    
      <dl>
        <dd><textarea name="body"><?php if(isset($_POST['body'])){ echo htmlspecialchars($_POST['body'], ENT_QUOTES, "UTF-8");} ?></textarea></dd>
    <dd>
      <button type="submit" class="send" name="submit">送　信</button>
    </dd>
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
