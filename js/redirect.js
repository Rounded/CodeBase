/**********************/
/*  Constants & Notes */
/**********************/
var mobile_site_url = "http://www.wearemobile.co/cmc";
var days_to_keep_cookie = 5;
var url_to_stop_redirect = "?mobile=false";
// Don't change anything below this line
/**********************/
/* /Constants & Notes */
/**********************/



function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function noMoreMobile() {
	setCookie("mobile","false",days_to_keep_cookie);
}

function checkCookie()
{
 var is_mobile = (/iphone|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
 
    if (is_mobile) {  
			console.log("Mobile device detected");
			var mobile_redirect_status=getCookie("mobile");
			if (mobile_redirect_status==null) {
				console.log("Cookies hasn't been set yet");
        window.location.href = mobile_site_url;  
			} else if(mobile_redirect_status=="true"){
				console.log("Cookie is saying to redirect");
        window.location.href = mobile_site_url;
			} else if(mobile_redirect_status=="false") {
				console.log("Cookie is saying to NOT redirect");
			}
    }
}
if(window.location.search === url_to_stop_redirect){
	noMoreMobile();
}
checkCookie();