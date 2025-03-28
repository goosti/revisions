<?php require_once "../includes/header.php"; 
include_once "../config/database.php";

?>


<?php 

$id = "";
if (isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    header('Location: index.php');
}

$query1 = "SELECT * FROM evenement WHERE Id_Evenement=$id";

$data = $db->query($query1);
$results = $data->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $result) {
$id = $result['Id_Evenement'];
}

$id_evenement = "";
$nombre_personnes = "";
$date_reservation = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_personnes = htmlspecialchars(trim($_POST['nombre_personnes']));
    $date_reservation = htmlspecialchars((trim($_POST['date_reservation'])));

    if (empty($errors)) {


        $query = "INSERT INTO reservation(Id_Evenement, Nombre_Personnes, Date_Reservation) 
        VALUES (:Id_Evenement, :Nombre_Personnes, :Date_Reservation)";

        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':Id_Evenement', $id);
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
