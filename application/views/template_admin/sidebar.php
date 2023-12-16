
      <!-- Aside Start -->
      <aside>
        <div class="top">
          <div class="logo">
            <img src="<?= base_url('assets/'); ?>img/logo.svg" id="logo"/>
            <img src="<?= base_url('assets/'); ?>img/icon.svg" id="icon1"/>
          </div>
          <div class="close" id="close-btn">
            <span class="material-symbols-outlined"> close </span>
          </div>
        </div>

        <!-- QUERY MENU -->
        <?php 
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                       WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <div class="sidebar">
          <!-- LOOPING MENU -->
          <?php foreach ($menu as $m) : ?>
            <h5><?= $m['menu']; ?></h5>


          <!-- SIAPKAN SUB-MENU SESUAI MENU -->
          <?php 
          $menuId = $m['id'];
          $querySubMenu = "SELECT *
                             FROM `user_sub_menu` JOIN `user_menu`
                               ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                            WHERE `user_sub_menu`.`menu_id` = $menuId
                              AND `user_sub_menu`.`is_active` = 1
                            ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>

            <?php foreach ($subMenu as $sm) : ?>
              <?php if ($title == $sm['title']) : ?>
                <a href="<?= base_url($sm['url']); ?>" class="active">

              <?php else : ?>
                <a href="<?= base_url($sm['url']); ?>">
              <?php endif; ?>
                  <span class="material-symbols-outlined"> <?= $sm['icon']; ?> </span>
                  <h3><?= $sm['title']; ?></h3>
                </a>
            <?php endforeach; ?>

          <?php endforeach; ?>

          <a href="#" class="logout-button">
            <span class="material-symbols-outlined"> logout </span>
            <h3>Logout</h3>
          </a> 
        </div>
      </aside>
      <!-- Aside End -->

      <style>
	      .modal {
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
      
	      .modal-container {
	      	display: block;
	      	position: relative;
	      	background-color: var(--color-white);
	      	margin: 4% auto;
	      	color: var(--color-dark);
	      	padding: 3rem;
	      	height: 16rem;
	      	border-radius: 1rem;
	      	animation: animateModal 0.5s;
	      }
      
	      .modal-container .input-group {
	      	display: flex;
	      	justify-content: start;
	      	align-items: center;
	      	width: 100%;
	      	margin-bottom: 1rem;
	      }
      
	      .modal-container .input-g {
	      	display: flex;
	      	align-items: center;
	      	width: 5rem;
	      	margin-bottom: 1rem;
	      }
      
	      .modal-container .input-g .active-check {
	      	display: flex;
	      	font-size: 1.1rem;
	      }
      
	      .modal-container .input-g .active-check input[type="checkbox"] {
	      	margin-right: 1rem;
	      	height: 16px;
	      	width: 16px;
	      }
      
	      .modal-container input,
	      .modal-container .input-group .select-menu {
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

        .modal-container .close-icon {
        	position: absolute;
        	right: 1rem;
        	top: 1rem;
        	color: black;
        	transform: scale(0.9);
        }
      
        .modal-container .close-icon:hover {
        	color: var(--color-info-dark);
        }

        .modal-container h5 {
        	font-size: 1.5rem;
        	font-weight: 500;
        	margin-bottom: 0.8rem;
        }

        .modal-container p {
        	font-size: 1rem;
        	font-weight: 500;
        	margin-bottom: 3rem;
        }

        .modal-container .btn {
        	display: flex;
        	justify-content: end;
        	text-align: center;
        }

        .modal-container .btn .cancel {
        	font-family: "Poppins", sans-serif;
        	padding: 0.5rem 1rem;
        	font-size: 1rem;
        	border-radius: 0.5rem;
        	background-color: #a9a9a9;
        	color: var(--color-white);
        }

        .modal-container .btn .cancel:hover {
        	background-color: #868686;
        }

        .modal-container .btn .logout {
        	font-family: "Poppins", sans-serif;
        	padding: 0.5rem 1rem;
        	font-size: 1rem;
        	border-radius: 0.5rem;
        	background-color: #ffcc00;
        	color: var(--color-white);
        	margin-left: 1rem;
        }

        .modal-container .btn .logout:hover {
        	background-color: #f0c000;
        }

      </style>
      
      <!-- Model Box Item Detail Start -->
      <div class="modal" id="item-detail-modal">
        <div class="modal-container">
          <a href="#" class="close-icon"><span class="material-symbols-outlined">close</span></a>
          <h5>Ready to Leave?</h5>
          <p>Select "Logout" below if you are ready to end your current session.</p>
          <div class="btn">
            <button class="cancel" type="button">Cancel</button>
            <a class="logout" href="<?= base_url('auth/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>


			<script>
				// Modal Box 
				const itemDetailModal = document.querySelector('#item-detail-modal');
							
				const logoutBtn = document.querySelectorAll('.logout-button');
							
				// Logout Button
				logoutBtn.forEach((btn) => {
				  btn.onclick = (e) => {
				    itemDetailModal.style.display = 'flex';
				    e.preventDefault();
				  };
				});
				
				// Klik tombol close modal logout
				document.querySelector('.modal .close-icon').onclick = (e) => {
				  itemDetailModal.style.display = 'none';
				  e.preventDefault();
				}
				
				document.querySelector('.modal .cancel').onclick = (e) => {
				  itemDetailModal.style.display = 'none';
				  e.preventDefault();
				}
				
				window.onclick = (e) => {
				  // Klik di luar modal logout
				  if (e.target === itemDetailModal) {
				    itemDetailModal.style.display = 'none';
				  }
				};
			</script>
