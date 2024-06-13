<?php
include 'connect.php';

if (isset($_GET['kategorija'])) {
    $kategorija = $_GET['kategorija'];

    $query = "SELECT * FROM vijesti WHERE kategorija = '$kategorija' AND arhiva = 0";
    $result = mysqli_query($connection, $query);
    $vijesti = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $vijesti[] = $row;
    }

    mysqli_close($connection);
} else {
    header("Location: index.php");
    exit();
}

$activeHome = '';
$activeLoL = '';
$activeCS = '';
$activeUnos = '';
$activeRegister = '';
$activeAdmin = '';

switch ($kategorija) {
    case 'League of Legends':
        $activeLoL = 'active';
        break;
    case 'Counter Strike':
        $activeCS = 'active';
        break;
    default:
        $activeHome = 'active';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($kategorija); ?> Articles</title>
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
                            <li><a href="index.php" class="<?php echo $activeHome; ?>">Home</a></li>
                            <li><a href="kategorija.php?kategorija=League of Legends" class="<?php echo $activeLoL; ?>">League of Legends</a></li>
                            <li><a href="kategorija.php?kategorija=Counter Strike" class="<?php echo $activeCS; ?>">Counter Strike</a></li>
                            <li><a href="unos.html" class="<?php echo $activeUnos; ?>">Article entry</a></li>                       
                            <li><a href="registracija.php" class="<?php echo $activeRegister; ?>">Register</a></li>  
                            <li><a href="administrator.php" class="<?php echo $activeAdmin; ?>">Admin</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <div class="articles-group">
            <h2 class="category-title"><?php echo ucfirst($kategorija); ?></h2>
            <div class="articles-row">
                <?php if (!empty($vijesti)): ?>
                    <?php foreach ($vijesti as $vijest): ?>
                        <div class="article">
                            <a href="clanak.php?id=<?php echo $vijest['id']; ?>"><img src="<?php echo $vijest['slika']; ?>" alt="Article Image" class="article-img"></a>
                            <a href="clanak.php?id=<?php echo $vijest['id']; ?>"><h3 class="article-title"><?php echo $vijest['naslov']; ?></h3></a>
                            <p class="article-description"><?php echo $vijest['sazetak']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No articles found in this category.</p>
                <?php endif; ?>
            </div>
        </div>

        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>


