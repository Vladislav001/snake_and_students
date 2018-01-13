<?
header('Content-Type: text/html; charset=utf-8');
?>

<?
	mysql_connect("localhost","root","");
	if (!mysql_select_db("students_groups")){
		exit("Could not connect to database");
	}
	mysql_query("SET NAMES cp1251");

  //для placeholder
  if ($_GET['update_group.php?groups&id=']="^[0-9]"){
    $id = $_GET["id"];
  }

//изменение группы
  if ($_POST['func']=='update_group'){

   $name=mysql_real_escape_string(htmlspecialchars($_POST['name']));//название группы
   $query="UPDATE groups SET name = '$name' WHERE id='$id'";
   $result=mysql_query($query);

 }

?>

<html>
 <head>
   <title>Обновление группы</title>
   <meta name="author" content="Vladislav Guriev" >
   <link href="index.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
	 <ul>
		 <li style="float:right"><a href='index.php' class="navbar">Главная</a></li>
	 </ul>

  <h2 align='center'>Обновление группы</h2>

  <form action='' method='POST' style='border:1px solid grey'>
  					<table width='100%'>
  						<tr>
  							<td>Обновите название группы</td>
  							<td>
                  <td>
                    <?
                      $query="Select * FROM groups WHERE id = '$id'";
                      $result=mysql_query($query);
                      $row=mysql_fetch_array($result);
                      echo "<input type='text' name='name' value='".$row['name']."'>";
                    ?>
          </td>
  							</td>
  						</tr>
  					</table>

  					 <input type='hidden' name='func' value='update_group'>
  					<input type='submit' value='Обновить' class='button'>

  		</form>


 </body>
</html>
