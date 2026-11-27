<div class="modal-overlay" id="callbackModal">
    <div class="modal-content">
        <button class="modal-close" id="closeModal" aria-label="{{ __('layout.modal_1') }}">&times;</button>
        <h2 class="modal-title">{{ __($modalTitle ?? 'layout.modal_2') }}</h2>
        <form class="modal-form js-form" id="{{ $modalForm ?? 'form_2' }}">
            <input type="text" name="name" placeholder="{{ __('layout.modal_3') }}" class="js-input-name" required>
            <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" class="js-input-phone" required>
            <input type="text" name="website" class="hp-field" tabindex="-1" autocomplete="off" aria-hidden="true">
            <button class="btn btn--yellow modal-btn" type="submit">{{ __($modalButton ?? 'layout.header_7') }}</button>
        </form>
        <p class="modal-policy">{{ __('layout.modal_4') }}<br>{{ __('layout.modal_5') }}</p>
    </div>
</div>
