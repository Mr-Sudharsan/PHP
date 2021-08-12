$().ready(function () {
    $('#loginuser').on('submit', function (e) {
        var add_url = $('#loginuser').attr('action');
        var redir = $('#loginuser').attr('redir');
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: add_url,
            data: $('form').serialize(),
            cache: false,
            success: function (data) {
                var res = $.parseJSON(data);
                if (res.status == 1) {
                    window.location.href = redir;
                }
                else {
                    $('#invalid_login').text("Invalid Email or password");
                }
            }
        });
    });
});
