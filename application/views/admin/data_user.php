<div class="table">
          <?= form_error('role', '<div class="activation-failed">','</div>'); ?>

          <?= $this->session->flashdata('message'); ?>

          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($datauser as $du) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $du['name']; ?></td>
              <td><?= $du['email']; ?></td>
              <td><?= $du['role_id']; ?></td>
              <td><?= $du['is_active']; ?></td>
              <td>
                <div class="button">
                  <a href="<?= base_url('admin/dashboard_admin/edituser/') . $du['id']?>" class="cta-success">
                    <span class="material-symbols-outlined"> edit_square </span>
                  </a>
                  <a href="<?= base_url('admin/dashboard_admin/deleteuser/') . $du['id']?>" class="cta-danger">
                    <span class="material-symbols-outlined"> delete </span>
                  </a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
