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

$model_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $designer_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (designer_id, model_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $designer_id, $model_id, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<form method="post" action="contact_model.php?id=<?php echo $model_id; ?>">
    Message: <textarea name="message" required></textarea><br>
    <input type="submit" value="Send Message">
</form>
