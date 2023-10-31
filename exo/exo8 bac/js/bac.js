var moyenne = parseFloat(prompt("veuillez saisir la moyenne d'un candidat :"));

if (isNaN(moyenne)){
console.log("la moyenne saisie n'est pas valide.");
} else {
    if (moyenne >= 10) {
        console.log("le candidat est recu au baccalaureat !");
        document.write("le candidat est recu au baccalaureat !");
    } else {
        console.log("le candidat est recale au baccalaureat .");
        document.write("le candidat est recale au baccalaureat .");
    }
}

