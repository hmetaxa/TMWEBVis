<!DOCTYPE html>
<html ng-app="RadarChart">

<head>
  <meta charset="utf-8">
  <title>D3 Radar Chart</title>
  <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
    <!--https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css-->
  <link rel="stylesheet" href="../../../css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
  <link rel="stylesheet" href="../../../css/spiderStyle.css" />
</head>

<body class="container" ng-controller="MainCtrl as radar">
  <!-- main content -->
  <div class="main container">
    <!-- visualization -->
    <div class="visualization col-xs-9">
      <div class="visualization">
        <radar csv="radar.csv" config="radar.config"></radar>
      </div>
    </div>


    <!-- configuration -->
    <div class="configuration col-xs-5">
      <form>
        <h3>Configuration Parameters</h3>
        <div class="form-group">
          <label>Width:</label>
          <input type="number" class="form-control-inline" step="50" ng-model="radar.config.w" />
          <label>Height:</label>
          <input type="number" class="form-control-inline" step="50" ng-model="radar.config.h" />
        </div>
        <div class="form-group">
          <label>Levels:</label>
          <input type="number" class="form-control-inline" step="1" ng-model="radar.config.levels" />
        </div>
        <div class="form-group">
          <label>Padding Scale:</label>
          <input type="number" class="form-control-inline" step="0.1" ng-model="radar.config.facetPaddingScale" />
        </div>
        <div class="form-group">
          <label>Label Scale:</label>
          <input type="number" class="form-control-inline" step="0.1" ng-model="radar.config.labelScale" />
        </div>
        <div class="form-group">
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.facet" /><span class="text-primary">Facet Plot</span></label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showLevels" />Levels</label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showAxes" />Axes</label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showVertices" />Vertices</label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showPolygons" />Polygons</label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showLegend" />Legend</label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showLevelsLabels" />Levels Labels</label>
          <label class="checkbox"><input type="checkbox" ng-model="radar.config.showAxesLabels" />Axes Labels</label>
        </div>
      </form>
    </div>
  </div>


  <!-- scripts -->
  <script src="../../../js/angular.js"></script>
  <!--http://code.angularjs.org/1.3.5/angular.js-->
  <script src="../../../js/d3.v3.min.js"></script>
  <script>
//    einai to app.js poy to metfera edw mesa
      angular.module("RadarChart", [])
          .directive("radar", radar)
          .controller("MainCtrl", MainCtrl);

      // controller function MainCtrl
      function MainCtrl($http) {
        var ctrl = this;

///δικο μου

          var layoutId, layoutType, experiment,
              jsonTopicsLayout, topics, topicsNoSort, topicsFile, topicsFileExist,
              jsonSpiderLayout, spider, spiderFile, spiderFileExist;

          loadFromUrlParametersAndServer();

          spiderFile = "../dataSimilarAuthors/"+layoutId+".csv";
          topicsFile = "../dataSimilarAuthors/topics.json";             // needed for the trend visualization

          // if all topics json files don't exist then we need to make a server call else we get them from the json file immediately
          topicsFileExist  = UrlExists(topicsFile);
          if (!topicsFileExist) {
              ajaxTopicsCall(experiment);
          }
// gia to parapanw den ekana elegxo se periptwsi pou to ajax to panw teleiwnei deutero kai oxi prwto


          // if all trends csv files don't exist then we need to make a server call else we get them from the csv file immediately
          spiderFileExist  = UrlExists(spiderFile);
          if (!spiderFileExist) {
              ajaxSpiderCall(experiment);
              setTimeout(delayfunc, 1000);

//todo na to allaksw to parapanw kai sta trends... tin prwti fora den kaleitai to trends kai to spider an den uparxei to arxeio gi auto kai emfanizontai problimata mallon thelei to create eksw apo tin else alla na perimenei na teleiwsei to ajaxcall
          }
          else {
//          init();   renamed to createSpider
              createSpider();
          }


//          init();   renamed to createSpider
//          createSpider();


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

          function ajaxSpiderCall(experiment) {
              console.log("ajaxCall for spider layout: " + experiment);
              var url = "./spider.php";

//              $http.get('/someUrl', config).then(successCallback, errorCallback);
              $http({
                  method: 'GET',
                  url: url+ "?ex=" + experiment + "&id=" + layoutId
              }).then(function successCallback(response) {
                  // this callback will be called asynchronously
                  // when the response is available
              });
          }

          function UrlExists(url) {
              var http = new XMLHttpRequest();
              http.open('HEAD', url, false);
              http.send();
              return http.status != 404;
          }

          function delayfunc(){
              if (UrlExists("../data/" + layoutId + ".csv")){
                  createSpider();
              }
              else{
                  setTimeout(delayfunc, 1000);
              }
          }

          /* function returns 1 if an array contains an object or 0 if not */
          function include(arr, obj) {
              return (arr.indexOf(obj) != -1);
          }

          function loadFromUrlParametersAndServer(){
              if((experiment = getUrlParameter('ex')) == null){
                  experiment = '<?php echo $experimentName ;?>';
              }
              if((layoutId = getUrlParameter('id')) == null){         //default
                  layoutId = '<?php echo $layoutId ;?>';
              }

          }

          function getUrlParameter(name) {
              return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
          }




        // function init - createSpider
        function createSpider() {
            // initialize controller variables


            var file = "../data/" + layoutId + ".csv";
            $http.get(file).success(function (data) {
                console.log("ebgainw")
                ctrl.csv = data;
            }).error(function (data, status, headers, config) {
                console.log(".")
            });
          ctrl.config = {
            w: 500,
            h: 500,
            facet: false,
            levels: 5,
            levelScale: 0.85,
            labelScale: 0.9,
            facetPaddingScale: 2.1,
            showLevels: true,
            showLevelsLabels: true,
            showAxesLabels: true,
            showAxes: true,
            showLegend: true,
            showVertices: true,
            showPolygons: true
          };

//            if((facet = getUrlParameter('c')) == null){
//                facet = <?php //echo $charge ;?>//;
//            }

        }
      }

      function getUrlParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
      }

      // directive function sunburst
      function radar() {
        return {
          restrict: "E",
          scope: {
            csv: "=",
            config: "="
          },
          link: radarDraw
        };
      }

    d3.select(".axis-labels").
        attr("cursor","pointer");
  </script>
  <script src="../../../js/radar.js"></script>
  <script src="../../../js/radarDraw.js"></script>
  <script>
    // Hack to make this example display correctly in an iframe on bl.ocks.org
//    d3.select(self.frameElement).style("height", "1000px");
  </script>
</body>

</html>