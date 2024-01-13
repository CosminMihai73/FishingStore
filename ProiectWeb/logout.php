<?php
session_start();
// Distrugem toate variabilele de sesiune
session_unset();
// Distrugem sesiunea
session_destroy();
// Redirectăm către pagina de login sau alta pagină după logout
header("Location: HomePage.php");
exit();
?>
