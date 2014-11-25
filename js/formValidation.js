window.onload = function() {
    var loginBut = document.getElementById('LoginButton');
    loginBut.addEventListener('click', validateEmail);
}
function validateEmail(){
    var email = document.getElementsByName('email');
    if(email.value.endsWith('@a.de')){
        alert('korrekt!');
    }
}
String.prototype.endsWith = function (s) {
    return this.length >= s.length && this.substr(this.length - s.length) == s;
}
