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
const activePatientL = document.querySelector('.patient');
const activeDoctorL = document.querySelector('.doctor');
const activePharmacyL = document.querySelector('.pharmacy');
const activeCompanyL = document.querySelector('.company');
const activeAdminL = document.querySelector('.admin');

const logWrapper = document.querySelector('.wrapper.login');


const patientACL = document.querySelector('.login_patient');
const doctorACL = document.querySelector('.login_doctor');
const pharmacyACL = document.querySelector('.login_pharmacy');
const companyACL = document.querySelector('.login_company');
const adminACL = document.querySelector('.login_admin');

activePatientL.addEventListener('click', ()=> {
    patientACL.classList.add('active');
    pharmacyACL.classList.remove('active');
    doctorACL.classList.remove('active');
    companyACL.classList.remove('active');
    adminACL.classList.remove('active');
})

activeDoctorL.addEventListener('click', ()=> {
  doctorACL.classList.add('active');
  patientACL.classList.remove('active');
  pharmacyACL.classList.remove('active');
  companyACL.classList.remove('active');
  adminACL.classList.remove('active');
})

activePharmacyL.addEventListener('click', ()=> {
  pharmacyACL.classList.add('active');
  patientACL.classList.remove('active');
  doctorACL.classList.remove('active');
  companyACL.classList.remove('active');
  adminACL.classList.remove('active');
})

activeCompanyL.addEventListener('click', ()=> {
  companyACL.classList.add('active');
  patientACL.classList.remove('active');
  pharmacyACL.classList.remove('active');
  doctorACL.classList.remove('active');
  adminACL.classList.remove('active');
})

activeAdminL.addEventListener('click', ()=> {
  adminACL.classList.add('active');
  patientACL.classList.remove('active');
  pharmacyACL.classList.remove('active');
  doctorACL.classList.remove('active');
  companyACL.classList.remove('active');
})



//Handling registration for different users
const activePatientR = document.querySelector('.patient');
const activeDoctorR = document.querySelector('.doctor');
const activePharmacyR = document.querySelector('.pharmacy');
const activeCompanyR = document.querySelector('.company');

const regWrapper = document.querySelector('.wrapper');

const patientACR = document.querySelector('.register_patient');
const doctorACR = document.querySelector('.register_doctor');
const pharmacyACR = document.querySelector('.register_pharmacy');
const companyACR = document.querySelector('.register_company');

activePatientR.addEventListener('click', ()=> {
    patientACR.classList.add('active');
    pharmacyACR.classList.remove('active');
    doctorACR.classList.remove('active');
    companyACR.classList.remove('active');
    adminACL.classList.remove('active');
})

activeDoctorR.addEventListener('click', ()=> {
  doctorACR.classList.add('active');
  patientACR.classList.remove('active');
  pharmacyACR.classList.remove('active');
  companyACR.classList.remove('active');
  adminACL.classList.remove('active');
})

activePharmacyL.addEventListener('click', ()=> {
  pharmacyACR.classList.add('active');
  patientACR.classList.remove('active');
  doctorACR.classList.remove('active');
  companyACR.classList.remove('active');
  adminACL.classList.remove('active');
})

activeCompanyR.addEventListener('click', ()=> {
  companyACR.classList.add('active');
  patientACR.classList.remove('active');
  pharmacyACR.classList.remove('active');
  doctorACR.classList.remove('active');
  adminACL.classList.remove('active');
})
