<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ;?></title>
    <link href="../../../images/favicon.ico" rel="shortcut icon" />

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap-theme.min.css">
    <link rel="stylesheet/less" href="../../../css/bootstrap-multiselect.less"/>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-multiselect.css" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="../../../css/style2.css" />
    <link rel="stylesheet" type="text/css" href="../../../slider/css/slider.css" />
<!--    <link rel="stylesheet" type="text/css" href="../../../slider/less/slider.less" />-->
    <!-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.3/themes/flick/jquery-ui.css" /> -->

    <style>


        body { padding-top: 70px; } /*because the navbar is fixed-to-top */

        .ui-widget-*{
            background: 50% 50% #eeeeee
        }

        .vcenter {
            margin-top: 1%;
        }

        .subd-vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }

        /*decrease height of navbar*/
        .navbar-nav > li > a {padding-top:10px !important; padding-bottom:10px !important;}
        .navbar, #dropdownThresholds, .container-fluid{min-height:35px !important; max-height:35px !important}
        /*.navbar-default .naxbar-xs .navbar-collapse .navbar {min-height:20px !important; max-height:20px !important}*/
        .navbar-brand {padding: 5px 10px 5px 15px }
        .btn-xs {padding:0px 0px 0px 10px;}
        #experiments, #filters {margin-top: 5px}
        #experiment_btn{padding: 0px; padding-left: 5px; max-height:30px;}
        .input-group, .input-group-addon, .form-control, #experiments, #filters {min-height:25px !important; max-height:25px !important}
        .multiselect-search, .multiselect-clear-filter {min-height:30px !important; max-height:30px !important;}
        .chord_circle circle {
            fill: none;
            pointer-events: all;
        }

        .group path {
            fill-opacity: .5;
        }

        path.chord {
            stroke: #000;
            stroke-width: .25px;
        }

        .chord_circle:hover path.fade {
            display: none;
        }

        .divider-right {
            height: inherit;
            padding: 0px 1px 0px 1px;
            margin: 0px 6px;
            border-right: 1px solid #000000;
            max-height:35px !important
        }

        .divider-left {
            height: inherit;
            padding: 0px 10px 0px 10px;
            margin: 0px 9px;
            border-left: 1px solid #020202;
            max-height:35px !important
        }

        /*chrome fix bug the below*/
        .input-group-addon, .input-group {
            width: auto;
        }

        /*natalia asked for padding and font-size on the right table*/
        .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th{
            padding: 1px;
            font-size: 13px;
        }

        .active {
            color:green;
        }

        .shadow {
            -webkit-filter: opacity(1);
            -webkit-filter: drop-shadow( 0px 0px 10px yellow);
            filter: drop-shadow( 0px 0px 10px yellow );  /*Same syntax as box-shadow*/
        }

        .btn{
            padding: 4px 12px;
        }
        /*.multiselect-clear-filter{*/
            /*padding: 7px 12px;*/
        /*}*/

        .form-control {
            font-size: 10px
        }

        .input-group-addon{
            font-size: 10px;
            font-weight: 500
        }
        .tooltip-inner{
            max-width: 100%; /* Max Width of the popover (depending on the container!) */
        }
        .dropdown-menu { padding: 5px;}


/*jquery autocomplete to boostrap css*/
        .ui-autocomplete {
            position: absolute;
            z-index: 1000;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc
        -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .ui-autocomplete > li {
            padding: 3px 20px;
        }
        .ui-autocomplete > li.ui-state-focus {
            background-color: #DDD;
        }
        .ui-helper-hidden-accessible {
            display: none;
        }

        .glyphiconmystyle{
            padding:0px 0px 0px 5px;
        }
        .mypills{
            padding-bottom: 36px !important;padding-right:20px !important;
        }
        .navbar-brand{height:0px}

        a {
            outline: 0;
        }

/* trend ccs starts here */
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
            opacity: .05;
        }

        .reverserows{
            display: -webkit-flex; /* Safari */
            -webkit-flex-direction: row-reverse; /* Safari 6.1+ */
            display: flex;
            flex-direction: row-reverse;
        }

        /* trend ccs ends here */

    </style>


    <!-- Latest compiled and minified JavaScript -->
<!--    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>-->
<!-- // <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->
    <script type="text/javascript" src="../../../js/jquery-2.1.3.min.js"></script>

<!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
<!--    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>-->
    <script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>

<!-- // <script src="http://d3js.org/d3.v3.min.js"></script> -->
    <script src="../../../js/d3.v3.min.js"></script>


<!--    <script type="text/javascript" src="../../../js/jquery-ui.min.js"></script>-->
    <script src="../../../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../../bootstrap/js/bootstrap-multiselect.js"></script>

    <script type="text/javascript" src="../../../utils.js"></script>

    <script type="text/javascript" src="../../../jquery.jswipe-0.1.2.js"></script>

    <!-- // <script type="text/javascript" src="http://fgnass.github.io/spin.js/spin.min.js"></script> -->
    <script type="text/javascript" src="../../../js/less.min.js"></script>
    <script type="text/javascript" src="../../../js/spin.min.js"></script>


    <script type="text/javascript" src="../../../slider/js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="../../../js/fullscreen/jquery.fullscreen-min.js"></script>
    <script type="text/javascript" src="../../../js/seedrandom.min.js"></script>

    <script type="text/javascript" src="../../../js/jp.js"></script>

    <script>
        // use below to change layout in mobile devices
        function detectmob() {
            return navigator.userAgent.match(/Android/i)
                || navigator.userAgent.match(/webOS/i)
                || navigator.userAgent.match(/iPhone/i)
                || navigator.userAgent.match(/iPad/i)
                || navigator.userAgent.match(/iPod/i)
                || navigator.userAgent.match(/BlackBerry/i)
                || navigator.userAgent.match(/Windows Phone/i);
        }

        if(detectmob()) {
            var imported1 = document.createElement('link');
            imported1.rel = 'stylesheet';
            imported1.href = 'http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css';
            document.head.appendChild(imported1);

            var imported2 = document.createElement('script');
            imported2.type = 'text/javascript';
            imported2.src = 'http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js';
            document.head.appendChild(imported2);
        }
    </script>


    <script type='text/javascript'>
        $(document).ready(function() {


            var windowElem = $(window),
                documentElem = $(document),
                bodyElem = $("body"),
                headElem = $("head"),
                tooltipElem = $('[data-toggle="tooltip"]'),
                popoverElem = $('[data-toggle="popover"]'),
                classifiedNodesHeaderElem = $("#classifiedNodesHeader"),
                classifiedNodesElem = $("#classifiedNodes"),
                tagsElem = $("#tags"),
                upButtonElem = $("#upButton"),
                downButtonElem = $("#downButton"),
                exitclassifiedNodesHeaderElem = $("#exitclassifiedNodesHeader"),
                filter1Elem = $("#filter1"),
                filter2Elem = $("#filter2"),
                myTabElem = $("#myTab"),
                experimentBtnElem = $("#experiment_btn"),
                boostBtnElem = $("#boost_btn"),
                categoriesElem = $("#categories"),
                mygraphContainerElem = $("#mygraph-container"),
                mytextTitleElem = $("#mytext-title"),
                mytextContentElem = $("#mytext-content"),
                mainElem = $("#main"),
                myinfoElem = $("#myinfo"),
                jumpPreviousElem = $("#jumpPrevious"),
                mygraphElem = $("#mygraph"),
                jumpNextElem = $("#jumpNext"),
                legenddivElem = $("#legenddiv"),
                thr1Elem = $("#thr1"),
                thr2Elem = $("#thr2"),
                thr3Elem = $("#thr3"),
                thr4Elem = $("#thr4"),
                thr5Elem = $("#thr5"),
                thr6Elem = $("#thr6"),
                thr7Elem = $("#thr7"),
                graphNodesElem = $("#graphNodes"),
                category1Elem = $("#category1"),
                category2Elem = $("#category2"),
                category3Elem = $("#category3"),
                experimentsElem = $("#experiments"),
                filtersElem = $("#filters"),
                graphElem = $("#graph"),
                legendElem = $("#legend"),
                svgTextElem = $("svg:text"),
                graphmenu1Elem = $("#graphmenu1"),
                graphdivElem = $("#graphdiv"),
                chordmenuElem = $("#chordmenu"),
                chordmenu1Elem = $("#chordmenu1"),
                chordmenu2Elem = $("#chordmenu2"),
                chorddivElem = $("#chorddiv"),
                chord2divElem = $("#chord2div"),
                trendmenuElem = $("#trendmenu"),
                trendmenudataElem = $("#trendmenudata"),
                trendmenu0Elem = $("#trendmenu0"),
                trendmenu1Elem = $("#trendmenu1"),
                trendmenu2Elem = $("#trendmenu2"),
                trendmenu3Elem = $("#trendmenu3"),
                trendmenu4Elem = $("#trendmenu4"),
                trendmenu5Elem = $("#trendmenu5"),
                trendmenu6Elem = $("#trendmenu6"),
                trend0divElem = $("#trend0div"),
                trend1divElem = $("#trend1div"),
                trend2divElem = $("#trend2div"),
                trend3divElem = $("#trend3div"),
                trend4divElem = $("#trend4div"),
                trend5divElem = $("#trend5div"),
                trend6divElem = $("#trend6div"),
                pagetitleElem = $("#pagetitle"),
                legend2divElem = $("#legend2div"),
                dropdownThresholdsElem = $("#dropdownThresholds"),
                pillsElem = $("#pills"),
                pill1Elem = $("#pill1"),
                pill2Elem = $("#pill2"),
//                pill3Elem = $("#pill3"),
                pill4Elem = $("#pill4"),
                graphNodesGroup1Elem,
                graphNodesGroup2Elem,
                chordElem = $("#chord"),
                chord2Elem = $("#chord2"),
                trend0Elem = $("#trend0"),
                trend1Elem = $("#trend1"),
                trend2Elem = $("#trend2"),
                trend3Elem = $("#trend3"),
                trend4Elem = $("#trend4"),
                trend5Elem = $("#trend5"),
                trend6Elem = $("#trend6"),
                trendCSV10,
                trendCSV11,
                trendCSV12,
                trendCSV13,
                trendCSV14,
                trendCSV15,
                trendCSV16,
                trendlegend0Elem,
                trendlegend1Elem,
                trendlegend2Elem,
                trendlegend3Elem,
                trendlegend4Elem,
                trendlegend5Elem,
                trendlegend6Elem,
                seriesElem,
                streamPathElem,
                authorselected;

            // in order graph not to be random https://github.com/davidbau/seedrandom
            Math.seedrandom('mySeed');

            // d3 Selections
            var vis = d3.select("#graph"),
                legend = d3.select("#legend"),
                mytextTitle = d3.select("#mytext-title"),
                mytext = d3.select("#mytext-content"),
                explist = d3.select("#experiments"),
                search = d3.select("#search"),
                nodeCircles, linkLines, graphNodesList1, rows;


            /* globals */
            var style, pagetitle,
                trendstitle, chordtitle, layout,


            // sizes, zooming, scaling, translating and colors
                fade_out, strong, normal, fadelimit, w, h, prev_w, scaleFactor, translation, xScale, yScale, previous_scale, zoom_type, fontsizeVar, smallestFontVar, gravity, charge, clrArray, flagForTranformation,
                clr20, clrEven, clrOdd, clr, clr2, clr3,

            // text and labels
                loadingText, selectedLabelIndex, labels, nodeLabels, selectnodeLabels, labeled, topicWords, topicsFlag, labelIsOnGraph, svgSortedTopicWords,
                topicsNotSorted,				//initially the sorted topics
                topicsSorted,				//initially the unsortd topics
                topicstemp,				//the swapper between the above two
                zoomer, fontsize, topicsMap, discriminativeTopic, discriminativeTopicWeight, discriminativeWord, discriminativeWordCounts, topicsGroupPerNode, neighborTopicsGroupPerNode, neighborLen, len, topicPerTopicsGroup, weightPerTopicsGroup, i, j, nl, mywords, wlen, label,
            // links
                links,						// includes all the links among the nodes
                linkedByIndex, similarityThr, linkThr,
                jsonLinks,

            // nodes
                nodes,						// includes all the nodes
                nodeConnections, maxNodeConnections, nodesToFade, nodesInGroup, neighborNode, focused, nodeConnectionsThr, maxNodeConnectionsThr, node_hash, clickedNode, max_proj,
                numOfClassifiedNodes,				            //classifiedNodes found
                jsonNodes,

            // categories
                legend_data, subdConnections, subdBiConnections, subdConnectionsNum, subdBiConnectionsNum, fetOpenNum, fetProactiveNum, fetFlagshipNum, relations,
                relationsCross,					// for the cross disciplinary areas

            // experiments
                experiments, experimentName, experimentDescription,

            // chord
                subdivisionsChord, 		// before its contents were in a csv file
                chord_group, chord_chord, clickedChord, percentageSum, trendClicked,

            //graphNodes
                graphNodesListHtml, listLength, graphNodes,

            //trends
                topicnames,

                force, jsonTrendsLayout, k, n, counter, availableTags,
                availableLabels,

                expsimilarity,
                chord_formatPercent,
                target,
                opts,
                spinner,
                webkit,
                clickedTopics,
                distribution,
                heatmap,
                trends,
                columns,
                trendsclicked,
                trendsFileExist, trendsjsonfilename, alltrendscsvFilesExist, trendsNum,


                //graph
                graphPositionsExist, jsonfilename, renderPageData, changed, jsonLayout;

            legenddivElem.hide();

            // function creation jquery percentage
            jQuery.extend({
                percentage: function (a, b) {
                    return Math.round((a / b) * 100);
                }
//                ,
//                reverseChildren: function() {
//                    return this.each(function(){
//                        var $this = $(this);
//                        $this.children().each(function(){ $this.prepend(this) });
//                    });
//                }
            });
            dropdownThresholdsElem.on("click", function () {
                $(this).parent().toggleClass('open');
            });
            bodyElem.on("click", function (e) {
                if (!dropdownThresholdsElem.is(e.target) && dropdownThresholdsElem.has(e.target).length === 0 && $('.open').has(e.target).length === 0)
                    dropdownThresholdsElem.parent().attr("class", "dropdown");
            });


            // initialization of tooltips and popover
            $(function () {
                tooltipElem.tooltip({
                    container: 'body'
                })
            });
            $(function () {
                popoverElem.popover()
            });

            var doit;
            windowElem.onresize = function () {
                clearTimeout(doit);
                doit = setTimeout(onResize, 20);		//after 0.02sec the resizing is done
            };

//            loadThresholdsFromUrlParameters();
            initializeExperimentPage();
            loadThresholdsFromUrlParameters();  //only when changing the parameters on url and refreshing
            checkFirstLayoutToBeVisualized();
            graphLoad();
            legenddivElem.hide();
            mygraphContainerElem.attr("style", "position:fixed;width:" + 9 * w / 8);
            resizeLayout();
            checkFullscreen();

            /* event handlers */
            vis.style("height", h)
                .style("viewBox", "0 0 " + w + " " + h)			// in order to be ok in all browsers
                .style("preserveAspectRatio", "xMidYMid meet")
                .style("border-style", "solid")
                .style("cursor", "pointer")
                .style("border-color", "#f6f6f6");


            /* Create scales to handle zoom coordinates */
            xScale = d3.scale.linear().domain([0, w]);
            yScale = d3.scale.linear().domain([0, h]);
            /* ranges will be set later based on the size of the SVG */


            focused = false;

            thr1Elem.val("> " + $.percentage(similarityThr, 1) + " %");
            thr2Elem.val("> " + $.percentage(nodeConnectionsThr, 1) + " %");
            thr3Elem.val("> " + $.percentage(linkThr, 1) + " %");
            thr4Elem.val("> " + $.percentage(maxNodeConnectionsThr, 1) + " %");
            thr5Elem.val("> " + $.percentage(expsimilarity, 1) + " %");
            thr6Elem.val(gravity);
            thr7Elem.val(charge);

            thr1Elem.focus(function () {
                thr1Elem.val($.percentage(similarityThr, 1));
            });
            thr1Elem.change(function () {
                similarityThr = thr1Elem.val() / 100;
                browseTick(false);
                thr1Elem.val("> " + $.percentage(similarityThr, 1) + " %");
            });

            thr2Elem.focus(function () {
                thr2Elem.val($.percentage(nodeConnectionsThr, 1));
            });
            thr2Elem.change(function () {
                nodeConnectionsThr = thr2Elem.val() / 100;
                browseTick(false);
                thr2Elem.val("> " + $.percentage(nodeConnectionsThr, 1) + " %");
            });

            thr3Elem.focus(function () {
                thr3Elem.val($.percentage(linkThr, 1));
            });
            thr3Elem.change(function () {
                linkThr = thr3Elem.val() / 100;
                browseTick(true);
                thr3Elem.val("> " + $.percentage(linkThr, 1) + " %");
            });

            thr4Elem.focus(function () {
                thr4Elem.val($.percentage(maxNodeConnectionsThr, 1));
            });
            thr4Elem.change(function () {
                maxNodeConnectionsThr = thr4Elem.val() / 100;
                browseTick(true);
                thr4Elem.val("> " + $.percentage(maxNodeConnectionsThr, 1) + " %");
            });

            thr5Elem.focus(function () {
                thr5Elem.val($.percentage(expsimilarity, 1));
            });
            thr5Elem.change(function () {
                console.log("expsimilarity=" + expsimilarity);
                expsimilarity = thr5Elem.val() / 100;
                console.log("expsimilarity=" + expsimilarity);
                initializeExperimentPage();
                if ((expsimilarity = thr5Elem.val() * 0.01) > 1 || expsimilarity < 0) initializeExperimentPage();
                console.log(expsimilarity)
                console.log(window.location.href)
                history.pushState('data', '', updateURLParameter(window.location.href, 's', expsimilarity));
                console.log(window.location.href)
                graphLoad();
                mygraphContainerElem.attr("style", "position:fixed;width:" + 8 * w / 7);
                thr5Elem.val("> " + $.percentage(expsimilarity, 1) + " %");
            });

            thr6Elem.focus(function () {
                console.log("gravity init=" + gravity);
                thr6Elem.val(gravity);
            });
            thr6Elem.change(function () {
                console.log("gravity=" + gravity);
                gravity = thr6Elem.val();
                console.log("gravity=" + gravity);
                console.log(window.location.href)
                history.pushState('data', '', updateURLParameter(window.location.href, 'g', gravity));
                console.log(window.location.href)
                window['force']['gravity'](gravity);
                changed = true;
                force.on("tick", initialTick);
                force.start();
                thr6Elem.val(gravity);
            });

            thr7Elem.focus(function () {
                console.log("charge init=" + gravity);
                thr7Elem.val(charge);
            });
            thr7Elem.change(function () {
                console.log("charge=" + charge);
                charge = thr7Elem.val();
                console.log("charge=" + charge);
                console.log(window.location.href)
                history.pushState('data', '', updateURLParameter(window.location.href, 'c', charge));
                console.log(window.location.href)
                window['force']['charge'](charge);
                changed = true;
                force.on("tick", initialTick);
                force.start();
                thr7Elem.val(charge);
            });

            documentElem.on("myTrigger", function (evt) {       // http://www.htmlgoodies.com/beyond/javascript/creating-custom-events-with-jquery.html
                console.log("myTrigger")
                if (changed) {
                    initializeExperimentPage();
                    graphLoad();
                    changed = false;
                }
            });
            graphmenu1Elem.on("click", function () {
                if (trendsclicked) {
                    chordReset();
                    graphReset()
                }
                ;
                legenddivElem.show();
                legend2divElem.hide();
                pill1Elem.removeClass("disabled");
//                pill3Elem.addClass("disabled");
                pagetitleElem.html(pagetitle);
                trendsclicked = false;
            });
            chordmenu1Elem.on("click", function () {
                if (trendsclicked)chordReset();
                legenddivElem.show();
                legend2divElem.hide();
                pill1Elem.removeClass("disabled");
//                pill3Elem.addClass("disabled");
                pagetitleElem.html(chordtitle);
                trendsclicked = false;
            });
            chordmenu2Elem.on("click", function () {
                if (trendsclicked)chordReset();
                legenddivElem.show();
                legend2divElem.hide();
                pill1Elem.removeClass("disabled");
//                pill3Elem.addClass("disabled");
                pagetitleElem.html(chordtitle);
                trendsclicked = false;
            });
            //todo mellontika na min ginetai reset o graph, alla na patiountai osa exoun sxesi me to patimeno trend
            trendmenu0Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend1Elem.hide();
                trendlegend2Elem.hide();
                trendlegend3Elem.hide();
                trendlegend4Elem.hide();
                trendlegend5Elem.hide();
                trendlegend6Elem.hide();
                trendlegend0Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });
            trendmenu1Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend0Elem.hide();
                trendlegend2Elem.hide();
                trendlegend3Elem.hide();
                trendlegend4Elem.hide();
                trendlegend5Elem.hide();
                trendlegend6Elem.hide();
                trendlegend1Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });
            trendmenu2Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend0Elem.hide();
                trendlegend1Elem.hide();
                trendlegend3Elem.hide();
                trendlegend4Elem.hide();
                trendlegend5Elem.hide();
                trendlegend6Elem.hide();
                trendlegend2Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });
            trendmenu3Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend0Elem.hide();
                trendlegend2Elem.hide();
                trendlegend1Elem.hide();
                trendlegend4Elem.hide();
                trendlegend5Elem.hide();
                trendlegend6Elem.hide();
                trendlegend3Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });
            trendmenu4Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend0Elem.hide();
                trendlegend1Elem.hide();
                trendlegend2Elem.hide();
                trendlegend3Elem.hide();
                trendlegend5Elem.hide();
                trendlegend6Elem.hide();
                trendlegend4Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });
            trendmenu5Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend0Elem.hide();
                trendlegend1Elem.hide();
                trendlegend2Elem.hide();
                trendlegend3Elem.hide();
                trendlegend4Elem.hide();
                trendlegend6Elem.hide();
                trendlegend5Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });
            trendmenu6Elem.on("click", function () {
                trendReset(true);
                graphReset();
                legenddivElem.hide();
                legend2divElem.show();
                trendlegend0Elem.hide();
                trendlegend1Elem.hide();
                trendlegend2Elem.hide();
                trendlegend3Elem.hide();
                trendlegend4Elem.hide();
                trendlegend5Elem.hide();
                trendlegend6Elem.show();
//                pill3Elem.removeClass("disabled");
                pagetitleElem.html(trendstitle);
                trendsclicked = true;
            });


            // the same piece of code with the below $(document).fullScreen() because it doesn't catch the escape button click
            $(document).keyup(function (e) {
                if (e.keyCode == 27) {   // esc
                    svgfullscreenExit();
                    pill1Elem.find("a").find("span").removeClass("glyphicon-resize-small");
                    pill1Elem.find("a").find("span").addClass("glyphicon-fullscreen");
                    pill1Elem.removeClass("active");
                    pill1Elem.blur();
                }
            });

            pill1Elem.on("click", function () {
                if ($(document).fullScreen()) {
                    svgfullscreenExit();
                    pill1Elem.find("a").find("span").removeClass("glyphicon-resize-small");
                    pill1Elem.find("a").find("span").addClass("glyphicon-fullscreen");
                    pill1Elem.removeClass("active");
                    pill1Elem.blur();
                }
                else {
                    svgfullscreen();
                    pill1Elem.find("a").find("span").removeClass("glyphicon-fullscreen");
                    pill1Elem.find("a").find("span").addClass("glyphicon-resize-small");
                    pill1Elem.addClass("active");
                }
            });


            pill2Elem.unbind().on("click", function () {
                pill2Elem.removeClass("active");
                if (graphdivElem.hasClass("active")) graphReset();
                else if (chorddivElem.hasClass("active") || chord2divElem.hasClass("active")) chordReset();
                else if (trend0divElem.hasClass("active") || trend1divElem.hasClass("active") || trend2divElem.hasClass("active") || trend3divElem.hasClass("active") || trend4divElem.hasClass("active") || trend5divElem.hasClass("active") || trend6divElem.hasClass("active")) trendReset(true);

                pill2Elem.blur();
            });
