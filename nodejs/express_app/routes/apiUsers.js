var express = require('express');
var router = express.Router();
var session = require('./sessionFactory');
router.use(function (req, res, next) {
    if (req.headers['content-type'] != 'application/json') {
        return res.status(415).send('Not match: content-type');
    }
    var auth = session.sessionFactory(req);
    console.log("sessionFactory: %s", auth);
    if (!auth) {
        return res.status(403).send("Not authorized.");
    } else {
        next();
    }
});
/* GET users listing. */
router.get('/', function(req, res, next) {
    res.send('respond with a resource');
});

router.post('/:id', function (req, res, next) {
  res.send(req.body);
});

module.exports = router;
