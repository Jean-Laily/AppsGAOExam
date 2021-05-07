
(function($) {
    "use strict";
  // ------------------------------------------------------------------ //
  //                          Interaction JS Template BS 
  // ------------------------------------------------------------------- //
    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });



  // ------------------------------------------------------------------ //
  //                          Modal DELETE Universel
  // ------------------------------------------------------------------- //
  
  /**
   * M: Ce script Jquery permet de récupérer la valeur contenue dans l'attribut data-delete-url
   * et de le transférer à la balise <a> qui à comme identifiant #validID et de lui créer l'attribut href et lui l'affecter.
  */

   $('#modalSuppr').on('show.bs.modal', function (event) {
    
    // récupère l'élément de l'événement en cours (ici la fenêtre modal)
    var modal = $(event.relatedTarget);
    
    // On stock la valeur du data-delete-url dans notre variable 
    var url = modal.data('delete-url'); 
    
    //Modifie la valeur contenue dans l'attribut href et remplace par la valeur de notre variable 
      $('#validID').add('href').attr('href', url);
  });//fin event show modal

 
  // -------------------------------------------------------------------------------------- //
  //          Modal OFF pour suppression global avec l'id = #myModal         
  // -------------------------------------------------------------------------------------- //
  // 
  
  /**
   * M: Permet après chaque fermeture de la modal de remove l'attribut (href) créer auparavant
   * utile pour eviter le stockage d'un lien non souhaiter
   */ 
  $('#modalSuppr').on('hide.bs.modal', function () {
    $('#validID').removeAttr('href');
  }); //fin event hide modal



})(jQuery);
