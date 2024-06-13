<?php
session_start();
require 'connect.php'; 

$message = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT korisnicko_ime, lozinka, admin_prava FROM korisnik WHERE korisnicko_ime = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($dbUsername, $dbPassword, $role);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $dbPassword)) {
        if ($role == 1) { // 1 indicates admin
            $_SESSION['username'] = $dbUsername;
            $_SESSION['role'] = 'admin';
            header("Location: admin_dash.php"); 
            exit();
        } else {
            $message = "Hello $dbUsername, you do not have admin rights.";
        }
    } else {
        $message = "Incorrect username or password. Please register first.";
        $message .= ' <a href="registracija.php">Register here</a>';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
    <link rel="stylesheet" href="styles.css">
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
                            <li><a href="registracija.php">Register</a></li>  
                            <li><a href="administrator.php" class="active">Admin</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <form action="administrator.php" method="POST" class="article-form">
            <div class="form-item">
                <label for="username">Username:</label>
                <div class="form-field">
                    <input type="text" name="username" id="username" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <label for="password">Password:</label>
                <div class="form-field">
                    <input type="password" name="password" id="password" class="form-field-textual">
                </div>
            </div>
            <div class="form-item">
                <button type="submit">Login</button>
            </div>
        </form>
        
        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>


