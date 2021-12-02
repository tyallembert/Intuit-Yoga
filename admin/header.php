<?php
    $file = PATH_PARTS['filename'];
?>
<header>
    <?php if($file == 'insertTeacher'){
            print '<h1>Insert New Teacher Training</h1>';
            }
        elseif($file == 'insertYoga'){
            print '<h1>Insert New Yoga Class</h1>';
            } 
        elseif($file == 'teacherCourses'){
            print '<h1>Teacher Trainings</h1>';
            }?>
</header>