<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/Header.css">
    <link rel="stylesheet" type="text/css" href="css/singup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
session_start();

// Verifică dacă utilizatorul este autentificat
if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
    // Utilizatorul este autentificat
    $welcomeMessage = "Bun venit, " . $_SESSION['username'] . "!";
    $logoutButton = '<a href="logout.php"><button class="button6">Logout</button></a>';


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "webdesign";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verifică dacă conexiunea la baza de date a avut succes
    if ($conn->connect_error) {
        die("Conexiune esuata: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $query = "SELECT admin FROM utilizatori WHERE nume = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $isAdmin = $row['admin'];

        if ($isAdmin == 1) {
            $newButton = '<a href="articole.html"><button class="button6">Adauga Articol</button></a>';
        } else {
            $newButton = '';
        }
    } else {
        $newButton = '';
    }

    $conn->close();
} else {

    $welcomeMessage = "Bun venit!";
    $logoutButton = '';
    $newButton = '';
}
?>
<header class="header">
    <a href="HomePage.php">
        <img id="logo" src="poze/logo-1697478504-removebg-preview.png" alt="FishingBoutique Logo">
    </a>
    <div class="search-container">
        <form action="phpSearch.php" method="GET">
            <input type="text" name="search" placeholder="Cauta in magazin..." class="search-box">
            <button type="submit" class="search-button">
                <i class="fa fa-search"></i> Caută
            </button>
        </form>
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
        <a href="carlige.php" class="w3-bar-item w3-button w3-mobile">Carlige</a>
        <a href="fire.php" class ="w3-bar-item w3-button w3-mobile">Fire</a><a href="Accesorii.php" class="w3-bar-item w3-button w3-mobile">Accesorii</a>
        <a href="Nada-si-momeli.php" class="w3-bar-item w3-button w3-mobile">Nada si momeli</a>
        <a href="Imbracaminte.php" class="w3-bar-item w3-button w3-mobile">Imbracaminte</a>
        <a href="Camping.php" class="w3-bar-item w3-button w3-mobile">Camping</a>
        <a href="Barci.php" class="w3-bar-item w3-button w3-mobile">Barci</a>
        <div class="welcome-section">
            <p class="welcome-message"><?php echo $welcomeMessage; ?></p>
            <?php echo $logoutButton; ?>
            <?php echo $newButton; ?>
        </div>
</header>

</body>
</html>
