<body>
    <!-- Sidebar Start -->
    <aside class="sidebar">
      <a href="<?= base_url('dashboard') ?>"><img src="<?= base_url() ?>assets/img/logo.svg" class="logo" /></a>
      <div class="filter">
        <h2>Filter</h2>
        <h2>Kategori</h2>

        <div class="kategori">
          <div class="checkbox">
            <a href="<?= base_url('kategori/junkfood') ?>">
              <span class="material-symbols-outlined"> fastfood </span>
              Junkfood
            </a>
          </div>

          <div class="checkbox">
            <a href="<?= base_url('kategori/pizza') ?>">
              <span class="material-symbols-outlined"> local_pizza </span>
              Pizza
            </a>
          </div>

          <div class="checkbox">
            <a href="<?= base_url('kategori/mie') ?>">
              <span class="material-symbols-outlined"> ramen_dining </span>
              Mie
            </a>
          </div>

          <div class="checkbox">
            <a href="<?= base_url('kategori/drink') ?>">
              <span class="material-symbols-outlined"> local_cafe </span>
              Drink
            </a>
          </div>
          
          <div class="checkbox">
            <a href="<?= base_url('kategori/icecream') ?>">
              <span class="material-symbols-outlined"> mode_cool </span>
              Ice Cream
            </a>
          </div>

        </div>
      </div>
    </aside>
    <!-- Sidebar End -->