//            pill3Elem.on("click",function(){
//                pill3Elem.removeClass("active");
//
//                if(trend0divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full.html");
//                else if(trend1divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full.html");
//                else if(trend2divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full-communication.html");
//                else if(trend3divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full-sigmod.html");
//                else if(trend4divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full-communication.html");
//                else if(trend5divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full-sigmod.html");
//                else if(trend6divElem.hasClass("active")) redirectUrl("../../../trends/streamgraph-full-sigmod.html");
//
//                pill3Elem.blur();
//            });
            pill4Elem.unbind().on("click", function () {
                pill4Elem.removeClass("active");
                if (graphdivElem.hasClass("active")) graphCentralize();
                else if (chorddivElem.hasClass("active") || chord2divElem.hasClass("active")) chordReset();
                else if (trend0divElem.hasClass("active") || trend1divElem.hasClass("active") || trend2divElem.hasClass("active") || trend3divElem.hasClass("active") || trend4divElem.hasClass("active") || trend5divElem.hasClass("active") || trend6divElem.hasClass("active")) trendReset(false);

                pill4Elem.blur();
            });


            exitclassifiedNodesHeaderElem.click(function () {
                classifiedNodesHeaderElem.hide();
                classifiedNodesElem.hide();
                nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;
            });


            /* window resizing */
            // check:
            // http://davidwalsh.name/javascript-debounce-function
            // http://stackoverflow.com/questions/5489946/jquery-how-to-wait-for-the-end-of-resize-event-and-only-then-perform-an-ac
            // the above lines can be used instead of below
            // function debounce(a,b,c){var d;return function(){var e=this,f=arguments;clearTimeout(d),d=setTimeout(function(){d=null,c||a.apply(e,f)},b),c&&!d&&a.apply(e,f)}}
//            var doit;
//            windowElem.on("resize",function(){
//                clearTimeout(doit);
//                doit = setTimeout(onResize, 20);		//after 0.02sec the resizing is done
//            });

            style = document.createElement('style');
            style.type = 'text/css';
            headElem[0].appendChild(style);


            /* semantic zooming and panning */
            /* https://github.com/mbostock/d3/wiki/Zoom-Behavior */
            zoomer = d3.behavior.zoom()
                /* allow from an x0.5 to an x10 times zoom in or out */
                .scaleExtent([0.5, 10])
                .on("zoomstart", zoomstart)
                .on("zoom", zoom)
                .on("zoomend", zoomend);
            vis.call(zoomer);

            /* moveToFront function to handle the svg */
            d3.selection.prototype.moveToFront = function () {
                return this.each(function () {
                    this.parentNode.appendChild(this);
                });
            };


            if (windowElem.width() < 755)
                charge *= 1.5;

            force = self.force = d3.layout.force()
                .linkDistance(function (d) {
                    return Math.round(10 * d.value);
                })
                .linkStrength(function (d) {
                    return d.value;
                })
                .charge(charge * ((windowElem.width() * w * 0.3) / (755 * 755))) // according to http://jsfiddle.net/cSn6w/8/
                .gravity(gravity)
                .size([w, h]);

            if (graphPositionsExist) {
                force.on("tick", jsonTick);
            }
            else {
                force.on("tick", initialTick);
            }

// Na tsekarw me to Enter ti tha anoigei. An  leitourgei swsta
            documentElem.keydown(function (e) {
                //itan 13
                if (e.keyCode == 14 && selectedLabelIndex !== null) {
                    openLink()(labels[selectedLabelIndex]);
                    return false;
                }
                else if (e.keyCode == 38 || e.keyCode == 40 && selectedLabelIndex !== null) {	// up and down buttom
                    if (e.keyCode == 38) {
                        console.log("up btn")
                        selectedLabelIndex--;
                    }
                    if (e.keyCode == 40) {
                        console.log("down btn")
                        selectedLabelIndex++;
                    }
                    if (selectedLabelIndex < 0)
                        selectedLabelIndex = labels.length - 1;
                    if (selectedLabelIndex > labels.length - 1)
                        selectedLabelIndex = 0;

                    vis.selectAll("text.nodetext").style("font-weight", function (d, i) {
                        return labels[selectedLabelIndex] == d ? "bold" : "normal"
                    });

                    vis.selectAll("circle.circle").style("stroke-width", function (d, i) {
                        return labels[selectedLabelIndex] == d ? "5" : "1"
                    });

                    return false;
                }
                else if (e.keyCode == 39) {		// right buttom
                    console.log("right charge")
                    window['force']['charge'](window['force']['charge']() - 10);
                    force.start();
                }
                else if (e.keyCode == 37) {		// left buttom
                    console.log("left charge")
                    window['force']['charge'](window['force']['charge']() + 10);
                    force.start();
                }
            });


            /***************************************************************************
             *******                            FUNCTIONS                            *******
             ***************************************************************************/


            /**** DRAGGING FUNCTIONS ****/
            function dragstarted(d) {
                d3.event.sourceEvent.stopPropagation();
                d3.select(this).classed("dragging", true);
                force.stop(); //stop ticks while dragging
            }

            function dragged(d) {
                if (d.fixed) return; //root is fixed

                //get mouse coordinates relative to the visualization
                //coordinate system:
                var mouse = d3.mouse(vis.node());
                d.x = (mouse[0] - translation[0]) / scaleFactor;
                d.y = (mouse[1] - translation[1]) / scaleFactor;
                browseTick(false);//re-position this node and any links
            }

            function dragended(d) {
                d3.select(this).classed("dragging", false);
                force.resume();
            }


            /**** ZOOOMING FUNCTIONS ****/
            /* function used for starting border coloring*/
            function zoomstart() {
                vis.style("animation-play-state", "play")
                    /*the below is to work in Safari and Chrome:*/
                    .style("-webkit-animation-play-state", "play");
            }

            /* function used for zooming and panning*/
            function zoom() {
                console.log("zoom", d3.event.translate, d3.event.scale);

                scaleFactor = d3.event.scale;
                translation = d3.event.translate;
                if (previous_scale < d3.event.scale) {
                    /* color change is animated infinite times of 3sec each one */
                    vis.style("animation", "zoominmove 3s infinite")
                        .style("-webkit-animation", "zoominmove 3s infinite");
                    zoom_type = 1;
                }
                else if (previous_scale == d3.event.scale) {
                    /* color change is animated infinite times of 3sec each one */
                    vis.style("animation", "dragmove 3s infinite")
                        .style("-webkit-animation", "dragmove 3s infinite")
                        .style("cursor", "move");
                    zoom_type = 2;
                }
                else {
                    /* color change is animated infinite times of 3sec each one */
                    vis.style("animation", "zoomoutmove 3s infinite")
                        .style("-webkit-animation", "zoomoutmove 3s infinite");
                    zoom_type = 3;
                }
                previous_scale = scaleFactor;

                browseTick(false); // update positions
            }

            /* function used for stopping border coloring*/
            function zoomend() {
                console.log("previous_scale=" + previous_scale);
                if (zoom_type == 1) {
                    vis
                    /* continue with amimating the border for 2 times more*/
                        .style("animation", "zoominmove 3s 2")
                        .style("-webkit-animation", "zoominmove 3s 2");
                }
                else if (zoom_type == 2) {
                    vis
                    /* continue with amimating the border for 2 times more*/
                        .style("animation", "dragmove 3s 2")
                        .style("-webkit-animation", "dragmove 3s 2")
                        .style("cursor", "pointer");
                }
                else {
                    vis
                    /* continue with amimating the border for 2 times more*/
                        .style("animation", "zoomoutmove 3s 2")
                        .style("-webkit-animation", "zoomoutmove 3s 2");
                }
            }


            /**** FULLSCREEN AND RESIZING FUNCTIONS ****/
            function svgfullscreen() {
                myinfoElem.detach().appendTo(mygraphContainerElem);
                mygraphContainerElem.fullScreen(true);
            }


            function svgfullscreenExit() {
                myinfoElem.detach().prependTo(mainElem);
                mygraphContainerElem.fullScreen(false);
            }


            function graphReset() {
                graphNodesElem.multiselect('deselectAll', false);

                graphCentralize();

                ///initialize
                var types = [];
                $(".circle").each(function () {
                    types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])

                });
                showtype(fade_out, types);
            }

            function graphCentralize() {
                scaleFactor = 1;
                translation = [0, 0];
                previous_scale = 1;
                zoomer.translate([0, 0]);
                zoomer.scale(1);
                console.log("scales", translation, scaleFactor);
                browseTick(false);
            }

            /**** FADING AND COLORING FUNCTIONS ****/
            /* refills the opacity of each color after fading */
            function showtype(opacity, types) {

                nodeCircles
                    .style("fill-opacity", function (o) {

                        if (types.indexOf(o.index) === -1)return opacity;
                        return normal;
                    })
                    .style("stroke-opacity", function (o) {
                        if (types.indexOf(o.index) === -1)return opacity;
                        return normal;
                    });

                nodeLabels
                    .style("fill-opacity", function (o) {
                        if (types.indexOf(o.index) === -1) return opacity * 3;
                        return strong;
                    })
                    .style("stroke-opacity", function (o) {
                        if (types.indexOf(o.index) === -1) return opacity * 3;
                        return strong;
                    });

                linkLines.style("stroke-opacity", function (o) {
                    return types.indexOf(o.source.index) != -1 || types.indexOf(o.target.index) != -1 ? normal / 2 : opacity;
                });

            }


            function fadeGraph(opacity) {
                return function (d, i) {
//                    if($(".active_row").length == 0 && !classifiedNodesElem.find("div").find("ul").is(':visible')) {   // if there is active row or the left list of nodes is visible then don't fade
                    //to fadelimit einai mia metabliti pithanotata idia i pio megali apo to normal etsi wste sta megala peiramata pou tha orizw egw poia tha einai auta na min ginetai fade
                    if ($(".circle").css("fill-opacity") >= fadelimit) {   // if there is active row or the left list of nodes is visible then don't fade

                        // addClass for svg to place yellow shadow
                        $(this).attr('class', function (index, classNames) {
                            return classNames + ' shadow';
                        });

                        if ($(this).css("fill-opacity") < fadelimit)
                            return false;

                        graphHandler(d, opacity);
                    }
                }
            }


            function clickGraph(mynode, opacity) {

                chordReset();
                graphHandler(mynode, opacity);
                clickedNode = mynode;
            }

            function chordReset() {
                reset();

                if ($(".active_row").length != 0) {
                    d3.selectAll(".legend_row").classed("inactive", false).classed("active_row", false);
                    d3.selectAll(".chord").classed("activeSource", false).classed("activeTarget", false).classed("activeChord", false).style("opacity", "1");
                }
            }

            function graphHandler(mynode, opacity) {
                reset();
                // show again window from the top
                windowElem.scrollTop(0);

                boostBtnElem.show();

                numOfClassifiedNodes = 0;								// similar nodes found initialization

                labels = [];
                var selectedLabelData = null;


                /* text opacity for all... goes first. later some will have normal opacity*/
                vis.selectAll(".labels")
                    .style("fill-opacity", opacity * 3)
                    .style("stroke-opacity", opacity * 3);


                nodeCircles.style("fill-opacity", function (o) {
                    var isNodeConnectedBool = isNodeConnected(mynode, o);
                    var thisOpacity = isNodeConnectedBool ? normal : opacity;
                    if (!isNodeConnectedBool) this.setAttribute('style', "stroke-opacity:" + opacity + ";fill-opacity:" + opacity + ";");
                    else {
                        if (o == mynode)
                            selectedLabelData = o;
                        else
                            labels.push(o);
                    }
                    if (o == mynode)
                        return strong;
                    return thisOpacity;
                });


                nodeLabels
                    .style("fill-opacity", function (o) {
                        var isNodeConnectedBool = isNodeConnected(mynode, o);
                        var thisOpacity = isNodeConnectedBool ? strong : opacity;
                        /*if !neighbor && !this node*/
                        if (!isNodeConnectedBool) {
                            this.setAttribute('style', "stroke-opacity:" + opacity * 3 + ";fill-opacity:" + opacity * 3 + ";");
                        }
                        /*if this node*/
                        if (o == mynode)
                            return strong;
                        /*if neighbor node*/
                        return thisOpacity;
                    })
                    .style("stroke-opacity", function (o) {
                        var isNodeConnectedBool = isNodeConnected(mynode, o);
                        var thisOpacity = isNodeConnectedBool ? strong : opacity;
                        /*if !neighbor && !this node*/
                        if (!isNodeConnectedBool) {
                            this.setAttribute('style', "stroke-opacity:" + opacity * 3 + ";fill-opacity:" + opacity * 3 + ";");
                        }
                        /*if neighbor || this node*/
                        return thisOpacity;
                    });


                linkLines.style("stroke-opacity", function (o) {
                    return o.source.index === mynode.index || o.target.index === mynode.index ? normal : opacity;
                });

                labels.sort(function (a, b) {
                    return b.value - a.value
                });

                selectedLabelIndex = 0;

                mytextHandler(mynode, opacity);

                classifiedNodeButtons();

                fontsize = (fontsizeVar / (Math.sqrt(2 * previous_scale)) >= smallestFontVar) ? fontsizeVar / (Math.sqrt(2 * previous_scale)) : smallestFontVar;

                vis.selectAll(".labels")
                    .style("font-size", fontsize + "px");
            }


            function mytextHandler(mynode, opacity) {
                mytext.selectAll(".nodetext").remove();

                mytext.selectAll("div.nodetext")
                    .data([mynode].concat(labels))
                    .enter()
                    .append("div")
                    .attr("class", function (o) {
                        if (mynode.index == o.index)
                            return "nodetext " + o.color + " active";
                        return "nodetext " + o.color;
                    })
                    .html(function (o) {
                        var topicsGroupPerNode,
                            len;
                        /* maybe use: tfidf algorithm to find discriminative topics and words */
                        if (mynode == o) {
                            mytextTitleElem.empty();
                            mytextTitleElem.show();
                            mytextContentElem.show();
                            mytextTitle.append("div").append("ul")
                                .attr("class", "pagination active")
                                .attr("data-toggle", "tooltip")
                                .attr("data-placement", "right")
                                //                                .attr("title", "...more about project and link...")
                                .style("cursor", "pointer")
                                //                                .append("li").append("a").attr("class", "nodetext " + o.color + " active").attr("id",o.index).attr("style", "font-weight:400").html('<?php //echo $node_name;?>//: ' + o.name + ' <span class=\"badge badge-info\">' + o.value + "</span></br> Category: " + o.area);
                                .append("li").append("a").attr("class", "nodetext " + o.color + " active").attr("id", o.index).attr("style", "font-weight:400").html('<?php echo $node_name;?>: ' + o.name + "</br> Category: " + o.area);
                            var str = "";
                            topicsGroupPerNode = graphNodes[o.id];
                            if (topicsNotSorted != null) {
                                str += "<span style='font-size:small;z-index:500;'><br/></br> TOPICS: <br/>";
                                len = topicsGroupPerNode.length;
                                for (var i = 0; i < len; i++) {
                                    var mywords = topicsNotSorted[topicsGroupPerNode[i].topic];
                                    var wlen = mywords.length;
                                    //todo now only available in ACM
                                    if (/^ACM*/.test(experimentName))
                                        str += "<span class='topic' style='opacity:1;font-weight:600'>" + mywords[0].title + ":</span><br/>";
                                    for (var j = 0; j < wlen; j++) {
                                        var opacity;
                                        if ((opacity = mywords[j].counts / mywords[0].counts) < 0.8) {
                                            opacity = 0.8;
                                        }
                                        str += "<span class='topic' style='opacity:" + opacity + ";font-weight:400'>" + mywords[j].item + "</span>";
                                        if (j < wlen - 1)
                                            str += ",&nbsp";
                                    }
                                    str += "<br/><br/>";
                                }
                            }
                        }
                        else {
                            tagsElem.val("");
                            classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on TA-XINets inference:&nbsp;");
                            classifiedNodesHeaderElem.show();


                            var classifiedNodes = "";
//                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">" + o.value + "</span></a></li>";
                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + "</a></li>";
                            numOfClassifiedNodes++;
                            classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                            classifiedNodesElem.show();
                            fadelimit = 0.9;
                        }
                        /* move circle elements above all others within the same grouping */
//                    vis.selectAll(".circle").moveToFront();
                        vis.selectAll(".labels").moveToFront();
                        return str;
                    });

            }


            /* function returns 1 if an array contains an object or 0 if not */
            function include(arr, obj) {
                return (arr.indexOf(obj) != -1);
            }


            function compare(a, b) {
                if (a.pr < b.pr)
                    return 1;
                if (a.pr > b.pr)
                    return -1;
                return 0;
            }


            function comparegraphNodes(a, b) {
                if (a.name > b.name)
                    return 1;
                if (a.name < b.name)
                    return -1;
                return 0;
            }

            /* reset */
            function reset() {                    /* normalizeNodesAndRemoveLabels */
//                if (graphNodesElem.find("option:selected")[0] !== undefined) return 0;

                var types = [];
                $(".circle").each(function () {
                    types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])

                });

                showtype(fade_out, types);
                //mytext.selectAll(".nodetext").remove();
                $(".nodetext").remove();
                classifiedNodesElem.find("div").find("ul").empty();

                boostBtnElem.hide();

                classifiedNodesHeaderElem.hide();
                tagsElem.val("");
                classifiedNodesElem.hide();
                nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;

                filter1Elem.hide();
