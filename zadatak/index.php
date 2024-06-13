<?php
include 'connect.php';

$query = "SELECT * FROM vijesti WHERE arhiva = 0";
$result = mysqli_query($connection, $query);
$vijesti = [];
while ($row = mysqli_fetch_assoc($result)) {
    $vijesti[] = $row;
}

mysqli_close($connection);

$kategorije = [
    'League of Legends' => [],
    'Counter Strike' => []
];

foreach ($vijesti as $vijest) {
    if (isset($kategorije[$vijest['kategorija']])) {
        $kategorije[$vijest['kategorija']][] = $vijest;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                            <li><a href="#" class="active">Home</a></li>
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
        
        <?php foreach ($kategorije as $kategorija => $clanci): ?>
            <div class="articles-group">
                <h2 class="category-title"><?php echo $kategorija; ?></h2>
                <div class="articles-row">
                    <?php foreach (array_slice($clanci, 0, 3) as $vijest): ?>
                        <div class="article">
                            <a href="clanak.php?id=<?php echo $vijest['id']; ?>">
                                <img src="<?php echo htmlspecialchars($vijest['slika']); ?>" alt="Article Image" class="article-img">
                                <h3 class="article-title"><?php echo $vijest['naslov']; ?></h3>
                            </a>
                            <p class="article-description"><?php echo $vijest['sazetak']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>




