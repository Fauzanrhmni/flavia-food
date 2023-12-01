// Modal Box 
const logoutModal = document.querySelector('#logout-modal');
const logoutButtons = document.querySelectorAll('.logout-button');

logoutButtons.forEach((btn) => {
  btn.onclick = (e) => {
    logoutModal.style.display = 'flex';
    e.preventDefault();
  };
});

// Klik tombol close modal
document.querySelector('.modal-logout-user .close-icon').onclick = (e) => {
  logoutModal.style.display = 'none';
  e.preventDefault();
}

document.querySelector('.modal-logout-user .cancel').onclick = (e) => {
  logoutModal.style.display = 'none';
  e.preventDefault();
}

// Klik di luar modal
window.onclick = (e) => {
  if (e.target === logoutModal) {
    logoutModal.style.display = 'none';
  }
};
