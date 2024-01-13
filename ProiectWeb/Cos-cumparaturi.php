<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/Header.css">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

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
    </div>
</header>

<section class="cart-section">
    <h2>Cosul meu</h2>

    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "webdesign";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item'])) {
        $itemId = $_POST['delete_item'];
        // Delete the item from the database
        $sql_delete = "DELETE FROM cos_cumparaturi WHERE id = $itemId";
        $conn->query($sql_delete);
        // You may want to add additional checks or error handling here
    }

    // Fetch items from cos_cumparaturi table
    $sql = "SELECT * FROM cos_cumparaturi";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $totalPrice = 0;

        // Wrap items in an unordered list
        echo "<ul class='cart-list'>";

        while ($row = $result->fetch_assoc()) {
            echo "<li class='cart-item'>";
            echo "<img class='cart-image' src='" . $row["image_url"] . "' alt='Imagine Articol'>";
            echo "<h3 class='cart-title'>" . $row["title"] . "</h3>";
            echo "<p class='cart-price'>Preț: RON " . $row["pret"] . "</p>";
            echo "<form method='post' class='cart-delete-form'>";
            echo "<input type='hidden' name='delete_item' value='" . $row["id"] . "'>";
            echo "<button type='submit' class='cart-delete-btn'>X</button>";
            echo "</form>";
            echo "</li>";

            // Calculate total price
            $totalPrice += $row["pret"];
        }

        echo "</ul>";

        // Display total price
    // Display total price
    echo "<p class='cart-total'>Total: RON " . $totalPrice . "</p>";

        echo "<a href='procesare-comanda.php' class='finalizare-comanda-button'>Finalizare comanda</a>";
    } else {
        echo "<p class='cart-empty'>Nu există produse în coș.</p>";
    }


    $conn->close();
    ?>
</section>


</body>
</html>