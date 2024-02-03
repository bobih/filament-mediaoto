import './bootstrap';
import 'flowbite';
import './darktogle';
import './notif';
import '../../node_modules/flag-icon-css/css/flag-icons.min.css';

document.addEventListener('livewire:navigated', () => {
    // console.log('navigated');
    initFlowbite();
})

