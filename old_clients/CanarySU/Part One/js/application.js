$(function(){
 		
		var eData =<?= $enrolledData; ?>,
		neData = <?= $notEnrolledData; ?>,
		inner,
		columnCount = 0,
		innerCount = 0,
		graph = new Raphael('canvas',960,500),
		data = new Array()
		eCount = <?= $enrolled; ?>,
		neCount = <?= $notEnrolled; ?>;

		for (x in eData){
			//Go through all columns
			//x = column name (ex: College Enrolled)
			//inner[x] = column object
			//numInner = # of unique attrs per column (resets per column)
			var numInner = 0,
			eInner = eData[x],
			neInner = neData[x];

			//Specific Column data (if = filter)
			if(x == "college_admitted"){
				
				for(y in neInner){
					//Go colum data
					//y = data label (ex: Arts & Sciences)
					//inner[y] = value (ex: Num students in Arts & Sciences)
					innerCount++;
					numInner++;
					
					var ePercent = Math.ceil((eInner[y] / eCount)*100),
					nePercent = Math.ceil((neInner[y] / neCount)*100);
					thisDifference = ePercent - nePercent;
					
					data.push( {
						"column":x,
						"label":y,
						"eValue":eInner[y],
						"neValue":neInner[y],
						"ePercent":ePercent,
						"nePercent":nePercent,
						"difference":thisDifference
					})
				}
			}
			
			//Number of columns
			columnCount++;
		}
		
		function sortValues(a,b){
			return a.data - b.data;
		}

		//difference.sort(sortValues);
		numData = data.length;
		console.log(data)
		for(var i = 0; i < numData; i++){
		//	console.log(data[i].label + " --------- " + data[i].difference)
		}
	});