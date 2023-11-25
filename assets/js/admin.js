// Toggle class active
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

// Ketika menu di klik
menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none";
});

// Modal Box 
// const itemDetailModal = document.querySelector('#item-detail-modal');
// const modalForm = document.querySelector('#modal-form');
const modalSubmenu = document.querySelector('#modal-submenu');

// const logoutBtn = document.querySelectorAll('.logout-button');
// const addNewBtn = document.querySelectorAll('.add-new-button');
const addNewSubMenu = document.querySelectorAll('.add-new');

// Logout Button
// logoutBtn.forEach((btn) => {
//   btn.onclick = (e) => {
//     itemDetailModal.style.display = 'flex';
//     e.preventDefault();
//   };
// });

// Add New Menu Button
// addNewBtn.forEach((btn) => {
//   btn.onclick = (e) => {
//     modalForm.style.display = 'flex';
//     e.preventDefault();
//   };
// });

// Add New Sub Menu Button
addNewSubMenu.forEach((btn) => {
  btn.onclick = (e) => {
    modalSubmenu.style.display = 'flex';
    e.preventDefault();
  };
});

// Klik tombol close modal logout
// document.querySelector('.modal .close-icon').onclick = (e) => {
//   itemDetailModal.style.display = 'none';
//   e.preventDefault();
// }

// document.querySelector('.modal .cancel').onclick = (e) => {
//   itemDetailModal.style.display = 'none';
//   e.preventDefault();
// }

// Klik tombol close modal Menu
// document.querySelector('.mod-form .close-icon-form').onclick = (e) => {
//   modalForm.style.display = 'none';
//   e.preventDefault();
// }

// document.querySelector('.mod-form .cancel').onclick = (e) => {
//   modalForm.style.display = 'none';
//   e.preventDefault();
// }

// Klik tombol close modal Add New Menu
document.querySelector('.form-submenu .close-icon-submenu').onclick = (e) => {
  modalSubmenu.style.display = 'none';
  e.preventDefault();
}

document.querySelector('.form-submenu .cancel-submenu').onclick = (e) => {
  modalSubmenu.style.display = 'none';
  e.preventDefault();
}

// Klik di luar modal logout
window.onclick = (e) => {
  // if (e.target === itemDetailModal) {
  //   itemDetailModal.style.display = 'none';
  // }
  // if (e.target === modalForm) {
  //   modalForm.style.display = 'none';
  // }
  if (e.target === modalSubmenu) {
    modalSubmenu.style.display = 'none';
  }
};

// window.onclick = (e) => {
  //   if (e.target === itemDetailModal) {
    //     itemDetailModal.style.display = 'none';
//   }
// };

// // Klik di luar modal Menu
// window.onclick = (e) => {
//   if (e.target === modalForm) {
  //     modalForm.style.display = 'none';
  //   }
  // };
  
// // Klik di luar modal Add New Menu
// window.onclick = (e) => {
//   if (e.target === modalSubmenu) {
//     modalSubmenu.style.display = 'none';
//   }
// };

