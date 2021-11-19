<?php
include 'top.php';

//Initialize variables
$firstName = '';
$lastName = '';
$email = '';
$password = '';

$saveData = true;

//function to check for text and nums
function verifyAlphaNum($testString)
{
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}
//sanatization function
function getData($field) {
    if (!isset($_POST[$field])) {
       $data = "";
    }
    else {
       $data = trim($_POST[$field]);
       $data = htmlspecialchars($data);
    }
    return $data;
 }
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
                $email = filter_var($_POST['txtEmail'], FILTER_SANITIZE_EMAIL);
                $password = getData('txtPassword');

                //======validate data=======
                //Email
                if (!filter_var($email, FILTER_SANITIZE_EMAIL)){
                    print '<p>Please enter a valid email address.</p>';
                    $saveData = false;
                }
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
            }
            ?>
        </section>
        <form action="#" method="POST">
            <h2>Sign Up</h2>
            <!--Contact Info-->
            <fieldset class = "signupInfo">
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
                <p>
                    <label for = "txtPassword">Password</label>
                    <input id = "txtPassword"     
                        name = "txtPassword"
                        maxlength = "25"
                        type = "text"
                        value = "<?php print $lastName; ?>"
                    >
                </p> 
                <p>
                    <input id = 'btnSubmit'
                            name = 'btnSubmit'
                            type = "submit"
                            value = "Sign Up">
                </p>
            </fieldset>
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