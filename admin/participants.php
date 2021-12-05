<?php
include 'top.php';
include 'header.php';

$classID = (isset($_GET['classID'])) ? (int) htmlspecialchars($_GET['classID']) : 0;

$sqlYoga = 'SELECT *';
$sqlYoga .= 'FROM tblYogaClasses';
$dataYoga = '';
$allYogaClasses = $thisDatabaseReader->select($sqlYoga, $dataYoga);

$sqlTeacher = 'SELECT *';
$sqlTeacher .= 'FROM tblTeacherCourses';
$dataTeacher = '';
$allTeacherCourses = $thisDatabaseReader->select($sqlTeacher, $dataTeacher);

?>
<main>
    <section class = 'displayYogaSection'>
        <h2>Class Participants</h2>
        <?php
        foreach($allYogaClasses as $class){
            print '<section class = "yogaForm">';
                //day
                print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                //start date and end date
                print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                //title
                print '<h3>'.$class['fldTitle'].'</h3>';
                //description
                print '<p class = "yogaDescription">'.$class['fldDescription'].'</p>';
                //participants
                print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                //ask a question
                print '<section class = "askQuestion">';
                    print '<a href = "participants.php">Participants</a>';
                print '</section>';
            print '</section>';
        }
        ?>
    </section>
    <section class = 'displayTeacherSection'>
        <h2>Teacher Courses</h2>
    </section>
</main>
<?php
include 'footer.php';
?>