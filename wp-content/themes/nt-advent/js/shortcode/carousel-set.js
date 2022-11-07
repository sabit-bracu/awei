/*
  Author: Lumberjacks
  Template: Sawmill (HTML Template)
  Version: 1.0
  URL: http://themeforest.net/user/Lumberjacks/
*/

"use strict";

jQuery(document).ready(function (){

  /*-------- Owl Carousel ---------- */
    jQuery(".reviews").owlCarousel({

    slideSpeed : 200,
    items: 1,
    singleItem: true,
    autoPlay : true,
    pagination : false
    });


  /* ------ Clients Section Owl Carousel ----- */

    jQuery(".clients").owlCarousel({
    slideSpeed : 200,
    items: 5,
    singleItem: false,
    autoPlay : true,
    pagination : false
    });

});