document.addEventListener('DOMContentLoaded', function() {

    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = 'toast toast--' + type;
        toast.textContent = message;
        document.body.appendChild(toast);
        requestAnimationFrame(() => toast.classList.add('toast--visible'));
        setTimeout(() => {
            toast.classList.remove('toast--visible');
            setTimeout(() => toast.remove(), 300);
        }, 3500);
    }

    const FORM_EMAIL = 'luizakorakina24@gmail.com';
    const FORM_LABELS = {
        form_id: 'Форма', page: 'Страница', service_type: 'Тип услуги', name: 'Имя', phone: 'Телефон',
        email: 'Email', event_date: 'Дата', budget: 'Бюджет', comment: 'Комментарий', portions: 'Порций',
        address: 'Адрес доставки', delivery_time: 'Время доставки', menu_type: 'Тип меню',
        event_type: 'Тип мероприятия', guests: 'Персон', format: 'Формат', venue: 'Площадка', staff: 'Персонал'
    };

    async function sendForm(payload) {
        const data = { _subject: 'Заявка с сайта TopChef', _captcha: 'false', _template: 'table' };
        Object.keys(FORM_LABELS).forEach(k => {
            if (payload[k] !== undefined && payload[k] !== '' && !Number.isNaN(payload[k])) {
                data[FORM_LABELS[k]] = String(payload[k]);
            }
        });
        const r = await fetch('https://formsubmit.co/ajax/' + FORM_EMAIL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify(data)
        });
        if (!r.ok) throw new Error('HTTP ' + r.status);
        const j = await r.json();
        if (String(j.success) !== 'true') throw new Error('send failed');
    }

    const modal = document.getElementById('callbackModal');
    const closeModalBtn = document.getElementById('closeModal');
    const openBtns = document.querySelectorAll('.open-modal-btn');

    function openModal() {
        if (!modal) return;
        modal.classList.add('active');
        document.body.classList.add('modal-open');
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) mobileMenu.classList.remove('active');
        const firstInput = modal.querySelector('.js-input-name');
        if (firstInput) setTimeout(() => firstInput.focus(), 100);
    }
    function closeModal() {
        if (!modal) return;
        modal.classList.remove('active');
        document.body.classList.remove('modal-open');
    }
    if (modal && closeModalBtn) {
        openBtns.forEach(btn => btn.addEventListener('click', (e) => { e.preventDefault(); openModal(); }));
        closeModalBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
        });
    }

    const burgerBtn = document.getElementById('burgerBtn');
    const closeMenuBtn = document.getElementById('closeMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (burgerBtn && mobileMenu) {
        burgerBtn.addEventListener('click', (e) => { e.preventDefault(); mobileMenu.classList.add('active'); });
    }
    if (closeMenuBtn && mobileMenu) {
        closeMenuBtn.addEventListener('click', (e) => { e.preventDefault(); mobileMenu.classList.remove('active'); });
    }
    if (mobileMenu) {
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => mobileMenu.classList.remove('active'));
        });
    }

   const tabs = document.querySelectorAll('.offer__tabs li');
