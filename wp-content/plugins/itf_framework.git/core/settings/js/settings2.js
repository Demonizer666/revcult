console.log( 'settings2 loaded...');

jQuery(document).ready( function () {

    window.testfields = {
        'field1': {
            'title': 'Отец, ну погодите!',
            'type': 'text',
            'name': 'cat_name',
            'placeholder': '1@1',
            'value': 'Ну нахер!!!',
            'class': 'MyTestField',
            'svg': 'cogs'
        },
        'field2': {
            'title': 'Что ты такое???',
            'type': 'text',
            'name': 'cat_name',
            'placeholder': '1@1',
            'value': 'You are ugly motherfucker!',
            'class': 'MyTestField',
            'svg': 'palette'
        },
        'field3': {
            'title': 'Котик такой',
            'type': 'text',
            'name': 'cat_name',
            'placeholder': '1@1',
            'value': 'ХОБА!',
            'class': 'MyTestField',
            'svg': 'icon_eye'
        }
    };

    var AppContainer = jQuery('.app');
    var template = jQuery('#settings_page').html();
    var html = ejs.render( template, {} );
    AppContainer.html( html );

});