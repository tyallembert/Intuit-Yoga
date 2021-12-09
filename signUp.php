<?php
//starts session for passing variables
session_start();

include 'top.php';

//Initialize variables
$profilePic = '';
$firstName = '';
$lastName = '';
$email = '';
$phone = '';
$venmo = '';
$experience = '';
$password = '';
$repassword = '';

$saveData = true;

?>
<main class = 'signupGrid'>
    <div class = 'backgroundOverlay'></div>
    <section class = "entireSignup">
        <section class = 'errorMessages'>
            <?php
            if(isset($_POST['btnSubmit'])){
                if(DEBUG){
                    print '<p>Post Array:</p><pre>';
                    print_r($_POST);
                    print '</pre>';
                }
                //======sanatize data=======
                $firstName = getData('txtFirstName');
                $lastName = getData('txtLastName');
                $email = filter_var($_POST['txtEmail'], FILTER_SANITIZE_EMAIL);
                $phone = getData('txtPhone');
                $venmo = getData('txtVenmo');
                $experience = getData('radExperience');
                $password = getData('pssPassword');
                $repassword = getData('pssRePassword');

                //======validate data=======
                //Profile picture
                $upload_array = validateProfilePic();
                //name of image
                $profilePic = $upload_array[2];
                //First Name
                if ($firstName == "")
                {
                    print '<p class = "mistake">First name cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($firstName))
                {
                    print '<p class = "mistake">Your first name appears to have invalid characters</p>';
                    $saveData == false;
                }
                //Last Name
                if ($lastName == "")
                {
                    print '<p class = "mistake">Last name cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($lastName))
                {
                    print '<p class = "mistake">Your last name appears to have invalid characters</p>';
                    $saveData == false;
                }
                //Email
                if ($email == "")
                {
                    print '<p class = "mistake">Email cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!filter_var($email, FILTER_SANITIZE_EMAIL)){
                    print '<p class = "mistake">Please enter a valid email address.</p>';
                    $saveData = false;
                }
                //Phone
                if ($phone == "")
                {
                    print '<p class = "mistake">Phone number cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($phone)){
                    print '<p class = "mistake">Please enter a valid phone number</p>';
                    $saveData = false;
                }
                //Venmo
                if ($venmo == "")
                {
                    print '<p class = "mistake">Venmo cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($venmo)){
                    print '<p class = "mistake">Please enter a valid Venmo Username</p>';
                    $saveData = false;
                }
                //Experience level 
                if ($experience != "Newbie" && $experience != "Intermediate" && $experience != "Expert")
                {
                    print '<p class = "mistake">Please choose your experience level</p>';
                    $saveData = false;
                }
                //password
                if ($password == "")
                {
                    print '<p class = "mistake">Password cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($password))
                {
                    print '<p class = "mistake">Your password appears to have invalid characters</p>';
                    $saveData == false;
                }
                elseif($password != $repassword){
                    print '<p class = "mistake">Your passwords do not match</p>';
                    $saveData == false;
                }

                //see if user already exists
                $sql = 'SELECT *';
                $sql .= 'FROM tblUsers';
                $data = '';
                $classes = $thisDatabaseReader->select($sql, $data);
                foreach($users as $user){
                    if($user['pmkEmail'] == $email){
                        print '<p class = "mistake">There is already an account with this email</p>';
                        $saveData = false;
                    }
                }

                if($saveData){

                    print '<p>array 1: '.$upload_array[0].'</p>';
                    print '<p>array 2: '.$upload_array[1].'</p>';
                    print '<p>array 3: '.$upload_array[2].'</p>';
                    if(DEBUG){
                        if(move_uploaded_file($upload_array[0], $upload_array[1])){
                            print '<p>Success!</p>';
                        }else{
                            print '<p>Fail</p>';
                        }
                    }
                    
                    $sql = 'INSERT INTO tblUsers SET ';
                    $sql .= 'fldProfilePicture = ?, ';
                    $sql .= 'fldFirstName = ?, ';
                    $sql .= 'fldLastName = ?, ';
                    $sql .= 'pmkEmail = ?, ';
                    $sql .= 'fldPhone = ?, ';
                    $sql .= 'fldExperience = ?, ';
                    $sql .= 'fldPassword = ? ';

                    $data = array($profilePic, $firstName, $lastName, $email, $phone, $experience, $password);

                    if(DEBUG){
                        print $thisDatabaseReader->displayQuery($sql, $data);
                    }else{
                        if($thisDatabaseWriter->insert($sql, $data)){
                            //print '<section class="successfulDatabase">';
                            //print '<h2 >You have successfully signed up!</h2>';
                            //print '<a href="index.php">Continue</a>';
                            //print '</section>';

                            //sending email over to logged in pages
                            $_SESSION['email'] = $email;

                            header("Location: index.php");
                        }
                    }
                }
            }
            ?>
        </section>
        <form action = "#" method="POST" enctype="multipart/form-data">
            <h2>Sign Up</h2>
            <fieldset class = "profilePicFieldset">
                <section class = "profilePicSection">
                    <!--==profile pic==-->
                    <figure class = 'signupProfilePic'>
                        <img src = 'images/placeholder.png' onClick="triggerClick()">
                    </figure>
                    <input type="file" id="fleProfilePic" onChange="displayImage(this)" name="fleProfilePic" class = "fleProfilePic">
                </section>
            </fieldset>

            <div class = 'creditsTo'> Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik"> Freepik </a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com'</a></div>
            <!--Contact Info-->
            <fieldset class = "signupContactInfo">
            <legend>Contact Info</legend>
                <p>
                    <label for = "txtFirstName">First Name</label>
                    <input id = "txtFirstName"     
                        name = "txtFirstName"
                        maxlength = "50"
                        type = "text"
                        required
                        value = "<?php print $firstName; ?>"
                    >
                </p>
                <p>
                    <label for = "txtLastName">Last Name</label>
                    <input id = "txtLastName"     
                        name = "txtLastName"
                        maxlength = "50"
                        type = "text"
                        required
                        value = "<?php print $lastName; ?>"
                    >
                </p>
                <p>
                    <label for = "txtEmail">Email</label>
                    <input id = "txtEmail"     
                        name = "txtEmail"
                        type = "email"
                        required
                        value = "<?php print $email; ?>"
                    >
                </p>
                <p>
                    <label for = "txtPhone">Phone</label>
                    <input id = "txtPhone"     
                        name = "txtPhone"
                        maxlength = "13"
                        type = "text"
                        required
                        value = "<?php print $phone; ?>"
                    >
                </p>
                <p>
                    <label for = "txtVenmo">Venmo</label>
                    <input id = "txtVenmo"     
                        name = "txtVenmo"
                        maxlength = "50"
                        type = "text"
                        required
                        value = "<?php print $venmo; ?>"
                    >
                </p>
            </fieldset>
            <fieldset class = "signupExperience">
            <legend>Experience Level</legend>
                <p>
                    <input id = "radExperienceNewbie"     
                        name = "radExperience"
                        type = "radio"
                        value = "Newbie"
                    >
                    <label for = "radExperienceNewbie">Newbie</label>
                </p>
                <p>
                    <input id = "radExperienceIntermediate"     
                        name = "radExperience"
                        type = "radio"
                        value = "Intermediate"
                    >
                    <label for = "radExperienceIntermediate">Intermediate</label>
                </p>
                <p>
                    <input id = "radExperienceExpert"     
                        name = "radExperience"
                        type = "radio"
                        value = "Expert"
                    >
                    <label for = "radExperienceExpert">Expert</label>
                </p>
            </fieldset>
            <fieldset class = "signupPasswords">
            <legend>Create Password</legend>
                <p>
                    <label for = "pssPassword">Password</label>
                    <input id = "pssPassword"     
                        name = "pssPassword"
                        minlength = "5"
                        type = "password"
                        value = "<?php print $password; ?>"
                    >
                    <!--<i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>-->
                </p> 
                <p>
                    <label for = "pssRePassword">Confirm Password</label>
                    <input id = "pssRePassword"     
                        name = "pssRePassword"
                        minlength = "5"
                        type = "password"
                        value = "<?php print $repassword; ?>"
                    >
                    <!--<i class="far fa-eye" id="toggleRePassword" style="cursor: pointer;"></i>-->
                </p>
            </fieldset>
                <p>
                    <input id = 'btnSubmit'
                            name = 'btnSubmit'
                            type = "submit"
                            value = "Sign Up">
                </p>
        </form>
        <section class = 'signupImage'>
            <h2>Already Have an Account?</h2>
            <a href = 'login.php'>
                <p>Login</p>
            </a>
        </section>
    </section>
</main>
<?php
include 'footer.php';
?>