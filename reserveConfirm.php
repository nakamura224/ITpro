<?php
    session_start();
    $link = mysqli_connect("localhost","hair_salon","pass","hair_salon");
    if($link == null){
        die (" 接続に失敗しました：".mysqli_connect_error());
    }
    mysqli_set_charset($link,"utf8");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $result = mysqli_query($link,$sql);


    $menuNa= $_SESSION['reserve']['menu_name'];
    $staffNa = $_SESSION['reserve']['staff_name'] ;
    $reserveDay = $_SESSION['reserve']['day'];


  $dname   = $_SESSION['reserve']['dname'];
  $dtelno  = $_SESSION['reserve']['dtelno'];
  $dmail   = $_SESSION['reserve']['dmail'];
  
  
  $message = $_SESSION['reserve']['message'];
//var_dump($menuNa);
//var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/style.css" type="text/css">
  <title>hair salon</title>
</head>
<body>
  <!-- ヘッダー：開始-->
  <header id="header">
    <div id="pr">
      <p>予約確認画面</p>
    </div>
    <div class ="logo">
    <h1><a href="./index.html"><img src="./images/logo.png" alt=""></a></h1>
    </div>
  </header>
  <!-- ヘッダー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
  <nav id="menu">
      <article>
<!-- 各ページスクリプト挿入場所 -->
      <section>
        <form action="./reserveInsert.php" method="post">
        <h2>ご予約（最終確認）</h2>
        <p>予約内容をご確認後、よろしければ予約確定ボタンを押してください。</p>
        <h3>予約情報</h3>
        <table class="input">
          <tr><th>来店日</th><td><?php echo $reserveDay; ?></td></tr>
        </table>
        <br>
        <h3>お客様情報</h3>
        <table class="input">
          <tr><th>氏名</th><td><?php echo $dname; ?></td></tr>
          <tr><th>連絡先電話番号</th><td><?php echo $dtelno; ?></td></tr>
          <tr><th>メールアドレス</th><td><?php echo $dmail; ?></td></tr>
        </table>
        <br>
        <h3>予約詳細情報</h3>
        <table class="input">
          <tr><th>連絡事項</th><td><?php echo $message; ?></td></tr>
        </table>
        <br>
        <input class="submit_a" type="submit" value="予約確定">
        <input class="submit_a" type="button" value="前の画面に戻る" onclick="history.back();">
        </form>
      </section>
      </article>
    </nav>
    <!-- サイド：開始 -->
    <aside id ="side">
    <section>
       <h2>変更・キャンセル</h2>
       <ul>
           <li><span class ="tel"><p>℡0120-000-000</p></span></li>
           <li><span class ="addres"><p>〒○○○-○○○○
東京都渋谷区○○○○○○</p></span></li>
      <li><span class ="tel"><p>営業案内</p></span></li>
      <li><span class ="tel"><p>10:00～19:00</p></span></li>
       </ul>
    </section>
   </aside>
    <!-- サイド：終了 -->
    <!-- ページトップ：開始 -->
    <div id="pageTop">
      <a href="#top">ページのトップへ戻る</a>
    </div>
    <!-- ページトップ：終了 -->
  </div>
  <!-- コンテンツ：終了 -->
 <?php
    mysqli_free_result($result);
    mysqli_close($link);
?>
  <!-- フッター：開始 -->
  <footer id ="footer">
        <p>Copyright c 2020 Jikkyo All Rights Reserved.</p>
   </footer>
<!---フッター：終了--->
</body>
</html>