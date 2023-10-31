var nombre1 = parseFloat(prompt("Saisissez le premier nombre :"));
var nombre2 = parseFloat(prompt("Saisissez le deuxième nombre :"));

if ((!isNaN(nombre1)) && (!isNaN(nombre2))){
if (nombre1 > nombre2) {
console.log(nombre1 + " est plus grand que " + nombre2);
document.write(nombre1 + " est plus grand que " + nombre2);
} else if (nombre1 < nombre2) {
console.log(nombre1 + " est plus petit que " + nombre2);
document.write(nombre1 + " est plus petit que " + nombre2);
} else {
console.log(nombre1 + " est égal à " + nombre2);
document.write(nombre1 + " est égal à " + nombre2);
}
}
else{
    alert("vous avez pas saisi de chiffre");
}




