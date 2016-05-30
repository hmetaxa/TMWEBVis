<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../../../css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            font: 9px sans-serif;
            color: #121401;
        }
        .axis path,
        .axis line {
            fill: none;
            stroke: #121401;
            stroke-width: 2px;
            shape-rendering: crispEdges;
        }
        .point {
            stroke: grey;
            stroke-width: 3px;
            opacity: 0;
        }
        .point:hover{
            opacity: .5;
        }
        .active_trend{
            opacity: 1;
        }
        .inactive_trend{
            opacity: .1;
        }
    </style>
</head>
<body>
<div class="col-md-2" id="topics"></div>
<div class="col-md-7" id="layout"></div>
<script type="text/javascript" src="../../../js/d3.js"></script>
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/bootstrap.js"></script>
<script type="text/javascript" src="../../../js/jp.js"></script>

<script>
    var layoutId, layoutType, experiment,
        jsonTopicsLayout, topics, topicsNoSort, topicsSort, topicsFile, topicsFileExist,
        jsonTrendsLayout, trends, trendsFile, trendsFileExist;

    var margin = {top: 20, right: 55, bottom: 30, left: 40},
        width  = 1000 - margin.left - margin.right,
        height = 700  - margin.top  - margin.bottom;

    var clr20 = d3.scale.category20().range(),
        clrEven = [],
        clrOdd = [];

    for (var i=0 ; i < clr20.length ; i++)
        if (i % 2) clrEven.push(clr20[i]);
        else clrOdd.push(clr20[i]);

    var clr= [];
    for (var i=0 ; i < clrEven.length ; i++){
        clr.push(clrEven[i]);
        clr.push(clrOdd[i])
    }
    var clr2 = d3.scale.category20b().range();	//to be appended in the first clr (20 more colors)
    $.merge(clr, clr2);					// add second array's elements to first
    var clr3 = d3.scale.category20c().range();	//to be appended in the first clr (20 more colors)
    $.merge(clr, clr3);					// add second array's elements to first


    var color = d3.scale.ordinal().range(clr);

    var svg = d3.select("#layout").append("svg")
        .attr("width",  width  + margin.left + margin.right + 400) // gia na xwrane ta topic word bags
        .attr("height", height + margin.top  + margin.bottom + 400) // gia na xwrane ta top 50 topic words
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var columns =[]; ///todo maybe not needed

    loadFromUrlParametersAndServer();

    trendsFile = "../data/"+layoutId+".csv";
    topicsFile = "../data/topics.json";             // needed for the trend visualization

    // if all topics json files don't exist then we need to make a server call else we get them from the json file immediately
    topicsFileExist  = UrlExists(topicsFile);
    if (!topicsFileExist) {
        ajaxTopicsCall(experiment);
    }

    // if all trends csv files don't exist then we need to make a server call else we get them from the csv file immediately
    trendsFileExist  = UrlExists(trendsFile);
    if (!trendsFileExist) {
        ajaxTrendsCall(experiment);
    }

    //      d3.csv("data/comminicationACM_pivot_1990-2011.csv", function (error, data) {
    d3.csv(trendsFile, function (error, data) {
        d3.json(topicsFile, function(error,json) {

            var topicsjson;
            if (topicsSort == "yes")
                topicsjson = json.topics;
            else
                topicsjson = json.topicsNoSort;

            var topickeys = d3.keys(topicsjson);
            var topicvalues = d3.values(topicsjson);
            var topicwords;
            var title;

            var labelVar = 'quarter';
            var varNames = d3.keys(data[0])
                .filter(function (key) {
                    //todo check why not them 159 and 271 and 396
                    if (key==159 || key==271 || key==396) return 0;
                    return key !== labelVar;
                });

            var topics = [];
            var topic_hash = [];

            var index = 0;

            topickeys.forEach(function(d) {
                topicwords = "";
                title = "";

                if (topicvalues[d] != undefined){
                    if (topicvalues[d].length == 10  && include(varNames, d)) {
                        topic_hash.push(d);

                        topicvalues[d].forEach(function(o) {
                            if (title == ""){
                                topicwords += o.item;
                                title = o.title;
                            }
                            else{
                                topicwords += ", "+o.item;
                            }
                        });
                        topics.push({index:index, id:d, topicwords:topicwords, title:title});
                        index++;
                    }
                }
//                      else{       //remove element from array
//                          var elem = varNames.indexOf(d);
//                          if (elem > -1) {
//                              varNames.splice(elem, 1);
//                          }
//                      }
            })


                drawLegend(varNames,topic_hash);

            function drawLegend (varNames,topic_hash) {
                var legend = svg.selectAll(".legend")
                    .data(varNames)
                    .enter().append("g")
                    .attr("id", function (d,i) { return "trendlegend_"+i })
                    .style("cursor","pointer")
                    .attr("class", "legend")
                    .attr("transform", function (d, i) { return "translate(55," + i * 20 + ")"; })
                    .on("click", function (d) { clickPopover.call(this, d); });

                legend.append("rect")
                    .attr("x", 0)    // gia na mpoun aristera
                    .attr("width", 10)
                    .attr("height", 10)
                    .style("fill", color)
                    .style("stroke", "grey");

                legend.append("text")
                    .attr("x", 20)
                    .attr("y", 6)
                    .attr("dy", ".35em")
                    //.append("textpath") // using "end", the entire text disappears
                    .style("text-anchor", "start")
                    .text(function (d) {
                        console.log("-- "+topic_hash.indexOf(d))
                        return topics[topic_hash.indexOf(d)].index+". "+topics[topic_hash.indexOf(d)].title;
                    });

                legend.append("text")
                    .attr("x", 20)
                    .attr("y", 6)
                    .attr("dy", ".35em")
                    //.append("textpath") // using "end", the entire text disappears
                    .style("visibility", "hidden")
                    .text(function (d) {
                        console.log("-- "+topic_hash.indexOf(d))
                        return topics[topic_hash.indexOf(d)].index+". "+topics[topic_hash.indexOf(d)].topicwords;
                    });
            }
        });
    });


    /* function returns 1 if an array contains an object or 0 if not */
    function include(arr, obj) {
        return (arr.indexOf(obj) != -1);
    }

    function loadFromUrlParametersAndServer(){
//                $set_elems = array("00010782","01635948","00045411","01635808","03621340","00978930");

        if((experiment = getUrlParameter('ex')) == null){
            experiment = '<?php echo $experimentName ;?>';
        }

        if((layoutId = getUrlParameter('id')) == null){         //default
            layoutId = '<?php echo $layoutId ;?>';
        }

        if((layoutType = getUrlParameter('type')) == null){
            layoutType = '<?php echo $layoutType ;?>';
        }

        if((topicsSort = getUrlParameter('sort')) == null){
            topicsSort = '<?php echo $topicsSort ;?>';
        }
    }

    function getUrlParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }


    function ajaxTopicsCall(experiment) {
        console.log("ajaxCall for topics layout: " + experiment);
        var url = "./topics.php";


        //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
        return $.ajax({
            type: "GET",
            async: true,
            url: url,
            data: "ex=" + experiment,
            success: function (resp) {
                jsonTopicsLayout = JSON.parse(resp);
                topics = jsonTopicsLayout.topics;
                topicsNoSort = jsonTopicsLayout.topicsNoSort;
            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

    function ajaxTrendsCall(experiment) {
        console.log("ajaxCall for trend layout: " + experiment);
        var url = "./trends.php";

        //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
        return $.ajax({
            type: "GET",
            async: true,
            url: url,
            data: "ex=" + experiment,
            success: function (resp) {
                jsonTrendsLayout = JSON.parse(resp);
                trends = jsonTrendsLayout.trends;
                dothework(trends);
            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

    function dothework(response) {
        //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
        var result = pivot(response[0], ['year'], ['id'], {});
        var line;
        line = "quarter";
        for (var k = 0; k < result.columnHeaders.length; k++) {
            line += "," + result.columnHeaders[k];
//            columns.push(parseInt(result.columnHeaders[k]));
        }

        for (var i = 0; i < result.rowHeaders.length; i++) {
            line += "\n" + result.rowHeaders[i];
            for (var j = 0; j < result.columnHeaders.length; j++) {

                if (result[i][j] !== undefined)
                    line += "," + result[i][j][0].weight;
                else
                    line += ",0"
            }
        }
        console.log(line)

        $.ajax({
            type: "POST",
            async: true,
            url: "./fileCreator.php",
            dataType: 'text',		// this is json if we put it like this JSON object
            data: {
                /*        json : JSON.stringify(jsonObject) /* convert here only */
                func: "csv",
                csv: line,
                id: layoutId      // id for distinguishing trends
            },
            success: function () {
                console.log("CSV file Created")
            },
            error: function (e) {
                console.log("Error in file Creation:" + e);
            }
        })
    }

    function UrlExists(url) {
        var http = new XMLHttpRequest();
        http.open('HEAD', url, false);
        http.send();
        return http.status != 404;
    }

</script>
</body>
</html>