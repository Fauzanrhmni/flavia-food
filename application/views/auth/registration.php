<div class="container">
	<div class="hero">
		<div class="image"></div>

		<form action="<?= base_url('auth/registration'); ?>" method="post">
			<div class="login-page">
				<div class="login">
					<h1>Sign Up to <span>Flavia</span></h1>
					<p>Welcome to Flavia, create your account below to use the website</p>

					<div class="input-group">
						<input class="input" required type="text" name="name" id="name" value="<?= set_value('name'); ?>"/>
						<label class="label" for="name">Full name</label>
            <?= form_error('name', '<small>', '</small>'); ?>
            
					</div>

					<div class="input-group">
						<input class="input" required type="text" name="email" id="email" value="<?= set_value('email'); ?>"/>
						<label class="label" for="email">Email</label>
            <?= form_error('email', '<small>', '</small>'); ?>
					</div>

					<div class="input-g">
						<div class="input-group">
							<input
								class="input"
								required
								type="password"
								name="password1"
								id="password1"
							/>
							<label class="label" for="password1">Password</label>
              <?= form_error('password1', '<small>', '</small>'); ?>
						</div>
						<div class="input-group">
							<input
								class="input"
								required
								type="password"
								name="password2"
								id="password2"
							/>
							<label class="label" for="password2">Repeat Password</label>
						</div>
					</div>
					<!-- <a href="<?= base_url('auth/forgotpassword'); ?>" class="forgot">Forgot the password?</a> -->

					<button type="submit" class="submit">Register Account</button>

					<p>
						I have an account?<a href="<?= base_url('auth'); ?>" class="cta"
							>Log In</a
						>
					</p>
				</div>
			</div>
		</form>
	</div>
</div>
