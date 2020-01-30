<?php
    include 'classes/index.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
       
        echo json_encode($summary->getBetweenDates('2017-01-24', '2017-01-28'));
    ?>
</body>
</html>