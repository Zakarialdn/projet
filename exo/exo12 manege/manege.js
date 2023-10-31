var tourDeManege = parseFloat(prompt("tour de manege"))

// Fonction pour faire un tour de manège
function faireTourManege(tour) {
  console.log("En train de faire le tour de manège numéro " + tour);
  console.log("Le tour de manège numéro " + tour + " est terminé.");
  document.write("En train de faire le tour de manège numéro " + tour + "<br>");
  document.write("Le tour de manège numéro " + tour +  " est terminé. <br>");

}

// Boucle pour faire 10 tours de manège
for (let tour = 1; tour <= 10; tour++) {
  console.log("Début du tour de manège numéro " + tour);
  document.write("Début du tour de manège numéro " + tour + "<br>");
  faireTourManege(tour);
  
}




