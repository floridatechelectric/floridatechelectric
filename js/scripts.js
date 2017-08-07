(function() {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#CCC", cursorwidth: '4', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#FF9554", cursorwidth: '4', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});

  
  
    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

})(jQuery);

                     
//polyfill for custom events
(function () {
  function CustomEvent ( event, params ) {
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    var evt = document.createEvent( 'CustomEvent' );
    evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
    return evt;
   }
  CustomEvent.prototype = window.Event.prototype;
  window.CustomEvent = CustomEvent;
})();


var fireWhenReady = function(el) {
    var notCalled = true,
        event = new CustomEvent('inViewPort'),
        checkViewport = function() {
                var rect = el[0].getBoundingClientRect();
                if (
                  rect.top >= 0 &&
                  rect.left >= 0 &&
                  rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && 
                  rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                ) {
                  el[0].dispatchEvent(event);
                  notCalled = false;
                }
        };
    window.addEventListener('scroll', function() {
        notCalled && requestAnimationFrame(checkViewport);
    })
};

document.querySelector('.lazyLoad').addEventListener('inViewPort',function() {
    var dsrc = this.getAttribute('data-src');
    this.setAttribute('src', dsrc);
});


fireWhenReady(document.querySelectorAll('.lazyLoad'), 100);
  