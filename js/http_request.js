function httpRequest(reqType,url,asynch) {
 
	// Mozilla-based browsers
	if (window.XMLHttpRequest) {
		request = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		request = new ActiveXObject("Msxml2.XMLHTTP");
		if (!request) {
			request = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
 
	// Request could still be null if neither ActiveXObject
	//   initialization succeeded
	if (request) {
		// If the reqType param is POST, then the fifth arg is the POSTed data
		if (reqType.toLowerCase() != "post") {
			initReq(reqType, url, asynch, respHandle);
		} else {
			// The POSTed data
			var args = arguments[4];
			if (args != null && args.length > 0) {
				initReq(reqType, url, asynch, respHandle, args);
			}
		}
	} else {
		alert("Your browser does not permit the use of all " +
			"of this application's features!");
	}
 
}
 
// ----------------------------------------
// Initialize a request object that is already constructed
// ----------------------------------------
 
function initReq(reqType, url, bool, respHandle) {
	try {
		// Specify the function that will handle the HTTP response
		request.onreadystatechange = handleResponse;
		request.open(reqType, url, bool);
		// If the reqType param is POST, then the
		//   fifth argument to the function is the POSTed data
		if (reqType.toLowerCase() == "post") {
			// Set the Content-Type header for a POST request
			request.setRequestHeader("Content-Type", "application/x-ww-form-urlencoded; charset=UTF-8");
			request.send(arguments[4]);
		} else {
			request.send(null);
		}
	} catch (errv) {
		alert("The application cannot contact the server at the moment. " +
			"Please try again in a few seconds.\n" +
			"Error detail: " errv.message);
	}
}