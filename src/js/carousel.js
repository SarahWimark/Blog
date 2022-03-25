$(document).ready(function () {
  $(".new-posts-container").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 10000,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
  });

  /*  $(".new-posts-container").slick({
    centerMode: true,
    centerPadding: "60px",
    slidesToShow: 3,
    nextArrow: $(".next"),
    prevArrow: $(".prev"),
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  }); */
});
