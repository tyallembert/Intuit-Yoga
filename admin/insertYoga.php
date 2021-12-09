<?php
include 'top.php';

include 'header.php';

$dayOfClass = '';
$startTime = '';
$endTime = '';
$startDate = '';
$endDate = '';
$classTitle = '';
$classDescription = '';
$sessionCost = '';
$individualCost = '';
$participants = '';

$saveData = true;

if(isset($_POST['btnSubmit'])){
    if(DEBUG){
        print '<p>Post Array:</p><pre>';
        print_r($_POST);
        print '</pre>';
    }
    //===Sanatize Data===
    $dayOfClass = getData('txtDayOfClass');
    $startTime = getData('txtStartTime');
    $endTime = getData('txtEndTime');
    $startDate = getData('txtStartDate');
    $endDate = getData('txtEndDate');
    $classTitle = getData('txtClassTitle');
    $classDescription = getData('txtClassDescription');
    $sessionCost = (int)getData('txtSessionCost');
    $individualCost = (int)getData('txtIndividualCost');
    $participants = (int)getData('txtParticipants');

    //===Validate Data===
    //===Day of the class===
    if ($dayOfClass == ""){
        print '<p class = "mistake">Please enter day of class</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($dayOfClass)){
        print '<p class = "mistake">The Day of the class has invalid characters</p>';
        $saveData == false;
    }
    //===Start Time of the class===
    if ($startTime == ""){
        print '<p class = "mistake">Please enter the start time of class</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($startTime)){
        print '<p class = "mistake">The start time of the class has invalid characters</p>';
        $saveData == false;
    }
    //===End Time of the class===
    if ($endTime == ""){
        print '<p class = "mistake">Please enter the ebnd time of class</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($endTime)){
        print '<p class = "mistake">The end time of the class has invalid characters</p>';
        $saveData == false;
    }
    //===Class Title===
    if ($classTitle == ""){
        print '<p class = "mistake">Please enter the title of the class</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($classTitle)){
        print '<p class = "mistake">The title of the class has invalid characters</p>';
        $saveData == false;
    }
    //===Class Description===
    if ($classDescription == ""){
        print '<p class = "mistake">Please enter the description of the class</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($classDescription)){
        print '<p class = "mistake">The description of the class has invalid characters</p>';
        $saveData == false;
    }
    //===Session Cost===
    if ($sessionCost == ""){
        print '<p class = "mistake">Please enter the session cost</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($sessionCost)){
        print '<p class = "mistake">The session cost should only be numbers</p>';
        $saveData == false;
    }
    //===Session Cost===
    if ($individualCost == ""){
        print '<p class = "mistake">Please enter the individual cost</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($individualCost)){
        print '<p class = "mistake">The individual cost should only be numbers</p>';
        $saveData == false;
    }
    //===Class Participants===
    if ($participants == ""){
        print '<p class = "mistake">Please enter the max participants of the class</p>';
        $saveData = false;
    }
    elseif (!verifyAlphaNum($participants)){
        print '<p class = "mistake">The max participants of the class should only contain numbers</p>';
        $saveData == false;
    }


    //======Save data=======
    if($saveData){

        if($isUpdate){
            $sql = 'UPDATE tblYogaClasses SET ';
            $sql .= 'fldDay = ?, ';
            $sql .= 'fldStartTime = ?, ';
            $sql .= 'fldEndTime = ?, ';
            $sql .= 'fldStartDate = ?, ';
            $sql .= 'fldEndDate = ?, ';
            $sql .= 'fldTitle = ?, ';
            $sql .= 'fldDescription = ?, ';
            $sql .= 'fldSessionCost = ?, ';
            $sql .= 'fldIndividualCost = ?, ';
            $sql .= 'fldParticipants = ? ';
            $sql .= 'WHERE pmkClassID = ' . $classID . ';';

            $data = array($dayOfClass, $startTime, $endTime, $startDate, $endDate, $classTitle, $classDescription, $sessionCost, $individualCost, $participants);
                
        }else{
            $sql = 'INSERT INTO tblYogaClasses SET ';
            $sql .= 'fldDay = ?, ';
            $sql .= 'fldStartTime = ?, ';
            $sql .= 'fldEndTime = ?, ';
            $sql .= 'fldStartDate = ?, ';
            $sql .= 'fldEndDate = ?, ';
            $sql .= 'fldTitle = ?, ';
            $sql .= 'fldDescription = ?, ';
            $sql .= 'fldSessionCost = ?, ';
            $sql .= 'fldIndividualCost = ?, ';
            $sql .= 'fldParticipants = ? ';

            $data = array($dayOfClass, $startTime, $endTime, $startDate, $endDate, $classTitle, $classDescription, $sessionCost, $individualCost, $participants);
        }
        //==Save to Wildlife table==
        if(DEBUG){
            print $thisDatabaseReader->displayQuery($sql, $data);
        }else{
            if($thisDatabaseWriter->insert($sql, $data)){
                /*print '<section class="successfulDatabase">';
                print '<h2 >You have successfully inserted a new record!</h2>';
                print '<a href="insertYoga.php">Continue</a>';
                print '</section>';*/
            }
        }
    }

}
?>
<main>
    <section class = "fullInsert">
        <form action = "#" method = "POST">
            <fieldset>
                <!--===Day of class===-->
                <section class = "dayOfClassSection">
                    <label for = "txtDayOfClass">Class Day</label>
                    <input id = "txtDayOfClass"     
                            name = "txtDayOfClass"
                            maxlength = "25"
                            type = "text"
                            value = "<?php print $dayOfClass; ?>"
                        >
                </section>
                <!--===Start time of class===-->
                <section class = "startTimeSection">
                    <label for = "txtStartTime">Start Time</label>
                    <input id = "txtStartTime"     
                            name = "txtStartTime"
                            maxlength = "25"
                            type = "text"
                            value = "<?php print $startTime; ?>"
                        >
                </section>
                <!--===End time of class===-->
                <section class = "startTimeSection">
                    <label for = "txtEndTime">End Time</label>
                    <input id = "txtEndTime"     
                            name = "txtEndTime"
                            maxlength = "25"
                            type = "text"
                            value = "<?php print $endTime; ?>"
                        >
                </section>
                <!--===Date of class===-->
                <section class = "dateSection">
                    <label for = "txtStartDate">Start Date</label>
                    <input id = "txtStartDate"     
                            name = "txtStartDate"
                            type = "date"
                            value = "<?php print $startDate; ?>"
                        >
                    <label for = "txtEndDate">End Date</label>
                    <input id = "txtEndDate"     
                            name = "txtEndDate"
                            type = "date"
                            value = "<?php print $endDate; ?>"
                        >
                </section>
                <!--===Name of class===-->
                <section class = "classTitleSection">
                    <label for = "txtClassTitle">Class Title</label>
                    <input id = "txtClassTitle"     
                            name = "txtClassTitle"
                            maxlength = "25"
                            type = "text"
                            value = "<?php print $classTitle; ?>"
                        >
                </section>
                <!--===Description of class===-->
                <section class = "classDescriptionSection">
                    <label for = "txtClassDescription">Class Description</label>
                    <input id = "txtClassDescription"     
                            name = "txtClassDescription"
                            maxlength = "25"
                            type = "text"
                            value = "<?php print $classDescription; ?>"
                        >
                </section>
                <!--===Cost of classes===-->
                <section class = "costSection">
                    <label for = "txtSessionCost">Session Cost</label>
                    <input id = "txtSessionCost"     
                            name = "txtSessionCost"
                            maxlength = "3"
                            type = "text"
                            value = "<?php print $sessionCost; ?>"
                        >
                    <label for = "txtIndividualCost">Individual Cost</label>
                    <input id = "txtIndividualCost"     
                            name = "txtIndividualCost"
                            maxlength = "3"
                            type = "text"
                            value = "<?php print $individualCost; ?>"
                        >
                </section>
                <!--===Number of Participants===-->
                <section class = "participantsSection">
                    <label for = "txtParticipants">Max Participants</label>
                    <input id = "txtParticipants"     
                            name = "txtParticipants"
                            maxlength = "2"
                            type = "text"
                            value = "<?php print $participants; ?>"
                        >
                </section>
                <!--===Submit Button===-->
                <section class = "submitSection">
                    <input id = 'btnSubmit'
                        name = 'btnSubmit'
                        type = "submit"
                        value = "Submit">
                </section>
            </fieldset>
        </form>
    </section>
</main>
<?php
include '../footer.php';
?>