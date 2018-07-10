$(document).ready(function() {
    $('#chatbox').scrollTop($('#chatbox').height());
    //setInterval(location.reload(), 5500);
    $('#send').click(function() {
        var msg = $('#message').val();
        $.ajax({
            url: 'chatbox.php',
            type: 'post',
            data: {
                'message': msg,
            }
        });
    });
});