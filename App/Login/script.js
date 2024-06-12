function toggleForm() {
    var loginForm = document.getElementById('login-form');
    var signupForm = document.getElementById('signup-form');

    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    } else {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
    }
}

function openHelpModal() {
    document.getElementById('helpModal').style.display = 'block';
}

function closeHelpModal() {
    document.getElementById('helpModal').style.display = 'none';
}

function submitHelpForm() {
    var name = document.getElementById('helpName').value;
    var email = document.getElementById('helpEmail').value;
    var issue = document.getElementById('helpIssue').value;
    var query = document.getElementById('helpQuery').value;
    alert('Help form submitted:\nName: ' + name + '\nEmail: ' + email + '\nIssue: ' + issue + '\nQuery: ' + query);
    closeHelpModal();
}
