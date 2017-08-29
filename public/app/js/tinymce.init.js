$(document).ready(function() {
    tinymce.init({
        setup: function(editor) {
            editor.on('init', function(e) {
                $('.loading_editor').hide();
            });
        },
        formats: {
            bold : {inline : 'b' }
        },
        valid_elements: "b,b/strong,*[*]",
        selector: '#tinymce',
        height: 500,
        theme: 'modern',
        file_browser_callback_types: 'file image media',
        plugins: ['responsivefilemanager advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'],
        toolbar1: 'undo redo  | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager | print preview media | forecolor backcolor emoticons | codesample help',
        image_advtab: true,
    });
});