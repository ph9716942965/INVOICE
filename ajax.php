<?php
/*
*/
require_once 'config.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT productCode, productName, buyPrice FROM products where quantityInStock !=0 and UPPER($type) LIKE '".strtoupper($name)."%'";
	
	$result = mysqli_query($con, $query);
	$data = [];
	
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['productCode'].'|'.$row['productName'].'|'.$row['buyPrice'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}

//echo '["S700_1691|American Airlines: B767-300|51.15","S700_2466|America West Airlines B757-200|68.8","S700_2834|ATA: B757-300|59.33","S700_4002|American Airlines: MD-11S|36.27"]';exit;


