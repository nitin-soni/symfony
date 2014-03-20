(function($) {

    function left_menu() {
        var leftMenu = $("#left-menu").hide();
        var pageBodyHeight = $("#page-body").innerHeight() - 70 + 'px';
        leftMenu.show();
        leftMenu.css('height', pageBodyHeight);
        leftMenu.css('margin-bottom', '-23px');
    }
    ;


    left_menu();



    $(window).resize(function() {
        left_menu();
    });

})(jQuery);

function confirm_delete(message) {
    message = typeof message != 'undefined' ? message : 'Are you really want to delete ?';
    return confirm(message);
}

function ValidateFileUpload(id) {
    var fuData = document.getElementById(id);
    var FileUploadPath = fuData.value;

//To check if user upload any file
    if (FileUploadPath == '') {
        alert("Please upload an image");

    } else {
        var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {

// To Display
            if (fuData.files && fuData.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(fuData.files[0]);
            }

        }

//The file upload is NOT an image
        else {
            alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");

        }
    }
}