

<div class="table">
	<?= $this->session->flashdata('message'); ?>

	<div style="display: flex; align-items: center; margin-top: 1rem">
		<h4 style="font-size: 1.4rem">Role Access :</h4>
		<div
			style="
				font-size: 1rem;
				font-weight: 600;
				color: var(--color-success);
				padding: 0.3rem 1rem;
				border-radius: 0.8rem;
				border: 2px solid var(--color-success);
				margin-left: 1rem;
			"
		>
			<?= $role['role']; ?>
		</div>
	</div>
	<table class="table-role">
		<tr>
			<th>#</th>
			<th>Menu</th>
			<th>Access</th>
		</tr>
		<?php
            $i = 1;
            foreach ($menu as $m) : ?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $m['menu']; ?></td>
			<td>
				<input class="form-check-input" type="checkbox"
				<?= check_access($role['id'], $m['id']); ?>
				data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
  
  <div class="btn-top-table" style="margin-top: 2rem">
	<a href="<?= base_url('admin/dashboard_admin/role') ?>" class="add-new">
		<span class="material-symbols-outlined"> arrow_back_ios </span>
		Kembali
	</a>
</div>

</div>