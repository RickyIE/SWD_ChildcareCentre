var mysql = require('mysql');

var con = mysql.createConnection({
    host: "50.87.177.72",
    user: "meetalex_websiteRoot",
    password: "pXZOkNzt}hsIT2WAH+1X*(HGo",
    database: "meetalex_ChildcareDatabse"
});

con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM testimonial_panels", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
    });
});