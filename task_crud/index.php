<?
header('Content-Type: text/html; charset=utf-8');
?>

<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("students_groups")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");
?>

<html>
 <head>
   <title>Информация о группах</title>
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
	 <ul>
		 <li style="float:right"><a href='index.php' class="navbar">Главная</a></li>
	 </ul>


  <!-- Получение информации о группах -->
    <h2 align='center'>Информация о группах </h2>
    <table width = '100%' cellpadding = '2' cellspacing = '2' border = '1'>
      <tr style = 'font-weight:bold;'><td>id</td><td>Название</td><td>Кол-во студентов</td><td></td></tr>
    <?
      $query = "Select * FROM groups";
      $result = mysql_query(htmlspecialchars($query));
      for ($i = 0; $i < mysql_num_rows($result); $i++){
        $row = mysql_fetch_array($result);
        echo "<tr><td>".$row['id']."</td><td><a href='update_group.php?groups&id=".$row['id']."'>".$row['name']."</a></td><td><a href='index_students.php?option=groups&id=".$row['id']."'>"
        .$row['count_students']."</a></td><td><a href='delete.php?groups&id="
        .$row['id']."'>Delete</a><tr>";
      }
    ?>
    </table>

		<form action="add_group.php">
				<button type="submit" class='button'>Добавить группу</button>
		</form>

 </body>
</html>
