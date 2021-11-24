<?php
    $file = PATH_PARTS['filename'];
?>
<header>
    <?php if($file == 'index'){
            print '<h1>Intuit Yoga<br>and<br>Educational Services</h1>';
            print '<figure class = "earthIcon"><img src="images/earth.png"></figure>';
            print '<div class = "creditsTo">Icons made by <a href="https://www.flaticon.com/authors/uniconlabs" title="Uniconlabs">Uniconlabs</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
            print '<figure class = "yurtIcon"><img src="images/yurt.png"></figure>';
            print '<div class = "creditsTo">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
            print '<figure class = "forestIcon"><img src="images/forest.png"></figure>';
            print '<div class = "creditsTo">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
        }
        elseif($file == 'yogaClasses'){
            print '<h1>Yoga Classes</h1>';
            print '<figure><img src="images/yoga.png"></figure>';
            print '<div class = "creditsTo"> Icons made by <a href="https://www.flaticon.com/authors/monkik" title="monkik"> monkik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
        } 
        elseif($file == 'teacherCourses'){
            print '<h1>Teacher Courses</h1>';
            print '<figure><img src="images/teacher.png"></figure>';
            print '<div class = "creditsTo"> Icons made by <a href="https://www.flaticon.com/authors/monkik" title="monkik"> monkik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>';
        }?>
</header>