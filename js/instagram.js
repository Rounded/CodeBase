(function($){
  $.fn.instagram = function(options) {
    var that = this,
        apiEndpoint = "https://api.instagram.com/v1",
        settings = {
          hash: null,
          accessToken: null,
          clientId: null,
          show: null,
          onLoad: null,
          onComplete: null,
          maxId: null,
          minId: null
        };
        
    options && $.extend(settings, options);
    
    function createPhotoElement(photo,num) {
      return $('<div>')
        .addClass('instagram-placeholder')
        .attr('id', photo.id)
            .append(
              $('<img>')
                .addClass('instagram-image')
                .attr('src', photo.images.thumbnail.url)
				.attr('alt', photo.images.low_resolution.url)
				.attr('id', 'i'+num+'')
            )
        
    }

    
    function composeRequestURL() {
      var url = apiEndpoint,
          params = {};
      
      if(settings.hash != null) {
        url += "/tags/" + settings.hash + "/media/recent";
      }
      else {
        url += "/media/popular";
      }
      
      settings.accessToken != null && (params.access_token = settings.accessToken);
      settings.clientId != null && (params.client_id = settings.clientId);

      url += "?" + $.param(params);
      
      return url;
    }
    
    settings.onLoad != null && typeof settings.onLoad == 'function' && settings.onLoad();
    
    $.ajax({
      type: "GET",
      dataType: "jsonp",
      cache: false,
      url: composeRequestURL(),
      success: function(res) {
        settings.onComplete != null && typeof settings.onComplete == 'function' && settings.onComplete(res.data);
        
        var limit = settings.show == null ? res.data.length : settings.show;
        
        for(var i = 0; i < limit; i++) {
          that.append(createPhotoElement(res.data[i],i));
        }
      }
    });
    
    return this;
  };

})(jQuery);
