window.onload = function() {
    if(document.getElementById('LOGIN')) {
        addLogInListener();
    }
    if(document.getElementById('Telefonnummer')){
        addTerminListener();
    }
    if(document.getElementById('start')){
		showFixedScreen();
	}
}

function showFixedScreen(){
    bodyTag = document.getElementById('start');
    bodyTag.style.background = 'url(img/stripes.png), url(img/bmw_riss.jpg) no-repeat center';
    bodyTag.style.backgroundSize = 'cover';
    bodyTag.style.backgroundAttachment = 'fixed';
    changeBgImage(bodyTag);

    setTimeout(function(){
        var welcome = document.getElementById('welcome');
        welcome.setAttribute("style", "display: block;");
    },4000);
    setTimeout(function(){document.location="service.html";},24000);
}

function changeBgImage(element){
    element.style.setProperty("transition", 		"all 6s ease");
    element.style.setProperty("-webkit-transition", "all 6s ease");
    element.style.setProperty("-moz-transition", 	"all 6s ease");
    element.style.setProperty("-o-transition", 		"all 6s ease");
    element.style.setProperty("-ms-transition", 	"all 6s ease");
    element.style.background = 'url(img/stripes.png), url(img/bmw_ohne.jpg) no-repeat center';
    element.style.backgroundSize = 'cover';
    element.style.backgroundAttachment = 'fixed';

}

/**
 * START
 * Adding Event Listeners
 */
function addLogInListener(){
    document.getElementById('log_email').   addEventListener('keyup', validateEmail,         true);
    document.getElementById('log_password').addEventListener('keyup', validatePasswordChars, true);
}

function addTerminListener(){
    document.getElementById('Telefonnummer').addEventListener('keyup', validateTelefonNr,true);
    document.getElementById('PLZ').          addEventListener('keyup', validateZipCode,  true);
    document.getElementById('Email').        addEventListener('keyup', validateEmail,    true);
    document.getElementById('HSN').          addEventListener('keyup', validateHSN,      true);
    document.getElementById('TSN').          addEventListener('keyup', validateTSN,      true);

}


/**
 * START
 * Login Validations
 */
function validateEmail(){
    var element = event.srcElement;
    filter = /^([a-zA-Z0-9_\.\-])+\@beuth-hochschule.de/;
	if (!filter.test(element.value)) {
		element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validatePasswordChars(){
    var element = event.srcElement;
    filter = /(?=.*[A-Za-z0-9])[A-Za-z0-9, .!@#$%^&*()_]{5,25}/;
    if(!filter.test(element.value)){
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

/**
 * START
 * Termin Validations
 */
function validateZipCode(){
    var element = event.srcElement;
    filter = /^([0]{1}[1-9]{1}|[1-9]{1}[0-9]{1})[0-9]{3}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateTelefonNr() {
    var element = event.srcElement;
    filter = /^((\+|00)[1-9]\d{0,3}|0 ?[1-9]|\(00? ?[1-9][\d ]*\))[\d\-/ ]*$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateHSN() {
    var element = event.srcElement;
    filter = /^[0-9]{4}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}
function validateTSN() {
    var element = event.srcElement;
    filter = /^[A-Z]{3}$/;
    if (!filter.test(element.value.toUpperCase())) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
        element.value = element.value.toUpperCase();
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
        element.value = element.value.toUpperCase();
    }
}