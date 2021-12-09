<?php
include 'top.php';
include 'header.php';

$classID = (isset($_GET['classID'])) ? (int) htmlspecialchars($_GET['classID']) : 0;
$classType = (isset($_GET['type'])) ? htmlspecialchars($_GET['type']) : 0;
$active = (isset($_GET['active'])) ? (int) htmlspecialchars($_GET['active']) : 0;

if($classType == "yoga"){
    $sql = 'SELECT fldActive';
    $sql .= 'FROM tblYogaClasses';
    $sql .= 'WHERE pmkClassID = ?';
}elseif($classType == "teacher"){
    $sql = 'SELECT *';
    $sql .= 'FROM tblTeacherCourses';
    $sql .= 'WHERE pmkClassID = ?';
}
$data = array($classID);
$theClass = $thisDatabaseReader->select($sql, $data);

if(isset($_POST['btnConfirmRemove'])){
    if($active == 1){
        if($classType == "yoga"){
            $sqlChange = 'UPDATE tblYogaClasses ';
            $sqlChange .= 'SET fldActiveClass = ? ';
            $sqlChange .= 'WHERE pmkClassID = ? ';
        }elseif($classType == "teacher"){
            $sqlChange = 'UPDATE tblTeacherCourses ';
            $sqlChange .= 'SET fldActiveClass = ? ';
            $sqlChange .= 'WHERE pmkClassID = ? ';
        }
        $dataChange = array(0,$classID);
    }elseif($active == 0){
        if($classType == "yoga"){
            $sqlChange = 'UPDATE tblYogaClasses ';
            $sqlChange .= 'SET fldActiveClass = ? ';
            $sqlChange .= 'WHERE pmkClassID = ? ';
        }elseif($classType == "teacher"){
            $sqlChange = 'UPDATE tblTeacherCourses ';
            $sqlChange .= 'SET fldActiveClass = ? ';
            $sqlChange .= 'WHERE pmkClassID = ? ';
        }
        $dataChange = array(1,$classID);
    }
    $thisDatabaseWriter->insert($sqlChange, $dataChange);
    header('Location: courses.php');
}
?>
<main class = "confirmRemoveMain">
    <form action = "#" method = "POST" class = "confirmRemoveForm">
        <?php
        if($active == 1){
            print '<h2>Are you sure you want to make this class inactive?</h2>';
        }elseif($active == 0){
            print '<h2>Are you sure you want to make this class active?</h2>';
        }
        ?>
        <input type = 'submit'
            name = 'btnConfirmRemove'
            value = 'Confirm'
        >
        <a href = "courses.php">Cancel</a>
    </form>
</main>
<?php
include '../footer.php';
?>