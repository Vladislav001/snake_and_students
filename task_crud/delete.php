<?

mysql_connect("localhost","root","");
if (!mysql_select_db("students_groups")){
  exit("Could not connect to database");
}
mysql_query("SET NAMES cp1251");

	//Удаление  группы
	if ($_POST['delete.php?groups&id=']="^[0-9]"){
    $id = $_GET["id"];

    $query ="DELETE FROM groups WHERE id = '$id'";
		$result=mysql_query($query);
    $query ="DELETE FROM students WHERE id_group = '$id'";
    $result=mysql_query($query);

		header('Location: index.php');

}

if ($_POST['delete.php?students&id=']="^[0-9]"){
  $id = $_GET["id"];

  $query="Select * FROM students WHERE id = '$id'";
  $result=mysql_query($query);
  $row=mysql_fetch_array($result);
  $id_group = $row['id_group'];


  $query="UPDATE groups SET count_students = count_students - 1 WHERE id=$id_group";
  $result=mysql_query($query);

  $query ="DELETE FROM students WHERE id = '$id'";
  $result=mysql_query($query);

  header('Location: index.php');

}

?>
