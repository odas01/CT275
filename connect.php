<?php 
	$conn = @mysqli_connect('localhost', 'root', '', 'ct275_project');
	if (!$conn) {
		echo "Lỗi";
	}
	mysqli_set_charset($conn, 'utf8');
?>