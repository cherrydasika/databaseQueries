<?php
include '../classes/index.class.php';
$functionType = $_POST['functionType'];

if($functionType==1)
{
    if(isset($_POST['plateId'])){

        $id = filter_var($_POST['plateId'],FILTER_SANITIZE_STRING) ;         
        $arr_Summary = $summary->getPlateSummaryDetails($id);
        echo json_encode($arr_Summary);
    }
}
else if($functionType==2)
{
    if(isset($_POST['plateId'])){

        $id = filter_var($_POST['plateId'],FILTER_SANITIZE_STRING) ;         
        $arr_Summary = $summary->getPlateCompDetails($id);
        echo json_encode($arr_Summary);
    }
}
else if($functionType==3)
{
    if(isset($_POST['plateId'])){

        $id = filter_var($_POST['plateId'],FILTER_SANITIZE_STRING) ;         
        $arr_Summary = $summary->getWaterFlowRate($id);
        echo json_encode($arr_Summary);
    }
}
