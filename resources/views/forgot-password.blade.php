<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Forgot Password</title>
    <link type="image/x-icon" rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/assets/style.css"> -->
    <link rel="stylesheet" href="/assets/css/form-pages.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
                <h2 class="text-center">Forgot Password</h2>
                <p class="text-center">Enter your email address</p>
                <div id="fail-rec-password" class="alert alert-danger text-center">
                  What's wrong, please write to our support
                </div>
                <div id="success-rec-password" class="alert alert-success text-center">
                    We successfully sent the recovery link to your email
                </div>
                <div class="form-group">
                    <input class="form-control" id="email" type="email" name="email" placeholder="Enter email address" required value="">
                </div>
            @csrf
                <div class="form-group">
                    <input id="restore-password-btn" class="form-control button" type="submit" name="check-email" value="Continue">
                </div>
        </div>
    </div>
</div> -->
<div class="check-email" style="display: none">
    <div class="check-email__container check-email__container_big">
        <div class="check-email__block block-modal">
            <h1 class="block-modal__title block-modal__title_green">Check Your Email</h1>
            <div class="block-modal__description">We have sent you further payment instructions to your email</div>
            <div class="block-modal__actions">
                <a href="" class="block-modal__button button-form button-form_red">Resend Link</a>
            </div>
        </div>
        <div class="check-email__wrapper">
            <div class="check-email__image-ibg">
                <img src="assets/images/bitcoin-concept-illustration.jpg" alt="Bitcoin concept illustration">
            </div>
        </div>
    </div>
</div>
<div class="forgot-password">
    <div class="forgot-password__container">
        <div class="forgot-password__block block-modal">
            <h1 class="block-modal__title block-modal__title_red">Forgot your password ?</h1>
            <div class="block-modal__description">Enter you email and we will send you instructions to reset your password</div>
            <form action="#" class="block-modal__form form">
                <div class="form__items">
                    <div class="form__item">
                        <label class="form__label" for="email">Email</label>
                        <input id="email" required type="email" name="email" placeholder="" class="form__input input input__email">
                    </div>
                </div>
                <div class="form__actions">
                    <button id="restore-password-btn" type="submit" class="form__button button-form button-form_green">Continue</button>
                </div>
            </form>
            <div class="block-modal__links">
                <a href="{{route('home')}}" class="block-modal__link">Go back to log in</a>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    $(document).on('click', '#restore-password-btn', function(e) {
        sendRequestLogin(this);
    });

    function sendRequestLogin() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = 'send-forgot-password-link';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'email':$('#email').val(),
            },
            success: function (data) {
                // errors = JSON.parse(data.responseText);
                $('.check_email').show()
                // $('.forgot-password').hide()
                formMessage(200, data, 5000)
            },
            error: function (data){
                errors = JSON.parse(data.responseText);
                formMessage(data.status, errors.message, 5000)

                // alert(errors.message); //use this message for error
                // $('#fail-rec-password').show();
                // $('#fail-rec-password').hide(5000);
            }
        })
    }

    let hiddenFormMessageTimeout;

    function formMessage(status, message, timeout) {
        document.querySelector('.notification')?.remove();
        clearTimeout(hiddenFormMessageTimeout);

        const notification = document.createElement('div');
        notification.classList.add('notification');
        notification.classList.add(`${status === 200 ? 'notification_success' : 'notification_error'}`);
        notification.innerHTML = `
            <div class="notification__container">
                <div class="notification__message">
                    ${message}
                </div>
            </div>
            `;

        document.body.appendChild(notification);

        setTimeout(() => notification.classList.add('show'), 10);

        hiddenFormMessageTimeout = setTimeout(() => hiddenFormMessage(notification), timeout);

        function hiddenFormMessage(item) {
            item.classList.remove('show');

            setTimeout(() => {
                document.querySelector('.notification')?.remove();
            }, 500);
        }
    }
</script>

</html>