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
  if ($(window).width() > 991.98) {
    if ($(window).scrollTop() > 50) {
      $(".navbar .navbar-brand img").css("height", "50px");
    } else {
      $(".navbar .navbar-brand img").css("height", "60px");
    }
  } else {
    $(".navbar .navbar-brand img").css("height", "40px");
  }
}

$('.nav-link').on('click', function() {
  if ($(window).width() > 992) {
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 92
    }, 0)
  } else {
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 66
    }, 0)
  }
  return false
})