 var a = 2;
 // a = 2

a = a - 1;
console.log("var a doit etre a 1 : " + a);

a++;
//a + 1
console.log("var a doit etre a 2 : " + a);

var b = 8;
// b = 8
b += 2;
// b(8) + 2 = 10
console.log("var b doit etre a 10 = " + b);

var c = a + b * b;
//c = a(2)+b(10)*b(10)= c(102)
console.log("var c doit etre a 102 : " + c);

var d = a * b + b;
// d = a(2)* b(10)+ b(10)= e(30)
console.log("var d doit etre a 30 = " + d);

var e = a * (b + b);
//e = a(2)* (b (10)+ b (10))= e(40)
console.log("var e doit etre a 40 = " + e);

var f = a * b / a;
// f = a(2)* b(10) / a(2) = f(10)
console.log("var f doit etre a 10 = " + f);

var g = b / a * a;
// g= b(10) / a(2) * a(2) = g(10)
console.log("var g doit etre a 10 = " + g);