<nav>
    <p>I<span>.</span>Y<span>.</span>E<span>.</span>S</p>
    <section>
        <a class = "<?php
        if (PATH_PARTS['filename'] == "courses"){
            print 'activePage';
        }
        ?>" href = "courses.php">Paticipants</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "insertYoga"){
            print 'activePage';
        }
        ?>" href = "insertYoga.php">New Yoga Class</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "insertTeacher"){
            print 'activePage';
        }
        ?>" href = "insertTeacher.php">New Teacher Training</a>

        <a class = "<?php
        if (PATH_PARTS['filename'] == "login"){
            print 'activePage';
        }
        ?>" href = "../index.php">Logout</a>
    </section>
</nav>