import axios from 'axios';
import Echo from 'laravel-echo';


window.axios = axios;
window.Pusher = require('pusher-js');


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-key',
    cluster: 'your-pusher-cluster',
    forceTLS: true,
});
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */



import './echo';
