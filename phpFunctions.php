<?php
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

 //profile pic upload
 //https://codewithawa.com/posts/image-preview-and-upload-using-php-and-mysql-database
 function validateProfilePic(){
    $img_name = $_FILES['fleProfilePic']['name'];
    $img_size = $_FILES['fleProfilePic']['size'];
    $tmp_name = $_FILES['fleProfilePic']['tmp_name'];
    $error = $_FILES['fleProfilePic']['error'];
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex = strtolower($img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");


    $profileImageName = time() . '-' . $img_name;
    // For image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($img_size > 200000) {
        print '<p>Image file is too large</p>';
        $saveData = false;
    }
    //checks to see if file extension is alright
    if (!in_array($img_ex, $allowed_exs)){
        print '<p class = "mistake">File extension is not allowed. Please use .jpg, .jpeg, or .png</p>';
        $saveData = false;
    }
    // check if file exists
    if(file_exists($target_file)) {
        print '<p>Image file already exists</p>';
        $saveData = false;
    }
 }
?>