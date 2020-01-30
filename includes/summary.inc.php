<?php

include '../classes/index.class.php';

if(isset($_POST['start'])){
    $start = $_POST['start'];
    $end = $_POST['end'];
    $arr_Summary = $summary->getBetweenDates($start, $end);
    echo json_encode($arr_Summary);
}