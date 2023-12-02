        <div class="table">
          <?= form_error('menu', '<div class="activation">','</div>'); ?>

          <?= $this->session->flashdata('message'); ?>

          <div class="btn-top-table">
            <a href="#" class="add-new" >
              <span class="material-symbols-outlined"> add </span>
              Add Menu
            </a>
          </div>

          <table class="table-menu">
            <tr>
              <th>#</th>
              <th>Menu</th>
              <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($menu as $m) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $m['menu']; ?></td>
              <td>
                <div class="button">
                  <a class="cta-warning">
                    <span class="material-symbols-outlined"> edit_square </span>
                  </a>
                  
                  <a href="<?= base_url('menu/deletemenu/') . $m['id']?>" class="cta-danger">
                    <span class="material-symbols-outlined"> delete </span>
                  </a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <style>
	        .mod-form {
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
        
	        .mod-container {
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
        
	        .mod-container .input-group {
	        	display: flex;
	        	justify-content: start;
	        	align-items: center;
	        	width: 100%;
	        	margin-bottom: 1rem;
	        }
        
	        .mod-container .input-g {
	        	display: flex;
	        	align-items: center;
	        	width: 5rem;
	        	margin-bottom: 1rem;
	        }
        
	        .mod-container .input-g .active-check {
	        	display: flex;
	        	font-size: 1.1rem;
	        }
        
	        .mod-container .input-g .active-check input[type="checkbox"] {
	        	margin-right: 1rem;
	        	height: 16px;
	        	width: 16px;
	        }
        
	        .mod-container input,
	        .mod-container .input-group .select-menu {
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

          .mod-container .close-icon-form {
          	position: absolute;
          	right: 1rem;
          	top: 1rem;
          	color: black;
          	transform: scale(0.9);
          }
        
          .mod-container .close-icon-form:hover {
          	color: var(--color-info-dark);
          }

          .mod-container h5 {
          	font-size: 1.5rem;
          	font-weight: 500;
          	margin-bottom: 0.8rem;
          }

          .mod-container p {
          	font-size: 1rem;
          	font-weight: 500;
          	margin-bottom: 3rem;
          }

          .mod-container .btn {
          	display: flex;
          	justify-content: end;
          	text-align: center;
            margin-top: 1rem
          }

          .mod-container .btn .cancel {
          	font-family: "Poppins", sans-serif;
          	padding: 0.5rem 1rem;
          	font-size: 1rem;
          	border-radius: 0.5rem;
          	background-color: #a9a9a9;
          	color: var(--color-white);
          }

          .mod-container .btn .cancel:hover {
          	background-color: #868686;
          }

          .mod-container .btn .submit {
          	font-family: "Poppins", sans-serif;
          	padding: 0.5rem 1rem;
          	font-size: 1rem;
          	border-radius: 0.5rem;
          	background-color: #ffcc00;
          	color: var(--color-white);
          	margin-left: 1rem;
          }

          .mod-container .btn .submit:hover {
          	background-color: #f0c000;
          }

        </style>

        <!-- Model Box Item Form Start -->
        <div class="mod-form" id="modal-form">
          <div class="mod-container">
            <a href="#" class="close-icon-form"><span class="material-symbols-outlined">close</span></a>
            <h5>Add New Menu</h5>
            <form action="<?= base_url('menu'); ?>" method="post">
              <input type="text" name="menu" id="menu" placeholder="Menu name">
              <div class="btn">
                <button class="cancel" type="button">Cancel</button>
                <button class="submit" type="submit">Add</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Model Box Item Form End -->

        <script>
          // Modal Box 
          const modalMenu = document.querySelector('#modal-form');
          const imgButtons = document.querySelectorAll('.add-new');

          imgButtons.forEach((btn) => {
            btn.onclick = (e) => {
              modalMenu.style.display = 'flex';
              e.preventDefault();
            };
          });

          // Klik tombol close modal
          document.querySelector('.mod-form .close-icon-form').onclick = (e) => {
            modalMenu.style.display = 'none';
            e.preventDefault();
          }

          document.querySelector('.mod-form .cancel').onclick = (e) => {
            modalMenu.style.display = 'none';
            e.preventDefault();
          }


        </script>