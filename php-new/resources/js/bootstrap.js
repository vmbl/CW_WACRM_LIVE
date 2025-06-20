import axios from 'axios';
import Echo from '@ably/laravel-echo';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

//import './echo';
import Ably from 'ably';

window.Ably = Ably

// Create new echo client instance using ably-js client driver.
window.Echo = new Echo({
    broadcaster: 'ably',
});

// Register a callback for listing to connection state change 
window.Echo.connector.ably.connection.on((stateChange) => {
    console.log("LOGGER:: Connection event :: ", stateChange);
    if (stateChange.current === 'disconnected' && stateChange.reason?.code === 40142) { // key/token status expired
        console.log("LOGGER:: Connection token expired https://help.ably.io/error/40142");
    }
});


