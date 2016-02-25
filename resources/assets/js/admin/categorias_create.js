/**
 * Created by oscar on 25/02/16.
 */
$(function(){
    $("#categoria-foto").fileinput({
        showCaption : false,
        showPreview : false,
        showUpload: false,
        language: 'es',
        allowedFileExtensions : ['jpg', 'png']
    });
});