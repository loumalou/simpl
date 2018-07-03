<!DOCTYPE html>
<?php
if (isset($this->session->userdata['logged_in'])) {
  header("location: http://ad4b593e0818313846bfa237a2dc6704.simplementlinux.com/index.php/base/login_proc");
}
?>
   <head>
     <title> Mon Portail - Cree un compte </title>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
     <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
   </head>

   <body>
     <div id="main">
       <div id="login">
         <h2>Creation du compte</h2>
         <hr />
         <?php
         echo "<div class='error_msg'>";
         echo valitation_errors();
         echo "</div>";
         echo form_open('base/reg_utils');

         echo form_label('Choisir Utilisateur : ');
         echo "<br />";
         echo form_input('username');
         echo "<div class='error_msg'>";
         if (isset($message_display)) {
           echo $message_display;
         }
         echo "</div>";
         echo "<br/>";
         echo form_label('Email : ');
         echo "<br/>";
         $data = array(
           'type' => 'email',
           'name' => 'email_value'
         );
         echo form_input($data);
         echo "<br/>";
         echo "<br/>";
         echo form_label('MDP : ');
         echo "<br/>";
         echo form_password('password');
         echo "<br/>";
         echo "<br/>";
         echo form_submit('submit', 'Cree');
         echo form_close();
         ?>
         <a href="<?php echo base_url(); ?> ">Cliquer ici pour vous connecter</a>
       </div>
     </div>
   </body>
   </html>
