<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Conectare la baza de date
$conn = new mysqli("localhost", "root", "", "dynamic_forms_generator");

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Interogare pentru a prelua 3 recenzii și informațiile corespunzătoare
$query = "SELECT email, nota, comentariu FROM recenzii ORDER BY nota DESC LIMIT 100";
$result = $conn->query($query);

// Verificare dacă interogarea a avut succes
if ($result) {
    // Creează un array pentru a stoca recenziile
    $reviews = array();

    // Parcurge rezultatele interogării și adaugă recenziile în array
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    // Returnează recenziile sub formă de JSON
    header('Content-Type: application/json');
    echo json_encode($reviews);
} else {
    // În caz de eroare, returnează un mesaj de eroare
    echo json_encode(array('error' => 'Eroare la preluarea recenziilor.'));
}

// Închide conexiunea la baza de date
$conn->close();
?>
