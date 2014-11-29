window.onload = function() {
    LoginButton.addEventListener('click', validateEmail, true);
}

function validateEmail(){
    if(form.email.value=="") {

        alert("Sie haben nichts eingegeben");

    }
    else if(!form.email.value.endsWith('@beuth-hochschule.de')){
        form.action="index.html";
        alert('Für unseren Mitgliederbereich sind nur Angehörige der Beuth-Hochschule mit einer gültigen Beuth Email Adresse zugelassen');
    }
}

String.prototype.endsWith = function (s) {
    return this.length >= s.length && this.substr( this.length - s.length) == s;
}