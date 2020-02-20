<?php

include '../classes/index.class.php';

$functionType = $_POST['functionType'];
if($functionType==1){
    if(isset($_POST['start'])){
        $start = $_POST['start'];
        $end = $_POST['end'];
        $pageNum = $_POST['pageNo'];
        $offset = 10 * $pageNum;
        $arr_Summary = $summary->getBetweenDates($start, $end, $offset);
        echo json_encode($arr_Summary);
    }
}
