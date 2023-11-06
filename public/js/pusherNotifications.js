var notificationsWrapper = $('.alert-dropdown');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('div.alert-body');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('real-notification');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\RealNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml = '<p>yyyyyyyyy</p>';
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
