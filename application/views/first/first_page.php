<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= $title; ?></title>

		<!-- My Icob -->
		<link rel="icon" href="<?= base_url('assets/'); ?>img/icon.svg" />

		<!-- My Style -->
		<style>
			@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap");

			:root {
        --yellow: #ffcc00;
        --red: #cd0067;
        --green: #88c23a;
        --white: #fff;
				--black: #000;
				--failed-validation: #ff7782;
				--success-validation: #41f1b6;
			}

			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				outline: none;
				border: none;
				list-style-type: none;
				text-decoration: none;
			}

			html {
				scroll-behavior: smooth;
			}

			body {
				font-family: "Poppins", sans-serif;
				background-color: var(--white);
				color: var(--black);
			}

			.container {
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: var(--yellow);
				height: 100vh;
			}

			.hero {
				text-align: center;
			}

			.hero .img {
        margin: auto;
				width: 8rem;
        animation: animateModal 2s;
        position: relative;
        z-index: 3;
			}

			.hero .img img {
				width: 100%;
			}

      p {
        margin-top: 1rem;
        width: 15rem;
        animation: animateButton 4s;
        position: relative;
        font-weight: 500;
        
      }
      
			button {
        margin-top: 3rem;
				padding: 0.7rem 1.8rem;
				background-color: var(--black);
				font-family: "Poppins", sans-serif;
				color: var(--white);
				border-radius: 5rem;
        animation: animateButton 4s;
        position: relative;
        font-weight: 500;
			}
      
      button:hover {
        background-color: rgb(57, 57, 57);
      }

			@keyframes animateModal {
				from {
					top: 150px;
					opacity: 1;
				}

				to {
					top: 0;
					opacity: 1;
				}
			}

			@keyframes animateButton {
				from {
					top: 0;
					opacity: 0;
				}

				to {
					top: 0;
					opacity: 1;
				}
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="hero">
				<div class="img">
					<img src="<?= base_url('assets/'); ?>img/flavia.svg" />
				</div>
        <p>Dengan Pesan Antar Flavia Makan Terasa Lebih Bahagia</p>
        <?= anchor('auth', '<button>Get Started</button>')?>
			</div>
		</div>
	</body>
</html>
