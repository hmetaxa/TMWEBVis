<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Scholarly Communication &amp; Research Analytics</title>

    <link href="./images/favicon.ico" rel="shortcut icon"/>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css"
          rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/d3.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <script src="./js/magnific.min.js"></script>
    <script type="text/javascript" src="./js/less.min.js"></script>
    <script type="text/javascript" src="./js/spin.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $("[rel='tooltip']").tooltip();

            $('#hover-cap-unique .thumbnail').hover(
                function () {
                    $(this).find('.caption').slideDown(500);
                },
                function () {
                    $(this).find('.caption').slideUp(500);
                });
        });
    </script>
</head>

<body>

<script>
    var exACM = "ACM_400T_1000IT_0IIT_100B_3M_cos";
    var exOpenAIRE = "HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos";
    var jsonData, topicidsACM, topicidsOpenAIRE, authorids, journalids;

    var target = document.getElementById('graphdiv'),
        opts = {
            lines: 17,              // The number of lines to draw
            length: 20,             // The length of each line
            width: 10,              // The line thickness
            radius: 30,             // The radius of the inner circle
            corners: 1,             // Corner roundness (0..1)
            rotate: 0,              // The rotation offset
            direction: 1,           // 1: clockwise, -1: counterclockwise
            color: '#000',          // #rgb or #rrggbb or array of colors
            speed: 1,               // Rounds per second
            trail: 60,              // Afterglow percentage
            shadow: false,          // Whether to render a shadow
            hwaccel: false,         // Whether to use hardware acceleration
            className: 'spinner',   // The CSS class to assign to the spinner
            zIndex: 2e9,            // The z-index (defaults to 2000000000)
            top: '100',             // Top position relative to parent
            left: '50%'             // Left position relative to parent
        };

    var spinner = new Spinner(opts).spin(target);


    function ajaxCallACM() {
        return $.ajax({
            type: "GET",
            async: true,
            url: "getIndexDataACM.php",
            data: "ex=" + exACM,
            success: function (resp) {
                spinner.stop();
                jsonData = JSON.parse(resp);
                topicidsACM = jsonData.topics;
                authorids = jsonData.authors;
                journalids = jsonData.journals;
                console.log("topicidsACM");
                console.log(topicidsACM)
            },
            error: function (e) {
                console.log('Error: ' + JSON.stringify(e));
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

    function ajaxCallOpenAIRE() {
        return $.ajax({
            type: "GET",
            async: true,
            url: "getIndexDataOpenAIRE.php",
            data: "ex=" + exOpenAIRE,
            success: function (resp) {
                spinner.stop();
                jsonData = JSON.parse(resp);
                topicidsOpenAIRE = jsonData.topics;
                console.log("topicidsOpenAIRE");
                console.log(topicidsOpenAIRE)
            },
            error: function (e) {
                console.log('Error: ' + JSON.stringify(e));
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }

    $.when(ajaxCallACM(), ajaxCallOpenAIRE())
        .then(dataLoader, myFailure);

    function dataLoader() {
        console.log("data loaded\n");
    }


    function myFailure() {
        alert("data failure in loading\n");
    }

</script>
<script type="text/javascript" src="js/d3.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script type="text/javascript" src="js/multiselect.min.js"></script>
<!-- Analytics Code -->
<div class="container">
    <a href="https://www.openaire.eu/" title="OpenAIRE"><img src="./images/logo_openaire.jpg" alt="logo_openaire"
                                                             width="100px" height="100px"></a>
    <div style="float:right;">
        <a href="https://www.uoa.gr/" title="NKUA"><img src="./images/athina_logo_new.jpg" alt="athina_logo_new"
                                                        width="100px" height="100px"></a>
        <a href="http://www.madgik.di.uoa.gr/" title="MADgIK"><img src="./images/madgiklogo_sm.jpg" alt="madgiklogo_sm"
                                                                   width="100px" height="100px"></a>
    </div>

    <div class="page-header">
        <h3>Scholarly Communication &amp; Research Analytics </h3>
    </div>
    <div class="hero-unit" style="opacity: 0.5;">
        <h5>The proposed platform for automated and extensible multi-dimensional analysis of Text Augmented
            Heterogeneous Information Networks (TA-HINets) provides the tools to explore, model and visualize systematic
            research in Europe (and not only) creating interactive topic (thematic) maps and revealing useful knowledge
            (e.g., similarities, clusters and relations) and insights. Such analysis can promote innovation and play a
            central role in related policy making &amp; collaboration between funders, scientists/institutions and
            organizations.
            <br/>
            In more details, proposed platform provides the following capabilities:
            <ul>
                <li>Multi-View Probabilistic Topic Modeling (PTM) engine analyzing massive, static or streaming,
                    collections of documents and related meta-data, discovering hidden – possibly evolving – themes that
                    characterize them and modeling their structure (inter-connections, hierarchies) and evolution over
                    time.
                </li>
                <li>Pattern &amp; Similarity detection between publications, projects/grants &amp; authors/researchers
                    identifying hidden groups, structure &amp; communities leveraging topics as a mean to link
                    documents, projects and other meta-data
                </li>
                <li>WEB based interactive visualization and analysis of the results
                </li>
            </ul>
        </h5>
    </div>


    <div id="scoped-content">
        <!--        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css"-->
        <!--              rel="stylesheet">-->
        <style>
            .modal-backdrop, .modal-backdrop.fade.in {
                opacity: 0;
                z-index: auto;
            }

            .modal {
                padding: inherit;
                width: inherit;
            }
        </style>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Select Authors
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@fat">Select Topics
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@getbootstrap">Select Journals
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document" style="width:1200px">
                <nav class="navbar navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Select Topics</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right btn-success">
                                <li id="li1" style="margin:5px"><a style="color:white" href="#">Ok</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="col-xs-5" id="from" style="padding-top: 70px">
                    <select name="from[]" id="undo_redo" class="form-control" size="30" multiple="multiple">
                        <!--                        <option value="1">C++</option>-->
                    </select>
                </div>

                <div class="col-xs-2" style="padding-top: 70px;">
                    <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                    <button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i
                            class="glyphicon glyphicon-forward"></i></button>
                    <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i
                            class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i
                            class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i
                            class="glyphicon glyphicon-backward"></i></button>
                    <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                </div>

                <div class="col-xs-5" id="to" style="padding-top: 70px">
                    <select name="to[]" id="undo_redo_to" class="form-control" size="30" multiple="multiple"></select>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <ul class="thumbnails" id="hover-cap-unique">
        <option class="span5">
            <h4>ACM Authors Graph</h4>
            <form id="form1" name="form1" action="" method="get" target="_blank">

                <div class="dropdown">
                    <select class="btn btn-primary">
                        <option id="a1" name="s" value="0.9" selected>Similarity e.g. 90%</option>
                        <option id="a1" name="s" value="1.0">100</option>
                        <option id="a2" name="s" value="0.9">90</option>
                        <option id="a3" name="s" value="0.8">80</option>
                        <option id="a4" name="s" value="0.7">70</option>
                        <option id="a5" name="s" value="0.6">60</option>
                        <option id="a6" name="s" value="0.5">50</option>
                        <option id="a7" name="s" value="0.4">40</option>
                        <option id="a8" name="s" value="0.3">30</option>
                        <option id="a9" name="s" value="0.2">20</option>
                        <option id="a10" name="s" value="0.1">10</option>
                    </select>
                </div>

                <input id="asd" type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="null" style="width: 20px; visibility: hidden"/>

                <input type="text" name="ex" value="ACM_400T_1000IT_0IIT_100B_3M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        ACM Authors Graph</p>
                    <div class="caption">
                        <h4>ACM Authors Graph</h4>
                        <span style="overflow:inherit">Experiment: ACM_400T_1000IT_0IIT_100B_3M_cos</span>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn btn-inverse btn-submit"
                               value="Get Data" onclick="doAction1('./getGraphACM.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn" value="Show Visualization"
                               onclick='doAction1("http://astero.di.uoa.gr/graphs/layouts/acm/authors/")'/>
                    </div>

                    <img src="./images/acm_authors.png" alt="acm_authors.png">
                </div>
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>


        <li class="span5">
            <h4>OpenAIRE Graph</h4>
            <form id="form2" name="form2" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.93"/>
                <input type="text" name="id" value="null" style="width: 20px; visibility: hidden"/>
                <input type="text" name="ex" value="HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        OpenAIRE Graph</p>
                    <div class="caption">
                        <h4>OpenAIRE Graph</h4>
                        <span style="overflow:inherit">Experiment: HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos</span>
                        <br/><br/>
                        <input id="s2" type="button" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit"
                               value="Get Data" onclick="doAction2('./getGraphOpenaire.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization"
                               onclick="doAction2('http://astero.di.uoa.gr/graphs/layouts/openaire/mar16/')"/>
                    </div>
                    <!--<img src="http://placehold.it/600x400" alt="acm_authors.png">-->
                    <img src="./images/graph_openaire.png" alt="graph_openaire.png">
                </div>
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>

        <li class="span5">
            <h4>ACM Authors Spider Diagram</h4>
            <form id="form3" name="form3" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="_P1000673_P1000785_P1001039"/>
                <input type="text" name="ex" value="ACM_400T_1000IT_0IIT_100B_3M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        ACM Authors Spider Diagram</p>
                    <div class="caption">
                        <h4>ACM Authors Spider Diagram</h4>
                        <span style="overflow:inherit">Experiment: ACM_400T_1000IT_0IIT_100B_3M_cos</span>
                        <br/><br/>
                        <input id="s3" type="submit" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit" value="Get Data"
                               onclick="doAction3('./getSpiderAuthors.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization" onclick="doAction3('./layouts/spider/authors/')"/>
                    </div>
                    <img src="./images/spider_authors.png" alt="spider_authors.png">
                </div>
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>

        <li class="span5">
            <h4>ACM Similar Authors Spider Diagram</h4>
            <form id="form4" name="form4" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="P1000673_P1000785_P1001039"/>
                <input type="text" name="ex" value="ACM_400T_1000IT_0IIT_100B_3M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        ACM Similar Authors Spider Diagram</p>
                    <div class="caption">
                        <h4>ACM Similar Authors Spider Diagram</h4>
                        <span style="overflow:inherit">Experiment: ACM_400T_1000IT_0IIT_100B_3M_cos</span>
                        <br/><br/>
                        <input id="s4" type="submit" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit" value="Get Data"
                               onclick="doAction4('./getSpiderSimilarAuthors.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization" onclick="doAction4('./layouts/spider/authors/')"/>
                    </div>
                    <img src="http://placehold.it/600x400" alt="acm_authors.png">
                </div>
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>

        <li class="span5">
            <h4>ACM Topics Spider Diagram</h4>
            <form id="form5" name="form5" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="_39"/>
                <input type="text" name="ex" value="ACM_400T_1000IT_0IIT_100B_3M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        ACM Topics Spider Diagram</p>
                    <div class="caption">
                        <h4>ACM Topics Spider Diagram</h4>
                        <span style="overflow:inherit">Experiment: ACM_400T_1000IT_0IIT_100B_3M_cos</span>
                        <br/><br/>
                        <input id="s5" type="submit" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit" value="Get Data"
                               onclick="doAction5('./getSpiderTopics.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization" onclick="doAction5('./layouts/spider/topics/')"/>
                    </div>
                    <img src="./images/spider_topics.png" alt="spider_topics.png">
                </div>
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>

        <li class="span5">
            <h4>ACM Journal Trends </h4>
            <form id="form6" name="form6" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="00010782"/>
                <input type="text" name="ex" value="ACM_400T_1000IT_0IIT_100B_3M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        ACM Journals Trends</p>
                    <div class="caption">
                        <h4>ACM Journal Trends</h4>
                        <span style="overflow:inherit">Experiment: ACM_400T_1000IT_0IIT_100B_3M_cos</span>
                        <br/><br/>
                        <input id="s6" type="submit" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit" value="Get Data"
                               onclick="doAction6('./getTrendsACMJournals.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization" onclick="doAction6('./layouts/trends/acmJournals/')"/>
                    </div>
                    <img src="./images/trends_acmJournals.png" alt="trends_acmJournals.png">
                </div>
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>

        <br/>

        <li class="span5">
            <h4>OpenAIRE Trends</h4>
            <form id="form7" name="form7" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="318,219,"/>
                <input type="text" name="ex" value="HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        OpenAIRE Trends</p>
                    <div class="caption">
                        <h4>OpenAIRE Trends </h4>
                        <span style="overflow:inherit">Experiment: HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos</span>
                        <br/><br/>
                        <input id="s7" type="submit" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit" value="Get Data"
                               onclick="doAction7('./getTrendsOpenaire.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization" onclick="doAction7('./layouts/trends/openaire/')"/>
                    </div>
                    <img src="./images/trends_openaire.png" alt="trends_openaire.png">
                </div>
            </form>
        </li>

        <li class="span5" border='2'>
            <h4>ACM Cloud</h4>
            <form id="form8" name="form8" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="_19"/>
                <input type="text" name="ex" value="ACM_400T_1000IT_0IIT_100B_3M_cos"
                       style="width: 20px; visibility: hidden"/>
                <div class="thumbnail">
                    <p class="front" style="position: absolute; background: #000; opacity: 0.8; color:#fff; width:98%;">
                        ACM Cloud</p>
                    <div class="caption">
                        <h4>ACM Cloud</h4>
                        <span style="overflow:inherit">Experiment: ACM_400T_1000IT_0IIT_100B_3M_cos</span>
                        <br/><br/>
                        <input id="s8" type="submit" rel="tooltip" title="Visit Webpage"
                               class="btn btn-inverse btn-submit" value="Get Data"
                               onclick="doAction8('./getCloudTopics.php')"/>
                        <br/><br/>
                        <input type="button" rel="tooltip" title="Visit Webpage" class="btn"
                               value="Show Visualization"
                               onclick="doAction8('http://astero.di.uoa.gr/graphs/layouts/cloud/topics/')"/>
                    </div>
                    <img src="./images/cloud_acm.png" alt="cloud_acm.png">
                </div>
            </form>
        </li>
    </ul>

    <script>
        var form;
        function doAction1(action) {
            form = $("#form1");
            form.attr("action", action);
            form.submit();
        }

        function doAction2(action) {
            form = $("#form2");
            form.attr("action", action);
            form.submit();
        }

        function doAction3(action) {
            form = $("#form3");
            form.attr("action", action);
            form.submit();
        }

        function doAction4(action) {
            form = $("#form4");
            form.attr("action", action);
            form.submit();
        }

        function doAction5(action) {
            form = $("#form5");
            form.attr("action", action);
            form.submit();
        }

        function doAction6(action) {
            form = $("#form6");
            form.attr("action", action);
            form.submit();
        }

        function doAction7(action) {
            form = $("#form7");
            form.attr("action", action);
            form.submit();
        }

        function doAction8(action) {
            form = $("#form8");
            form.attr("action", action);
            form.submit();
        }

        var experiment;
        var topics;
        var listOfTopics = {};

        loadFromUrlParametersAndServer();


        topicsFile = "../data/acmtopics.json";             // needed for the trend visualization

        // if all topics json files don't exist then we need to make a server call else we get them from the json file immediately
        topicsFileExist = UrlExists(topicsFile);
        if (!topicsFileExist) {
            ajaxTopicsCall(experiment);
        }

        $(document).ready(function ($) {

            d3.json(topicsFile, function (error, data) {
                $.each(data.topics, function (i, d) {
                    listOfTopics[i] = {
                        id: i,
                        title: d[0].title
                    }; //value # of publications

                    $('#undo_redo')
                        .append("<option value=\"" + i + "\" id=\"" + i + "\" title=\"" + d[0].title + "\"> " + d[0].title + "</option>");
//                        .append("<option value=\"" + i + "\" id=\"" + d.TopicId + "\" title=\"" + d.Title + "\"> " + d.Title + "</option>");
                });
            });

            $("#li1").on("click", function () {
                var url = "./trends.php?id=allfunder&type=stream&topics=";
                var selected = $('#undo_redo_to').multiselect("leftAll").children();
                selected.each(function (i, d) {
                    url += d.id + ","
                });
                console.log(url);
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

        function loadFromUrlParametersAndServer() {
            var fs = require('config');

            if ((experiment = getUrlParameter('ex')) == null) {
                experiment = fs.experimentName;
            }

            if ((layoutId = getUrlParameter('id')) == null) {         //default
                layoutId = fs.layoutId;
            }

            if ((layoutType = getUrlParameter('type')) == null) {
                layoutType = fs.layoutType;
            }

            if ((topicsSort = getUrlParameter('sort')) == null) {
                topicsSort = fs.topicsSort;
            }
        }

        function getUrlParameter(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null
        }


        function ajaxTopicsCall(experiment) {
            console.log("ajaxCall for topics layout: " + experiment);
            var url = "../layouts/trends/openaire/topics.php";


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

        function UrlExists(url) {
            var http = new XMLHttpRequest();
            http.open('HEAD', url, false);
            http.send();
            return http.status != 404;
        }

    </script>

    <footer>
        <p><a href="http://www.madgik.di.uoa.gr/" class="label ">&copy; MADgIK </a><a href="http://www.uoa.gr/"
                                                                                      class="label ">@ NKUA</a>
        </p>
    </footer>
</div>

<!-- /container -->

</body>

</html>