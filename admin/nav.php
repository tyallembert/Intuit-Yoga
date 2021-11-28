<nav>
    <p>I<span>.</span>Y<span>.</span>E<span>.</span>S</p>
    <section>
        <a class = "<?php
        if (PATH_PARTS['filename'] == "insertYoga"){
            print 'activePage';
        }
        ?>" href = "insertYoga.php">New Yoga Classes</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "yogaClasses"){
            print 'activePage';
        }
        ?>" href = "yogaClasses.php">New Teacher Training</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "teacherCourses"){
            print 'activePage';
        }
        ?>" href = "teacherCourses.php">Teacher Courses</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "login"){
            print 'activePage';
        }
        ?>" href = "../index.php">Logout</a>
    </section>
</nav>