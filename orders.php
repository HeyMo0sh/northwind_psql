<?php
    $host = '127.0.0.1';
    $port = '5432';
    $dbname = 'northwind';
    $user = 'demouser';
    $password = 'demopass123';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

    try {
	$pdo = new PDO($dsn);

        if ($pdo) {
            $stmt = $pdo->query('SELECT * FROM order_details');
            echo "<table border='1'>";
            echo "<tr><th>Order ID</th><th>Product</th><th>Quantity</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>