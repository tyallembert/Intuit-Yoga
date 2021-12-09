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
$sql .= 'FROM tblYogaClasses ';
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
    $cost = 90;
    $clickedClassID = (int)getData('hidClassID');

    //validation
    //cost
    if($cost != 90){
        print '<p class = "mistake">Error with cost</p>';
        $saveData = false;
    }
    //classID
    if(!is_numeric($clickedClassID)){
        print '<p class = "mistake">Error with class ID</p>';
        $saveData = false;
    }

    if($saveData){
        $sql = 'INSERT INTO tblYogaClassesUsers SET ';
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
}elseif(isset($_POST['btnIndividualCost']) && $loggedIn){
    $cost = 18;
    $clickedClassID = (int)getData('hidClassID');

    //validation
    //cost
    if($cost != 18){
        print '<p class = "mistake">Error with cost</p>';
        $saveData = false;
    }
    //classID
    if(!is_numeric($clickedClassID)){
        print '<p class = "mistake">Error with class ID</p>';
        $saveData = false;
    }

    if($saveData){
        $sql = 'INSERT INTO tblYogaClassesUsers SET ';
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
    <section class = "yogaParagraphs">
        <section class = "beginnerClass">
            <h2>Beginner Classes</h2>
            <p>Beginner classes include poses that are straightforward and clear for the beginning yoga student. We are guided through each pose and offered varied expressions, props and accomodations. Most poses are held for about 30 seconds in sequences that inspire the body to let go of stress and the mind to still. We will also explore vinyasa (series of postures) and gentle breathwork. Classes are 75 minutes long, including a 10-15 minute quiet meditation at the end.</p>
            <figure class = 'yogaFig1'>
                <img src = 'images/example.png'>
            </figure>
        </section>
        <section class = "IntermediateClass">
            <h2>Beginner/Intermediate Classes</h2>
            <p>Beginner/Intermediate classes include simple poses for warm-ups and stretching, and also some more challenging strengthening poses and vinyasas. Students are guided through the full class, with offerings of accommodations and props to meet the needs of each individual learner. Classes are 75 minutes long, including a 10 - 15 minute quiet meditation at the end.</p>
            <figure class = 'yogaFig2'>
                <img src = 'images/example.png'>
            </figure>
        </section>
    </section>
    <section class = "yogaCalenderContainer">
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
                        print '<form action = "#" method = "POST" class = "sessionForm">';
                            print '<input
                                        type = "hidden"
                                        name = "hidClassID"
                                        value = "'.$class['pmkClassID'].'"
                                    >';
                            print '<p><span class = "moneyAmount">$90</span> per session</p>';
                            print '<input id = "btnSessionCost"     
                                        name = "btnSessionCost"
                                        type = "submit"
                                        value = "Sign up"
                                    >';
                        print '</form>';
                        //Individual Cost
                        print '<form action = "#" method = "POST" class = "individualForm">';
                            print '<input
                                        type = "hidden"
                                        name = "hidClassID"
                                        value = "'.$class['pmkClassID'].'"
                                    >';
                            print '<p><span class = "moneyAmount">$18</span> per individual class</p>';
                            print '<input id = "btnIndividualCost"     
                                        name = "btnIndividualCost"
                                        type = "submit"
                                        value = "Sign up"
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