<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .content{
            width: 60%;
            margin:auto;
        }
    </style>
</head>
<body>
    <div class="header"><?php require_once '../app/views/layout/partical/header.php';
    ?></div>
    <div class="content">
        <?php
        // Determine view file path safely
        $viewFile = __DIR__ . '/../' . (isset($viewname) ? $viewname : '') . '.php';
        if (!empty($viewname) && is_string($viewname) && file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            // Fallback: show a simple message or include a default view if desired
            echo '<p>View not found.</p>';
        }
        ?>
    </div>
    <div class="footer"><?php require_once '../app/views/layout/partical/footer.php';
    ?></div> 
    
</body>
</html>