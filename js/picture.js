window.onload = function(){
    showFixedScreen();
}
function showFixedScreen(){
    bodyTag = document.getElementById('start');
    bodyTag.style.background = 'url(img/bmw_ohne.jpg) no-repeat center';
    bodyTag.style.backgroundSize = 'cover';
    bodyTag.style.backgroundAttachment = 'fixed';
    bodyTag.style.transition = 'all 4s ease';
    setTimeout(showStripes(),4000);
}
function showStripes() {
    bodyTag = document.getElementById('start');
    bodyTag.style.background = 'url(img/stripes.png), url(img/bmw_ohne.jpg) no-repeat center';
    bodyTag.style.backgroundSize = 'cover';
    bodyTag.style.backgroundAttachment = 'fixed';
    bodyTag.style.transition = 'all 4s ease';
}