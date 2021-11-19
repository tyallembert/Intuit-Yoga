<?php
    $file = PATH_PARTS['filename'];
?>
<header>
    <?php if($file == 'index'){
            print '<h1>Intuit Yoga<br>and<br>Educational Services</h1>';
        }
        elseif($file == 'yogaClasses'){
            print '<h1>Yoga Services</h1>';
            print '<figure><img src="images/yoga.png"></figure>';
            print '<div> Icons made by <a href="https://www.flaticon.com/authors/monkik" title="monkik"> monkik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
        } 
        elseif($file == 'teacherCourses'){
            print '<h1>Teacher Services</h1>';
            print '<figure><img src="images/teacher.png"></figure>';
            print '<div> Icons made by <a href="https://www.flaticon.com/authors/monkik" title="monkik"> monkik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
        }?>
</header>