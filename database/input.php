<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
    exit;
}

$id = $_POST["id"];
$nama = $_POST["nama"];
$jumlah = $_POST["jumlah"];
$jenis = $_POST["jenis"];
$harga = $_POST["harga"];

if ($_GET["op"] == "tambah") {
    $data = array(
        "id" => $id,
        "nama" => $nama,
        "jumlah" => $jumlah,
        "jenis" => $jenis,
        "harga" => $harga
    );

    $url = "https://proyek-praktcc-ugk4rvctua-uc.a.run.app/barang";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    $result = json_decode($response, true);
    curl_close($ch);
} elseif ($_GET["op"] == "edit") {
    $id = $_GET["id"];
    $data = array(
        "id" => $id,
        "nama" => $nama,
        "jumlah" => $jumlah,
        "jenis" => $jenis,
        "harga" => $harga
    );

    $url = "https://proyek-praktcc-ugk4rvctua-uc.a.run.app/barang/$id";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    $result = json_decode($response, true);
    curl_close($ch);
}

if ($result) {
    header("Location: ../barang.php");
    exit;
} else {
    echo "Gagal memproses permintaan.";
}
?>
