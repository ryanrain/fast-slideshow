// Lory: https://github.com/meandmax/lory
!function(e,t){if("object"==typeof exports&&"object"==typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{var n=t();for(var o in n)("object"==typeof exports?exports:e)[o]=n[o]}}(this,function(){return function(e){function t(o){if(n[o])return n[o].exports;var i=n[o]={exports:{},id:o,loaded:!1};return e[o].call(i.exports,i,i.exports,t),i.loaded=!0,i.exports}var n={};return t.m=e,t.c=n,t.p="",t(0)}([function(e,t,n){e.exports=n(1)},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{"default":e}}function i(e,t){function n(e,t){var n=D,o=n.classNameActiveSlide;e.forEach(function(e,t){e.classList.contains(o)&&e.classList.remove(o)}),e[t].classList.add(o)}function o(e){var t=D,n=t.infinite,o=e.slice(0,n),i=e.slice(e.length-n,e.length);return o.forEach(function(e){var t=e.cloneNode(!0);B.appendChild(t)}),i.reverse().forEach(function(e){var t=e.cloneNode(!0);B.insertBefore(t,B.firstChild)}),B.addEventListener(O.transitionEnd,y),v.call(B.children)}function i(t,n,o){(0,c["default"])(e,t+".lory."+n,o)}function a(e,t,n){var o=B&&B.style;o&&(o[O.transition+"TimingFunction"]=n,o[O.transition+"Duration"]=t+"ms",O.hasTranslate3d?o[O.transform]="translate3d("+e+"px, 0, 0)":o[O.transform]="translate("+e+"px, 0)")}function d(e,t){var o=D,r=o.slideSpeed,s=o.slidesToScroll,d=o.infinite,c=o.rewind,l=o.rewindSpeed,u=o.ease,f=o.classNameActiveSlide,m=r,p=t?A+1:A-1,h=Math.round(N-S);i("before","slide",{index:A,nextSlide:p}),"number"!=typeof e&&(e=t?A+s:A-s),e=Math.min(Math.max(e,0),_.length-1),d&&void 0===t&&(e+=d);var b=Math.min(Math.max(-1*_[e].offsetLeft,-1*h),0);c&&Math.abs(M.x)===h&&t&&(b=0,e=0,m=l),a(b,m,u),M.x=b,_[e].offsetLeft<=h&&(A=e),!d||Math.abs(b)!==h&&0!==Math.abs(b)||(t&&(A=d),t||(A=_.length-2*d),M.x=-1*_[A].offsetLeft,P=function(){a(-1*_[A].offsetLeft,0,void 0)}),f&&n(v.call(_),A),i("after","slide",{currentSlide:A})}function l(){i("before","init"),O=(0,s["default"])(),D=r({},u["default"],t);var a=D,d=a.classNameFrame,c=a.classNameSlideContainer,l=a.classNamePrevCtrl,m=a.classNameNextCtrl,p=a.enableMouseEvents,E=a.classNameActiveSlide;j=e.getElementsByClassName(d)[0],B=j.getElementsByClassName(c)[0],k=e.getElementsByClassName(l)[0],T=e.getElementsByClassName(m)[0],M={x:B.offsetLeft,y:B.offsetTop},_=D.infinite?o(v.call(B.children)):v.call(B.children),f(),E&&n(_,A),k&&T&&(k.addEventListener("click",h),T.addEventListener("click",b)),B.addEventListener("touchstart",x),p&&(B.addEventListener("mousedown",x),B.addEventListener("click",w)),D.window.addEventListener("resize",C),i("after","init")}function f(){var e=D,t=e.infinite,n=e.ease,o=e.rewindSpeed;N=B.getBoundingClientRect().width||B.offsetWidth,S=j.getBoundingClientRect().width||j.offsetWidth,S===N&&(N=_.reduce(function(e,t){return e+t.getBoundingClientRect().width||t.offsetWidth},0)),A=0,t?(a(-1*_[A+t].offsetLeft,0,null),A+=t,M.x=-1*_[A].offsetLeft):a(0,o,n)}function m(e){d(e)}function p(){return A-D.infinite||0}function h(){d(!1,!1)}function b(){d(!1,!0)}function E(){i("before","destroy"),B.removeEventListener(O.transitionEnd,y),B.removeEventListener("touchstart",x),B.removeEventListener("touchmove",L),B.removeEventListener("touchend",g),B.removeEventListener("mousemove",L),B.removeEventListener("mousedown",x),B.removeEventListener("mouseup",g),B.removeEventListener("mouseleave",g),B.removeEventListener("click",w),D.window.removeEventListener("resize",C),k&&k.removeEventListener("click",h),T&&T.removeEventListener("click",b),i("after","destroy")}function y(){P&&(P(),P=void 0)}function x(e){var t=D,n=t.enableMouseEvents,o=e.touches?e.touches[0]:e;n&&(B.addEventListener("mousemove",L),B.addEventListener("mouseup",g),B.addEventListener("mouseleave",g)),B.addEventListener("touchmove",L),B.addEventListener("touchend",g);var r=o.pageX,a=o.pageY;z={x:r,y:a,time:Date.now()},R=void 0,F={},i("on","touchstart",{event:e})}function L(e){var t=e.touches?e.touches[0]:e,n=t.pageX,o=t.pageY;F={x:n-z.x,y:o-z.y},"undefined"==typeof R&&(R=!!(R||Math.abs(F.x)<Math.abs(F.y))),!R&&z&&(e.preventDefault(),a(M.x+F.x,0,null)),i("on","touchmove",{event:e})}function g(e){var t=z?Date.now()-z.time:void 0,n=Number(t)<300&&Math.abs(F.x)>25||Math.abs(F.x)>S/3,o=!A&&F.x>0||A===_.length-1&&F.x<0,r=F.x<0;R||(n&&!o?d(!1,r):a(M.x,D.snapBackSpeed)),z=void 0,B.removeEventListener("touchmove",L),B.removeEventListener("touchend",g),B.removeEventListener("mousemove",L),B.removeEventListener("mouseup",g),B.removeEventListener("mouseleave",g),i("on","touchend",{event:e})}function w(e){F.x&&e.preventDefault()}function C(e){f(),i("on","resize",{event:e})}var M=void 0,N=void 0,S=void 0,_=void 0,j=void 0,B=void 0,k=void 0,T=void 0,O=void 0,P=void 0,A=0,D={};"undefined"!=typeof jQuery&&e instanceof jQuery&&(e=e[0]);var z=void 0,F=void 0,R=void 0;return l(),{setup:l,reset:f,slideTo:m,returnIndex:p,prev:h,next:b,destroy:E}}var r=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e};Object.defineProperty(t,"__esModule",{value:!0}),t.lory=i;var a=n(2),s=o(a),d=n(3),c=o(d),l=n(5),u=o(l),v=Array.prototype.slice},function(e,t){(function(e){"use strict";function n(){var t=void 0,n=void 0,o=void 0,i=void 0;return function(){var r=document.createElement("_"),a=r.style,s=void 0;""===a[s="webkitTransition"]&&(o="webkitTransitionEnd",n=s),""===a[s="transition"]&&(o="transitionend",n=s),""===a[s="webkitTransform"]&&(t=s),""===a[s="msTransform"]&&(t=s),""===a[s="transform"]&&(t=s),document.body.insertBefore(r,null),a[t]="translate3d(0, 0, 0)",i=!!e.getComputedStyle(r).getPropertyValue(t),document.body.removeChild(r)}(),{transform:t,transition:n,transitionEnd:o,hasTranslate3d:i}}Object.defineProperty(t,"__esModule",{value:!0}),t["default"]=n}).call(t,function(){return this}())},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{"default":e}}function i(e,t,n){var o=new a["default"](t,{bubbles:!0,cancelable:!0,detail:n});e.dispatchEvent(o)}Object.defineProperty(t,"__esModule",{value:!0}),t["default"]=i;var r=n(4),a=o(r)},function(e,t){(function(t){function n(){try{var e=new o("cat",{detail:{foo:"bar"}});return"cat"===e.type&&"bar"===e.detail.foo}catch(t){}return!1}var o=t.CustomEvent;e.exports=n()?o:"function"==typeof document.createEvent?function(e,t){var n=document.createEvent("CustomEvent");return t?n.initCustomEvent(e,t.bubbles,t.cancelable,t.detail):n.initCustomEvent(e,!1,!1,void 0),n}:function(e,t){var n=document.createEventObject();return n.type=e,t?(n.bubbles=Boolean(t.bubbles),n.cancelable=Boolean(t.cancelable),n.detail=t.detail):(n.bubbles=!1,n.cancelable=!1,n.detail=void 0),n}}).call(t,function(){return this}())},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t["default"]={slidesToScroll:1,slideSpeed:300,rewindSpeed:600,snapBackSpeed:200,ease:"ease",rewind:!1,infinite:!1,classNameFrame:"js_frame",classNameSlideContainer:"js_slides",classNamePrevCtrl:"js_prev",classNameNextCtrl:"js_next",classNameActiveSlide:"active",enableMouseEvents:!1,window:window}}])});

// http://youmightnotneedjquery.com/#ready
function ready(fn) {
  if (document.readyState !== "loading"){
    fn();
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
} 
ready(function(){
	/*
	 * slideshow
	 */
	var sliderMarkup = document.querySelector('.js_slider');
	window.sliderAuto = true;
	window.sliderLory = lory(sliderMarkup, {
	    infinite: 1, 
	    // enableMouseEvents: true
	});
	window.sliderLory.setup(); // firefox bug?

	// autoscroll
	window.setInterval(function(){
		if (window.sliderAuto) {
			window.sliderLory.next();
		}
	}, 6000);

	// pause autoscroll if user has manually interacted with slider
	var sliderPrev = document.querySelector('.js_prev');
	var sliderNext = document.querySelector('.js_next');
	sliderPrev.addEventListener("click", pauseSlideshow);
	sliderNext.addEventListener("click", pauseSlideshow);
	sliderMarkup.addEventListener("on.lory.touchend", pauseSlideshow);

	function pauseSlideshow () {
		window.sliderAuto = false;
	}

}); // ready