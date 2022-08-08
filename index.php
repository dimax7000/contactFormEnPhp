<?php
use PHPmailer/PHPmailer;
require __DIR__.vendor/autoload;
$errors[];
$errorMessage = "";

 if(isset($_POST['envoyer'])){

 $name = $_POST['name'];
 $prenom = $_POST['prenom'];
 $email = $_POST['email'];
 $sujet = $_POST['sujet'];
 $message = $_POST['message'];

 if (empty($name)) {
   $errors[] ="veuillez saissi votre nom";
   
 }
 if (empty($prenom)) {
   $errors[] ="veuillez saissi votre prenom";
   
 }
 if (empty($email)) {
   $errors[] ="veuillez saissir votre email";
   
 }else if(!var_filter($email,FILTER_VALIDATE_EMAIL)) {

   $errors[] ="votre adresse email est invalide";


 }
 if (empty($sujet)) {
   $errors[] ="veuillez saissir votre sujet";
   
 }
 if (empty($message)) {
   $errors[] ="veuillez saissir votre message";
   
 }
 if(!empty($errors)){
   $allError = join("<br>",$errors);
   $allMessage =



 }else{

 $sendMail = new PHPmailer();

 $sendMail->isSMTP();
 $sendMail->HOST = 'smtp.mailtrap.io';
 $sendMail->SMTPAuth = true;
 $sendMail->Username ='6f639e61a8dc9a';
 $sendMail->Password ='64b353553e3a8c';
 $sendMail->SMTPSecure ='tls';
 $sendMail->Port = 2525;
 $sendMail->isHTML(true);

 $sendMail->setForm($email,'tester mail trap');
 $sendMail->addAddress('komlanvidanklou@gmail.com','Moi');
 $sendMail->Subject = "Message venant de mailtrap";


 $bodyParagraphs=["Name: {$name}","Prenom: {$prenom}";"email: {$email}","Sujet: {$sujet}","message: nl2br($message)"];
 $sendMail->






 }


 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-3">
      <div class="form-group mb-3">
 <form action="" method="post">
  <div class="row mb-3">
   <div class="col-md-3">
    
    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Nom">
    </div>
    <div class="col-md-3">
    
    <input type="text" name="prenom" id="prenom" class="form-control mb-3" placeholder="Prenom">
 </div>
 </div>
 <div class="col-md-6">


    <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email">
 </div>
 <div class="col-md-6">


   <input type="text" name="sujet" id="sujet" class="form-control mb-3" placeholder="sujet">
</div>
<div class="col-md-6">


   <textarea name="message" id="message" class="form-control mb-3" placeholder="Message"></textarea>
</div>
<div>
<input type="button" value="envoyer" name="envoyer" class="btn btn-primary mb-3">
</div>


</form>
</div>
</div>
</body>
</html>