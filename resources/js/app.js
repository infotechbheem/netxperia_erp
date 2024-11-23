import './bootstrap';
const userId = 1;  // The user ID you're targeting

window.Echo.channel('user.' + userId)
    .listen('NotificationSent', (event) => {
        console.log('New notification:', event.message);
        // You can use this to update the UI with the message
    });
