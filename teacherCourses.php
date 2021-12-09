<?php
//starts session for passing variables
session_start();
$loggedIn = $_SESSION['loggedIn'];
if($loggedIn){
    include 'loggedIn/top.php';
}else{
    include 'top.php';
}

include 'header.php';

$sql = 'SELECT *';
$sql .= 'FROM tblTeacherCourses ';
$sql .= 'ORDER BY fldStartDate';
$data = '';
$classes = $thisDatabaseReader->select($sql, $data);

//pre define variables
$email = $_SESSION['email'];
$cost = '';
$clickedClassID = '';
$saveData = true;

?>
<main>
<?php
    //put data in database
if(isset($_POST['btnSessionCost']) && $loggedIn){
    //sanitation
    $cost = 750;
    $clickedClassID = (int)getData('hidClassID');

    //validation
    //cost
    if($cost != 750){
        print '<p class = "mistake">Error with cost</p>';
        $saveData = false;
    }
    //classID
    if(!is_numeric($clickedClassID)){
        print '<p class = "mistake">Error with class ID</p>';
        $saveData = false;
    }

    if($saveData){
        $sql = 'INSERT INTO tblTeacherCoursesUsers SET ';
        $sql .= 'fpkEmail = ?, ';
        $sql .= 'fpkClassID = ?, ';
        $sql .= 'fldAmountPaid = ?,';
        $sql .= 'fldDateSignup = NOW()';

        $data = array($email, $clickedClassID, $cost);
        
        //==Save to AdopterWildlife table==
        if(DEBUG){
            print $thisDatabaseReader->displayQuery($sql, $data);
        }else{
            $thisDatabaseWriter->insert($sql, $data);
            print '<section class = "successfulDatabase">';
                print '<h2>You have successfully signed up!</h2>';
                print '<a href = "index.php">Continue</a>';
            print '</section>';
        }
    }
}elseif((isset($_POST['btnIndividualCost'])||isset($_POST['btnSessionCost']))&& !$loggedIn){
    header("Location: signup.php");
}
    ?>
    <section class = "teacherParagraphs">
        <section class = "beginnerClass">
            <h2>Yoga, Mindfulness and Social-Emotional Learning for Teachers</h2>
            <p>A teacher’s energy is the bedrock of classroom culture. When we face our students with equanimity and optimism, we draw out the best they have to offer. The challenges of the job and demands of students, families, and the school system can take a toll, however, and make it difficult to find the inner resources needed to do one’s best work day after day. </p>
            <p>This course is about strengthening your agency, your core being, and your emotional intelligence, so that you have the internal resources needed to face the rigor of teaching every day. We will explore centering practices of yoga, mindfulness, breathwork and meditation, with a particular focus on how to use them while teaching. Classes include direct instruction, time for individual practice, group discussion and application, and reflection about applying each practice for use with students. </p>
            <p>Our goal is to enhance classroom culture by building a community of resilient, emotionally intelligent educators with the skills to model and teach mindfulness and community well-being with their students.</p>
            <figure class = 'teacherFig1'>
                <img src = 'images/example.png'>
            </figure>
        </section>
    </section>
    <section class = "teacherCalenderContainer">
        <?php
            foreach($classes as $class){
                print '<section class = "teacherForm">';
                    //Course Name
                    print '<h2>'.$class['fldCourseName'].'</h2>';
                    //start date and end date
                    print '<p class = "teacherDates">'.$class['fldStartDate'].' - '.$class['fldEndDate'].'</p>';
                    print '<p>'.$class['fldStartTime'].' - '.$class['fldEndTime'].' daily</p>';
                    //title
                    print '<h3>'.$class['fldTitle'].'</h3>';
                    //description
                    print '<p class = "teacherDescription">'.$class['fldDescription'].'</p>';
                    //participants
                    print '<p class = "teacherParticipants">Max Participants: '.$class['fldParticipants'].'</p>';
                    //Session Cost
                    print '<section class = "teacherCostSection">';
                        print '<p><span class = "moneyAmount">$'.$class['fldSessionCost'].'</span> per session</p>';
                        print '<form action = "#" method = "POST" class = "sessionForm">';
                            print '<input
                                        type = "hidden"
                                        name = "hidClassID"
                                        value = "'.$class['pmkClassID'].'"
                                    >';
                            print '<input id = "btnSessionCost"     
                                        name = "btnSessionCost"
                                        type = "submit"
                                        value = "Venmo"
                                    >';
                        print '</form>';
                        print '<form action = "#" method = "POST" class = "sessionForm">';
                            print '<input
                                        type = "hidden"
                                        name = "hidClassID"
                                        value = "'.$class['pmkClassID'].'"
                                    >';
                            print '<input id = "btnSessionCost"     
                                        name = "btnSessionCost"
                                        type = "submit"
                                        value = "School Purchase"
                                    >';
                        print '</form>';
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