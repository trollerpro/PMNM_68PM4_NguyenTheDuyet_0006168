<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #f6f7fb;
            color: #222;
            line-height: 1.4;
            padding: 20px 0;
        }
        .content{
            width: 90%;
            max-width: 1100px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 1px 4px rgba(16,24,40,0.08);
        }

        .header-area{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:10px;
        }
        .btn-add{
            display:inline-block;
            padding:8px 12px;
            background:#2b7cff;
            color:#fff;
            text-decoration:none;
            border-radius:4px;
            margin-left:8px;
        }

        .search-area{ margin: 12px 0 18px 0; }
        .search-area form{ display:flex; gap:8px; }
        .search-area input[type="text"]{
            flex:1;
            padding:8px 10px;
            border:1px solid #d0d7de;
            border-radius:4px;
        }
        .search-area button{ padding:8px 12px; border:none; background:#0b5ed7; color:#fff; border-radius:4px; cursor:pointer; }

        table{ width:100%; border-collapse:collapse; margin-top:8px; }
        table thead th{ text-align:left; padding:10px; background:#f1f3f5; font-weight:600; border-bottom:1px solid #e6e9ef; }
        table tbody td{ padding:10px; border-bottom:1px solid #f0f2f5; }

        .action-links a{ margin-right:8px; text-decoration:none; color:#0b5ed7; }

        .pagination{ margin-top:16px; display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .pagination a{ padding:6px 10px; border-radius:4px; background:#fff; border:1px solid #dbe3f0; text-decoration:none; color:#0b5ed7; }
        .pagination a.active{ background:#0b5ed7; color:#fff; border-color:#0b5ed7; }
        .pagination .disabled{ padding:6px 10px; color:#999; border-radius:4px; background:#f8f9fb; border:1px solid #eee; }
        .results-summary{ margin-right:8px; color:#444; font-size:14px; }
    </style>
</head>
<body>
    <div class="header"><?php require_once __DIR__ . '/partical/header.php';
    ?></div>
    <div class="content">
        <?php
        // Determine view file path safely
        $viewFile = dirname(__DIR__) . '/' . (isset($viewname) ? $viewname : '') . '.php';
        if (!empty($viewname) && is_string($viewname) && file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            // Fallback: show a simple message or include a default view if desired
            echo '<p>View not found.</p>';
        }
        ?>
    </div>
    <div class="footer"><?php require_once __DIR__ . '/partical/footer.php';
    ?></div> 
    
</body>
</html>