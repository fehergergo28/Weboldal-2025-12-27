function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('active');
        }
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registerForm');
            const fullnameInput = document.getElementById('fullname');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const passwordInput = document.getElementById('password');
            const password2Input = document.getElementById('password2');
            const termsCheckbox = document.getElementById('terms');
            const submitBtn = document.querySelector('.submit-btn');

            function showError(input, message) {
                clearError(input);
                const error = document.createElement('div');
                error.className = 'error-message';
                error.textContent = message;
                input.parentNode.appendChild(error);
                input.style.borderColor = 'rgba(231, 76, 60, 1)';
            }

            function clearError(input) {
                const error = input.parentNode.querySelector('.error-message');
                if (error) error.remove();
                input.style.borderColor = 'rgba(242, 179, 255, 0.4)';
            }

            function validateFullname() {
                const value = fullnameInput.value.trim();
                if (value === '') {
                    showError(fullnameInput, 'A teljes név megadása kötelező!');
                    return false;
                }
                clearError(fullnameInput);
                return true;
            }

            function validateEmail() {
                const value = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (value === '') {
                    showError(emailInput, 'Az e-mail cím megadása kötelező!');
                    return false;
                }
                if (!emailRegex.test(value)) {
                    showError(emailInput, 'Érvénytelen e-mail cím formátum!');
                    return false;
                }
                clearError(emailInput);
                return true;
            }

            function validatePhone() {
                const value = phoneInput.value.trim().replace(/\s+/g, '');
                if (value === '') {
                    showError(phoneInput, 'A telefonszám megadása kötelező!');
                    return false;
                }
                if (value.length < 8) {
                    showError(phoneInput, 'A telefonszám túl rövid!');
                    return false;
                }
                clearError(phoneInput);
                return true;
            }

            function validatePassword() {
                const value = passwordInput.value;
                clearError(passwordInput);
                if (value.length < 8) {
                    showError(passwordInput, 'A jelszónak legalább 8 karakterből kell állnia!');
                    return false;
                }
                if (value.length > 20) {
                    showError(passwordInput, 'A jelszó maximum 20 karakter lehet!');
                    return false;
                }
                return true;
            }

            function validatePasswordMatch() {
                clearError(password2Input);
                if (passwordInput.value !== password2Input.value) {
                    showError(password2Input, 'A két jelszó nem egyezik!');
                    return false;
                }
                return true;
            }

            function validateTerms() {
                if (!termsCheckbox.checked) {
                    termsCheckbox.parentNode.style.color = '#e74c3c';
                    return false;
                } else {
                    termsCheckbox.parentNode.style.color = '#777';
                    return true;
                }
            }

            function updateSubmitButton() {
                const allValid = 
                    validateFullname() &&
                    validateEmail() &&
                    validatePhone() &&
                    validatePassword() &&
                    validatePasswordMatch() &&
                    validateTerms();

                submitBtn.disabled = !allValid;
            }

            
            fullnameInput.addEventListener('input', () => { validateFullname(); updateSubmitButton(); });
            emailInput.addEventListener('input', () => { validateEmail(); updateSubmitButton(); });
            phoneInput.addEventListener('input', () => { validatePhone(); updateSubmitButton(); });
            passwordInput.addEventListener('input', () => { validatePassword(); validatePasswordMatch(); updateSubmitButton(); });
            password2Input.addEventListener('input', () => { validatePasswordMatch(); updateSubmitButton(); });
            termsCheckbox.addEventListener('change', () => { validateTerms(); updateSubmitButton(); });

            
            form.addEventListener('submit', function (e) {
                const allValid = validateFullname() && validateEmail() && validatePhone() && validatePassword() && validatePasswordMatch() && validateTerms();
                if (!allValid) {
                    e.preventDefault();
                    if (!validateTerms()) {
                        alert('El kell fogadni az Adatkezelési tájékoztatót a regisztrációhoz!');
                    }
                }
                
            });

            
            updateSubmitButton();
        });

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;

            if (email && password) {
                alert('Sikeres bejelentkezés! Átirányítunk az időpontfoglalásra...');
                window.location.href = 'időpont.html'; 
            } else {
                alert('Kérlek töltsd ki mindkét mezőt!');
            }
        });