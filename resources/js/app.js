import './bootstrap';
import 'flowbite';
import './darktogle';
import './notif';
import '../../node_modules/flag-icon-css/css/flag-icons.min.css';
import { Animate, Ripple, Carousel, initTE } from "tw-elements";
initFlowbite();
initTE({ Animate, Ripple, Carousel});


document.addEventListener('livewire:navigated', () => {
    console.log('navigated');
    initFlowbite();
    initTE({ Ripple, Animate,Carousel }, { allowReinits: true });

    setTimeout(function(){
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "https://www.google.com/recaptcha/api.js?render=6LeHcFYpAAAAAOKa9eRzN5C431nydTUyCVbqEfZZ";
        head.appendChild(script);
     }, 2000);

})

