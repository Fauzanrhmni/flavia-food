<!-- Profile Style -->

    <!-- Main Start -->
    <div class="kembali">
      <button class="btn-kembali" id="btnKembali">
        <span class="material-symbols-outlined"> arrow_back_ios </span>
        <h3>Kembali</h3>
      </button>

      <script>
        document.getElementById('btnKembali').addEventListener('click', function() {
            // Menggunakan window.history untuk kembali ke halaman sebelumnya
            window.history.back();
        });
      </script>
    </div>
    <main class="profile">
      <div class="myprofile">
        <div class="title">
          <h1>Account Details</h1>
          <h2>Manage your Flavia Profile</h2>
        </div>

        <div class="image-profile">
          <img src="assseyt">
          <div class="profile-picture">
            <label>Profile Picture</label>
            <p>PNG, JPG, max size of 1MB</p>
          </div>
        </div>
        
        <label for="name">Member since <?= date('d F Y'); ?></label>
        
        <form action="" method="post">
          <div class="input-profile">

            <div class="inp-profile">
              <label for="name">Fullname</label>
              <input type="text" name="name" id="name" value="<?= $user['name']; ?>" placeholder="Fullname">
            </div>
      
            <div class="inp-profile">
              <label for="email">Email Address</label>
              <input type="text" email="email" id="email" value="<?= $user['email']; ?>" placeholder="Email address">
            </div>
      
            <div class="inp-profile">
              <label for="email">Change Password</label>
              <input type="text" email="email" id="email" placeholder="Change Password">
            </div>
          </div>

          <div class="submit">
            <button type="submit">Update</button>
          </div>
        </form>
      </div>
      
    </main>
    <!-- Main End -->
    



