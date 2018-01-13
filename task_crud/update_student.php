<?
header('Content-Type: text/html; charset=utf-8');
?>

<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("students_groups")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");

  if ($_GET['update_student.php?groups&id=']="^[0-9]"){
    $id = $_GET["id"];
  }

//изменение студента
  if ($_POST['func']=='update_student'){

   $fio=mysql_real_escape_string(htmlspecialchars($_POST['fio']));//название студента
	 $gender=mysql_real_escape_string(htmlspecialchars($_POST['gender']));//пол студента
   $query="UPDATE students SET fio = '$fio', gender = '$gender' WHERE id='$id'";
   $result=mysql_query($query);

 }

?>

<html>
 <head>
   <title>Обновление студента</title>
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
	 <ul>
		 <li style="float:right"><a href='index.php' class="navbar">Главная</a></li>
	 </ul>

  <h2 align='center'>Обновление студента</h2>

  <form action='' method='POST' style='border:1px solid grey'>
  					<table width='100%'>
  						<tr>
  							<td>Обновите название студента</td>
  							<td>
                  <td>
                    <?
                      $query="Select * FROM students WHERE id = '$id'";
                      $result=mysql_query($query);
                      $row=mysql_fetch_array($result);
                      echo "<input type='text' name='fio' value='".$row['fio']."'>";
                    ?>
          </td>
  							</td>
  						</tr>

					<tr>
					<td>Обновите пол студента</td>
					<td>
  <td>
						<?
							$query="Select * FROM students WHERE id = '$id'";
							$result=mysql_query($query);
							$row=mysql_fetch_array($result);

							if ($row['gender'] == "Мужской") {
								echo "<input type='hidden' name='gender' value='Мужской'>";
								echo "<p><input type='radio' name='gender' value='Женский'>Женский</p>";
							} else if($row['gender'] == "Женский"){
								echo "<input type='hidden' name='gender' value='Женский'>";
								echo "<p><input type='radio' name='gender' value='Мужской'>Мужской</p>";
							} else {
								echo "<p><input type='radio' name='gender' value='Мужской'>Мужской</p>";
								echo "<p><input type='radio' name='gender' value='Женский'>Женский</p>";
							}
						?>
					</td>
					</td>
				</tr>
  					</table>

  					 <input type='hidden' name='func' value='update_student'>
  					<input type='submit' value='Обновить' class='button'>

  		</form>


 </body>
</html>
