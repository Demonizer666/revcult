<?php ?>

<div class="SettingsPart">
    <h2 class="itf_settings__tabs_title SlideOnClick">
        Регистрация пользователя
        <span class="icon_svg_container large"><svg><use xlink:href="#icon_arrow_down"></use></svg></span>
    </h2>
    <div class="itf_settings__content_part SlideContainer">

        <div class="settings_field_container">
            <div class="regular_field_description">E-mail</div>
            <span class="regular_field TestRegisterField"
                  contenteditable="true"
                  spellcheck="false"
                  data-type="text"
                  data-name="user_email"
                  data-placeholder="kotik@gmail.com"
            ></span>
        </div>

        <div class="settings_field_container">
            <div class="regular_field_description">Login</div>
            <span class="regular_field TestRegisterField"
                  contenteditable="true"
                  spellcheck="false"
                  data-type="text"
                  data-name="user_login"
                  data-placeholder="kotik"
            ></span>
        </div>

        <div class="settings_field_container">
            <span class="itf_submit TestUserRegistration">
                Отправить
                <span class="icon_svg_container medium"><svg><use href="#loading"></use></svg></span>
            </span>
        </div>

    </div>
</div>