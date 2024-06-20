<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<header>
        <nav>
            <div class="navbar">
                <div>
                    <img class="logo" src="https://models.runway7.fashion/wp-content/uploads/2024/06/LOGO-RUNWAY-7.webp" alt="">
                </div>
                <div class="menu">
                    <a href="accepted_models.php">Home</a>
                    <a href="register.html">Add Model</a>
                </div>
                <div class="log-bt">
                    <a href="">Login</a>
                </div>
            </div>
        </nav>
    </header>
<body>
<div class="container mt-4">
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

    // Obtener el ID del modelo desde la URL
    $model_id = $_GET['id'];

    // Consultar la base de datos para obtener los detalles del modelo
    $sql = "SELECT * FROM modelos WHERE id = $model_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mostrar todos los detalles del modelo
        echo "<h2 class='mb-4 text-center'>Detalles del Modelo</h2>";
        echo "<div class='d-flex align-items-center'>";
        echo "<div class='mr-4'><img src='uploads/" . $row["photo"] . "' alt='Profile Picture' class='img-fluid' style='width:100%;height:auto;object-fit:cover;'></div>";
        echo "<div>";
        echo "<p><strong>Full Name:</strong> " . $row['full_name'] . "</p>";
        echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
        echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Phone:</strong> " . $row['phone'] . "</p>";
        echo "<p><strong>Availability:</strong> " . $row['availability'] . "</p>";
        echo "<p><strong>Bio:</strong> " . $row['bio'] . "</p>";
        echo "<p><strong>Experience:</strong> " . $row['experience'] . "</p>";
        echo "<p><strong>Link to Walk:</strong> <a href='" . $row['link_walk'] . "'>" . $row['link_walk'] . "</a></p>";
        echo "<p><strong>Height:</strong> " . $row['height'] . " cm</p>";
        echo "<p><strong>Weight:</strong> " . $row['weight'] . " kg</p>";
        echo "<p><strong>Measurements Waist:</strong> " . $row['measurements_waist'] . " cm</p>";
        echo "<p><strong>Measurements Bust:</strong> " . $row['measurements_bust'] . " cm</p>";
        echo "<p><strong>IG Handle:</strong> " . $row['ig_handle'] . "</p>";
        echo "<p><strong>IG Link:</strong> <a href='" . $row['ig_link'] . "'>" . $row['ig_link'] . "</a></p>";
        echo "<p><strong>Tiktok Handle:</strong> " . $row['tiktok_handle'] . "</p>";
        echo "<p><strong>Tiktok Link:</strong> <a href='" . $row['tiktok_link'] . "'>" . $row['tiktok_link'] . "</a></p>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "Modelo no encontrado.";
    }

    $conn->close();
    ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
