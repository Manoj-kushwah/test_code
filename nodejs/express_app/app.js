var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var sassMiddleware = require('node-sass-middleware');

var dao = require('./dao/AppDAO');

var session = require('./routes/sessionFactory');

var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');
var apiUsersRouter = require('./routes/apiUsers');

var app = express();
var db = new dao.AppDAO(__dirname.concat(path.sep+'database'+path.sep+'app.sqlite3'));
console.log('db: ',db);
const sql = 'CREATE TABLE IF NOT EXISTS tbl_users(id INT(10) NOT NULL PRIMARY KEY, firstName VARCHAR(30), lastName VARCHAR(30), email VARCHAR(100) NOT NULL UNIQUE, password VARCHAR(36), gender VARCHAR(30), dob VARCHAR(50), userRole INT DEFAULT 0)';
db.run(sql).then((res) => {
    console.log('table created.');
    var id=true;
    Promise.resolve(true).then(value => {
        db.each('SELECT * FROM tbl_users where id=1 limit 1',[], function (err, row) {
            value=false;
            if (err) {
                console.log(err);
                return false;
            }
            console.log('admin users by id: ', row);
        });
        return true;
    }).then(value1 => {
        if (value1) db.run('INSERT INTO tbl_users(id, firstName, lastName, email, password, gender, dob, userRole) values(?,?,?,?,?,?,?,1)', [1, 'Admin', '', 'admin@gmail.com', 'admin123', 'male', Date.now().toString()]).then(value => {
            console.log('value: ', value);
            console.log('db: ', db);
        });
    });
    // db.each('SELECT * FROM tbl_users where id=1',[], function (err, row) {
    //     if (err) {
    //         console.log(err);
    //         return;
    //     }
    //     console.log('admin users by id: ', row);
    //     id=false;
    // });
    // if (id) {
    //     db.run('INSERT INTO tbl_users(id, firstName, lastName, email, password, gender, dob, userRole) values(?,?,?,?,?,?,?,1)', [1, 'Admin', '', 'admin@gmail.com', 'admin123', 'male', Date.now().toString()]).then(value => {
    //         console.log('value: ', value);
    //         console.log('db: ', db);
    //     });
    // }
    // db.run('INSERT INTO tbl_users(id, userRole) select ? as id, ? as userRole from login_users where not exists(select * from login_users where id=? and userRole=?) limit 1', ['123', 1, '123', 1]).then(value => {
    //     console.log('value: ', value);
    // });
}).catch(reason => {
    console.log('table is not created.');
});
app.locals.db = db;
app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(sassMiddleware({
  src: path.join(__dirname, 'public'),
  dest: path.join(__dirname, 'public'),
  indentedSyntax: true, // true = .sass and false = .scss
  sourceMap: true
}));

app.use(express.static(path.join(__dirname, 'public')));

app.set('views', path.join(__dirname, 'views'));
app.engine('html', require('ejs').renderFile);
app.set('view engine', 'html');
/**
 * This is print for request header, body details in console.
 * @global route use
 * */
app.use(function (req, res, next) {
    console.log("locals: ", req.locals);
    console.log("headers: ", req.headers);
    console.log("body: ", req.body);
    next();
});

/**
 * This is root route controller.
 * @root path handler
 * */
app.use('/', indexRouter);

/**
 * This is api users route controller.
 * @users path handler
 * */
app.use('/api/users', apiUsersRouter);

/**
 * This is users route controller.
 * @users path handler
 * */
app.use('/users', usersRouter);

/**
 * Export app.
 * */
module.exports = app;
