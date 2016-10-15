<?php 
include("fusioncharts/fusioncharts.php");

require_once("../dbcontroller.php");
$db_handle = new DBController();


$dbhandle = new mysqli($host, $user, $password, $database);


if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
}

?>

<html>
   <head>
      <title>Dynamic Data Visualization with PHP and MySQL</title>
      <script src="fusioncharts/js/fusioncharts.js"></script>
   </head>
   
   <body>

<?php
  

  $strQuery = "SELECT salary, company FROM job; ";

  echo $strQuery;

  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

  if ($result) {
        	
	$arrData = array(
        "chart" => array(
        	"caption"=> "Spendings in New Hampshire Primary",
        	"subCaption"=> "(broadcast, cable and radio advertising)",
			"captionFontColor"=> "#fff",
			"captionFontBold"=> "0",
			"captionFontSize"=> "20",
			
			// x and y axes configuration options
			"xAxisName"=> "Candidate",
			"xAxisNameFontSize"=> "18",
			"xAxisNameFontBold"=> "0",
			"yAxisName"=> "Spendings (in USD)",
			"yAxisNameFontSize"=> "18",
			"yAxisNameFontBold"=> "0",
			
			// general chart configuration options
			"baseFont"=> "Open Sans",
			"paletteColors"=> "#06A69E",
			"plotFillAlpha"=> "90",
			"usePlotGradientColor"=> "0",
			"numberPrefix"=> "$",
			"bgcolor"=> "#17153F",
			"bgalpha"=> "95",
			"canvasbgalpha"=> "0",
			"basefontcolor"=> "#F7F3E7",
			"showAlternateHGridColor"=> "0",
			"divlinealpha"=> "50",
			"divlinedashed"=> "0",
			"rotateyaxisname"=> "1",
			"canvasbordercolor"=> "#ffffff",
			"canvasborderthickness"=> ".3",
			"canvasborderalpha"=> "100",
			"showValues"=> "0",
			"plotSpacePercent"=> "8",
			"labelFontSize"=> "15",
			"outCnvBaseFontSize"=> "13",
			"showLimits"=> "0",
			
			// tooltip configuration options
			"toolTipBgColor"=> "#000",
			"toolTipPadding"=> "12",
			"toolTipBorderRadius"=> "3",
			"toolTipBorderThickness"=> "1",
			"toolTipBorderColor"=> "#ccc",
			"toolTipBgAlpha"=> "70"
              	)
           	);

        	$arrData["data"] = array();

	
        	while($row = mysqli_fetch_array($result)) {
        		//echo $row['company'];
				//echo $row['salary'];
				array_push($arrData["data"], array(
					"label" => $row["company"],
					"value" => $row["salary"]
					)
				);
        	}	
	
            $jsonEncodedData = json_encode($arrData);
			
			 $columnChart = new FusionCharts("column2d", "expenseChart" , "100%", "500", "column-chart", "json", $jsonEncodedData);
             $columnChart->render();
			 
             $dbhandle->close();
           
         }

 
?>
    <center>
 <div id="column-chart">Awesome Chart on its way!</div></center>
   </body>
</html>