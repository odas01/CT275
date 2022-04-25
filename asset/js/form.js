$(document).ready(function () {
    const validatorRules = {
        //bắt buộc
        required(value) {
            return value.trim() ? undefined : "Vui lòng nhập trường này";
        },
        //email đã tồn tại
        emailExist(value) {
            return !users.some(user => user.email == String(value)) ? undefined : "Email đã tồn tại";
        },
        //email chưa tồn tại
        emailNotExist(value) {
            return users.some(user => user.email == String(value)) ? undefined : "Email chưa tồn tại";
        },
        minLength(min) {
            return function (value) {
                return value.length >= min
                    ? undefined
                    : `Vui lòng nhập ít nhất ${min} ký tự`;
            };
        },
        maxLength(max) {
            return function (value) {
                return value.length < max
                    ? undefined
                    : `Vui lòng nhập không quá ${max} ký tự`;
            };
        },
        email(value) {
            const reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return reg.test(value) ? undefined : 'Vui lòng nhập đúng email';
        },

        //toàn bộ là số
        number(value) {
            const arrValue = value.split('');

            return arrValue.every(function (course) {
                return isFinite(parseInt(course));
            })
                ? undefined
                : 'Vui lòng nhập số';
        },
        confirm(value) {
            const password = $('.form__main input[name="password"]').val();
            return value === password
                ? undefined
                : `Mật khẩu sai hoặc chưa nhập mật khẩu`;
        },
        //mật khẩu khớp với tài khoản
        match(value) {
            const emailValue = $('.form__main input[name="email"]').val();
            const emailMatch = users.find(user => user.email == String(emailValue));
            return emailMatch?.password == value ? undefined : "Mật khẩu sai";
        },
        oldPassword(value) {
            return value === oldPassword ? undefined : `Mật khẩu sai`;
        },
        newPassword(value) {
            return value !== oldPassword ? undefined : `Vui lòng không nhập trùng mật khẩu cũ`;
        }
    }

    const formRules = {};
    const rulesFunc = {};
    const form = $('.form__main');
    if (form) {
        const inputs = $('[name][rule]');
        Array.from(inputs).forEach(input => {
            const rules = input.getAttribute('rule');
            rulesFunc[input.name] = rules.split('|');
            rulesFunc[input.name].forEach(rule => {
                let rulesFuncArray = validatorRules[rule];
                const ruleHasValue = rule.includes(':');

                if (ruleHasValue) {
                    const ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                    if (ruleHasValue) 
                        rulesFuncArray = validatorRules[rule](ruleInfo[1]);
                }

                if (!Array.isArray(formRules[input.name]))
                    formRules[input.name] = [rulesFuncArray];
                else
                    formRules[input.name].push(rulesFuncArray);

            })
            input.onblur = validate;
            input.oninput = clearError;
        })

        function validate(e) {
            const rules = formRules[e.target.name];
            let errorMessage;
            for (let rule of rules) {
                if (errorMessage) break;
                errorMessage = rule(e.target.value);
            }
            const erorrElement = $(e.target).siblings('.form__message');
            const parentElement = $(e.target).parent();

            $(erorrElement).text(errorMessage || '');
            $(parentElement).toggleClass('form__group--erorr', !!errorMessage);
            $(parentElement).toggleClass('form__group--suscess', !errorMessage);
            return !errorMessage;
        }
        function clearError(e) {
            const erorrElement = $(e.target).siblings('.form__message');
            const parentElement = $(e.target).parent();
            $(erorrElement).text('')
            $(parentElement).removeClass('form__group--erorr');
        }

        form.submit(e => {
            const inputs = $('[name][rule]');
            let isError = false;
            Array.from(inputs).forEach(input => {
                const isValid = validate({ target: input })

                isError = !isValid ? true : false;
            });
            const name = $(form).attr('name');
            console.log(name);
            if (!isError) {
                switch (name) {
                    case 'reg':
                        Swal.fire({
                            icon: 'success',
                            text: 'Đăng ký thành công',
                            timer: 2000
                        })
                        break;
                    case 'login':
                        Swal.fire({
                            icon: 'success',
                            text: 'Đăng nhập thành công',
                            timer: 2000
                        })
                        break;
                    case 'changePassword':
                        Swal.fire({
                            icon: 'success',
                            text: 'Đổi mật khẩu thành công',
                            timer: 2000
                        })
                        break;
                    case 'contact':
                        Swal.fire({
                            icon: 'success',
                            text: 'Gửi form thành công',
                            timer: 2000
                        })
                        break;
                    case 'cart':
                        Swal.fire({
                            text: 'Cảm ơn vì đã mua hàng',
                            imageUrl: '../asset/img/cart/thank.png',
                            imageWidth: 230,
                            imageHeight: 200,
                            imageAlt: 'Custom image',
                            timer:2000
                          })
                        break;
                }
                return true;
            }
            else
                Swal.fire({
                    icon: 'error',
                    text: 'Thông tin sai!',
                });
            return false;
        })
    }
})