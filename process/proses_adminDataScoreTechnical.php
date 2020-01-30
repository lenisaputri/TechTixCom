<?php
include "../config/connection.php";

function tampilOperator($con)
{
    $tampilOperator="select * from tabel_operator";
    $resultTampilOperator=mysqli_query($con, $tampilOperator);
    return $resultTampilOperator;
}
    
?>