<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Publish an event to channel <code>my-channel</code> with event name
        <code>my-event</code>; it will appear below:
    </p>
    <div id="app">
        <p id="demo"></p>
    </div>

    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("6d0175c1e6b9d2b994db", {
            cluster: "ap1"
        });

        var channel = pusher.subscribe("my-channel");
        channel.bind("form-submitted", function(data) {
            document.getElementById("demo").innerHTML = data.text;
        });

        // Vue application
        const app = new Vue({
            el: "#app",
            data: {
                messages: []
            }
        });
    </script>
</body>