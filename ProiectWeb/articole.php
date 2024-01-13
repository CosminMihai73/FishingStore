<?php
$servername = "localhost:3306"; // Adresa serverului MySQL
$username = "root";  // Numele utilizatorului MySQL
$password = "";      // Parola MySQL
$dbname = "webdesign"; // Numele bazei de date

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $imageURL = $_POST["image_url"];
    $description = $_POST["description"];
    $pret = $_POST["pret"];
    $tag = $_POST["tag"];


    $sql = "INSERT INTO articole (title, image_url, description, pret,tag) VALUES ('$title', '$imageURL', '$description', '$pret','$tag')";

    // Verificați dacă inserarea a avut succes
    if ($conn->query($sql) === TRUE) {

        header("refresh:1;url=articole.html");
    } else {
        echo "Eroare: " . $sql . "<br>" . $conn->error;
    }

    // Închideți conexiunea la baza de date după ce ați terminat de procesat datele POST
    $conn->close();
}