<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");
	require_once('conn.php');
	$result = $conn->query("SELECT * FROM singlefoodwithoption INNER JOIN singlefood USING (SFID) WHERE OPID = '000' AND (SFID LIKE 'M0%' OR SFID LIKE 'A0%')"); 
	if (!$result) {
		die($conn->error);
	  }
	$data =array();
	$i=0;
	while ($row = $result->fetch_assoc()) {
		$data[$i] = array ("FoodID"=>$row['SFID'], "name"=>$row['Name'], "price"=>$row['Price'], "img"=>$row['img']);
		$i++;
	  }
	  echo json_encode($data,JSON_UNESCAPED_UNICODE);
?>
