//Use like: vimeo('username','div')
(function($){
  $.extend({
    vimeo : function(username, div, num, key){
        if(username == null) return false;
        if(div == null) div = "vimeo";

        var userInfoUrl = 'http://www.vimeo.com/api/' + username + '/user_info.json?callback=userInfo';
        var clipsUrl = 'http://www.vimeo.com/api/' + username + '/clips.json?callback=showThumbs';
        
        showThumbs = function(clips) {
            var thumbs = document.getElementById(div);
            thumbs.innerHTML = '';

            var ul = document.createElement('ul');
            thumbs.appendChild(ul);

            for (var i = 0; i < clips.length; i++) {
                var thumb = document.createElement('img');
                thumb.setAttribute('src', clips[i].thumbnail_medium);
                thumb.setAttribute('alt', clips[i].title);
                thumb.setAttribute('title', clips[i].title);
                thumb.setAttribute('class', 'bing-images');
                var a = document.createElement('a');
                a.setAttribute('href', clips[i].url);
                a.setAttribute('target', clips[i], '_blank');
                a.appendChild(thumb);

                var li = document.createElemen`t('li');
                li.appendChild(a);
                ul.appendChild(li);
            }
        }

        var head = document.getElementsByTagName('head').item(0);

        var userJs = document.createElement('script');
        userJs.setAttribute('type', 'text/javascript');
        head.appendChild(userJs);

        var clipsJs = document.createElement('script');
        clipsJs.setAttribute('type', 'text/javascript');
        clipsJs.setAttribute('src', clipsUrl);
        head.appendChild(clipsJs);
        
      
    }
  });
})(jQuery);
        
      