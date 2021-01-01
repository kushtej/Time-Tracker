const mysql = require('mysql');


const mysqlConnection = mysql.createConnection({
    host: 'localhost',
    user: 'root', //Your Database username
    password: 'root', //Your Database Password
    database: 'nodejs_login_system',
    multipleStatements: true
});

module.exports = mysqlConnection