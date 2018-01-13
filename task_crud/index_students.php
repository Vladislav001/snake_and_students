<?
header('Content-Type: text/html; charset=utf-8');
?>

<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("students_groups")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");

  if ($_GET['index_students.php?option=groups&id=']="^[0-9]"){
    $id = $_GET["id"];
  }
?>

<html>
 <head>
   <title>Информация о студентах</title>
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
	 <ul>
		 <li style="float:right"><a href='index.php' class="navbar">Главная</a></li>
	 </ul>

  <!-- Получение информации о группах -->
    <h2 align='center'>Информация о студентах </h2>
    <table width = '100%' cellpadding = '2' cellspacing = '2' border = '1'>
      <tr style = 'font-weight:bold;'><td>id</td><td>ФИО</td><td>Пол</td><td></td></tr>
    <?
      $query = "Select * FROM students WHERE id_group='$id'";
      $result = mysql_query(htmlspecialchars($query));
      for ($i = 0; $i < mysql_num_rows($result); $i++){
        $row = mysql_fetch_array($result);

        echo "<tr><td>".$row['id']."</td><td><a href='update_student.php?student&id=".$row['id']."'>".$row['fio']."</a></td><td>"
        .$row['gender']."</td><td><a href='delete.php?students&id="
        .$row['id']."'>Delete</a><tr>";
      }
    ?>
    </table>


	  <button type="submit" class='button' >
			<?
			 echo "<a href='add_student.php?groupsnt&id=$id'> Добавить студента</a>"
			 ?>
		 </button>


 </body>
</html>
