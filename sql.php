<?php
include 'top.php';
?>

<pre>
CREATE TABLE tblUsers (
    fldProfilePicture VARCHAR(50),
    fldFirstName VARCHAR(50),
    fldLastName VARCHAR(50),
    fldEmail VARCHAR(50),
    fldPhone VARCHAR(15),
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
    fldParticipants TINYINT(1)
);
</pre>

<?php
include 'footer.php';
?>