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
            <h3>Active</h3>
            <section class = 'activeYoga'>
            <?php
            foreach($allYogaClasses as $class){
                if($class['fldActiveClass'] == 1){
                    print '<section class = "yogaForm">';
                        print '<a href = "deleteCourse.php?classID='.$class['pmkClassID'].'&type=yoga&active=1" class = "deleteClass">-</a>';
                        //day
                        print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                        //start date and end date
                        print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                        //title
                        print '<h3>'.$class['fldTitle'].'</h3>';
                        //participants
                        print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                        //participants
                        print '<a href = "participants.php?classID='.$class['pmkClassID'].'&type=yoga" class = "goToParticipants">Participants</a>';
                        //Update
                        print '<a href = "insertYoga.php?classID='.$class['pmkClassID'].'&isUpdate=1&active=1" class = "goToUpdate">Update</a>';
                    print '</section>';
                }
            }
            ?>
            </section>
            <h3>Inactive</h3>
            <section class = 'inactiveYoga'>
            <?php
            foreach($allYogaClasses as $class){
                if($class['fldActiveClass'] == 0){
                    print '<section class = "yogaForm">';
                        print '<a href = "deleteCourse.php?classID='.$class['pmkClassID'].'&type=yoga&active=0" class = "addClass">+</a>';
                        //day
                        print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                        //start date and end date
                        print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                        //title
                        print '<h3>'.$class['fldTitle'].'</h3>';
                        //participants
                        print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                        //participants
                        print '<a href = "participants.php?classID='.$class['pmkClassID'].'&type=yoga" class = "goToParticipants">Participants</a>';
                        //Update
                        print '<a href = "insertTeacher.php?classID='.$class['pmkClassID'].'&isUpdate=1&active=0" class = "goToUpdate">Update</a>';
                    print '</section>';
                }
            }
            ?>
            </section>
        </section>
        <h2>Teacher Courses</h2>
        <section class = 'displayTeacherSection'>
            <h3>Active</h3>
            <section class = 'activeTeacher'>
            <?php
            foreach($allTeacherCourses as $class){
                if($class['fldActiveClass'] == 1){
                    print '<section class = "teacherForm">';
                        print '<a href = "deleteCourse.php?classID='.$class['pmkClassID'].'&type=teacher&active=1" class = "deleteClass">-</a>';
                        //Course Name
                        print '<h2>'.$class['fldCourseName'].'</h2>';
                        //start date and end date
                        print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                        //title
                        print '<h3>'.$class['fldTitle'].'</h3>';
                        //participants
                        print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                        //participants
                        print '<a href = "participants.php?classID='.$class['pmkClassID'].'&type=teacher" class = "goToParticipants">Participants</a>';
                        //Update
                        print '<a href = "insertTeacher.php?classID='.$class['pmkClassID'].'&isUpdate=1&active=1" class = "goToUpdate">Update</a>';
                    print '</section>';
                }
            }
            ?>
            </section>
            <h3>Inactive</h3>
            <section class = 'inactiveTeacher'>
            <?php
            foreach($allTeacherCourses as $class){
                if($class['fldActiveClass'] == 0){
                    print '<section class = "teacherForm">';
                        print '<a href = "deleteCourse.php?classID='.$class['pmkClassID'].'&type=teacher&active=0" class = "addClass">+</a>';
                        //Course Name
                        print '<h2>'.$class['fldCourseName'].'</h2>';
                        //start date and end date
                        print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                        //title
                        print '<h3>'.$class['fldTitle'].'</h3>';
                        //participants
                        print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                        //participants
                        print '<a href = "participants.php?classID='.$class['pmkClassID'].'&type=teacher" class = "goToParticipants">Participants</a>';
                        //Update
                        print '<a href = "insertTeacher.php?classID='.$class['pmkClassID'].'&isUpdate=1&active=0" class = "goToUpdate">Update</a>';
                    print '</section>';
                }
            }
            ?>
            </section>
        </section>
    </section>
</main>
<?php
include '../footer.php';
?>