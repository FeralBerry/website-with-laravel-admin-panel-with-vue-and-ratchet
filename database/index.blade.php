<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .chat-row{
            margin:50px;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        ul li {
            padding: 10px;
            background-color: #0b2e13;
            margin-bottom: 20px;
        }
        ul li:nth-child(2n-2){
            background-color: #0a53be;
        }
        .chat-input {
            border: 1px solid #444;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            padding: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row chat-row">
        <div class="chat-content">
            <ul>
                <li></li>
            </ul>
        </div>
        <div class="chat-section">
            <div class="chat-box">
                <div class="chat-input bg-warning" id="chatInput" contenteditable="">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>
<script>
    $(function(){
        let ip_address = '127.0.0.1';
        let socket_port = '3000';
        let socket = io(ip_address + ":" + socket_port);
        let chatInput = $('#chatInput');
        chatInput.keypress(function (e) {
            let message = $(this).html();
            if(e.which === 13 && !e.shiftKey){
                socket.emit('sendChatToServer',message);
                chatInput.html('');
                return false;
            }
        });
        socket.on("sendChatToClient",(message) => {
            $('.chat-content ul').append(`<li>${message}</li>`);
        });
    });
</script>
</body>
</html>