//                filter2Elem.hide();
                filter2Elem.show();
                mytextTitleElem.empty();
                mytextContentElem.empty();

                upButtonElem.hide();
                downButtonElem.hide();

                filtersElem.val($("#filters option:first").val());
                graphNodesElem.multiselect("deselectAll", false);
            }

            /* collide */
            function collide(nodeCircles) {
                var r = nodeCircles.radius + 50,
                    nx1 = nodeCircles.x - r,
                    nx2 = nodeCircles.x + r,
                    ny1 = nodeCircles.y - r,
                    ny2 = nodeCircles.y + r;

                return function (quad, x1, y1, x2, y2) {
                    if (quad.point && (quad.point !== nodeCircles)) {
                        var x = nodeCircles.x - quad.point.x,
                            y = nodeCircles.y - quad.point.y,
                            l = Math.sqrt(x * x + y * y),
                            r = nodeCircles.radius + quad.point.radius;

                        if (l < r) {
                            l = (l - r) / l * .5;
                            nodeCircles.x -= x *= l;
                            nodeCircles.y -= y *= l;
                            quad.point.x += x;
                            quad.point.y += y;
                        }
                    }
                    return x1 > nx2
                        || x2 < nx1
                        || y1 > ny2
                        || y2 < ny1;
                };
            }


            function isNodeDirectConnected(a, b) {
                return linkedByIndex[a.index + "," + b.index] || a.index == b.index;
            }


            function isNodeConnected(a, b) {
                return linkedByIndex[a.index + "," + b.index] || linkedByIndex[b.index + "," + a.index] || a.index == b.index;
            }


            function openLink() {
                return function (d) {
                    var url = d.slug;
                    windowElem.open(url)
                }
            }


            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
            }

            function classifiedNodeButtons() {
                counter = 0;						//(re)-initialize counter to zero
                listLength = 5;

                classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter + listLength).show();
                counter += listLength;

                upButtonElem.hide();

                if (classifiedNodesElem.find("div").find("ul").find("li:last").css('display') == 'inline')
                    downButtonElem.hide();
                else
                    downButtonElem.show();

                downButtonElem.unbind().click(function () {

                    if ((counter + listLength) < numOfClassifiedNodes) {
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter + listLength).show();
                        upButtonElem.show();
                        downButtonElem.show();
                        counter += listLength;
                    }
                    else {
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, numOfClassifiedNodes).show();
                        upButtonElem.show();
                        downButtonElem.hide();
                    }
                    console.log(counter)

                });


                upButtonElem.unbind().click(function () {

                    if (counter - listLength > 0) {
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter - listLength, counter).show();
                        upButtonElem.show();
                        downButtonElem.show();
                        counter -= listLength;
                    }
                    else {
                        counter = 0;
                        classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter + listLength).show();
                        upButtonElem.hide();
                        downButtonElem.show();
                        counter += listLength;
                    }
                    console.log(counter)

                });

                //for mobile
                classifiedNodesElem
                    .one("swipeup", function () {
                        if ((counter + listLength) < numOfClassifiedNodes) {
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter + listLength).show();
                            upButtonElem.show();
                            downButtonElem.show();
                            counter += listLength;
                        }
                        else {
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, numOfClassifiedNodes).show();
                            upButtonElem.show();
                            downButtonElem.hide();
                        }
                    })
                    .on("swipedown", function () {
                        if (counter - listLength > 0) {
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter - listLength, counter).show();
                            upButtonElem.show();
                            downButtonElem.show();
                            counter -= listLength;
                        }
                        else {
                            counter = 0;
                            classifiedNodesElem.find("div").find("ul").find("li").hide().slice(counter, counter + listLength).show();
                            upButtonElem.hide();
                            downButtonElem.show();
                            counter += listLength;
                        }
                    });

                classifiedNodesElem.find("div").find("ul").find("li").find("a")
                    .on("click", function () {
                        // for centering the node w/2 and h/3
                        var clickednodeid = this.id;
                        var dcx = (w / 2 - parseInt(vis.select("#circle-node-" + clickednodeid).attr("cx")));
                        var dcy = (h / 3 - parseInt(vis.select("#circle-node-" + clickednodeid).attr("cy")));
                        translation = [dcx, dcy];
                        vis.attr("transform", "translate(" + translation + ")");

                        $("#circle-node-" + clickednodeid).attr('class', function (index, classNames) {
                            return classNames.replace('shadow', '');
                        });

                        clickedNode = $.grep(nodes, function (obj) {
                            return obj.index == clickednodeid
                        })[0];
                        clickGraph(clickedNode, fade_out);

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
//todo previously it was like this
//                        myTabElem.find("li:first").addClass("active");
                        myTabElem.find("li:last").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");
                        legenddivElem.show();
                        legend2divElem.hide();
                    })
                    .on("mouseover", function () {
                        if ($(".active_trend").length > 0) {
                            //in order to see the classifed nodes where do they belong
                            legenddivElem.show();
                            legend2divElem.hide();
                        }

                        $("#circle-node-" + this.id).attr('class', function (index, classNames) {
                            return classNames + ' shadow';
                        });
                    })
                    .on("mouseout", function () {
                        if ($(".active_trend").length > 0) {
                            //in order to see the classifed nodes where do they belong
                            legenddivElem.hide();
                            legend2divElem.show();
                        }
                        if (graphdivElem.hasClass("active")) {
                            //in order to see the classifed nodes where do they belong
                            legenddivElem.show();
                            legend2divElem.hide();
                            pill1Elem.removeClass("disabled");
//                            pill3Elem.addClass("disabled");
                            trend0divElem.removeClass("active");
                            trend1divElem.removeClass("active");
                            trend2divElem.removeClass("active");
                            trend3divElem.removeClass("active");
                            trend4divElem.removeClass("active");
                            trend5divElem.removeClass("active");
                            trend6divElem.removeClass("active");
                        }

                        $("#circle-node-" + this.id).attr('class', function (index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                    });

                mytextTitleElem.find("div").find("ul").find("li").find("a")
                    .on("click", function () {
                        // for centering the node w/2 and h/3
                        var clickednodeid = this.id;
                        var dcx = (w / 2 - parseInt(vis.select("#circle-node-" + clickednodeid).attr("cx")));
                        var dcy = (h / 3 - parseInt(vis.select("#circle-node-" + clickednodeid).attr("cy")));
                        translation = [dcx, dcy];
                        vis.attr("transform", "translate(" + translation + ")");

                        $("#circle-node-" + clickednodeid).attr('class', function (index, classNames) {
                            return classNames.replace('shadow', '');
                        });

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:last").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");
                    })
                    .on("mouseover", function () {
                        $("#circle-node-" + this.id).attr('class', function (index, classNames) {
                            return classNames + ' shadow';
                        });
                    })
                    .on("mouseout", function () {
                        $("#circle-node-" + this.id).attr('class', function (index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                    });

            }

            /**** TICK FUNCTIONS ****/
            function browseTick(firsttime) {
                $(".loading").remove();

                nodeCircles
                /* transition animates the elements selected. In browsing we don't need it */
                //                    .transition()
                //                    .duration(200)
                    .attr("cx", function (d) {
                        /* http://stackoverflow.com/questions/21344340/sematic-zooming-of-force-directed-graph-in-d3 */
                        return translation[0] + scaleFactor * d.x;
                    })
                    .attr("cy", function (d) {
                        return translation[1] + scaleFactor * d.y;
                    });


                linkLines
                /* transition animates the elements selected. In browsing we don't need it */
                //                    .transition()
                //                    .duration(200)
                    .attr("x1", function (d) {
                        return translation[0] + scaleFactor * d.source.x;
                    })
                    .attr("y1", function (d) {
                        return translation[1] + scaleFactor * d.source.y;
                    })
                    .attr("x2", function (d) {
                        return translation[0] + scaleFactor * d.target.x;
                    })
                    .attr("y2", function (d) {
                        return translation[1] + scaleFactor * d.target.y;
                    });

                if (firsttime) {            // true every time we change similarity or experiment
                    findTopicLabels();
                    loadLabels();
                }

                /* after creating the labels we put them in nodeLabels variable */

                fontsize = (fontsizeVar / (Math.sqrt(2 * previous_scale)) >= smallestFontVar) ? fontsizeVar / (Math.sqrt(2 * previous_scale)) : smallestFontVar;


                nodeLabels
                //                    .transition()
                //                    .duration(200)
                    .attr("x", function (d) {
                        return (translation[0] + scaleFactor * d.x + 7)
                    })
                    .attr("y", function (d) {
                        return (translation[1] + scaleFactor * d.y - 7)
                    })
                    //				.text(function(d){return d.index;});
                    .text(function (d) {

                        if (labeled[d.index]) {
                            if (firsttime) {
                                label[d.index] = "";
                                // console.log("topicWords printed on graph:");
                                for (i = 0; i < svgSortedTopicWords.length; i++) {
                                    if (svgSortedTopicWords[i].key == d.index) {
                                        if (!labelIsOnGraph[svgSortedTopicWords[i].item]) {
                                            label[d.index] = svgSortedTopicWords[i].item;
                                            // console.log("svgSortedTopicWords["+i+"].key="+svgSortedTopicWords[i].key+" label="+label);
                                            labelIsOnGraph[label[d.index]] = true;
                                        }
                                        break;
                                    }
                                }
                            }

                            if ((links[d.index].value > similarityThr - (0.2 * previous_scale)) && (nodeConnections[d.index] > (nodeConnectionsThr / Math.sqrt(previous_scale)) * maxNodeConnections)) {
                                return label[d.index];
                            }
                            else {
                                return "";
                            }
                        }
                    });

                vis.selectAll(".labels")
                    .style("font-size", fontsize + "px");


                /* move circle elements above all others within the same grouping */
                //			vis.selectAll(".circle").moveToFront();
                vis.selectAll(".labels").moveToFront();

            };


            function findTopicLabels() {
//NMP
                /* The following code is executed only when the ajaxGraphCall has loaded all the Topics */
                // documentElem.ajaxComplete(function() { 	// if "ajaxComplete" the code is executed every time one of the ajaxCalls is completed
                // documentElem.bind("topicsDone",function() {	// if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxGraphCall has loaded all the Topics

                k = 0,
                    n = nodes.length,
                    topicsMap = {},
                    discriminativeTopic = {},
                    discriminativeTopicWeight = {},
                    discriminativeWord = {},
                    discriminativeWordCounts = {};


                /* maybe use: tfidf algorithm to find discriminative topics and words */

                while (++k < n) {

                    /* temporarily we find if a node has high-connectivity (3/7 at least of the maximum node's connectivity) */
//				if(links[nodes[k].index].value>0.75){

                    if ((nodeConnections[nodes[k].index] > maxNodeConnectionsThr * maxNodeConnections) && links[nodes[k].index] !== undefined && (links[nodes[k].index].value > linkThr)) {		//afou maxNodeConnections=24 tha broume ta topics se omades toulaxiston twn 4 kai pou einai toulaxiston se kontini apostasi metaksu tous

                        topicsGroupPerNode = graphNodes[nodes[k].id];
                        /* in order to find the most discriminative topic we find all the topics in a group with high-connectivity and we find the topic with the max weight
                         if all the topics are unique. If they are not then in the topics that occur in the group more than one times we multiply the weight of the topic
                         with the number occured in group and find the topic with the max weight again
                         */
                        /* algorithm steps */
                        /* Step 1: get the all the topics of the node */
                        len = topicsGroupPerNode.length;

                        /* Step 2: temporarily set the most discriminative topic as the first and in the end the true one will occur with the algorithm */
                        discriminativeTopic[nodes[k].index] = topicsGroupPerNode[0].topic;
                        discriminativeTopicWeight[nodes[k].index] = topicsGroupPerNode[0].weight;
                        // console.log("IN k ="+k+": initial discriminativeTopic = "+discriminativeTopic[nodes[k].index]+" with weight = "+discriminativeTopicWeight[nodes[k].index])

                        for (i = 0; i < len; i++) {
                            topicPerTopicsGroup = topicsGroupPerNode[i].topic;
                            weightPerTopicsGroup = topicsGroupPerNode[i].weight;
                            /* Step 3: foreach of the node's topics get their 'discriminativity'-weight and how many times they reoccur in the other nodes of the node's group of nodes */
                            // the below must each time be set to 1 not only at the beginning
                            topicsMap[topicPerTopicsGroup] = 1;

                            for (j = 0; j < nodesInGroup[nodes[k].index].length; j++) {
                                neighborNode = nodesInGroup[nodes[k].index][j];
                                if (nodes[neighborNode] != null) {
                                    neighborTopicsGroupPerNode = graphNodes[nodes[neighborNode].id];
                                    neighborLen = neighborTopicsGroupPerNode.length;
                                    for (nl = 0; nl < neighborLen; nl++) {
                                        if (topicPerTopicsGroup == neighborTopicsGroupPerNode[nl].topic) {
                                            topicsMap[topicPerTopicsGroup] += 1;
                                        }
                                    }
                                }
                            }
                            /* Step 4: After finishing the parsing of all the other nodes in group we multiply the topics' weights with the times they appeared in all groups' nodes and we hold the most discriminative*/
                            if (discriminativeTopicWeight[nodes[k].index] < weightPerTopicsGroup * topicsMap[topicPerTopicsGroup]) {
                                discriminativeTopicWeight[nodes[k].index] = weightPerTopicsGroup * topicsMap[topicPerTopicsGroup];
                                discriminativeTopic[nodes[k].index] = topicPerTopicsGroup;
                            }
                        }
                        /*Step 5: print the final discriminative topic*/
                        // console.log("IN k ="+k+" the disciminative topic is "+discriminativeTopic[nodes[k].index]);
                    }
                }

                // mexri edw brika to pio discriminative topic me to opoio tha sunexisw st epomeno bima

                k = 0;
                var searchWords = "";

                while (++k < n) {

                    /* algorithm steps */
                    /* Step 1: if the node has a lot of connection as found from the previous loop, then a discriminative topic exists and so we take it */
                    if (discriminativeTopic[nodes[k].index] != null) {
                        mywords = topicsNotSorted[discriminativeTopic[nodes[k].index]];
                        wlen = mywords.length;
                        neighborNode;

                        /* Step 2: temporarily set the most discriminative word as the first word in topic and in the end the true one will occur with the algorithm */
                        var ii = 0;
                        searchWords = "";

                        if (ii < wlen) {
                            discriminativeWord[nodes[k].index] = mywords[ii].item;
                            ii++
                        }

                        if (ii < wlen) {
                            discriminativeWord[nodes[k].index] += "," + mywords[ii].item;
                            ii++
                        }

                        if (ii < wlen) {
                            discriminativeWord[nodes[k].index] += "," + mywords[ii].item;

                            //todo edw mpainoun ta titles anti oi 3 lekseis
                            //todo now only available in ACM  --- the below replaces the above lines and puts on graph the title
                            if (/^ACM*/.test(experimentName))
                                discriminativeWord[nodes[k].index] = mywords[ii].title;

                            discriminativeWordCounts[nodes[k].index] = mywords[0].counts;
                            // console.log("IN k="+k+" FIRST discriminativeWord="+discriminativeWord[nodes[k].index]+" with counts = "+discriminativeWordCounts[nodes[k].index]);


                            /* for the d3 printing on the svg if there exists a label for this node and if this label is placed elsewhere*/
                            labeled[nodes[k].index] = 1;
                            labelIsOnGraph[discriminativeWord[nodes[k].index]] = false;

                            /* use sorting to avoid item multiply printed in d3 graph */
                            svgSortedTopicWords.push({
                                key: nodes[k].index,
                                name: nodes[k].name,
                                key_k: k,
                                item: discriminativeWord[nodes[k].index],
                                value: discriminativeWordCounts[nodes[k].index],
                                area: nodes[k].color
                            });
                            topicWords[nodes[k].index] = discriminativeWord[nodes[k].index];
                            // console.log("IN k="+k+" FINAL discriminativeWord="+discriminativeWord[nodes[k].index]+" with counts = "+discriminativeWordCounts[nodes[k].index]);
                        }
                    }
                }

                // console.log("Topics' words")
                // for (i=0 ; i<svgSortedTopicWords.length ; i++)
                // console.log("key="+svgSortedTopicWords[i].key+" item="+svgSortedTopicWords[i].item+" value="+svgSortedTopicWords[i].value);

                /* sort by value the map of most discrimitive topic word per multi connected nodes */
                svgSortedTopicWords.sort(function (a, b) {
                    return a.value - b.value;
                });

                /* reverse the map in order to be in a descending sorting */
                svgSortedTopicWords.reverse();	// done in another way... now it is not needed

                // console.log("Sorted Topics' words")
                //for (i=0 ; i<svgSortedTopicWords.length ; i++)
                // console.log("key="+svgSortedTopicWords[i].key+" item="+svgSortedTopicWords[i].item+" value="+svgSortedTopicWords[i].value)
                console.log("findtopiclabels finished")
            }


            function loadLabels() {
                availableTags = [];
                availableLabels = [];

                k = 0,
                    n = nodes.length,
                    str = "";

                while (++k < n) {
                    topicsGroupPerNode = graphNodes[nodes[k].id];
                    if (topicsNotSorted != null) {
                        len = topicsGroupPerNode.length;
                        for (var i = 0; i < len; i++) {
                            var mywords;
                            mywords = topicsNotSorted[topicsGroupPerNode[i].topic];

                            var wlen = mywords.length;

                            str = "";
                            for (var j = 0; j < wlen - 1; j++) {
                                str += mywords[j].item + ",";
                            }
                            str += mywords[j].item;

                            availableLabels.push(str);
                            //console.log("my= "+nodes[k].index+" "+nodes[k].value)
                            availableTags.push({
                                item: str,
                                index: nodes[k].index,
                                name: nodes[k].name,
                                color: nodes[k].color,
                                value: nodes[k].value
                            });
                        }
                        for (var i = 0; i < len; i++) {
                            var mywords;
                            mywords = topicsSorted[topicsGroupPerNode[i].topic];

                            var wlen = mywords.length;

                            str = "";
                            for (var j = 0; j < wlen - 1; j++) {
                                str += mywords[j].item + ",";
                            }
                            str += mywords[j].item;

                            availableLabels.push(str);
                            //console.log("my= "+nodes[k].index+" "+nodes[k].value)
                            availableTags.push({
                                item: str,
                                index: nodes[k].index,
                                name: nodes[k].name,
                                color: nodes[k].color,
                                value: nodes[k].value
                            });
                        }
                    }
                }

                tagsElem.autocomplete({
                    source: unique(availableLabels),
                    minLength: 2,

                    select: function (event, ui) {
                        classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                        autocompletelog(ui.item ?
                            ui.item.label :
                        "Nothing selected, input was " + this.value);

                        classifiedNodeButtons();

                    }
                });
            }

            /* remove duplicates */
            function unique(list) {
                var result = [];
                $.each(list, function (i, e) {
                    if ($.inArray(e, result) == -1) result.push(e);
                });
                return result;
            }

//todo na to enwsw me to apo katw autocomple
            /* autocomplete api documentation: http://api.jqueryui.com/autocomplete/ */
            function autocompletelogtrends(message, title) {
                var classifiedNodes = "";
                var searchResultNodes = [];				//initialize every time in topic word search

                mytextTitleElem.empty();
                mytextTitleElem.show();
                mytextTitle.append("div").append("ul")
                    .attr("class", "pagination active")
                    //                    .append("li").append("a").attr("class", "nodetext active").attr("style", "color:gray;font-weight:400").html("Selected topic description: <br/>" + tit + "<br/><br/>Topic words: <br/><small>"+tittopic+"</small>");
                    .append("li").append("a").attr("class", "nodetext active").attr("style", "color:gray;font-weight:400").html("Selected topic description: <br/>" + title + "<br/><br/>Topic words: <br/><small>" + message + "</small>");

                tagsElem.attr("title", message);

                classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on topic words/phrases inference:&nbsp");
                classifiedNodesHeaderElem.show();


                for (i = 0; i < availableTags.length; i++) {
                    if (message == availableTags[i].item) {
//                        classifiedNodes += "<li class=\"" + availableTags[i].color + "result\"><a class=\"" + availableTags[i].color + "result \" id=\"" + availableTags[i].index + "\">" + availableTags[i].name + " <span class=\"badge badge-info\">"+ availableTags[i].value +"</span></a></li>";
                        classifiedNodes += "<li class=\"" + availableTags[i].color + "result\"><a class=\"" + availableTags[i].color + "result \" id=\"" + availableTags[i].index + "\">" + availableTags[i].name + "</a></li>";

                        searchResultNodes.push(availableTags[i].index);	//node results in topic word search

                        $('#' + availableTags[i].index).hover(function () {
                            $(this).css("color", "inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
                            $(this).css("opacity", "0.5");
                        }, function () {
                            $(this).css("opacity", "initial");
                            $(this).css("color", "inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
                        });
                    }
                }

                classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                classifiedNodesElem.show();
                fadelimit = 0.9;

                mytextContentElem.hide();
                boostBtnElem.hide();


///initialize
                var types = [];
                $(".circle").each(function () {
                    types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])

                });
                showtype(fade_out, types);
///find what to show
                showtype(fade_out, searchResultNodes);
                // not show links in this ocassion
                linkLines.style("stroke-opacity", function (o) {
                    return fade_out;
                });

            }

            /* autocomplete api documentation: http://api.jqueryui.com/autocomplete/ */
            function autocompletelog(message) {
                var classifiedNodes = "";
                var searchResultNodes = [];				//initialize every time in topic word search

                mytextTitleElem.empty();
                mytextTitle.append("div").append("ul")
                    .attr("class", "pagination active")
                    .attr("title", "topic word search result")
                    .append("li").append("a").attr("class", " ").html("Selected topic:<br/><em>" + message + "</em>");
                mytextTitleElem.show();
                tagsElem.attr("title", message);

                classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on topic words/phrases inference:&nbsp");
                classifiedNodesHeaderElem.show();


                for (i = 0; i < availableTags.length; i++) {
                    if (message == availableTags[i].item) {
//                        classifiedNodes += "<li class=\"" + availableTags[i].color + "result\"><a class=\"" + availableTags[i].color + "result \" id=\"" + availableTags[i].index + "\">" + availableTags[i].name + " <span class=\"badge badge-info\">"+ availableTags[i].value +"</span></a></li>";
                        classifiedNodes += "<li class=\"" + availableTags[i].color + "result\"><a class=\"" + availableTags[i].color + "result \" id=\"" + availableTags[i].index + "\">" + availableTags[i].name + "</a></li>";

                        searchResultNodes.push(availableTags[i].index);	//node results in topic word search

                        $('#' + availableTags[i].index).hover(function () {
                            $(this).css("color", "inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
                            $(this).css("opacity", "0.5");
                        }, function () {
                            $(this).css("opacity", "initial");
                            $(this).css("color", "inherit");		// for this to work I put the same class name in the <li> parent element of the <a> element
                        });
                    }
                }

                classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                classifiedNodesElem.show();
                fadelimit = 0.9;

                mytextContentElem.hide();
                boostBtnElem.hide();


///initialize
                var types = [];
                $(".circle").each(function () {
                    types.push(parseInt(this.classList[2])); // same as : types.push($(this).attr('class').split(' ')[2])

                });
                showtype(fade_out, types);
///find what to show
                showtype(fade_out, searchResultNodes);
                // not show links in this ocassion
                linkLines.style("stroke-opacity", function (o) {
                    return fade_out;
                });

            }

            function redirectUrl(url) {
                window.open(url, '_blank');
            }

            function initialTick(e) {
                // do not render initialization frames because they are slow and distracting

                if (e.alpha < 0.04) {

                    vis.select(".loading").remove();
                    storeGraph();
                    browseTick(true);
                    force.stop();
                    $.event.trigger({               //trigger for charge and gravity change
                        type: "myTrigger",
                        message: "myTrigger fired.",
                        time: new Date()
                    });
                }
                else {
//				if (e.alpha < 0.015) {
//                    if (e.alpha < 0.04) {
                    var q = d3.geom.quadtree(nodes),				//ftiaxnei tous kombous se sxima quadtree
                        i = 0,
                        n = nodes.length;
                    while (++i < n) {
                        q.visit(collide(nodes[i]));
                    }
//                    }
                    loadingText.text(function () {
                        // before for alpha < 0.01 below instead of 143 was 100
                        return "Loading: " + Math.round((1 - (e.alpha * 10 - 0.1)) * 143) + "%"
                    });
                }
            }


            function jsonTick(e) {
                vis.select(".loading").remove();
                browseTick(true);
                force.stop()
            }

            /**** AJAX FUNCTIONS ****/


            function graphLoad() {

                jsonfilename = "data/graph_" + experimentName + "_" + expsimilarity + "_" + gravity + "_" + charge + ".json";
                graphPositionsExist = UrlExists(jsonfilename);  //graph positions set true if json file exists

                if (graphPositionsExist) {
                    $.when(getJSONpositions(), ajaxGraphCall(experimentName, expsimilarity)).done(function (a1, a2) {      // waits for both ajax calls to finish and when done then renders the page
                        renderPageData = a2[0].resp;
                        renderpage(renderPageData);
                    });
                }
                else {
                    graphPositionsExist = false;
                    $.when(ajaxGraphCall(experimentName, expsimilarity)).done(function (a1) {   // waits for the ajaxGraphCall() to finish and when done then renders the page
                        renderPageData = a1.resp;
                        renderpage(renderPageData);
                    });
                }
            }


            function getJSONpositions() {
                // NOTE:  This function must return the value
                //        from calling the $.ajax() method.
                return $.getJSON(jsonfilename).done(function (json) {
                    jsonNodes = $.parseJSON(json.nodes);
                    console.log ("as")
                    jsonLinks = $.parseJSON(json.links);
                }).fail(function () {
                    console.log("error in json position reading file");
                });
            }

            function dothework(response, trendindex) {
                //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
                var result = pivot(response, ['year'], ['id'], {});
                var line;
                line = "quarter";
                for (var k = 0; k < result.columnHeaders.length; k++) {
                    line += "," + result.columnHeaders[k];
                    columns.push(parseInt(result.columnHeaders[k]));
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

                $.ajax({
                    type: "POST",
                    async: true,
                    url: "./fileCreator.php",
                    dataType: 'text',		// this is json if we put it like this JSON object
                    data: {
                        /*        json : JSON.stringify(jsonObject) /* convert here only */
                        func: "csv",
                        csv: line,
                        id: trendindex      // id for distinguishing trends
                    },
                    success: function () {
                        //   console.log("CSV file Created")
                    },
                    error: function (e) {
                        console.log("Error in file Creation:" + e);
                    }
                })
            }

            function chordcsvcreator(response, trendindex) {
                //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
                var result = pivot(response, ['year'], ['id'], {});
                var line;
                line = "quarter";
                for (var k = 0; k < result.columnHeaders.length; k++) {
                    line += "," + result.columnHeaders[k];
                    columns.push(parseInt(result.columnHeaders[k]));
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

                $.ajax({
                    type: "POST",
                    async: true,
                    url: "./fileCreator.php",
                    dataType: 'text',		// this is json if we put it like this JSON object
                    data: {
                        /*        json : JSON.stringify(jsonObject) /* convert here only */
                        func: "csv",
                        csv: line,
                        id: trendindex      // id for distinguishing trends
                    },
                    success: function () {
                        //   console.log("CSV file Created")
                    },
                    error: function (e) {
                        console.log("Error in file Creation:" + e);
                    }
                })
            }

            function gettrendJSONpositions(trendsjsonfilename) {
                // NOTE:  This function must return the value
                //        from calling the $.ajax() method.
                return $.getJSON(trendsjsonfilename).done(function (resp) {
                    jsonTrendsLayout = resp;
                    trends = jsonTrendsLayout.trends;
                    for (var i = 0; i < trends.length; i++) {
                        dothework(trends[i], i);
                    }
                    heatmap = jsonTrendsLayout.heatmap;

                }).fail(function () {
                    console.log("error in json position reading file");
                });
            }

            function getlayoutJSONpositions(layoutjsonfilename) {
                // NOTE:  This function must return the value
                //        from calling the $.ajax() method.
                return $.getJSON(layoutjsonfilename).done(function (resp) {
                    spinner.stop();
                    jsonLayout = resp;
                    //documentElem.bind("graphDone",function() {    // if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxGraphCall has loaded all the Topics
                    topicsNotSorted = jsonLayout.topicsNoSort;
                    topicsSorted = jsonLayout.topics;
                    graphNodes = jsonLayout.nodes;
                    experiments = jsonLayout.expers;
                }).fail(function () {
                    console.log("error in json position reading file");
                });
            }


            function UrlExists(url) {
                var http = new XMLHttpRequest();
                http.open('HEAD', url, false);
                http.send();
                return http.status != 404;
            }


            function ajaxGraphCall(experiment, expsimilarity) {

//todo epitides to allaksa to apo katw gia na min to brei kai na ektelestei to ajaxtrends gia na parw ta kainouriga dedomena
                if (/^ACM*/.test(experimentName)) {

//todo create respective html
// add dynamically html elements for every trend
//                    for (var i = 0; i < trendsNum; i++) {
//                        var liid = "trendmenu" + i;
//                        var litarget = "#trend" + i + "div";
//                        trendmenudataElem.append("li").append("a").attr("id", liid).attr("data-toggle", "tab").attr("data-target", litarget).attr("href", "#").attr("target", "_blank").html("ACM Topic Trend Analysis 1950-2011");
//                    }


                    alltrendscsvFilesExist = false;
                    for (var i = 0; i < trendsNum; i++) {
                        var trendsCSVfile = "../data/trendscsv" + i + ".csv";
                        alltrendscsvFilesExist = UrlExists(trendsCSVfile);
// todo tha prepei gia na isxuei to parakatw na exw panta tis teleutaies baseis... diaforetika tha prepei na sbinw apo to server ta palia arxeia
// if all trends csv files exist then there is no need to generate them again and make a server call
                        if (alltrendscsvFilesExist == 0)
                            break;
                    }

                    // if all trends csv files don't exist then we need to make a server call
                    if (!alltrendscsvFilesExist) {
                        ajaxTrendsCall(experiment);
                    }
                }
                console.log("ajaxCall for graph layout: " + experiment);


                var layoutjsonfilename = "../../../data/layout_" + experiment + "_" + expsimilarity + ".json";
//                trendsjsonfilename = "../data/trends1.json";
                var layoutFileExist = UrlExists(layoutjsonfilename);  //graph positions set true if json file exists

                // if exists there is no need to query the DB
                if (layoutFileExist) {
                    return getlayoutJSONpositions(layoutjsonfilename);
                }
                else {
                    layoutFileExist = false;

                    var url = "./dbfront.php";

                    return $.ajax({
                        type: "GET",
                        async: true,
                        url: url,
                        data: "s=" + expsimilarity + "&ex=" + experiment,
                        success: function (resp) {
                            spinner.stop();
                            jsonLayout = JSON.parse(resp);
                            //documentElem.bind("graphDone",function() {    // if "bind" the code is executed every time the "topicsDone" is triggered. In this code it is triggered when the ajaxGraphCall has loaded all the Topics
                            topicsNotSorted = jsonLayout.topicsNoSort;
                            topicsSorted = jsonLayout.topics;
                            graphNodes = jsonLayout.nodes;
                            experiments = jsonLayout.expers;
//                        graphElem.children().attr("style","z-index:1000")
                        },
                        error: function (e) {
                            alert('Error: ' + JSON.stringify(e));
                        }
                    });
                }
            }


            function ajaxTrendsCall(experiment) {
                console.log("ajaxCall for trend layout: " + experiment);

                trendsjsonfilename = "../../../data/trends_" + experiment + ".json";
//                trendsjsonfilename = "../data/trends1.json";
                trendsFileExist = UrlExists(trendsjsonfilename);  //graph positions set true if json file exists

                // if exists there is no need to query the DB
                if (trendsFileExist) {
                    console.log("exists")

                    return gettrendJSONpositions(trendsjsonfilename);
                }
                else {
                    console.log("notexists")
                    trendsFileExist = false;
                    var url = "./trends.php";

                    //todo na ta metaferw server side http://stackoverflow.com/questions/10649419/pivot-tables-php-mysql
                    return $.ajax({
                        type: "GET",
                        async: true,
                        url: url,
                        data: "ex=" + experiment,
                        success: function (resp) {
                            jsonTrendsLayout = JSON.parse(resp);
                            //distribution = jsonTrendsLayout.distribution;
                            heatmap = jsonTrendsLayout.heatmap;
                            trends = jsonTrendsLayout.trends;

                            for (var i = 0; i < trendsNum; i++) {
                                dothework(trends[i], i);
                            }

// todo to be uncommented if stand alone and topics not loaded from graph visualization ... uncomment also in trends_code.php
//                        topicsNotSorted = jsonTrendsLayout.topicsNoSort;
//                        topicsSorted = jsonTrendsLayout.topics;

                        },
                        error: function (e) {
                            alert('Error: ' + JSON.stringify(e));
                        }
                    });
                }
            }

            function storeGraph() {
                // we send data with POST
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    async: false,
                    url: './saveGraphPositions.php',
                    data: {
                        datanodes: JSON.stringify(force.nodes()),
                        datalinks: JSON.stringify(force.links()),
                        similarity: expsimilarity,
                        experiment: experimentName,
                        gravity: gravity,
                        charge: charge
                    },
                    success: function () {
                        alert("Thanks!");
                    },
                    failure: function () {
                        alert("Error!");
                    }
                });
            }


            /**** RENDERING FUNCTIONS ****/
            /* renderpage called from ajax */
            function renderpage(response) {
                pillsElem.show();
//                pillsElem.attr("style","z-index:-1");
                legend_data = [];
                max_proj = 0;
                var type_hash = [];
                node_hash = [];
                var nodeCnt = 0;

                // because there in d3 there are 20 colors of 10 colors presented in two-shades each, we seperate them and rearrange them. We firstly put the light shades of colors to subdivisions with a lot of projects and them the strong shades to subdivisions with few projects in order to see them crearer.
                var colorCnt = 0;
                var nodetype = 0;
                var nodeindex = 0;

                for (var j = 0; j < response.length; j++) {
                    if (typeof node_hash[response[j].node1id] === "undefined") {
                        if (/^FET*/.test(experimentName)) {
                            response[j].category1_2 = response[j].category1_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            nodeindex = type_hash.indexOf(response[j].category1_2);
                            if (nodeindex != -1) {
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else {
                                type_hash.push(response[j].category1_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length - 1] = {};
                                legend_data[type_hash.length - 1].name = response[j].category1_2;
                                legend_data[type_hash.length - 1].pr = 1;
                                legend_data[type_hash.length - 1].desc = response[j].category1_3descr;

                                // if we want to have darker stroke, augment it to 2 or more
                                if (response[j].category1_1 == "FETOpen") {
                                    style.innerHTML += "." + response[j].category1_2 + "{stroke:" + d3.rgb("#1f77b4").darker(1) + "; fill:" + "#1f77b4" + "; background-color:" + "#1f77b4" + "; color:" + "#1f77b4" + ";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "." + response[j].category1_2 + "result{stroke:" + d3.rgb("#1f77b4").darker(1) + "; fill:" + "#1f77b4" + "; color:" + "#1f77b4" + ";} ";
                                    fetOpenNum++;
                                }
                                else if (response[j].category1_1 == "FETProactive") {
                                    style.innerHTML += "." + response[j].category1_2 + "{stroke:" + d3.rgb("#ff7f0e").darker(1) + "; fill:" + "#ff7f0e" + "; background-color:" + "#ff7f0e" + "; color:" + "#ff7f0e" + ";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "." + response[j].category1_2 + "result{stroke:" + d3.rgb("#ff7f0e").darker(1) + "; fill:" + "#ff7f0e" + "; color:" + "#ff7f0e" + ";} ";
                                    fetProactiveNum++;
                                }
                                else if (response[j].category1_1 == "FETFlagship") {
                                    style.innerHTML += "." + response[j].category1_2 + "{stroke:" + d3.rgb("#2ca02c").darker(1) + "; fill:" + "#2ca02c" + "; background-color:" + "#2ca02c" + "; color:" + "#2ca02c" + ";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "." + response[j].category1_2 + "result{stroke:" + d3.rgb("#2ca02c").darker(1) + "; fill:" + "#2ca02c" + "; color:" + "#2ca02c" + ";} ";
                                    fetFlagshipNum++;
                                }
                                else {
                                    console.log("error: " + response[j].category1_2)
                                }

                                colorCnt++;
                            }

                            nodes[nodeCnt] = {
                                index: nodeCnt,
                                id: response[j].node1id,
                                name: response[j].node1name,
                                slug: "http://www.md-paedigree.eu/",
                                type: nodetype,
                                value: response[j].category1_counts,
                                FP7: response[j].category1_0,
                                FET: response[j].category1_1,
                                area: response[j].category1_2,
                                subarea: response[j].category1_2,
                                subareaDescr: response[j].category1_3descr,
                                color: response[j].category1_2
                            }; //value # of publications

                            node_hash[response[j].node1id] = nodeCnt;
                            nodeCnt++;

                        }
                        else if (/^HEALTH*/.test(experimentName)) {
                            response[j].category1_2 = response[j].category1_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            nodeindex = type_hash.indexOf(response[j].category1_2);
                            if (nodeindex != -1) {
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else {
                                type_hash.push(response[j].category1_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length - 1] = {};
                                legend_data[type_hash.length - 1].name = response[j].category1_2;
                                legend_data[type_hash.length - 1].pr = 1;
                                legend_data[type_hash.length - 1].desc = response[j].category1_3descr;
                            }

                            nodes[nodeCnt] = {
                                index: nodeCnt,
                                id: response[j].node1id,
                                name: response[j].node1name,
                                slug: "http://www.md-paedigree.eu/",
                                type: nodetype,
                                value: response[j].category1_counts,
                                FP7: response[j].category1_0,
                                FET: response[j].category1_1,
                                area: response[j].category1_2,
                                subarea: response[j].category1_2,
                                subareaDescr: response[j].category1_3descr,
                                color: response[j].category1_2
                            }; //value # of publications

                            node_hash[response[j].node1id] = nodeCnt;
                            nodeCnt++;

                        }
                        else {
                            response[j].category1_2 = response[j].category1_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category1_1 = response[j].category1_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            nodeindex = type_hash.indexOf(response[j].category1_2);
                            if (nodeindex != -1) {
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else {
                                type_hash.push(response[j].category1_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length - 1] = {};
                                legend_data[type_hash.length - 1].name = response[j].category1_2;
                                legend_data[type_hash.length - 1].pr = 1;
                                legend_data[type_hash.length - 1].desc = response[j].category1_3descr;
                            }

                            nodes[nodeCnt] = {
                                index: nodeCnt,
                                id: response[j].node1id,
                                name: response[j].node1name,
                                slug: "http://www.md-paedigree.eu/",
                                type: nodetype,
                                value: response[j].category1_counts,
                                FP7: response[j].category1_0,
                                FET: response[j].category1_1,
                                area: response[j].category1_2,
                                subarea: response[j].category1_2,
                                subareaDescr: response[j].category1_3descr,
                                color: response[j].category1_2
                            }; //value # of publications

                            node_hash[response[j].node1id] = nodeCnt;
                            nodeCnt++;
                        }

                    }

                    if (typeof node_hash[response[j].node2id] === "undefined") {
                        if (/^FET*/.test(experimentName)) {
                            response[j].category2_2 = response[j].category2_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            nodeindex = type_hash.indexOf(response[j].category2_2);
                            if (nodeindex != -1) {
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else {
                                type_hash.push(response[j].category2_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length - 1] = {};
                                legend_data[type_hash.length - 1].name = response[j].category2_2;
                                legend_data[type_hash.length - 1].pr = 1;
                                legend_data[type_hash.length - 1].desc = response[j].category2_3descr;


                                if (response[j].category2_1 == "FETOpen") {
                                    style.innerHTML += "." + response[j].category2_2 + "{stroke:" + d3.rgb("#1f77b4").darker(1) + "; fill:" + "#1f77b4" + "; background-color:" + "#1f77b4" + "; color:" + "#1f77b4" + ";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "." + response[j].category2_2 + "result{stroke:" + d3.rgb("#1f77b4").darker(1) + "; fill:" + "#1f77b4" + "; color:" + "#1f77b4" + ";} ";
                                    fetOpenNum++;
                                }
                                else if (response[j].category2_1 == "FETProactive") {
                                    style.innerHTML += "." + response[j].category2_2 + "{stroke:" + d3.rgb("#ff7f0e").darker(1) + "; fill:" + "#ff7f0e" + "; background-color:" + "#ff7f0e" + "; color:" + "#ff7f0e" + ";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "." + response[j].category2_2 + "result{stroke:" + d3.rgb("#ff7f0e").darker(1) + "; fill:" + "#ff7f0e" + "; color:" + "#ff7f0e" + ";} ";
                                    fetProactiveNum++;
                                }
                                else if (response[j].category2_1 == "FETFlagship") {
                                    style.innerHTML += "." + response[j].category2_2 + "{stroke:" + d3.rgb("#2ca02c").darker(1) + "; fill:" + "#2ca02c" + "; background-color:" + "#2ca02c" + "; color:" + "#2ca02c" + ";} ";
                                    /* styling for results in autocomplete search */
                                    style.innerHTML += "." + response[j].category2_2 + "result{stroke:" + d3.rgb("#2ca02c").darker(1) + "; fill:" + "#2ca02c" + "; color:" + "#2ca02c" + ";} ";
                                    fetFlagshipNum++;
                                }
                                else {
                                    console.log("error: " + response[j].category2_1)
                                }


                                colorCnt++;
                            }

                            nodes[nodeCnt] = {
                                index: nodeCnt,
                                id: response[j].node2id,
                                name: response[j].node2name,
                                slug: "http://www.md-paedigree.eu/",
                                type: nodetype,
                                value: response[j].category2_counts,
                                FP7: response[j].category2_0,
                                FET: response[j].category2_1,
                                area: response[j].category2_2,
                                subarea: response[j].category2_2,
                                subareaDescr: response[j].category2_3descr,
                                color: response[j].category2_2
                            }; //value # of publications
                            node_hash[response[j].node2id] = nodeCnt;
                            nodeCnt++;
                        }
                        else if (/^HEALTH*/.test(experimentName)) {
                            response[j].category2_2 = response[j].category2_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            nodeindex = type_hash.indexOf(response[j].category2_2);
                            if (nodeindex != -1) {
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else {
                                type_hash.push(response[j].category2_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length - 1] = {};
                                legend_data[type_hash.length - 1].name = response[j].category2_2;
                                legend_data[type_hash.length - 1].pr = 1;
                                legend_data[type_hash.length - 1].desc = response[j].category2_3descr;
                            }

                            nodes[nodeCnt] = {
                                index: nodeCnt,
                                id: response[j].node2id,
                                name: response[j].node2name,
                                slug: "http://www.md-paedigree.eu/",
                                type: nodetype,
                                value: response[j].category2_counts,
                                FP7: response[j].category2_0,
                                FET: response[j].category2_1,
                                area: response[j].category2_2,
                                subarea: response[j].category2_2,
                                subareaDescr: response[j].category2_3descr,
                                color: response[j].category2_2
                            }; //value # of publications
                            node_hash[response[j].node2id] = nodeCnt;
                            nodeCnt++;
                        }
                        else {
                            response[j].category2_2 = response[j].category2_2.replace(/[ ,+.~!@#$%^&*()=`|:;'<>\{\}\[\]\\\/?]/g, '-');
                            //					response[j].category2_1 = response[j].category2_1.replace(/(.+?)\ (.+?)/, '$1-$2')
                            nodeindex = type_hash.indexOf(response[j].category2_2);
                            if (nodeindex != -1) {
                                nodetype = nodeindex;
                                legend_data[nodeindex].pr++;
                            }
                            else {
                                type_hash.push(response[j].category2_2);
                                nodetype = type_hash.length;
                                legend_data[type_hash.length - 1] = {};
                                legend_data[type_hash.length - 1].name = response[j].category2_2;
                                legend_data[type_hash.length - 1].pr = 1;
                                legend_data[type_hash.length - 1].desc = response[j].category2_3descr;
                            }

                            nodes[nodeCnt] = {
                                index: nodeCnt,
                                id: response[j].node2id,
                                name: response[j].node2name,
                                slug: "http://www.md-paedigree.eu/",
                                type: nodetype,
                                value: response[j].category2_counts,
                                FP7: response[j].category2_0,
                                FET: response[j].category2_1,
                                area: response[j].category2_2,
                                subarea: response[j].category2_2,
                                subareaDescr: response[j].category2_3descr,
                                color: response[j].category2_2
                            }; //value # of publications
                            node_hash[response[j].node2id] = nodeCnt;
                            nodeCnt++;
                        }
                    }
                    // the links only once between two nodes and after they have created because of node1 and node2
                    links[j] = {
                        source: parseInt(node_hash[response[j].node1id]),
                        target: parseInt(node_hash[response[j].node2id]),
                        value: response[j].Similarity
                    };

// uncomment below to see how it works
//				console.log("source "+j +"="+links[j].source+" -- target "+j +"="+links[j].target);
                }

                nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;

                var median = 0;
                for (j = 0; j < links.length; j++) {
                    median = (parseFloat(links[j].value) + parseFloat(j * median)) / parseFloat(j + 1);
                }


                for (var j = 0; j < links.length; j++) {
                    // console.log("links["+j+"]: source="+links[j].source+", target="+links[j].target+", value="+links[j].value);

                    if (links[j].value > 0.77) {
                        if (nodeConnections[links[j].source] == null)
                            nodeConnections[links[j].source] = 0;
                        if (nodeConnections[links[j].target] == null) {
                            nodeConnections[links[j].target] = 0;
                        }

                        /*  */
                        if (nodesInGroup[links[j].source] == null)
                            nodesInGroup[links[j].source] = [];

                        /* if j is not already in the array */
                        if (include(nodesInGroup[links[j].source], j) != -1)
                            nodesInGroup[links[j].source].push(j);

                        if (nodesInGroup[links[j].target] == null)
                            nodesInGroup[links[j].target] = [];

                        /* if j is not already in the array */
                        if (include(nodesInGroup[links[j].target], j) != -1)
                            nodesInGroup[links[j].target].push(j);

                        nodeConnections[links[j].source] += 1;
                        nodeConnections[links[j].target] += 1;
                    }
                }


                for (var j = 0; j < nodeConnections.length; j++) {
                    if (maxNodeConnections < nodeConnections[j])
                        maxNodeConnections = nodeConnections[j];
                }
                console.log("maxNodeConnections = " + maxNodeConnections);
                category1Elem.find("a").find("span").html(fetOpenNum)
                category2Elem.find("a").find("span").html(fetProactiveNum)
                category3Elem.find("a").find("span").html(fetFlagshipNum)


                for (var i = 0; i < legend_data.length; i++) {
                    if (legend_data[i].pr > max_proj)
                        max_proj = legend_data[i].pr;
                }

                // needed when the graph loads from json in update()
                findTopicLabels();
                loadLabels();

                update();

                legend_data.sort(compare);  // sort legend from max_nodes to min_nodes
                legend_data.forEach(function (d, i) { //sort coloring on legends
                    if (!/^FET*/.test(experimentName)) {       // when the experiment is a FET experiment then we need different coloring done above with legend_data creation
                        // if we want to have darker stroke, augment it to 2 or more
                        style.innerHTML += "." + d.name + "{stroke:" + d3.rgb(clr[i]).darker(1) + "; fill:" + clr[i] + "; background-color:" + clr[i] + "; color:" + clr[i] + ";} ";
                        /* styling for results in autocomplete search */
                        style.innerHTML += "." + d.name + "result{stroke:" + d3.rgb(clr[i]).darker(1) + "; fill:" + clr[i] + "; color:" + clr[i] + ";} ";
                    }
                });

                nodes.sort(comparegraphNodes);

                createJsonFile();
                createCSVFile();

                rows = null;
                rows = legend.selectAll("tr")
                    .data(legend_data);
                rows
                    .enter()
                    .append("tr")
                    .style("height", "10px")
                    .attr("class", "legend_row")
                    .attr("id", function (d) {
                        return "legend_row" + d.name;
                    })
                    .attr("data-toggle", "tooltip")
                    .attr("data-placement", "bottom")
                    .attr("title", function (d) {
                        return d.desc;
                    })
                    //.on("click",chord_click(d,i));
                    .on("click", legendHandler);
//                .on("click",chordHandler);
                //.style("width","140px");

                rows.append("td")
                    .append("div")
                    .style("width", "60px")
                    .style("height", "100%")
                    .text(function (d, i) {
                        return d.name;
                    });

                rows.append("td")
                    .append("div")
                    .style("width", "80px")
                    .style("height", "100%")
                    .attr("class", "bar")
                    .append("div")
                    .style("height", "10px")
                    .attr("class", function (d) {
                        return d.name;
                    })
                    .style("width", function (d) {
                        return Math.ceil(80 * d.pr / max_proj);
                    });
                //.text(function(d,i){return d.name;});

                rows.append("td")
                    .append("div")
                    .style("width", "40px")
                    .style("height", "100%")
                    .text(function (d) {
                        return numberWithCommas(d.pr);
                    });


                rows//.append("td")
                    .append("div")
                    //				.attr("class","btn btn-primary btn-block")
                    .attr("class", "subd-vcenter btn-primary btn-block")
                    // .attr("type","button")
                    .style("height", "100%")
                    .attr("data-toggle", "collapse")
                    .attr("data-target", function (d) {
                        return "#collapse" + d.name;
                    })
                    .attr("aria-expanded", "false")
                    .attr("aria-controls", function (d) {
                        return "#collapse" + d.name;
                    })
                    .append("center")
                    .append("i")
                    .attr("class", "glyphicon glyphicon-chevron-down");


                rows
                    .enter()
                    .append("tr")
                    .attr("id", function (d) {
                        return "collapse" + d.name;
                    })
                    .attr("class", "collapse ")
                    .attr("style", "cursor:default")
                    //				.attr("class",function(d) {return "collapse "+d.name;})
                    .append("td")
                    .attr("colspan", "4")
                    .append("div")
                    .attr("display", "table");

                rows
                    .each(function (d, i) {
                        $("#collapse" + d.name)
                            .html(function () {
                                for (var i = 0; i < subdConnections.length; i++) {
                                    if (subdConnections[i] == d.name) {
                                        var str = "";
                                        var stringout = "";
                                        str += "<td colspan='4'><div class='table table-condensed table-striped'><div class='table-row-group' style='overflow-y:scroll;height:" + windowElem.height() / 4 + "'><div class='row'><div class='cell' style='border-top:solid'>Area </div><div class='cell' style='border-top:solid'>Relations</div></div>";

                                        for (var j = 0; j < subdConnections.length; j++) {
                                            stringout += subdConnections[j]+",";
                                        }
                                        stringout += "\n"+ d.name;
                                        for (var j = 0; j < subdConnections.length; j++) {
                                            subdConnections.forEach(function (z) {
                                                if (z == d.name) {
                                                    if (z != subdConnections[j].name) {

                                                        percentageSum = subdBiConnectionsNum[i][j] + subdBiConnectionsNum[j][i];
//                                                        percentageSum = subdBiConnectionsNum[i][j];
// previous on 20150907 backup
                                                        if (percentageSum > 0) {
                                                            str += "<div class='row'><div class='cell' style='color:" + rgb2hex(clrArray[j]) + ";'><div>" + subdConnections[j] + "</div></div>"
                                                                + "<div class='cell' style='color:" + rgb2hex(clrArray[j]) + ";'>"
                                                                + percentageSum
                                                                + "</div></div>";
                                                        }
                                                    }
                                                    else {
                                                        if (subdBiConnectionsNum[i][i] > 0) {

                                                            str += "<div class='row'><div class='cell'>" + z + "</div><div class='cell'>"
                                                                + subdBiConnectionsNum[i][i]
                                                                + "</div></div>";
                                                        }
                                                    }
                                                    stringout += percentageSum+",";
                                                }
                                            })
                                        }
                                        str += "</div></td>";
                                    }
                                }
                                console.log(stringout);
                                return str;
                            });

                        $("#collapse" + d.name).insertAfter($("#legend_row" + d.name));

                    });


                loadingText = vis.append("svg:text")
                    .style("font-size", w / 20)
                    .attr("class", "loading")
                    .attr("x", (w / 2) - (w / 7)) // pou einai to miso tou loading
                    .attr("y", h / 2)
                    .text("Loading");


                explist.selectAll("option")
                    .data(experiments)
                    .enter()
                    .append("option")
                    .attr("value", function (d) {
                        return d.id;
                    })
                    // below code makes first experiment unselectable
                    .attr("selected", function (d) {
                        if (d.id == experimentName) return "selected";
                    })
                    .text(function (d) {
                        return d.id
                    });

                loadNodeList();

                $(function () {
                    if ($("#graphNodesButton").length > 0) {
                        graphNodesElem.multiselect('rebuild')
                    }
                    else {
                        graphNodesElem.multiselect({
                            maxHeight: 200,
                            buttonWidth: '200px',
                            buttonContainer: '<div class="btn-group" id="graphNodesButton"></div>',
                            nonSelectedText: 'Select an <?php echo $node_name;?>',
//todo to allaksa gia tin ACM single selection
//                            nonSelectedText: 'Select some <?php //echo $node_name;?>//s',
                            selectedClass: 'multiselect-selected',
                            //                    includeSelectAllOption: true,
//todo kai auto
//                            enableClickableOptGroups: true,
                            enableFiltering: true,
                            enableCaseInsensitiveFiltering: true,
                            //                    selectAllText: 'All',
                            optionLabel: function (element) {
                                return $(element).html() + '(' + $(element).val() + ')';
                            },
                            onChange: function (option, checked) {
                                //todo na ginetai kai centralize o grafos otan otan markarontai oi komboi, antistoixa kai sta cateogries kai subdivision legend clicking
                                var clickednodeid = option.val();
                                clickedNode = $.grep(nodes, function (obj) {
                                    return obj.index == clickednodeid
                                })[0];

                                clickGraph(clickedNode, fade_out);
                                console.log("start")

                                console.log(authorselected)
                                authorselected = 1;
                                console.log(authorselected)
                                console.log("stop")
// todo kai auto
//                                var selectedOptions = graphNodesElem.find("option:selected");
//                                var allOptions = graphNodesElem.find("option");
////                                $(":checkbox[value=" + $(this).val() + "]").attr('checked', true)
//                                classifiedNodesHandler(selectedOptions, allOptions);
                                graphNodesElem.multiselect("refresh");
                            }
                        });
                    }
                    fadelimit = 0.9;
//todo kai auto
//
//                    $(".multiselect-clear-filter").on('click', function() {
//                        graphNodesElem.multiselect('deselectAll', false);
//                        var allOptions = graphNodesElem.find("option");
//                        var selectedOptions = graphNodesElem.find("option:selected");
//                        classifiedNodesHandler(selectedOptions, allOptions);
//                        graphNodesElem.multiselect("refresh");
//                        nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;
//                    });

                    $(".multiselect-container")
                    // .attr("style","max-width:300px;max-height:300px;")
                        .find("li").find("a").find("label")
                        .attr("style", "overflow:hidden;text-overflow:ellipsis;");

                    graphNodesElem.multiselect("refresh");


//todo hard code....
                    category1Elem.on("click", function () {
                        //remove all active and inactive from chord and legend
                        chordReset();

                        if (category1Elem.hasClass("activeCategory")) {
                            category1Elem.find("a").attr("style", "background-color:#fff;color:#1f77b4");
                            category1Elem.attr("class", "");
                        }
                        else {
                            category2Elem.find("a").attr("style", "background-color:#fff;color:#ff7f0e");
                            category3Elem.find("a").attr("style", "background-color:#fff;color:#2ca02c");
                            categoriesElem.find("ul").find("li").attr("class", "");
                            category1Elem.attr("class", "activeCategory");
                            category1Elem.find("a").attr("style", "background-color:#ddd;color:#1f77b4");

                            var collection = null;
                            if ($(".activeCategory").length == 0) {
                            }
                            else {
                                collection = $(".circle").filter(function () {
                                    var color = $(this).css("color");
                                    return rgb2hex(color) === "#1f77b4";
                                });
                            }

                            var types = [];
                            collection.each(function () {
                                //						types.push($(this).attr("class"));2ca02c
                                types.push(parseInt(this.classList[2]));
                            });

                            classifiedNodesHandler(collection, $(".circle"));
                            showtype(fade_out, types);
                            // not show links in this ocassion
                            linkLines.style("stroke-opacity", function (o) {
                                return fade_out;
                            });
                            mytext.selectAll(".nodetext").remove();
                        }

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:last").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");

                    });
                    category2Elem.on("click", function () {
                        //remove all active and inactive from chord and legend
                        chordReset();

                        if (category2Elem.hasClass("activeCategory")) {
                            category2Elem.find("a").attr("style", "background-color:#fff;color:#ff7f0e");
                            category2Elem.attr("class", "");
                        }
                        else {
                            category1Elem.find("a").attr("style", "background-color:#fff;color:#1f77b4");
                            category3Elem.find("a").attr("style", "background-color:#fff;color:#2ca02c");
                            categoriesElem.find("ul").find("li").attr("class", "");
                            category2Elem.attr("class", "activeCategory");
                            category2Elem.find("a").attr("style", "background-color:#ddd;color:#ff7f0e");

                            var collection = null;
                            if ($(".activeCategory").length == 0) {
                            }
                            else {
                                collection = $(".circle").filter(function () {
                                    var color = $(this).css("color");
                                    return rgb2hex(color) === "#ff7f0e";
                                });
                            }

                            var types = [];
                            collection.each(function () {
                                //						types.push($(this).attr("class"));
                                types.push(parseInt(this.classList[2]));
                            });

                            classifiedNodesHandler(collection, $(".circle"));
                            showtype(fade_out, types);
                            // not show links in this ocassion
                            linkLines.style("stroke-opacity", function (o) {
                                return fade_out;
                            });
                            mytext.selectAll(".nodetext").remove();
                        }

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:last").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");

                    });
                    category3Elem.on("click", function () {
                        //remove all active and inactive from chord and legend
                        chordReset();

                        if (category3Elem.hasClass("activeCategory")) {
                            category3Elem.find("a").attr("style", "background-color:#fff;color:#2ca02c");
                            category3Elem.attr("class", "");
                        }
                        else {
                            category1Elem.find("a").attr("style", "background-color:#fff;color:#1f77b4");
                            category2Elem.find("a").attr("style", "background-color:#fff;color:#ff7f0e");
                            categoriesElem.find("ul").find("li").attr("class", "");
                            category3Elem.attr("class", "activeCategory");
                            category3Elem.find("a").attr("style", "background-color:#ddd;color:#2ca02c");


                            var collection = null;
                            if ($(".activeCategory").length == 0) {
                            }
                            else {
                                collection = $(".circle").filter(function () {
                                    var color = $(this).css("color");
                                    return rgb2hex(color) === "#2ca02c";
                                });
                            }

                            var types = [];
                            collection.each(function () {
                                //						types.push($(this).attr("class"));
                                types.push(parseInt(this.classList[2]));
                            });

                            classifiedNodesHandler(collection, $(".circle"));
                            showtype(fade_out, types);
                            // not show links in this ocassion
                            linkLines.style("stroke-opacity", function (o) {
                                return fade_out;
                            });
                            mytext.selectAll(".nodetext").remove();
                        }

                        // return the view to the F-D graph when click
                        myTabElem.find("li.active").removeClass("active");
                        myTabElem.find("li:last").addClass("active");
                        chorddivElem.removeClass("active");
                        graphdivElem.addClass("active");

                    });

                    experimentsElem.on("click", function (e, d) {
                        // finds the click event and refreshes before the beforeclose event.
                        var myval = $(this).find("option:selected").val();
                    });
                    experimentsElem.on("change", function (e, d) {
                        var myval = $(this).find("option:selected").val();

                        if (myval != experimentName) {

                            d3.select("#experiments").selectAll("option")
                                .text(function (d) {
                                    if (experimentName == d.id) {

                                        experimentName = d.id;
                                        experimentDescription = d.desc;
                                        if ((expsimilarity = d.initialSimilarity) == null) {
                                            expsimilarity = <?php echo $expsimilarity ;?>;
                                        }
                                        console.log("experimentName:" + d.id);
                                    }
                                    return d.id;
                                });

                            experimentName = myval;
                            console.log(window.location.href);
                            history.pushState('data', '', updateURLParameter(window.location.href, 'ex', experimentName));
                            console.log(window.location.href);

                            initializeExperimentPage();
                            graphLoad();
                            mygraphContainerElem.attr("style", "position:fixed;width:" + 8 * w / 7);

//todo hard code for the Brusseles ... to be moved ... paizei rolo kai i othoni einia ftiagmena gia 13-15
                            if (/^FET*/.test(experimentName)) {
                                gravity = 3;
                                charge = -1100;
                                window['force']['charge'](charge);
                                window['force']['gravity'](gravity);
                                force.start();
                                categoriesElem.show();
                            }
                            else if (/^HEALTH*/.test(experimentName)) {
                                gravity = 7;
                                charge = -1100;
                                window['force']['charge'](charge);
                                window['force']['gravity'](gravity);
                                force.start();
                            }
                            else if (/^Full*/.test(experimentName)) {
                                gravity = 10;
                                charge = -200;
                                window['force']['charge'](charge);
                                window['force']['gravity'](gravity);
                                force.start();
                            }


                            d3.select("#experiments").selectAll("option")
                                .text(function (d) {
                                    if (experimentName == d.id) {

                                        experimentName = d.id;
                                        experimentDescription = d.desc;
                                        if ((expsimilarity = d.initialSimilarity) == null) {
                                            expsimilarity = <?php echo $expsimilarity ;?>;
                                        }
                                        console.log("new experimentName:" + d.id);
                                    }
                                    return d.id;
                                });

                        }
                    });


                    filtersElem.on("click", function (e, d) {
                        // finds the click event and refreshes before the change event.
                        var myval = $(this).find("option:selected").val();
                    });
                    filtersElem.on("change", function (e, d) {
                        // var myval = $(this).find("option:selected").val();
                        if ($(this).find("option:selected").is("#opt1")) {
                            filter1Elem.show();
                            filter2Elem.hide()
                        }
                        else if ($(this).find("option:selected").is("#opt2")) {
                            filter1Elem.hide();
                            filter2Elem.show()
                        }
                    });


                    graphNodesElem.multiselect("refresh");

                });


                myTabElem.show();
                experimentBtnElem.show();
                experimentBtnElem.unbind().on("click", function () {
                    d3.select("#experiments").selectAll("option")
                        .each(function (d) {
                            console.log("experimentName:" + d.id);
                            console.log("experimentDescription:" + d.desc);
                            console.log("expsimilarity:" + d.initialSimilarity);
                            if (experimentName == d.id) {
                                experimentDescription = d.desc;
                                if ((expsimilarity = d.initialSimilarity) == null) {
                                    expsimilarity = <?php echo $expsimilarity ;?>;
                                }
                            }
                        });

                    $(this).attr("data-title", "Experiment Description");
                    $(this).attr("data-content", experimentDescription);
                    $(this).popover('toggle');
                });


                boostBtnElem.unbind().on("click", function () {
                    topicstemp = topicsNotSorted;
                    topicsNotSorted = topicsSorted;
                    topicsSorted = topicstemp;

                    mytextContentElem.hide();
                    browseTick(true);
                    clickGraph(clickedNode, fade_out);   //clicking in order to reload node with new labels


                    if (topicsFlag) {
                        topicsFlag = false;
                        boostBtnElem.find("ul").find("li").find("a").find("span").attr("class", "glyphicon glyphicon-remove");
                    }
                    else {
                        topicsFlag = true;
                        boostBtnElem.find("ul").find("li").find("a").find("span").attr("class", "glyphicon glyphicon-ok");
                    }
                    mytextContentElem.show();
                });


                createChord(1);
                createChord(2);
                if (/^ACM*/.test(experimentName)) {
                    createTrends(0);
                    createTrends(1);
                    createTrends(2);
                    createTrends(3);
                    createTrends(4);
                    createTrends(5);
                    createTrends(6);
                }


                chordElem = $("#chord");
                chord2Elem = $("#chord2");
                trend0Elem = $("#trend0");
                trend1Elem = $("#trend1");
                trend2Elem = $("#trend2");
                trend3Elem = $("#trend3");
                trend4Elem = $("#trend4");
                trend5Elem = $("#trend5");
                trend6Elem = $("#trend6");
                trendlegend0Elem = $("#trendlegend0");
                trendlegend1Elem = $("#trendlegend1");
                trendlegend2Elem = $("#trendlegend2");
                trendlegend3Elem = $("#trendlegend3");
                trendlegend4Elem = $("#trendlegend4");
                trendlegend5Elem = $("#trendlegend5");
                trendlegend6Elem = $("#trendlegend6");
                seriesElem = $(".series");
                streamPathElem = $("path");
                mygraphContainerElem.attr("style", "position:fixed;width:" + 9 * w / 8);
                resizeLayout();
            }

            function initializeExperimentPage() {
                // hide until json data have been loaded from server
                myTabElem.hide();
                classifiedNodesHeaderElem.hide();
                classifiedNodesElem.hide();
                tagsElem.val("");					// when refreshing page placeholder in topic search is shown
                upButtonElem.hide();
                downButtonElem.hide();
                filter1Elem.hide();
                filter2Elem.show();
//                filter2Elem.hide();
                boostBtnElem.hide();
                experimentBtnElem.hide();
                mytextTitleElem.hide();
                mytextContentElem.hide();
                pillsElem.hide();
//  todo previously it was like this
                legend2divElem.hide();
//                legenddivElem.hide();

                legendElem.empty();
                graphElem.empty();

                svgTextElem.empty();

                chorddivElem.empty();
                chord2divElem.empty();

                trend0divElem.empty();
                trend1divElem.empty();
                trend2divElem.empty();
                trend3divElem.empty();
                trend4divElem.empty();
                trend5divElem.empty();
                trend6divElem.empty();

                filtersElem.val($("#filters option:first").val());
                linkedByIndex = {},
                    nodeConnections = [],
                    maxNodeConnections = 0,
                    labeled = [],
                    topicWords = [],
                    topicsNotSorted = [],
                    topicsSorted = [],
                    topicstemp = [],
                    topicsFlag = false,
                    graphNodes = [],
                    jsonLayout = [],
                    jsonTrendsLayout = [],
                    distribution = [],
                    heatmap = [],
                    trends = {},
                    nodes = [],
                    links = [],
                    labels = [],
                    selectedLabelIndex = null,
                    scaleFactor = 1,
                    translation = [0, 0],
                    legend_data = [],
                    max_proj = 0,
                    nodesInGroup = [],
                    labelIsOnGraph = {},
                    svgSortedTopicWords = [],
                    subdivisionsChord = [],
                    nodeLabels = {},
                    selectnodeLabels = {},
                    previous_scale = 1,
                    zoom_type = 1,
                    topicsMap = {},
                    discriminativeTopic = {},
                    discriminativeTopicWeight = {},
                    discriminativeWord = {},
                    discriminativeWordCounts = {},
                    label = {},
                    listLength = 5,
                    counter = 0,
                    numOfClassifiedNodes = 0,
                    flagForTranformation = 0,
                    clrArray = [],
                    relations,
                    relationsCross,
                    node_hash = [],
                    percentageSum = 0,
                    clickedNode = 0,
                    clickedChord = 0,
                    trendClicked = 0,
                    subdConnections = [],
                    subdConnectionsNum = [],
                    relations = [],
                    relationsCross = [],
                    subdBiConnections = [],
                    subdBiConnectionsNum = [],
                    nodesToFade = [],
                    availableTags = [],
                    availableLabels = [],
                    fetOpenNum = 0,
                    fetProactiveNum = 0,
                    fetFlagshipNum = 0,
                    fontsizeVar = <?php echo $fontsizeVar ;?>,
                    smallestFontVar = <?php echo $smallestFontVar ;?>,
                    similarityThr = <?php echo $similarityThr ;?>,
                    maxNodeConnectionsThr = <?php echo $maxNodeConnectionsThr ;?>,
                    linkThr = <?php echo $linkThr ;?>,
                    gravity = <?php echo $gravity ;?>,
                    charge = <?php echo $charge ;?>,
                    layout = <?php echo $layout ;?>,
                    expsimilarity = <?php echo $expsimilarity ;?>,
                    nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?>,
                    fade_out = <?php echo $fade_out ;?>,
                    strong = <?php echo $strong ;?>,
                    normal = <?php echo $normal ;?>,
                    pagetitle = "<?php echo $title ;?>",
                    chordtitle = "<?php echo $chord_title ;?>",
                    trendstitle = "<?php echo $trends_title ;?>",
                    trendsNum = <?php echo $trends_num;?>,
                    nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8,                // fadelimit is a variable with values same or bigger than normal so that in bigger experiments we can define if we want or not the visualization to fade
                    w = windowElem.width() / 2,//800,
                    h = windowElem.width() / 2,//800,
                    trendsclicked = false,
                    clr20 = d3.scale.category20().range(),
                    clrEven = [],
                    clrOdd = [],
                    clickedTopics = [],
                    columns = [],
                    authorselected = 0,
                    alltrendscsvFilesExist = false;

                for (var i = 0; i < clr20.length; i++)
                    if (i % 2) clrEven.push(clr20[i]);
                    else clrOdd.push(clr20[i]);
                clr = [];
                for (var i = 0; i < clrEven.length; i++) {
                    clr.push(clrEven[i]);
                    clr.push(clrOdd[i])
                }
                clr2 = d3.scale.category20b().range();	//to be appended in the first clr (20 more colors)
                $.merge(clr, clr2);					// add second array's elements to first
                clr3 = d3.scale.category20c().range();	//to be appended in the first clr (20 more colors)
                $.merge(clr, clr3);					// add second array's elements to first


                if (/chrome/.test(navigator.userAgent.toLowerCase())) webkit = 1;
                else if (/webkit/.test(navigator.userAgent.toLowerCase())) webkit = 2;
                else webkit = 0;
//                jQuery.browser = {};
//                jQuery.browser.mozilla = /mozilla/.test(navigator.userAgent.toLowerCase()) && !/webkit/.test(navigator.userAgent.toLowerCase());
//                jQuery.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
//                jQuery.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
//                jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
                //the below 2 only for ACM
                trendmenu0Elem.parent().hide();
//                pill3Elem.hide();

//                trendCSV11 = "crunchbase-quarters_new.csv",
//                trendCSV12 = "comminicationACM_pivot_1990-2011_new.csv",
//                trendCSV13 = "acm-sigmod-pivot-all-1976-2011_new.csv";
                trendCSV10 = "trendscsv0.csv",
                    trendCSV11 = "trendscsv1.csv",
                    trendCSV12 = "trendscsv2.csv",
                    trendCSV13 = "trendscsv3.csv",
                    trendCSV14 = "trendscsv4.csv",
                    trendCSV15 = "trendscsv5.csv";
                trendCSV16 = "trendscsv6.csv";
//                trendCSV2 = "weighted_topics2.csv";

                if (/^FET*/.test(experimentName)) {
                    categoriesElem.show();
                    nodeConnectionsThr = <?php echo $nodeConnectionsThr ;?> +0.3;
                    expsimilarity = 0.45;
                    gravity = 1;
                    charge = -1100;
                }
                else if (/^HEALTH*/.test(experimentName)) {
                    expsimilarity = 0.45;
                    gravity = 3;
                    charge = -1100;
                    categoriesElem.hide();
                }
                else if (/^Full*/.test(experimentName)) {
                    expsimilarity = 0.6;
                    gravity = 7;
                    charge = -400;
                    categoriesElem.hide();
                }
                else if (/^ACM*/.test(experimentName)) {
                    categoriesElem.hide();
//                    pill3Elem.show();
                    trendmenu0Elem.parent().show();
                }


                chord_formatPercent = d3.format(".1%"),
                    target = document.getElementById('graphdiv'),
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

                spinner = new Spinner(opts).spin(target);
            }

            function updateURLParameter(url, param, paramVal) {
                var TheAnchor = null;
                var newAdditionalURL = "";
                var tempArray = url.split("?");
                var baseURL = tempArray[0];
                var additionalURL = tempArray[1];
                var temp = "";

                if (additionalURL) {
                    var tmpAnchor = additionalURL.split("#");
                    var TheParams = tmpAnchor[0];
                    TheAnchor = tmpAnchor[1];
                    if (TheAnchor)
                        additionalURL = TheParams;

                    tempArray = additionalURL.split("&");

                    for (i = 0; i < tempArray.length; i++) {
                        if (tempArray[i].split('=')[0] != param) {
                            newAdditionalURL += temp + tempArray[i];
                            temp = "&";
                        }
                    }
                }
                else {
                    var tmpAnchor = baseURL.split("#");
                    var TheParams = tmpAnchor[0];
                    TheAnchor = tmpAnchor[1];

                    if (TheParams)
                        baseURL = TheParams;
                }

                if (TheAnchor)
                    paramVal += "#" + TheAnchor;

                var rows_txt = temp + "" + param + "=" + paramVal;
                return baseURL + "?" + newAdditionalURL + rows_txt;
            }


            function checkFirstLayoutToBeVisualized() {
                if (layout == "chord"){
                    chordmenu1Elem.trigger("click");
//                    graphdivElem.removeClass("active");
//                    graphmenu1Elem.parent().removeClass("active");
//                    chorddivElem.addClass("active");
//                    chordmenu1Elem.parent().addClass("active");
//                    chordmenuElem.parent().addClass("active");
                }
                else if (layout == "trends"){
                    trendmenu0Elem.trigger("click");
//                    legenddivElem.hide()
//                    legend2divElem.show()
//                    legenddivElem.hide()
//TODO na kanw dunamika ta trends na ta pairnei stin html opws kanw kai stin php kai edw mesa  tha prepei na allazw kai to legend kai ta panw deksia gia ta fet na min fainontai
                }
            }


            function loadThresholdsFromUrlParameters(){
                // pass configuration with parameters
                experimentDescription = "";
                if((experimentName = getUrlParameter('ex')) == null){
                    experimentName = '<?php echo $experimentName ;?>';
                    experimentDescription = "<?php echo $experimentDescription ;?>";
                }

                if((expsimilarity = getUrlParameter('s')) == null){
                    expsimilarity = <?php echo $expsimilarity ;?>;
                }

                if((gravity = getUrlParameter('g')) == null){
                    gravity = <?php echo $gravity ;?>;
                }

                if((charge = getUrlParameter('c')) == null){
                    charge = <?php echo $charge ;?>;
                }

                if((layout = getUrlParameter('l')) == null){
                    layout = <?php echo $layout ;?>;
                }
            }

            function loadNodeList(){
                // empty for re-initializing graphNodesList

                graphNodesElem.empty();

                graphNodesElem.append("optgroup").attr("id", "graphNodesGroup1").attr("label", "<?php echo $node_groupName1 ;?>");
                graphNodesElem.append("optgroup").attr("id", "graphNodesGroup2").attr("label", "<?php echo $node_groupName2 ;?>");
//                graphNodesElem.append("<optgroup id=\"graphNodesGroup1\" label=\"<?php //echo $node_groupName1 ;?>//\"><optgroup id=\"graphNodesGroup2\" label=\"<?php //echo $node_groupName2 ;?>//\">")
                graphNodesGroup1Elem = $("#graphNodesGroup1");
//                graphNodesGroup2Elem = $("#graphNodesGroup2");
                graphNodesList1 = d3.select("#graphNodesGroup1");
//                graphNodesList2 = d3.select("#graphNodesGroup2");

                graphNodesList1
                    .selectAll("option")
//                    .data(nodes.filter(function(d) { if(d.FET!="NONFET") return 1; else return 0;}))
                    .data(nodes)
                    .enter()
                    .append("option")
                    .attr("value",function(d){return d.index;})
                    .attr("title",function(d){return d.name;})
                    .attr("id",function(d){
					//console.log("d.index="+d.index+"   d.name="+d.name);
                        return d.index;
                    })
                    .text(function(d){return d.name});
    //                var a = $("#filter1 > select").html()

                graphNodesListHtml = graphNodesElem.html();
                graphNodesElem.empty();
                graphNodesElem.append(graphNodesListHtml)

/*			graphNodesList2
				.selectAll("option")
				.data(nodes.filter(function(d) { if(d.FET!="FET") return 1; else return 0; }))
				.enter()
				.append("option")
                .attr("value",function(d){return d.index;})
                .attr("title",function(d){return d.name;})
				.attr("id",function(d){
					console.log("d.index="+d.index+"   d.name="+d.name);
					return d.index;
				})
				.text(function(d){return d.name});
*/
            }

            /* update ? */
            function update() {
                linkedByIndex = {};
                links.forEach(function(d) {
                    linkedByIndex[d.source + "," + d.target] = 1;
                });

                var ew = 0;

                force
                    .nodes(nodes
                        .map(function(d) {
                            return jQuery.extend(d, {
                                radius: Math.log(10*d.value), // eg related to # of publications
                                x: Math.random() * w,
                                y: Math.random() * h
                            })
                        })
                    )
                    .links(links
                        .map(function(d) {
                            ew++;
                            return jQuery.extend(d, {
                                source: d.source,
                                target: d.target
                            })
                        })
                    )
                    .start();

                jsonfilename = "data/graph_"+experimentName+"_"+expsimilarity+"_"+gravity+"_"+charge+".json";
                graphPositionsExist=UrlExists(jsonfilename);
                if (graphPositionsExist) {
                    linkLines = vis.selectAll(".link")
                        .data(jsonLinks);
                }
                else{
                    linkLines = vis.selectAll(".link")
                        .data(links);
                }

                var u =0;
                linkLines.enter().append("svg:line")					//edw ftiaxnei tis akmes
                    .attr("class", function(d) {
                        return "link " + d.target.color  + " " + d.target.index
                    })
                    .attr("id", function(d) {
                        return d.source.index+"-"+d.target.index
                    })
                    .attr("x1", function(d) {
                        return d.source.x;
                    })
                    .attr("y1", function(d) {
                        return d.source.y;
                    })
                    .attr("x2", function(d) {
                        return d.target.x;
                    })
                    .attr("y2", function(d) {
                        u++;
                        return d.target.y;
                    });


                linkLines.exit().remove();

                if (graphPositionsExist) {
                    nodeCircles = vis.selectAll(".circle")				//i html klasi gia tous kombous
                        .data(jsonNodes);
                }
                else{
                    nodeCircles = vis.selectAll(".circle")				//i html klasi gia tous kombous
                    .data(nodes);
                }

                nodeCircles.enter()									// edw ftiaxnei tous kombous sss
                    .append("svg:circle")
                    .attr("class", function(d) {
                        return "circle " + d.color + " " + d.index
                    })
                    .attr("id", function(d) {
                        return "circle-node-"+d.index
                    })
                    .attr("r", function(d) {
                        return d.radius
                    })
                    .attr("cx", function(d) {
                        return d.x
                    })
                    .attr("cy", function(d) {
                        return d.y
                    })
                    .on("mouseover", fadeGraph(fade_out))
                    .on("mouseout", function(d, i) {
                        console.log("mouseout 2");
                        console.log(authorselected);
                        if($(".active_row").length == 0 && authorselected == 0) {
                            reset();

                            $(this).attr('class', function (index, classNames) {
                                return classNames.replace('shadow', '');
                            });
                        }
                    })
                    .on("click", function(d,i){
                        graphNodesElem.multiselect('deselectAll', false);
                        $(this).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                        console.log("click")
                        authorselected = 0;
                        console.log(authorselected)

//                        var myfade = fadeGraph(fade_out);
                        if(focused == d.name){
                            focused = '';
                            nodeCircles.on("mouseover", fadeGraph(fade_out))
                                .on("mouseout", function(d, i) {
                                    console.log("mouseout 1");
                                    console.log(authorselected);
                                    if($(".active_row").length == 0 && authorselected == 0) {
                                        reset();

                                        $(this).attr('class', function (index, classNames) {
                                            return classNames.replace('shadow', '');
                                        });
                                    }
                                });

                            reset();

                            $(this).attr('class', function(index, classNames) {
                                return classNames.replace('shadow', '');
                            });
                        }
                        else{
                         //   reset();
                            focused = d.name;
                            clickedNode = d;
                            clickGraph(d,fade_out);
                            nodeCircles.on("mouseout", function(){                        console.log("mouseout 3");
                                return false;})
                                .on("mouseover", function(){return false;});
                        }

                        $(this).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                    })
                    .on("dblclick", function(d,i){
console.log(d.id)
                        var open = "http://astero.di.uoa.gr/graphs/layouts/spider/authors/?ex=ACM_400T_1000IT_0IIT_100B_3M_cos&id=_"+ d.id;
                        var win = window.open(open, '_blank');

                        graphNodesElem.multiselect('deselectAll', false);
                        $(this).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                        console.log("click")
                        authorselected = 0;
                        console.log(authorselected)

//                        var myfade = fadeGraph(fade_out);
                        if(focused == d.name){
                            focused = '';
                            nodeCircles.on("mouseover", fadeGraph(fade_out))
                                .on("mouseout", function(d, i) {
                                    console.log("mouseout 1");
                                    console.log(authorselected);
                                    if($(".active_row").length == 0 && authorselected == 0) {
                                        reset();

                                        $(this).attr('class', function (index, classNames) {
                                            return classNames.replace('shadow', '');
                                        });
                                    }
                                });

                            reset();

                            $(this).attr('class', function(index, classNames) {
                                return classNames.replace('shadow', '');
                            });
                        }
                        else{
                            //   reset();
                            focused = d.name;
                            clickedNode = d;
                            clickGraph(d,fade_out);
                            nodeCircles.on("mouseout", function(){                        console.log("mouseout 3");
                                    return false;})
                                .on("mouseover", function(){return false;});
                        }

                        $(this).attr('class', function(index, classNames) {
                            return classNames.replace('shadow', '');
                        });
                    });

                nodeCircles.exit().remove();

                if (graphPositionsExist) {
                    nodeLabels = vis.selectAll(".labels")
                        .data(jsonNodes);
                }
                else{
                    nodeLabels = vis.selectAll(".labels")
                    .data(nodes);
                }

                nodeLabels.enter()
                    .append("svg:text")
                    .attr("class", function(d) {
                        return "labels " + d.color  + " " + d.index
                    })
                    .attr("id", function(d) {
                        return "circle-label-"+d.index
                    })

                    .attr("x",function (d){
                    return d.x+7
                    })
                    .attr("y",function (d){
                        return d.y-7
                    })
//				.text(function(d){return d.index;});
                    .text(function(d) {

                        if (labeled[d.index]){
//                            if (firsttime) {
                                label[d.index] = "";
                                // console.log("topicWords printed on graph:");
                                for (i = 0; i < svgSortedTopicWords.length; i++) {
                                    if (svgSortedTopicWords[i].key == d.index) {
                                        if (!labelIsOnGraph[svgSortedTopicWords[i].item]) {
                                            label[d.index] = svgSortedTopicWords[i].item;
                                            labelIsOnGraph[label[d.index]] = true;
                                        }
                                        break;
                                    }
                                }
//                            }

                            if((links[d.index].value>similarityThr-(0.2*previous_scale)) && (nodeConnections[d.index] > (nodeConnectionsThr/Math.sqrt(previous_scale))*maxNodeConnections)){
                                return label[d.index];
                            }
                            else{
                                return "";
                            }
                        }
                    });

                nodeLabels.exit().remove();


            }

            function legendHandler(d,i){
                chordHandler(d3.selectAll(".chord").selectAll("."+ d.name), i);

                if($("#legend_row"+ d.name).hasClass("active_row")){
                    $("#legend_row"+ d.name).removeClass("active_row");
                    $("#legend_row"+ d.name).addClass("inactive");
                    if($(".active_row").length==0){
                        $(".inactive").each(function(){
                            $(this).removeClass("inactive");
                        });
                    }
                }
                else{
                    $("#legend_row"+ d.name).addClass("active_row");
                    if($(".active_row").length==1){
                        var cur = $("#legend_row"+ d.name);
                        $(".legend_row").each(function(){
                            if(this != cur)
                                $(this).addClass("inactive");
                            else
                                console.log("den mpika")

                        });
                    }
                }
                $(".active_row").each(function() {
                    $(this).removeClass("inactive");
                });

                // reset category clicking
                category1Elem.attr("class","");
                category2Elem.attr("class","");
                category3Elem.attr("class","");
                category1Elem.find("a").attr("style","background-color:#fff;color:#1f77b4");
                category2Elem.find("a").attr("style","background-color:#fff;color:#ff7f0e");
                category3Elem.find("a").attr("style","background-color:#fff;color:#2ca02c");


                classifiedNodesHandler($(".active_row"),$(".legend_row"));
            }

            function classifiedNodesHandler(list, alllist){
                mytextTitleElem.empty();
                mytextTitleElem.show();
                mytextContentElem.empty();
                mytextContentElem.show();
                classifiedNodesHeaderElem.hide();
                classifiedNodesElem.hide();
                classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;
                boostBtnElem.hide();

                //find all types to show
                var types = [];
                var collection = null;
                var isNodeFilter = 0;
                if(list.length == 0){
                    collection = alllist;
                    mytextContentElem.empty();
                    mytextTitleElem.empty();
                }
                else
                    collection = list;


                collection.each(function(col_index,col_elem){
                    //todo ta apo katw na ta balw se lista kai na kalw tin classifiednodeshandler() kai na min stelnw olo to object <pou apotelei lista> opote stin klisi na min exw to if else apo katw
                    $(".circle").each(function(cir_index,cir_elem){
                        if ( cir_elem.classList[1] == $($(col_elem).find("td").get(0)).find("div").html()){
                            types.push(parseInt(cir_elem.classList[2]));
//todo na to kanw me kalutero tropo, oxi etsi biastika to apokatw boolean flag
                            isNodeFilter = 0;
                        }
                        else if ( cir_elem.classList[2] == $(col_elem).val()) {
                            types.push(parseInt(cir_elem.classList[2]));
                            isNodeFilter = 1;
                        }
                        else if ( cir_elem.classList[2] == col_elem.classList[2]) {
                            types.push(parseInt(cir_elem.classList[2]));
                            isNodeFilter = 1;
                        }
                        else{
//                            console.log(cir_elem.classList[2]);
                        }
                    });
                });

                showtype(fade_out, types);
                // not show links in this ocassion
                linkLines.style("stroke-opacity", function (o) {
                    return fade_out;
                });

                if(isNodeFilter){
                    if(list.length != 0){
                        classifiedNodesHeaderElem.html("Selected <?php echo $node_name;?>s with filtering:&nbsp;");
                        classifiedNodesHeaderElem.show();

                        var classifiedNodes = "";
                        numOfClassifiedNodes=0;

                        var o;
                        $.each(types,function(i,obj){
                            o = $.grep(nodes, function(o) { return o.index == obj })[0];
//                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">" + o.value + "</span></a></li>";
                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + "</a></li>";
                            numOfClassifiedNodes++;

                        });

                        classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                        classifiedNodeButtons();
                        classifiedNodesElem.show();
                        fadelimit = 0.9;
                    }
                }
                else {
                    if(list.length != 0){
                        classifiedNodesHeaderElem.html("Similar <?php echo $node_name;?>s based on area classification:&nbsp;");
                        classifiedNodesHeaderElem.show();

                        var classifiedNodes = "";
                        numOfClassifiedNodes=0;

                        var o;
                        $.each(types,function(i,obj){
                            o = $.grep(nodes, function(o) { return o.index == obj })[0];
//                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + " <span class=\"badge badge-info\">" + o.value + "</span></a></li>";
                            classifiedNodes += "<li class=\"" + o.color + "result\"><a class=\"" + o.color + "result \" id=\"" + o.index + "\">" + o.name + "</a></li>";
                            numOfClassifiedNodes++;

                        });


                        if(list.length == 1) {
                            mytextTitleElem.empty();
                            mytextTitle.append("div").append("ul")
                                .attr("class", "pagination active")
                                .attr("data-toggle","tooltip")
                                .attr("data-placement","right")
                                .attr("title", o.area+" description")
                                .append("li").append("a").attr("class", "nodetext " + o.color + " active").html(o.color + ":<br/><em>" + types.length + "</em> <?php echo $node_name;?>s <br/><em>" + subdivisionsChord.filter( function(obj){return obj.name == o.color;} )[0].relations + "</em> <?php echo $node_name;?> total relations<br/><em>" + subdivisionsChord.filter( function(obj){return obj.name == o.color;} )[0].relationsCross + "</em> <?php echo $node_name;?> relations with other areas");
//                                .append("li").append("a").attr("class", "nodetext " + o.color + " active").html(o.color + ":<br/><em>" + types.length + "</em> <?php //echo $node_name;?>//s ");
                        }
                        else{
                            mytextTitleElem.empty();
                            mytextTitle.append("div").append("ul")
                                .attr("class", "pagination active")
                                .attr("data-toggle", "tooltip")
                                .attr("data-placement", "right")
                                .attr("title", "more than one categories selected")
                                //						.append("li").append("a").attr("class", "nodetext " + d.name + " active").html(d.name + ":<br/><em>" + d.pr + "</em> <?php echo $node_name;?>s <br/><em>" + subdivisionsChord[i].relations + "</em> <?php echo $node_name;?> total relations<br/><em>" + relations[i] + "</em> <?php echo $node_name;?> relations in other areas");
                                .append("li").append("a").attr("class", "btn-primary active").html(list.length + " <?php echo $node_areaName;?> selected:<br/><em>" + types.length + "</em> <?php echo $node_name;?>s ");
                        }

                        classifiedNodesElem.find("div").find("ul").append(classifiedNodes);
                        classifiedNodeButtons();
                        classifiedNodesElem.show();
                        fadelimit = 0.9;
                    }
                }
            }

/////////////////////////////////////////////////////////////////////
            /**** FILE CREATION FUNCTIONS AND CHORD GRAPH ELEMENTS CREATION ****/
/////////////////////////////////////////////////////////////////////

            /* test function is similar to fade function*/
            function createJsonFile(){

                nodeCircles.each(function(mynode) {     // initializations
                    var areaIndex = subdConnections.indexOf(mynode.color);
                    if(areaIndex != -1){	// if already exists
                        subdConnectionsNum[areaIndex]++;
                    }
                    else{
                        //creating and initializing subdconnections array and subdBiconnections/subdBiconnectionsNum matrices 
                        subdConnections.push(mynode.color);
                        areaIndex = subdConnections.indexOf(mynode.color);
                        subdConnectionsNum[areaIndex] = 1;

                        subdBiConnections.push(areaIndex);
                        subdBiConnections[areaIndex] = [];			// area saving

                        subdBiConnectionsNum.push(areaIndex);
                        subdBiConnectionsNum[areaIndex] = [];		// indexOf_area saving

                    }

                    nodeCircles.each(function(d) {
                        if (isNodeConnected(mynode, d)) {           // checks both ways connection
                            if (d != mynode){
                                var areaBiIndex = subdBiConnections[areaIndex].indexOf(d.color);
                                if(areaBiIndex != -1){	// if already exists
                                    subdBiConnectionsNum[areaIndex][areaBiIndex]++;
                                }
                                else{
                                    subdBiConnections[areaIndex].push(d.color);
                                    areaBiIndex = subdBiConnections[areaIndex].indexOf(d.color);
                                    subdBiConnectionsNum[areaIndex][areaBiIndex] = 1;
                                }
                            }
                        }
                    })
                });

                for (var i = 0; i < subdConnections.length; i++) {
                    for (var j = 0; j < subdConnections.length; j++) {
                        if(subdBiConnectionsNum[i][j] === undefined){
                            subdBiConnectionsNum[i][j] = 0
                        }
                    }
                }


                // copy : subdBiConnectionsNumCross = subdBiConnectionsNum; //http://stackoverflow.com/questions/13756482/create-copy-of-multi-dimensional-array-not-reference-javascript
                subdBiConnectionsNumCross = subdBiConnectionsNum.map(function(arr) {
                    return arr.slice();
                });

// for the crossdisciplinary connectivity
                for (var i = 0; i < subdConnections.length; i++) {
                    subdBiConnectionsNumCross[i][i] = 0;
                }
            }


            var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];

            //Function to convert hex format to a rgb color
            function rgb2hex(rgb) {
                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
            }

            function hex(x) {
                return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
            }


            function createCSVFile(){
                var max_proj = 0;
                var string = "name,color,projects,relations,relationsCross";
                var subdSum = 0;
                var subdSumCross = 0;

                for (var i = 0; i < subdConnections.length; i++) {
                    clrArray.push($("."+subdConnections[i]).css("color"));

                    if(subdConnectionsNum[i] > max_proj)
                        max_proj = subdConnectionsNum[i];


                    subdSum = 0;
                    subdSumCross = 0;
                    for (var j = 0; j < subdConnections.length; j++) {
//todo
                        subdSum += subdBiConnectionsNum[i][j] + subdBiConnectionsNum[j][i];
                        subdSumCross += subdBiConnectionsNumCross[i][j] + subdBiConnectionsNumCross[j][i];
                    }
                    relations.push(subdSum);
                    relationsCross.push(subdSumCross);
                }
                for (var i = 0; i < subdConnections.length; i++) {
                    string += "\n"+subdConnections[i]+","+rgb2hex(clrArray[i])+","+subdConnectionsNum[i]+","+relations[i]+","+relationsCross[i];
                    subdivisionsChord[i] = {name: subdConnections[i], color:rgb2hex(clrArray[i]), projects:subdConnectionsNum[i], relations:relations[i], relationsCross:relationsCross[i]};
                }

                // SORT: In order to be also in chords with the same sorting the chord graph, according to projectNum and not relation Num
                subdivisionsChord.sort(function (a, b) {
                    return b.projects - a.projects
                });

console.log(string)
//                chordcsvcreator(response, trendindex)
            }



///////////////////////////////////////
///////////////////////////////////////
            /**** CHORD SVG FUNCTION CREATION ****/
///////////////////////////////////////


            function createChord(type){
                var chord_width = w + <?php echo $chord_width ;?>,
                    chord_height = h + <?php echo $chord_height ;?>,
                    wordWidth = <?php echo $wordWidth ;?>,
                    wordHeight = <?php echo $wordHeight ;?>,
                    wordPadding = <?php echo $wordPadding ;?>,
                    groupPadding = <?php echo $groupPadding ;?>,
                    chord_innerRadius = Math.min(chord_width, chord_height) * .41,
                    chord_outerRadius = chord_innerRadius * 1.1,
                    chord_r1 = chord_height / 2,
                    chord_r0 = chord_r1 - wordPadding;

                var chord_arc = d3.svg.arc()
                    .innerRadius(chord_innerRadius)
                    .outerRadius(chord_outerRadius);

                var chord_layout = d3.layout.chord()
                    .padding(groupPadding)
                    .sortSubgroups(d3.descending)
                    .sortChords(d3.ascending);

                var chord_path = d3.svg.chord()
                    .radius(chord_innerRadius);

                if (type == 1){
                    var chord_svg = d3.select("#chorddiv")
                        //.style("width", w)
                        .style("height", h)
                        .style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
                        .style("preserveAspectRatio", "xMidYMid meet")
                        .style("border-style","solid")
                        .style("cursor","default")
                        .style("border-color","snow")
                        .append("svg:svg")
                        .attr("width", chord_width+wordWidth)		//gia na xwrane oi lekseis
                        .attr("height", chord_height+wordHeight)
                        .attr("id", "chord")
                        .append("svg:g")
                        .attr("class", "chord_circle")
                        .attr("transform", "translate(" + (chord_width+wordWidth) / 2 + "," + (((chord_height+wordHeight) / 2)) + ")");
                }
                else {
                    var chord_svg = d3.select("#chord2div")
                        //.style("width", w)
                        .style("height", h)
                        .style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
                        .style("preserveAspectRatio", "xMidYMid meet")
                        .style("border-style","solid")
                        .style("cursor","default")
                        .style("border-color","snow")
                        .append("svg:svg")
                        .attr("width", chord_width+wordWidth)		//gia na xwrane oi lekseis
                        .attr("height", chord_height+wordHeight)
                        .attr("id", "chord2")
                        .append("svg:g")
                        .attr("class", "chord_circle")
                        .attr("transform", "translate(" + (chord_width+wordWidth) / 2 + "," + (((chord_height+wordHeight) / 2)) + ")");
                }




                chord_svg.append("circle")
                    .attr("r", chord_outerRadius);




                if (type == 1){
                    chord_layout.matrix(subdBiConnectionsNum);
                }
                else{
                    chord_layout.matrix(subdBiConnectionsNumCross);
                }

                // Add a group per neighborhood.
                chord_group = chord_svg.selectAll(".group")
                    .data(chord_layout.groups)
                    .enter().append("svg:g")
                    .style("cursor","pointer")
                    .attr("class", function(d, i) { return "group "+subdivisionsChord[i].name; })
//                    .on("mouseover", chord_mouseover)
//                    .on("mouseout", chord_mouseout)
                    .on("click",chord_click);


                // Add a mouseover title.
                chord_group.append("title").text(function(d, i) {
                    if (type == 1){
                        return subdivisionsChord[i].name + ":\n\t" + subdivisionsChord[i].projects + " <?php echo $node_name;?>s\n\t" + subdivisionsChord[i].relations + " <?php echo $node_name;?> relations directed to all areas";
                    }
                    else{
                        return subdivisionsChord[i].name + ":\n\t" + subdivisionsChord[i].projects + " <?php echo $node_name;?>s\n\t" + subdivisionsChord[i].relationsCross + " <?php echo $node_name;?> relations directed only to other areas";
                    }
                });

                // Add the group arc.
                var chord_groupPath = chord_group.append("path")
                    .attr("id", function(d, i) { return "group" + i; })
                    .attr("d", chord_arc)
                    .style("fill", function(d, i) { return subdivisionsChord[i].color; });

                // Add a text label.
                var chord_groupText = chord_group.append("svg:text")
                    .each(function(d) {
                        d.angle = ((d.startAngle + d.endAngle) / 2)+0.03; })
                    .attr("x", 6)
                    .attr("dy", 15)
                    .attr("text-anchor", function(d) { return d.angle > Math.PI ? "end" : null; })
                    .attr("transform", function(d) {
                        return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")"
                            + "translate(" + chord_r0 + ")"
                            + (d.angle > Math.PI ? "rotate(180)" : "");
                    })
                    .text(function(d, i) { return subdivisionsChord[i].name; });

                // Add the chords.
                chord_chord = chord_svg.selectAll(".chord")
                    .data(chord_layout.chords)
                    .enter().append("path")
                    .attr("class", function(d, i) { return "chord "+subdivisionsChord[d.source.index].name+" chord-source-" + d.source.index+" chord-target-" + d.target.index; })
                    .style("cursor","default")
                    .style("fill", function(d) { return subdivisionsChord[d.source.index].color; })
                    .attr("d", chord_path);

                // Add an elaborate mouseover title for each chord.
                chord_chord
                    .append("title")
                    .text(function(d) {
                        percentageSum = d.source.value+d.target.value;

                        if (type == 1){

                            return subdivisionsChord[d.source.index].name
                                + " ↔ " + subdivisionsChord[d.target.index].name
                                + ": " + percentageSum
                                + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relations)
                                +" ↔ " + chord_formatPercent(d.target.value/subdivisionsChord[d.target.index].relations)
                                + ")" ; // &harr; the name of the arrow
                        }
                        else{

                            return subdivisionsChord[d.source.index].name
                                + " ↔ " + subdivisionsChord[d.target.index].name
                                + ": " + percentageSum
                                + " (" + chord_formatPercent(d.source.value/subdivisionsChord[d.source.index].relationsCross)
                                +" ↔ " + chord_formatPercent(d.target.value/subdivisionsChord[d.target.index].relationsCross)
                                + ")" ; // &harr; the name of the arrow

                        }
//previous on 20150907 backup
                    });

            }


            function chord_mouseover(d, i) {
                if (!clickedChord) {
                    //chordHandler(d, i);
                    d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
                }

//                if (!clickedChord) {
//                chord_chord.classed("fade", function(p) {
//                    return p.source.index != i
//                    && p.target.index != i;
//                });
            }


            function chord_mouseout(d, i) {
                if (!clickedChord) {
                    //chordHandler(d, i);
                    d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
                }
//                if (!clickedChord) {
//                chord_chord.classed("fade", function(p) {
//                    return 0;
//                });
            }


            function chord_click(d,i) {
//todo check if it can do better
                //chordHandler(d,i);
                d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
//            chordHandler(d,i);
//
//            // below for the legend row on the right and the left classified nodes
                //Todo to apo katw xreiazetai otan kanw enable to fade
//                d3.selectAll("#legend_row"+subdivisionsChord[i].name).each(function(o,j){legendHandler(o,i)});
                clickedChord = !clickedChord;
            }

            function chordHandler(d,i) {
                var chordSource = d3.selectAll(".chord-source-" + i);
                var chordTarget = d3.selectAll(".chord-target-" + i);

                // toggle clicked -- to 2o classed apo katw eprepe na einai activeChord alla mas endiaferei na einai to idio me to activeSource gi auto ebala to idio kai den ebala to ! giati allakse sto amesws proigoumeno classed
//todo exei sfalma otan kanei click sto teleutaio chord
                chordSource.classed("activeSource", !chordSource.classed("activeSource")).classed("activeChord",chordSource.classed("activeSource"));
                chordTarget.classed("activeTarget", !chordTarget.classed("activeTarget")).classed("activeChord",chordTarget.classed("activeTarget"));

                var activeSourceChords = d3.selectAll(".activeSource");
                var activeTargetChords = d3.selectAll(".activeTarget");

                // check if still active from other class
                if(!activeSourceChords.empty()) activeSourceChords.classed("activeChord",true);
                if(!activeTargetChords.empty()) activeTargetChords.classed("activeChord",true);

                var activeChords = d3.selectAll(".activeChord");
                var allChords = d3.selectAll(".chord");

                // check if all inactive or not
                if (!activeChords.empty()){
                    allChords.style("opacity", "0.1");
                    activeChords.style("opacity", "1");
                }
                else{
                    allChords.style("opacity", "1");
                }
            }

            function createTrends(type) {
                var margin = {top: 20, right: 55, bottom: 30, left: 40},
                    width  = w-30,
                    height = 3*h/4;
//                width  = 1000 - margin.left - margin.right,
//                height = 700  - margin.top  - margin.bottom;

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

                // var color = d3.scale.ordinal()
                //     .range(["#001c9c","#101b4d","#475003","#9c8305","#d3c47c"]);
                var color = d3.scale.ordinal()
                    .range(clr);
//                    .range(["#1f77b4","#ff7f0e","#2ca02c","#d62728","#9467bd","#8c564b","#e377c2","#7f7f7f","#bcbd22","#17becf","#aec7e8","#ffbb78","#98df8a","#ff9896","#c5b0d5","#c49c94","#f7b6d2","#c7c7c7","#dbdb8d","#9edae5"]);


                var trendCSV1;

                if (type == 0){
                    trendCSV1 = trendCSV10;
                }
                else if (type == 1){
                    trendCSV1 = trendCSV11;
                }
                else if (type == 2) {
                    trendCSV1 = trendCSV12;
                }
                else if (type == 3) {
                    trendCSV1 = trendCSV13;
                }
                else if (type == 4) {
                    trendCSV1 = trendCSV14;
                }
                else if (type == 5) {
                    trendCSV1 = trendCSV15;
                }
                else if (type == 6) {
                    trendCSV1 = trendCSV16;
                }

                var vertical = d3.select("#trend"+type+"div")
                    .append("div")
                    .style("position", "absolute")
                    .style("z-index", "19")
                    .style("width", "1px")
                    .style("height", height+20)
                    .style("top", "85px")
                    .style("bottom", "0px")
                    .style("left", "0px")
                    .style("background", "#000");


                var chart = d3.select("#trend"+type+"div")
                    .append("div")
                    .attr("class", "col-md-10 col-md-offset-1")
                    .attr("id", "chart")
                    .append("div")
                    .attr("class", "btn-group")
                    .attr("data-toggle", "buttons");

//                chart
//                    .append("label")
//                    .attr("class", "btn btn-primary")
//                    .attr("id", "sbar")
//                    .text("Bar")
//                    .append("input")
//                    .attr("type","radio")
//                    .attr("name","options");
                chart
                    .append("label")
                    .attr("class", "btn btn-primary")
                    .attr("id", "line")
                    .text("Line")
                    .append("input")
                    .attr("type","radio")
                    .attr("name","options");
                chart
                    .append("label")
                    .attr("class", "btn btn-primary")
                    .attr("id", "area")
                    .text("Area")
                    .append("input")
                    .attr("type","radio")
                    .attr("name","options");
                chart
                    .append("label")
                    .attr("class", "btn btn-primary active")
                    .attr("id", "strm")
                    .text("Stream")
                    .append("input")
                    .attr("type","radio")
                    .attr("name","options");

                var mousex;
                var trend_svg = d3.select("#trend"+type+"div")
                    .style("viewBox", "0 0 " + w + " " + h )			// in order to be ok in all browsers
                    .style("preserveAspectRatio", "xMidYMid meet")
                    .style("cursor","pointer")
                    .append("svg:svg")
                    .attr("width",  width  + margin.left + margin.right + 1000) // gia na xwrane ta topic word bags
                    .attr("height", height + margin.top  + margin.bottom + 1500) // gia na xwrane ta top 50 topic words
//todo prin sketo trend
                    .attr("id","trend")
                    .append("g")
                    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
                trend_svg
                    .on("mousemove", function(){
                        mousex = d3.mouse(this);
                        mousex = mousex[0]+43;
                        vertical.style("left", mousex + "px" )})
                    .on("mouseover", function(){
                        mousex = d3.mouse(this);
                        mousex = mousex[0];
                        vertical.style("left", mousex + "px")});



//                console.log("topicsSorted!")
//                console.log(topicsNotSorted)
                var topicsNotSortedtrends = jQuery.extend(true, {}, topicsNotSorted);
                var trendstopics = {};

//                console.log(topicsNotSortedtrends)
                for (var key in topicsNotSortedtrends){
                    var keyint = parseInt(key);
                    if (!alltrendscsvFilesExist) {
                        if (columns.indexOf(keyint) > -1 && columns !== undefined){
    //                        console.log(topicsNotSortedtrends[keyint])
                            trendstopics[keyint] = topicsNotSortedtrends[keyint];
    //                        trendstopics.push(topicsNotSortedtrends[keyint]);
                        }
                    }
                    else{
                        trendstopics[keyint] = topicsNotSortedtrends[keyint];
                    }
                }

//                console.log(trendstopics)

                d3.csv("../data/"+trendCSV1, function (error, data) {
//                    d3.csv("../data/"+trendCSV2, function(error, topics) {

// console.log("data")
// console.log(data)
//console.log("topics")
//console.log(topics)
//console.log("topicsNotSorted!")
//console.log(topicsNotSorted)

                    var labelVar = 'quarter';
                    var varNames = d3.keys(data[0])
                        .filter(function (key) { return key !== labelVar;});

                    // var varNames = ["39","336","58","41","294","67","92","48","375","353","112","277","82","365","374","396","97","220","137","175","146","274","269","15","217","141","130","331","174","180","316","255","335","159","186","199","209","232","380","203","266","284","271","321","181","235","77","382","267","168","100","42"];
// console.log(varNames)
// console.log(varNamesTemp)

                    color.domain(varNames);
//console.log("varnames")
//console.log(varNames)
                    // use a copy of the below, not a reference
                    var varNamesReversed = varNames.map(function(arr) {
                        return arr.slice();
                    }).reverse();

                    stackChart(data, "wiggle");
                    $( "#sbar,#line,#area,#strm" ).click(function() {
                        chartClearAll();
                        trendReset(false);
                        if (this.id == "line") {
                            lineChart(data);
                        } else if (this.id == "area") {
                            stackChart(data, "zero");
                        } else {
                            stackChart(data, "wiggle");
                        }

                        clickedTopics.forEach(function(topic){
                            clickPopover(topic, type, true);
                        })
                    });

//
//                        VIZ.onResize();
//
//                        $(window).on("resize", function() {
//                            VIZ.onResize();
//                        });
//

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


                        var topic_hash = [];
                        topicnames = [];
                        var index = 0;

                        for (var key in trendstopics) {
                            $.each(trendstopics[key], function (i, d) {
                                var nodeindex = topic_hash.indexOf(key);
                                if (nodeindex != -1) {
                                    var newtopicitem = topicnames[nodeindex].topic;
                                    newtopicitem += "," + d.item;
                                    topicnames[nodeindex].topic = newtopicitem;
                                }
                                else {
                                    topic_hash.push(key);
                                    //            topicnames[topic_hash.length-1] = {};
//todo na mpainei to title-description pleon sto legend oxi to topic
//                                    topicnames.push({index: index, id: key, name: d.item});
                                    topicnames.push({index: index, id: key, name: d.title, topic: d.item});
                                    index++;
                                }

                            });
                        }

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

                        var series = trend_svg.selectAll(".series")
                            .data(seriesData)
                            .enter().append("g")
                            .attr("id", function (d,i) { return "series"+type+"_"+i })
                            .attr("class", "series")
                            .on("click", function (d) { clickPopover.call(this, d, type, false); });

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
                            .on("click", function (d) { clickPopover.call(this, d, type, false); });

                        drawAxis();
                        drawLegend(varNames,topic_hash);

                        $(".x").find(".tick").find("text").html(function(i,t){
                                if (t=="1950-1979")
                                    return "1950-79"
                                else if (t=="1980-1989")
                                    return "1980-89"
                                else if (t=="1990-1995")
                                    return "1990-95"
                                else if (t=="1995-1999")
                                    return "1995-99"
                                else
                                    return t
                            }
                        );
                    }


                    function stackChart(data, offset){

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

                        var topic_hash = [];
                        topicnames = [];
                        var index = 0;

                        for (var key in trendstopics) {
                            if (include(varNames, key)) {

                                $.each(trendstopics[key], function (i, d) {
                                    var nodeindex = topic_hash.indexOf(key);
                                    if (nodeindex != -1) {
                                        var newtopicitem = topicnames[nodeindex].topic;
                                        newtopicitem += "," + d.item;
                                        topicnames[nodeindex].topic = newtopicitem;
                                    }
                                    else {
                                        topic_hash.push(key);
                                        //            topicnames[topic_hash.length-1] = {};
//todo na mpainei to title-description pleon sto legend oxi to topic
//                                    topicnames.push({index: index, id: key, name: d.item});
                                        topicnames.push({index: index, id: key, name: d.title, topic: d.item});
                                        index++;
                                    }

                                });
                            }
                        }

                        data.forEach(function (d) {
                            varNames.map(function (name) {
                                series[name].values.push({name: name, label: d[labelVar], value: +d[name]});
                            });
                        });

                        x.domain(data.map(function (d) { return d.quarter; }));

                        stack(seriesArr.reverse());

                        y.domain([0, d3.max(seriesArr, function (c) {
                            return d3.max(c.values, function (d) { return d.y0 + d.y; });
//                            return d3.max(c.values, function (d) { return ""; });
                        })]);

                        var selection = trend_svg.selectAll(".series")
                            .data(seriesArr.reverse())
                            .enter().append("g")
                            .attr("id", function (d,i) { return "series"+type+"_"+i })
                            .attr("class", "series")
                            .on("click", function (d) { clickPopover.call(this, d, type, false); });

                        selection.append("path")
                            .attr("class", "streamPath")
                            .attr("d", function (d) { return area(d.values); })
                            .attr("id", function (d,i) { return "streamPath"+i })
                            .style("fill", function (d) { return color(d.name); })
                            .style("stroke", "grey");

                        var points = trend_svg.selectAll(".seriesPoints")
                            .data(seriesArr)
                            .enter().append("g")
                            .attr("class", "seriesPoints");

                        points.selectAll(".point")
                            .data(function (d) { return d.values; })
                            .enter().append("circle")
                            .attr("class", "point")
                            .attr("cx", function (d) { return x(d.label) + x.rangeBand() / 2; })
                            .attr("cy", function (d) { return y(d.y0 + d.y); })
                            .attr("r", "9.5px")
                            .style("fill",function (d) { return color(d.name); })
                            .on("mouseover", function (d) { showPopover.call(this, d, type); })
                            .on("mouseout",  function (d) { removePopovers(); })
                            .on("click", function (d) { clickPopover.call(this, d, type, false); });

                        drawAxis();
                        drawLegend(varNames,topic_hash);

                        $(".y").find(".tick").find("text").hide();

                        $(".x").find(".tick").find("text").html(function(i,t){
                                if (t=="1950-1979")
                                    return "1950-79";
                                else if (t=="1980-1989")
                                    return "1980-89";
                                else if (t=="1990-1995")
                                    return "1990-95";
                                else if (t=="1995-1999")
                                    return "1995-99";
                                else
                                    return t;
                            }
                        );
                    }
//                    });
                });

                // the function below needs trend_svg that is declared inside the above function
                function drawLegend (varNames,topic_hash) {
                    d3.selectAll("#trendlegend"+type).select("div").remove();
                    var trendlegend = d3.select("#trendlegend"+type)
                        //                        .style("viewBox", "0 0 " + w + " " + h )          // in order to be ok in all browsers
                        //                        .style("preserveAspectRatio", "xMidYMid meet")
                        .append("div")
                        .append("svg")
                        .attr("class", "trendlegendsvg")
                        .attr("width",  2000) // gia na xwrane ta topic word bags
                        .attr("height", 1200) // gia na xwrane ta top 50 topic words
                        .style("cursor","pointer")
                        //                        .style("overflow-x","scroll")
                        .selectAll(".trendlegend")
//                            .data(varNames.slice().reverse())
//                            .data(varNames.slice().reverse())
                        .data(varNames)
                        .enter().append("g")
                        .attr("id", function (d,i) { return "trendlegend"+type+"_"+i })
                        .attr("class", "trendlegend")
                        .attr("transform", function (d, i) {return "translate(55," + i * 20 + ")"; })
                        .on("click", function (d) { clickPopover.call(this, d, type, false); });


                    //                var trendlegend = trend_svg.selectAll(".trendlegend")
                    //                    .data(varNames.slice().reverse())
                    //                    .enter().append("g")
                    //                    .attr("class", "trendlegend")
                    //                    .attr("transform", function (d, i) { return "translate(55," + i * 20 + ")"; });


                    trendlegend.append("rect")
                        //                    .attr("x", width-30)    // gia na mpoun aristera
                        .attr("x", -30)    // gia na mpoun aristera
                        .attr("width", 10)
                        .attr("height", 10)
                        .style("fill", color)
                        .style("stroke", "grey");

                    trendlegend
                        //                    .append("div")
                        //                    .style("word-wrap","break-word")
                        //                    .style("word-break","break-all")
                        //                    .style("white-space","normal")
                        .append("text")
                        //                    .attr("x", width-10)
                        .attr("x", 0)
                        .attr("y", 6)
                        .attr("dy", ".35em")
                        //.append("textpath") // using "end", the entire text disappears
                        //todo: meta apo kapoio unclick otan menei ena na fainontai ta related nodes. na dw pou xanetai to label 0 sto teleutaio. na auksisw kai to width giati mallon den xwrane,ti einai to weight sti stili.. na balw ... sto titlo
                        .style("text-anchor", "start")
//                        .text(function (d) { return d; });
                        //            .text(function (d) {console.log(d);console.log(topicnames[topic_hash.indexOf(d)]); return d; });
                        //            .text(function (d) {console.log(topicnames[topic_hash.indexOf(d)]); return topicnames[topic_hash.indexOf(d)].index+"."+topicnames[topic_hash.indexOf(d)].name; });
                        .text(function (d) {return topicnames[topic_hash.indexOf(d)].index+"."+topicnames[topic_hash.indexOf(d)].name; });
                }


                function drawAxis() {

                    trend_svg.append("g")
                        .attr("class", "x axis")
                        .attr("transform", "translate(0," + height + ")")
                        .call(xAxis)
                        .attr("style","font-size:11px");

                    trend_svg.append("g")
                        .attr("class", "y axis")
                        .call(yAxis)
                        .attr("style","font-size:11px")
                        .append("text")
                        .attr("transform", "rotate(-90)")
                        .attr("y", 6)
                        .attr("dy", ".71em")
                        .style("text-anchor", "end")
                        .text("Weight");
                }


                function chartClearAll() {
                    trend_svg.selectAll("*").remove()
                }


                function removePopovers () {
                    $('.popover').each(function () {
                        $(this).remove();
                    });
                }

                function showPopover (d, type) {
                    var tit = 0;
                    var titindex = 0;
                    var titname = 0;
                    var tittopic;

                    topicnames.filter(function(o){
                        if(d.name==o.id){
                            tit=o.index+"."+o.name;
                            titname = o.name;
                            titindex= o.index;
                            tittopic= o.topic;
                        }
                    });
                    $(this).popover({
                        //            title: d.name,
                        // title: topicnames.forEach(function(o){if(d.name==o.id)console.log(o.index);return o.index;}),
                        title: tit,
                        placement: 'auto top',
                        container: 'body',
                        trigger: 'manual',
                        html : true,
                        content: function() {
//                        if (!trendClicked) {
//                            if ($(".active_trend").length == 0 || $(".active_trend").length > 2 ) {
                            mytextTitleElem.hide();
                            classifiedNodesHeaderElem.hide();   //clear anything included in child nodes
                            classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                            classifiedNodesElem.hide();
                                topicnames.filter(function (o,i) {
                                    if (d.name == o.id) {

                                        mytextTitleElem.empty();
                                        mytextTitleElem.show();
                                        mytextTitle.append("div").append("ul")
                                            .attr("class", "pagination active")
                                            .attr("data-toggle", "tooltip")
                                            .attr("data-placement", "right")
//                                        .attr("title", "...more about project and link...")
                                            .style("cursor", "pointer")
//                                        .append("li").append("a").attr("class", "nodetext " + o.color + " active").attr("id",o.index).html("Selected topic: <br/>" + tit);
//                                        .append("li").append("a").attr("class", "nodetext active").attr("style","color:"+color(tit)).html("Selected topic: <br/>" + tit);
//                                        .append("li").append("a").attr("class", "nodetext active").attr("style", "color:"+color(d.name)+";font-weight:400").html("Selected topic: <br/>" + tit);
                                            .append("li").append("a").attr("class", "nodetext active").attr("style", "color:"+color(d.name)+";font-weight:400").html("Selected topic description: <br/>" + tit + "<br/><br/>Topic words: <br/><small>"+tittopic+"</small>");

                                        //}
                                    }
                                });
//                            }


                            return "Year: " + d.label +
                                    //"<br/>Journal: " + d.label +
                                "<br/>Width: " + d3.format(",")(d.value ? d.value: d.y1 - d.y0); }//ektupwnei to width
                    });
                    $(this).popover('show')
                }
            }

            function trendReset(fullReset){          // if fullReset=true then also clickedTopics are reset, else they are not (difference between magnet and reset and also when changing trends)
                mytextTitleElem.hide();
                classifiedNodesHeaderElem.hide();   //clear anything included in child nodes
                classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                classifiedNodesElem.hide();
                nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;
                legenddivElem.hide();
                legend2divElem.show();

                if (fullReset)
                   clickedTopics = []; // empty array of clicked nodes

                $(".series").each(function () {
                    $(this).attr("class", "series");
                });

                $(".trendlegend").each(function () {
                    $(this).attr("class", "trendlegend");
                });
            }



            function clickPopover (d,type,initializationOfTrend) {
                var tit = 0;
                var titindex = 0;
                var titname = 0;
                var tittopic;
                var elementid;
                topicnames.filter(function (o,i) {
                    if ($.isNumeric(d)) {           // if legend was clicked
                        elementid = d;
                    }
                    else{                           // if legend was clicked
                        elementid = d.name;
                    }

                    if (elementid == o.id) {        // keep clicked topics in array to keep clicked in other chart and trends cause of consistency
                        var topicIndex = clickedTopics.indexOf(elementid);
                        if (initializationOfTrend){
                            // do nothing
                        }
                        else if (topicIndex != -1){	// if already exists
                            clickedTopics.splice(topicIndex, 1);
                        }
                        else {
                            clickedTopics.push(elementid);
                        }

                        tit=o.index+"."+o.name;
                        titname = o.name;
                        titindex= o.index;
                        tittopic= o.topic;
//todo prepei to index i na einai aukswn kai oxi oti kai to id
//                        console.log(o)
                        if ($("#series" + type + "_" + titindex).attr("class") == "series active_trend") {
//                            console.log("create series inactive_trend");
                            $("#series" + type + "_" + titindex).attr("class", "series inactive_trend");
                            $("#trendlegend" + type + "_" + titindex).attr("class", "trendlegend inactive_trend");
                            if ($(".active_trend").length == 0) {
                                $(".inactive_trend").each(function () {
                                    if ($(this).attr("class") == "series inactive_trend")
                                        $(this).attr("class", "series");
                                    else
                                        $(this).attr("class", "trendlegend");
                                });
                                trendReset(true);
                            }
// todo to apo katw prepei na to ftiaksw na einai to swsto clicked
//                            else if ($(".active_trend").length == 2) {       //ena gia to series kai ena gia to trendlegend
//                                mytextTitleElem.empty();
//                                mytextTitleElem.show();
//                                mytextTitle.append("div").append("ul")
//                                    .attr("class", "pagination active")
//                                    .attr("data-toggle", "tooltip")
//                                    .attr("data-placement", "right")
////                                    .attr("title", "...more about project and link...")
//                                    .style("cursor", "pointer")
//                                    .append("li").append("a").attr("class", "nodetext active").attr("style", "color:gray;font-weight:400").html("Selected topic description: <br/>" + tit + "<br/><br/>Topic words: <br/><small>"+tittopic+"</small>");
////                                autocompletelog(titname);
//                                autocompletelogtrends(tittopic,tit);
//                                classifiedNodeButtons();
//
//                            }
                        }
                        else {
//                            console.log("create series active_trend");
                            $("#series" + type + "_" + titindex).attr("class", "series active_trend");
                            $("#trendlegend" + type + "_" + titindex).attr("class", "trendlegend active_trend");

                            if ($(".active_trend").length == 2) {       //ena gia to series kai ena gia to trendlegend
                                $(".series").each(function () {
                                    $(this).attr("class", "series inactive_trend");
                                });
                                $(".trendlegend").each(function () {
                                    $(this).attr("class", "trendlegend inactive_trend");
                                });

                                $("#series" + type + "_" + titindex).attr("class", "series active_trend");
                                $("#trendlegend" + type + "_" + titindex).attr("class", "trendlegend active_trend");

                                mytextTitleElem.empty();
                                mytextTitleElem.show();
                                mytextTitle.append("div").append("ul")
                                    .attr("class", "pagination active")
                                    .attr("data-toggle", "tooltip")
                                    .attr("data-placement", "right")
//                                    .attr("title", "...more about project and link...")
                                    .style("cursor", "pointer")
                                    //                                        .append("li").append("a").attr("class", "nodetext " + o.color + " active").attr("id",o.index).html("Selected topic: <br/>" + tit);
                                    //                                        .append("li").append("a").attr("class", "nodetext active").attr("style","color:"+color(tit)).html("Selected topic: <br/>" + tit);
                                    .append("li").append("a").attr("class", "nodetext active").attr("style", "color:gray;font-weight:400").html("Selected topic description: <br/>" + tit + "<br/><br/>Topic words: <br/><small>"+tittopic+"</small>");
//                                autocompletelog(titname);
                                autocompletelogtrends(tittopic,tit);
                                classifiedNodeButtons();

                            }
                            else if ($(".active_trend").length >= 2) {
                                mytextTitleElem.hide();
                                classifiedNodesHeaderElem.hide();   //clear anything included in child nodes
                                classifiedNodesElem.find("div").find("ul").empty();   //clear anything included in child nodes
                                classifiedNodesElem.hide();
                                nodes.length > 1000 ? fadelimit = 0.9 : fadelimit = 0.8;
                                legenddivElem.hide();
                                legend2divElem.show();
                            }

                            if (!($.isNumeric(d))) {
                                $(this).popover({
                                    //            title: d.name,
                                    // title: topicnames.forEach(function(o){if(d.name==o.id)console.log(o.index);return o.index;}),
                                    title: tit,
                                    placement: 'auto top',
                                    container: 'body',
                                    trigger: 'manual',
                                    html: true,
                                    content: function () {
                                        return "Year: " + d.label +
                                                //"<br/>Journal: " + d.label +
                                            "<br/>Width: " + d3.format(",")(d.value ? d.value : d.y1 - d.y0);
                                    }//ektupwnei to width
                                });
                                $(this).popover('show')
                            }
                        }
                    }
                });
            };



            function onResize() {
                prev_w = w;
                w = windowElem.width()/2,
                h = windowElem.width()/2,
                resizeLayout();// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically

//			    graphElem.style["width"]= w;
                loadingText
                    .style("font-size",w/20)
                    .attr("x", (w / 2) - (w/7)) // pou einai to miso tou loading
                    .attr("y", h / 2);

                // semantic zooming
                scaleFactor = w/prev_w;
                if (previous_scale < scaleFactor){
                    /* color change is animated infinite times of 3sec each one */
                    vis.style("animation","zoominmove 3s infinite")
                        .style("-webkit-animation","zoominmove 3s infinite");
                    zoom_type = 1;
                }
                else if (previous_scale == scaleFactor){
                    /* color change is animated infinite times of 3sec each one */
                    vis.style("animation","dragmove 3s infinite")
                        .style("-webkit-animation","dragmove 3s infinite")
                        .style("cursor","move");
                    zoom_type = 2;
                }
                else{
                    /* color change is animated infinite times of 3sec each one */
                    vis.style("animation","zoomoutmove 3s infinite")
                        .style("-webkit-animation","zoomoutmove 3s infinite");
                    zoom_type = 3;
                }

                previous_scale = scaleFactor;

                browseTick(false);

                prev_w = w;
            }

            function resizeLayout(){
                if(detectmob() || windowElem.width()<=990) {		// if in mobile device then we need the graph to be shown in bigger frame, and all the other divs to be placed vertically
                    w = windowElem.width();//800,
                    h = windowElem.width();//800,
                    mytextTitleElem.attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
                    mytextContentElem.attr("style","min-height:0px;height:auto;min-width:20%;width:95%;margin-bottom:10px");
                    myinfoElem.attr("style","float:left;clear:left; min-height:0px;height:auto;min-width:20%;width:100%;");

                    if(jumpPreviousElem.length == 0){
                        myinfoElem.prepend('<input id="jumpPrevious" type="button" style="width:100%" value="Regress to Graph">');
                        jumpPreviousElem = $("#jumpPrevious");  // happens only once

                        mygraphElem.prepend('<input id="jumpNext" type="button" style="width:100%" value="Proceed to Labels">');
                        jumpNextElem = $("#jumpNext");

                        jumpPreviousElem.on("click",function(){windowElem.location = "#mygraph"});
                        jumpNextElem.on("click",function(){windowElem.location = "#myinfo"});
                    }
                    mygraphContainerElem.attr("style","position:;float:center;padding-left:-20;padding-right:-20;clear:left;height:"+h);
                    $("h4").attr("style","position:;")
                    legenddivElem.attr("style","float:left;clear:left;min-width:20%;width:100%;");
                    mygraphElem.insertBefore('#myinfo');
                    legenddivElem.insertAfter('#myinfo');

                }
                else{
                    mytextTitleElem.attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
                    mytextContentElem.attr("style","min-height:;height:;min-width:20%;width:;margin-bottom:;word-break:break-all");
                    myinfoElem.attr("style","float:;clear:; min-height:;height:;min-width:;width:;");
                    mygraphContainerElem.attr("style","float:;padding-right:;clear:;position:fixed;height:;width:"+9*w/8);
                    $("h4").attr("style","position:fixed;")
                    if(jumpPreviousElem.length >= 0) {
                        jumpNextElem.remove();
                        jumpPreviousElem.remove();
                    }
                    legenddivElem.attr("style","float:;clear:;min-width:;width:;");
                    myinfoElem.insertBefore('#mygraph');
                    legenddivElem.insertAfter('#mygraph');
                }
                graphElem.attr("style","width:"+w+";height:"+h);
                chordElem.attr("style","width:"+w+";height:"+h);
                chord2Elem.attr("style","width:"+w+";height:"+h);
                trend0Elem.attr("style","width:"+w+";height:"+h);
                trend1Elem.attr("style","width:"+w+";height:"+h);
                trend2Elem.attr("style","width:"+w+";height:"+h);
                trend3Elem.attr("style","width:"+w+";height:"+h);
                trend4Elem.attr("style","width:"+w+";height:"+h);
                trend5Elem.attr("style","width:"+w+";height:"+h);
                trend6Elem.attr("style","width:"+w+";height:"+h);
            }

            function checkFullscreen() {
                $(document).bind("fullscreenchange", function (e) {
                    console.log("Full screen changed.");
                    console.log($(document).fullScreen() ?
                        "Full screen enabled" : "Full screen disabled");

                    if($(document).fullScreen()){
                        mygraphContainerElem.attr("style","width:100%;height:100%;top:0;background-color:none");

                        /* move svg to center */// translation is not working in webkit fullscreen, so we manually set a padding left in 1/4. thats because previously the #graph has the windowElem.width/2 size and it is centered (e.g. 1/4+1/2+1/4), so now that the graph has the windowElem size we want the svg to be translated where it was previously, so 1/4 of the windowElem size
                        if ( webkit == 1) {
                            vis.style("padding-left", windowElem.width() / 4);
                            vis.style("width", windowElem.width());
                            d3.select("#trend0div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend0div").style("width", windowElem.width());
                            d3.select("#trend1div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend1div").style("width", windowElem.width());
                            d3.select("#trend2div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend2div").style("width", windowElem.width());
                            d3.select("#trend3div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend3div").style("width", windowElem.width());
                            d3.select("#trend4div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend4div").style("width", windowElem.width());
                            d3.select("#trend5div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend5div").style("width", windowElem.width());
                            d3.select("#trend6div").style("padding-left", windowElem.width() / 4);
                            d3.select("#trend6div").style("width", windowElem.width());
//                            trend1divElem.style("height",h);
                            trend0divElem.attr("style","height:"+h);
                        }
                        else {
                            vis.attr("transform","translate(" + windowElem.width()/4 + ")");
                            vis.style("width", windowElem.width());
                            d3.select("#trend0div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend0div").style("width", windowElem.width());
                            d3.select("#trend1div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend1div").style("width", windowElem.width());
                            d3.select("#trend2div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend2div").style("width", windowElem.width());
                            d3.select("#trend3div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend3div").style("width", windowElem.width());
                            d3.select("#trend4div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend4div").style("width", windowElem.width());
                            d3.select("#trend5div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend5div").style("width", windowElem.width());
                            d3.select("#trend6div").attr("transform","translate(" + windowElem.width()/4 + ")");
                            d3.select("#trend6div").style("width", windowElem.width());
                            trend0divElem.attr("style","height:"+h);
                        }

                        chordElem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        chord2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);

                        trend0Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend1Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend3Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend4Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend5Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                        trend6Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:"+ windowElem.width() / 4);
                    }
                    else{
                        mygraphContainerElem.attr("style","width:100%;height:100%;top:0;background-color:none");
                        /* move svg to left back to initial position */
                        if ( webkit == 1) {
                            vis.style("padding-left", "");
                            d3.select("#trend1div").style("padding-left","0");
                            d3.select("#trend2div").style("padding-left","0");
                            d3.select("#trend3div").style("padding-left","0");
                            d3.select("#trend0div").style("padding-left","0");
                            d3.select("#trend4div").style("padding-left","0");
                            d3.select("#trend5div").style("padding-left","0");
                            d3.select("#trend6div").style("padding-left","0");
//to apo katw xreiazetai mono gia auto to trend giati gia kapoio logo den emfanizotan
//                            trend1divElem.style("height",h);
                            trend0divElem.attr("style","height:"+h);
                        }
                        else {
                            vis.attr("transform","translate(" + 0 + ")");
                            d3.select("#trend1div").attr("transform","translate(" + 0 + ")");
                            d3.select("#trend2div").attr("transform","translate(" + 0 + ")");
                            d3.select("#trend3div").attr("transform","translate(" + 0 + ")");
                            d3.select("#trend0div").attr("transform","translate(" + 0 + ")");
                            d3.select("#trend4div").attr("transform","translate(" + 0 + ")");
                            d3.select("#trend5div").attr("transform","translate(" + 0 + ")");
                            d3.select("#trend6div").attr("transform","translate(" + 0 + ")");
//                            trend0divElem.style("height",h);
                            trend0divElem.attr("style","height:"+h);
                        }
                        graphReset();

                        chordElem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        chord2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");

                        trend0Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend1Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend2Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend3Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend4Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend5Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");
                        trend6Elem.attr("style","width:100%;height:100%;top:0;background-color:none;padding-left:;");


                        svgfullscreenExit();
                        pill1Elem.removeClass("active");
                        pill1Elem.blur();
                    }
                });

                $(document).bind("fullscreenerror", function (e) {
                    alert('mozfullscreenerror');
                    console.log("Full screen error.");
                    console.log("Browser won't enter full screen mode for some reason.");
                });
            }


//            d3.select("#save").on("click", function(){
//                var html = $("#graphdiv").html();
//console.log(html)
//                //console.log(html);
//                var imgsrc = 'data:image/svg+xml;base64,'+ btoa(html);
//                var img = '<img src="'+imgsrc+'">';
//                d3.select("#svgdataurl").html(img);
//
//
//                var canvas = document.querySelector("canvas"),
//                    context = canvas.getContext("2d");
//
//                var image = new Image;
//                image.src = imgsrc;
//                image.onload = function() {
//                    context.drawImage(image, 0, 0);
//
//                    var canvasdata = canvas.toDataURL("image/png");
//
//                    var pngimg = '<img src="'+canvasdata+'">';
//                    d3.select("#pngdataurl").html(pngimg);
//
//                    var a = document.createElement("a");
//                    a.download = "sample.png";
//                    a.href = canvasdata;
//                    a.click();
//                };
//
//            });
        });

    </script>

</head>
<body>
<!-- navbar-inverse -->
<nav class="navbar navbar-default navbar-xs navbar-fixed-top" style="max-height:30px;">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headmenu">
                <a class="navbar-brand" href="../../../">
                    <span class="sr-only">Home</span>
                </a>
                <!-- 					        <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						-->
            </button>
            <a class="navbar-brand" href="../../../">
                <span class="glyphicon glyphicon-home"></span>
            </a>
        </div>
        <div class="collapse navbar-collapse " id="headmenu">
            <ul class="nav navbar-nav divider-right divider-left">
                <li>
                    <select id="experiments" data-toggle="tooltip" data-placement="bottom" title="Select an experiment of <?php echo $title ;?>, <?php echo $subtitle ;?> Research Analytics"></select>
                </li>
                <li>
                    <button id="experiment_btn" class="btn btn-link btn-xs" role="button" data-container="body" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="Experiment Description">
<!--                        <button id="experiment_btn" class="btn btn-link btn-xs" role="button" data-container="body" data-trigger="focus" data-title="Experiment Description" data-toggle="tooltip" data-placement="bottom" data-content="asdfasdf">-->
                        <span  class="navbar-brand glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        <span class="sr-only">Experiment Description</span>
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav col-md-6">
                <li>
                    Filter by:
                    <select id="filters" data-toggle="tooltip" data-placement="bottom" title="Select an option of filtering  <?php echo $node_name ;?> elements">
<!--                        <option id="opt0"></option>-->
                        <option id="opt2" data-toggle="tooltip" data-placement="right" title="Filter by finding a bag of topic words">Topic word search</option>
                        <option id="opt1" data-toggle="tooltip" data-placement="right" title="Filter by searching or clicking one or multiple  <?php echo $node_name ;?>s"><?php echo $node_name."s" ;?></option>
                    </select>
                </li>
                <li id="filter1" style="padding-left:10px">
<!--todo to ebgala to multiple gia to bootstrap-->
<!--                    <select id="graphNodes" multiple="multiple" style="padding-left:5px;padding-right:5px;width:inherit;text-align: center;">-->
<!--                    </select>-->
                    <select id="graphNodes" style="padding-left:5px;padding-right:5px;width:inherit;text-align: center;">
                    </select>
                </li>
                <li  id="filter2" style="padding-left:10px;width:inherit">
                    <input id="tags" class="ui-corner-all"  placeholder="input a topic word..." style="padding: 4px;width:100%">
                </li>
            </ul>




            <ul class="nav navbar-nav navbar-right" style="padding-right:10px">
				<li class="dropdown" data-placement="bottom" data-html="true" data-title="Thresholds" title="Experiment Threshold Configuration">
                    <a href="#" id="dropdownThresholds" class="dropdown-toggle" role="button" aria-expanded="true">Experiment Thresholds<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li>
                            <div class="input-group" id="thresholds">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ZLS for Zooming Label Similarity</b><br/>Defines the amplitude spectrum for the zoom levels in which the label should appear based on <?php echo $node_name ;?> Similarity.">ZLS</span>
                                <input type="text" id="thr1" class="form-control" aria-label="similarity threshold(percentage)" maxlength="9" placeholder="e.g. 50"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL shown in zoom level x1, <b>100</b> for ALL shown in next zoom levels x5,x10,x15,etc">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ZLC for Zooming Label Connectivity</b><br/>Defines amplitude spectrum for the zoom levels in which the label should appear based on <?php echo $node_name ;?> Connectivity.">ZLC</span>
                                <input type="text" id="thr2" class="form-control" aria-label="connectivity threshold(percentage)" maxlength="9" placeholder="e.g. 20"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL labels shown in zoom level x1, <b>100</b> for ALL labels shown in next zoom levels x5,x10,x15,etc">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ALS for Appearance Label Similarity</b><br/>Defines the <?php echo $node_name ;?> Similarity threshold over which a <?php echo $node_name ;?> should be labeled on graph.">ALS</span>
                                <input type="text" id="thr3" class="form-control" aria-label="similarity threshold(percentage)" maxlength="9" placeholder="e.g. 45" style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL <?php echo $node_name ;?>s to be labeled, <b>100</b> for NONE of the <?php echo $node_name ;?>s to be labeled">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ALC for Appearance Label Connectivity</b><br/>Defines the <?php echo $node_name ;?> Connectivity threshold over which a <?php echo $node_name ;?> should be labeled on graph.">ALC</span>
                                <input type="text" id="thr4" class="form-control" aria-label="connectivity threshold(percentage)" maxlength="9" placeholder="e.g. 15" style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL <?php echo $node_name ;?>s to be labeled, <b>100</b> for NONE of the <?php echo $node_name ;?>s to be labeled">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>ENS for Experiment Node Similarity</b><br/>Defines the experiment threshold over which a <?php echo $node_name ;?> is loaded on graph from the database retrieval.">ENS</span>
                                <input type="text" id="thr5" class="form-control" aria-label="experiment similarity threshold(percentage)" maxlength="9" placeholder="e.g. 65"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for ALL <?php echo $node_name ;?>s to be retrieved from the database, <b>100</b> for NONE of the <?php echo $node_name ;?>s to be retrieved.">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>GRA for Graph Gravity</b><br/>Defines the Tractive Force from the center of the graph layout to all <?php echo $node_name ;?>s.">GRA</span>
                                <input type="text" id="thr6" class="form-control" aria-label="Force Directed Graph Gravity" maxlength="9" placeholder="e.g. 2"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for SMALL Tractive Force from the center of layout, <b> > 10</b> for BIG Tractive Force from the center of layout">
                                <span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>CHA for Graph Charge</b><br/>Defines the Repulsive Charge of each <?php echo $node_name ;?> to the other <?php echo $node_name ;?>s. Like an electron.">CHA</span>
                                <input type="text" id="thr7" class="form-control" aria-label="Force Directed Graph Charge" maxlength="9" placeholder="e.g. -1100"  style="width:60px" data-toggle="tooltip" data-placement="bottom" data-html="true" data-title="Thresholds" title="<b>0</b> for SMALL Repulsive Charge among <?php echo $node_name ;?>s, <b> < -10000</b> for BIG Repulsive Charge among <?php echo $node_name ;?>s">
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<div class="container-fluid" style="margin-bottom:0px"> <!--- margin is set mostly for the header placing-->
    <div class="col-md-5">
        <!-- <div id="mytext-title" style="max-width:95%;width:95%;vertical-align:top;position:absolute;word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml"></div> -->
    </div>
    <div class="col-md-3" style="margin-top:-30px;"> <!--- margin is set mostly for the header placing-->
        <!-- <div class="page-header"> -->
        <h4 id="pagetitle" style="position:fixed;"><?php echo $title ;?>
            <small><?php echo $subtitle ;?> <span class="sr-only">(current page name)</span></small>
        </h4>
        <!-- </div> -->

    </div>
    <div class="col-md-3">
    </div>
    <div class="col-md-4" style="padding:0px;float:right;width:auto;margin:-30px 0 -10px" id="categories">
        <ul class="pagination pagination-sm"  style="padding:0px;cursor:pointer">
            <li class="" id="category1"><a class="" style="color:#1f77b4" id="">FET Open <span class="badge badge-info" style="background-color:#1f77b4">0</span></a></li>
            <li class="" id="category2"><a class="" id="" style="color:#ff7f0e">FET Proactive <span class="badge badge-info" style="background-color:#ff7f0e">0</span></a></li>
            <li class="" id="category3"><a class="" id="" style="color:#2ca02c">FET Flagships <span class="badge badge-info" style="background-color:#2ca02c">0</span></a></li>
        </ul>
    </div>
</div>
<div class=" container-fluid" id="main">
    <div class="col-md-2" id="myinfo">
        <div id="mytext-title" style="word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml"></div>
        <div>
            <h5 id="classifiedNodesHeader" style="cursor:pointer"><span id="exitclassifiedNodesHeader"><i class="glyphicon glyphicon-remove-sign"></i></span><h5>
        </div>
        <div class="nav-wrap" id="classifiedNodes" style="cursor:pointer">
            <div><button id="upButton" class="btn btn-primary btn-sm ui-multiselect ui-widget ui-state-default ui-corner-all previous" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;" ><span><i class="glyphicon glyphicon-arrow-up"></i>Previous 5</span></button>
                <ul class="pagination pagination-sm">
                </ul>
                <button id="downButton" class="btn btn-primary btn-sm ui-multiselect ui-widget ui-state-default ui-corner-all next\" style="padding-left:5px;padding-right:5px;width:100%;text-align: center;"><span>Next 5<i class="glyphicon glyphicon-arrow-down"></i></span></li></button>
            </div>
        </div>

        <div id='boost_btn' style="cursor:pointer">
            <ul class="pagination active btn-primary" data-toggle="tooltip" data-placement="bottom" title="Click to boost the topics by ordering them according to the words descriminativity">
                <li>
                    <a>
                        Boost Words <span class="badge badge-info glyphicon glyphicon-remove"></span>
                    </a>
                </li>
            </ul>
        </div>


        <div id="mytext-content" style="max-width:95%;width:95%;vertical-align:top;position:absolute;word-break:break-all;  " xmlns="http://www.w3.org/1999/xhtml">
        </div>
    </div>
    <div class="col-md-7" id="mygraph" style="padding:5px;">
        <div id="mygraph-container">
            <div class="col-md-14" style="height:1px;">
                <div class="col-md-12" style="padding-right:2%;">
                    <ul class="nav navbar-nav nav-tabs navbar-right" id="myTab">
<!--                        <li class="active"><a data-toggle="tab" data-target="#graphdiv">Force-Directed Graph <span class="divider-right"></span><span class="btn btn-xs glyphicon glyphicon-fullscreen glyphiconmystyle fullscreen" role="button" title="Fullscreen Mode" aria-hidden="true"></span><span class="btn btn-xs glyphicon glyphicon-refresh glyphiconmystyle fullscreen" role="button" title="Reset Mode" aria-hidden="true"></span></a></li>-->
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="trendmenu" data-toggle="dropdown" data-target="#">Trends<b class="caret"></b></a>
                            <ul class="dropdown-menu" id="trendmenudata" role="menu" aria-labelledby="trendmenu">
                                <!--                                <li><a id="trendmenu1" data-toggle="tab" data-target="#trend1div" href="../../../trends/streamgraph-full.html" target="_blank">Trends 1  <span class="divider-right"></span><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></li>-->
                                <li><a id="trendmenu0" data-toggle="tab" data-target="#trend0div" href="#" target="_blank">ACM Topic Trend Analysis 1950-2011</a></li>
                                <li><a id="trendmenu1" data-toggle="tab" data-target="#trend1div" href="#" target="_blank">Journal: CACM, Communications of the ACM</a></li>
                                <li><a id="trendmenu2" data-toggle="tab" data-target="#trend2div" href="#" target="_blank">Journal: ACM SIGSOFT Software Engineering Notes</a></li>
                                <li><a id="trendmenu3" data-toggle="tab" data-target="#trend3div" href="#" target="_blank">Journal: Journal of the ACM</a></li>
                                <li><a id="trendmenu4" data-toggle="tab" data-target="#trend4div" href="#" target="_blank">Journal: ACM SIGMOD Records</a></li>
                                <li><a id="trendmenu5" data-toggle="tab" data-target="#trend5div" href="#" target="_blank">Journal: ACM SIGPLAN Notices</a></li>
                                <li><a id="trendmenu6" data-toggle="tab" data-target="#trend6div" href="#" target="_blank">Journal: ACM SIGGRAPH Computer Graphics</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="chordmenu" data-toggle="dropdown" data-target="#">Chord<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="chordmenu">
                                <li><a id="chordmenu1" data-toggle="tab" data-target="#chorddiv">Full connectivity</a></li>
                                <li><a id="chordmenu2" data-toggle="tab" data-target="#chord2div">Crossdisciplinary Connectivity</a></li>
                            </ul>
                        </li>
                        <li class="active"><a id="graphmenu1"  data-toggle="tab" data-target="#graphdiv">Force-Directed Graph</a></li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div id="graphdiv" class="tab-pane active in">
                        <svg id="graph" style="width:100%;height:100%" xmlns="http://www.w3.org/2000/svg">
                            <!-- used to add the mytext here when in fullscreen -->
                            <foreignobject id="foreignObject" width="100%" max-width="100%" >
                            </foreignobject>
                        </svg>
                    </div>
                    <div id="chorddiv" class="tab-pane">
                    </div>
                    <div id="chord2div" class="tab-pane">
                    </div>
                    <div id="trend0div" class="tab-pane" >
                    </div>
                    <div id="trend1div" class="tab-pane" >
                    </div>
                    <div id="trend2div" class="tab-pane">
                    </div>
                    <div id="trend3div" class="tab-pane">
                    </div>
                    <div id="trend4div" class="tab-pane" >
                    </div>
                    <div id="trend5div" class="tab-pane">
                    </div>
                    <div id="trend6div" class="tab-pane">
                    </div>
                </div>
            </div>
            <div class="col-md-11" style="padding-right:2%;"></div>
            <div class="col-md-1">
                <div id="pills" class="col-md-1 nav navbar-right" style="padding-top:0px">
                    <ul class="nav navbar-right nav-pills nav-stacked">
<!--                        <li id="pill1"><a class="mypills" href="#a" data-toggle="tab"><span class="navbar-brand btn glyphicon glyphicon-fullscreen glyphiconmystyle fullscreen" role="button" title="Fullscreen Mode" aria-hidden="true"></span></a></li>-->
                        <li id="pill1"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-fullscreen glyphiconmystyle fullscreen" role="button" title="Fullscreen Mode" aria-hidden="true"></span></a></li>
                        <li id="pill2"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-refresh glyphiconmystyle fullscreen" role="button" title="Reset Mode" aria-hidden="true"></span></a></li>
                        <li id="pill4"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-magnet glyphiconmystyle fullscreen" role="button" title="Centralize Magnet" aria-hidden="true"></span></a></li>
<!--                        <li id="pill3" class="disabled"><a class="mypills" href="#"><span class="navbar-brand btn glyphicon glyphicon-new-window glyphiconmystyle fullscreen" role="button" title="New Window Mode" aria-hidden="true"></span></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!--    <button id="save">Save as Image</button>-->
<!--    <h2>SVG dataurl:</h2>-->
<!--    <div id="svgdataurl"></div>-->
<!---->
<!--    <h2>SVG converted to PNG dataurl via HTML5 CANVAS:</h2>-->
<!--    <div id="pngdataurl"></div>-->
<!---->
<!--    <canvas width="960" height="500" style="display:none"></canvas>-->
    <div class="col-md-3" id="legenddiv" style="overflow:auto">
        <table class="table table-condensed table-striped">
            <thead>
            <tr>
                <th><?php echo $node_areaName;?></th>
                <th># of <?php echo $node_name;?>s</th>
                <th>count</th>
                <th>stats</th>
            </tr>
            </thead>
            <tbody id="legend"></tbody>
        </table>
    </div>
    <div class="col-md-3" id="legend2div" style="overflow:auto;text-overflow:ellipsis">
        <div id="trendlegend0">
        </div>
        <div id="trendlegend1">
        </div>
        <div id="trendlegend2">
        </div>
        <div id="trendlegend3">
        </div>
        <div id="trendlegend4">
        </div>
        <div id="trendlegend5">
        </div>
        <div id="trendlegend6">
        </div>
    </div>
</div>
</body>
</html>
