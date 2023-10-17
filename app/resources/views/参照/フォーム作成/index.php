<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>A-RESORT</title>
        <link rel="stylesheet" type="text/css" href="base2.css">
    </head>
    <body>
        <!-- ここに追記 -->
        <!--ヘッダー-->
        <header>
            <div class="top-heading">
                <div class="top-title">
                    <img src="images/logo.png" alt="logo">
                </div>
                <nav class="top-menu">
                    <li class="top-list"><a href="#service">施設</a></li>
                    <li class="top-list"><a href="#recommend">体験</a></li>
                    <li class="top-list"><a href="#event">特集</a></li>
                    <li class="top-list"><a href="#news">お知らせ</a></li>
                    <li class="top-list"><a href="contact.php"<?php $_SESSION = array();?>>お問い合わせ</a></li>
                </nav>
                <div id="form-button" class="top-search">
                    空室検索
                </div>
            </div>
            <div class="top-lead">
                <h1>Take memories,<br>leave footprints</h1>
            </div>
        </header>
        <!--ヘッダー-->

          <!-- トップへ戻るボタン -->
            <a href="#" class="ScrollTop">
                トップへ戻る
            </a>
          <!-- トップへ戻るボタン -->

          <!-- 検索フォーム -->
            <div class="form">
                <div class="form-back">
                    <form action="#">
                        <div class="form-title">
                            空室検索
                        </div>
                        <div class="form-list">
                            <div class="form-item">
                                <p>目的地・ホテル名など</p>
                                <p><input type="text"></p>
                            </div>
                            <div class="form-item">
                                <p>チェックイン</p>
                                <p><input type="date" name="example" value=""></p>
                            </div>
                            <div class="form-item">
                                <p>チェックアウト</p>
                                <p><input type="date" name="example" value=""></p>
                            </div>
                            <div class="form-item">
                                <p>宿泊人数</p>
                                <p><input type="text"></p>
                            </div>
                        </div>
                        <div class="form-search">
                            <input type="submit" value="調べる">
                        </div>

                    </form>
                 </div>
            </div>
          <!-- 検索フォーム -->

          
        <!--メイン-->
        <main>
        <!--メイン1（リゾート施設）-->
        <div id="service" class="warpper-service">
            <div class="warpper-title">
                <h2>リゾート施設</h2>
            </div>
            <div class="service-image">
                <div class="service-left">
                    <div class="service-sub-taitle">
                        <h3>《国内》</h3>
                    </div>
                    <div class="service-list">
                        <div class="service-item">
                            <img src="images/pic1.jpeg">
                            <h4>北海道</h4>
                            <p>洞爺湖リゾート</p>
                        </div>
                        <div class="service-item">
                            <img src="images/pic2.jpeg">
                            <h4>千葉</h4>
                            <p>舞浜リゾート</p>
                        </div>
                        <div class="service-item">
                            <img src="images/pic3.jpeg">
                            <h4>神奈川</h4>
                            <p>湘南リゾート</p>
                        </div>
                        <div class="service-item">
                            <img src="images/pic4.jpeg">
                            <h4>静岡</h4>
                            <p>白浜リゾート</p>
                        </div>
                    </div>
                </div>
                <div class="service-right">
                    <div class="service-sub-taitle">
                        <h3>《国外》</h3>
                    </div>
                    <div class="service-list">
                        <div class="service-item">
                            <img src="images/pic5.jpeg">
                            <h4>インドネシア</h4>
                            <p>バリ島リゾート</p>
                        </div>
                        <div class="service-item">
                            <img src="images/pic6.jpeg">
                            <h4>アメリカ</h4>
                            <p>ハワイリゾート</p>
                        </div>
                        <div class="service-item">
                            <img src="images/pic7.jpeg">
                            <h4>タイ</h4>
                            <p>プーケットリゾート</p>
                        </div>
                        <!--空画像-->
                        <div class="service-item" style="visibility: collapse;">
                            <img src="">
                            <h4></h4>
                            <p></p>
                        </div>
                        <!--空画像-->
                    </div>
                </div>  
            </div>
        </div>
        <!--メイン1（リゾート施設）-->
        <!--メイン2（おすすめ体験）-->
        <div id="recommend" class="warpper-recommend">
            <div class="warpper-title">
                <h2>おすすめ体験</h2>
            </div>
            <div class="recommend-image">
                    <div class="recommend-list area1">
                        <img src="images/grid1.png">
                        <p>RESORT WEDDING</p>
                    </div>
                    <div class="recommend-list area2">
                        <img src="images/grid2.png">
                        <p>ACTIVITIES</p>
                    </div>
                    <div class="recommend-list area3">
                        <img src="images/grid3.png">
                        <p>RELAXATION</p>
                    </div>

                    <div class="recommend-list area4">
                        <img src="images/grid4.png">
                        <p>UP COMING EVENT</p>
                    </div>

                    <div class="recommend-list area5">
                        <img src="images/grid5.png">
                        <p>10.15 GRAND OPEN</p>
                    </div>
            </div>
            <div class="menu">
                <a href="#">一覧へ　　＞</a>
            </div>
        </div>
        <!--メイン2（おすすめ体験）-->
        <!--メイン3（旅の提案）-->
        <div id="event" class="warpper-event">
            <div class="warpper-title">
                <h2>旅の提案</h2>
            </div>
            <div class="event-image">
                <img src="images/hayawari.png">
            </div>
            <div class="menu">
                <a href="#">一覧へ　　＞</a>
            </div>
        </div>
        <!--メイン3（旅の提案）-->
        <!--お知らせ-->
        <div id="news" class="warpper-news">
            <div class="warpper-title">
                <h2>お知らせ</h2>
            </div>
            <div class="news-menu">
                <div class="news-list">
                    <div class="news-logo">
                        <img src="images/logo.png">
                    </div>
                    <div class="news-article">
                        <h5>トピックス</h5>
                        <p>2022年03月25日</p>
                        <p>【石垣リゾート】29歳以下限定 開業前特別プラン 予約受付開始！</p>
                    </div>
                </div>
                <div class="news-list">
                    <div class="news-logo">
                        <img src="images/logo.png">
                    </div>
                    <div class="news-article">
                        <h5>トピックス</h5>
                        <p>2022年03月19日</p>
                        <p>【湘南リゾート】開放感のあるプールサイドでビールを楽しむ「ビアフェス」開催</p>
                    </div>
                </div>
                <div class="news-list">
                    <div class="news-logo">
                        <img src="images/logo.png">
                    </div>
                    <div class="news-article">
                        <h5>トピックス</h5>
                        <p>2022年03月07日</p>
                        <p>【屋久島リゾート】春の訪れを祝う「花咲かまつり」開催 | 期間2022年3月3日~2022年3月21日</p>
                    </div>
                </div>
            </div>
            <div class="menu">
                <a href="#">一覧へ　　＞</a>
            </div>
        </div>
        <!--お知らせ-->
        </main>
        <!--メイン-->

        <footer>
            <div id="footer" class="footer-menu">
                <table class="footer-table">
                    <tr>
                        <th>
                            <img src="images/logo.png">
                        </th>
                    </tr>
                    <tr>
                        <td>〒150-0001<br>
                            東京都渋谷区神宮前2丁目4-11<br>
                            Daiwa神宮前ビル3階<br>
                        </td>
                    </tr>
                    <tr>
                        <td>BLOG</td>
                    </tr>
                    <tr>
                        <td>CONTACT</td>
                    </tr>
                </table>
            </div>
            <div class="map">
                <img src="images/map.png">
            </div>

        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="app.js"></script>
    </body>
</html>