const imgElement = document.getElementById('offerImage');
const checksList = document.getElementById('offerChecks');
if (tabs.length > 0 && imgElement && checksList) {
    // кэш предзагруженных картинок
    const imgCache = {};
    function preload(src) {
        if (!imgCache[src]) {
            const img = new Image();
            img.decoding = 'async';
            img.src = src;
            imgCache[src] = img;
        }
        return imgCache[src];
    }

    // грузим все картинки в фоне, когда браузер свободен
    const preloadAll = () => tabs.forEach(t => preload(t.dataset.img));
    if ('requestIdleCallback' in window) requestIdleCallback(preloadAll, { timeout: 2000 });
    else setTimeout(preloadAll, 1000);

    let lastClick = 0; // защита от «гонки» при быстрых кликах

    tabs.forEach(tab => {
        tab.setAttribute('tabindex', '0');
        tab.setAttribute('role', 'button');

        // начинаем грузить уже при наведении, до клика
        tab.addEventListener('mouseenter', () => preload(tab.dataset.img), { once: true });
        tab.addEventListener('focus', () => preload(tab.dataset.img), { once: true });

        tab.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); tab.click(); }
        });

        tab.addEventListener('click', function() {
            if (this.classList.contains('is-active')) return;
            const myClick = ++lastClick;

            tabs.forEach(t => t.classList.remove('is-active'));
            this.classList.add('is-active');

            // текст меняем сразу, одним действием
            const frag = document.createDocumentFragment();
            this.dataset.checks.split('|').forEach(text => {
                const li = document.createElement('li');
                li.textContent = text;
                frag.appendChild(li);
            });
            checksList.replaceChildren(frag);

            // картинку меняем, когда она уже готова
            const src = this.dataset.img;
            const alt = this.dataset.title;
            const apply = () => {
                if (myClick !== lastClick) return; // пользователь уже выбрал другую вкладку
                imgElement.src = src;
                imgElement.alt = alt;
            };
            const img = preload(src);
            if (img.complete) apply();
            else img.decode().then(apply).catch(apply);
        });
    });
}

    function applyPhoneMask(input) {
        input.addEventListener('input', function() {
            let digits = this.value.replace(/\D/g, '');
            if (digits.length === 0) { this.value = ''; return; }
            if (digits.startsWith('8')) digits = '7' + digits.slice(1);
            if (!digits.startsWith('7')) digits = '7' + digits;
            digits = digits.slice(0, 11);
            let formatted = '+7';
            if (digits.length > 1) formatted += ' (' + digits.slice(1, 4);
            if (digits.length >= 4) formatted += ') ' + digits.slice(4, 7);
            if (digits.length >= 7) formatted += '-' + digits.slice(7, 9);
            if (digits.length >= 9) formatted += '-' + digits.slice(9, 11);
            this.value = formatted;
        });
    }
    document.querySelectorAll('.js-input-phone').forEach(applyPhoneMask);

    document.querySelectorAll('.js-input-name, .js-input-phone').forEach(input => {
        input.addEventListener('input', function() {
            this.style.borderBottom = '1px solid #E3E3E3';
            this.classList.remove('js-input-error');
        });
    });

    const formEvents = { 'form_1': 'otpravka_form_1', 'form_2': 'otpravka_form_2', 'form_3': 'otpravka_form_3' };
    const forms = document.querySelectorAll('.js-form');
    forms.forEach(form => {
        if (form.id === 'form_services') return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const nameInput = form.querySelector('.js-input-name');
            const phoneInput = form.querySelector('.js-input-phone');
            const submitBtn = form.querySelector('button[type="submit"]');
            let isValid = true;
            if (nameInput) nameInput.style.borderBottom = '1px solid #E3E3E3';
            if (phoneInput) phoneInput.style.borderBottom = '1px solid #E3E3E3';

            const nameValue = nameInput ? nameInput.value.trim() : '';
            if (nameValue.length < 2 || !/^[А-Яа-яЁёA-Za-z\s\-]+$/.test(nameValue)) {
                if (nameInput) nameInput.style.borderBottom = '2px solid red';
                isValid = false;
            }
            const cleanPhone = phoneInput ? phoneInput.value.replace(/\D/g, '') : '';
            if (cleanPhone.length < 11) {
                if (phoneInput) phoneInput.style.borderBottom = '2px solid red';
                isValid = false;
            }
            if (!isValid) {
                showToast('Проверьте поля: имя (только буквы, от 2 симв.) и телефон (+7 XXX XXX-XX-XX)', 'error');
                return;
            }
            const originalText = submitBtn.innerText;
            submitBtn.innerText = 'Отправка...';
            submitBtn.disabled = true;

            const formId = form.id;
            const eventName = formEvents[formId] || 'otpravka_form_default';
            sendForm({ form_id: formId, page: location.pathname, name: nameValue, phone: cleanPhone })
                .then(() => {
                    if (window.dataLayer) window.dataLayer.push({ 'event': eventName, 'form_id': formId });
                    showToast('Спасибо! Ваша заявка отправлена. Мы скоро свяжемся с вами.', 'success');
                    form.reset();
                    if (modal && modal.classList.contains('active')) closeModal();
                })
                .catch(() => showToast('Не удалось отправить заявку. Позвоните нам: +7 (938) 865-46-65', 'error'))
                .finally(() => {
                    submitBtn.innerText = originalText;
                    submitBtn.disabled = false;
                });
        });
    });

    const servicesForm = document.getElementById('form_services');
    if (servicesForm) {
        const introEl = document.getElementById('servicesIntro');
        const submitBtnEl = document.getElementById('servicesSubmitBtn');
        const typeRadios = servicesForm.querySelectorAll('input[name="service_type"]');
        const deliveryFields = servicesForm.querySelectorAll('.js-field-delivery');
        const cateringFields = servicesForm.querySelectorAll('.js-field-catering');

        const TYPE_META = {
            delivery: {
                intro: 'Доставка комплексных обедов по Краснодару. Укажите дату, количество порций и адрес.',
                submit: 'Заказать доставку'
            },
            catering: {
                intro: 'Кейтеринг на мероприятие. Привозим еду, персонал и оборудование на площадку в Краснодаре и крае.',
                submit: 'Заказать кейтеринг'
            },
            buffet: {
                intro: 'Фуршет для гостей. Закуски, нарезки, десерты и напитки — кофе-брейк от 450 ₽, классический фуршет от 700 ₽ на человека. Минимум 20 персон.',
                submit: 'Заказать фуршет'
            }
        };

        function toggleFieldGroup(fields, isVisible) {
            fields.forEach(field => {
                field.hidden = !isVisible;
                field.querySelectorAll('input, select, textarea').forEach(input => {
                    if (isVisible) {
                        if (['event_type', 'guests', 'portions', 'address'].includes(input.name)) {
                            input.setAttribute('required', '');
                        }
                    } else {
                        input.removeAttribute('required');
                        input.classList.remove('js-input-error');
                    }
                });
            });
        }

        function updateServiceFields() {
            const selected = servicesForm.querySelector('input[name="service_type"]:checked').value;
            const isDelivery = selected === 'delivery';

            toggleFieldGroup(deliveryFields, isDelivery);
            toggleFieldGroup(cateringFields, !isDelivery);

            const meta = TYPE_META[selected] || TYPE_META.delivery;
            if (introEl) introEl.textContent = meta.intro;
            if (submitBtnEl) submitBtnEl.textContent = meta.submit;
        }

        typeRadios.forEach(r => r.addEventListener('change', updateServiceFields));
        updateServiceFields();

        const dateField = servicesForm.querySelector('.js-input-date');
        if (dateField) dateField.min = new Date().toISOString().slice(0, 10);

        servicesForm.addEventListener('submit', function(e) {
            e.preventDefault();
            servicesForm.querySelectorAll('.js-input-error').forEach(el => el.classList.remove('js-input-error'));

            const nameInput = servicesForm.querySelector('.js-input-name');
            const phoneInput = servicesForm.querySelector('.js-input-phone');
            const dateInput = servicesForm.querySelector('.js-input-date');
            const agreeInput = servicesForm.querySelector('input[name="agree"]');

            const serviceType = servicesForm.querySelector('input[name="service_type"]:checked').value;
            const isDelivery = serviceType === 'delivery';

            let isValid = true;
            const errors = [];

            const nameValue = nameInput.value.trim();
            if (nameValue.length < 2 || !/^[А-Яа-яЁёA-Za-z\s\-]+$/.test(nameValue)) {
                nameInput.classList.add('js-input-error');
                errors.push('имя');
                isValid = false;
            }
            const cleanPhone = phoneInput.value.replace(/\D/g, '');
            if (cleanPhone.length < 11) {
                phoneInput.classList.add('js-input-error');
                errors.push('телефон');
                isValid = false;
            }
            if (!dateInput.value) {
                dateInput.classList.add('js-input-error');
                errors.push('дата');
                isValid = false;
            }

            const payload = {
                service_type: serviceType,
                name: nameValue,
                phone: cleanPhone,
                email: servicesForm.querySelector('input[name="email"]').value.trim(),
                event_date: dateInput.value,
                budget: servicesForm.querySelector('input[name="budget"]').value.trim(),
                comment: servicesForm.querySelector('textarea[name="comment"]').value.trim()
            };

            if (isDelivery) {
                const portionsInput = servicesForm.querySelector('input[name="portions"]');
                const addressInput = servicesForm.querySelector('input[name="address"]');
                const portionsVal = parseInt(portionsInput.value, 10);
                if (!portionsVal || portionsVal < 1) {
                    portionsInput.classList.add('js-input-error');
                    errors.push('количество порций');
                    isValid = false;
                }
                if (!addressInput.value.trim()) {
                    addressInput.classList.add('js-input-error');
                    errors.push('адрес доставки');
                    isValid = false;
                }
                payload.portions = portionsVal;
                payload.address = addressInput.value.trim();
                payload.delivery_time = servicesForm.querySelector('input[name="delivery_time"]').value.trim();
                payload.menu_type = servicesForm.querySelector('select[name="menu_type"]').value;
            } else {
                const eventTypeInput = servicesForm.querySelector('select[name="event_type"]');
                const guestsInput = servicesForm.querySelector('input[name="guests"]');
                const guestsVal = parseInt(guestsInput.value, 10);
                if (!eventTypeInput.value) {
                    eventTypeInput.classList.add('js-input-error');
                    errors.push('тип мероприятия');
                    isValid = false;
                }
                if (!guestsVal || guestsVal < 20 || guestsVal > 500) {
                    guestsInput.classList.add('js-input-error');
                    errors.push('количество персон (20–500)');
                    isValid = false;
                }
                payload.event_type = eventTypeInput.value;
                payload.guests = guestsVal;
                payload.format = servicesForm.querySelector('select[name="format"]').value;
                payload.venue = servicesForm.querySelector('input[name="venue"]').value.trim();
                payload.staff = servicesForm.querySelector('select[name="staff"]').value;
            }

            if (agreeInput && !agreeInput.checked) {
                errors.push('согласие на обработку данных');
                isValid = false;
            }

            if (!isValid) {
                showToast('Проверьте поля: ' + errors.join(', '), 'error');
                return;
            }

            const originalText = submitBtnEl ? submitBtnEl.textContent : 'Отправить заявку';
            if (submitBtnEl) {
                submitBtnEl.textContent = 'Отправка...';
                submitBtnEl.disabled = true;
            }

            sendForm(Object.assign({ form_id: 'form_services', page: location.pathname }, payload))
                .then(() => {
                    if (window.dataLayer) window.dataLayer.push({ 'event': 'otpravka_form_services', 'service_type': serviceType });
                    showToast('Заявка отправлена! Менеджер свяжется в течение рабочего дня.', 'success');
                    servicesForm.reset();
                    updateServiceFields();
                })
                .catch(() => showToast('Не удалось отправить заявку. Позвоните нам: +7 (938) 865-46-65', 'error'))
                .finally(() => {
                    if (submitBtnEl) {
                        submitBtnEl.textContent = originalText;
                        submitBtnEl.disabled = false;
                    }
                });
        });
    }

});