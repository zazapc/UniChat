<?php

	include "database.class.php";
	$database = new Database();
	$conn = $database->connect();

	// Prepare query
	$stmt = $conn->prepare('SELECT ready FROM conversations WHERE id=:id');
	$stmt->execute(array(':id' => $_POST['conversation_id']));
	
	// Execute it
	$row = $stmt->fetch();
	
	if (!$row)
		echo json_encode(array('response' => -1));
	else
		echo json_encode(array('response' => (int)$row[0]));

?>