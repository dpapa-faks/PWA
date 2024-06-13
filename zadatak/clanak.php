<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM vijesti WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $vijest = mysqli_fetch_assoc($result);
    } else {
        header("Location: index.php");
        exit();
    }

    mysqli_close($connection);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($vijest['naslov']); ?></title>
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
                            <li><a href="registracija.php">Register</a></li>  
                            <li><a href="administrator.php">Admin</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <div class="article-content">
            <h2 class="article-page-title"><?php echo htmlspecialchars($vijest['naslov']); ?></h2>
            <p class="article-page-text-title"><?php echo htmlspecialchars($vijest['sazetak']); ?></p>
            <img src="<?php echo htmlspecialchars($vijest['slika']); ?>" alt="Article Image" class="article-page-img">
            <hr class="image-divider">
            <p class="article-page-text"><?php echo nl2br(htmlspecialchars($vijest['tekst'])); ?></p>
        </div>

        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>

