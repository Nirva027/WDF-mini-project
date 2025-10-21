<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Welcome - SilvaGlow</title>
<style>
body { 
  font-family: 'Segoe UI'; 
  background: linear-gradient(135deg, #f8cdda, #1d2b64);
  color: white;
  text-align: center;
  padding-top: 100px;
}
button {
  padding: 10px 20px;
  border: none;
  border-radius: 8px;
  background-color: #ff9a9e;
  font-weight: bold;
  cursor: pointer;
}
button:hover { background-color: #ff6f91; }
</style>
</head>
<body>
  <h1>Welcome, <?php echo htmlspecialchars($user); ?>!</h1>
  <p>You are now logged in to SilvaGlow 💖</p>
  <button onclick="window.location.href='logout.php'">Logout</button>
</body>
</html>
