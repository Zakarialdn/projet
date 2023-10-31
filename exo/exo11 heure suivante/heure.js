// var heures = parseInt(prompt("Veuillez saisir les heures :")); 
// var minutes = parseInt(prompt("Veuillez saisir les minutes :")); 
// var secondes = parseInt(prompt("Veuillez saisir les secondes :")); 
// if (isNaN(heures) || isNaN(minutes) || isNaN(secondes) || heures < 0 || heures > 23 || minutes < 0 || minutes > 59 || secondes < 0 || secondes > 59) { console.log("L'heure saisie n'est pas valide."); 
// } else { 
// var heureFormattee = ("0" + heures).slice(-2); 
// var minutesFormattees = ("0" + minutes).slice(-2); 
// var secondesFormattees = ("0" + secondes).slice(-2); 
// console.log("L'heure saisie est : " + heureFormattee + ":" + minutesFormattees + ":" + secondesFormattees);
// document.write("L'heure saisie est : " + heureFormattee + ":" + minutesFormattees + ":" + secondesFormattees); }

// Demander les heures, les minutes et les secondes à l'utilisateur

// var heures = parseInt(prompt("Entrez l'heure :"));

// var minutes = parseInt(prompt("Entrez les minutes :"));

// var secondes = parseInt(prompt("Entrez les secondes :"));

// // Vérifier si les valeurs sont valides

// if (!isNaN(heures) && !isNaN(minutes) && !isNaN(secondes)) {

  // Ajouter + une seconde à l'heure actuelle

//   secondes += 1;

//   if (secondes >= 60) {
//     secondes = 0;
//     minutes += 1;

//     if (minutes >= 60) {
//       minutes = 0;
//       heures += 1;

//       if (heures >= 24) {
//         heures = 0;

//       }
//     }
//   }

//   // Afficher l'heure une seconde plus tard
//   document.write("L'heure une seconde plus tard est de : " + heures + "h " + minutes + "m " + secondes + "s");
// } else {
//   // Afficher un message d'erreur si les valeurs saisies ne sont pas valides
//   document.write("Veuillez entrer des valeurs valides pour les heures, les minutes et les secondes.");
// }



// alert("test");
 
var heure = prompt("entrez l'heur");
var minute =prompt("entrez les minutes");
var seconde =prompt("entrez les secondes");
 
// on test les cas d'erreur
if ((heure>=0)&&(heure<=23)&&(minute>=0)&&(minute<=59)&&(seconde>=0)&&(seconde<=59)){
        // on incrémente les secondes
         seconde++;
         if (seconde === 60 ){
            minute++;
            seconde = 0;
            if (minute === 60){
                minute = 0;
                heure++;
                if (heure === 24){
                    heure = 0;
                }
            }
         }
         document.write("on a "+ heure+ " h " + minute + " m " + seconde + " s ");
}  else {
    // heur incorrecte 
    document.write("heure incorrecte !!");
}
