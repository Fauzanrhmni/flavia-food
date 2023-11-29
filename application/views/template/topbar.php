    <!-- Navbar Start -->
    <nav class="navbar">
      <div class="navbar-nav">
        <h1><?= $title2; ?></h1>
        <div class="profil">
          <div class="icon">
            <?php $keranjang = $this->cart->total_items()?>
            <?= anchor('dashboard/detail_keranjang', '<span class="material-symbols-outlined" style="color: var(--black);"> shopping_cart </span>') ?>
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
                <a href="<?= base_url('dashboard/myprofile'); ?>" class="logout-button">My Profile</a>
              </div>
              <div class="link">
                <span class="material-symbols-outlined">logout</span>
                <a href="<?= base_url('auth/logout'); ?>" class="logout-button">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->