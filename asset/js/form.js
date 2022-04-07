import { alerts } from './render.js';
$(document).ready(function () {
    const validatorRules = {
        required(value) {
            return value.trim() ? undefined : "Vui lòng nhập trường này";
        },
        emailExist(value) {
            return !users.some(user => user.email == String(value)) ? undefined : "Email đã tồn tại";
        },
        emailNotExist(value) {
            return users.some(user => user.email == String(value)) ? undefined : "Email chưa tồn tại";
        },
        match(value) {
            const emailValue = $('.form__main input[name="email"]').val();
            const emailMatch = users.find(user => user.email == String(emailValue));
            return emailMatch?.password == value ? undefined : "Mật khẩu sai";
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

        //Toàn bộ là số
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
        }
    }

    const formRules = {};
    const rulesFunc = {};
    const form = $('.form__main');
    if (form) {
        const inputs = $('.form__main input');
        Array.from(inputs).forEach(input => {
            switch (input.name) {
                case "username":
                    rulesFunc[input.name] = ['required', 'maxLength:16'];
                    break;
                case "phone":
                    rulesFunc[input.name] = ['required', 'number', 'minLength:10'];
                    break;
                case "email":
                    if ($(form).attr('name') === 'reg')
                        rulesFunc[input.name] = ['required', 'email', 'emailExist'];
                    else if ($(form).attr('name') === 'login')
                        rulesFunc[input.name] = ['required', 'email', 'emailNotExist'];
                    else
                        rulesFunc[input.name] = ['required', 'email'];
                    break;
                case "password":
                    if ($(form).attr('name') === 'reg')
                        rulesFunc[input.name] = ['required', 'minLength:8'];
                    else if ($(form).attr('name') === 'login')
                        rulesFunc[input.name] = ['required', 'minLength:8', 'match'];
                    break;
                case "confirm_password":
                    rulesFunc[input.name] = ['required', `confirm`, 'minLength:8'];
                    break;
                default:
                    return new Error('Invalid');
            }
            rulesFunc[input.name].forEach(rule => {
                let rulesFuncArray = validatorRules[rule];
                const ruleHasValue = rule.includes(':');
                if (ruleHasValue) {
                    const ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                    if (ruleHasValue) {
                        rulesFuncArray = validatorRules[rule](ruleInfo[1]);
                    }
                }

                if (!Array.isArray(formRules[input.name])) {
                    formRules[input.name] = [rulesFuncArray];
                }
                else {
                    formRules[input.name].push(rulesFuncArray);
                }

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
            const erorrElement = $(e.target).siblings();
            const parentElement = $(e.target).parent();

            $(erorrElement).text(errorMessage || '');
            $(parentElement).toggleClass('form__group--erorr', !!errorMessage);
            return !errorMessage;
        }
        function clearError(e) {
            const erorrElement = $(e.target).siblings();
            const parentElement = $(e.target).parent();
            $(erorrElement).text('')
            $(parentElement).removeClass('form__group--erorr');
        }

        form.submit(e => {
            const inputs = $('.form__main input');
            let isError = false;
            Array.from(inputs).forEach(input => {
                const isValid = validate({ target: input })

                isError = !isValid ? true : false;
            });
            if (!isError) {
                if (e.target.name === 'reg') {
                    alerts(true, "Đăng ký thành công");
                }
                else if (e.target.name === 'login') {
                    alerts(true, "Đăng nhập thành công");
                }
                return true;
            }
            return false;
        })
    }
})