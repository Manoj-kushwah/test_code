var express = require('express');
var router = express.Router();
var dao = require('../dao/AppDAO');
var session = require('../routes/sessionFactory');
/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

/* GET users signup. */
router.get('/signup', function(req, res, next) {
    var db = dao.AppDAO.db;
    if (db != null) {
        db.each('SELECT * FROM tbl_users',[], function (err, value) {
            console.log('db users: ', value);
        });
    }
    res.render('sign_up.html',{error: null});
    // res.send('respond with a resource');
});

/* POST users signup. */
router.post('/signup', function(req, res, next) {
    console.log(req.body);
    var firstName = req.body['firstName'];
    var lastName = req.body['lastName'];
    var email = req.body['email'];
    var password = req.body['password'];
    var confirmPassword = req.body['confirmPassword'];
    var gender = req.body['gender'];
    var dob = req.body['dob'];

    if (confirmPassword !== password) {
        res.render('sign_up.html', {error: 'Did not password match.'});
        return;
    }

    var db = dao.AppDAO.db;
    if (db != null) {
        db.each('SELECT (MAX(id)+1) as nextId FROM tbl_users',[], function (err, value) {
            if (err) {
                console.log('db nextId err: ', err);
                res.render('sign_up.html', {error: err});
                return;
            }
            console.log('db nextId: ', value);
            db.run('INSERT INTO tbl_users(id, firstName, lastName, email, password, gender, dob, userRole) values(?,?,?,?,?,?,?,2)',[value['nextId'], firstName, lastName, email, password, gender, dob]).then(function (dbRes) {
                console.log('db res: ', dbRes);
                res.render('sign_up.html',{error: null});
            }).catch(reason => {
                console.log('db reason: ', reason);
                res.render('sign_up.html', {error: reason});
            })
        });
    }
});

/* POST users signup. */
router.get('/login', function(req, res, next) {
    res.render('login.html', {error: null});
});
/* POST users signup. */
router.post('/login', function(req, res, next) {
    console.log(req.body);
    // var firstName = req.body['firstName'];
    // var lastName = req.body['lastName'];
    var email = req.body['email'];
    var password = req.body['password'];
    // var confirmPassword = req.body['confirmPassword'];
    // var gender = req.body['gender'];
    // var dob = req.body['dob'];

    // if (confirmPassword !== password) {
    //     res.render('sign_up.html', {error: 'Did not password match.'});
    //     return;
    // }

    var db = dao.AppDAO.db;
    if (db != null) {
        db.each('SELECT * FROM tbl_users where email=? and password=? limit 1',[email, password], function (err, row) {
            if (err) {
                console.log('db nextId err: ', err);
                res.render('login.html', {error: err});
            } else {
                console.log('login row: ', row);
                if (session.createSession(row)){

                }
                // res.send('Success.', 200);
                // return;
            }
            // console.log('db nextId: ', value);
            // db.run('INSERT INTO tbl_users(id, firstName, lastName, email, password, gender, dob, userRole) values(?,?,?,?,?,?,?,2)',[value['nextId'], firstName, lastName, email, password, gender, dob]).then(function (dbRes) {
            //     console.log('db res: ', dbRes);
            //     res.render('sign_up.html',{error: null});
            // }).catch(reason => {
            //     console.log('db reason: ', reason);
            //     res.render('sign_up.html', {error: reason});
            // })
        }, function (data) {
            console.log('login data: ', data);
            res.render('login.html', {error: null});
        });
    }
});

module.exports = router;
