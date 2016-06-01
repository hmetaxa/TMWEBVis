var sqlite3 = require('sqlite3').verbose();
// var db = new sqlite3.Database('/data/PTMDB_ACM2016.db');
var db = new sqlite3.Database('/Users/nmpegetis/Sites/astero.di.uoa.gr/graphs/dbs/new/PTMDB_ACM2016.db');
// var db = new sqlite3.Database('/data/PTM3DB_oct15.db');

// db.serialize(function() {
//     db.run("CREATE TABLE IF NOT EXISTS counts (key TEXT, value INTEGER)");
//     db.run("INSERT INTO counts (key, value) VALUES (?, ?)", "counter", 0);
// });

var express = require('express');
var restapi = express();

restapi.get('/getExperiments', function (req, res) {
    var query = "select distinct * from experiment";
    var data = [];

    var rowset = db.all(query, function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push({
                "id": row[i].ExperimentId,
                "desc": row[i].Description,
                "Metadata": row[i].Metadata,
                "initialSimilarity": row[i].InitialSimilarity,
                "PhraseBoost": row[i].PhraseBoost
            })
        }
        res.json({"response": data})
    });
});

//todo na balw eswterika an den sumplirwthoun oi paramentroi na petaei error
restapi.get('/getConnections', function (req, res) {
    var data = [];
    var param1 = req.query.ex;  // ACM_400T_800IT_6000CHRs_150_10PRN100B_3M_4TH_cos, ACM_400T_1000IT_0IIT_100B_3M_cos
    var param2 = req.query.s;
    var param3 = req.query.sample;
    var query = "";
//todo na balw elegxo gia ta parapanw gia minuma lathous
    if (param3 == "acm")
    // query = "select EntityId1 as node1id, EntityId2 as node2id, Author1 as node1name, Author2 as node2name, AC1_Category0 as category1_1, AC1_Category0 as category1_2, AC1_Category0 as category1_3, AC2_Category0 as category2_1, AC2_Category0 as category2_2, AC2_Category0 as category2_3, catCnts1 as category1_counts, catCnts2 as category2_counts, Similarity from EntitySimilarity where ExperimentId=? and  Similarity>?";
        query = "select * from EntitySimilarity where ExperimentId=? and  Similarity>?";
    else
        query = "select * from mygraph";

    var rowset = db.all(query, [param1, param2], function (err, row) {

        // data.push(row)
        for (var i = 0; i < row.length; i++) {
            data.push(row[i])
            // data.push({"id" : row[i].ExperimentId, "desc":row[i].Description, "Metadata":row[i].Metadata, "initialSimilarity":row[i].InitialSimilarity, "PhraseBoost":row[i].PhraseBoost})
        }
        res.json({"response": data})
    });
});


restapi.get('/getNodes', function (req, res) {
    var data = [];
    var param = req.query.ex;
    var param2 = req.query.sample;
    var query = "";

    if (param2 == "acm")
    // query = "select authorid, ta.topicid, Standard as weight from topicdistributionperauthor as ta,TopicDescription as td where ta.topicId=td.topicid and ExperimentId=? order by authorid, ta.TopicId";
        query = "SELECT Entityid AS AuthorID, entityTopicDistribution.topicid, normweight as weight FROM entityTopicDistribution INNER JOIN TopicDescription ON entityTopicDistribution.topicId = TopicDescription.topicid AND entityTopicDistribution.ExperimentId = TopicDescription.ExperimentId WHERE entityTopicDistribution.ExperimentId = ? AND BatchID = '' AND EntityType = 'Author' ORDER BY authorid, entityTopicDistribution.TopicId";
    else
        query = "select project_code, TopicId, weight from mynodes where ExperimentId=?";

    //PHP CODE
    // do {
    //     if (!isset($nodes[$res[0]]))
    //         $nodes[$res[0]] = array();
    //     if (count($nodes[$res[0]]) > 3)
    //         continue;
    //     array_push($nodes[$res[0]], array("topic" => $res[1], "weight" => $res[2]));
    // } while ($res = $stmt->fetch());


    var rowset = db.all(query, [param], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i])
            // data.push({"id" : row[i].ExperimentId, "desc":row[i].Description, "Metadata":row[i].Metadata, "initialSimilarity":row[i].InitialSimilarity, "PhraseBoost":row[i].PhraseBoost})
        }
        res.json({"response": data})
    });
});


