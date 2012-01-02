google.load("visualization", "1", {packages:["corechart"]});
function drawVisualization() {
  // Create and populate the data table.
    var exp2 = parseInt($("#exp2").html().replace(/^\$|,/g,''));
	var sav1 = exp2 - parseInt($("#sav1").html().replace(/^\$|,/g,''));
	var exp3 = parseInt($("#exp3").text().replace(/^\$|,/g,''));
	var sav2 = exp3 - parseInt($("#sav2").html().replace(/^\$|,/g,''));
	var exp4 = parseInt($("#exp4").html().replace(/^\$|,/g,''));
	var sav3 = exp4 - parseInt($("#sav3").html().replace(/^\$|,/g,''));
	
  var data = new google.visualization.DataTable();
  var raw_data = [['Typical', exp2, exp3, exp4],
                  ['CSC', sav1, sav2, sav3]];
  
  var years = ["Spine","Physical Therapy", "Chiropractic"];
                  
  data.addColumn('string', 'Year');
  for (var i = 0; i  < raw_data.length; ++i) {
    data.addColumn('number', raw_data[i][0]);    
  }
  
  data.addRows(years.length);

  for (var j = 0; j < years.length; ++j) {    
    data.setValue(j, 0, years[j].toString());    
  }
  for (var i = 0; i  < raw_data.length; ++i) {
    for (var j = 1; j  < raw_data[i].length; ++j) {
      data.setValue(j-1, i+1, raw_data[i][j]);    
    }
  }
  
  // Create and draw the visualization.
  new google.visualization.ColumnChart(document.getElementById('graph2')).
      draw(data,
           { 
            width:800, height:400,
            vAxis: {title: "Cost ($)"}}
      );
}


google.setOnLoadCallback(drawVisualization);