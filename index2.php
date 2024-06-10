<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat System</title>
<style>
    #chat-box {
        width: 300px;
        height: 300px;
        border: 1px solid #ccc;
        overflow-y: scroll;
    }
    #message-input {
        width: 100%;
    }
</style>
</head>
<body>

<div id="chat-box"></div>
<input type="text" id="message-input" placeholder="Type your message...">
<button id="send-btn">Send</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    function appendMessage(message) {
        $('#chat-box').append('<div>' + message + '</div>');
        $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
    }

    $('#send-btn').click(function(){
        var message = $('#message-input').val();
        if (message !== "") {
            $.ajax({
                url: 'save_message.php',
                method: 'POST',
                data: {message: message},
                success: function(response){
                    appendMessage('You: ' + message);
                    appendMessage('Bot: ' + response);
                    $('#message-input').val('');
                }
            });
        }
    });

    $('#message-input').keypress(function(event){
        if (event.which === 13) {
            $('#send-btn').click();
        }
    });
});
</script>

</body>
</html>
