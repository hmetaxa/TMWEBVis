<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Scholarly Communication &amp; Research Analytics</title>

    <link href="./images/favicon.ico" rel="shortcut icon"/>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css"
          rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        #hover-cap-4col .thumbnail, #hover-cap-3col .thumbnail, #hover-cap-unique .thumbnail, #hover-cap-6col .thumbnail {
            position: relative;
            overflow: hidden;
        }

        .caption {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.4);
            width: 100%;
            height: 100%;
            color: #fff !important;
        }

        .caption p {
            padding: 6px;
        }

        a {
            color: white;
        }

        a:hover {
            color: gold;
        }

        /* padding-bottom and top for image */
        .mfp-no-margins img.mfp-img {
            padding: 0;
        }

        /* position of shadow behind the image */
        .mfp-no-margins .mfp-figure:after {
            top: 0;
            bottom: 0;
        }

        /* padding for main container */
        .mfp-no-margins .mfp-container {
            padding: 0;
        }

        /*

        for zoom animation
        uncomment this part if you haven't added this code anywhere else

        */

        .mfp-with-zoom .mfp-container,
        .mfp-with-zoom.mfp-bg {
            opacity: 0;
            -webkit-backface-visibility: hidden;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
        }

        .mfp-with-zoom.mfp-ready .mfp-container {
            opacity: 1;
        }

        .mfp-with-zoom.mfp-ready.mfp-bg {
            opacity: 0.8;
        }

        .mfp-with-zoom.mfp-removing .mfp-container,
        .mfp-with-zoom.mfp-removing.mfp-bg {
            opacity: 0;
        }
    </style>
    <!--    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>-->
    <!-- Include Twitter Bootstrap and jQuery: -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>
    <script src="./js/magnific.min.js"></script>


    <script type="text/javascript" src="./js/less.min.js"></script>
    <script type="text/javascript" src="./js/spin.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $("[rel='tooltip']").tooltip();

            $('#hover-cap-4col .thumbnail').hover(
                function () {
                    $(this).find('.caption').slideDown(250);
                },

                function () {
                    $(this).find('.caption').slideUp(250);
                });

            $('#hover-cap-3col .thumbnail').hover(
                function () {
                    $(this).find('.caption').fadeIn(250);
                },

                function () {
                    $(this).find('.caption').fadeOut(250);
                });

            $('#hover-cap-unique .thumbnail').hover(
                function () {
                    $(this).find('.caption').slideDown(500);
                },

                function () {
                    $(this).find('.caption').slideUp(500);
                });

            $('#hover-cap-6col .thumbnail').hover(
                function () {
                    $(this).find('.caption').show();
                },

                function () {
                    $(this).find('.caption').hide();
                });
            /*

             $('.image-popup-vertical-fit').magnificPopup({
             type: 'image',
             closeOnContentClick: true,
             mainClass: 'mfp-img-mobile',
             image: {
             verticalFit: true
             }

             });

             $('.image-popup-fit-width').magnificPopup({
             type: 'image',
             closeOnContentClick: true,
             image: {
             verticalFit: false
             }
             });

             $('.image-popup-no-margins').magnificPopup({
             type: 'image',
             closeOnContentClick: true,
             closeBtnInside: false,
             fixedContentPos: true,
             mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
             image: {
             verticalFit: true
             },
             zoom: {
             enabled: true,
             duration: 300 // don't foget to change the duration also in CSS
             }
             });
             */

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
                console.log("topicidsACM")
                console.log(topicidsACM)
            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }
    ;

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
                console.log("topicidsOpenAIRE")
                console.log(topicidsOpenAIRE)
            },
            error: function (e) {
                alert('Error: ' + JSON.stringify(e));
            }
        });
    }
    ;

    $.when(ajaxCallACM, ajaxCallOpenAIRE)
        .then(dataLoader, myFailure);

    $('#ids').multiselect();

    function dataLoader() {
        console.log("data loaded\n");
        $('#ids').multiselect('dataprovider', topicsOpenAIRE);
    }
    ;


    function myFailure() {
        alert("data failure in loading\n");
    }

</script>
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
    </div>

    <ul class="thumbnails" id="hover-cap-unique">
        <li class="span5">
            <h4>OpenAIRE Topic IDs</h4>
            <form id="form1" name="form1" action="" method="get" target="_blank">
                <input type="text" name="s" placeholder="0.9" maxlength="10" value="0.9"/>
                <input type="text" name="id" value="null" style="width: 20px; visibility: hidden"/>
                <input type="text" name="ex" value="HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos"
                       style="width: 20px; visibility: hidden"/>
                <!---             <select id="ids" multiple="multiple">
                                <option value="cheese">Cheese</option>
                            </select>
                -->
                <h4>
                    <hr/>
                </h4>
            </form>
        </li>

    </ul>

    <footer>
        <p><a href="http://www.madgik.di.uoa.gr/" class="label ">&copy; MADgIK </a><a href="http://www.uoa.gr/"
                                                                                      class="label ">@ NKUA</a>
        </p>
    </footer>
</div>

<!-- /container -->

</body>

</html>