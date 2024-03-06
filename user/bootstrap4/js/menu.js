// burgermenu

$('.menu-ham').click(function () {
  $('.menu').animate({right: '0px'}, 100)
});

$('.close-menu').click(function () {
  $('.menu').animate({right: '-400px'}, 100)
});