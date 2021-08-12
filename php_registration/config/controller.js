$().ready(function () {
    var emailval = $('#email').attr('emailval');
    var phoneval=$('#phone_no').attr('phoneval');
    $('#registeruser').validate({
        errorClass: 'errors',
        rules: {
            firstname: "required",
            lastname: "required",
            password: {
                required: true,
                minlength: 4,
                maxlength: 8,
            },
            cpassword: {
                required: true,
                minlength: 4,
                maxlength: 8,
                equalTo: "#password",
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: emailval,
                    type: "post",
                }
            },
            phone_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number:true,
            remote: {
                url: phoneval,
                type: "post",
            }
            },
        },
        messages: {
            firstname: "Please enter you firstname",
            lastname: "Please enter you lastname",
            password: {
                required: "Please provide a password",
                minlength: "your password must be atleast 4 characters long",
                maxlength: "your password must contain 8 characters only",
            },
            cpassword: {
                required: "Please provide a password",
                minlength: "your password must be atleast 4 characters long",
                maxlength: "your password must contain 8 characters only",
                equalTo: "Please enter the same password as above",
            },
            email: {
                required: "Please provide a email",
                email: "Please provide a valid email",
                remote: "The email is already in use by another user!"
            },
            phone_no: {
                required:"Please Enter your mobile number",
                minlength: "your mobile no must contain 10 digits",
                maxlength: "your mobile no must not exceed 10 digits",
                number:"Invalid number",
                remote: "The mobile number is already in use by another user!",
                },
        },
        submitHandler: function (form) {
            $('#registeruser').on('submit', function () {
                var add_url = $('#registeruser').attr("action");
                var redir = $('#registeruser').attr("redir");
                $.ajax({
                    type: 'post',
                    url: add_url,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function () {
                        alert('User was added sucessfully');
                        window.location.href = redir;
                    }
                });
            });
        },

        errorPlacement: function (error, element) {
            error.addClass('errors');
            error.css('color', 'Tomato');
            error.insertAfter(element);
        }
    });

})


