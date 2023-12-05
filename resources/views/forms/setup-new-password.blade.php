<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link type="image/x-icon" rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/assets/style.css"> -->
    <link rel="stylesheet" href="/assets/css/form-pages.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
                <h2 class="text-center">Restore password</h2>
                <p class="text-center">Enter your new password</p>
                <div id="fail-rec-password" class="alert alert-danger text-center">
                  What's wrong, please write to our support
                </div>
                <div id="success-rec-password" class="alert alert-success text-center">
                    We successfully sent the recovery link to your email
                </div>
            <div id="form-setup-new-password">
                <div class="form-group">
{{--                    <input class="form-control" id="email" type="hidden" name="email"  required value="{{$email}}">--}}
                    <input class="form-control" id="newpass" type="password" name="newpass"  required value="">
                    <input class="form-control" id="newpass_confirmed" type="password" name="newpass"  required value="">
                </div>
                @csrf
                <div class="form-group">
                    <input id="setup-new-password-btn" class="form-control button" type="submit" name="check-email" value="Continue">
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="restore-password">
    <div class="restore-password__container">
        <div class="restore-password__block block-modal">
            <h1 class="block-modal__title block-modal__title_red">Restore password</h1>
            <div class="block-modal__description">Enter your new password</div>
            <div data-valid-pass="init" data-progress-pass class="block-modal__form form">
                <div class="form__items">
                    <div class="form__item">
                        <label class="form__label" for="newpass">Password</label>
                        <div class="form__body">
                            <input id="newpass" data-valid-pass="pass1" type="password" name="newpass" pattern="(?=.*\d)(?=.*[a-z]).{7,}" placeholder="" class="form__input input input__pass">
                            <button class="form__viewpass" type="button"></button>
                        </div>
                        <div class="pass-message">
                            <div id="pswmeter"></div>
                            <h3 class="pass-message__title">Password must contain the following:</h3>
                            <div id="pass-letter" class="pass-message__item invalid">A letter</div>
                            <div id="pass-number" class="pass-message__item invalid">A number</div>
                            <div id="pass-length" class="pass-message__item invalid">Minimum 7 characters</div>
                        </div>
                    </div>
                    <div class="form__item">
                        <label class="form__label" for="newpass_confirmed">Confirm password</label>
                        <div class="form__body">
                            <input id="newpass_confirmed" data-valid-pass="pass2" type="password" name="newpass" placeholder="" class="form__input input input__pass">
                            <button class="form__viewpass" type="button"></button>
                        </div>
                    </div>
                </div>
                <div class="form__actions">
                    @csrf
                    <input class="form-control" id="email" type="hidden" name="email"  required value="{{$email}}">

                    <button id="setup-new-password-btn" data-valid-pass="submit" type="submit" class="form__button button-form button-form_green">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/assets/js/pass-validation.js"></script>
</body>
<script type="text/javascript">
    $(document).on('click', '#setup-new-password-btn', function(e) {
        sendRequestSetupPass(this);
    });

    function sendRequestSetupPass() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        url = 'setup-new-password';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'email':$('#email').val(),
                'password':$('#newpass').val(),
                'password_confirmed':$('#newpass_confirmed').val(),
            },
            success: function (data) {
                $('#success-rec-password').show();
                $('#form-setup-new-password').hide();
                $('#fail-rec-password').hide();
                window.location.replace(data);

            },
            error: function (data) {
                data = JSON.parse(data.responseText) // use this message for error

                formMessage(data.status, data, 5000)

                // alert(data)
                // $('#fail-rec-password').show()
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