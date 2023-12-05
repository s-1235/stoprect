$(document).on('click', '#sign_up', function(e) {
    sendRequestLogin(this); 
}); 

$(document).on('click', '#btn-logout', function(e) {
    sendRequestLogout(this);
});
function sendRequestLogin() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    url = 'login';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'email':$( "input[name='email']" ).val(),
            'password':$( "input[name='pass']" ).val(),
        },
        success: function (data) {
            console.log("result"+data);
            window.location.href='/';
        },
    })
}


function sendRequestLogout() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    url = 'logout';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
        },
        success: function (data) {
            log.console("oki"+data);
        }
    })
}
