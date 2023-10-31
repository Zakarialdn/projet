var numeroMois = parseInt(prompt("veuillez saisir le numero d'un mois (entre 1 et 12) :"));

if (isNaN(numeroMois) || numeroMois < 1 || numeroMois > 12) {
    console.log("le numero de mois saisie n'est pas valide.");
} else {
    var nombreJours = [31,28,31,30,31,30,31,31,30,31,30,31] ;
    var joursDansMois = nombreJours[numeroMois - 1] ;
    console.log("le mois numero " + numeroMois + " contient " + joursDansMois + " jours ") ;
     document.write("le mois numero " + numeroMois + " contient " + joursDansMois + " jours ");
}