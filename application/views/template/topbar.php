    <!-- Navbar Start -->
    <nav class="navbar">
      <div class="navbar-nav">
        <h1><?= $title2; ?></h1>
        <div class="profil">
          <div class="icon">
            <?php $keranjang = $this->cart->total_items()?>
            <span class="material-symbols-outlined"> shopping_cart </span>
            <div class="numb">
              <?= anchor('dashboard/detail_keranjang', $keranjang) ?>
            </div>
          </div>

          <div class="icon">
            <span class="material-symbols-outlined"> event_note </span>
          </div>

          <a href="#"><img src="../friedfries.jpg" /></a>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->