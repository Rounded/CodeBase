google.load("visualization", "1", {packages:["corechart"]});
function drawVisualization() {
	// Create and populate the data table.
	var exp = parseInt($("#exp1").html().replace(/^\$|,/g,''));
	var sav = exp - parseInt($("#sav4").html().replace(/^\$|,/g,''));
	var data = new google.visualization.DataTable();
	var csc1 = sav;
	var csc2 = Math.round(csc1*1.04);
	var csc3 = Math.round(csc2*1.04);
	var csc4 = Math.round(csc3*1.04);
	var typ1 = Math.round(exp);
	var typ2 = Math.round(typ1*1.15);
	var typ3 = Math.round(typ2*1.15);
	var typ4 = Math.round(typ3*1.15);
	data.addColumn('string', 'x');
	data.addColumn('number', 'Typical');
	data.addColumn('number', 'CSC');
	data.addRow(["2011", typ1, csc1]);
	data.addRow(["2012", typ2, csc2]);
	data.addRow(["2013", typ3, csc3]);
	data.addRow(["2014", typ4, csc4]);
	
	
	
	
	// Create and draw the visualization.
	new google.visualization.LineChart(document.getElementById('graph1')).
	  draw(data, {curveType: "function",
	  			  pointSize: 7,
	              width: 860, height: 500,
	              vAxis: {maxValue: 10, title: "Expenses ($)"}
	           	}
	          
	      );
	 
	 
	
	  
}


google.setOnLoadCallback(drawVisualization);

