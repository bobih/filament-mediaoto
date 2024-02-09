import './bootstrap';
import 'flowbite';
import './darktogle';
import './notif';
import '../../node_modules/flag-icon-css/css/flag-icons.min.css';

document.addEventListener('livewire:navigated', () => {
    // console.log('navigated');
    initFlowbite();

    setTimeout(function(){
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.onload = function() {
            grecaptcha.ready(function() {
                grecaptcha.execute('6LeHcFYpAAAAAOKa9eRzN5C431nydTUyCVbqEfZZ', {action: 'homepage'}).then(function(token) {

                });
            });
        }
        script.src = "https://www.google.com/recaptcha/api.js?render=6LeHcFYpAAAAAOKa9eRzN5C431nydTUyCVbqEfZZ";
        head.appendChild(script);
     }, 5000);
})

