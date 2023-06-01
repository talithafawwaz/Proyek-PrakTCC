const express = require('express');
const app = express();
const port = process.env.PORT || 8080; // Port server

// Mengimpor route untuk masing-masing service
const userRoute = require('./user/user-service');
const barangRoute = require('./barang/barang-service');

// Mengatur rute untuk masing-masing service
app.use('/user', userRoute);
app.use('/barang', barangRoute);

// Menjalankan server
app.listen(port, () => {
  console.log(`Server berjalan pada port ${port}`);
});
