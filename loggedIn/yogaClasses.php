<?php
include 'top.php';

include 'header.php';

$sql = 'SELECT *';
$sql .= 'FROM tblYogaClasses ';
$sql .= 'ORDER BY fldStartDate';
$data = '';
$classes = $thisDatabaseReader->select($sql, $data);

$sqluser = 'SELECT *';
$sqluser .= 'FROM tblUsers';
$sqluser .= 'WHERE pmkEmail = ?';
$datauser = array($email);
$currentUser = $thisDatabaseReader->select($sqluser, $datauser);
?>
<main>
    <section class = "calenderContainer">
        <?php
            foreach($classes as $class){
                print '<section>';
                    print '<form action = "#" method = "POST">';
                        //day
                        print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                        //start date and end date
                        print '<p>'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                        //title
                        print '<h3>'.$class['fldTitle'].'</h3>';
                        //description
                        print '<p>'.$class['fldDescription'].'</p>';
                        print '<fieldset class = "costFieldset">';
                            //Session Cost
                            print '<section>';
                                print '<p>Cost per Session</p>';
                                print '<input id = "radSessionCost"     
                                            name = "radCost"
                                            type = "radio"
                                        >';
                                print '<label for = "radSessionCost">$'.$class['fldSessionCost'].'</label>';
                            print '</section>';
                            //Individual Cost
                            print '<section>';
                                print '<p>Individual Class</p>';
                                print '<input id = "radIndividualCost"     
                                            name = "radCost"
                                            type = "radio"
                                        >';
                                print '<label for = "radIndividualCost">$'.$class['fldIndividualCost'].'</label>';
                            print '</section>';
                        print '</fieldset>';
                        //participants
                        print '<p>Max Participants: '.$class['fldParticipants'].'</p>';
                        //submit
                        print '<fieldset class = "yogaSubmit">';
                            print '<input id = "btnSubmit"
                                    name = "btnSubmit"
                                    type = "submit"
                                    value = "Sign Up">';
                        print '</fieldset>';
                    print '</form>';
                print '</section>';
            }
        ?>
    </section>
</main>
<?php
include 'footer.php';
?>