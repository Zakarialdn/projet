// var z = parseInt(prompt("veuillez saisir un nombre"));
// var k = z + 10;
// for (; z < k; z++) {
//                 if (z % 2 === 0) {
//                     document.write(z + " est pair <br>");
//                 }else{
//                     document.write(z + " est impair <br>");
//                 }
//             }

//  for (var z = 1; z <= 10; z++) {
//           if (z % 2 === 1) {
//                      console.log(z + " est impair");
//                      document.write(z + " est impair");
//                  }
//              }

//correction while

var chiffre = parseInt(prompt("choisi un chiffre"));
var chiffreMax = chiffre +10 ;
while (chiffre <= chiffreMax){
    if (chiffre % 2 === 0){
        document.write(" "+ chiffre + " est pair <br>");
    } else {
        document.write(" "+ chiffre + " est impair <br>");
    }
    chiffre++;
}