restapi.get('/getTopics', function (req, res) {
    var data = [];
    var param1 = req.query.id;
    var param2 = req.query.ex;
    var param3 = req.query.sort;
    var param4 = req.query.sample;
    var query = "";

    if (param4 == "acm") {
        if (param3)
            // query = "select TopicId, title, Item, WeightedCounts, ExperimentId from topicsweightsort as tw where ExperimentId=?";
            query = "SELECT tdes.TopicId, tanal.Item, tdet.Weight, tdes.title, tanal.counts, tanal.ItemType FROM topicdescription as tdes INNER JOIN topicdetails as tdet ON tdes.topicid = tdet.topicid AND tdes.ExperimentId = tdet.ExperimentId AND tdes.VisibilityIndex = 2 INNER JOIN topicanalysis as tanal ON tdes.topicid = tanal.topicid AND tdes.ExperimentId = tanal.ExperimentId WHERE tdes.ExperimentId = ? ";
        else
            query = "select TopicId, title, Item, WeightedCounts, ExperimentId from topicsweightnosort as tw where ExperimentId=?";
    }
    else {
        if (param3)
            query = "select TopicId, title, Item, WeightedCounts, ExperimentId from topicsweightsort as tw where ExperimentId=?";
        else
            query = "select TopicId, title, Item, WeightedCounts, ExperimentId from topicsweightnosort as tw where ExperimentId=?";
    }

    var ids = param1.split(",");
    var notfirst = false;
    if (param1)
        query += " and (";

    for (var id in ids) {
        if (notfirst)
            query += " or ";
        query += "tw.TopicId='" + id + "'  ";
        notfirst = true;
    }
    if (param1)
        query += ") ORDER BY tdes.TopicID ASC, Counts DESC";


    var rowset = db.all(query, [param2], function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
            // data.push({"id" : row[i].ExperimentId, "desc":row[i].Description, "Metadata":row[i].Metadata, "initialSimilarity":row[i].InitialSimilarity, "PhraseBoost":row[i].PhraseBoost})
        }
        res.json({"response": data})
    });
});

restapi.get('/getCloud', function (req, res) {
    var data = [];
    var param1 = req.query.id;
    var param3 = req.query.sample;
    var query = "";


    var ids = param1.split(",");
    var notfirst = false;

    if (param3 == "acm") {
        // query = "select Title, Item, WeightedCounts, TopicId from topicsweightsort as tw where ";
        query = "SELECT tdes.title, tanal.Item, tanal.Counts, tdes.TopicId FROM topicdescription as tdes INNER JOIN topicanalysis as tanal ON tdes.topicid = tanal.topicid AND tdes.ExperimentId = tanal.ExperimentId AND tdes.VisibilityIndex = 2 WHERE tdes.ExperimentId = ? and ";
        for (var id in ids) {
            if (notfirst)
                query += " or ";
            query += "tw.TopicId='" + id + "'  ";
            notfirst = true;
        }
    }
    else {
        query = "select Title, Item, WeightedCounts, TopicId from topicsweightsort as tw where ";
        for (var id in ids) {
            if (notfirst)
                query += " or ";
            query += "tw.TopicId='" + id + "'  ";
            notfirst = true;
        }
    }

    var rowset = db.all(query, function (err, row) {
        for (var i = 0; i < row.length; i++) {
            data.push(row[i]);
            // data.push({"id" : row[i].ExperimentId, "desc":row[i].Description, "Metadata":row[i].Metadata, "initialSimilarity":row[i].InitialSimilarity, "PhraseBoost":row[i].PhraseBoost})
        }
        res.json({"response": data})
    });
});


// restapi.get('/getExperiments', function(req, res){
//     var query = "select distinct ExperimentId,Description from experiment";
//
//     db.get(query, function(err, row){
//         res.json(row);
//     });
// });

// restapi.get('/getExperiments', function(req, res){
//     db.get("SELECT * FROM experiment", function(err, row){
//         res.json({ "count" : row });
//     });
// });

restapi.listen(3001);

// console.log("Submit GET or POST to http://localhost:3001/data");