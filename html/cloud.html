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
<!--<div class="col-md-2" id="topics"></div>-->
<!--<div class="col-md-7" id="layout"></div>-->
<script type="text/javascript" src="../../../js/d3.js"></script>
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/bootstrap.js"></script>
<script type="text/javascript" src="../../../js/jp.js"></script>
<script type="text/javascript" src="../../../js/d3-cloud/build/d3.layout.cloud.js"></script>

<script>
    var layoutId, layoutType, experiment,
        jsonTopicsLayout, topics, topicsNoSort, topicsSort, topicsFile, topicsFileExist,
        jsonTrendsLayout, trends, cloudFile, cloudFileExist;


    var columns =[]; ///todo maybe not needed


    var margin = {top: 20, right: 55, bottom: 30, left: 40},
        width  = $(window).width()*2/3 - margin.left - margin.right,
        height = $(window).height()  - margin.top  - margin.bottom;

    var x = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

    var y = d3.scale.linear()
        .rangeRound([height, 0]);

    var xAxis = d3.svg.axis()
        .scale(x)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left");

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
    var clr2 = d3.scale.category20b().range();  //to be appended in the first clr (20 more colors)
    $.merge(clr, clr2);                 // add second array's elements to first
    var clr3 = d3.scale.category20c().range();  //to be appended in the first clr (20 more colors)
    $.merge(clr, clr3);                 // add second array's elements to first


    var color = d3.scale.ordinal().range(clr);

    var svg = d3.select("#layout").append("svg")
        .attr("width",  width  + margin.left + margin.right + 400) // gia na xwrane ta topic word bags
        .attr("height", height + margin.top  + margin.bottom + 400) // gia na xwrane ta top 50 topic words
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    var mousex;

    loadFromUrlParametersAndServer();

    cloudFile = "../data/"+layoutId+".csv";
    topicsFile = "../data/topics.json";             // needed for the trend visualization

    // if all topics json files don't exist then we need to make a server call else we get them from the json file immediately
    topicsFileExist  = UrlExists(topicsFile);
    if (!topicsFileExist) {
        ajaxTopicsCall(experiment);
    }
    // gia to parapanw den ekana elegxo se periptwsi pou to ajax to panw teleiwnei deutero kai oxi prwto


    // if all trends csv files don't exist then we need to make a server call else we get them from the csv file immediately
    cloudFileExist  = UrlExists(cloudFile);
    if (!cloudFileExist) {
        ajaxTrendsCall(experiment);
    }
    else {
        createCloud();
    }


    function createCloud(){
        //      d3.csv("data/comminicationACM_pivot_1990-2011.csv", function (error, data) {
        d3.csv(cloudFile, function (error, data) {
            d3.json(topicsFile, function(error,json) {



                var fill = d3.scale.category20();

                d3.layout.cloud().size([300, 300])
//                    .words([
//                        ".NET", "Silverlight", "jQuery", "CSS3", "HTML5", "JavaScript", "SQL","C#"].map(function(d) {
//                        return {text: d, size: 10 + Math.random() * 50};
//                    }))

                .words(
                        data.map(function(d,i) {
                        return {text: d.quarter, size: d.value};
                    }))
                    .rotate(function() { return ~~(Math.random() * 2) * 90; })
                    .font("Impact")
                    .fontSize(function(d) { return d.size; })
                    .on("end", draw)
                    .start();

                function draw(words) {
                    d3.select("body").append("svg")
                        .attr("width", 300)
                        .attr("height", 300)
                        .append("g")
                        .attr("transform", "translate(150,150)")
                        .selectAll("text")
                        .data(words)
                        .enter().append("text")
                        .style("font-size", function(d) { return d.size + "px"; })
                        .style("font-family", "Impact")
                        .style("fill", function(d, i) { return fill(i); })
                        .attr("text-anchor", "middle")
                        .attr("transform", function(d) {
                            return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                        })
                        .text(function(d) { return d.text; });
                }


            });
        });
    }



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
        var url = "./cloud.php";

        //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
        return $.ajax({
            type: "GET",
            async: true,
            url: url,
            data: "ex=" + experiment + "&id=" + layoutId,
            success: function (resp) {
                jsonTrendsLayout = JSON.parse(resp);
                trends = jsonTrendsLayout.trends;
                dothework(trends);
                createCloud();
            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

    function dothework(response) {
        //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
        var result = pivot(response, ['year'], ['id'], {});
        var line;
        line = "quarter,value";
//        for (var k = 0; k < result.columnHeaders.length; k++) {
//            line += ",_" + result.columnHeaders[k];
////            columns.push(parseInt(result.columnHeaders[k]));
//        }

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