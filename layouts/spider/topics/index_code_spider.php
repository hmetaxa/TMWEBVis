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
  <script src="../../../js/app.js"></script>
  <script src="../../../js/radar.js"></script>
  <script src="../../../js/radarDraw.js"></script>
  <script>
    // Hack to make this example display correctly in an iframe on bl.ocks.org
    d3.select(self.frameElement).style("height", "1000px");
  </script>
</body>

</html>