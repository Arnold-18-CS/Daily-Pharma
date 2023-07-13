//Handling the overlay
function toggleOverlay() {
  var menu = document.getElementById("menu");
  var menuContent = document.getElementById("menu-content");

  if (menu.style.width === "100%") {
    menu.style.width = "0";
    menuContent.style.display = "none";
  } else {
    menu.style.width = "100%";
    menuContent.style.display = "block";
  }
}

// Function to handle window resize event
function handleResize() {
  var menu = document.getElementById("menu");
  var menuContent = document.getElementById("menu-content");

  if (window.innerWidth > 900) {
    menu.style.width = "0";
    menuContent.style.display = "none";
  }
}

// Call the handleResize function initially and on window resize
handleResize();
window.addEventListener("resize", handleResize);

//Handling Login for different Users
const activePatient = document.querySelector('.patient');
const activeDoctor = document.querySelector('.doctor');
const activePharmacy = document.querySelector('.pharmacy');
const activeCompany = document.querySelector('.company');
const activeAdmin = document.querySelector('.admin');

const patientAC = document.querySelector('.login_patient');
const doctorAC = document.querySelector('.login_doctor');
const pharmacyAC = document.querySelector('.login_pharmacy');
const companyAC = document.querySelector('.login_company');
const adminAC = document.querySelector('.login_admin');

activePatient.addEventListener('click', ()=> {
    patientAC.classList.add('active');
    pharmacyAC.classList.remove('active');
    doctorAC.classList.remove('active');
    companyAC.classList.remove('active');
    adminAC.classList.remove('active');
})

activeDoctor.addEventListener('click', ()=> {
  doctorAC.classList.add('active');
  patientAC.classList.remove('active');
  pharmacyAC.classList.remove('active');
  companyAC.classList.remove('active');
  adminAC.classList.remove('active');
})

activePharmacy.addEventListener('click', ()=> {
  pharmacyAC.classList.add('active');
  patientAC.classList.remove('active');
  doctorAC.classList.remove('active');
  companyAC.classList.remove('active');
  adminAC.classList.remove('active');
})

activeCompany.addEventListener('click', ()=> {
  companyAC.classList.add('active');
  patientAC.classList.remove('active');
  pharmacyAC.classList.remove('active');
  doctorAC.classList.remove('active');
  adminAC.classList.remove('active');
})

activeAdmin.addEventListener('click', ()=> {
  adminAC.classList.add('active');
  patientAC.classList.remove('active');
  pharmacyAC.classList.remove('active');
  doctorAC.classList.remove('active');
  companyAC.classList.remove('active');
})
