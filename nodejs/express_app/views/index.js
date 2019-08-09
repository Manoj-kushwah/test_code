var path = require('path');
function byName(fileName){
    return __dirname.concat(path.sep).concat(fileName);
}
module.exports.byName = byName;