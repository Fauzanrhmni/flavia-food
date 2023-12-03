<!-- Edit Style -->
<style>
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
  <form action="<?= base_url('admin/dashboard_admin/editrole/'.$role['id']); ?>" method="post">
        
    <input type="hidden" name="id" value="<?= $role['id']; ?>">
    
    <div class="input">
      <label for="role">Edit TItle Role</label>
      <input type="text" name="role" id="role" value="<?= $role['role']; ?>">
    </div>
    
    <div>
      <div class="button">
        <button class="save" type="submit">Save</button>
        <a href="<?= base_url('admin/dashboard_admin/role'); ?>" class="cancel">Cancel</a>
      </div>
    </div>
  </form>

</div>