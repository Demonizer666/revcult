jQuery(document).ready( function ($) {

    console.log('settings.js loaded...')

    universal_dropdown({
        'autoclose': false,
        'container': '.ChooseTemplateToSend',
        'toggled_container': 'open'
    });

    universal_dropdown({
        'autoclose': true,
        'container': '.dropTable'
    });

    clear_editable();

    custom_tabs({
        'parent': '.SettingsMenu',
        'name': '.MenuTab',
        'content': '.MenuContent'
    });

    custom_slide({
        'parent': '.SettingsPart',
        'name': '.SlideOnClick',
        'content': '.SlideContainer'
    });

    close_all({
        'name': '.CollapseOnClick',
        'content': '.SlideContainer, .SlideOnClick'
    });
    open_all({
        'name': '.ExpandOnClick',
        'content': '.SlideContainer, .SlideOnClick'
    });

    jQuery( document ).on( 'click', '.ToggleArrowOnClick', function () {
       jQuery( this ).parents('.itf_settings__menu').toggleClass('open');
    });

    jQuery( document ).on( 'click', '.UpdateSettings', function () {
        framework_settings = prepare_data('.FrameWorkFields');
        list_settings = prepare_list_data({
            'class_selector': '.ListDataClass',
            'container': '.ChooseTemplateToSend',
            'check_role': 'checked'
        });
        sending_data = {
            'action': 'framework_settings',
            'command': 'update',
            'settings_data': framework_settings,
            'list_settings': list_settings
        };
        console.log( sending_data );
        ajax_send( sending_data ).then( function ( answer ) {

        });
    });

});