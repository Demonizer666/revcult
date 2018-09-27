console.log('Index.js loaded...');

jQuery(document).ready( function ($) {

    $(document).on('click', '.SearchIcon', function(){
        jQuery(this).siblings('.search_container__field').toggleClass('open');
    });

});