$(document).ready(function () {
    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // alert(response.message);
                    toastr.success(response.message);

                    // Redirect if response contains a redirect URL
                    if (response.redirect) {
                        setInterval(() => {
                            window.location.href = response.redirect;
                        }, 1000);
                    }
                }
            },
            error: function (xhr) {
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, messages) {
                        let input = $('[name="' + field + '"]');
                        input.addClass('is-invalid');
                        let errorFeedback = $('<div class="invalid-feedback"></div>').text(messages[0]);
                        input.after(errorFeedback);
                    });
                } else {
                    alert('Login failed. Please check your credentials.');
                }
            }
        });
    });
});
