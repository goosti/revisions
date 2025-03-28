<?php require_once "../includes/header.php"; 
include_once "../config/database.php";
?>





<?php 



$nombre_personnes = "";
$date_reservation = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_personnes = htmlspecialchars(trim($_POST['nombre_personnes']));
    $date_reservation = htmlspecialchars((trim($_POST['date_reservation'])));

    if (empty($errors)) {


        $query = "INSERT INTO reservation(Nombre_Personnes, Date_Reservation) 
        VALUES (:Nombre_Personnes, :Date_Reservation)";

        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':Nombre_Personnes', $nombre_personnes);
        $stmt->bindParam(':Date_Reservation', $date_reservation);


        $stmt->execute();
    }
}



?>













<div class="register">
    <form action="" method="POST" class="reservation-form">
    <h2>Réservation</h2>

    <label for="nombre_personnes">Nombre de personnes :</label><br>
    <input type="number" id="nombre_personnes" name="nombre_personnes" min="1" required /><br>

    <label for="date_reservation">Date de réservation :</label><br>
    <input type="date" id="date_reservation" name="date_reservation" required /><br>

    <button type="submit" class="submit">Réserver</button>
    </form>
</div>
