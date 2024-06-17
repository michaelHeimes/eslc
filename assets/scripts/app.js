/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// Accordian
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@*prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@*prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    // Custom Functions
    
    _app.mobile_takover_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
    _app.image_slider = function() {
        if( document.querySelector( '.image-slider-swiper' ) ) {
            
            const sliders = document.querySelectorAll('.image-slider-swiper .swiper-container');            
            
            sliders.forEach(function (slider, index) {
                const dots = slider.parentElement.querySelector('.swiper-pagination');
                const swiperPrev = slider.parentElement.querySelector('.swiper-button-prev');
                const swiperNext = slider.parentElement.querySelector('.swiper-button-next');
                const swiper = new Swiper(slider, {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    navigation: {
                        enabled: true,
                        nextEl: swiperNext,
                        prevEl: swiperPrev,
                    },
                    pagination: {
                        el: dots,
                        clickable: true
                    },
                });  
            });
            
        }
    }
    
    _app.count_up = function() {
        (function ($) {
            $.fn.countTo = function (options) {
                options = options || {};
                
                return $(this).each(function () {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from:            $(this).data('from'),
                        to:              $(this).data('to'),
                        speed:           $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals:        $(this).data('decimals')
                    }, options);
                    
                    // how many times to update the value, and how much to increment the value on each update
                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;
                    
                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};
                    
                    $self.data('countTo', data);
                    
                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(updateTimer, settings.refreshInterval);
                    
                    // initialize the element with the starting value
                    render(value);
                    
                    function updateTimer() {
                        value += increment;
                        loopCount++;
                        
                        render(value);
                        
                        if (typeof(settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                        }
                        
                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;
                            
                            if (typeof(settings.onComplete) == 'function') {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }
                    
                    function render(value) {
                        var formattedValue = settings.formatter.call(self, value, settings);
                        $self.html(formattedValue);
                    }
                });
            };
            
            $.fn.countTo.defaults = {
                from: 0,               // the number the element should start at
                to: 0,                 // the number the element should end at
                speed: 1000,           // how long it should take to count between the target numbers
                refreshInterval: 100,  // how often the element should be updated
                decimals: 0,           // the number of decimal places to show
                formatter: formatter,  // handler for formatting the value before rendering
                onUpdate: null,        // callback method for every time the element is updated
                onComplete: null       // callback method for when the element finishes updating
            };
            
            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));
        
        jQuery(function ($) {
          // custom formatting example
          $('.count-number').data('countToOptions', {
            formatter: function (value, options) {
              return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
          });
          
          // start all the timers
          $('.timer').each(count);  
          
          function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
          }
        });
    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        _app.fixed_nav_hack();
        // _app.display_on_load();
        
        // Custom Functions
        _app.image_slider();
        _app.count_up();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);