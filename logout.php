<meta charset='UTF-8'>
<!DOCTYPE html>

<html>
<head>
  <title>
    사이트에서 로그아웃 합니다.
  </title>
</head>

<body>
<br>
<?php
session_start();  //세션 시작
echo "사이트에서 로그아웃 했습니다";
session_destroy();  //현재 모든 세션 객체 삭제
?>

</body>
</html>
