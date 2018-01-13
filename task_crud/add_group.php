<?
header('Content-Type: text/html; charset=utf-8');
?>

<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("students_groups")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");

	//добавление новой группы
	if ($_POST['func']=='add_group'){
		$name = mysql_real_escape_string(htmlspecialchars($_POST['name'])); //название группы

		// посылает запрос БД
		$query = "INSERT INTO groups (name) VALUES ('$name')";
		// возвращение данных результата запроса
		$result = mysql_query($query);
}
?>

<html>
 <head>
   <title>Добавление группы</title>
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
	 <ul>
		 <li style="float:right"><a href='index.php' class="navbar">Главная</a></li>
	 </ul>
	 
  <h2 align='center'>Добавление группы</h2>

  <form action='' method='POST' style='border:1px solid grey'>
  					<table width='100%'>
  						<tr>
  							<td>Введите название новой группы</td>
  							<td>
  								<input type='text' name='name'>
  							</td>
  						</tr>
  					</table>
  					<input type='hidden' name='func' value='add_group'>
  					<input type='submit' value='Добавить' class='button'>
  		</form>


 </body>
</html>
