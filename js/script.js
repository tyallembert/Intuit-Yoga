
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

window.addEventListener('load',convertDates())
//https://stackoverflow.com/questions/47575119/how-to-get-month-name-from-an-html-date-input-value
function convertDates(element){
    var path = window.location.pathname
    if(path == "/cs148/intuitYoga/yogaClasses.php"){
        var allElements = $('.yogaDates')
        actuallyConvert(allElements)
    }else if(path == "/cs148/intuitYoga/teacherCourses.php"){
        var allElements = $('.teacherDates')
        actuallyConvert(allElements)
    }else if(path == "/cs148/intuitYoga/admin/courses.php"){
        var allElements = $('.yogaDates')
        actuallyConvert(allElements)
        var allElements = $('.teacherDates')
        actuallyConvert(allElements)
    }
}
//actually convert the dates
function actuallyConvert(allElements){
    var path = window.location.pathname
    if(path == "/cs148/intuitYoga/yogaClasses.php" || path == "/cs148/intuitYoga/teacherCourses.php" || path == "/cs148/intuitYoga/admin/courses.php"){
        for(var i = 0; i < allElements.length; i++){
            var dates = allElements[i].innerHTML
            var splitDate = dates.split("-");
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var firstYear = splitDate[0]
            var firstMonth = months[splitDate[1]-1]
            var firstDay = splitDate[2]
            var secondYear = splitDate[3]
            var secondMonth = months[splitDate[4]-1]
            var secondDay = splitDate[5]
            allElements[i].innerHTML = firstMonth + ' ' + firstDay + ', ' + firstYear + ' - ' + secondMonth + ' ' + secondDay + ', ' + secondYear;
        }
    }
}

//password
if(window.location.pathname == "/cs148/intuitYoga/signUp.php"){
    console.log("got in")
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('pssPassword');

    const toggleRePassword = document.getElementById('toggleRePassword');
    const rePassword = document.getElementById('pssRePassword');

    togglePassword.addEventListener('click', visablePass(password));
    toggleRePassword.addEventListener('click', visableRePass(rePassword));
}
function visablePass(password) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye slash icon
  document.getElementById('togglePassword').classList.toggle('fa-eye-slash');
};
function visableRePass(rePassword) {
    // toggle the type attribute
    const type = rePassword.getAttribute('type') === 'password' ? 'text' : 'password';
    rePassword.setAttribute('type', type);
    // toggle the eye slash icon
    document.getElementById('toggleRePassword').classList.toggle('fa-eye-slash');
  };