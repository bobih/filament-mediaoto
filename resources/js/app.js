import './bootstrap';
import 'flowbite';
import './darktogle';
import './notif';
import '../../node_modules/flag-icon-css/css/flag-icons.min.css';
import Observer from 'tailwindcss-intersect';

import { Animate, Ripple, Carousel, initTE } from "tw-elements";
initFlowbite();
initTE({ Animate, Ripple, Carousel });
Observer.start();

document.addEventListener('livewire:navigated', () => {
    console.log('navigated');
    initFlowbite();
    initTE({ Ripple, Animate, Carousel }, { allowReinits: true });
    Observer.start();

    setTimeout(function () {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "https://www.google.com/recaptcha/api.js?render=6LeHcFYpAAAAAOKa9eRzN5C431nydTUyCVbqEfZZ";
        head.appendChild(script);
    }, 2000);


    const card = document.querySelectorAll('#animate')

    if (card.length > 0) {
        const observer = new IntersectionObserver(entries => {

            entries.forEach(entry => {
                // console.log(entry);

                const manuallyEl = entry.target;
                //console.log(manuallyEl);
                const manually = new Animate(manuallyEl, {

                });
                if (entry.isIntersecting) {
                    manually.startAnimation();
                } else {
                    // manually.stopAnimation();
                }
            });
        }, {
            threshold: 0.5,
            //rootMargin: "-100px"
        });


        observer.observe(card[0]);
    }

    /*
        window.onscroll = function() {


        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("mobilesearch").style.top = "20";
        } else {
            document.getElementById("mobilesearch").style.top = "20";
        }
        }

        */

    let lastScrollTop =
        window.scrollY || document.documentElement.scrollTop;

    window.addEventListener(
        'scroll',
        function handleScroll() {
            const scrollTopPosition =
                window.scrollY || document.documentElement.scrollTop;

            const manuallyEl = document.getElementById("mobilesearch");
            if (manuallyEl  != null) {

                if (scrollTopPosition > lastScrollTop) {
                    // console.log('scrolling down');


                    document.getElementById("mobilesearch").classList.remove('opacity-100');
                    document.getElementById("mobilesearch").classList.remove('-mt-4');
                    document.getElementById("mobilesearch").classList.add('opacity-0');
                    document.getElementById("mobilesearch").classList.add('-mt-20');
                    document.getElementById("searchbox").setAttribute("disabled",true);



                } else if (scrollTopPosition < lastScrollTop) {
                    // console.log('scrolling up');

                    document.getElementById("mobilesearch").classList.remove('-mt-20');
                    document.getElementById("mobilesearch").classList.add('-mt-4');
                    document.getElementById("mobilesearch").classList.remove('opacity-0');
                    document.getElementById("mobilesearch").classList.add('opacity-100');
                    document.getElementById("searchbox").removeAttribute("disabled");

                }
                lastScrollTop =
                    scrollTopPosition <= 0 ? 0 : scrollTopPosition;
            }
        },
        false,
    );



})

