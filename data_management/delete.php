<?php
	//In case no GET information have been sent to the page
	if(!isset($_GET['tbl']))
	{
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
	
	//Populate the variables with the information sent through GET
	$table = $_GET['tbl'];
	$column = $_GET['col'];
	$value = $_GET['val'];
	
	//Include server conn and query scripts
	require_once '..\functions/server.php';
	
	//Mount the sql string with the variables
	$sql = "DELETE FROM " . $table . " WHERE " . $column . "=" . $value;
	
	//Execute the query
	check_data($sql) or die("Erro: " . mysqli_error($db_link) . "<br><br><a href='javascript:history.go(-1)' title='Go back to last page'>Back</a>");
	
	if(!isset($_GET['dest']))
	{
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
	else
	{
		header("Location: " . $_GET['dest']);
	}
?>