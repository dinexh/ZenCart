document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const forgotPasswordForm = document.getElementById('forgot-password-form');
    const helpModal = document.getElementById('helpModal');
    const forgotPasswordModal = document.getElementById('forgotPasswordModal');

    function toggleVisibility(elementsToShow, elementsToHide) {
        elementsToShow.forEach(element => element.style.display = 'block');
        elementsToHide.forEach(element => element.style.display = 'none');
    }

    function openModal(modal) {
        modal.style.display = 'block';
    }

    function closeModal(modal) {
        modal.style.display = 'none';
    }

    document.querySelector('.nav-in-three button').addEventListener('click', () => openModal(helpModal));
    document.querySelector('#forgotPasswordModal .close').addEventListener('click', () => closeModal(forgotPasswordModal));
    document.querySelector('#helpModal .close').addEventListener('click', () => closeModal(helpModal));

    document.querySelector('#login-form a').addEventListener('click', () => openModal(forgotPasswordModal));
    document.querySelector('#signup-form a').addEventListener('click', () => toggleVisibility([loginForm], [signupForm, forgotPasswordForm]));

    document.querySelector('#login-form button[type="button"]').addEventListener('click', verify);
    document.querySelector('#signup-form button[type="button"]').addEventListener('click', signup);
    document.querySelector('#forgotPasswordModal button').addEventListener('click', submitForgotPasswordForm);
    document.querySelector('#helpModal button').addEventListener('click', submitHelpForm);

    window.toggleForm = () => {
        if (loginForm.style.display === 'none') {
            toggleVisibility([loginForm], [signupForm, forgotPasswordForm]);
        } else {
            toggleVisibility([signupForm], [loginForm, forgotPasswordForm]);
        }
    };

    function verify() {
        // Add login verification logic here
    }

    function signup() {
        // Add signup logic here
    }

    function submitForgotPasswordForm() {
        const email = document.getElementById('forgotEmail').value;
        console.log("Forgot Password Email Submitted: ", email);
    }

    function submitHelpForm() {
        const name = document.getElementById('helpName').value;
        const email = document.getElementById('helpEmail').value;
        const issue = document.getElementById('helpIssue').value;
        const query = document.getElementById('helpQuery').value;
        console.log("Help Form Submitted: ", { name, email, issue, query });
    }
});
