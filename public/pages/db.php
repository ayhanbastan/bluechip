<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=bluechip", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
?>