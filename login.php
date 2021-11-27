<?php
//starts session for passing variables
session_start();

include 'top.php';

//Initialize variables
$email = '';
$password = '';

$adminEmails = array('mstoner921@gmail.com', 'tyallembert@gmail.com');
$adminPasswords = array('1964Mama', 'Ilikepie11');
$saveData = true;

?>
<main class = 'loginGrid'>
    <div class = 'backgroundOverlay'></div>
    <section class = "entireLogin">
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
                $password = getData('pssPassword');

                //======validate data=======
                //Email
                if (!filter_var($email, FILTER_SANITIZE_EMAIL)){
                    print '<p class = "mistake">Please enter a valid email address.</p>';
                    $saveData = false;
                }
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
                if($saveData){
                    $sql = 'SELECT *';
                    $sql .= 'FROM tblUsers ';
                    $data = '';
                    $users = $thisDatabaseReader->select($sql, $data);
                    foreach($users as $user){
                        //choose if its a user logging in or admin
                        if(in_array($user['pmkEmail'], $adminEmails) && in_array($user['fldPassword'], $adminPasswords)){
                            //sending email over to logged in pages
                            header('Location: admin/insertYoga.php');
                            exit;
                        }elseif($user['pmkEmail'] == $email && $user['fldPassword'] == $password){
                            //sending email over to logged in pages
                            $_SESSION['email'] = $email;
                            header('Location: loggedIn/yogaClasses.php');
                            exit;
                        }

                    }
                }
            }
            ?>
        </section>
        <form action="#" method="POST">
            <h2>Login</h2>
            <!--Contact Info-->
            <fieldset class = "loginInfo">
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
                    <label for = "pssPassword">Password</label>
                    <input id = "pssPassword"     
                        name = "pssPassword"
                        minlength = "5"
                        type = "password"
                        value = "<?php print $password; ?>"
                    >
                </p> 
                <p>
                    <input id = 'btnSubmit'
                            name = 'btnSubmit'
                            type = "submit"
                            value = "Login">
                </p>
            </fieldset>
        </form>
        <section class = 'loginImage'>
            <h2>Don't Have an Account Yet?</h2>
            <a href = 'signUp.php'>
                <p>Sign Up</p>
            </a>
        </section>
    </section>
</main>
<?php
include 'footer.php';
?>