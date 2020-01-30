<?php
include '../classes/index.class.php';

if(isset($_POST['id'])){
    $id = filter_var($_POST['id'],FILTER_SANITIZE_STRING) ;    
    $arr_Summary = $summary->getPlateDetails($id);
    echo json_encode($arr_Summary);
}