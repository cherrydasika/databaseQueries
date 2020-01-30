<?php
    session_start(); 
    session_destroy();    
?>

<!DOCTYPE html>
<html>
<head>
<script>

alert("Logging off..");

localStorage.clear();
location.href='http://localhost:8085/baosteel/login.php';


</script>
</head>
<body>

</body>
</html>

