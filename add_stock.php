<?php
include_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $compost_date = $_POST['compost_date'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO Stock (compost_date, quantity) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $compost_date, $quantity);

    if ($stmt->execute()) {
        $message = "Stok berhasil ditambahkan.";
    } else {
        $message = "Gagal menambah stok.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Stok Pupuk Kompos</title>
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
            <h2 class="text-center">Tambah Stok Pupuk Kompos</h2>
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
                <button type="submit" class="btn btn-primary btn-block">Tambah Stok</button>
            </form>
            <a href="index.php" class="btn btn-secondary btn-block">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
