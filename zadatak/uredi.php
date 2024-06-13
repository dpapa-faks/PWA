<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: administrator.php");
    exit();
}

$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM vijesti WHERE id = ?";
    $stmt = $connection->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $vijest = $result->fetch_assoc();
    } else {
        echo "Članak nije pronađen.";
        exit();
    }

    $stmt->close();
} else {
    echo "ID nije proslijeđen.";
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $naslov = !empty($_POST['naslov']) ? $_POST['naslov'] : $vijest['naslov'];
    $kategorija = !empty($_POST['kategorija']) ? $_POST['kategorija'] : $vijest['kategorija'];
    $sazetak = !empty($_POST['sazetak']) ? $_POST['sazetak'] : $vijest['sazetak'];
    $tekst = !empty($_POST['tekst']) ? $_POST['tekst'] : $vijest['tekst'];
    $slika = !empty($_POST['slika']) ? $_POST['slika'] : $vijest['slika'];
    $arhiva = isset($_POST['arhiva']) ? 1 : 0; 

    if ($naslov !== $vijest['naslov'] || $kategorija !== $vijest['kategorija'] || $sazetak !== $vijest['sazetak'] || $tekst !== $vijest['tekst'] || $slika !== $vijest['slika'] || $arhiva !== $vijest['arhiva']) {
        $query = "UPDATE vijesti SET naslov = ?, kategorija = ?, sazetak = ?, tekst = ?, slika = ?, arhiva = ? WHERE id = ?";
        
        $stmt = $connection->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($connection->error));
        }

        $stmt->bind_param('ssssssi', $naslov, $kategorija, $sazetak, $tekst, $slika, $arhiva, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            header("Location: admin_dash.php");
            exit();
        } else {
            $message = "Došlo je do greške prilikom ažuriranja članka.";
        }

        $stmt->close();
    } else {
        $message = "Niste izvršili nikakve promjene.";
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
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
        
        <div class="admin-content">
            <h2 class="admin-title">Edit Article</h2>
            <?php if (!empty($message)): ?>
                <div class="message"><?php echo $message; ?></div>
            <?php endif; ?>
            <form action="uredi.php?id=<?php echo $vijest['id']; ?>" method="POST" class="article-form">
                <input type="hidden" name="id" value="<?php echo $vijest['id']; ?>">
                <div class="form-item">
                    <label for="naslov">Title:</label>
                    <input type="text" name="naslov" id="naslov" value="<?php echo htmlspecialchars($vijest['naslov'], ENT_QUOTES, 'UTF-8'); ?>" class="form-field">
                </div>
                <div class="form-item">
                    <label for="kategorija">Category:</label>
                    <input type="text" name="kategorija" id="kategorija" value="<?php echo htmlspecialchars($vijest['kategorija'], ENT_QUOTES, 'UTF-8'); ?>" class="form-field">
                </div>
                <div class="form-item">
                    <label for="sazetak">Summary:</label>
                    <textarea name="sazetak" id="sazetak" class="form-field"><?php echo htmlspecialchars($vijest['sazetak'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <div class="form-item">
                    <label for="tekst">Content:</label>
                    <textarea name="tekst" id="tekst" class="form-field"><?php echo htmlspecialchars($vijest['tekst'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <div class="form-item">
                    <label for="slika">Image URL:</label>
                    <input type="text" name="slika" id="slika" value="<?php echo htmlspecialchars($vijest['slika'], ENT_QUOTES, 'UTF-8'); ?>" class="form-field">
                </div>
                <div class="form-item">
                    <label for="arhiva">Archive:</label>
                    <input type="checkbox" name="arhiva" id="arhiva" <?php if ($vijest['arhiva'] == 1) echo 'checked'; ?>>
                </div>
                <div class="form-item">
                    <button type="submit" name="submit">Update Article</button>
                    <a href="admin_dash.php" class="button-back">Back</a>
                </div>
            </form>
        </div>

        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>











