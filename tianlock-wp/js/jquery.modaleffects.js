/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 */
(function(e){function a(h){return new RegExp("(^|\\s+)"+h+"(\\s+|$)")}var d,f,g;if("classList" in document.documentElement){d=function(h,i){return h.classList.contains(i)};f=function(h,i){h.classList.add(i)};g=function(h,i){h.classList.remove(i)}}else{d=function(h,i){return a(i).test(h.className)};f=function(h,i){if(!d(h,i)){h.className=h.className+" "+i}};g=function(h,i){h.className=h.className.replace(a(i)," ")}}function b(i,j){var h=d(i,j)?g:f;h(i,j)}var c={hasClass:d,addClass:f,removeClass:g,toggleClass:b,has:d,add:f,remove:g,toggle:b};if(typeof define==="function"&&define.amd){define(c)}else{e.classie=c}})(window);
var ModalEffects=(function(){function a(){var b=document.querySelector(".md-overlay");[].slice.call(document.querySelectorAll(".md-trigger")).forEach(function(e,d){var f=document.querySelector("#"+e.getAttribute("data-modal")),h=f.querySelector(".md-close");function g(i){classie.remove(f,"md-show");if(i){classie.remove(document.documentElement,"md-perspective")}}function c(){g(classie.has(e,"md-setperspective"))}e.addEventListener("click",function(i){classie.add(f,"md-show");if(classie.has(e,"md-setperspective")){setTimeout(function(){classie.add(document.documentElement,"md-perspective")},25)}});h.addEventListener("click",function(i){i.stopPropagation();c()})})}a()})();