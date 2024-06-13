<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST["title"]);
    $about = htmlspecialchars($_POST["about"]);
    $content = htmlspecialchars($_POST["content"]);
    $category = htmlspecialchars($_POST["category"]);
    $archive = isset($_POST["archive"]) ? 1 : 0; 
    
    if (isset($_FILES['pphoto']) && $_FILES['pphoto']['error'] == 0) {
        $allowed = array('jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
        $filename = $_FILES['pphoto']['name'];
        $filetype = $_FILES['pphoto']['type'];
        $filesize = $_FILES['pphoto']['size'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }

        $maxsize = 5 * 1024 * 1024; 
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        if (in_array($filetype, $allowed)) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $new_filename = $upload_dir . basename($filename);
            if (move_uploaded_file($_FILES['pphoto']['tmp_name'], $new_filename)) {
                $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (NOW(), ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "sssssi", $title, $about, $content, $new_filename, $category, $archive);
                
                if (mysqli_stmt_execute($stmt)) {
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Article</title>
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
                                                <li><a href="unos.html" class="active">Article entry</a></li>                       
                                                <li><a href="registracija.php">Register</a></li>  
                                                <li><a href="administrator.php">Admin</a></li> 
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </header>
                            <div class="article-content">
                                <h2 class="article-page-title"><?php echo $title; ?></h2>
                                <p class="article-page-text-title"><?php echo $about; ?></p>
                                <img src="<?php echo $new_filename; ?>" alt="Uploaded Image" class="article-page-img">
                                <hr class="image-divider">
                                <p class="article-page-text"><?php echo nl2br($content); ?></p>
                                <p class="article-page-text"><strong>Category:</strong> <?php echo $category; ?></p>
                                <p class="article-page-text"><strong>Save in archive:</strong> <?php echo ($archive ? 'Yes' : 'No'); ?></p>
                            </div>
                            <footer>
                                <p class="footer-text">Domagoj Papa | 2024 | dpapa@tvz.hr</p>
                            </footer>
                        </div>
                    </body>
                    </html>
                    <?php
                } else {
                    echo "<p>Error: Failed to insert data into database. Please try again later.</p>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<p>Error: There was a problem uploading your file. Please try again.</p>";
            }
        } else {
            echo "<p>Error: There was a problem with your file upload. Please try again.</p>";
        }
    } else {
        echo "<p>Error: No file uploaded or an error occurred.</p>";
    }
}

mysqli_close($connection);
?>
