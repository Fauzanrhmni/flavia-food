<!-- Edit Style -->
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
    --success-validation: #4ade80;
    --box-shadow: 0 2rem 3rem var(--shadow);
  }

  .edit-brg .input-g {
  	display: flex;
  	align-items: center;
  	width: 5rem;
  	margin-bottom: 1rem;
  }

  .edit-brg .input-g .active-check {
  	display: flex;
  	font-size: 1.1rem;
  }

  .edit-brg .input-g .active-check input[type="checkbox"] {
  	margin-right: 1rem;
  	height: 16px;
  	width: 16px;
  }
</style>
<div class="edit-brg">
  <form action="<?= base_url('admin/dashboard_admin/edituser/'.$datauser['id']); ?>" method="post">
        
    <input type="hidden" name="id" value="<?= $datauser['id']; ?>">
    
    <div class="input">
      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" value="<?= $datauser['name']; ?>" readonly style="background-color: var(--white-gray);">
    </div>

    <div class="input">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?= $datauser['email']; ?>" readonly style="background-color: var(--white-gray);">
    </div>

    <div class="input">
      <label for="role_id">Role</label>
      <input type="text" name="role_id" id="role_id" value="<?= $datauser['role_id']; ?>">
    </div>

    <div class="input-g">
      <label class="active-check">
        <input class="form-check" type="checkbox" name="is_active" id="is_active" value="1" checked>
        Active?
      </label>
    </div>
    <div>
      <div class="button">
        <button class="save" type="submit">Save</button>
        <a href="<?= base_url('admin/dashboard_admin/datauser'); ?>" class="cancel">Cancel</a>
      </div>
    </div>
  </form>

</div>