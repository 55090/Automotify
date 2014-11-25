window.addEventListener("load",pruefeFormular, false);
var login=document.getElementById('login');

function pruefeFormuflar(){
    document.getElementById('feedback').innerHTML="<h2>Eingefügte Überschrift</h2>";
//document.writeln("Zerstörende Ausgabe"); //just test...
}
console.log("Output in das Log Window des Browsers ausgegeben");
window.alert('Diese Ausgabe muss weggeklickt werden!');
console.log("login name ist: "+login);

