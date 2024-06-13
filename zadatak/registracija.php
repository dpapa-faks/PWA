<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $lozinka = $_POST['pass'];
    $confirm_lozinka = $_POST['confirm_pass'];
    $admin_prava = isset($_POST['admin_prava']) ? 1 : 0;

    if ($lozinka !== $confirm_lozinka) {
        $_SESSION['message'] = "Passwords do not match!";
        header("Location: registracija.php");
        exit;
    }

    $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);

    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['message'] = "Username already exists!";
    } else {
        $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, admin_prava) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ssssi', $ime, $prezime, $username, $hashed_password, $admin_prava);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Registration successful!";
        } else {
            $_SESSION['message'] = "Error: " . $stmt->error;
        }
    }
    $stmt->close();
    $connection->close();

    header("Location: registracija.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <header>
            <div class="header-content">
                <img src="logo.png" alt="Logo" class="logo">
                <div class="title-nav-container">
                    <h1 class="title">Esports Sphere</h1>
                    <nav>
                        <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                            <li><a href="kategorija.php?kategorija=League of Legends">League of Legends</a></li>
                            <li><a href="kategorija.php?kategorija=Counter Strike">Counter Strike</a></li>
                            <li><a href="unos.html">Article entry</a></li>                       
                            <li><a href="registracija.php" class="active">Register</a></li>  
                            <li><a href="administrator.php">Admin</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>

        <form method="post" action="registracija.php" class="article-form">
            <div class="form-item">
                <label for="ime">Name:</label>
                <div class="form-field">
                    <input type="text" id="ime" name="ime" required>
                </div>
            </div>
            <div class="form-item">
                <label for="prezime">Surname:</label>
                <div class="form-field">
                    <input type="text" id="prezime" name="prezime" required>
                </div>
            </div>
            <div class="form-item">
                <label for="username">Username:</label>
                <div class="form-field">
                    <input type="text" id="username" name="username" required>
                </div>
            </div>
            <div class="form-item">
                <label for="pass">Password:</label>
                <div class="form-field">
                    <input type="password" id="pass" name="pass" required>
                </div>
            </div>
            <div class="form-item">
                <label for="confirm_pass">Confirm password:</label>
                <div class="form-field">
                    <input type="password" id="confirm_pass" name="confirm_pass" required>
                </div>
            </div>
            <div class="form-item">
                <label for="admin_prava">Administrator</label>
                <div class="form-field">
                    <input type="checkbox" id="admin_prava" name="admin_prava">
                </div>
            </div>
            <div class="form-item">
                <button type="submit">Registriraj se</button>
            </div>
        </form>
        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>



