/*
  Author: Lumberjacks
  Template: Sawmill (HTML Template)
  Version: 1.0
  URL: http://themeforest.net/user/Lumberjacks/
*/

"use strict";

jQuery(document).ready(function (){

  // Slick initializer function
  jQuery(".clients-carousel").slick({
    autoplay: false,
    autoplaySpeed: 5000,
    infinite: false,
    dots: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      }
    ]
  });

});