<?php
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

$sql = "SELECT * FROM modelos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='uploads/" . $row["photo"] . "' alt='Profile Picture' style='width:100px;height:100px;'><br>";
        echo "Full Name: " . $row["full_name"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "Age: " . $row["age"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Availability: " . $row["availability"] . "<br>";
        echo "Bio: " . $row["bio"] . "<br>";
        echo "Experience: " . $row["experience"] . "<br>";
        echo "Link to Walk: <a href='" . $row["link_walk"] . "'>" . $row["link_walk"] . "</a><br>";
        echo "Height: " . $row["height"] . " cm<br>";
        echo "Weight: " . $row["weight"] . " kg<br>";
        echo "Measurements Waist: " . $row["measurements_waist"] . " cm<br>";
        echo "Measurements Bust: " . $row["measurements_bust"] . " cm<br>";
        echo "IG Handle: " . $row["ig_handle"] . "<br>";
        echo "IG Link: <a href='" . $row["ig_link"] . "'>" . $row["ig_link"] . "</a><br>";
        echo "Tiktok Handle: " . $row["tiktok_handle"] . "<br>";
        echo "Tiktok Link: <a href='" . $row["tiktok_link"] . "'>" . $row["tiktok_link"] . "</a><br>";
        echo "</div><br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
