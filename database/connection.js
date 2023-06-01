const mysql = require('mysql');

const db = mysql.createConnection({
    host: 'ip_private_sql',
    user: 'sql_user',
    password: 'sql_password',
    database: 'sql_database'
});

// Membuat koneksi ke database
db.connect((err) => {
  if (err) {
    throw err;
  }
  console.log('Terhubung ke database MySQL');
});

module.exports = db;
