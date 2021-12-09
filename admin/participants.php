<?php
include 'top.php';
include 'header.php';

$classID = (isset($_GET['classID'])) ? (int) htmlspecialchars($_GET['classID']) : 0;
$classType = (isset($_GET['type'])) ? htmlspecialchars($_GET['type']) : 0;

if($classType == "yoga"){
    $sql = 'SELECT fldProfilePicture, fldFirstName, fldLastName, pmkEmail, ';
    $sql .= 'fldPhone, fldExperience, fldAmountPaid, fldDay, fldStartTime, fldEndTime ';
    $sql .= 'FROM tblUsers ';
    $sql .= 'JOIN tblYogaClassesUsers ON pmkEmail=fpkEmail ';
    $sql .= 'JOIN tblYogaClasses ON pmkClassID=fpkClassID ';
    $sql .= 'WHERE fpkClassID = ? ';
}elseif($classType == "teacher"){
    $sql = 'SELECT fldProfilePicture, fldFirstName, fldLastName, pmkEmail, ';
    $sql .= 'fldPhone, fldAmountPaid, fldDay, fldStartTime, fldEndTime ';
    $sql .= 'FROM tblUsers ';
    $sql .= 'JOIN tblTeacherCoursesUsers ON pmkEmail=fpkEmail ';
    $sql .= 'JOIN tblTeacherCourses ON pmkClassID=fpkClassID ';
    $sql .= 'WHERE fpkClassID = ? ';
}
$data = array($classID);
$allClasses = $thisDatabaseReader->select($sql, $data);

?>
<main class = "participantsMain">
    <h2>Class Participants for</h2>
    <?php 
    print '<h2>'.$allClasses[0]['fldDay'].' '.$allClasses[0]['fldStartTime'].' - '.$allClasses[0]['fldEndTime'].'</h2>';
    ?>
    <section class = 'displayClassParticipants'>
        <?php
        foreach($allClasses as $class){
            print '<section class = "participantSection">';
                //profile pic
                print '<figure class = "participantPic">';
                    print '<img src = "../images/'.$class['fldProfilePicture'].'">';
                print '</figure>';
                //Name
                print '<h2>'.$class['fldFirstName'].' '.$class['fldLastName'].'</h2>';
                //email
                print '<p class = "participantEmail">Email: '.$class['pmkEmail'].'</p>';
                //phone number
                print '<p class = "participantPhone">Phone Number: '.$class['fldPhone'].'</p>';
                //experience
                if($classType == "yoga"){
                    print '<p class = "experience">Experience: '.$class['fldExperience'].'</p>';
                }
                print '<p class = "participantPaid">Amount Paid: $'.$class['fldAmountPaid'].'</p>';
            print '</section>';
        }
        ?>
    </section>
</main>
<?php
include '../footer.php';
?>