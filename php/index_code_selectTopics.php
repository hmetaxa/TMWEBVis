<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../../../css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/prettify.css" />
    <link rel="stylesheet" href="../../../css/stylemultiselect.css" />
</head>
<body>
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Select Topics</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right btn-success" >
                    <li id="li1" style="margin:5px"><a style="color:white" href="#" >All funders</a></li>
                    <li id="li2" style="margin:5px"><a style="color:white" href="#" >WT</a></li>
                    <li id="li3" style="margin:5px"><a style="color:white" href="#" >FP7</a></li>
                    <li id="li4" style="margin:5px"><a style="color:white" href="#" >NIH</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-xs-5" id="from" style="padding-top: 70px">
        <select name="from[]" id="undo_redo" class="form-control" size="30" multiple="multiple">
<!--            <option value="1">C++</option>-->
<!--            <option value="2">C#</option>-->
<!--            <option value="3">Haskell</option>-->
<!--            <option value="4">Java</option>-->
<!--            <option value="5">JavaScript</option>-->
<!--            <option value="6">Lisp</option>-->
<!--            <option value="7">Lua</option>-->
<!--            <option value="8">MATLAB</option>-->
<!--            <option value="9">NewLISP</option>-->
<!--            <option value="10">PHP</option>-->
<!--            <option value="11">Perl</option>-->
<!--            <option value="12">SQL</option>-->
<!--            <option value="13">Unix shell</option>-->
        </select>
    </div>

    <div class="col-xs-2" style="padding-top: 70px;">
        <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
        <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
        <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
        <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
        <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
        <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
    </div>

    <div class="col-xs-5" id="to" style="padding-top: 70px">
        <select name="to[]" id="undo_redo_to" class="form-control" size="30" multiple="multiple"></select>
    </div>


    <script type="text/javascript" src="../../../js/d3.js"></script>
    <script type="text/javascript" src="../../../js/jquery.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script type="text/javascript" src="../../../js/multiselect.min.js"></script>

<script>
    var experiment;
    var topics;
    var listOfTopicIds=[];
    var listOfTopics={};
    listOfTopicIds.push("123");
    listOfTopicIds.push("234");

    loadFromUrlParametersAndServer();

    //    trendsFile = "../data/"+layoutId+".csv";
    topicsFile = "../data/topics.csv";             // needed for the trend visualization

    // if all topics json files don't exist then we need to make a server call else we get them from the json file immediately
    topicsFileExist  = UrlExists(topicsFile);
    if (!topicsFileExist) {
        ajaxTopicsCall(experiment);
    }

    $(document).ready(function($) {
        d3.csv(topicsFile, function (error, data) {
            $.each(data,function (i,d) {
                listOfTopics[i] = {
                    id: d.TopicId,
                    title: d.Title
                }; //value # of publications

                $('#undo_redo')
                    .append("<option value=\""+i+"\" id=\""+d.TopicId+"\" title=\""+d.Title+"\"> "+d.Title+"</option>");
            });
        });

        $("#li1").on("click",function() {
            var url="./trends.php?id=allfunder&type=stream&topics=";
            var selected = $('#undo_redo_to').multiselect("leftAll").children();
            selected.each(function(i,d){
                url += d.id+","
            });
            console.log(url);
//            window.location.replace(url);
            window.open(url, '_blank');
        });

        $("#li2").on("click",function() {
            var url="./trends.php?id=wt&type=stream&topics=";
            var selected = $('#undo_redo_to').multiselect("leftAll").children();
            selected.each(function(i,d){
                url += d.id+","
            });
            console.log(url);
//            window.location.replace(url);
            window.open(url, '_blank');
        });

        $("#li3").on("click",function() {
            var url="./trends.php?id=fp7&type=stream&topics=";
            var selected = $('#undo_redo_to').multiselect("leftAll").children();
            selected.each(function(i,d){
                url += d.id+","
            });
            console.log(url);
//            window.location.replace(url);
            window.open(url, '_blank');
        });

        $("#li4").on("click",function() {
            var url="./trends.php?id=nih&type=stream&topics=";
            var selected = $('#undo_redo_to').multiselect("leftAll").children();
            selected.each(function(i,d){
                url += d.id+","
            });
            console.log(url);
//            window.location.replace(url);
            window.open(url, '_blank');
        });

        $('#multiselect').multiselect();
        $('#undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..."/>',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..."/>',
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