// Sign Up Modal Selectors

const signUpModal = document.querySelector('.sign-up-modal');
const btnOpenSignUpModal = document.querySelector('.show-sign-up-modal');
const btnCloseSignUpModal = document.querySelector('.close-sign-up-modal');

// Open and close sign up modal
btnOpenSignUpModal.addEventListener('click', openSignUpModal);

// Open SignUp Modal Function
function openSignUpModal() {
  signUpModal.style.display = "block";
  overlay.classList.remove('hidden');
}

// Add event listener to button and on click - Run closeSignUp Function
btnCloseSignUpModal.addEventListener('click', closeSignUpModal);

// Close SignUp Function
function closeSignUpModal() {
  signUpModal.style.display = 'none';
  overlay.classList.add('hidden');
}


// Login Modal Selectors

const logInModal = document.querySelector('.log-in-modal');
const btnCloseLogInModal = document.querySelector('.close-log-in-modal');
const btnOpenLogInModal = document.querySelector('.show-log-in-modal');
const overlay = document.querySelector('.overlay');

// Open and close Log In Modal

// Add event listener to button and on click - Run openLogIn Function
btnOpenLogInModal.addEventListener('click', openLogInModal);

// Open LogInModal Function
function openLogInModal() {
  logInModal.style.display = "block";
  overlay.classList.remove('hidden');
}

// Add event listener to button and on click - Run closeModal Function
btnCloseLogInModal.addEventListener('click', closeLogInModal);

// Close LogIn Modal Function
function closeLogInModal() {
  logInModal.style.display = 'none';
  overlay.classList.add('hidden');
}



// Add Day Details Modals
const addDetailsModal = document.querySelector('.add-details-modal');
const btnCloseAddModal = document.querySelector('.close-add-modal');
const btnOpenAddModal = document.querySelectorAll('.show-add-modal');

// Loop to get all show add modal buttons
for (let i = 0; i < btnOpenAddModal.length; i++) {
  btnOpenAddModal[i].addEventListener('click', openAddDetails);
}

// Open and close add details modal
// btnOpenAddModal.addEventListener('click', openAddDetails);

// Open add details modal function
function openAddDetails() {
  addDetailsModal.style.display = "block";
  overlay.classList.remove('hidden');
}

// Add event listener to button and on click - Run closeAddDetails Function
btnCloseAddModal.addEventListener('click', closeAddDetailsModal);

// Close addDetailsModal Function
function closeAddDetailsModal() {
  addDetailsModal.style.display = 'none';
  overlay.classList.add('hidden');
}


// Delete Day Details Modals
const delDetailsModal = document.querySelector('.del-details-modal');
const btnCloseDelModal = document.querySelector('.close-del-modal');
const btnOpenDelModal = document.querySelectorAll('.show-del-modal');


// Loop to get all show delete modal buttons
for (let i = 0; i < btnOpenDelModal.length; i++) {
  btnOpenDelModal[i].addEventListener('click', openDelDetails);
}

// Open and close add details modal
// btnOpenDelModal.addEventListener('click', openDelDetails);

// Open Delete details modal function
function openDelDetails() {
  delDetailsModal.style.display = "block";
  overlay.classList.remove('hidden');
}

// Add event listener to button and on click - Run closeAddDetails Function
btnCloseDelModal.addEventListener('click', closeDelDetailsModal);

// Close addDetailsModal Function
function closeDelDetailsModal() {
  delDetailsModal.style.display = 'none';
  overlay.classList.add('hidden');
}



// Update Day Details Modals
const updateDetailsModal = document.querySelector('.update-details-modal');
const btnCloseUpdateModal = document.querySelector('.close-update-modal');
const btnOpenUpdateModal = document.querySelectorAll('.show-update-modal');


// Loop to get all show add modal buttons
//for (let i = 0; i < btnOpenUpdateModal.length; i++) {
  //btnOpenUpdateModal[i].addEventListener('click', openUpdateDetails);
//}

// // Open and close Update details modal
// btnOpenUpdateModal.addEventListener('click', openUpdateDetails);

// Open Update details modal function
function openUpdateDetails() {
  updateDetailsModal.style.display = "block";
  overlay.classList.remove('hidden');
}

// Add event listener to button and on click - Run closeUpdateDetails Function
btnCloseUpdateModal.addEventListener('click', closeUpdateDetailsModal);

// Close updateDetailsModal Function
function closeUpdateDetailsModal() {
  updateDetailsModal.style.display = 'none';
  overlay.classList.add('hidden');
}



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






