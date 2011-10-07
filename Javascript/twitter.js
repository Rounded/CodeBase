//Use like: twitter('url','div')
(function($){
	$.extend({
		twitter :function(url,div){
			$.getJSON(url,
	        function(data){
				$.each(data, function(i, item) {
					//$("img#profile").attr("src", item.user["profile_image_url"]); 
					$("#"+div+"").append("<li><span class='username'>@"+ item.user['screen_name']+"</span>&nbsp;<span class='created_at'>" + relative_time(item.created_at) + "</span><br>" + item.text.linkify() + "</li>");
				});
	        });
		}
	});
})(jQuery);

String.prototype.linkify = function() {
	return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
		return m.link(m);
		});
}

function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);

  var r = '';
  if (delta < 60) {
    r = 'a minute ago';
  } else if(delta < 120) {
    r = 'couple of minutes ago';
  } else if(delta < (45*60)) {
    r = (parseInt(delta / 60)).toString() + ' minutes ago';
  } else if(delta < (90*60)) {
    r = 'an hour ago';
  } else if(delta < (24*60*60)) {
    r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
  } else if(delta < (48*60*60)) {
    r = '1 day ago';
  } else {
    r = (parseInt(delta / 86400)).toString() + ' days ago';
  }

  return r;
}

function twitter_callback (){
	return true;
}