var users = {"1": {"id":"1","firstName":"Admin","lastName":"","email":"admin@gmail.com","gender":"male","dob": Date.now().toString(),"userRole": "1"}};
var factoryUsers = {};
var sessionMap = new Map();
function sessionFactory(req, res, next){
    var id = req.headers["token-id"];
    console.log("sessionFactory-> id: %s", id);
    if (id!=null) {
        return users[String(id).trim()];
    }
    return null;
}

function validatorSession(sessionId) {
    try {
        var session = sessionMap.get(sessionId);
        if (session!=null && ((Date.now() - session) > (module.exports.timeLimit*1000))) {
            return true;
        }
    } catch (e) {
        console.error(e);
    }
    return false;
}

function updateSession(sessionId) {
    try {
        sessionMap.set(sessionId, Date.now());
    } catch (e) {
        console.error(e);
    }
}

function createSession(user){
    if (user != null && user.id != null) {
        factoryUsers[user.id] = user;
        return true;
    }
    return false;
}

module.exports.timeLimit = 10; // second
module.exports.createSession = createSession;
module.exports.sessionFactory = sessionFactory;
module.exports.users = users;