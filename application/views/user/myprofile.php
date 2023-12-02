<!-- Profile Style -->

    <!-- Main Start -->
    <div class="kembali">
      <a href="<?= base_url('dashboard'); ?>" class="btn-kembali">
        <span class="material-symbols-outlined"> arrow_back_ios </span>
        <h3>Kembali</h3>
      </a>
    </div>
    <main class="profile">
      <div class="myprofile">
        <div class="title">
          <h1>Account Details</h1>
          <h2>Manage your Flavia Profile</h2>
        </div>

        <?= $this->session->flashdata('message'); ?>
        
        <?= form_open_multipart('dashboard/myprofile');?>
        <!-- <form action="<?= base_url('dashboard/myprofile'); ?>" method="post" enctype="multipart/form-data"> -->
        
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
      
            <!-- <div class="inp-profile">
              <label for="email">Change Password</label>
              <input type="text" name="email" id="email" placeholder="Change Password">
            </div> -->
          </div>

          <div class="submit">
            <button type="submit">Update</button>
          </div>
        </form>
      </div>
      
    </main>
    <!-- Main End -->
    



