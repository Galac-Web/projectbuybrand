// window.CKEDITOR.config.language = 'ru';
// window.CKEDITOR.config.skin = 'n1theme';
window.CKEDITOR_BASEPATH = '/assets/ckeditor/';
window.CKEDITOR_TOOLBARS = {
    lite: [
        { name: 'text', items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
        { name: 'list', items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote' ] },
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'media', items: [ 'Image', 'Table' ] },
        { name: 'other', items: [ 'Source' ] },
    ],
};
require('ckeditor4');