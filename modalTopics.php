<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/prettify.css" />
    <link rel="stylesheet" href="./css/stylemultiselect.css" />
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
                <li id="li1" style="margin:5px"><a style="color:white" href="#" >OK, I'm done!</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-xs-5" id="from" style="padding-top: 70px">
    <select name="from[]" id="undo_redo" class="form-control" size="30" multiple="multiple">
        <!--            <option value="1">C++</option>-->
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

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script type="text/javascript" src="./js/multiselect.min.js"></script>

<script>
    var experiment;
    var topics;
    var listOfTopicIds=[];
    var listOfTopics={};

    loadFromUrlParametersAndServer();

    ajaxTopicsCall(experiment);

    $(document).ready(function($) {

        $("#li1").on("click",function() {
            var url="./trends.php?id=allfunder&type=stream&topics=";
            var selected = $('#undo_redo_to').multiselect("leftAll").children();
            var len = selected.length;
            selected.each(function(i,d){
                if (i != len - 1)
                    url += d.id+",";
                else
                    url += d.id;
            });
            console.log(url);
//            window.location.replace(url);
            window.open(url, '_blank');
        });

        $('#multiselect').multiselect();
        $('#undo_redo').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..."/>',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..."/>'
            }
        });
    });

    /* function returns 1 if an array contains an object or 0 if not */
    function include(arr, obj) {
        return (arr.indexOf(obj) != -1);
    }

    function loadFromUrlParametersAndServer(){
        if((experiment = getUrlParameter('ex')) == null){
            alert("parameter 'ex' is not set");
        }
    }

    function getUrlParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }


    function ajaxTopicsCall(experiment) {
        console.log("ajaxCall for topics layout: " + experiment);
        var url = "./topics.php";

        return $.ajax({
            type: "GET",
            async: true,
            url: url,
            data: "ex=" + experiment,
            success: function (resp) {
                var jsonTopicsLayout = JSON.parse(resp);
                topics = jsonTopicsLayout.topics;
                topicsNoSort = jsonTopicsLayout.topicsNoSort;

                $.each(topics,function (i,d) {
                    listOfTopics[i] = {
                        id: d.TopicId,
                        title: d.Title
                    }; //value # of publications

                    $('#undo_redo')
                        .append("<option value=\""+i+"\" id=\""+d.TopicId+"\" title=\""+d.Title+"\"> "+d.Title+"</option>");
                });

            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

</script>
</body>
</html>