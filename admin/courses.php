<?php
include 'top.php';
include 'header.php';

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
    <section class = "allStudentsSection">
        <h2>Yoga Classes</h2>
        <section class = 'displayYogaSection'>
            <?php
            foreach($allYogaClasses as $class){
                print '<section class = "yogaForm">';
                    //day
                    print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                    //start date and end date
                    print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                    //title
                    print '<h3>'.$class['fldTitle'].'</h3>';
                    //participants
                    print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                    //participants
                    print '<a href = "participants.php?classID='.$class['pmkClassID'].'&type=yoga">Participants</a>';
                print '</section>';
            }
            ?>
        </section>
        <h2>Teacher Courses</h2>
        <section class = 'displayTeacherSection'>
            <?php
            foreach($allYogaClasses as $class){
                print '<section class = "yogaForm">';
                    //day
                    print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                    //start date and end date
                    print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                    //title
                    print '<h3>'.$class['fldTitle'].'</h3>';
                    //participants
                    print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                    //participants
                    print '<a href = "participants.php?classID='.$class['fldClassID'].'&type=teacher">Participants</a>';
                print '</section>';
            }
            ?>
        </section>
    </section>
</main>
<?php
include 'footer.php';
?>