jQuery(document).ready(function($){
    $('body').on('click', '.mam-footer-ctas-toggle', function(){
        $('.mam-footer-ctas').toggleClass('active');
    });
});