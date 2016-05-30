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
    var vertical =  d3.select("#layout")
        .append("div")
        .attr("id","stream")
        .style("position", "absolute")
        .style("z-index", "19")
        .style("width", "1px")
        .style("max-width", "1000px")
        .style("height", height)
        .style("top", "60px")
        .style("bottom", "-180px")
        .style("left", "0px")
        .style("background", "#000");

    d3.select("#layout")
        .on("mousemove", function(){
            mousex = d3.mouse(this);
            mousex = mousex[0]+3;
            if (mousex >920) mousex = 920;
            vertical.style("left", mousex + "px" )
        })
        .on("mouseover", function(){
            mousex = d3.mouse(this);
            mousex = mousex[0];
            vertical.style("left", mousex + "px")});

    loadFromUrlParametersAndServer();
console.log(layoutId)
    if (layoutId=="wt")
        trendsFile = "../data/trends_wt.csv";
    else if (layoutId=="nih")
        trendsFile = "../data/trends_nih.csv";
    else if (layoutId=="fp7")
        trendsFile = "../data/trends_fp7.csv";
    else
        trendsFile = "../data/trends_funder.csv";
    topicsFile = "../data/topicsopen.json";             // needed for the trend visualization

    // if all topics json files don't exist then we need to make a server call else we get them from the json file immediately
    topicsFileExist  = UrlExists(topicsFile);
    if (!topicsFileExist) {
        ajaxTopicsCall(experiment);
    }
    // gia to parapanw den ekana elegxo se periptwsi pou to ajax to panw teleiwnei deutero kai oxi prwto


    // if all trends csv files don't exist then we need to make a server call else we get them from the csv file immediately
    trendsFileExist  = UrlExists(trendsFile);
    if (!trendsFileExist) {
        $.getJSON(trendsFile, function(data) {
            trends = data;
            dothework(trends);
        });
        createTrends();
    }
    else {
        createTrends();
    }


    function createTrends(){
        //      d3.csv("data/comminicationACM_pivot_1990-2011.csv", function (error, data) {
console.log(trendsFile)
        d3.csv(trendsFile, function (error, data) {
            d3.json(topicsFile, function(error,json) {
                var topicsjson;
                    topicsjson = json;

                var topickeys = d3.keys(topicsjson);
                var topicvalues = d3.values(topicsjson);
                var topicwords;
                var title;

                var labelVar = 'quarter';

                var varNames = [];

                var topicids = "";
                var listOfTopicIds = [];
                if((topicids = getUrlParameter('topics')) == null){
                    varNames = d3.keys(data[0])
                        .filter(function (key) {
                            //todo check why not them 159 and 271 and 396
                            if (key==159 || key==271 || key==396) return 0;
                            return key !== labelVar;
                        });
                    console.log(varNames);
                }
                else{
                    varNames = topicids.split(',');
                    varNames.pop(); //remove last "," element
                }
//                console.log(topicids)
//                console.log(varNames)

                var topics = [];
                var topic_hash = [];

                var index = 0;

                topickeys.forEach(function(d) {
                    topicwords = "";
                    title = "";
                    if (topicvalues[d].TopicId != undefined){
                        if (include(varNames, JSON.stringify(topicvalues[d].TopicId))) {
                            topic_hash.push(String(topicvalues[d].TopicId));
//console.log(topic_hash)
                            topics.push({index:index, id:topicvalues[d].TopicId, title:topicvalues[d].Title});
                            index++;
                        }
                    }
                });

                color.domain(varNames);


                if (layoutType == "stream"){
                    stackChart(data, "wiggle");
                }
                else if (layoutType == "line") {
                    lineChart(data);
                }
                else if (layoutType == "area") {
                    stackChart(data, "zero");
                }


                function lineChart(data) {
                    var line = d3.svg.line()
                        .interpolate("cardinal")
                        .x(function (d) {
                            return x(d.label) + x.rangeBand() / 2;
                        })
                        .y(function (d) {
                            return y(d.value);
                        });


                    var seriesData = varNames.map(function (name) {
                        return {
                            name: name,
                            values: data.map(function (d) {
                                return {name: name, label: d[labelVar], value: +d[name]};
                            })
                        };
                    });


                    x.domain(data.map(function (d) { return d.quarter; }));
                    y.domain([
                        d3.min(seriesData, function (c) {
                            return d3.min(c.values, function (d) { return d.value; });
                        }),
                        d3.max(seriesData, function (c) {
                            return d3.max(c.values, function (d) { return d.value; });
                        })
                    ]);

                    drawAxis();

                    var series = svg.selectAll(".series")
                        .data(seriesData)
                        .enter().append("g")
                        .attr("id", function (d,i) { return "series_"+i })
                        .attr("class", "series")
//                        .on("click", function (d) { clickPopover.call(this, d); });

                    series.append("path")
                        .attr("class", "line")
                        .attr("d", function (d) { return line(d.values); })
                        .attr("id", function (d,i) { return "streamPath"+i })
                        .style("stroke", function (d) { return color(d.name); })
                        .style("stroke-width", "4px")
                        .style("fill", "none");

                    series.selectAll(".linePoint")
                        .data(function (d) { return d.values; })
                        .enter().append("circle")
                        .attr("class", "linePoint")
                        .attr("cx", function (d) { return x(d.label) + x.rangeBand()/2; })
                        .attr("cy", function (d) { return y(d.value); })
                        .attr("r", "3px")
                        .style("fill", function (d) { return color(d.name); })
                        .style("stroke", "grey")
                        .style("stroke-width", "1px")
                        .on("mouseover", function (d) { showPopover.call(this, d); })
                        .on("mouseout",  function (d) { removePopovers(); })
//                        .on("click", function (d) { clickPopover.call(this, d); });

                    drawAxis();
                    drawLegend(varNames,topic_hash);

                }


                function stackChart(data, offset) {
                    var stack = d3.layout.stack()
                        .offset(offset)
                        .values(function (d) { return d.values; })
                        .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
                        .y(function (d) { return d.value; });

                    var area = d3.svg.area()
                        .interpolate("cardinal")
                        .x(function (d) { return x(d.label) + x.rangeBand() / 2; })
                        .y0(function (d) { return y(d.y0); })
                        .y1(function (d) { return y(d.y0 + d.y); });

                    var seriesArr = [], series = {};
                    varNames.forEach(function (name) {
                        series[name] = {name: name, values:[]};
                        seriesArr.push(series[name]);
                    });

                    data.forEach(function (d) {
                        varNames.map(function (name) {
                            series[name].values.push({name: name, label: d[labelVar], value: +d[name]});
                        });
                    });

                    x.domain(data.map(function (d) { return d.quarter; }));

                    stack(seriesArr.reverse());

                    y.domain([0, d3.max(seriesArr, function (c) {
                        return d3.max(c.values, function (d) { return d.y0 + d.y; });
                    })]);


                    var selection = svg.selectAll(".series")
                        .data(seriesArr.reverse())
                        .enter()
                        .append("g")
                        .attr("id", function (d,i) { return "series_"+i })
                        .attr("class", "series")
                        .style("cursor","pointer")
//                        .on("click", function (d) { clickPopover.call(this, d); });

                    selection.append("path")
                        .attr("class", "streamPath")
                        .attr("d", function (d) { return area(d.values); })
                        .attr("id", function (d,i) { return "streamPath"+i })
                        .style("fill", function (d) { return color(d.name); })
                        .style("stroke", "grey");

                    var points = svg.selectAll(".seriesPoints")
                        .data(seriesArr)
                        .enter().append("g")
                        .attr("class", "seriesPoints");

                    points.selectAll(".point")
                        .data(function (d) { return d.values; })
                        .enter().append("circle")
                        .attr("class", "point")
                        .attr("cx", function (d) { return x(d.label) + x.rangeBand() / 2; })
                        .attr("cy", function (d) { return y(d.y0 + d.y); })
                        .attr("r", "10px")
                        .style("cursor","pointer")
                        .style("fill",function (d) { return color(d.name); })
                        .on("mouseover", function (d) { showPopover.call(this, d); })
                        .on("mouseout",  function (d) { removePopovers(); })
//                        .on("click", function (d) { clickPopover.call(this, d); });


                    drawAxis();
                    drawLegend(varNames,topic_hash);

                    $(".y").find(".tick").find("text").hide();

                }

                function drawLegend (varNames,topic_hash) {
                    var legend = svg.selectAll(".legend")
                        .data(varNames)
                        .enter().append("g")
                        .attr("id", function (d,i) { return "trendlegend_"+i })
                        .style("cursor","pointer")
                        .attr("class", "legend")
                        .attr("transform", function (d, i) { return "translate(55," + i * 20 + ")"; })
//                        .on("click", function (d) { clickPopover.call(this, d); });

                    legend.append("rect")
                        .attr("x", width-30)    // gia na mpoun aristera
                        .attr("width", 10)
                        .attr("height", 10)
                        .style("fill", color)
                        .style("stroke", "grey");

                    legend.append("text")
                        .attr("x", width-10)
                        .attr("y", 6)
                        .attr("dy", ".35em")
                        //.append("textpath") // using "end", the entire text disappears
                        .style("text-anchor", "start")
                        .text(function (d) {
//                            console.log("-- "+topic_hash.indexOf(d))
//                            return topics[topic_hash.indexOf(d)].index+". "+topics[topic_hash.indexOf(d)].title;
                            return topics[topic_hash.indexOf(d)].title;
                        });
                }

                function drawAxis() {

                    svg.append("g")
                        .attr("class", "x axis")
                        .attr("transform", "translate(0," + height + ")")
                        .call(xAxis);

                    svg.append("g")
                        .attr("class", "y axis")
                        .call(yAxis)
                        .append("text")
                        .attr("transform", "rotate(-90)")
                        .attr("y", 6)
                        .attr("dy", ".71em")
                        .style("text-anchor", "end")
                        .text("Weight");
                }

                function removePopovers () {
                    $('.popover').each(function() {
                        $(this).remove();
                    });
                }

                function showPopover (d) {

                    var tit = 0;
                    topics.filter(function(o){
                        if(d.name==o.id){tit=o.index+"."+o.title;}});
                    $(this).popover({
                        title: tit,
                        placement: 'auto top',
                        container: 'body',
                        trigger: 'manual',
                        html : true,
                        content: function() {
                            return "Year: " + d.label +
                                "<br/>Width: " + d3.format(",")(d.value ? d.value: d.y1 - d.y0); }//ektupwnei to width
                    });
                    $(this).popover('show')
                }

                function trendReset(){
                    $(".series").each(function () {
                        $(this).attr("class", "series");
                    });

                    $(".legend").each(function () {
                        $(this).attr("class", "legend");
                    });
                }

                function clickPopover (d) {
                    var tit = 0;
                    var titindex = 0;
                    var titname = 0;
                    var elementid;
                    topics.filter(function (o, i) {
                        if ($.isNumeric(d)) {           // if legend was clicked
                            elementid = d;
                        }
                        else {                           // if legend was clicked
                            elementid = d.name;

                        }
                        if (elementid == o.id) {

                            tit = o.index + "." + o.name;
                            titname = o.name;
                            titindex = o.index;

                            if ($("#series_" + i).attr("class") == "series active_trend") {
                                $("#series_" + i).attr("class", "series inactive_trend");
                                $("#trendlegend_" + i).attr("class", "legend inactive_trend");
                                if ($(".active_trend").length == 0) {
                                    $(".inactive_trend").each(function () {
                                        if ($(this).attr("class") == "series inactive_trend")
                                            $(this).attr("class", "series");
                                        else
                                            $(this).attr("class", "legend");
                                    });
                                    trendReset();
                                }
                            }
                            else {
                                $("#series_" + i).attr("class", "series active_trend");
                                $("#trendlegend_" + i).attr("class", "legend active_trend");

                                if ($(".active_trend").length == 2) {       //ena gia to series kai ena gia to trendlegend
                                    $(".series").each(function () {
                                        $(this).attr("class", "series inactive_trend");
                                    });
                                    $(".legend").each(function () {
                                        $(this).attr("class", "legend inactive_trend");
                                    });

                                    $("#series_" + i).attr("class", "series active_trend");
                                    $("#trendlegend_" + i).attr("class", "legend active_trend");

                                }
                            }
                        }
                    });

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

        if((layoutType = getUrlParameter('type')) == null){
            layoutType = '<?php echo $layoutType ;?>';
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
            data: "ex=" + experiment + "&layoutid=" + layoutId,
            success: function (resp) {
                jsonTrendsLayout = JSON.parse(resp);
                trends = jsonTrendsLayout.trends;
                dothework(trends);
                createTrends();
            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

    function dothework(response) {
        //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
        var result = pivot(response, ['BatchId'], ['TopicId'], {});
        var line;
        line = "quarter";
        for (var k = 0; k < result.columnHeaders.length; k++) {
            line += "," + result.columnHeaders[k][0];
//        console.log(result.columnHeaders[k][0])
//            columns.push(parseInt(result.columnHeaders[k]));
        }

        for (var i = 0; i < result.rowHeaders.length; i++) {
            line += "\n" + result.rowHeaders[i];
            for (var j = 0; j < result.columnHeaders.length; j++) {

//                console.log(a)
                if (result[i][j] !== undefined){
                    var a = result[i][j][0].Weight;
                    line += "," + a;
                }
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