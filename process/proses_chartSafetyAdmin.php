<?php
header('Content-Type: application/json');

include "../config/connection.php";

$tampilChartDataSafety = "SELECT tss.*, tp.* FROM tabel_score_safety tss, tabel_operator tp WHERE tss.id_operator = tp.id_operator ORDER BY tp.nama";

$resultTampilChartDataSafety = mysqli_query($con,$tampilChartDataSafety);

$data = array();
foreach ($resultTampilChartDataSafety as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>