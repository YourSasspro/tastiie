$(document).ready(function () {
    $('#registerForm').on('submit', function (e) {
        e.preventDefault(); // Now this should work

        var formData = $(this).serialize();

        // store button previous text
        var btnText = $('#registerBtn').text();

        // add spinner to the button
        $('#registerBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...').attr('disabled', true);

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // alert(response.message); // Show success message
                    toastr.success(response.message);
                    // Optionally reset the form
                    $('#registerForm')[0].reset();

                    // redirect to the email verification page
                    window.location.href = '/email/verify';

                    // Redirect if the response contains a redirect URL
                    // if (response.redirect) {
                    //     window.location.href = response.redirect;
                    // }
                }
            },
            error: function (xhr) {
                // Remove any previous errors
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    // Loop through the error object
                    $.each(errors, function (field, messages) {
                        // Select the corresponding input field by its name attribute
                        let input = $('[name="' + field + '"]');
                        input.addClass('is-invalid'); // Highlight the field

                        // Create an error message element and insert after the input
                        let errorFeedback = $('<div class="invalid-feedback"></div>');
                        errorFeedback.text(messages[0]); // Show the first error message

                        input.after(errorFeedback);
                    });
                } else {
                    alert('An error occurred. Please try again.');
                }
            },
            complete: function(){
                // remove spinner from the button
                $('#registerBtn').html(btnText).attr('disabled', false);
            }


        });
    });


     
});