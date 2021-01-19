<?php
    $staff_id = htmlspecialchars($_GET["staff_id"]);
    require_once('./dbConfig.php');
    $link = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if($link == null){
        die (" 接続に失敗しました：".mysqli_connect_error());
    }
    mysqli_set_charset($link,"utf8");

    session_start();
    if(isset($_SESSION['reserve'])){
        unset($_SESSION['reserve']);
    }
//var_dump($staff_id);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link href= "css/style.css" rel="stylesheet" type="text/css">
    <title>スタッフページ</title>
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
<?php
$sql = "SELECT name,staff_image,id FROM staff_table WHERE staff_table.id = {$staff_id}";
   
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

//var_dump($result);

?>
       
           <h2><?php echo $row['name']; ?></h2>
           <img class ="" src ="images/<?php echo $row['staff_image']; ?>">
           <?php echo "<a href='./reserveDay.php?staffN={$row['name']}'>この担当者を指名</a>"; ?>
            
           
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
   <?php
    mysqli_free_result($result);
    mysqli_close($link);
?>
    
</body>
</html>
