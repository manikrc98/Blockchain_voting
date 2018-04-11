<?php
	include "backend/connection.php";
	include "backend/functions.php";
	$_SESSION['crPage'] = 'test.php';
	include "backend/index.php";
	$add = '13nCfT3erYg2URKpbUmKfSbkmxZd8oUHMZm31Y';
	echo getbal($add);
?>

