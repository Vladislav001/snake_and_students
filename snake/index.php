<?
header('Content-Type: text/html; charset=utf-8');
?>

<html>
 <head>
  <title>Змейка</title>
 </head>
 <body>
<form action="snake.php" method="post">
 <p>Введите кол-во строк: <input type="number" name="row" /></p>
 <p>Введите кол-во столбцов: <input type="number" name="column" /></p>
 <p><button type="submit"/>Расчет</button></p>
</form>
 </body>
</html>
