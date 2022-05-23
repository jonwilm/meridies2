// ------------------------------------------------------------
// NAVBAR
// ------------------------------------------------------------
$(window).ready(function () {
  $(".navbar-toggler").click(function () {
    $(".navbar").toggleClass("bg-red");
  });
  changeColorNavbar();

  $(".btn-user").hover(
    function () {
      $(".popup-login").fadeIn(300);
    },
    function () {
      setTimeout(() => {
        if ($(".popup-login:hover").length > 0) {
          console.log("Estoy en popup");
        } else {
          $(".popup-login").fadeOut(300);
        }
      }, 100);
    }
  );
});
$(window).scroll(function () {
  changeColorNavbar();
});
$(window).resize(function () {
  changeColorNavbar();
});
function changeColorNavbar() {
  if ($(window).scrollTop() > 30) {
    $(".navbar").css("background-color", "#e4002b");
    $(".navbar-mobil").css("background-color", "#e4002b");
  } else {
    $(".navbar").css("background-color", "transparent");
    $(".navbar-mobil").css("background-color", "transparent");
  }
}