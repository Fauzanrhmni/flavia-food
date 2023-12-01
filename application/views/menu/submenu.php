        <div class="table">
          <?php if(validation_errors()) : ?>
          <div class="activation">
            <p><?= validation_errors(); ?></p>
          </div>
          <?php endif; ?>

          <?= $this->session->flashdata('message'); ?>

          <div class="btn-top-table">
            <a href="#" class="add-new" >
              <span class="material-symbols-outlined"> add </span>
              Add Sub Menu
            </a>
          </div>

          <table class="table-submenu">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Menu</th>
              <th>Url</th>
              <th>Icon</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($subMenu as $sm) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $sm['title']; ?></td>
              <td><?= $sm['menu']; ?></td>
              <td><?= $sm['url']; ?></td>
              <td><?= $sm['icon']; ?></td>
              <td><?= $sm['is_active']; ?></td>
              <td>
                <div class="button" style="	display: flex; align-items: center; justify-content: space-between; width: 5rem;">
                  <a href="<?= base_url('menu/editsubmenu/') . $sm['id']?>" class="cta-success">
                    <span class="material-symbols-outlined"> edit_square </span>
                  </a>
                  <a href="<?= base_url('menu/deletesubmenu/') . $sm['id']?>" class="cta-danger">
                    <span class="material-symbols-outlined"> delete </span>
                  </a>
                </div>                  
                </div>
              </td>
            </tr>

            <?php endforeach; ?>
          </table>
        </div>
        
        <style>
  	      .form-submenu {
  	      	display: none;
  	      	position: fixed;
  	      	z-index: 999;
  	      	top: 0;
  	      	left: 0;
  	      	width: 100%;
  	      	height: 100vh;
  	      	overflow: auto;
  	      	background-color: rgba(0, 0, 0, 0.5);
  	      }
        
  	      .submenu-container {
  	      	display: block;
  	      	position: relative;
  	      	background-color: var(--color-white);
  	      	margin: 4% auto;
  	      	color: var(--color-dark);
  	      	padding: 3rem;
  	      	height: 31rem;
  	      	border-radius: 1rem;
  	      	animation: animateModal 0.5s;
  	      }
        
  	      .submenu-container .input-group {
  	      	display: flex;
  	      	justify-content: start;
  	      	align-items: center;
  	      	width: 100%;
  	      	margin-bottom: 1rem;
  	      }
        
  	      .submenu-container .input-g {
  	      	display: flex;
  	      	align-items: center;
  	      	width: 5rem;
  	      	margin-bottom: 1rem;
  	      }
        
  	      .submenu-container .input-g .active-check {
  	      	display: flex;
  	      	font-size: 1.1rem;
  	      }
        
  	      .submenu-container .input-g .active-check input[type="checkbox"] {
  	      	margin-right: 1rem;
  	      	height: 16px;
  	      	width: 16px;
  	      }
        
  	      .submenu-container input,
  	      .submenu-container .input-group .select-menu {
  	      	width: 30rem;
  	      	padding: 0.8rem 1rem;
  	      	border: 1px solid var(--color-dark-variant);
  	      	border-radius: var(--border-radius-1);
  	      	font-family: "Poppins", sans-serif;
  	      	font-size: 1.1rem;
  	      }
        
          /* Modal Animation */
          @keyframes animateModal {
          	from {
          		top: -300px;
          		opacity: 0;
          	}
          
          	to {
          		top: 0;
          		opacity: 1;
          	}
          }

          .submenu-container .close-icon-submenu {
          	position: absolute;
          	right: 1rem;
          	top: 1rem;
          	color: black;
          	transform: scale(0.9);
          }
        
          .submenu-container .close-icon-submenu:hover {
          	color: var(--color-info-dark);
          }

          .submenu-container h5 {
          	font-size: 1.5rem;
          	font-weight: 500;
          	margin-bottom: 0.8rem;
          }

          .submenu-container p {
          	font-size: 1rem;
          	font-weight: 500;
          	margin-bottom: 3rem;
          }

          .submenu-container .btn {
          	display: flex;
          	justify-content: end;
          	text-align: center;
          }

          .submenu-container .btn .cancel-submenu {
          	font-family: "Poppins", sans-serif;
          	padding: 0.5rem 1rem;
          	font-size: 1rem;
          	border-radius: 0.5rem;
          	background-color: #a9a9a9;
          	color: var(--color-white);
          }

          .submenu-container .btn .cancel-submenu:hover {
          	background-color: #868686;
          }

          .submenu-container .btn .submit {
          	font-family: "Poppins", sans-serif;
          	padding: 0.5rem 1rem;
          	font-size: 1rem;
          	border-radius: 0.5rem;
          	background-color: #ffcc00;
          	color: var(--color-white);
          	margin-left: 1rem;
          }

          .submenu-container .btn .submit:hover {
          	background-color: #f0c000;
          }

          .form-submenu .input-g {
          	display: flex;
          	align-items: center;
          	width: 5rem;
          	margin-bottom: 1rem;
          }
        
          .form-submenu .input-g .active-check {
          	display: flex;
          	font-size: 1.1rem;
          }
        
          .form-submenu .input-g .active-check input[type="checkbox"] {
          	margin-right: 1rem;
          	height: 16px;
          	width: 16px;
          }
        </style>

        <!-- Model Box Item Form Start -->
        <div class="form-submenu" id="modal-submenu">
          <div class="submenu-container">
            <a href="#" class="close-icon-submenu"><span class="material-symbols-outlined">close</span></a>
            <h5>Add New Menu</h5>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
              <div class="input-group">
                <input type="text" name="title" id="title" placeholder="Submenu title">
              </div>

              <div class="input-group">
                <select name="menu_id" id="menu_id" class="select-menu">
                  <option value="">Select Menu</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>

              <div class="input-group">
                <input type="text" name="url" id="url" placeholder="Submenu url">
              </div>

              <div class="input-group">
                <input type="text" name="icon" id="icon" placeholder="Submenu icon">
              </div>

              <div class="input-g">
              <label class="active-check">
                <input class="form-check" type="checkbox" name="is_active" id="is_active" value="1" checked>
                Active?
              </label>
              </div>

              <div class="btn">
                <button class="cancel-submenu" type="button">Cancel</button>
                <button class="submit" type="submit">Add</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Model Box Item Form End -->

        <script>
          // Modal Box 
          const modalSubmenu = document.querySelector('#modal-submenu');
          const addNewSubMenu = document.querySelectorAll('.add-new');

          // Add New Sub Menu Button
          addNewSubMenu.forEach((btn) => {
            btn.onclick = (e) => {
              modalSubmenu.style.display = 'flex';
              e.preventDefault();
            };
          });
          
          // Klik tombol close modal Add New Menu
          document.querySelector('.form-submenu .close-icon-submenu').onclick = (e) => {
            modalSubmenu.style.display = 'none';
            e.preventDefault();
          }

          document.querySelector('.form-submenu .cancel-submenu').onclick = (e) => {
            modalSubmenu.style.display = 'none';
            e.preventDefault();
          }
          
          // Klik di luar modal logout
          window.onclick = (e) => {
            if (e.target === modalSubmenu) {
              modalSubmenu.style.display = 'none';
            }
          };
        </script>