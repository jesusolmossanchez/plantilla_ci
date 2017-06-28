<?php $this->load->view('admin/templates/head_admin'); ?>
<img id="logo_admin" src="<?php echo base_url()?>assets/app/img/header_logo.png">
<div class="login-form">
  <h2><?php echo _CMS_TITLE; ?></h2>
  <form action="<?php echo base_url('admin/auth/check_credentials'); ?>" method="post">
    <fieldset><label>Usuario</label><input type="text" name="user" placeholder="Usuario" required></fieldset>
    <fieldset><label>Contraseña</label><input type="password" name="password" placeholder="*******" required></fieldset>
    <fieldset><input type="submit" class="button" value="Acceder"></fieldset>
  </form>
</div>
<?php $this->load->view('admin/templates/footer_admin'); ?>
