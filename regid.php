<?php
const push = PushNotification.init({

    android: {
    },
    browser: {
        pushServiceURL: 'http://push.api.phonegap.com/v1/push'
    },
    ios: {
        alert: "true",
        badge: "true",
        sound: "true"
    },
    windows: {}

});

push.on('registration', function ( data ) {
	
    recordRegistrationID( data.registrationId ); //Pseudo

});

push.on('notification', function ( data ) {

    // data.message,
    // data.title,
    // data.count,
    // data.sound,
    // data.image,
    // data.additionalData

});

push.on('error', (e) => {

    // e.message

});