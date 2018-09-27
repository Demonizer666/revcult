<?php ?>

<div class="SettingsPart">
	<h2 class="itf_settings__tabs_title SlideOnClick">
		Часть 1
		<span class="icon_svg_container large"><svg><use xlink:href="#icon_arrow_down"></use></svg></span>
	</h2>
	<div class="itf_settings__content_part SlideContainer">

		<div class="itf_dropdown ChooseTemplateToSend">

			<div class="itf_dropdown__field FrameWorkFields"
			     data-name="list"
			     data-value="new_order"
			     data-placeholder=""
			     data-type="select"
			>Новый заказ</div>

			<div class="itf_dropdown__arrow icon_svg_container medium">
				<svg>
					<use href="#icon_arrow_down"></use>
				</svg>
			</div>

			<div class="itf_dropdown__list">
				<div class="itf_dropdown__row disabled">Выберите шаблон</div>

				<div class="itf_dropdown__row checked"
				     data-value="new_order"
				>
					<div class="itf_radio small"></div>
					<span class="itf_dropdown__row_html">Новый заказ</span>
				</div>

				<div class="itf_dropdown__row"
				     data-value="admin_notification"
				><div class="itf_radio small"></div><span class="itf_dropdown__row_html">Письмо администратору</span></div>


				<div class="itf_dropdown__row checked ListDataClass"
				     data-value="new_order"
				     data-type="select"
				     data-name="mail_1"
				>
					<div class="itf_check icon_svg_container small">
						<svg>
							<use href="#check"></use>
						</svg>
					</div>
					<span class="itf_dropdown__row_html">Новый заказ</span>
				</div>

				<div class="itf_dropdown__row ListDataClass"
				     data-value="admin_notification"
				     data-type="select"
				     data-name="mail_2"
				>
					<div class="itf_check icon_svg_container small">
						<svg>
							<use href="#check"></use>
						</svg>
					</div>
					<span class="itf_dropdown__row_html">Письмо администратору</span>
				</div>

				<div class="itf_dropdown__row ListDataClass"
				     data-value="password_recovery"
				     data-type="select"
				     data-name="mail_3"
				>
					<div class="itf_check icon_svg_container small">
						<svg>
							<use href="#check"></use>
						</svg>
					</div>
					<span class="itf_dropdown__row_html">Восстановление пароля</span>
				</div>

				<div class="itf_dropdown__row ListDataClass"
				     data-value="week_stats"
				     data-type="select"
				     data-name="mail_4"
				>
					<div class="itf_check icon_svg_container small">
						<svg>
							<use href="#check"></use>
						</svg>
					</div>
					<span class="itf_dropdown__row_html">Данные за неделю</span>
				</div>
			</div>

		</div>

		<div class="settings_field_container">
			<div class="regular_field_description">Настройки котика</div>
			<span
				class="regular_field FrameWorkFields"
				contenteditable="true"
				spellcheck="false"
				data-type="text"
				data-name="cat"
				data-placeholder="'@'"
			><?php echo $options['cat']; ?></span>
		</div>

	</div>
</div>
