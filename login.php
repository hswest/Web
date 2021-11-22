<?php
session_start();  //세션 시작

//SESSION id가 있으면 index 페이지로 이동
if(isset($_SESSION['id']))
  {
    header('location: index.php');
  }
 ?>

 <meta charset='UTF-8'>
 <!DOCTYPE html>
 <html>
 <head>
   <title>
     로그인 페이지
   </title>
 </head>

 <body>
   <h1>
     로그인
   </h1>
   로그인하세요
   <from action="login_check.php" method="POST"> <!--login_check.php로 데이터 전송(post 방식)-->
     ID : <input type="text" name="id">
     <br>
     PW : <input type="password" name="pw">
     <br>
     <!--가입하기 버튼->register.html로 이동, 로그인 버튼->login_check.php로 이동-->
     <input type="button" name="register" value="가입하기" onclick="location.href='reigster.html'">
     <input type="submit" name="login" value="로그인" onclick="location.href='login_check.php'">
   </form>
 </body>
 </html>
