window.onload = function() {
    if(document.getElementById('Telefonnummer')){
        addTerminListener();
    }
    if(document.getElementById('start')){
		showFixedScreen();
	}
}

function showFixedScreen(){
    bodyTag 							= document.getElementById('start');
	bodyTag.style.background 			= "url(img/stripes.png), url(img/bmw_riss.jpg) no-repeat center";
	bodyTag.style.backgroundSize 		= "cover";
	bodyTag.style.backgroundAttachment 	= "fixed";
    setTimeout(function(){
        changeBgImage(bodyTag);
		var welcome 			= document.getElementById('welcome');
        welcome.style.display 	= "block";
    },4000);
    setTimeout(function(){document.location="service.html";},24000);
}

function changeBgImage(element){
    element.style.background 			= "url(img/stripes.png), url(img/bmw_ohne.jpg) no-repeat center";
    element.style.backgroundSize 		= "cover";
    element.style.backgroundAttachment 	= "fixed";
}

/**
 * START
 * Adding Event Listeners
 */
function addTerminListener(){
    document.getElementById('Vorname').      addEventListener('keyup', validateVorname, 	true);
	document.getElementById('Nachname').     addEventListener('keyup', validateNachname, 	true);
	document.getElementById('Strasse').      addEventListener('keyup', validateStrasse, 	true);
	document.getElementById('Ort').          addEventListener('keyup', validateOrt, 		true);
	document.getElementById('Telefonnummer').addEventListener('keyup', validateTelefonNr,   true);
    document.getElementById('PLZ').          addEventListener('keyup', validateZipCode,     true);
    document.getElementById('Email').        addEventListener('keyup', validateEmail,       true);
    document.getElementById('HSN').          addEventListener('keyup', validateHSN,         true);
    document.getElementById('TSN').          addEventListener('keyup', validateTSN,         true);
    document.getElementById('Baujahr').      addEventListener('keyup', validateBaujahr,     true);
    document.getElementById('Terminwunsch'). addEventListener('keyup', validateTerminwunsch,true);

}


/**
 * START
 * Login Validations
 */
function validateEmail(){
    var element = document.getElementById('Email');
    filter = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,7}|[0-9]{1,3})(\]?)$/;
	if (!filter.test(element.value)) {
		element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

/**
 * START
 * Termin Validations
 */
 
function validateVorname(){
	var element = document.getElementById('Vorname');
	filter = /^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
		element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateNachname(){
	var element = document.getElementById('Nachname');
	filter = /^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
		element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateOrt(){
	var element = document.getElementById('Ort');
	filter = /^[A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß]{3,25}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
		element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateStrasse(){
	var element = document.getElementById('Strasse');
	filter = /^([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-]{3,50})+([\s])+([0-9]{1,10})+([A-Za-zÄÁÀÂäáàâÖÓÒÔöóòôÜÚÙÛüúùûéèêíìîß\s\-0-9]{0,20})$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
		element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateZipCode(){
    var element = document.getElementById('PLZ');
   // var element = window.event.srcElement;
   // var element = e ? e.srcElement:window.event.srcElement;
    filter = /^([0]{1}[1-9]{1}|[1-9]{1}[0-9]{1})[0-9]{3}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateTelefonNr() {
    var element = document.getElementById('Telefonnummer');
    filter = /^((\+|00)[1-9]\d{0,3}|0 ?[1-9]|\(00? ?[1-9][\d ]*\))[\d\-\/\s]*$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateHSN() {
    var element = document.getElementById('HSN');
    filter = /^[0-9]{4}$/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}
function validateTSN() {
    var element = document.getElementById('TSN');
    filter = /^[A-Z]{3}$|^[0-9]{3}$/;
    if (!filter.test(element.value.toUpperCase())) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
        element.value = element.value.toUpperCase();
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
        element.value = element.value.toUpperCase();
    }
}

function validateBaujahr() {
    var element = document.getElementById('Baujahr');
    filter = /(^(((0[1-9]|[12][0-8])([\/]|[\.]|[\-])(0[1-9]|1[012]))|((29|30|31)([\/]|[\.]|[\-])(0[13578]|1[02]))|((29|30)([\/]|[\.]|[\-])(0[4,6,9]|11)))([\/]|[\.]|[\-])(19|[2-9][0-9])\d\d$)|(^29([\/]|[\.]|[\-])02([\/]|[\.]|[\-])(19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}

function validateTerminwunsch() {
    var element = document.getElementById('Terminwunsch');
    filter = /(^(((0[1-9]|[12][0-8])([\/]|[\.]|[\-])(0[1-9]|1[012]))|((29|30|31)([\/]|[\.]|[\-])(0[13578]|1[02]))|((29|30)([\/]|[\.]|[\-])(0[4,6,9]|11)))([\/]|[\.]|[\-])(19|[2-9][0-9])\d\d$)|(^29([\/]|[\.]|[\-])02([\/]|[\.]|[\-])(19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/;
    if (!filter.test(element.value)) {
        element.setAttribute("style", "box-shadow: 0 0 20px #F00;");
    } else {
        element.setAttribute("style", "box-shadow: 0 0 20px #3A2;");
    }
}