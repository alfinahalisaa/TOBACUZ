// js/script.js

document.addEventListener('DOMContentLoaded', function() {
    var getStartedButton = document.getElementById('getStartedButton');
    if (getStartedButton) {
        getStartedButton.addEventListener('click', function() {
            redirectToLoginPage();
        });
    }

    function redirectToLoginPage() {
        window.location.href = "login.html";
    }
    
});


