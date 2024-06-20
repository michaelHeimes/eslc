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
//@*prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

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

// GSAP & ScrollTrigger
//@prepros-prepend vendor/gsap.min.js
//@prepros-prepend vendor/ScrollTrigger.min.js


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
    
    _app.parentLinkClones = function() {
        document.querySelectorAll('.menu-item-has-children').forEach(function(menuItem) {
            const anchor = menuItem.querySelector('a');
            
            if (anchor && anchor.getAttribute('href') !== '#') {
                const submenu = menuItem.querySelector('.submenu');
                
                if (submenu) {
                    const clone = menuItem.cloneNode(true);
                    const cloneLink = clone.querySelector('a');
                    const cloneText = cloneLink.textContent;
                    
                    // Create a wrapper span for the link text
                    const linkTitleWrapper = document.createElement('span');
                    linkTitleWrapper.textContent = cloneText;
    
                    // Create the arrow element
                    const arrow = document.createElement('div');
                    arrow.style.width = '17px';
                    arrow.innerHTML = '<svg width="17" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.752 6.845H1.322a.783.783 0 0 1-.586-.242.828.828 0 0 1-.236-.6c0-.24.08-.44.236-.603a.783.783 0 0 1 .584-.24h12.431l-3.6-3.705a.804.804 0 0 1-.242-.587.877.877 0 0 1 .24-.598.826.826 0 0 1 .586-.27.764.764 0 0 1 .585.252l4.9 5.038c.096.094.17.208.217.333.042.117.063.243.063.38 0 .134-.02.261-.063.377a.935.935 0 0 1-.217.333l-4.9 5.038a.77.77 0 0 1-.58.248.812.812 0 0 1-.59-.265.894.894 0 0 1-.247-.593.797.797 0 0 1 .247-.592l3.602-3.704Z" fill="#fff"/></svg>';
    
                    // Clear the original text content from the link
                    cloneLink.textContent = '';
                    
                    // Append the wrapped text and arrow to the link
                    cloneLink.appendChild(linkTitleWrapper);
                    cloneLink.appendChild(arrow);
                    
                    // Remove any <ul> elements within the clone
                    const nestedUl = clone.querySelectorAll('ul');
                    nestedUl.forEach(ul => ul.remove());
                    
                    // Remove unnecessary classes
                    clone.classList.remove('menu-item-has-children', 'is-dropdown-submenu-parent');
                    clone.classList.add('cloned-link');
                    cloneLink.classList.add('grid-x', 'align-middle', 'cloned-link');
                    arrow.classList.add('svg');
                    
                    // Insert the clone at the beginning of the submenu
                    submenu.insertBefore(clone, submenu.firstChild);
                }
                    
                // Remove url from parent link and replace with a # 
                anchor.href = "#";
                
            }
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
        const menuToggle = $('a#menu-toggle');
        console.log(menuToggle);
        const offCanvas = $('#off-canvas');
        menuToggle.on('click', function() {
            console.log($(this));
            if ( $(menuToggle).hasClass('clicked') ) {
                $(menuToggle).removeClass('clicked');
                $(offCanvas).fadeOut(200);
                $(menuToggle).attr('aria-expanded', 'false');
                $(offCanvas).attr('aria-hidden', 'true');
                $('body').removeClass('menu-open');
            } else {
                $(menuToggle).addClass('clicked');
                $(offCanvas).fadeIn(200);
                $(menuToggle).attr('aria-expanded', 'true');
                $(offCanvas).attr('aria-hidden', 'false');
                $('body').addClass('menu-open');
            }
            
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                if( $(menuToggle).hasClass('clicked') ) {
                    menuToggle.click();
                }
            };
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
        gsap.registerPlugin(ScrollTrigger);
        
        // Format number with commas
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        function countUp(element) {
            const startValue = parseInt(element.dataset.numberfrom, 10);
            const endValue = parseInt(element.dataset.numberto, 10);
        
            ScrollTrigger.create({
                trigger: element,
                start: "top 95%",
                onEnter: () => {
                    gsap.fromTo(
                        element,
                        { innerText: startValue },
                        {
                            innerText: endValue,
                            duration: 5,
                            ease: 'power1.out',
                            snap: { innerText: 1 },
                            onUpdate: function () {
                                element.innerText = formatNumber(Math.ceil(element.innerText));
                            }
                        }
                    );
                },
                once: true,
                // markers: true
            });
        }
    
        document.querySelectorAll('.js-countup-target').forEach(countUp);

    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        // _app.fixed_nav_hack();
        _app.mobile_takover_nav();
        // _app.display_on_load();
        
        // Custom Functions
        _app.parentLinkClones();
        _app.image_slider();
        _app.count_up();
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);