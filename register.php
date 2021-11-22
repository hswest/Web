<meta charset='UTF-8'>
<!DOCTYPE html>
<html>
 <head>
   <title>가입 확인 중 </title>
 </head>
 <body>
  <h1>가입이 유효한지 확인했습니다.</h1>

  <?php
    session_start();  //세션 시작
    $servername="localhost";
    $username="root";
    $password="gPtmd0113";
    $database="web_db";
    $con=mysqli_connect($servername, $username, $password, $database)
         or die("Mysql Connect Error!");  //php와 SQL 연동

    //쿼리 전송
    $num_result=mysqli_query($con, "SELECT * FROM member;") or die("Querry Error1");

    //쿼리로 받아온 결과 개수
    $number=mysqli_num_rows($num_result);

    //테이블에 데이터 추가
    $ins_query="INSERT INTO member VALUES($number, '{$_POST['id']}', '{$_POST['pw']}', '{$_POST['email']}', '{$_POST['name']}', '{$_POST['sex']}');";

    mysqli_query($con, $ins_query) or die("Query Error2");

    //멤버 테이블에 id값이 있는지 조회하기
    $sel_query="SELECT * FROM member WHERE id LIKE '{$_POST['id']}';";
    $sel_result=mysqli_query($con, $sel_query) or die("Query Error3");
    $record=mysqli_fetch_array($sel_result);  //mysql 레코드 가져오기

    //echo로 회원 정보 보여주기
    echo "당신의 정보를 확인하세요! <br>
    login ID : {$record['id']} <br>
    login PW : {$record['pw']} <br>
    your email is {$record['email']} <br>
    your name is {$record['name']} <br>
    your sex is {$record['sex']} <br>";

    //세션 발급
    $_SESSION['id']=$record['id'];

    //echo로 login.php로 이동하는 버튼 만들기
    echo "<br> <input type=\"button\" name=\"complete\" value=\"가입완료\" onclick=\"location.href='login.php'\"> <br>";
  ?>
 </body>
</html>
