<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'designer') {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "modelos_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, full_name, gender, phone, age, email, photo FROM modelos WHERE status = 'accepted'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='uploads/" . $row["photo"] . "' alt='Profile Picture' style='width:100px;height:100px;'><br>";
        echo "Full Name: " . $row["full_name"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Age: " . $row["age"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "<button onclick=\"contactModel(" . $row['id'] . ")\">Contact</button>";
        echo "</div><br><br>";
    }
} else {
    echo "No accepted models.";
}

$conn->close();
?>

<script>
    function contactModel(id) {
        window.location.href = "contact_model.php?id=" + id;
    }
</script>
