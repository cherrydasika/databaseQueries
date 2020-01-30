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

public function getBetweenDates($start, $end){
    $sql = "select * from mppdiplate_phy where  PRODUCEDDATE >= ? AND   PRODUCEDDATE <= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$start, $end]);
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    else{
        return "No records";
    }
    
}

public function getPlateDetails($id){
    $sql = "SELECT mppdiplate_phy.MEID, mppdiplate_phy.PLATETHICK, mppdiplate_phy.PLATEWIDTH, mppdiplate_phy.PLATELENGTH, 
            mpcomposition_phy.MN, mpcomposition_phy.CU, mpcomposition_phy.AL FROM mppdiplate_phy
            INNER JOIN mpcomposition_phy ON mppdiplate_phy.MEID = mpcomposition_phy.MEID AND mpcomposition_phy.MEID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $records =$stmt->fetchAll();
    $totalRecords =  count($records);
    if($totalRecords>0){
        return $records;
    }
    else{
        return "No records";
    }
    
}
}

$summary = new Summary();

?>