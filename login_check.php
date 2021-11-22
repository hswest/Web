<?php
session_start();  //세션 시작

$servername="localhost";
$username="root";
$password="gPtmd0113";
$database="web_db";
$con=mysqli_connect($servername, $username, $password, $database)
    or die("Mysql Connect Error!");  //php와 SQL 연동

//멤버 테이블에 id값이 있는지 조회하기
$sel_query="SELECT * FROM member WHERE id LIKE '{$_POST['id']}';";
$sel_result=mysqli_query($con, $sel_query) or die("Query Error!");
$count=mysqli_num_rows($sel_result);  //mysql 레코드 가져오기

  if($count==0)  //count가 0이면(DB에서 POST id 조회 결과가 없으면)
  {
    echo "회원정보가 없습니다. <br>";
    //echo로 register.html로 이동하는 버튼 만들기
    echo "<br> <input type=\"button\" name=\"back\" value=\"가입하기\" onclick=\"location.href='register.html'\">";
  }
  else  //count가 0이 아니면
  {
    $record=mysqli_fetch_array($sel_result);
    echo $record['id'];

    //pw 검증 과정의 경우 DB의 pw와 POST의 pw가 같은지 검사
    if(($record['id']==$_POST['id']) && ($record['pw']==$_POST['pw']))
    {
      //일치하면 세션 발급 후 index로 이동
      $_SESSION['id']=$record['id'];
      header('location: index.php');
    }
    else
    {
      echo "로그인 정보가 일치하지 않습니다."
      //echo로 login.php로 이동하는 버튼 만들기
      echo "<br> <input type=\"button\" name=\"back\" value=\"다시 시도하기\" onclick=\"location.href='login.php'\">";
    }
  }

?>
