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
  <form action="<?= base_url('menu/editsubmenu/'.$submenu['id']); ?>" method="post">
        
    <input type="hidden" name="id" value="<?= $submenu['id']; ?>">
    
    <div class="input">
      <label for="title">Submenu Title</label>
      <input type="text" name="title" id="title" value="<?= $submenu['title']; ?>">
    </div>
    
    <div class="input">
      <label for="menu_id">Menu Id</label>
      <select name="menu_id" id="menu_id">
        <option value="junkfood">Select Menu</option>
        <?php foreach ($menu as $m) : ?>
        <option value="<?= $m['id'] ?>" <?= ($m['id'] == $submenu['menu_id']) ? 'selected' : '' ?>><?= $m['menu'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="input">
      <label for="url">Submenu Url</label>
      <input type="text" name="url" id="url" value="<?= $submenu['url']; ?>">
    </div>
      
      
    <div class="input">
      <label for="icon">Submenu Icon</label>
      <input type="text" name="icon" id="icon" value="<?= $submenu['icon']; ?>">
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
        <a href="<?= base_url('menu/submenu'); ?>" class="cancel">Cancel</a>
      </div>
    </div>
  </form>

</div>