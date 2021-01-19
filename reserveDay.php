<?php
    session_start();
    require_once('./dbConfig.php');
    $link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if($link == null){
        die (" 接続に失敗しました：".mysqli_connect_error());
    }
    mysqli_set_charset($link,"utf8");

    $staffNa = $_GET['staffN'];
    $_SESSION['reserve']['staff_name'] = $staffNa; 
     //var_dump($staffNa);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href= "css/style.css" rel="stylesheet" type="text/css">
    <title>予約ページ</title>
</head>
<body>
 <!---ヘッダー：開始--->
  <header id = "header">
      <div id ="pr">
       <p>予約ページ</p>
      </div>
      <div class ="logo">
       <h1><a href = "./index.html"><img src = "./images/logo.png" alt = ""></a></h1>
       </div>
       
  </header>
<!---ヘッダー：終了--->

<!---コンテンツ：開始--->
<div id ="contents">
<!---メニュー：開始--->
     <nav id ="menu">
        <article>
        
         <!-------スクリプト入力箇所------->
         <section>
             <h2>予約日時</h2>
             <h3>予定日入力</h3>
             <form method="post" action="menu.php">
                 <table>
                 <tr>
                     <th>予定日</th>
                     <td><input type ="date" name="reserveDay" value="<?php echo date('Y-m-d'); ?>" min ="<?php echo date('Y-m-d'); ?>" required></td>
                 </tr>
                 </table>
                 <input class ="submit_a" type = "submit" value="予約日時指定">
                 </form>
         </section>
        </article>
     </nav>
<!---メニュー：終了--->
   
<!---サイド：開始--->
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
<!---サイド：終了--->
<!---ページトップ：開始--->
<div id ="pageTop">
    <a href ="#top">ページのトップへ戻る</a>
</div>
<!---ページトップ：終了--->
</div>
<!---コンテンツ：終了--->
<!---フッター：開始--->
   <footer id ="footer">
        <p>Copyright c 2020 Jikkyo All Rights Reserved.</p>
   </footer>
<!---フッター：終了--->
   
    
</body>
</html>
