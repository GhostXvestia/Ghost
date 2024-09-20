<?php
include_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $compost_date = $_POST['compost_date'];
    $quantity = $_POST['quantity'];
    $sale_date = $_POST['sale_date'];
    $price_per_kg = 5000;
    $total_price = $quantity * $price_per_kg;

    $sql = "INSERT INTO Sales (compost_date, quantity, sale_date, total_price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $compost_date, $quantity, $sale_date, $total_price);

    if ($stmt->execute()) {
        $message = "Penjualan berhasil dicatat.";
    } else {
        $message = "Gagal mencatat penjualan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catat Penjualan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: #ffffff;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container mx-auto">
            <h2 class="text-center">Catat Penjualan</h2>
            <?php if (isset($message)): ?>
                <div class="alert alert-info"><?php echo $message; ?></div>
            <?php endif; ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="compost_date">Tanggal Kompos</label>
                    <input type="date" id="compost_date" name="compost_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah (kg)</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sale_date">Tanggal Penjualan</label>
                    <input type="date" id="sale_date" name="sale_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Catat Penjualan</button>
            </form>
            <a href="index.php" class="btn btn-secondary btn-block">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
