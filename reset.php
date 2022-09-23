<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset page</title>
</head>
<body>
    <script>
        window.location.href = "index.php";
    </script>
</body>
</html>