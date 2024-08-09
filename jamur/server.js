const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3000;

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'password',
  database: 'jamur'
});

db.connect((err) => {
  if (err) throw err;
  console.log('Terhubung ke database');
});

app.use(express.json());
app.use(express.static('public'));

// Endpoint untuk mengambil data
app.get('/save_data', (req, res) => {
  db.query('SELECT * FROM data ORDER BY date DESC', (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});

// Endpoint untuk memasukkan data
app.post('/save_data', (req, res) => {
  const data = req.body;
  const query = 'INSERT INTO data (date, temperature, humidity, status_diffuser) VALUES (NOW(), ?, ?, ?)';
  db.query(query, [data.temperature, data.humidity, data.status_diffuser], (err, result) => {
    if (err) throw err;
    res.sendStatus(200);
  });
});

app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
