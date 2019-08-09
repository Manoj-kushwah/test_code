var express = require('express');
var router = express.Router();
var view = require('../views/index');
console.log('view: ', view);
console.log('view: ', view.byName('users'));
// var session = require('./sessionFactory');
// router.use(function (req, res, next) {
//     if (req.headers['content-type'] != 'application/json') {
//         return res.status(415).send('Not match: content-type');
//     }
//     var auth = session.sessionFactory(req);
//     console.log("sessionFactory: %s", auth);
//     if (!auth) {
//         return res.status(403).send("Not authorized.");
//     } else {
//         next();
//     }
// });
/* GET users listing. */
router.get('/', function(req, res, next) {
    res.render('users.html', { id: '100', list: [1,2,3,4,5,6], user: {name: 'manoj', email: 'manoj@gmail.com'}});
    // res.send('respond with a resource');
});

/* GET users create. */
router.get('/create', function(req, res, next) {
    res.render('users/create.html');
    // res.send('respond with a resource');
});

/* GET users signup. */
router.get('/signup', function(req, res, next) {
    res.render('sign_up.html');
    // res.send('respond with a resource');
});

/* POST users signup. */
router.post('/signup', function(req, res, next) {
    console.log(req);
    console.log(req.params);
    console.log(req.body);
    res.render('sign_up.html');
    // res.send('respond with a resource');
});

router.get('/:id', function (req, res, next) {
  res.send(req.body);
});

module.exports = router;
