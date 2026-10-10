<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #d1c0a2, #f9f3ea 40%, #d6c5a5);
            color: #221d1a;
        }

        .panel {
            width: 100%;
            max-width: 620px;
            background: rgba(255, 249, 242, 0.96);
            border: 1px solid rgba(76, 55, 41, 0.15);
            border-radius: 18px;
            padding: 34px 30px;
            box-shadow: 0 18px 40px rgba(37, 30, 25, 0.12);
        }

        .title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #2f5f44;
            color: #fefdfb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        h1 {
            margin: 0;
            font-size: 2rem;
            color: #1f241f;
        }

        p {
            color: #4d4139;
            line-height: 1.6;
        }

        .logout-btn {
            display: inline-block;
            text-decoration: none;
            background: #2f5f44;
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            margin-top: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class="title">
            <div class="icon">♟</div>
            <h1>Admin Board</h1>
        </div>
        <p>Welcome back, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>.</p>
        <p>You are managing the chess activity and player access.</p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
