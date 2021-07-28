
//Add user ajax call
$(function () {
    $('#adduser').on('submit', function () {
        var add_url = $('#adduser').attr("action");
        $.ajax({
            type: 'post',
            url: add_url,
            data: $('form').serialize(),
            success: function () {
                alert('User was added sucessfully');
                window.location.href = "pagination.php";
            }
        });
    });

    $('#edituser').on('submit', function () {
        //var edit_url = $('#edituser').attr("action");
        var page = $('#page').attr("page")
        $.ajax({
            type: 'post',
            url: 'http://localhost:1011/php-html/server/update.php',
            data: $('form').serialize(),
            success: function () {
                alert('User was updated sucessfully');
                window.location.href = "pagination.php?page=" + page;
            }
        });
    });


    //Delete user ajax call 

    $(document).on("click", ".delete-btn", function () {
        var customer_id = $(this).attr("id");
        if (confirm("Are you sure delete this ?" + customer_id)) {
            // var action = $('#deleteuser').attr('action');
            var page = $('#deleteuser').attr('page');
            $.ajax({
                url: 'http://localhost:1011/php-html/server/delete.php?customer_id=' + customer_id,
                type: "post",
                cache: false,
                data: {
                    "customer_id": customer_id
                },
                success: function (response) {
                    alert("User record deleted successfully");
                    window.location.href = "pagination.php?page=" + page;
                }
            });
        }
    });
});

