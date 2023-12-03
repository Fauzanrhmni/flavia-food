<div class="container">
	<div class="hero">
		<div class="image"></div>

		<form action="<?= base_url('auth/forgotpassword'); ?>" method="post">
			<div class="login-page">
				<div class="login">
					<h1>Forgot your <span>Password?</span></h1>
					<p>
          Can't access your account? Fill in your email address below, and we'll help you reset your password.
					</p>

					<?= $this->session->flashdata('message'); ?>

					<div class="input-group">
						<input class="input" required type="text" name="email" id="email" value="<?= set_value('email'); ?>"/>
						<label class="label" for="Email">Email Address</label>
						<?= form_error('email', '<small>', '</small>'); ?>
					</div>

					<button type="submit" class="submit">Reset Password</button>

					<p>Back to log in?<a href="<?= base_url('auth/registration'); ?>" class="cta">Log In</a></p>
				</div>
			</div>
			</form>
	</div>
</div>
