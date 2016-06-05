var sqlite3 = require('sqlite3').verbose();
var db = new sqlite3.Database('/data/PTMDB_ACM2016.db');
// var db = new sqlite3.Database('/Users/nmpegetis/Sites/astero.di.uoa.gr/graphs/dbs/new/PTMDB_ACM2016.db');
// var db = new sqlite3.Database('/data/PTM3DB_oct15.db');
var queries = require("./config.js");


// db.serialize(function() {
//     db.run("CREATE TABLE IF NOT EXISTS counts (key TEXT, value INTEGER)");
//     db.run("INSERT INTO counts (key, value) VALUES (?, ?)", "counter", 0);
// });

var express = require('express');
var restapi = express();

restapi.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
});

restapi.get('/getExperiments', function (req, res) {
    // var query = "select distinct * from experiment";
    var query = queries.experiments;
    var data = [];

    console.log("query: "+query);
    var rowset = db.all(query, function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push({
                "id": row[i].experimentId,
                "desc": row[i].description,
                "Metadata": row[i].metadata,
                "initialSimilarity": row[i].initialSimilarity,
                "PhraseBoost": row[i].phraseBoost
            })
        }
        res.json({"response": data})
    });
});


restapi.get('/getConnections', function (req, res) {
    if (!req.query.ex || !req.query.s) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1 = req.query.ex;  // ACM_400T_800IT_6000CHRs_150_10PRN100B_3M_4TH_cos, ACM_400T_1000IT_0IIT_100B_3M_cos
    var param2 = req.query.s;
    var query = "";

    query = queries.graphLayout;

    console.log("query: "+query);
    var rowset = db.all(query, [param1, param2], function (err, row) {
        // data.push(row)
        for (var i = 0; i < row.length; i++) {
            data.push(row[i])
        }
        res.json({"response": data})
    });
});


restapi.get('/getNodes', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param = req.query.ex;
    var query = "";

    query = queries.nodes;

    //PHP CODE
    // do {
    //     if (!isset($nodes[$res[0]]))
    //         $nodes[$res[0]] = array();
    //     if (count($nodes[$res[0]]) > 3)
    //         continue;
    //     array_push($nodes[$res[0]], array("topic" => $res[1], "weight" => $res[2]));
    // } while ($res = $stmt->fetch());


    console.log("query: "+query);
    var rowset = db.all(query, [param], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i])
        }
        res.json({"response": data})
    });
});


restapi.get('/getTopics', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }
    
    var data = [];
    var param1;
    var param2 = req.query.ex;
    var query = "";

    if (!req.query.id) {
        res.json({"error": "Missing arguments"});
        return;
    }
    else {
        param1 = req.query.id;
        if (param1 == "all")
            param1 = undefined;
    }

    query = queries.topics;

    var ids;
    var notfirst = false;
    if (param1 !== undefined){
        ids = param1.split(",");

        query += " and (";
        for (var i in ids) {
            if (notfirst)
                query += " or ";
            query += "tanal.TopicId='" + ids[i] + "' ";
            notfirst = true;
        }
        query += ")";
    }

    query += " ORDER BY tdes.TopicID ASC, Counts DESC";

    console.log("query: "+query);
    var rowset = db.all(query, [param2], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
        }
        res.json({"response": data})
    });
});


restapi.get('/getCloud', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1;
    var param2 = req.query.ex;
    var query = "";

    if (!req.query.id) {
        res.json({"error": "Missing arguments"});
        return;
    }
    else {
        param1 = req.query.id;
        if (param1 == "all")
            param1 = undefined;
    }

    query = queries.cloud;

    var ids;
    var notfirst = false;
    if (param1) {
        ids = param1.split(",");

        query += " and (";
        for (var i in ids) {
            if (notfirst)
                query += " or ";
            query += "tanal.TopicId=" + ids[i] + " ";
            notfirst = true;
        }
        query += ")";
    }

    // sto cloud mallon den xreiazetai to parakatw
    // query += " ORDER BY tdes.TopicID ASC, Counts DESC";

    console.log("query: "+query);
    var rowset = db.all(query, [param2], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
        }
        res.json({"response": data})
    });
});


