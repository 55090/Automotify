window.onload = function() {
    var loginBut = document.getElementById('email');
    loginBut.addEventListener('LoginButton', validateEmail);
    alert('Laden der Startseite');

}
function validateEmail(){
    alert('korrekt!');
    var email = document.getElementsByName('email');
    if(email.value.endsWith('@a.de')){
        alert('korrekt!');
    }
}
String.prototype.endsWith = function (s) {
    return this.length >= s.length && this.substr(this.length - s.length) == s;
    alert('email funktion lädt');
}
