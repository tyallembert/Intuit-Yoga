<?php
    $file = PATH_PARTS['filename'];
?>
<header>
    <?php 
        if($file == 'insertTeacher' && $isUpdate == 0){
            print '<h1>Insert New Teacher Training</h1>';
        }
        elseif($file == 'insertTeacher' && $isUpdate == 1){
            print '<h1>Update Teacher Training</h1>';
        }
        elseif($file == 'insertYoga' && $isUpdate == 0){
            print '<h1>Insert New Yoga Class</h1>';
        }
        elseif($file == 'insertYoga' && $isUpdate == 1){
            print '<h1>Update Yoga Class</h1>';
        }
        elseif($file == 'teacherCourses'){
            print '<h1>Teacher Trainings</h1>';
        }?>
</header>