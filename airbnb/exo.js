let i = 0;

let tabImage = ["./img/galaxie4.jpg", "./img/galaxie2.png", "./img/galaxie3.jpg"];

function changeBG(index) {
  $("header").css({
    "background-image": "url(" + tabImage[index] + ")",
  });
}

setInterval(() => {
  if (i == tabImage.length - 1) {
    i = 0;
  } else {
    i++;
  }

  changeBG(i);
}, 5000);



$(document).ready(function () {
  $(".cross").hide();
  $(".menu").hide();
  $(".hamburger").click(function () {
    $(".menu").slideToggle("slow", function () {
      $(".hamburger").hide();
      $(".cross").show();
    });
  });

  $(".cross").click(function () {
    $(".menu").slideToggle("slow", function () {
      $(".cross").hide();
      $(".hamburger").show();
    });
  });
});
