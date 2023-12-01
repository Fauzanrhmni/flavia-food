
      <!-- Main Start -->
      <main>
        <div class="main-left">
          <div class="left">
            <h1><?= $title; ?></h1>

            <div class="date">
              <p><?php echo date("d-m-Y"); ?></p>
              <span class="material-symbols-outlined"> calendar_today </span>
            </div>
          </div>

          <div class="right">
            <div class="top">
              <button id="menu-btn">
                <span class="material-symbols-outlined"> menu </span>
              </button>
              <a href="<?= base_url('admin/myprofile'); ?>">
                <div class="profile">
                  <div class="info">
                    <p><b><?= $user['name']; ?></b></p>
                    <small class="text-muted"><?= $admin; ?></small>
                  </div>
                  <div class="profile-photo">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" />
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

