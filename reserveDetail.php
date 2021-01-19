<?php
    session_start();
    $dnameErr = "";
    $dtelno = "";
    $dmail = "";
    if(isset($_SESSION['errMsg']['dname'])){
        $dnameErr = "<span style ='color:red;'>".$_SESSION['errMsg']['dname'] ."</span";
    }

    if(isset($_SESSION['errMsg']['dtelno'])){
        $dtelnoErr = "<span style ='color:red;'>".$_SESSION['errMsg']['dtelno'] ."</span";
    }
    if(isset($_SESSION['errMsg']['dmail'])){
        $dmailErr = "<span style ='color:red;'>".$_SESSION['errMsg']['dmail'] ."</span";
    }
    unset($_SESSION['errMsg']);//エラーメッセージのクリア

    $link = mysqli_connect("localhost","hair_salon","pass","hair_salon");
    if($link == null){
        die (" 接続に失敗しました：".mysqli_connect_error());
    }
    mysqli_set_charset($link,"utf8");
    $result = mysqli_query($link,$sql);
    $menuNa = $_GET['menuN'];
    $staffNa = $_GET['staffN'];

    $menuName = $row['menu'];
    $_SESSION['reserve']['menu_name'] = $menuNa; 
    $staffNa = $_SESSION['reserve']['staff_name'] ;
    $reserveDay = $_SESSION['reserve']['day'];
    $reserveDayStr = date('Y年m月d日',strtotime($reserveDay));

    //前回入力したデータを表示させる

    $dname = "";
    if(isset($_SESSION['reserve']['dname'])== true){
        $dname = $_SESSION['reserve']['dname'];
    }
    $dtelno = "";
    if(isset($_SESSION['reserve']['dtelno'])== true){
        $dtelno = $_SESSION['reserve']['dtelno'];
    }
    $dmail = "";
    if(isset($_SESSION['reserve']['dmail'])== true){
        $dmail = $_SESSION['reserve']['dmail'];
    }
    
var_dump($dmail);
//var_dump($_SESSION);

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
  <!-- 各ページスクリプト挿入場所 -->
 <section>
    <h2>ご予約（詳細情報の入力）</h2>
    <p>詳細情報を入力後、予約確認ボタンを押してください。<br />
    （※がついている項目は入力必須項目です）</p>
    <h2>予約情報</h2>
    <table class="input">
      <tr><th>メニュー名:</th><td><?php echo $menuNa; ?></td></tr>
      <tr><th>担当者:</th><td><?php echo $staffNa; ?></td></tr>
      <tr><th>来店日:</th><td><?php echo date("Y年m月d日", strtotime($reserveDay)); ?>
      </td></tr>
     </table>
    <h3>お客様情報</h3>
    <form method="post" action="reserveCheck.php" >
      <table class="input">
        <tr>
          <th>氏名（※）</th>
          <td>
              <input type="text" name="dname" value="<?php echo $dname; ?>"><?php echo $dnameErr; ?>
          </td>
        </tr>
        <tr>
          <th>連絡先電話番号（※）</th>
          <td>
              <input type="text" name="dtelno" value="<?php echo $dtelno; ?>"><?php echo $dtelnoErr; ?>
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
          <input type="text" name="dmail" value="<?php echo $dmail; ?>"><?php echo $dmailErr; ?>
          </td>
        </tr>
      </table><br />
    <h3>予約詳細情報</h3>
      <table class="input">
        <tr>
          <th>連絡事項</th><td><textarea name="message" cols="40" rows="4"></textarea></td>
        </tr>
      </table><br />
    <p>まだ予約は確定しておりません。次の画面で確定させてください。</p>
    <input class="submit_a" type="submit" value="予約確認" />
    <input class="submit_a" type="button" value="前の画面に戻る" onclick="history.back();" />
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
   <?php
    mysqli_free_result($result);
    mysqli_close($link);
?>
    
</body>
</html>
