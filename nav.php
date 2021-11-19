<nav>
    <p>I<span>.</span>Y<span>.</span>E<span>.</span>S</p>
    <section>
        <a class = "<?php
        if (PATH_PARTS['filename'] == "index"){
            print 'activePage';
        }
        ?>" href = "index.php">Home</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "yogaClasses"){
            print 'activePage';
        }
        ?>" href = "yogaClasses.php">Yoga</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "teacherCourses"){
            print 'activePage';
        }
        ?>" href = "teacherCourses.php">Teacher Courses</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "contact"){
            print 'activePage';
        }
        ?>" href = "contact.php">Contact</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "login"){
            print 'activePage';
        }
        ?>" href = "login.php">Login</a>
    </section>
</nav>