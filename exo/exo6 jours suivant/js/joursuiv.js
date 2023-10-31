var jour = prompt('veuillez saisir un jour de la semaine:');

var jourSuivant;

switch (jour) {
    case 'lundi':
        jourSuivant = 'mardi';
    break;
    case 'mardi':
        jourSuivant = 'mercredi';
    break;
    case 'mercredi':
        jourSuivant = 'jeudi';
    break;
    case 'jeudi':
        jourSuivant = 'vendredi';
    break;
    case 'vendredi':
        jourSuivant = 'samedi';
    break;
    case 'samedi':
        jourSuivant = 'dimanche';
    break;
    case 'dimanche':
        jourSuivant = 'lundi';
    break;
    default:
        console.log("jour inconnu")
   
}
 document.write('le jour suivant est : ' + jourSuivant);