<?php
    $file = PATH_PARTS['filename'];
?>
<header>
    <?php if($file == 'index'){
            print '<h1>Intuit Yoga<br>and<br>Educational Services</h1>';
            }
        elseif($file == 'yogaClasses'){
            print '<h1>Yoga Classes</h1>';
            } 
        elseif($file == 'teacherCourses'){
            print '<h1>Teacher Trainings</h1>';
            }?>
</header>