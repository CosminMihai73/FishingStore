<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/Header.css">
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
</body>
<section class="article-section">
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "webdesign";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM articole WHERE title LIKE '%Mulineta%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='article'>";
            echo "<a href='pagina-obiect.php?id=" . $row["id"] . "'>";
            echo "<img src='" . $row["image_url"] . "' alt='Imagine Articol'>";
            echo "<h3>" . $row["title"] . "</h3>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p>Preț: RON " . $row["pret"] . "</p>";

            // Add "Adauga in cos" button
            echo "<form method='post'>";
            echo "<input type='hidden' name='item_id' value='" . $row["id"] . "'>";
            echo "<input type='submit' name='add_to_cart' class='button4' value='Adauga in cos'>";
            echo "</form>";

            // Add "Favorite" button
            echo "<form method='post'>";
            echo "<input type='hidden' name='item_id' value='" . $row["id"] . "'>";
            echo "<input type='submit' name='add_to_favorite' class='button-favorite' value='Favorite'>";
            echo "</form>";

            echo "</div>";
        }
    } else {
        echo "Nu există articole de afișat.";
    }

    // Handle adding to cart and favorite logic
    if (isset($_POST['add_to_cart'])) {
        $item_id = $_POST['item_id'];

        $sql_add_to_cart = "INSERT INTO cos_cumparaturi (title, image_url, description, pret) 
                        SELECT title, image_url, description, pret FROM articole WHERE id = $item_id";
        $conn->query($sql_add_to_cart);
    }

    if (isset($_POST['add_to_favorite'])) {
        $item_id = $_POST['item_id'];

        // Assuming you have a 'favorite' table
        $sql_add_to_favorite = "INSERT INTO favorite (title, image_url, description, pret) 
                        SELECT title, image_url, description, pret FROM articole WHERE id = $item_id";
        $conn->query($sql_add_to_favorite);
    }


    $conn->close();
    ?>
</section>
</section>
</body>
</html>
