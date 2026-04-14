document.getElementById('flexSwitchCheckDefault').addEventListener('change', function () {
    // Toggle locale: true for English, false for French
    var locale = this.checked ? 'fr' : 'en';
    // Retrieve CSRF token from the meta tag
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Send the new locale to your Laravel backend
    fetch('/change-locale', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        credentials: 'same-origin', // Ensure cookies are sent with the request
        body: JSON.stringify({ locale: locale })
    })
        .then(response => response.json())
        .then(data => {
            // Reload the page to apply the new locale
            location.reload();
        })
        .catch(error => console.error('Error:', error));
});