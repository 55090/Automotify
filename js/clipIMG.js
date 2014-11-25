document.addEventListener('DOMContentLoaded', function(){
	blendIMG();
},true);

function blendIMG(){
	var image = document.getElementsByTagName("body")[0];
	for(var red = 0; red<255;red++){
		image.style.background='rgba('+red+',0,0,1)';
		setTimeout(function(){},30000);
	}
	for(var green = 0; green<255;green++){
		image.style.background='rgba(255,'+green+',0,1)';
		setTimeout(function(){},30000);
	}
	for(var blue = 0; blue<255;blue++){
		image.style.background='rgba(255,255,'+blue+',1)';
		setTimeout(function(){},30000);
	}
}