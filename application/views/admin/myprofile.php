<!-- Profil Start -->
<div class="main-bottom" style="margin-bottom: 11rem;">
<div class="profil">
  <div class="photo">
    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" />
    <h1>Fauzan Rahmani Ahdan</h1>
  </div>
  <div class="nickname">
    <h1>Profil Admin</h1>
    <div class="name">
      <h2>Nickname</h2>
      <div class="longname">
        <p><?= $user['name']; ?></p>
      </div>
      <h2>Email</h2>
      <div class="longname">
        <p><?= $user['email']; ?></p>
      </div>
      <div class="button">
        <a href="<?= base_url('admin/myprofile/editprofile'); ?>" id="cta-editprofile">Edit Profil</a>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Profil End -->