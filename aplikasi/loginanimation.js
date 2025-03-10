const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
    // setTimeout(function() {
    //     window.location.href = "register.php"; 
    // }, 2000); // Delay 2 detik
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});