<?php

// MySQL Connect
$servername = "localhost";
$username = "username";
$password = "password";
$database = "mydatabase";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

// MySQL Create DB
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS mydatabase";
if ($conn->query($sqlCreateDB) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Switch to the created database
$conn->select_db($database);

// MySQL Create Table
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// MySQL Insert Data
$sqlInsertData = "INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@example.com')";
if ($conn->query($sqlInsertData) === TRUE) {
    echo "Data inserted successfully\n";
} else {
    echo "Error inserting data: " . $conn->error . "\n";
}

// MySQL Get Last ID
$lastID = $conn->insert_id;
echo "Last inserted ID: $lastID\n";

// MySQL Insert Multiple
$sqlInsertMultiple = "INSERT INTO users (firstname, lastname, email) VALUES 
    ('Jane', 'Doe', 'jane.doe@example.com'),
    ('Bob', 'Smith', 'bob.smith@example.com')";
if ($conn->multi_query($sqlInsertMultiple) === TRUE) {
    echo "Multiple records inserted successfully\n";
} else {
    echo "Error inserting multiple records: " . $conn->error . "\n";
}

// MySQL Prepared Statement
$firstname = "Alice";
$lastname = "Johnson";
$email = "alice.johnson@example.com";

$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);
$stmt->execute();
echo "Prepared statement executed successfully\n";

// MySQL Select Data
$sqlSelectData = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sqlSelectData);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . "\n";
    }
} else {
    echo "No records found\n";
}

// MySQL Where
$targetEmail = "john.doe@example.com";
$sqlWhere = "SELECT id, firstname, lastname, email FROM users WHERE email = '$targetEmail'";
$resultWhere = $conn->query($sqlWhere);

if ($resultWhere->num_rows > 0) {
    while ($row = $resultWhere->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . "\n";
    }
} else {
    echo "No records found with email $targetEmail\n";
}

// MySQL Order By
$sqlOrderBy = "SELECT id, firstname, lastname, email FROM users ORDER BY lastname DESC";
$resultOrderBy = $conn->query($sqlOrderBy);

if ($resultOrderBy->num_rows > 0) {
    while ($row = $resultOrderBy->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . "\n";
    }
} else {
    echo "No records found\n";
}

// MySQL Delete Data
$idToDelete = 2;
$sqlDeleteData = "DELETE FROM users WHERE id = $idToDelete";
if ($conn->query($sqlDeleteData) === TRUE) {
    echo "Record with ID $idToDelete deleted successfully\n";
} else {
    echo "Error deleting record: " . $conn->error . "\n";
}

// MySQL Update Data
$idToUpdate = 1;
$newEmail = "john.doe.updated@example.com";
$sqlUpdateData = "UPDATE users SET email = '$newEmail' WHERE id = $idToUpdate";
if ($conn->query($sqlUpdateData) === TRUE) {
    echo "Record with ID $idToUpdate updated successfully\n";
} else {
    echo "Error updating record: " . $conn->error . "\n";
}

// MySQL Limit Data
$limit = 2;
$sqlLimit = "SELECT id, firstname, lastname, email FROM users LIMIT $limit";
$resultLimit = $conn->query($sqlLimit);

if ($resultLimit->num_rows > 0) {
    while ($row = $resultLimit->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . "\n";
    }
} else {
    echo "No records found\n";
}

// Close the connection
$conn->close();

?>
