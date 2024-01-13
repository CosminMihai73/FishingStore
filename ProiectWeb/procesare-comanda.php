<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/Header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    /* Stilizare pentru câmpurile de introducere */
    .form-input {
        width: 100%;
        padding: 6px; /* Reducerea dimensiunii padding-ului pentru a face casetele de text mai mici */
        margin-bottom: 10px;
        box-sizing: border-box;
        font-size: 14px;
    }

    /* Stilizare pentru etichetele de plată */
    .payment-label {
        margin-bottom: 10px;
        font-size: 14px;
    }

    /* Stilizare pentru butonul de trimitere */
    .submit-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-button:hover {
        background-color: #45a049;
    }

    /* Stilizare pentru checkbox-uri */
    .payment-checkbox {
        margin-right: 5px;
        font-size: 14px;
    }




</style>
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
<label for="new_nume">Nume:</label>
<input type="text" id="new_nume" name="new_nume" class="form-input" required>

<label for="new_adresa">Adresă:</label>
<input type="text" id="new_adresa" name="new_adresa" class="form-input" required>

<label for="new_oras">Oraș:</label>
<input type="text" id="new_oras" name="new_oras" class="form-input" required>

<label for="new_judet">Județ:</label>
<input type="text" id="new_judet" name="new_judet" class="form-input" required>

<label for="new_cod_postal">Cod Poștal:</label>
<input type="text" id="new_cod_postal" name="new_cod_postal" class="form-input" required>

<div class="payment-label">
    <input type="checkbox" id="plata_cash" name="plata_cash" class="payment-checkbox">
    <label for="plata_cash">Plata cash</label>
</div>

<div class="payment-label">
    <input type="checkbox" id="plata_card" name="plata_card" class="payment-checkbox">
    <label for="plata_card">Plata cu cardul</label>
</div>

<button type="submit" class="submit-button">Trimite</button>





</body>


</html>
