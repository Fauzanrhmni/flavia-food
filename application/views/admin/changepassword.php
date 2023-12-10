<!-- Edit Style -->

<div class="change-password">
  <?= $this->session->flashdata('message'); ?>

  <form action="<?= base_url('admin/dashboard_admin/changepassword'); ?>" method="post">
        
    <input type="hidden" name="id" value="">
    
    <div class="input">
      <label for="current_password">Current Password</label>
      <input type="password" name="current_password" id="current_password" placeholder="Current password">
      <?= form_error('current_password', '<small style="color: #cd0067; font-weight: 400;">', '</small>'); ?>
    </div>
    
    <div class="input">
      <label for="new_password1">New Password</label>
      <input type="password" name="new_password1" id="new_password1" placeholder="New password">
      <?= form_error('new_password1', '<small style="color: #cd0067; font-weight: 400;">', '</small>'); ?>
    </div>
    
    <div class="input">
      <label for="new_password2">Repeat Password</label>
      <input type="password" name="new_password2" id="new_password2" placeholder="Repeat password">
      <?= form_error('new_password2', '<small style="color: #cd0067; font-weight: 400;">', '</small>'); ?>
    </div>

    <div>
      <div class="button">
        <button class="save" type="submit">Save</button>
      </div>
    </div>
  </form>

</div>