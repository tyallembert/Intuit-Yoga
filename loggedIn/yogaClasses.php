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
                print '<section class = "yogaForm">';
                    //day
                    print '<h2>'.$class['fldDay'].' '.$class['fldStartTime'].' - '.$class['fldEndTime'].'</h2>';
                    //start date and end date
                    print '<p class = "yogaDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                    //title
                    print '<h3>'.$class['fldTitle'].'</h3>';
                    //description
                    print '<p class = "yogaDescription">'.$class['fldDescription'].'</p>';
                    //participants
                    print '<p class = "yogaParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                    //Session Cost
                    print '<section class = "costSection">';
                        print '<section>';
                            print '<p><span class = "moneyAmount">$90</span> per session</p>';
                            print '<input id = "btnSessionCost"     
                                        name = "btnSessionCost"
                                        type = "button"
                                        value = "Sign up"
                                    >';
                        print '</section>';
                        //Individual Cost
                        print '<section>';
                            print '<p><span class = "moneyAmount">$18</span> per individual class</p>';
                            print '<input id = "btnIndividualCost"     
                                        name = "btnIndividualCost"
                                        type = "button"
                                        value = "Sign up"
                                    >';
                        print '</section>';
                    print '</section>';
                    //ask a question
                    print '<section class = "askQuestion">';
                        print '<input id = "btnQuestion"
                                name = "btnQuestion"
                                type = "button"
                                value = "Ask a question">';
                    print '</section>';
                print '</section>';
            }
        ?>
    </section>
</main>
<?php
include 'footer.php';
?>