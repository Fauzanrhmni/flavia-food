<!-- Profile Style -->

    <!-- Main Start -->
    <div class="kembali">
      <a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
        <span class="material-symbols-outlined"> arrow_back_ios </span>
        <h3>Kembali</h3>
      </a>
    </div>

    <div class="message">
      <?= $this->session->flashdata('message'); ?>
    </div>

    <main class="profile">
      <div class="myprofile">
        <div class="title">
          <h1>Account Details</h1>
          <h2>Manage your Flavia Profile</h2>
        </div>

        
        <?= form_open_multipart('dashboard/myprofile');?>
        
        <div class="image-profile">
          <div class="image-upload">
            <label for="image">
              <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>">
            </label>
            <label for="image"><span class="material-symbols-outlined" id="edit_square"> edit_square </span>
            </label>
          </div>
          <div class="profile-picture">
            <label>Profile Picture</label>
            <p>PNG, JPG, max size of 1MB</p>
          </div>
        </div>
        
        <label for="name">Member since <?= date('d F Y'); ?></label>
       
        <div class="input-profile">

          <div class="inp-profile">
            <label for="image">Edit Image</label>
            <input type="file" name="image" id="image" value="">
          </div>
            
          <div class="inp-profile" style="grid-template-rows: repeat(3, max-content);">
            <label for="name">Full name</label>
            <input type="text" name="name" id="name" value="<?= $user['name']; ?>">
            <?= form_error('name', '<small style="color: var(--red); font-weight: 400;">', '</small>'); ?>
          </div>
      
          <div class="inp-profile">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" value="<?= $user['email']; ?>" readonly style="background-color: var(--white-gray);">
          </div>
      
        </div>

        <div class="submit">
          <a href="#" class="change">Change Password?</a>
          <button type="submit">Update</button>
        </div>
        </form>
      </div>

      <div class="changepass" id="modal-pass">
        <div class="title">
          <h1>Change Password</h1>
          <h2>Ensure your new password is strong and not easily guessed</h2>
        </div>

        <form action="<?= base_url('dashboard/changepassword'); ?>" method="post">
        
          <div class="input-profile">

            <div class="inp-profile">
              <label for="current_password">Current Password</label>
              <input type="password" name="current_password" id="current_password" placeholder="current password">
              <?= form_error('current_password', '<small style="color: #cd0067; font-weight: 400;">', '</small>'); ?>
            </div>

            <div class="inp-profile">
              <label for="new_password1">New Password</label>
              <input type="password" name="new_password1" id="new_password1" placeholder="New password">
              <?= form_error('new_password1', '<small style="color: #cd0067; font-weight: 400;">', '</small>'); ?>
            </div>

            <div class="inp-profile">
              <label for="new_password">Repeat Password</label>
              <input type="password" name="new_password2" id="new_password2" placeholder="Repeat password">
              <?= form_error('new_password2', '<small style="color: #cd0067; font-weight: 400;">', '</small>'); ?>
            </div>

          </div>

          <div class="submit">
            <button type="button" class="cancel">Cancel</button>
            <button type="submit">Save</button>
          </div>

        </form>

      </div>

      <script>
				// Modal Box
				const modalpass = document.querySelector("#modal-pass");
				const btnchange = document.querySelectorAll(".change");

				btnchange.forEach((btn) => {
					btn.onclick = (e) => {
						modalpass.style.display = "grid";
						e.preventDefault();
					};
				});

				// Klik tombol close modal
				document.querySelector(
					".profile .changepass .submit .cancel"
				).onclick = (e) => {
					modalpass.style.display = "none";
					e.preventDefault();
				};
			</script>
    </main>
    <!-- Main End -->
    
    
    
    
    