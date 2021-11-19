<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Intuit Yoga</title>
        <meta name="author" content="Ty Allembert">
        <meta name="description" content="Intuit yoga and educational services">
        <!--<link rel="icon" href="images/landscape.png">-->
        <link rel = "stylesheet"
            href = "css/custom.css?version=<?php print time(); ?>"
            type = "text/css">
        <link rel = "stylesheet" media = "(max-width: 800px)"
            href = "css/tablet.css?version=<?php print time(); ?>"
            type = "text/css">
        <link rel = "stylesheet" media = "(max-width: 600px)"
            href = "css/phone.css?version=<?php print time(); ?>"
            type = "text/css">
        <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <!--gsap cdn-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" defer 
        integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js" defer 
        integrity="sha512-CPA5LMoJI/a5HkSIAKcBtFXe4gqGjPUL2ExF/3PmhrrHI17wod9xOqqF+0WZQRKIIq0KwF8oG5BaiWobtrke3A==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"></script>
        <script src="js/script.js" defer></script>
    </head>

<?php
include 'lib/constants.php';
print '<body id = "' .PATH_PARTS['filename']. '">';
print '<!--***** START OF BODY ***** -->';

print '<!-- make Database connections-->';
require_once(LIB_PATH . '/database.php');

$thisDatabaseReader = new Database('tallembe_reader', 'r', DATABASE_NAME);
$thisDatabaseWriter = new Database('tallembe_writer', 'w', DATABASE_NAME);

print PHP_EOL;

include 'nav.php';
print PHP_EOL;

?>