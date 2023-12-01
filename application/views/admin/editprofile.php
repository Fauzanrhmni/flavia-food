<!-- Profile Style -->
<style>
      :root {
        --yellow: #ffcc00;
        --red: #cd0067;
        --green: #88c23a;
        --white: #fff;
        --white-gray: #f0f0f0;
        --gray: #cecece;
        --black: #000;
        --color-background: #f6f6f9;
        --shadow: rgba(132, 139, 200, 0.18);
        --failed-validation: #ff7782;
        --success-validation: #41f1b6;
        --box-shadow: 0 2rem 3rem var(--shadow);
      }

      .profile-admin {
        display: flex;
        align-items: center;
        margin-top: 2rem;
      }

      .profile-admin .myprofile {
        display: grid;
        grid-template-rows: repeat(2, max-content);
        gap: 1.5rem;
        background-color: var(--white);
        width: 35rem;
        padding: 2rem;
        font-weight: 600;
        border-radius: 1rem;
        box-shadow: var(--box-shadow);
      }

      .profile-admin .myprofile:hover {
        box-shadow: none;
      }

      .profile-admin .myprofile .title h1 {
        font-size: 1.2rem;
        color: var(--black);
      }

      .profile-admin .myprofile .title h2 {
        font-size: 0.8rem;
        color: var(--black);
        font-weight: 400;
      }

      .profile-admin .myprofile .image-profile {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: 100%;
      }

      .profile-admin .myprofile .image-profile img {
        width: 3rem;
        height: 3rem;
      }

      .profile-admin .myprofile label {
        font-size: 0.8rem;
      }

      .profile-admin .myprofile .image-profile .profile-picture p {
        font-size: 0.7rem;
        color: var(--black);
        font-weight: 400;
      }

      .profile-admin .myprofile form {
        display: grid;
        grid-template-rows: repeat(2, max-content);
        gap: 1.5rem;
      }

      .profile-admin .myprofile .input-profile {
        display: grid;
        grid-template-rows: repeat(3, 1fr);
        gap: 0.5rem;
      }

      .profile-admin .myprofile .input-profile .inp-profile {
        display: grid;
        grid-template-rows: repeat(2, max-content);
        gap: 0.5rem;
        width: 100%;
      }

      .profile-admin .myprofile .input-profile .inp-profile input {
        font-family: "Poppins", sans-serif;
        padding: 0.7rem 1rem;
        border-radius: 0.5rem;
        border: 2px solid var(--gray);
        background: transparent;
      }

      .profile-admin .myprofile .submit {
        display: flex;
        justify-content: end;
        align-items: center;
      }

      .profile-admin .myprofile .submit button {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        padding: 0.3rem 1rem;
        border-radius: 0.5rem;
        background-color: var(--black);
        color: var(--white);
        font-size: 0.8rem;
      }

      .profile-admin .myprofile .submit button:hover {
        background-color: #474954;
      }
    </style>

    <main class="profile-admin">
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
    