restapi.get('/getTrends', function (req, res) {
    if (!req.query.ex || !req.query.set) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1;
    var param2 = req.query.ex;
    var param3 = req.query.set;
    var query = "";

    if (req.query.id) {
        param1 = req.query.id;
        if (param1 == "all")
            param1 = undefined;
    }

    if (param3.toLowerCase() == "journal") {
        if (!req.query.id) {
            res.json({"error": "Missing arguments"});
            return;
        }
        query = queries.journal;
    }
    else if (param3.toLowerCase() == "conference"){
        if (!req.query.id) {
            res.json({"error": "Missing arguments"});
            return;
        }
        query = queries.conference;
    }
    else if (param3.toLowerCase() == "corpus"){
        query = queries.corpus;
    }

    var ids;
    var notfirst = false;
    if (param1 !== undefined){
        ids = param1.split(",");

        query += " and (";
        for (var i in ids) {
            if (notfirst)
                query += " or ";
            query += "EntityId='" + ids[i] + "' ";
            notfirst = true;
        }
        query += ")";
    }

    query += " ORDER BY EntityTopicDistribution.TopicId";

    console.log("query: "+query);
    var rowset = db.all(query, [param2], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
        }
        res.json({"response": data})
    });
});


restapi.get('/getSpider', function (req, res) {
    if (!req.query.ex || !req.query.set) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1;
    var param2 = req.query.ex;
    var param3 = req.query.set;
    var param4;
    var query = "";

    if (!req.query.id) {
        res.json({"error": "Missing arguments"});
        return;
    }
    else {
        param1 = req.query.id;
    }

    var ids;
    var notfirst = false;

    if (param3.toLowerCase() == "topics") {
        query = queries.authortopics;

        if (param1 !== undefined){
            ids = param1.split(",");

            query += " and (";
            for (var i in ids) {
                if (notfirst)
                    query += " or ";
                query += "EntityId='" + ids[i] + "' ";
                notfirst = true;
            }
            query += ")";
        }

        query += " ORDER BY entityTopicDistribution.EntityId, entityTopicDistribution.TopicId";

        console.log("query: "+query);
        var rowset = db.all(query, [param2], function (err, row) {
            for (var i = 0; i < row.length; i++) {
                // data.push(row[i]);
                data.push({
                    "center": row[i].center + " " + row[i].centerLast,
                    "spider": row[i].spider,
                    "weight": row[i].weight,
                    "centerid": row[i].centerid,
                    "spiderids": row[i].spiderids
                });
            }
            res.json({"response": data})
        });
    }
    else if (param3.toLowerCase() == "authors"){

        query = queries.similarauthorsPart1;

        if (!req.query.s) {
            param4 = 0.9;
        }
        else {
            param4 = req.query.s;
        }

        if (param1 !== undefined){
            ids = param1.split(",");

            query += " and (";
            for (var i in ids) {
                if (notfirst)
                    query += " or ";
                query += "EntityId1=" + ids[i] + " ";
                notfirst = true;
            }
            query += ")";
        }

        query += " Union ";
        query += queries.similarauthorsPart2;

        notfirst = false;

        if (param1 !== undefined){
            ids = param1.split(",");

            query += " and (";
            for (var i in ids) {
                if (notfirst)
                    query += " or ";
                query += "EntityId2=" + ids[i] + " ";
                notfirst = true;
            }
            query += ")";
        }

        console.log("query: "+query);
        var rowset = db.all(query, [param2,param4,param2,param4], function (err, row) {
            for (var i = 0; i < row.length; i++) {
                data.push(row[i]);
            }
            res.json({"response": data})
        });
    }
});


restapi.get('/getEntitiesList', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1 = req.query.ex;
    var query = queries.entitiesList;

    console.log("query: "+query);
    var rowset = db.all(query, [param1], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push({
                "id": row[i].id,
                "name": row[i].name + " " + row[i].middleName + " " + row[i].lastName + " (" +row[i].affiliation + ")",
                "description": row[i].name + " " + row[i].middleName + " " + row[i].lastName + " (" +row[i].affiliation + ")"
            });
        }
        res.json({"response": data})
    });
});


restapi.get('/getConferencesList', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1 = req.query.ex;
    var query = queries.conferencesList;

    console.log("query: "+query);
    var rowset = db.all(query, [param1], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
        }
        res.json({"response": data})
    });
});


restapi.get('/getJournalsList', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1 = req.query.ex;
    var query = queries.journalsList;

    console.log("query: "+query);
    var rowset = db.all(query, [param1], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
        }
        res.json({"response": data})
    });
});


restapi.get('/getTopicsList', function (req, res) {
    if (!req.query.ex) {
        res.json({"error": "Missing arguments"});
        return;
    }

    var data = [];
    var param1 = req.query.ex;
    var query = queries.topicsList;

    console.log("query: "+query);
    var rowset = db.all(query, [param1], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
        }
        res.json({"response": data})
    });
});

// Submit GET or POST to http://localhost:3001/{webServiceName}
restapi.listen(3001);
