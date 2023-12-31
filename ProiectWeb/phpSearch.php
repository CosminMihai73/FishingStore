<!DOCTYPE html>
<html lang="ro">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/Header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header class="header">
    <a href="HomePage.html">
        <img id="logo" src="poze/logo-1697478504-removebg-preview.png" alt="FishingBoutique Logo">
    </a>
    <div class="search-container">
        <input type="text" placeholder="Cauta in magazin..." class="search-box">
        <button type="button" class="search-button">
            <i class="fa fa-search"></i> Caută
        </button>
    </div>
    <a href="pagina-login.php">
        <button class="button1"><i class="fa fa-user"></i> Login/Register</button>
    </a>
    <a href="favorite.php">
        <button class="button2"><i class="fa fa-heart"></i> Favorite</button>
    </a>
    <a href="Cos-cumparaturi.php">
        <button class="button3"><i class="fa fa-shopping-cart"></i> Cosul meu</button>
    </a>
    <div class="w3-bar w3-light-green">
        <a href="Lanseta.php" class="w3-bar-item w3-button w3-mobile">Lansete</a>
        <a href="Mulinete.php" class="w3-bar-item w3-button w3-mobile">Mulinete</a>
        <a href="Accesorii.php" class="w3-bar-item w3-button w3-mobile">Accesorii</a>
        <a href="Nada-si-momeli.php" class="w3-bar-item w3-button w3-mobile">Nada si momeli</a>
        <a href="Imbracaminte.php" class="w3-bar-item w3-button w3-mobile">Imbracaminte</a>
        <a href="Camping.php" class="w3-bar-item w3-button w3-mobile">Camping</a>
        <a href="Barci.php" class="w3-bar-item w3-button w3-mobile">Barci</a>
    </div>
</header>
<?php
// Simulează conexiunea la baza de date
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "webdesign";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}

// Preia termenul de căutare
$searchTerm = $_GET['term'];

// Realizează interogarea căutării în baza de date
$sql = "SELECT * FROM articole WHERE title LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Afișează rezultatele
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='search-result'>";
        echo "<h3>" . $row["title"] . "</h3>";
        echo "<p>" . $row["descriere"] . "</p>";
        echo "</div>";
    }
} else {
    echo "Nu s-au găsit rezultate pentru termenul de căutare '$searchTerm'.";
}

$conn->close();
?>


</body>
</html>
