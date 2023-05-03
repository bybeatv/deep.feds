self.addEventListener('push', function(event) {
    var subscriptionId;
    event.waitUntil(
        self.registration.pushManager.getSubscription().then(function(subscription) {
            subscriptionId = subscription.endpoint.split('/');
            subscriptionId = subscriptionId[subscriptionId.length - 1];

            fetch('app/actions/get-notification.php?endpoint=' + subscriptionId).then(function(response) {
                if (response.status !== 200) {
                    console.log('Problem. Status Code: ' + response.status);
                    throw new Error();
                }
                return response.json().then(function(data) {
                    if (data.type == 'success') {
              					
							var notificationOptions = {
								body: data.body,
								icon: data.icon,
								tag: data.tag,
							};
							var title = data.title;

							return self.registration.showNotification(title, notificationOptions);
                    }
                });
            });

        }).catch(function(error) {
            console.error('Unable to get subscription data', error);
        })

    );
});

self.addEventListener('notificationclick', function(event) {
    var subscriptionId;
    self.registration.pushManager.getSubscription().then(function(subscription) {
        subscriptionId = subscription.endpoint.split('/');
        subscriptionId = subscriptionId[subscriptionId.length - 1];

        fetch('app/actions/get-notification.php?url&endpoint=' + subscriptionId).then(function(response) {});

    }).catch(function(error) {
        console.error('Unable to get subscription data', error);
    })

    event.notification.close();

    event.waitUntil(
        clients.matchAll({
            type: "window"
        })
        .then(function(clientList) {
            for (var i = 0; i < clientList.length; i++) {
                var client = clientList[i];
                if (client.url == '/' && 'focus' in client)
                    return client.focus();
            }
            if (clients.openWindow) {
                return clients.openWindow(event.notification.tag);
            }
        })
    );
});