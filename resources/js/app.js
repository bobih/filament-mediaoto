import './bootstrap';
import 'flowbite';
import './darktogle';
import './notif';



import { initializeApp } from "firebase/app";
import { getMessaging, getToken } from "firebase/messaging";
import { onBackgroundMessage } from "firebase/messaging/sw";

import '../../node_modules/flag-icon-css/css/flag-icons.min.css';
import Observer from 'tailwindcss-intersect';

import { Animate, Ripple, Carousel, LazyLoad, initTE } from "tw-elements";
import jQuery from 'jquery';


window.iniTE = initTE;
window.Animate = Animate;
window.LazyLoad = LazyLoad;
window.Ripple = Ripple;
window.Carousel = Carousel;



//requestPermission();


// Request Notification Permission


document.addEventListener('DOMContentLoaded', () => {
    window.$ = jQuery;

});


document.addEventListener('livewire:update', function () {
    console.log('livewire:update');
});


document.addEventListener('livewire:navigated', () => {
    console.log('navigated');
    initFlowbite();
    initTE({ Ripple, Animate, Carousel, LazyLoad }, { allowReinits: true });

    window.$ = jQuery;


    Observer.start();

    const firebaseConfig = {
        apiKey: "AIzaSyCjO4yYxDMZzKorD0dq4zZlNTmDMBzLgz8",
        authDomain: "mediaoto-b3ac5.firebaseapp.com",
        projectId: "mediaoto-b3ac5",
        storageBucket: "mediaoto-b3ac5.appspot.com",
        messagingSenderId: "676189219899",
        appId: "1:676189219899:web:0deaa956dfaafb4eb0001e",
        measurementId: "G-Q7LP278P3T"
    };

    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);

    setTimeout(function () {

        getToken(messaging, { vapidKey: 'BLAS3rXde9HJb5ShCKkLck1jjoxilByCSt4t_318DETgDBj36VPGlPG8sHiq8WSG4Gk4HdJvGlop5VFwAJVHaNg' }).then((currentToken) => {
            if (currentToken) {
                //console.log(currentToken);
                var fcmstore = localStorage.getItem('fcmtoken');

                if (fcmstore != currentToken || fcmstore == '') {
                    console.log('update token....');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/settoken',
                        type: "POST",
                        data: { fcmtoken: currentToken, fcmstore: fcmstore },
                        dataType: "json",
                        error: function (request, error) {
                            console.log('error Update');
                            console.log(error);

                        },
                        success: function (data) {
                            //console.log('Success');
                            //console.log(data);
                            localStorage.setItem('fcmtoken', currentToken);

                        },
                    });
                }


            } else {
                // Show permission request UI
                console.log('No registration token available. Request permission to generate one.');
                requestPermission();
                // ...
            }
        }).catch((err) => {
            //console.log('An error occurred while retrieving token. ', err);
            // ...
        });
    }, 5000);

    function requestPermission() {
        console.log('Requesting permission...');
        // [START request_permission]
        messaging.requestPermission().then(function () {
            console.log('Notification permission granted.');
            // TODO(developer): Retrieve an Instance ID token for use with FCM.
            // [START_EXCLUDE]
            // In many cases once an app has been granted notification permission, it
            // should update its UI reflecting this.
            //resetUI();
            // [END_EXCLUDE]
        }).catch(function (err) {
            console.log('Unable to get permission to notify.', err);
        });
        // [END request_permission]
    }







    Observer.start();


    setTimeout(function () {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.setAttribute('id', 'gcaptchasrc');
        script.setAttribute('async', '');
        script.setAttribute('defer', '');
        script.type = 'text/javascript';
        script.src = "https://www.google.com/recaptcha/api.js?render=6LeHcFYpAAAAAOKa9eRzN5C431nydTUyCVbqEfZZ";

        head.appendChild(script);

    }, 3000);




    let lastScrollTop =
        window.scrollY || document.documentElement.scrollTop;

    window.addEventListener(
        'scroll',
        function handleScroll() {
            const scrollTopPosition =
                window.scrollY || document.documentElement.scrollTop;

            const manuallyEl = document.getElementById("mobilesearch");
            if (manuallyEl != null) {

                if (scrollTopPosition > lastScrollTop) {
                    // console.log('scrolling down');


                    document.getElementById("mobilesearch").classList.remove('opacity-100');
                    document.getElementById("mobilesearch").classList.remove('-mt-4');
                    document.getElementById("mobilesearch").classList.add('opacity-0');
                    document.getElementById("mobilesearch").classList.add('-mt-20');
                    document.getElementById("searchbox").setAttribute("disabled", true);



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


    /*** Video Lazy Load ***/

    var video = document.getElementById('newsVideo');
    var source = document.createElement('source');
    source.setAttribute('src', 'https://www.mediaoto.id/videos/news3.webm');
    source.setAttribute('type', 'video/webm');

    if (video != null) {
        video.appendChild(source);
        video.onloadeddata = function(){
            video.play();
        };

    }

    /***** Banner Lazy Load ***/
    const imgBanner = document.getElementById('bannerImg');

    if (imgBanner != null) {
        const imgUrl = imgBanner.getAttribute('data-src');
        imgBanner.setAttribute('src', imgUrl);
        imgBanner.removeAttribute('data-src');
        if (imgBanner.complete) {
           animateBanner();
        } else {
            imgBanner.addEventListener('load', animateBanner);
        }

    }

    function animateBanner() {
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

                        imgBanner.classList.add('opacity-100');
                        manually.startAnimation();
                    } else {

                        imgBanner.classList.remove('opacity-100');
                        imgBanner.classList.add('opacity-0');
                        //  manually.stopAnimation();
                    }
                });
            }, {
                threshold: 0.5,
                //rootMargin: "-100px"
            });


            observer.observe(card[0]);
        }
    }

    /** Test Lottie */
    const aecontainer = document.getElementById('bm');
    if(aecontainer != null){


        var uri = aecontainer.getAttribute('datasrc');

        function Get(uri){
            var httReq = new XMLHttpRequest();

            //httReq.open('GET',uri,false);
            //httReq.send(null);
            //return httReq.responseText;

            httReq.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    return this.responseText;
                }
            };

            httReq.open('GET',uri,false);
            httReq.send(null);

        }

        function init(){
            let brandroll = document.getElementById("brandroll");
            brandroll.stop();
            let animation = null;
            let title1 = aecontainer.getAttribute('title1');
            let title2 = aecontainer.getAttribute('title2');
            let title3 = aecontainer.getAttribute('title3');
            var jsonObj = JSON.parse(Get(uri));


            jsonObj.layers[0].t.d.k[0].s.t = title3;
            jsonObj.layers[1].t.d.k[0].s.t =  title2;
            jsonObj.layers[2].t.d.k[0].s.t =  title1;


            animation =  lottie.loadAnimation({
                container: document.getElementById('bm'),
                renderer: 'svg',
                loop: false,
                autoplay: false,
                animationData: jsonObj,

              });
                animation.play();
                animation.addEventListener('complete', completedAnim);

                function completedAnim(){
                //console.log(jsonObj);
                document.getElementById("gplaybtn").classList.remove('opacity-0');
                brandroll.classList.remove('opacity-0');
                brandroll.classList.add('opacity-10');
                brandroll.start();


                //document.getElementById("gplaybtn").classList.add('opacity-100');


              }
        }

        init();

    }



})

