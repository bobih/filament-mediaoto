import './bootstrap';
import 'flowbite';
import './darktogle';
import './notif';



import { initializeApp } from "firebase/app";
import { getMessaging, getToken } from "firebase/messaging";
import { onBackgroundMessage } from "firebase/messaging/sw";

import '../../node_modules/flag-icon-css/css/flag-icons.min.css';
import Observer from 'tailwindcss-intersect';

import { Animate, Ripple, Carousel, initTE } from "tw-elements";
import jQuery from 'jquery';






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
    initTE({ Ripple, Animate, Carousel }, { allowReinits: true });


    initFlowbite();
    initTE({ Animate, Ripple, Carousel });

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

                if(fcmstore != currentToken || fcmstore == ''){
                    console.log('update token....');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        url: '/settoken',
                        type: "POST",
                        data:     {fcmtoken: currentToken, fcmstore: fcmstore},
                        dataType: "json",
                        error: function (request, error) {
                            console.log('error Update');
                            console.log(error);

                        },
                        success:function(data) {
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
        script.type = 'text/javascript';
        script.src = "https://www.google.com/recaptcha/api.js?render=6LeHcFYpAAAAAOKa9eRzN5C431nydTUyCVbqEfZZ";

        head.appendChild(script);

    }, 3000);


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
})

