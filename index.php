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
?>
<main class = "indexMain">
    <section class = "mollyImageSection">
        <figure class = 'mollyImage'>
            <img src = 'images/molly-nb.png'>
        </figure>
        <section class = "mollyInfo">
            <h2>Molly Stoner</h2>
            <p>500hr Yoga Tchr. Training - HTS Yoga</p>
            <p>M. Ed. Antioch New England</p>
            <p>B.A. Carleton College</p>
        </section>
    </section>
    <section class = "aboutSignupSection">
        <section class = 'firstParagraph'>
            <h2>Background</h2>
            <p>An elementary teacher for over 30 years, Molly Stoner brings to her work a vast experience with guiding and observing students, as well as an intuitive, warm presence.  She has been practicing yoga for over two decades and has been certified to teach yoga since 2013.</p>
            <p>Molly’s vision is to offer to others the calm centering that yoga has given her. “I want to provide opportunities for renewal, equanimity and spontaneous joy that yoga has given to me through the years,” she shared. She is particularly interested in supporting fellow teachers seeking to refill their wells.</p>
            <p>Molly offers yoga classes, teacher trainings, and educational support services such as advocacy, mediation, and coaching.</p>
        </section>
        <a href = "yogaClasses.php">
            <section class = "a1Section">
                <figure>
                    <img src = 'images/yoga1.jpg'>
                </figure>
                <p class = "quickLinkYoga">Yoga Classes Signup</p>
            </section>
        </a>
        <a href = "teacherCourses.php">
            <section class = "a2Section">
                <figure>
                    <img src = 'images/teacher1.jpg'>
                </figure>
                <p class = "quickLinkTeacher">Teacher Trainings Signup</p>
            </section>
        </a>
    </section>
    <section class = "yurtImageSection">
        <figure class = 'yurtImage'>
            <img src = 'images/yurt.jpg' usemap = "#workmap">
        </figure>
    </section>
    <section class = 'secondParagraph'>
        <h2>Location</h2>
        <p>Intuit Yoga and Educational Services is located on a 19 acre wooded hillside in southern Vermont. With extensive gardens, a babbling brook, and gentle vistas, it offers a feeling of renewal immediately upon arrival.</p>
        <p>Classes are held in a traditional 25’ yurt, nestled between the gardens and woods. After classes, students are welcome to enjoy a cup of tea, take a walk in the woods, or sit by the stream and still the mind.</p>
    </section>
</main>
<?php
include 'footer.php';
?>