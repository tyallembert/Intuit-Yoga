<?php
include 'top.php';
include 'phpFunctions.php';

//Initialize variables
$profilePic = '';
$firstName = '';
$lastName = '';
$email = '';
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
                $password = getData('txtPassword');
                $repassword = getData('txtRePassword');

                //======validate data=======
                //Profile picture
                $upload_array = validateProfilePic();
                //First Name
                if ($firstName == "")
                {
                    print '<p>First name cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($firstName))
                {
                    print '<p>Your first name appears to have invalid characters</p>';
                    $saveData == false;
                }
                //Last Name
                if ($lastName == "")
                {
                    print '<p>Last name cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($lastName))
                {
                    print '<p>Your last name appears to have invalid characters</p>';
                    $saveData == false;
                }
                //Email
                if ($email == "")
                {
                    print '<p>Email cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!filter_var($email, FILTER_SANITIZE_EMAIL)){
                    print '<p>Please enter a valid email address.</p>';
                    $saveData = false;
                }
                //password
                if ($password == "")
                {
                    print '<p>Password cannot be blank</p>';
                    $saveData = false;
                }
                elseif (!verifyAlphaNum($password))
                {
                    print '<p>Your password appears to have invalid characters</p>';
                    $saveData == false;
                }
                if($saveData){

                    if(move_uploaded_file($upload_array[0], $upload_array[1])){
                        print '<p>Success!</p>';
                    };


                }
            }
            ?>
        </section>
        <form action="#" method="POST" enctype="multipart/form-data">
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
                        maxlength = "15"
                        type = "text"
                        required
                        value = "<?php print $lastName; ?>"
                    >
                </p>
            </fieldset>

            <fieldset class = "signupPasswords">
            <legend>Password</legend>
                <p>
                    <label for = "txtPassword">Password</label>
                    <input id = "txtPassword"     
                        name = "txtPassword"
                        maxlength = "25"
                        type = "text"
                        value = "<?php print $password; ?>"
                    >
                </p> 
                <p>
                    <label for = "txtRePassword">Confirm Password</label>
                    <input id = "txtRePassword"     
                        name = "txtRePassword"
                        maxlength = "25"
                        type = "text"
                        value = "<?php print $repassword; ?>"
                    >
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