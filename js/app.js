const signUpModal = document.querySelector('.sign-up-modal');
const logInModal = document.querySelector('.log-in-modal');
const overlay = document.querySelector('.overlay');
const btnCloseSignUpModal = document.querySelector('.close-sign-up-modal');
const btnCloseLogInModal = document.querySelector('.close-log-in-modal');
const btnOpenSignUpModal = document.querySelector('.show-sign-up-modal');
const btnOpenLogInModal = document.querySelector('.show-log-in-modal');


// Open and Close Sign Up Modal

btnOpenSignUpModal.addEventListener('click', openSignUpModal);

function openSignUpModal() {
  signUpModal.style.display = "block";
  overlay.classList.remove('hidden');

}

btnCloseSignUpModal.addEventListener('click', closeSignUpModal);

function closeSignUpModal() {
  signUpModal.style.display = 'none';
}

// Open and Close Log in Modal

btnOpenLogInModal.addEventListener('click', openLogInModal);

function openLogInModal() {
  logInModal.style.display = "block";
  // overlay.classList.remove('hidden');

}

btnCloseLogInModal.addEventListener('click', closeLogInModal);

function closeLogInModal() {
  logInModal.style.display = 'none';
}