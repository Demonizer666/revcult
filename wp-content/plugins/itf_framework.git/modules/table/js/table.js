console.log('table.js loaded...');

TableClass = '.RegularTable';

jQuery(document).ready(function () {

    TableCheckers();
    TableHandlers();

});

function TableHandlers() {

    jQuery(document).on( 'click', '.SetDensityLow', function () {

        jQuery('.SetDensityAverage').removeClass('active');
        jQuery('.SetDensityHigh').removeClass('active');
        jQuery( this ).addClass('active');

        jQuery(TableClass).removeClass('density_high');
        jQuery(TableClass).removeClass('density_average');
        jQuery(TableClass).addClass('density_low');
    });

    jQuery(document).on( 'click', '.SetDensityAverage', function () {

        jQuery('.SetDensityLow').removeClass('active');
        jQuery('.SetDensityHigh').removeClass('active');
        jQuery( this ).addClass('active');

        jQuery(TableClass).removeClass('density_low');
        jQuery(TableClass).removeClass('density_high');
        jQuery(TableClass).addClass('density_average');
    });

    jQuery(document).on( 'click', '.SetDensityHigh', function () {

        jQuery('.SetDensityLow').removeClass('active');
        jQuery('.SetDensityAverage').removeClass('active');
        jQuery( this ).addClass('active');

        jQuery(TableClass).removeClass('density_low');
        jQuery(TableClass).removeClass('density_average');
        jQuery(TableClass).addClass('density_high');
    });

    jQuery(document).on( 'click', '.SetZebra', function () {
        jQuery(this).toggleClass('active');
        jQuery(TableClass).toggleClass('zebra');
    });

    jQuery(document).on( 'click', '.SetSticky', function () {
        jQuery(this).toggleClass('active');
        jQuery(TableClass).toggleClass('sticky');
    });

    jQuery(document).on( 'click', '.SetAlignCenter', function () {
        jQuery(this).toggleClass('active');
        jQuery(TableClass).toggleClass('center');
    });


}

function TableCheckers() {

    if( jQuery(TableClass).hasClass('zebra') ) {
        jQuery('.SetZebra').addClass('active');
    }

    if( jQuery(TableClass).hasClass('density_low') ) {
        jQuery('.SetDensityLow').addClass('active');
    }

    if( jQuery(TableClass).hasClass('density_average') ) {
        jQuery('.SetDensityAverage').addClass('active');
    }

    if( jQuery(TableClass).hasClass('density_high') ) {
        jQuery('.SetDensityHigh').addClass('active');
    }

    if( jQuery(TableClass).hasClass('sticky') ) {
        jQuery('.SetSticky').addClass('active');
    }

    if( jQuery(TableClass).hasClass('center') ) {
        jQuery('.SetAlignCenter').addClass('active');
    }

}