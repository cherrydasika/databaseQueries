<?php
include 'dbh.class.php';

class Summary extends Dbh{

public function getUsers(){

    $sql="SELECT * from comments";
    $stmt = $this->connect()->query($sql);
    while($row = $stmt->fetch()){
        echo $row['author']."<br>";
    }

}

public function getUserStmt($author){

    $sql="SELECT * from comments WHERE author =?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$author]);
    $names = $stmt->fetchAll();

    foreach($names as $name){
        echo $name['message']."<br>";
    }
}

public function setUserStmt($author){

    $sql="SELECT * from comments WHERE author =?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$author]);
    $names = $stmt->fetchAll();

    foreach($names as $name){
        echo $name['message']."<br>";
    }
}

public function getBetweenDates($start, $end, $offset){
    $sql = "select Meid, CoolingMode, PlateThick,PlateWidth, PlateLength, PlateSpeed, PDIStartTemp, PDIFinishTemp from platesummary where  date(toc) >= :start AND   date(toc) <= :end LIMIT 10 OFFSET :offsetResults";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':start',$start, PDO::PARAM_INT);
    $stmt->bindParam(':end',$end, PDO::PARAM_INT);
    $stmt->bindParam(':offsetResults',$offset, PDO::PARAM_INT);
    $stmt->execute();
    //$stmt->execute([$start, $end, $offset]);
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    else{
        return "No records";
    }
    
}

public function getPlateSummaryDetails($id){
    $sql = "SELECT * from platesummary where Meid = :meid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':meid',$id, PDO::PARAM_INT);
    $stmt->execute();
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    else{
        return "No records";
    }
    
}

public function getPlateCompDetails($id){
    $sql = "SELECT * from platecomposition where Meid = :meid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':meid',$id, PDO::PARAM_INT);
    $stmt->execute();
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    else{
        return "No records";
    }
    
}

public function getWaterFlowRate($id){
    $sql = "SELECT * from plateflowrate where Meid = :meid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':meid',$id, PDO::PARAM_INT);
    $stmt->execute();
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    else{
        return "No records";
    }
    
}

public function getPrtDetails($id){
   
    $sql = "SELECT DISTINCT prtindex FROM mpprtedgemask WHERE prtindex like concat('%',?,'%')";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    
    
}
}

$summary = new Summary();

?>