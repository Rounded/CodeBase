function rColor(length){
	var hexArray = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f'];
	var colorArray = [];

	for(var i=0;i<length;i++){
		var color = "#";
		for(var ii=0;ii<6;ii++){
			color += hexArray[Math.floor(Math.random()*16)];
		}
		colorArray.push(color);
	}
	
	return colorArray;
}

function getMax(whichArray){
	var max = whichArray[0];

	for(var i = 0; i<whichArray.length; i++){
		if (whichArray[i] > max)
			max = whichArray[i]
	 	else
			max = max;
	}
	return max;
}

function luminance(hex, lum) {
	// validate hex string
	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;
	// convert to decimal and change luminosity
	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}
	return rgb;
}

function sum(whichArray){
	var sum = 0;
	for(var i=0;i<whichArray.length;i++){
		sum = sum + whichArray[i];
	}

	return sum;
}