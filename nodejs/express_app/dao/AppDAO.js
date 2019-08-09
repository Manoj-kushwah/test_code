var sqlite3 = require('sqlite3');
class AppDAO {
    constructor(databaseFilePath){
        this.db = new sqlite3.Database(databaseFilePath, (err) => {
            if (err) {
                console.log('Could not connect to database', err);
            } else {
                console.log('Connect to database');
            }
        });

        AppDAO.db = this;
    }

    run(sql, params = []) {
        return new Promise((resolve, reject) => {
            console.log("sql: %s", sql);
            console.log("params: ", params);
            this.db.run(sql, params, function (err) {
                if (err) {
                    console.log('Error running sql: ');
                    console.log(err);
                    reject(err)
                } else {
                    resolve();
                }
            })
        })
    }

    each(sql,params, callback, complite) {
        console.log("sql: %s", sql);
        console.log("params: ", params);
        this.db.each(sql,params, function (err, row) {
            if (err) {
                console.log('Error select sql: ');
                console.log(err);
                callback(err);
                return;
            }
            callback(err, row);
        },complite);
    }
}

module.exports.AppDAO = AppDAO;