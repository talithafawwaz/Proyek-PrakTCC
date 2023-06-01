const mysql = require('mysql');

const db = mysql.createConnection({
    host: '10.72.208.4',
    user: 'fp-user',
    password: 'admin12345',
    database: 'fp-coba'
});

// Membuat koneksi ke database
db.connect((err) => {
  if (err) {
    throw err;
  }
  console.log('Terhubung ke database MySQL');
});

module.exports = db;
