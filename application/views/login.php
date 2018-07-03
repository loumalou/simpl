<!DOCTYPE html>
<?php
if (isset($this->session->userdata['logged_in'])) {

  header("location: http://ad4b593e0818313846bfa237a2dc6704.simplementlinux.com/index.php/utils_auth/login_proc");
}
?>
    <head>
      <title> Mon Portail - Connection </title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
      <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>

    <body>
      <?php
      if (isset($deco_message)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
      }
     ?>
     <?php
      if (isset($display_message)) {
        echo "<div class='display_message'";
        echo $message_display;
        echo "</div>";
      }
      ?>
      <div id="main">
        <div id="login">
          <h2> Connection </h2>
        <hr/>
        <?php echo form_open('base/login_proc'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
          echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>
        <label>Utilisateur: </label>
        <input type="text" name="username" id="username" placeholder="Utilisateur"/><br /><br />
        <label>MDP: </label>
        <input type="password" name="password" id="password" placeholder="**********"/><br /><br />
        <input type="submit" value=" Connection " name="submit"/><br />
        <a href="<?php echo base_url() ?>index.php/base/reg_utils">Cliquer ici pour cree un compte</a>
        <?php echo form_close(); ?>
      </div>
    </div>
  </body>
  </html>
