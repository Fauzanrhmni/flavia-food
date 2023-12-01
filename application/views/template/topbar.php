    <!-- Navbar Start -->
    <nav class="navbar">
      <div class="navbar-nav">
        <h1><?= $title2; ?></h1>
        <div class="profil">
          <div class="icon">
            <?php $keranjang = $this->cart->total_items()?>
            <a href="<?= base_url('dashboard/detail_keranjang'); ?>"><span class="material-symbols-outlined" style="color: var(--black);"> shopping_cart </span></a>
            <div class="numb">
              <?= anchor('dashboard/detail_keranjang', $keranjang) ?>
            </div>
          </div>

          <div class="icon">
            <span class="material-symbols-outlined"> event_note </span>
          </div>

          <div class="dropdown">
            <div class="img"><img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" /></div>
            <div id="myDropdown" class="dropdown-content">
              <div class="link">
                <span class="material-symbols-outlined">person</span>
                <a href="<?= base_url('dashboard/myprofile'); ?>">My Profile</a>
              </div>
              <div class="link">
                <span class="material-symbols-outlined">logout</span>
                <a href="#" class="logout-button">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Model Box Item Detail Start -->
    <div class="modal-logout-user" id="logout-modal">
      <div class="logout-container">
        <a href="#" class="close-icon"><span class="material-symbols-outlined">close</span></a>
        <h5>Ready to Leave?</h5>
        <p>Select "Logout" below if you are ready to end your current session.</p>
        <div class="btn">
          <button class="cancel" type="button">Cancel</button>
          <a class="logout" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
    <!-- Navbar End -->

    <script>
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
    </script>
