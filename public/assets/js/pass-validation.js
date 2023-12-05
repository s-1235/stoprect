(() => {
    const passParent = document.querySelector('[data-valid-pass="init"]');
    const passProgress = document.querySelector('[data-progress-pass]');

    if (passProgress) {
        const myPassMeter = passwordStrengthMeter({
            containerElement: '#pswmeter',
            passwordInput: '[data-valid-pass="pass1"]',
            borderRadius: 3,
            height: 5,
            pswMinLength: 7,
        });
    }

    if (passParent) {
        passMessage();
    }

    document.addEventListener('click', function (e) {
        let targetElement = e.target;
        if (targetElement.closest('[class*="__viewpass"]')) {
            let inputType = targetElement.classList.contains('_viewpass-active')
                ? 'password'
                : 'text';
            targetElement.parentElement.querySelector('input').setAttribute('type', inputType);
            targetElement.classList.toggle('_viewpass-active');
        }
    });

    function passMessage() {
        const myInput = passParent.querySelector('[data-valid-pass="pass1"]');
        const myInput2 = passParent.querySelector('[data-valid-pass="pass2"]');
        const formErrMessage = passParent.querySelector('.form-err-message__item');
        const letter = document.getElementById('pass-letter');
        const number = document.getElementById('pass-number');
        const length = document.getElementById('pass-length');
        const spaces = /\s/g;
        const numbers = /[0-9]/g;
        const lowerCaseLetters = /[a-z]/g;
        const passTest = /(?=.*\d)(?=.*[a-z]).{7,}/g;

        passParent.addEventListener('submit', (e) => {
            e.preventDefault()
            if (myInput.value.match(passTest) &&
            !myInput.value.match(spaces) &&
            myInput.value === myInput2.value) {
                passParent.submit()
            } else {
                addError(formErrMessage,  "Please fill in all fields")
            }
        })

        // submitButton.setAttribute('disabled', true);

        // When the user clicks on the password field, show the message box
        myInput.addEventListener('focusin', e => {
            passParent.querySelector('.pass-message').classList.add('show-message');
        });

        // When the user clicks outside of the password field, hide the message box
        myInput.addEventListener('focusout', e => {
            passParent.querySelector('.pass-message').classList.remove('show-message');

            if (
                !myInput.value.match(passTest) &&
                !myInput.classList.contains('_form-error') &&
                myInput.value.length
            ) {
                addError(myInput, 'Not all conditions are met!');
            }
        });

        myInput2.addEventListener('input', e => {
            confirmPassword();
        });

        // When the user starts to type something inside the password field

        myInput.addEventListener('input', e => {
            confirmPassword();

            //Validate without spaces
            if (myInput.value.match(spaces)) {
                addError(myInput, 'This symbol is not allowed!');
                return;
            } else if (myInput.classList.contains('_form-error')) {
                removeError(myInput);
            }

            //Validate lover letters
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove('invalid');
                letter.classList.add('valid');
            } else {
                letter.classList.remove('valid');
                letter.classList.add('invalid');
            }

            // Validate numbers
            if (myInput.value.match(numbers)) {
                number.classList.remove('invalid');
                number.classList.add('valid');
            } else {
                number.classList.remove('valid');
                number.classList.add('invalid');
            }

            // Validate length
            if (myInput.value.length >= 7) {
                length.classList.remove('invalid');
                length.classList.add('valid');
            } else {
                length.classList.remove('valid');
                length.classList.add('invalid');
            }
        });

        function confirmPassword() {
            removeError(formErrMessage)
            if (
                myInput.value.match(passTest) &&
                !myInput.value.match(spaces) &&
                myInput.value === myInput2.value
            ) {
                // submitButton.removeAttribute('disabled');
                removeError(myInput2);
            } else {
                // submitButton.setAttribute('disabled', true);
                if (myInput2.value.length) {
                    addError(myInput2, 'Passwords must be the same and meet the requirements!');
                } else {
                    removeError(myInput2);
                }
            }
        }
    }

    function addError(formRequiredItem, message) {
        formRequiredItem.classList.add('_form-error');
        formRequiredItem.parentElement.classList.add('_form-error');
        let inputError = formRequiredItem.parentElement.parentElement.querySelector('.form__error');
        if (inputError) formRequiredItem.parentElement.parentElement.removeChild(inputError);
        if (message) {
            formRequiredItem.parentElement.insertAdjacentHTML(
                'afterend',
                `<div class="form__error">${message}</div>`
            );
        }
    }
    function removeError(formRequiredItem) {
        formRequiredItem.classList.remove('_form-error');
        formRequiredItem.parentElement.classList.remove('_form-error');
        if (formRequiredItem.parentElement.parentElement.querySelector('.form__error')) {
            formRequiredItem.parentElement.parentElement.removeChild(
                formRequiredItem.parentElement.parentElement.querySelector('.form__error')
            );
        }
    }

    function passwordStrengthMeter(a) {
        function b() {
            let a = c();
            d(a);
        }
        function c() {
            let a = 0,
                b = /(?=.*[a-z])/,
                c = /(?=.*[0-9])/,
                d = new RegExp('(?=.{' + j + ',})');
            return (
                i.match(b) && ++a,
                i.match(c) && ++a,
                i.match(d) && ++a,
                0 == a && 0 < i.length && ++a,
                a
            );
        }
        function d(a) {
            1 === a
                ? ((g.className = 'password-strength-meter-score psms-25'),
                  k && (k.textContent = l[1] || 'Too simple'),
                  f.dispatchEvent(new Event('onScore1', { bubbles: !0 })))
                : 2 === a
                ? ((g.className = 'password-strength-meter-score psms-50'),
                  k && (k.textContent = l[2] || 'Simple'),
                  f.dispatchEvent(new Event('onScore2', { bubbles: !0 })))
                : 3 === a
                ? ((g.className = 'password-strength-meter-score psms-75'),
                  k && (k.textContent = l[3] || "That's OK"),
                  f.dispatchEvent(new Event('onScore3', { bubbles: !0 })))
                : ((g.className = 'password-strength-meter-score'),
                  k && (k.textContent = l[0] || 'No data'),
                  f.dispatchEvent(new Event('onScore0', { bubbles: !0 })));
        }
        const e = document.createElement('style');
        document.body.prepend(e),
            (e.innerHTML = `
    ${a.containerElement} {
      height: ${a.height || 4}px;
      background-color: #eee;
      position: relative;
      overflow: hidden;
      border-radius: ${a.borderRadius.toString() || 2}px;
    }
    ${a.containerElement} .password-strength-meter-score {
      height: inherit;
      width: 0%;
      transition: .3s ease-in-out;
      background: ${a.colorScore1 || '#ff7700'};
    }
    ${a.containerElement} .password-strength-meter-score.psms-25 {width: 33%; background: ${
                a.colorScore1 || '#ff7700'
            };}
    ${a.containerElement} .password-strength-meter-score.psms-50 {width: 66%; background: ${
                a.colorScore2 || '#ffff00'
            };}
    ${a.containerElement} .password-strength-meter-score.psms-75 {width: 100%; background: ${
                a.colorScore4 || '#00ff00'
            };}`);
        const f = document.getElementById(a.containerElement.slice(1));
        f.classList.add('password-strength-meter');
        let g = document.createElement('div');
        g.classList.add('password-strength-meter-score'), f.appendChild(g);
        const h = document.querySelector(a.passwordInput);
        let i = '';
        h.addEventListener('keyup', function () {
            const spaces = /\s/g;
            if (this.value.match(spaces)) {
                return;
            }
            (i = this.value), b();
        });
        let j = a.pswMinLength || 8,
            k = a.showMessage ? document.getElementById(a.messageContainer.slice(1)) : null,
            l =
                void 0 === a.messagesList
                    ? ['No data', 'Too simple', 'Simple', "That's OK", 'Great password!']
                    : a.messagesList;
        return k && (k.textContent = l[0] || 'No data'), { containerElement: f, getScore: c };
    }
})();
