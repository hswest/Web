<?php
session_start();  //세션 시작
$servername="localhost";
$username="root";
$password="gPtmd0113";
$database="web_db";
$con=mysqli_connect($servername, $username, $password, $database)
    or die("Mysql Connect Error!");  //php와 SQL 연동

//세션 있으면 통과, 없으면 login.php으로 이동
if (isset($_SESSION['id'])) { echo "<br>"; }
else { header('location: login.php'); }
?>

<meta charset='UTF-8'>
<!DOCTYPE html>
<html>
<head>
  <title>
    인덱스 페이지
  </title>
</head>

<body>
  <h1>
    INDEX
  </h1>

  <?php
  //DB에 추가한 정보 확인
  $sel_query="SELECT * FROM member WHERE id LIKE '{$_SESSION['id']}';";
  $sel_result=mysqli_query($con, $sel_query) or die("Query Error!");
  $record=mysqli_fetch_array($sel_result);

  //echo로 로그인한 회원 정보 보여주기
  echo "<br>
  <b>{$record['name']} 의 페이지입니다</b> <br>
  login ID : {$record['id']} <br>
  login PW : {$record['pw']} <br>
  your email is {$record['email']} <br>
  your sex is {$record['sex']} <br> <br>";
  ?>

</body>
</html>
