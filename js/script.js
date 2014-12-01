window.onload = function() {
    LoginButton.addEventListener('click', validateEmail, true);
    showFixedScreen();
}

function validateEmail(){
    if(form.email.value=="") {


        setTimeout(function(){alert("Sie haben nichts eingegeben")}, 3440);

    }
    else if(!form.email.value.endsWith('@beuth-hochschule.de')){
        //setTimeout(function(){alert("Sie haben nichts eingegeben")}, 5440);
        form.action="index.html";
        alert('Für unseren Mitgliederbereich sind nur Angehörige der Beuth-Hochschule mit einer gültigen Beuth Email Adresse zugelassen');
    }
    if(form.email.value.endsWith('@beuth-hochschule.de')){
        //setTimeout(alert('Sie haben sich erfolgreich in unseren Mitgliederbereich eingeloggt'),300);
       form.action="backend/terminverwaltung.html";
    }
}

String.prototype.endsWith = function (s) {
    return this.length >= s.length && this.substr( this.length - s.length) == s;
};

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