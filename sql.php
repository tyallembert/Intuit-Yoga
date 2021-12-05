<?php
include 'top.php';
?>

<h2>Create Users Table</h2>
<pre>
CREATE TABLE tblUsers (
    fldProfilePicture VARCHAR(50),
    fldFirstName VARCHAR(50),
    fldLastName VARCHAR(50),
    pmkEmail VARCHAR(50) NOT NULL PRIMARY KEY,
    fldPhone VARCHAR(15),
    fldExperience VARCHAR(15),
    fldPassword VARCHAR(100)
);
</pre>
<h2>Create Yoga Classes Table</h2>
<pre>
CREATE TABLE tblYogaClasses (
    pmkClassID INT AUTO_INCREMENT PRIMARY KEY,
    fldDay VARCHAR(15),
    fldStartTime VARCHAR(10),
    fldEndTime VARCHAR(10),
    fldStartDate VARCHAR(15),
    fldEndDate VARCHAR(15),
    fldTitle VARCHAR(50),
    fldDescription VARCHAR(200),
    fldSessionCost TINYINT(1),
    fldIndividualCost TINYINT(1),
    fldParticipants TINYINT(1)
);
</pre>
<h2>Create YogaClassesUsers Table</h2>
<pre>
CREATE TABLE tblYogaClassesUsers (
    pmkSpecificID INT AUTO_INCREMENT PRIMARY KEY,
    fpkEmail VARCHAR(50),
    fpkClassID TINYINT(1),
    fldAmountPaid TINYINT(1),
    fldDateSignup DATETIME
);
</pre>
<h2>Create Teacher Courses Table</h2>
<pre>
CREATE TABLE tblTeacherCourses (
    pmkClassID INT AUTO_INCREMENT PRIMARY KEY,
    fldDay VARCHAR(15),
    fldStartTime VARCHAR(10),
    fldEndTime VARCHAR(10),
    fldStartDate VARCHAR(15),
    fldEndDate VARCHAR(15),
    fldTitle VARCHAR(50),
    fldDescription VARCHAR(200),
    fldSessionCost TINYINT(1),
    fldIndividualCost TINYINT(1),
    fldParticipants TINYINT(1)
);
</pre>
<h2>Create TeacherCoursesUsers Table</h2>
<pre>
CREATE TABLE tblTeacherCoursesUsers (
    pmkSpecificID INT AUTO_INCREMENT PRIMARY KEY,
    fpkEmail VARCHAR(50),
    fpkClassID TINYINT(1),
    fldAmountPaid TINYINT(1),
    fldDateSignup DATETIME
);
</pre>

<?php
include 'footer.php';
?>