jQuery(document).ready(function () {
    jQuery('#random-user').on('submit', function(){
        $.post(
        )
    });

    jQuery('#random-user').validate({
        // initialize jquery validation plugin
        rules: {
            count: {
                required: true,
                range: [0,9]
            },
            add_email: {
                required: true
            }
            add_address: {
                required: true
            }
        }
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('Form submitted successfully!').addClass('valid')
            .closest('.form-group').removeClass('error').addClass('success');
        }
    });
});
