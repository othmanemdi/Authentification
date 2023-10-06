<?php
$host = 'localhost'; // MySQL host
$username = 'root'; // MySQL username
$password = ''; // MySQL password
$database = 'auth'; // MySQL database name
$outputFile = 'ahtu3.sql'; // Output file name

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create an empty SQL file or overwrite an existing one
    file_put_contents($outputFile, '');

    // Get a list of all tables in the database
    $tables = $pdo->query("SHOW TABLES");

    // Loop through each table and export its structure and data
    while ($row = $tables->fetch(PDO::FETCH_NUM)) {
        $table = $row[0];

        // Export table structure (CREATE TABLE statement)
        $createTableSQL = $pdo->query("SHOW CREATE TABLE $table");
        $tableStructure = $createTableSQL->fetch(PDO::FETCH_ASSOC);
        file_put_contents($outputFile, $tableStructure['Create Table'] . ";\n", FILE_APPEND);

        // Export table data (INSERT statements)
        $result = $pdo->query("SELECT * FROM $table");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $columns = implode("`, `", array_keys($row));
            $values = implode("', '", $row);
            $insertSQL = "INSERT INTO `$table` (`$columns`) VALUES ('$values');";

            file_put_contents($outputFile, $insertSQL . "\n", FILE_APPEND);
        }
    }

    echo "Database export complete. The SQL file '$outputFile' has been created.";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
