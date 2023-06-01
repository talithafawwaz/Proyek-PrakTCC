const express = require('express');
const db = require('../database/connection'); // Mengimpor konfigurasi database

const router = express.Router();

// Implementasi rute untuk service "barang"
router.get('/', (req, res) => {
  const sql = 'SELECT * FROM barang';
  db.query(sql, (err, result) => {
    if (err) {
      res.status(500).send({ error: 'Terjadi kesalahan server' });
    } else {
      res.send(result);
    }
  });
});

router.post('/', (req, res) => {
    const { nama, jumlah, jenis, harga } = req.body;
    const sql = 'INSERT INTO barang (nama, jumlah, jenis, harga) VALUES (?, ?, ?, ?)';
    db.query(sql, [nama, jumlah, jenis, harga], (err, result) => {
      if (err) {
        res.status(500).send({ error: 'Terjadi kesalahan server' });
      } else {
        res.send({ message: 'Berhasil menambah barang' });
      }
    });
});

router.put('/:id', (req, res) => {
    const id = req.params.id;
    const { nama, jumlah, jenis, harga } = req.body;
    const sql = 'UPDATE barang SET nama = ?, jumlah = ?, jenis = ?, harga = ? WHERE id = ?';
    db.query(sql, [nama, jumlah, jenis, harga, id], (err, result) => {
      if (err) {
        res.status(500).send({ error: 'Terjadi kesalahan server' });
      } else {
        res.send({ message: 'Data barang berhasil diupdate' });
      }
    });
});
  
router.delete('/:id', (req, res) => {
    const id = req.params.id;
    const sql = 'DELETE FROM barang WHERE id = ?';
    db.query(sql, [id], (err, result) => {
      if (err) {
        res.status(500).send({ error: 'Terjadi kesalahan server' });
      } else {
        res.send({ message: 'Data barang berhasil dihapus' });
      }
    });
});
  

// ... tambahkan rute-rute lainnya untuk service "barang"

module.exports = router;
