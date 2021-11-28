
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
    var allElements = $('.yogaDates')
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