<div class="container">
	<div class="hero">
		<div class="image"></div>

		<form action="<?= base_url('auth'); ?>" method="post">
			<div class="login-page">
				<div class="login">
					<h1>Login to <span>Flavia</span></h1>
					<p>
						Welcome to Flavia, please enter your login details below to using the
						website
					</p>

					<?= $this->session->flashdata('message'); ?>

					<div class="input-group">
						<input class="input" required type="text" name="email" id="email" value="<?= set_value('email'); ?>"/>
						<label class="label" for="Email">Email Address</label>
						<?= form_error('email', '<small>', '</small>'); ?>
					</div>


					<div class="input-group">
						<input
							class="input"
							required
							type="password"
							name="password"
							id="password"
						/>
						<label class="label" for="password">Password</label>
						<?= form_error('password', '<small>', '</small>'); ?>
					</div>
					<a href="#" class="forgot">Forgot the password?</a>

					<button type="submit" class="submit">Login</button>

					<p>Don't have an account?<a href="<?= base_url('auth/registration'); ?>" class="cta">Sign Up</a></p>
				</div>
			</div>
			</form>
	</div>
</div>
