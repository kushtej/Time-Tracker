const mysql = require('mysql');


const mysqlConnection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'YOUR_PASSWORD',
    database: 'nodejs_login_system',
    multipleStatements: true
});

module.exports = mysqlConnection
