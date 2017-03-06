jQuery(document).ready(function(){
    jQuery('.smooth-scroll').on('click', function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                jQuery('html, body').animate({
                  scrollTop: target.offset().top-150
                }, 1000);
                return false;
            }
        }
    });
    jQuery('.header-dropdown-menu-panel-group .panel-title a').on('click', function(){
      jQuery('.navbar-toggle').click() //bootstrap 3.x by Richard
    });
});
/* Download From App Store Popup
============================== */
function contactPopup(){
    jQuery('#contact-modal').modal({show:true});/* Requires a $ sign */
}
jQuery(document).ready(function(){
    /* Fires after 60 seconds */
    setTimeout( function() {
        contactPopup();
    }, 60000);
});
jQuery('.show-contact-modal-popup').click(function(){
        contactPopup();
});

/* Download From App Store Popup
============================== */
function appPopup(){
    jQuery('#app-modal').modal({show:true});/* Requires a $ sign */
}
/* Fires after 30 seconds */
/* jQuery(document).ready(function(){
    setTimeout( function() {
        appPopup();
    }, 30000);
}); */
jQuery('.show-app-modal-popup').click(function(){
        appPopup();
});