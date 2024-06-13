<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: administrator.php");
    exit();
}

require 'connect.php'; 

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM vijesti WHERE id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

$query = "SELECT * FROM vijesti";
$result = $connection->query($query);
$vijesti = [];
while ($row = $result->fetch_assoc()) {
    $vijesti[] = $row;
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
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
                            <li><a href="administrator.php" class="active">Admin</a></li> 
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <div class="admin-content">
            <h2 class="admin-title">Manage Articles</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Summary</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Archived</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vijesti as $vijest): ?>
                    <tr>
                        <td><?php echo $vijest['id']; ?></td>
                        <td><?php echo $vijest['naslov']; ?></td>
                        <td><?php echo $vijest['kategorija']; ?></td>
                        <td class="truncate"><?php echo $vijest['sazetak']; ?></td>
                        <td class="truncate"><?php echo $vijest['tekst']; ?></td>
                        <td><img src="<?php echo $vijest['slika']; ?>" alt="Article Image" class="admin-img"></td>
                        <td><?php echo $vijest['arhiva'] ? 'Yes' : 'No'; ?></td>
                        <td>
                            <form method="GET" action="uredi.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $vijest['id']; ?>">
                                <button type="submit" name="edit">Edit</button>
                            </form>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $vijest['id']; ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <footer>
            <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
        </footer>
    </div>
</body>
</html>


