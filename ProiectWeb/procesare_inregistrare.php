<?php
$hostname = "localhost:3306";
$username = "root";
$password = "";
$database = "webdesign";

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Conexiune eșuată: " . $connection->connect_error);
}

$username = $connection->real_escape_string($_POST['username']);
$password = $connection->real_escape_string($_POST['password']);

$check_query = "SELECT * FROM utilizatori WHERE nume = ?";
$check_statement = $connection->prepare($check_query);
$check_statement->bind_param("s", $username);
$check_statement->execute();
$check_result = $check_statement->get_result();

if ($check_result === false) {
    die("Eroare la verificarea existenței utilizatorului: " . $connection->error);
}

if ($check_result->num_rows > 0) {
    echo '<script>alert("Eroare user existent"); window.location.href = "pagina-signup.php";</script>';
} else {
    $insert_query = "INSERT INTO utilizatori (nume, parola) VALUES (?, ?)";
    $insert_statement = $connection->prepare($insert_query);
    $insert_statement->bind_param("ss", $username, $password);

    if ($insert_statement->execute()) {
        header("Location: pagina-login.php");
        exit(); // Asigură-te că scriptul se oprește aici pentru a evita execuția ulterioară a codului
    } else {
        // Utilizatorul nu a fost găsit sau parola este incorectă
        echo "User existent.";
    }
}

$connection->close();
?>