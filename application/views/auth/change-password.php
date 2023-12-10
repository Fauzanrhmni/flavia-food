

<div class="container">
	<div class="hero">
		<div class="image"></div>

		<form action="<?= base_url('auth/changepassword'); ?>" method="post">
			<div class="login-page">
				<div class="login">
					<h1>Change your <span>Password</span></h1>
					<p style="margin: auto; font-weight: 500; padding: 0.3rem 0.5rem; background-color: var(--green); width: 20rem; color: var(--white); border-radius: 2rem;">
						<?= $this->session->userdata('reset_email'); ?>
					</p>

					<?= $this->session->flashdata('message'); ?>

					<div class="input-group">
						<input class="input" required type="password" name="password1" id="password1"/>
						<label class="label" for="password1">Enter new password</label>
						<?= form_error('password1', '<small>', '</small>'); ?>
					</div>


					<div class="input-group">
						<input class="input" required type="password" name="password2" id="password2"/>
						<label class="label" for="password2">Repeat password</label>
						<?= form_error('password2', '<small>', '</small>'); ?>
					</div>

					<button type="submit" class="submit">Change Password</button>
				</div>
			</div>
			</form>
	</div>
</div>
