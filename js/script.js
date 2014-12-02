window.onload = function() {
    var email_in = document.getElementById('log_email');
	email_in.addEventListener('keyup', validateEmail, true);
    if(document.getElementById('start')){
		showFixedScreen();
	}
}

function validateEmail(){
	filter = /^([a-zA-Z0-9_\.\-])+\@beuth-hochschule.de/;
	if (!filter.test(form.email.value)) {
		document.getElementById('log_email').style.setProperty('box-shadow', '0 0 20px #F00');
    }
    else {
		document.getElementById('log_email').style.setProperty('box-shadow', '0 0 20px #3A2');
        //setTimeout(function(){form.action="backend/terminverwaltung.html;}",3000);
    }
}

String.prototype.endsWith = function (s) {
    return this.length >= s.length && this.substr( this.length - s.length+1 ).toLowerCase() == s.toLowerCase();
};



function showFixedScreen(){
    bodyTag = document.getElementById('start');
    bodyTag.style.background = 'url(img/stripes.png), url(img/bmw_riss.jpg) no-repeat center';
    bodyTag.style.backgroundSize = 'cover';
    bodyTag.style.backgroundAttachment = 'fixed';
	changeBgImage(bodyTag);

    setTimeout(function(){
                document.getElementById('welcome').style.display = 'block';
              },4000);
    setTimeout(function(){document.location="service.html";},12000);
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