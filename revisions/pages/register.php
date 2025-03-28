<?php

require_once '../includes/header.php';
include_once '../config/database.php';

$errors = [];
$nom = $prenom = $email = $password = $photoProfil = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $prenom = htmlspecialchars(trim($_POST['prenom'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = htmlspecialchars(trim($_POST['password'] ?? ''));
    $photoProfil = $_POST['photo_profil'] ?? 'default.png';
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($nom)){
        $errors['nom']='le nom est obligatoire';
    }elseif (strlen($nom) < 2) {
        $errors['nom'] = 'Le nom doit comporter au moins 2 caractères';
    }elseif (is_numeric($nom)) {
        $errors['nom'] = 'Le nom doit comporter uniquement des lettres';
    }

    if (empty($prenom)){
        $errors['prenom']='le prenom est obligatoire';
    }elseif (strlen($prenom) < 2) {
        $errors['prenom'] = 'Le nom doit comporter au moins 2 caractères';
    }elseif (is_numeric($prenom)) {
        $errors['prenom'] = 'Le nom doit comporter uniquement des lettres';
    }

    if(empty($email)){
        $errors['email']='le mail est obligatoire';
    }

    if(empty($password)){
        $errors['password']='le mot de passe est obligatoire';
    }elseif (strlen($password) < 4) {
        $errors['password'] = 'La mot de passe doit comporter au moins 4 caractères';
    }

    if (empty($errors)) {
/*         $sql = "INSERT INTO utilisateur (Email, Mot_de_passe, Nom, Prénom/, Photo_profil) 
        VALUES (:email, :Mot_de_passe, :Nom, :Prénom/, :Photo_profil)";

        $stmt = $db->prepare($sql);
        var_dump($email,$password,$nom,$prenom);
        
        var_dump($stmt->errorInfo());
        $stmt->execute(); */

        $query = "INSERT INTO utilisateur(Email, Mot_de_passe, Nom, Prenom, Photo_profil,Role) 
        VALUES (:Email, :Mot_de_passe, :Nom, :Prenom, :Photo_profil,:Role)";
        $role="user";

        $stmt = $db->prepare($query);

        $stmt->bindParam(':Email', $email);
        $stmt->bindParam(':Mot_de_passe', $hash_password);
        $stmt->bindParam(':Nom', $nom);
        $stmt->bindParam(':Prenom', $prenom);
        $stmt->bindParam(':Photo_profil', $photoProfil);
        $stmt->bindParam(':Role', $role);
        


        $stmt->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .error-message{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Formulaire d'inscription</h1>

    <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom">
            <p class="error-message"><?php echo $errors['nom'] ?? '' ?></p>

            <input type="text" name="prenom" placeholder="Prénom">
            <p class="error-message"><?php echo $errors['prenom'] ?? '' ?></p>

            <input type="email" name="email" placeholder="Email">
            <p class="error-message"><?php echo $errors['email'] ?? '' ?></p>

            <input type="password" name="password" placeholder="Mot de passe">
            <p class="error-message"><?php echo $errors['password'] ?? '' ?></p>

            <input type="file" name="photo_profil" placeholder="Photo de profil">
            <p class="error-message"><?php echo $errors['photo_profil'] ?? '' ?></p>
            <br>

            <button type="submit" class="submit">S'inscrire</button>
        </form>
</body>
</html>