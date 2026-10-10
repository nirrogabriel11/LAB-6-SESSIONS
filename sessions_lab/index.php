<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: home.php');
        exit();
    }

    if ($_SESSION['role'] === 'user') {
        header('Location: user.php');
        exit();
    }
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } elseif ($username === 'admin' && $password === 'admin123') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        session_regenerate_id(true);
        header('Location: home.php');
        exit();
    } elseif ($username === 'user' && $password === 'user123') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        session_regenerate_id(true);
        header('Location: user.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chessable Login</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(rgba(22, 18, 14, 0.55), rgba(22, 18, 14, 0.55)),
                linear-gradient(135deg, #d8c2a0, #a17047 40%, #5a3620);
            color: #1d1c1a;
        }

        .login-panel {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 249, 241, 0.96);
            border: 1px solid rgba(95, 72, 49, 0.2);
            border-radius: 18px;
            padding: 30px 28px 24px;
            box-shadow: 0 18px 40px rgba(28, 20, 14, 0.18);
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 14px;
            color: #2a221b;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2f5f44;
            color: #f8f4ee;
            font-size: 22px;
            box-shadow: inset 0 0 0 2px rgba(255,255,255,0.15);
        }

        h2 {
            margin: 0;
            text-align: center;
            font-size: 2rem;
            letter-spacing: 0.03em;
        }

        .subtitle {
            text-align: center;
            margin: 8px 0 22px;
            color: #5a4a3c;
            font-size: 0.92rem;
        }

        .alert {
            background: #f9e6e3;
            border: 1px solid #d79d93;
            color: #6b2c2c;
            border-radius: 10px;
            padding: 10px 12px;
            margin-bottom: 18px;
            text-align: center;
            font-size: 0.92rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #2d2925;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #c8b9a7;
            background: #fffdf9;
            font-size: 1rem;
            color: #1d1c1a;
        }

        input:focus {
            outline: none;
            border-color: #2f5f44;
            box-shadow: 0 0 0 3px rgba(47, 95, 68, 0.12);
        }

        button {
            margin-top: 6px;
            border: none;
            border-radius: 10px;
            background: #2f5f44;
            color: #f7f4ef;
            padding: 12px 18px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        button:hover {
            background: #254d37;
        }
    </style>
</head>
<body>
    <div class="login-panel">
        <div class="brand">
            <div class="brand-mark">♟</div>
            <h2>Chessable</h2>
        </div>
        <p class="subtitle">Player access</p>

        <?php if (!empty($error)): ?>
            <div class="alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
