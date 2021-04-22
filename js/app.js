// Modal Selectors

const signUpModal = document.querySelector('.sign-up-modal');
const logInModal = document.querySelector('.log-in-modal');
const overlay = document.querySelector('.overlay');
const btnCloseSignUpModal = document.querySelector('.close-sign-up-modal');
const btnCloseLogInModal = document.querySelector('.close-log-in-modal');
const btnOpenSignUpModal = document.querySelector('.show-sign-up-modal');
const btnOpenLogInModal = document.querySelector('.show-log-in-modal');

// Carousel Selectors
const slider = document.querySelector('.slider');
const leftArrow = document.querySelector('.left');
const rightArrow = document.querySelector('.right');
const indicatorParnet = document.querySelector('.controls ul');

// Set section index 
let sectionIndex = 0;

document.querySelectorAll('.controls li').forEach(function (indicator, ind) {
  indicator.addEventListener('click', function () {
    sectionIndex = ind;
    document.querySelector('.controls .selected').classList.remove('selected');
    indicator.classList.add('selected');
    slider.style.transform = 'translate(' + (sectionIndex) * -25 + '%)';
  });
});

// Add Event Listeners for arrow controls of slider

leftArrow.addEventListener('click', function () {
  sectionIndex = (sectionIndex > 0) ? sectionIndex - 1 : 0;
  document.querySelector('.controls .selected').classList.remove('selected');
  indicatorParnet.children[sectionIndex].classList.add('selected');
  // Set transform property 
  slider.style.transform = 'translate(' + (sectionIndex) * -25 + '%)';
});

rightArrow.addEventListener('click', function () {
  // Add
  sectionIndex = (sectionIndex < 3) ? sectionIndex + 1 : 3;
  document.querySelector('.controls .selected').classList.remove('selected');
  indicatorParnet.children[sectionIndex].classList.add('selected');
  // Set transform property 
  slider.style.transform = 'translate(' + (sectionIndex) * -25 + '%)';
});




