<?php
include 'top.php';
include 'header.php';

$sqluser = 'SELECT *';
$sqluser .= 'FROM tblUsers';
$datauser = '';
$allUsers = $thisDatabaseReader->select($sqluser, $datauser);

?>
<main class = "indexMain">
    
</main>
<?php
include 'footer.php';
?>