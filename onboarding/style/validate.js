$(document).ready(function () {

    $('#newproject_form').validate({
        rules: {
            project_title: {
                minlength: 2,
                required: true
            },
            project_des: {
                required: true,
                email: true
            }
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
        }
    });

});