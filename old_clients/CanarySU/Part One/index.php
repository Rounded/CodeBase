<!DOCTYPE html>
<html lang="en">
<head>
	<? include("json_grab.php"); ?>
	<meta charset="utf-8" />
	<title>canary</title>
	<meta name="description" content=""> 
	<meta name="keywords" content="">
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body id="index">
	<div id="gradient"></div>

	<div id="header-section" class="section">
			<div class="section-center">
				<div id="header">
					<a href="../index.html">	
						<img src="images/canary_logo.png" style="height: 90px;"/>
					</a>
				</div>
			</div>
		</div>
	
	<div class="section">
		<div id="data" class="section-center">
			
			
		</div>
	</div>

	<!-- ****** JS ******* -->
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script type="text/javascript" 	src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/func.js"></script>
	<script type="text/javascript" src="js/highcharts.js"></script>
	<script type="text/javascript">
	$(function(){
 		
		var eData =<?= $enrolledData; ?>,
		neData = <?= $notEnrolledData; ?>,
		inner,
		columnCount = 0,
		innerCount = 0,
		data = new Array()
		eCount = <?= $enrolled; ?>,
		neCount = <?= $notEnrolled; ?>,
		dataEl = $("#data");

		for (col in eData){
			//Go through all columns
			//x = column name (ex: College Enrolled)
			//inner[x] = column object
			//numInner = # of unique attrs per column (resets per column)
			var numInner = 0,
			eInner = eData[col],
			neInner = neData[col];

			for(val in neInner){
				//Go colum data
				//y = data label (ex: Arts & Sciences)
				//inner[y] = value (ex: Num students in Arts & Sciences)
				innerCount++;
				numInner++;
				
				//data calculations
				var ePercent = Math.ceil((eInner[val] / eCount)*100),
				nePercent = Math.ceil((neInner[val] / neCount)*100);
				thisDifference = ePercent - nePercent,

				//data filters
				nullFilter = val,
				differenceFilter = Math.abs(thisDifference) < 70,
				colFilter = (col != "credits_carried_current"),
				valFilter = "";
				//Filter data then push to array

				if(nullFilter && colFilter){
					data.push( {
						"column":col,
						"label":val,
						"eValue":eInner[val],
						"neValue":neInner[val],
						"ePercent":ePercent,
						"nePercent":nePercent,
						"difference":thisDifference
					})
				}
			}
			
			//Number of columns
			columnCount++;
		}
		
		//Sort data array
		data.sort(sortDifference);

		//Chart options & data
		var chart1data = {
		    chart: {
		        renderTo: 'data',
		        defaultSeriesType: 'area'
		    },
		    plotOptions: {
				
			},
			xAxis:{
				categories:[],
				tickmarkPlacement: 'on',
				title: {
					enabled: false
				}
			},
			tooltip: {
				formatter: function() {
					return("<strong>" + data[this.x].column + "</strong>(" + data[this.x].label + ")<br />E: "+ data[this.x].ePercent + "% / NE: " + data[this.x].nePercent +"%");
				}
			},
		    series: [{
		        	name: 'Enrolled Students',
		        	data: []
		    	},
		    	{
		    		name:"Non-enrolled Students",
		        	data: []
		    	}]
		},

		//Data html injection
		numData = data.length,
		badSpan = "<span class='bad-data'>",
		dataSpan = "<span class='data-item'>",
		closeSpan = "</span><br />";

		//Iterate through data array
		for(var i = 0; i < 30; i++){
			var thisData = data[i];

			chart1data.series[0].data.push(data[i].ePercent);
			chart1data.series[1].data.push(data[i].nePercent);

			 chart1data.xAxis.categories.push(data[i].label);

	
			// if(!thisData.label)
			// 	dataEl.append(badSpan + "Bad Data - No entry" + closeSpan)
			// else if(isNaN(thisData.ePercent) || isNaN(thisData.nePercent))
			// 	dataEl.append(badSpan + "Bad Data - Not a number" + closeSpan)
			// else{
			// 	thisData.label = (thisData.label == "Y" || thisData.label == "y") ? "Yes":thisData.label,
			// 	thisData.label = (thisData.label == "N" || thisData.label == "n") ? "No":thisData.label
			// 	dataEl.append(dataSpan + "<strong>"+thisData.column + " >> </strong>( " + thisData.label + " ) = " + thisData.ePercent + "%, " + thisData.nePercent + "%" + closeSpan)
			// }
		}

		//Create chart object w/ options object
		var chart1 = new Highcharts.Chart(chart1data);

	});

	//Sort array by difference value 
	function sortDifference(a,b){
		return a.difference - b.difference;
	}
	
	</script>
</body>
</html>
