<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Pembelian</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .transaction-summary {
            border: 1px solid black;
            padding: 10px;
            width: 60%;
        }
    </style>
</head>
<body>

<h2>Tabel Harga Barang</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Jumlah</th>
    </tr>

    <?php
    $items = [
        ["id" => 1, "produk" => "Buavita", "stok" => 30, "harga" => 10890],
        ["id" => 2, "produk" => "Bango", "stok" => 21, "harga" => 21890],
        ["id" => 3, "produk" => "Sariwangi", "stok" => 10, "harga" => 9990],
        ["id" => 4, "produk" => "Shampo Baby", "stok" => 20, "harga" => 21980],
        ["id" => 5, "produk" => "Bedak", "stok" => 15, "harga" => 14990],
        ["id" => 6, "produk" => "Baju Bayi", "stok" => 20, "harga" => 35500],
        ["id" => 7, "produk" => "Jumper", "stok" => 25, "harga" => 49999],
    ];

    foreach ($items as $item) {
        $jumlah = $item["stok"] * $item["harga"];
        $total = $jumlah; 
        echo "<tr>";
        echo "<td>" . $item["id"] . "</td>";
        echo "<td>" . $item["produk"] . "</td>";
        echo "<td>" . $item["stok"] . "</td>";
        echo "<td>" . number_format($item["harga"], 0, ",", ".") . "</td>";
        echo "<td>" . number_format($total, 0, ",", ".") . "</td>";
        echo "</tr>";
    }
    ?>

    <tr>
        <td colspan="4"><strong>Total</strong></td>
        <td><strong>Rp <?php echo number_format($total, 0, ",", "."); ?></strong></td>
    </tr>


</table>

<h2>Transaksi Pembelian</h2>
<div class="transaction-summary">
    <p>Tanggal Transaksi: <?php echo date("d F Y"); ?></p>
    <table>
        <tr>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>

        <?php

        $transaction = [
            ["produk" => "Bedak", "kuantitas" => 15],
            ["produk" => "Baju Bayi", "kuantitas" => 15],
            ["produk" => "Buavita", "kuantitas" => 15],
            ["produk" => "Shampo baby", "kuantitas" => 10],
            ["produk" => "Buavita", "kuantitas" => 3],

        ];

        $total = 0;

        foreach ($transaction as $trans) {
            foreach ($items as $item) {
                if ($trans["produk"] == $item["produk"]) {
                    $subtotal = $trans["kuantitas"] * $item["harga"];
                    $total += $subtotal;
                    echo "<tr>";
                    echo "<td>" . $trans["produk"] . "</td>";
                    echo "<td>" . $trans["kuantitas"] . "</td>";
                    echo "<td>" . number_format($item["harga"], 0, ",", ".") . "</td>";
                    echo "<td>" . number_format($subtotal, 0, ",", ".") . "</td>";
                    echo "</tr>";
                }
            }
        }

        $discount = 0;
        if ($total >= 250000) {
            $discount = 0.20 * $total;
        } elseif ($total >= 400000) {
            $discount = 0.35 * $total;
        }

        $totalPayment = $total - $discount;
        ?>

    </table>

    <p><strong>Total:</strong> Rp <?php echo number_format($total, 0, ",", "."); ?></p>
    <p><strong>Diskon (35%):</strong> Rp <?php echo number_format($discount, 0, ",", "."); ?></p>
    <p><strong>Total Pembayaran:</strong> Rp <?php echo number_format($totalPayment, 0, ",", "."); ?></p>
</div>

</body>
</html>