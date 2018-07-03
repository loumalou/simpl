<!DOCTYPE html>
<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata)['logged_in']['email']);
} else {
  header("location: login");
}
?>
   <head>
     <title> Mon Portail </title>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
     <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
   </head>

   <body>
     <div id="profile">
       <?php
       echo "Salut, <b id='welcome'><i>" . $username . "</i> !</b>";
       echo "<br/>";
       echo "<br/>";
       echo "Bienvenue sur votre portail";
       echo "<br/>";
       echo "<br/>";
       echo "Ton nom est:" . $username;
       echo "Ton email est" . $email;
       echo "</br>";
       ?>
       <b id="deco"><a href="deco">Deconnection</a></b>
     </div>
   </br>
 </body>
 </html>
