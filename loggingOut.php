<?php
//starts session for passing variables
session_start();
$loggedIn = false;
session_destroy();
if($loggedIn){
    include 'loggedIn/top.php';
}else{
    include 'top.php';
}

include 'header.php';
?>
<main class = "loggingOutMain">
    <section>
        <h2>You have been logged out</h2>
        <a href = "index.php">Continue</a>
    </section>
</main>
<?php
include 'footer.php';
?>