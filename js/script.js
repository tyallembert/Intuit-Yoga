
//https://codewithawa.com/posts/image-preview-and-upload-using-php-and-mysql-database
function triggerClick(e) {
    $('.signupProfilePic img').click();
}
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('.signupProfilePic img').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        $('.signupProfilePic img').css('height', '100%')
        $('.signupProfilePic img').css('width', 'auto')
    }
}
  