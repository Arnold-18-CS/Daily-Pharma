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
const activePatientR = document.querySelector('.patient_r');
const activeDoctorR = document.querySelector('.doctor_r');
const activePharmacyR = document.querySelector('.pharmacy_r');
const activeCompanyR = document.querySelector('.company_r');
const wrapper = document.querySelector('.wrapper');
const patientACR = document.querySelector('.register_patient');
const doctorACR = document.querySelector('.register_doctor');
const pharmacyACR = document.querySelector('.register_pharmacy');
const companyACR = document.querySelector('.register_company');

activePatientR.addEventListener('click', ()=> {
    wrapper.style.height = "750px";
    patientACR.classList.add('active');
    pharmacyACR.classList.remove('active');
    doctorACR.classList.remove('active');
    companyACR.classList.remove('active');
})

activeDoctorR.addEventListener('click', ()=> {
    wrapper.style.height = "700px";
  doctorACR.classList.add('active');
  patientACR.classList.remove('active');
  pharmacyACR.classList.remove('active');
  companyACR.classList.remove('active');

})

activePharmacyR.addEventListener('click', ()=> {
    wrapper.style.height = "600px";
    pharmacyACR.classList.add('active');
    patientACR.classList.remove('active');
    doctorACR.classList.remove('active');
    companyACR.classList.remove('active');
})

activeCompanyR.addEventListener('click', ()=> {
    wrapper.style.height = "570px";
  companyACR.classList.add('active');
  patientACR.classList.remove('active');
  pharmacyACR.classList.remove('active');
  doctorACR.classList.remove('active');

})
