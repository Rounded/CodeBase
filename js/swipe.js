/*
 * touchSwipe - jQuery Plugin
 * http://plugins.jquery.com/project/touchSwipe
 * http://labs.skinkers.com/touchSwipe/
 *
 * Copyright (c) 2010 Matt Bryson (www.skinkers.com)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * $version: 1.2.5
 */(function(a){a.fn.swipe=function(b){if(!this)return!1;var c={fingers:1,threshold:75,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,click:null,triggerOnTouchEnd:!0,allowPageScroll:"auto"},d="left",e="right",f="up",g="down",h="none",i="horizontal",j="vertical",k="auto",l="start",m="move",n="end",o="cancel",p="ontouchstart"in window,q=p?"touchstart":"mousedown",r=p?"touchmove":"mousemove",s=p?"touchend":"mouseup",t="touchcancel",u="start";b.allowPageScroll==undefined&&(b.swipe!=undefined||b.swipeStatus!=undefined)&&(b.allowPageScroll=h);b&&a.extend(c,b);return this.each(function(){function b(a){var b=p?a.touches[0]:a;u=l;p&&(G=a.touches.length);distance=0;direction=null;if(G==c.fingers||!p){H.x=I.x=b.pageX;H.y=I.y=b.pageY;c.swipeStatus&&y(a,u)}else x(a);D.addEventListener(r,v,!1);D.addEventListener(s,w,!1)}function v(a){if(u==n||u==o)return;var b=p?a.touches[0]:a;I.x=b.pageX;I.y=b.pageY;direction=C();p&&(G=a.touches.length);u=m;z(a,direction);if(G==c.fingers||!p){distance=A();c.swipeStatus&&y(a,u,direction,distance);if(!c.triggerOnTouchEnd&&distance>=c.threshold){u=n;y(a,u);x(a)}}else{u=o;y(a,u);x(a)}}function w(a){a.preventDefault();distance=A();direction=C();if(c.triggerOnTouchEnd){u=n;if(G!=c.fingers&&!!p||I.x==0){u=o;y(a,u);x(a)}else if(distance>=c.threshold){y(a,u);x(a)}else{u=o;y(a,u);x(a)}}else if(u==m){u=o;y(a,u);x(a)}D.removeEventListener(r,v,!1);D.removeEventListener(s,w,!1)}function x(a){G=0;H.x=0;H.y=0;I.x=0;I.y=0;J.x=0;J.y=0}function y(a,b){c.swipeStatus&&c.swipeStatus.call(E,a,b,direction||null,distance||0);b==o&&c.click&&(G==1||!p)&&(isNaN(distance)||distance==0)&&c.click.call(E,a,a.target);if(b==n){c.swipe&&c.swipe.call(E,a,direction,distance);switch(direction){case d:c.swipeLeft&&c.swipeLeft.call(E,a,direction,distance);break;case e:c.swipeRight&&c.swipeRight.call(E,a,direction,distance);break;case f:c.swipeUp&&c.swipeUp.call(E,a,direction,distance);break;case g:c.swipeDown&&c.swipeDown.call(E,a,direction,distance)}}}function z(a,b){if(c.allowPageScroll==h)a.preventDefault();else{var l=c.allowPageScroll==k;switch(b){case d:(c.swipeLeft&&l||!l&&c.allowPageScroll!=i)&&a.preventDefault();break;case e:(c.swipeRight&&l||!l&&c.allowPageScroll!=i)&&a.preventDefault();break;case f:(c.swipeUp&&l||!l&&c.allowPageScroll!=j)&&a.preventDefault();break;case g:(c.swipeDown&&l||!l&&c.allowPageScroll!=j)&&a.preventDefault()}}}function A(){return Math.round(Math.sqrt(Math.pow(I.x-H.x,2)+Math.pow(I.y-H.y,2)))}function B(){var a=H.x-I.x,b=I.y-H.y,c=Math.atan2(b,a),d=Math.round(c*180/Math.PI);d<0&&(d=360-Math.abs(d));return d}function C(){var a=B();return a<=45&&a>=0?d:a<=360&&a>=315?d:a>=135&&a<=225?e:a>45&&a<135?g:f}var D=this,E=a(this),F=null,G=0,H={x:0,y:0},I={x:0,y:0},J={x:0,y:0};try{this.addEventListener(q,b,!1);this.addEventListener(t,x)}catch(K){}})}})(jQuery);