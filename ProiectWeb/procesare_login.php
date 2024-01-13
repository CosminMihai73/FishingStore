<?php
session_start();

// Conectare la baza de date MySQL (asigură-te să schimbi aceste detalii cu cele ale bazei tale de date)
$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "webdesign";

$connection = new mysqli($hostname, $username, $password, $database);

// Verifică conexiunea la baza de date
if ($connection->connect_error) {
    die("Conexiune eșuată: " . $connection->connect_error);
}

// Preia datele din formular
$username = $_POST['username'];
$password = $_POST['password'];

// Evită SQL injection folosind instrucțiuni prepare
$query = "SELECT * FROM utilizatori WHERE nume = ? AND parola = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    // Manejează eroarea la interogare
    die("Eroare la verificarea utilizatorului: " . $stmt->error);
}

if ($result->num_rows > 0) {
    // Utilizatorul a fost găsit, setează o variabilă de sesiune
    $user = $result->fetch_assoc();
    $_SESSION['login_success'] = true;
    $_SESSION['username'] = $user['nume']; // Adaugă numele de utilizator în sesiune

    // Afișăm informații pentru debugging
    echo "Sesiune setată: " . $_SESSION['login_success'];

    // Redirectează către HomePage.php cu parametru de succes
    header("Location: HomePage.php");
    exit();
} else {
    // Utilizatorul nu a fost găsit, poți adăuga un mesaj de eroare sau alte acțiuni
    echo '<script>alert("Autentificare eșuată, user sau parola gresita"); window.location.href = "pagina-login.php";</script>';
    exit();
}

// Închide conexiunea la baza de date
$stmt->close();
$connection->close();
?>
