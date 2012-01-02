$(document).ready(function(){
			$.getJSON("http://blog.rounded.co/api/read/json?callback=?",
			function(data) {
			//console.log(data);
				console.log(data.posts);        
			$.each(data.posts, function(i,posts){
				var id = this.id;
				var type = this.type;
				var date = this.date;
				var url = this.url;
				var quote = this["quote-text"];
				var quoteSource = this["quote-source"];
				var tags = this.tags;
				var regularTitle = this["regular-title"];
				var regularBody = this["regular-body"];
				var caption = this["photo-caption"];
				var photo = this["photo-url-500"];
				var linkText = this["link-text"];
				var linkUrl = this["link-url"];
				var videoCaption = this["video-caption"];
				var video = this["video-player-500"];


				if (type=='quote'){
					$('ul').append('<li class="blog-' +type+ '">'+quote+'<br>'+quoteSource+' </li>');
				}
				else if (type=='regular'){
					$('ul').append('<li class="blog-' +type+ '">'+regularTitle+'<br>'+regularBody+' </li>');
				}
				else if (type=='photo'){
					$('ul').append('<li class="blog-' +type+ '">'+caption+'<br><img src="'+photo+'"></li>');
				}
				else if (type=='link'){
					$('ul').append('<li class="blog-' +type+ '"><a href="'+linkUrl+'">'+linkText+'</a></li>');
				}
				else{//Video
					$('ul').append('<li class="blog-' +type+ '">'+videoCaption+'<br>'+video+' </li>');
				}
			});//End Each Function

			});//End data Function

			});//End document funtion