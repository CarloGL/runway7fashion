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

// Validar y guardar la foto de perfil
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if ($check === false) {
    die("File is not an image.");
}

if ($_FILES["photo"]["size"] > 5000000) {
    die("Sorry, your file is too large.");
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    $photo = htmlspecialchars(basename($_FILES["photo"]["name"]));
} else {
    die("Sorry, there was an error uploading your file.");
}

// Preparar y enlazar
$stmt = $conn->prepare("INSERT INTO modelos (full_name, gender, age, email, phone, availability, bio, experience, photo, link_walk, height, weight, measurements_waist, measurements_bust, ig_handle, ig_link, tiktok_handle, tiktok_link, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')");
$stmt->bind_param("ssisssssssiissssss", $full_name, $gender, $age, $email, $phone, $availability, $bio, $experience, $photo, $link_walk, $height, $weight, $measurements_waist, $measurements_bust, $ig_handle, $ig_link, $tiktok_handle, $tiktok_link);

// Establecer parámetros y ejecutar
$full_name = $_POST['full_name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$availability = $_POST['availability'];
$bio = $_POST['bio'];
$experience = $_POST['experience'];
$link_walk = $_POST['link_walk'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$measurements_waist = $_POST['measurements_waist'];
$measurements_bust = $_POST['measurements_bust'];
$ig_handle = $_POST['ig_handle'];
$ig_link = $_POST['ig_link'];
$tiktok_handle = $_POST['tiktok_handle'];
$tiktok_link = $_POST['tiktok_link'];

$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
