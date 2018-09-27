console.log('editor.js loaded...');

var wp_editor_default_settings = {
    tinymce: {
        wpautop: true,
        theme:"modern",
        skin:"lightgray",
        language:"en",
        formats:{
            alignleft: [
                {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign:'left'}},
                {selector: 'img,table,dl.wp-caption', classes: 'alignleft'}
            ],
            aligncenter: [
                {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign:'center'}},
                {selector: 'img,table,dl.wp-caption', classes: 'aligncenter'}
            ],
            alignright: [
                {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign:'right'}},
                {selector: 'img,table,dl.wp-caption', classes: 'alignright'}
            ],
            strikethrough: {inline: 'del'}
        },
        relative_urls:true,
        remove_script_host:true,
        convert_urls:true,
        browser_spellcheck:true,
        fix_list_elements:true,
        entities:"38,amp,60,lt,62,gt",
        entity_encoding:"raw",
        keep_styles:true,
        paste_webkit_styles:"font-weight font-style color",
        preview_styles:"font-family font-size font-weight font-style text-decoration text-transform",
        wpeditimage_disable_captions:false,
        wpeditimage_html5_captions:true,
        plugins:"charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
        resize:"vertical",
        menubar:false,
        indent:true,
        toolbar1:"bold,italic,strikethrough,blockquote,hr,alignleft,aligncenter,alignright,bullist,numlist,link,unlink,wp_more,spellchecker, wp_adv",
        toolbar2:"formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
        toolbar3:"",
        toolbar4:"",
        tabfocus_elements:":prev,:next",
        body_class:"id post-type-post post-status-publish post-format-standard",
    },
    quicktags: true,
    mediaButtons: true
};