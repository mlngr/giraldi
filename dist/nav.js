/*
    throttle helper

*/

const throttle = (func, limit) => {
    let inThrottle
    return function() {
      const args = arguments
      const context = this
      if (!inThrottle) {
        func.apply(context, args)
        inThrottle = true
        setTimeout(() => inThrottle = false, limit)
      }
    }
  }

/*
    Intersection observer for lazyloading and animations
*/

setTimeout(() => {
    // animation observer
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
         if (entry.intersectionRatio > 0) {
            entry.target.classList.add('did-appear');
            observer.unobserve(entry.target);
         } 
       });
   }, { threshold: [0] });
   
   document.querySelectorAll('.will-appear').forEach(elem => {
      observer.observe(elem);
   });

   // image observer
   const observerImage = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.intersectionRatio > 0) {

                entry.target.querySelectorAll('[data-srcset]').forEach(elem => {
                    elem.setAttribute('srcset', elem.getAttribute('data-srcset'))
                    elem.removeAttribute('data-srcset')
                })

                entry.target.querySelectorAll('[data-src]').forEach(elem => {
                    elem.setAttribute('src', elem.getAttribute('data-src'))
                    elem.removeAttribute('data-src')

                    elem.classList.add('did-appear')
                })

                observer.unobserve(entry.target);
            } 
        });
    }, { threshold: [0] });
    
    document.querySelectorAll('.responsive-image').forEach(elem => {
        observerImage.observe(elem);
    }); 
}, 200);

/*
    page fade
*/

document.querySelectorAll('.js-page-transition').forEach(elem => {
    elem.addEventListener('click', e => {
        e.preventDefault();
        pageTransition(e.currentTarget.getAttribute('href'))
    })
})

window.onpopstate = e => {
    e.preventDefault();
    pageTransition(document.location)
};

setTimeout(() => {
    document.querySelector('body').classList.remove('transition-out');

    setTimeout(() => {
        document.querySelector('body').classList.remove('transition-in');
    }, 1000)
},10)

// to force a state refresh on the site in firefox
window.onunload = function(){}; 

function unloadingWebsite() {
    document.querySelector('body').classList.remove('transition-out')

}
window.addEventListener("pagehide", function() {
    unloadingWebsite();
});
window.addEventListener("pageshow", function() {
    unloadingWebsite();
});

function pageTransition(target) {
    document.querySelector('body').classList.add('transition-out')

    setTimeout(() => {
        window.location.href = target;
    }, 1000)
}


/*
    text-image trigger
*/

const toggleCaption = e => {
        const open = e.classList.toggle('state--open');
	const h = open ? `${e.querySelector('.js-text-image__text-wrapper').clientHeight}px` : 0 ;
        e.querySelector('.js-text-image__text-inner').style.height = h;
}

document.querySelectorAll('.js-text-image__trigger').forEach(elem => {
    elem.addEventListener('click', e => {
        e.preventDefault();
	toggleCaption(e.currentTarget.parentElement);
    })
});

const isDesktop = window.matchMedia('(min-width: 1000px)').matches;
if(isDesktop){
	document.querySelectorAll('.project div+a.js-text-image__trigger').forEach(elem => {
		toggleCaption(elem.parentElement);
	})
}

/*
    transition hover
*/

document.querySelectorAll('.js-transition-hover').forEach(elem => {
    elem.addEventListener('mousemove', e => {
        getPosition(e)
    });

    elem.addEventListener('mouseenter', e => {
        const current = e.currentTarget.parentElement;
        current.classList.add('state--hover')
    });

    elem.addEventListener('mouseleave', e => {
        const current = e.currentTarget.parentElement;
        current.classList.remove('state--hover')
    });
})

function getPosition(e) {
    var rect = e.currentTarget.getBoundingClientRect();
    var x = (e.clientX - rect.left) / e.currentTarget.offsetWidth - 0.5;
    var y = e.clientY - rect.top;
    
    root.style.setProperty("--project-hover-x", x.toFixed(3));
    root.style.setProperty("--project-hover-y", y.toFixed(1));
  }

  /*
    Home
  */

if(document.querySelector('.swiper-container')) {

    setTimeout(() => {
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            direction: 'vertical',
            slidesPerView: 1,
            paginationClickable: true,
            spaceBetween: 0,
            mousewheelControl: true,
            speed: 600,
            effect: 'fade'
        });

        document.querySelectorAll('.js-home__hover').forEach(elem => {
            elem.addEventListener('mouseenter', () => {
                document.querySelector('.js-home__slider').classList.add('state--hover')
            })
            elem.addEventListener('mouseleave', () => {
                document.querySelector('.js-home__slider').classList.remove('state--hover')
            })
        })
        
        swiper.on('init', swiper =>  {
            switchTheme()
        })

        let lastIndex = 0;
        
        swiper.on('slideChangeStart', swiper =>  {
            const elements = document.querySelectorAll('.js-home__count-inner');
            const currentElem = elements[swiper.activeIndex];
            const prevElem = elements[lastIndex];
            let direction;

            elements.forEach(elem => {
                elem.classList.remove('state--active')
            })
        
            if (lastIndex < swiper.activeIndex) {
                // swipe down
                prevElem.classList.add('state--top')
                direction = 'down';

                // put current it down 
                currentElem.classList.add('state--reset');
                currentElem.classList.remove('state--top');
                currentElem.classList.remove('state--reset');

                // put prev back down
                setTimeout(() => {
                    prevElem.classList.add('state--reset')
                    prevElem.classList.remove('state--top');

                    setTimeout(() => {
                        prevElem.classList.remove('state--reset');
                    },100)
                }, 1000)
            } else {

                // put current up
                currentElem.classList.add('state--reset');
                currentElem.classList.add('state--top');
                    
                setTimeout(() => {
                    currentElem.classList.remove('state--reset');
                    // swipe up
                    currentElem.classList.remove('state--top')
                },100)

                direction = 'up';
            }

            // set pagination status
            document.querySelector('.js-home__pagination-bullet').style.top = `${swiper.activeIndex * 30}px`;
        
            // check color
            switchTheme(direction)
        
            currentElem.classList.add('state--active');
            
            lastIndex = swiper.activeIndex;
        });
    }, 300)
}

function switchTheme(direction) {
    const elem = document.querySelector('.swiper-slide-active');

    if (direction === 'up') {
        elem.classList.add('state--top')
    } else {
        elem.classList.remove('state--top')
    }

    document.querySelector('body').classList.remove('state--color-black')
    document.querySelector('body').classList.remove('state--color-gray')

    if(elem.dataset.slideColor && elem.dataset.slideColor !== 'white') {
        document.querySelector('body').classList.add(`state--color-${elem.dataset.slideColor}`)
    } 
}

if (document.querySelector('.swiper-container-ticker')) {

    document.querySelectorAll('.swiper-container-ticker').forEach(elem => {
        const randomClass = `swiper-${Math.ceil(Math.random() * 10000)}`;

        elem.classList.add(randomClass)

        const swiper = new Swiper(`.${randomClass}`, {
            wrapperClass: 'swiper-wrapper-ticker',
            slideClass: 'swiper-slide-ticker',
            slidesPerView: 'auto',
            spaceBetween: 0,
            freeMode: true,
        });
    })
}

/**
 * Project overview Title
 * 
 */
/*const title = document.querySelector('.js-project-overview__title');

if (title) {
    window.addEventListener('scroll',() => {
        document.querySelector('.js-project-overview__title').classList.add('state-scrolling')
        document.querySelector('.js-project-overview__title').style.transform = `translate3d(0,${document.scrollingElement.scrollTop/2}px, 0)`
    });
}*/
