<?php

/* Customizer Everything
---------------------------------------------------------------------------------------------------- */

function plasso_customizer() {

	global $wp_customize;

	$wp_customize->remove_section('static_front_page');

    /* Yes Kirki? Cool, let’s do this.
    ------------------------------------------------------------------------------------------------ */

	if(class_exists('Kirki')) {

        // Theme configuration for Kirki.
		Kirki::add_config('plasso_theme', array(
			'capability' => 'edit_theme_options',
			'option_type' => 'theme_mod',
		));

        /* The Header Section
        -------------------------------------------------------------------------------------------- */

		Kirki::add_section('header_section', array(
			'title' => __('Header', 'plasso_textdomain'),
			'description' => __('Content &amp; settings for the header.', 'plasso_textdomain'),
			'priority' => 200,
			'capability' => 'edit_theme_options',
		));

		// Header Toggle: Toggle the header section on or off.

		Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[header_toggle]',
			'label' => __('Display', 'plasso_textdomain'),
            'description' => __('Toggle the header section on or off.'),
			'section' => 'header_section',
			'type' => 'toggle',
			'priority' => 10,
		));

        // Text: The header text.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[header_text]',
			'label' => __('Text', 'plasso_textdomain'),
            'description' => __('Add some header text.'),
			'section' => 'header_section',
			'type' => 'text',
			'priority' => 10,
		));

        // Logo Image: The header logo image.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[header_logo]',
			'label' => __('Logo', 'plasso_textdomain'),
            'description' => __('Add a logo image (replaces the default text-based logo.)'),
			'section' => 'header_section',
			'type' => 'image',
			'priority' => 10,
		));

        // Menu Repeater: Building the header menu.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[header_menu]',
			'label' => __('Menu', 'plasso_textdomain'),
            'description' => __('Add, remove and/or organize links to pages.'),
            'row_label' => array(
                 'value' => 'menu item'
            ),
			'section' => 'header_section',
			'type' => 'repeater',
			'priority' => 10,
			'fields' => array (
				'title' => array(
					'label' => __('Title', 'plasso_textdomain'),
					'type' => 'text',
				),
                'page' => array(
					'label' => __('Page', 'plasso_textdomain'),
					'type' => 'dropdown-pages',
				),
			),
		));

        /* The Intro Section
        -------------------------------------------------------------------------------------------- */

		Kirki::add_section('intro_section', array(
			'title' => __('Intro', 'plasso_textdomain'),
			'description' => __('Content &amp; settings for the intro section.', 'plasso_textdomain'),
			'priority' => 200,
			'capability' => 'edit_theme_options',
		));

        // Intro Toggle: Toggle the intro section on or off.

		Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[intro_toggle]',
			'label' => __('Display', 'plasso_textdomain'),
            'description' => __('Toggle the intro section on or off.'),
			'section' => 'intro_section',
			'type' => 'toggle',
			'priority' => 10,
		));

		// Intro Title: Just a text field for the intro title.

		Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[intro_title]',
			'label' => __('Intro Title', 'plasso_textdomain'),
            'description' => __('Just enter a bit of text for your intro title.'),
			'section' => 'intro_section',
			'type' => 'text',
			'priority' => 10,
		));

        // Intro Tagline: Just a textarea for the intro tagline.

		Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[intro_tagline]',
			'label' => __('Intro Tagline', 'plasso_textdomain'),
            'description' => __('Just enter a bit of text for your intro tagline.'),
			'section' => 'intro_section',
			'type' => 'textarea',
			'priority' => 10,
		));

		/* The Footer Section
        -------------------------------------------------------------------------------------------- */

		Kirki::add_section('footer_section', array(
			'title' => __('Footer', 'plasso_textdomain'),
			'description' => __('Content &amp; settings for the footer.', 'plasso_textdomain'),
			'priority' => 200,
			'capability' => 'edit_theme_options',
		));

		// Footer Toggle: Toggle the footer section on or off.

		Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[footer_toggle]',
			'label' => __('Display', 'plasso_textdomain'),
            'description' => __('Toggle the footer section on or off.'),
			'section' => 'footer_section',
			'type' => 'toggle',
			'priority' => 10,
		));

		// Plasso Toggle: Toggle the plasso link.

		Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[footer_plasso]',
			'label' => __('Powered by Plasso', 'plasso_textdomain'),
            'description' => __('Toggle the Powered by Plasso link on or off.'),
			'section' => 'footer_section',
			'type' => 'toggle',
			'priority' => 10,
		));

		// Text: The footer text.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[footer_text]',
			'label' => __('Text', 'plasso_textdomain'),
            'description' => __('Add some footer text (e.g. “Copyright Bla Bla Bla”).'),
			'section' => 'footer_section',
			'type' => 'textarea',
			'priority' => 10,
		));

		// Twitter: The Twitter link.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[footer_twitter]',
			'label' => __('Twitter', 'plasso_textdomain'),
            'description' => __('Enter your Twitter ID to add a Twitter link.'),
			'section' => 'footer_section',
			'type' => 'text',
			'priority' => 10,
		));

		// Facebook: The Facebook link.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[footer_facebook]',
			'label' => __('Facebook', 'plasso_textdomain'),
            'description' => __('Enter your Facebook ID to add a Facebook link.'),
			'section' => 'footer_section',
			'type' => 'text',
			'priority' => 10,
		));

		// Instagram: The Instagram link.

        Kirki::add_field('plasso_theme', array(
			'settings' => 'plasso[footer_instagram]',
			'label' => __('Instagram', 'plasso_textdomain'),
            'description' => __('Enter your Instagram ID to add a Instagram link.'),
			'section' => 'footer_section',
			'type' => 'text',
			'priority' => 10,
		));

    /* No Kirki? Install it please.
    ------------------------------------------------------------------------------------------------ */

	} else {

		class Kirki_Warning extends WP_Customize_Control {
			public $type = 'kirki_warning';

			public function render_content() {
				?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<p><?php _e('This theme requires the Kirki plugin in order to edit your site from within the customizer.', 'plasso_textdomain'); ?></p>
						<a href="<?php echo get_admin_URL(); ?>themes.php?page=tgmpa-install-plugins" class="button"><?php _e('Install Kirki', 'plasso_textdomain'); ?></a></p>
					</label>
				<?php
			}
		}

		$wp_customize->add_section(
			'theme_settings',
			array(
				'title' => 'Theme Settings',
				'description' => '',
				'priority' => 200,
			)
		);

		$wp_customize->add_setting('kirki_warning', array('sanitize_callback' => '__return_false'));
		$wp_customize->add_control(
			new Kirki_Warning(
				$wp_customize,
				'kirki_warning',
				array(
					'label' => __('Please note:', 'plasso_textdomain'),
					'section' => 'theme_settings',
					'settings' => 'kirki_warning'
				)
			)
		);
	}
}
add_action('customize_register', 'plasso_customizer');
