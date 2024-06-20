<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <nav>
            <div class="navbar">
                <div>
                    <img class="logo" src="https://models.runway7.fashion/wp-content/uploads/2024/06/LOGO-RUNWAY-7.webp" alt="">
                </div>
                <div class="menu">
                    <a href="accepted_models.php">Home</a>
                    <a href="register.html">Add Model</a>
                    <a href="admin.php">Administrar Modelos</a>
                </div>
                <div class="log-bt">
                    <a href="">Login</a>
                </div>
            </div>
        </nav>
    </header>

<div class="container mt-4">
    <div class="row">
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

        $sql = "SELECT id, full_name, gender, phone, age, email, photo FROM modelos WHERE status = 'accepted'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4 text-center'>";
                echo "<div class='card h-100'>";
                echo "<img src='uploads/" . $row["photo"] . "' class='card-img-top' alt='Profile Picture' style='width:100%;height:400px;object-fit:cover;'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row["full_name"] . "</h5>";
                echo "<p class='card-text'>Gender: " . $row["gender"] . "</p>";
                echo "<p class='card-text'>Phone: " . $row["phone"] . "</p>";
                echo "<p class='card-text'>Age: " . $row["age"] . "</p>";
                echo "<p class='card-text'>Email: " . $row["email"] . "</p>";
                echo "<button class='btn btn-dark' onclick='showDetails(" . $row['id'] . ")'>Ver más</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12'><p>No accepted models.</p></div>";
        }

        $conn->close();
        ?>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function showDetails(id) {
        window.location.href = "model_details.php?id=" + id;
    }
</script>
</body>
</html>
