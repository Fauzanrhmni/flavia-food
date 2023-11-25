
      <!-- Aside Start -->
      <aside>
        <div class="top">
          <div class="logo">
            <img src="<?= base_url('assets/'); ?>img/icon.svg" />
            <h2>FLAVIA</h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-symbols-outlined"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <!-- LOOPING MENU -->
            <h5><?= $admin; ?></h5>
              <a href="<?= base_url('admin/dashboard_admin') ?>" > <!-- class="active" -->
                <span class="material-symbols-outlined"> dashboard </span>
                <h3>Dashboard</h3>
              </a>
              <a href="<?= base_url('admin/data_barang') ?>">
                <span class="material-symbols-outlined"> database </span>
                <h3>Data Barang</h3>
              </a>
              <a href="<?= base_url('admin/invoice') ?>">
                <span class="material-symbols-outlined"> receipt_long </span>
                <h3>Invoices</h3>
              </a>

          <!-- <a href="profil.html">
            <span class="material-symbols-outlined"> person </span>
            <h3>Profil</h3>
          </a>
          <a href="data.html">
            <span class="material-symbols-outlined"> group </span>
            <h3>Data</h3>
          </a>
          <a href="tatatertib.html">
            <span class="material-symbols-outlined"> info </span>
            <h3>Tata Tertib</h3>
          </a> 
          <a href="message.html"> class="active"
            <span class="material-symbols-outlined"> mail </span>
            <h3>Messages</h3>
            <span class="message-count">10</span>
          </a>
          <a href="about.html">
            <span class="material-symbols-outlined"> add_photo_alternate </span>
            <h3>Tentang Kami</h3>
          </a>
          <a href="kalender.html">
            <span class="material-symbols-outlined"> edit_calendar </span>
            <h3>Kalender</h3>
          </a> -->
          <a href="#" class="logout-button">
            <span class="material-symbols-outlined"> logout </span>
            <h3>Logout</h3>
          </a> 
        </div>
      </aside>
      <!-- Aside End -->

      <!-- Model Box Item Detail Start -->
      <div class="modal" id="item-detail-modal">
        <div class="modal-container">
          <a href="#" class="close-icon"><span class="material-symbols-outlined">close</span></a>
          <h5>Ready to Leave?</h5>
          <p>Select "Logout" below if you are ready to end your current session.</p>
          <div class="btn">
            <button class="cancel" type="button">Cancel</button>
            <a class="logout" href="#">Logout</a>
          </div>
        </div>
      </div>
