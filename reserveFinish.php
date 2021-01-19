<?php
session_start();
if (isset($_SESSION['reserveNo']) == false) {
    header("location: ./index.php");
    exit;
}
$reserveNo = $_SESSION['reserveNo'];
unset($_SESSION['reserveNo']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/style.css" type="text/css">
  <title>予約ページ</title>
</head>
<body>
  <!-- ヘッダー：開始-->
  <header id="header">
    <div id="pr">
      <p>予約ページ</p>
    </div>
    <div class ="logo">
    <h1><a href="./index.php"><img src="./images/logo.png" alt=""></a></h1>
    </div>
    </header>
<!-- ヘッダー：終了 -->
  <!-- メニュー：開始 -->
<div id="contents">
  <nav id="menu">
      <article>
  <!-- 各ページスクリプト挿入場所 -->
        <section>
          <h2>予約完了</h2>
          <p>予約が完了しました。以下の予約番号を控えておいてください。</p>
          <h3>予約情報</h3>
          <table class="input">
            <tr><th>予約番号</th><td><?php echo $reserveNo; ?></td></tr>
          </table>
          <br>
          <p>当日はお気をつけてお出かけください。心よりお待ちいたしております。</p>
          <a class="submit_a" href="./index.html">トップページへ</a>
        </section>
      </article>
    </nav>
    <!-- メイン：終了 -->
    <!-- サイド：開始 -->
    <aside id="side">
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
  <!-- フッター：開始 -->
  <footer id="footer">
    Copyright c 2016 Jikkyo Pension All Rights Reserved.
  </footer>
  <!-- フッター：終了 -->
</body>
</html>
