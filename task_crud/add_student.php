<?
header('Content-Type: text/html; charset=utf-8');
?>

<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("students_groups")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");

	if ($_GET['add_student.php?groups&id']="^[0-9]"){
    $id = $_GET["id"];
  }

	//добавление нового студента
	if ($_POST['func']=='add_student'){

		$fio = mysql_real_escape_string(htmlspecialchars($_POST['fio'])); //название студента
		$gender = mysql_real_escape_string(htmlspecialchars($_POST['gender'])); //название студента
		$id_group = mysql_real_escape_string(htmlspecialchars($id));



		// посылает запрос БД
		$query = "INSERT INTO students (fio, gender, id_group) VALUES ('$fio', '$gender', '$id_group')";
		// возвращение данных результата запроса
		$result = mysql_query($query);

		$query="UPDATE groups SET count_students = count_students + 1 WHERE id='$id_group'";
		$result=mysql_query($query);

	}
?>

<html>
 <head>
   <title>Добавление студента</title>
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
	 <ul>
		 <li style="float:right"><a href='index.php' class="navbar">Главная</a></li>
	 </ul>

  <h2 align='center'>Добавление студента</h2>

  <form action='' method='POST' style='border:1px solid grey'>
  					<table width='100%'>
  						<tr>
  							<td>Введите ФИО нового студента</td>
  							<td>
  								<input type='text' name='fio'>
  							</td>
                </tr>
                    <tr>
                <td>Выберите пол нового студента</td>
                <td>
                <p><input name="gender" type="radio" value="Мужской">Мужской</p>
                <p><input name="gender" type="radio" value="Женский">Женский</p>
                	</td>
  						</tr>
  					</table>
  					<input type='hidden' name='func' value='add_student'>
  					<input type='submit' value='Добавить' class='button'>
  		</form>


 </body>
</html>
