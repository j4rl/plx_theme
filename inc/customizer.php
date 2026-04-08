<?php
if (! defined('ABSPATH')) {
    exit;
}

if (class_exists('WP_Customize_Control') && ! class_exists('PLX_Parallax_Sortable_Control')) {
    class PLX_Parallax_Sortable_Control extends WP_Customize_Control {
        public $type = 'plx-sortable-slots';

        public function render_content() {
            $value = $this->value();
            $slots = array_filter(array_map('absint', explode(',', (string) $value)));

            if (empty($slots)) {
                $slots = range(1, 6);
            }
            ?>
            <div class="plx-sortable-control">
                <?php if (! empty($this->label)) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                <?php if (! empty($this->description)) : ?>
                    <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php endif; ?>
                <ul class="plx-sortable-list" data-control="<?php echo esc_attr($this->id); ?>">
                    <?php foreach ($slots as $slot) : ?>
                        <li class="plx-sortable-item" data-slot="<?php echo esc_attr($slot); ?>">
                            <span class="plx-sortable-handle" aria-hidden="true">::</span>
                            <span class="plx-sortable-label"><?php echo esc_html(sprintf(__('Slot %d', 'plx-parallax'), $slot)); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="hidden" class="plx-sortable-value" <?php $this->link(); ?> value="<?php echo esc_attr($value); ?>">
            </div>
            <?php
        }
    }
}

function plx_parallax_sanitize_font_choice($value) {
    $choices = array_keys(plx_parallax_get_font_choices());
    return in_array($value, $choices, true) ? $value : 'Space Grotesk';
}

function plx_parallax_sanitize_color_mode($value) {
    return in_array($value, array('light', 'auto', 'dark'), true) ? $value : 'auto';
}

function plx_parallax_sanitize_checkbox($value) {
    return (bool) $value;
}

function plx_parallax_sanitize_float($value) {
    $value = (float) $value;
    if ($value < 0) {
        $value = 0;
    }
    if ($value > 1) {
        $value = 1;
    }
    return $value;
}

function plx_parallax_sanitize_recent_posts_count($value) {
    $value = absint($value);
    if ($value < 1) {
        $value = 1;
    }
    if ($value > 6) {
        $value = 6;
    }
    return $value;
}

function plx_parallax_sanitize_page_id($value) {
    return absint($value);
}

function plx_parallax_sanitize_order_value($value) {
    return absint($value);
}

function plx_parallax_sanitize_slot_sequence($value) {
    $slots = array_filter(array_map('absint', explode(',', (string) $value)));
    $slots = array_values(array_unique(array_filter($slots, function ($slot) {
        return $slot >= 1 && $slot <= 6;
    })));

    for ($index = 1; $index <= 6; $index++) {
        if (! in_array($index, $slots, true)) {
            $slots[] = $index;
        }
    }

    return implode(',', $slots);
}

function plx_parallax_sanitize_layout_choice($value) {
    $choices = plx_parallax_get_page_layout_choices();
    return isset($choices[$value]) ? $value : 'split-left';
}

function plx_parallax_sanitize_featured_pages_display($value) {
    $choices = plx_parallax_get_featured_pages_display_choices();
    return isset($choices[$value]) ? $value : 'cards';
}

function plx_parallax_sanitize_featured_page_background_base($value) {
    $choices = plx_parallax_get_featured_page_background_base_choices();
    return isset($choices[$value]) ? $value : 'gradient';
}

function plx_parallax_customize_register($wp_customize) {
    $wp_customize->add_panel('plx_theme_options', array(
        'title'    => __('PLX Theme Options', 'plx-parallax'),
        'priority' => 30,
    ));

    $wp_customize->add_section('plx_hero_section', array(
        'title' => __('Hero', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_eyebrow_text', array(
        'default'           => plx_parallax_get_default('plx_eyebrow_text'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_eyebrow_text', array(
        'label'   => __('Eyebrow Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_hero_title', array(
        'default'           => plx_parallax_get_default('plx_hero_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_hero_title', array(
        'label'   => __('Hero Title', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_hero_text', array(
        'default'           => plx_parallax_get_default('plx_hero_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_hero_text', array(
        'label'   => __('Hero Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_primary_button_text', array(
        'default'           => plx_parallax_get_default('plx_primary_button_text'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_primary_button_text', array(
        'label'   => __('Primary Button Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_primary_button_url', array(
        'default'           => plx_parallax_get_default('plx_primary_button_url'),
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_primary_button_url', array(
        'label'   => __('Primary Button URL', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('plx_secondary_button_text', array(
        'default'           => plx_parallax_get_default('plx_secondary_button_text'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_secondary_button_text', array(
        'label'   => __('Secondary Button Text', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_secondary_button_url', array(
        'default'           => plx_parallax_get_default('plx_secondary_button_url'),
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_secondary_button_url', array(
        'label'   => __('Secondary Button URL', 'plx-parallax'),
        'section' => 'plx_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('plx_hero_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'plx_hero_image', array(
        'label'   => __('Hero Background Image', 'plx-parallax'),
        'section' => 'plx_hero_section',
    )));

    $wp_customize->add_setting('plx_panel_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'plx_panel_image', array(
        'label'   => __('Intro Panel Image', 'plx-parallax'),
        'section' => 'plx_hero_section',
    )));

    $wp_customize->add_section('plx_content_section', array(
        'title' => __('Editable Elements', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_profile_title', array(
        'default'           => plx_parallax_get_default('plx_profile_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_profile_title', array(
        'label'   => __('Profile Card Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    foreach (array(1, 2, 3, 4) as $index) {
        $wp_customize->add_setting('plx_stat_' . $index . '_title', array(
            'default'           => plx_parallax_get_default('plx_stat_' . $index . '_title'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control('plx_stat_' . $index . '_title', array(
            'label'   => sprintf(__('Stat %d Title', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting('plx_stat_' . $index . '_text', array(
            'default'           => plx_parallax_get_default('plx_stat_' . $index . '_text'),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control('plx_stat_' . $index . '_text', array(
            'label'   => sprintf(__('Stat %d Text', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'textarea',
        ));
    }

    $wp_customize->add_setting('plx_show_intro_section', array(
        'default'           => plx_parallax_get_default('plx_show_intro_section'),
        'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('plx_show_intro_section', array(
        'label'   => __('Show Intro Section', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('plx_intro_title', array(
        'default'           => plx_parallax_get_default('plx_intro_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_intro_title', array(
        'label'   => __('Intro Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_intro_text', array(
        'default'           => plx_parallax_get_default('plx_intro_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_intro_text', array(
        'label'   => __('Intro Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'textarea',
    ));

    foreach (array(1, 2, 3) as $index) {
        $wp_customize->add_setting('plx_feature_' . $index . '_title', array(
            'default'           => plx_parallax_get_default('plx_feature_' . $index . '_title'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control('plx_feature_' . $index . '_title', array(
            'label'   => sprintf(__('Feature %d Title', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'text',
        ));

        $wp_customize->add_setting('plx_feature_' . $index . '_text', array(
            'default'           => plx_parallax_get_default('plx_feature_' . $index . '_text'),
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        ));
        $wp_customize->add_control('plx_feature_' . $index . '_text', array(
            'label'   => sprintf(__('Feature %d Text', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'textarea',
        ));
    }

    $wp_customize->add_setting('plx_empty_content_title', array(
        'default'           => plx_parallax_get_default('plx_empty_content_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_empty_content_title', array(
        'label'   => __('Empty Content Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_empty_content_text', array(
        'default'           => plx_parallax_get_default('plx_empty_content_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_empty_content_text', array(
        'label'   => __('Empty Content Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_show_recent_posts', array(
        'default'           => plx_parallax_get_default('plx_show_recent_posts'),
        'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('plx_show_recent_posts', array(
        'label'   => __('Show Recent Posts Section', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('plx_recent_posts_title', array(
        'default'           => plx_parallax_get_default('plx_recent_posts_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_recent_posts_title', array(
        'label'   => __('Recent Posts Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_recent_posts_count', array(
        'default'           => plx_parallax_get_default('plx_recent_posts_count'),
        'sanitize_callback' => 'plx_parallax_sanitize_recent_posts_count',
    ));
    $wp_customize->add_control('plx_recent_posts_count', array(
        'label'       => __('Recent Posts Count', 'plx-parallax'),
        'section'     => 'plx_content_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 6,
            'step' => 1,
        ),
    ));

    $wp_customize->add_setting('plx_footer_tagline', array(
        'default'           => plx_parallax_get_default('plx_footer_tagline'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_footer_tagline', array(
        'label'   => __('Footer Tagline', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_show_featured_pages', array(
        'default'           => plx_parallax_get_default('plx_show_featured_pages'),
        'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('plx_show_featured_pages', array(
        'label'   => __('Show Parallax Pages Section', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('plx_featured_pages_title', array(
        'default'           => plx_parallax_get_default('plx_featured_pages_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_featured_pages_title', array(
        'label'   => __('Parallax Pages Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_featured_pages_text', array(
        'default'           => plx_parallax_get_default('plx_featured_pages_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_featured_pages_text', array(
        'label'   => __('Parallax Pages Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_featured_pages_cta_text', array(
        'default'           => plx_parallax_get_default('plx_featured_pages_cta_text'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_featured_pages_cta_text', array(
        'label'   => __('Parallax Pages Button Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_featured_pages_display', array(
        'default'           => plx_parallax_get_default('plx_featured_pages_display'),
        'sanitize_callback' => 'plx_parallax_sanitize_featured_pages_display',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('plx_featured_pages_display', array(
        'label'       => __('Parallax Pages Display', 'plx-parallax'),
        'description' => __('Choose between summary cards, full content panels, or full-width parallax flow sections in the chosen order.', 'plx-parallax'),
        'section'     => 'plx_content_section',
        'type'        => 'select',
        'choices'     => plx_parallax_get_featured_pages_display_choices(),
    ));

    $wp_customize->add_setting('plx_featured_pages_sequence', array(
        'default'           => plx_parallax_get_default('plx_featured_pages_sequence'),
        'sanitize_callback' => 'plx_parallax_sanitize_slot_sequence',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new PLX_Parallax_Sortable_Control($wp_customize, 'plx_featured_pages_sequence', array(
        'label'       => __('Parallax Page Order', 'plx-parallax'),
        'description' => __('Drag slots to change the page order on the front page.', 'plx-parallax'),
        'section'     => 'plx_content_section',
    )));

    for ($index = 1; $index <= 6; $index++) {
        $wp_customize->add_setting('plx_featured_page_' . $index . '_id', array(
            'default'           => plx_parallax_get_default('plx_featured_page_' . $index . '_id'),
            'sanitize_callback' => 'plx_parallax_sanitize_page_id',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control('plx_featured_page_' . $index . '_id', array(
            'label'   => sprintf(__('Page Slot %d', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
            'type'    => 'dropdown-pages',
        ));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_layout', array(
            'default'           => plx_parallax_get_default('plx_featured_page_' . $index . '_layout'),
            'sanitize_callback' => 'plx_parallax_sanitize_layout_choice',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control('plx_featured_page_' . $index . '_layout', array(
            'label'       => sprintf(__('Page Slot %d Layout', 'plx-parallax'), $index),
            'section'     => 'plx_content_section',
            'type'        => 'select',
            'choices'     => plx_parallax_get_page_layout_choices(),
        ));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_background_base', array(
            'default'           => plx_parallax_get_featured_page_background_default($index, 'base'),
            'sanitize_callback' => 'plx_parallax_sanitize_featured_page_background_base',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control('plx_featured_page_' . $index . '_background_base', array(
            'label'       => sprintf(__('Page Slot %d Background Base', 'plx-parallax'), $index),
            'description' => __('Choose whether the panel background starts from a gradient or a single color. You can also place an image on top with opacity below.', 'plx-parallax'),
            'section'     => 'plx_content_section',
            'type'        => 'select',
            'choices'     => plx_parallax_get_featured_page_background_base_choices(),
        ));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_background_gradient_1', array(
            'default'           => plx_parallax_get_featured_page_background_default($index, 'gradient_1'),
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'plx_featured_page_' . $index . '_background_gradient_1', array(
            'label'   => sprintf(__('Page Slot %d Gradient Color 1', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
        )));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_background_gradient_2', array(
            'default'           => plx_parallax_get_featured_page_background_default($index, 'gradient_2'),
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'plx_featured_page_' . $index . '_background_gradient_2', array(
            'label'   => sprintf(__('Page Slot %d Gradient Color 2', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
        )));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_background_color', array(
            'default'           => plx_parallax_get_featured_page_background_default($index, 'color'),
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'plx_featured_page_' . $index . '_background_color', array(
            'label'   => sprintf(__('Page Slot %d Solid Background Color', 'plx-parallax'), $index),
            'section' => 'plx_content_section',
        )));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_background_image', array(
            'default'           => plx_parallax_get_featured_page_background_default($index, 'image'),
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'plx_featured_page_' . $index . '_background_image', array(
            'label'       => sprintf(__('Page Slot %d Background Image', 'plx-parallax'), $index),
            'description' => __('Optional image overlay for the panel background.', 'plx-parallax'),
            'section'     => 'plx_content_section',
        )));

        $wp_customize->add_setting('plx_featured_page_' . $index . '_background_image_opacity', array(
            'default'           => plx_parallax_get_featured_page_background_default($index, 'image_opacity'),
            'sanitize_callback' => 'plx_parallax_sanitize_float',
        ));
        $wp_customize->add_control('plx_featured_page_' . $index . '_background_image_opacity', array(
            'label'       => sprintf(__('Page Slot %d Background Image Opacity', 'plx-parallax'), $index),
            'section'     => 'plx_content_section',
            'type'        => 'number',
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 1,
                'step' => 0.05,
            ),
        ));
    }

    $wp_customize->add_setting('plx_show_cta_section', array(
        'default'           => plx_parallax_get_default('plx_show_cta_section'),
        'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('plx_show_cta_section', array(
        'label'   => __('Show CTA Section', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('plx_cta_title', array(
        'default'           => plx_parallax_get_default('plx_cta_title'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_cta_title', array(
        'label'   => __('CTA Title', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_cta_text', array(
        'default'           => plx_parallax_get_default('plx_cta_text'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_cta_text', array(
        'label'   => __('CTA Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('plx_cta_button_text', array(
        'default'           => plx_parallax_get_default('plx_cta_button_text'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_cta_button_text', array(
        'label'   => __('CTA Button Text', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('plx_cta_button_url', array(
        'default'           => plx_parallax_get_default('plx_cta_button_url'),
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('plx_cta_button_url', array(
        'label'   => __('CTA Button URL', 'plx-parallax'),
        'section' => 'plx_content_section',
        'type'    => 'url',
    ));

    $wp_customize->add_section('plx_style_section', array(
        'title' => __('Appearance', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    $wp_customize->add_setting('plx_color_mode', array(
        'default'           => plx_parallax_get_default('plx_color_mode'),
        'sanitize_callback' => 'plx_parallax_sanitize_color_mode',
    ));
    $wp_customize->add_control('plx_color_mode', array(
        'label'   => __('Color Mode', 'plx-parallax'),
        'section' => 'plx_style_section',
        'type'    => 'select',
        'choices' => array(
            'light' => __('Light', 'plx-parallax'),
            'auto'  => __('Auto', 'plx-parallax'),
            'dark'  => __('Dark', 'plx-parallax'),
        ),
    ));

    foreach (array(
        'plx_primary_color'      => __('Primary Color', 'plx-parallax'),
        'plx_secondary_color'    => __('Accent Color', 'plx-parallax'),
        'plx_surface_color'      => __('Surface Color', 'plx-parallax'),
        'plx_text_color'         => __('Text Color', 'plx-parallax'),
        'plx_text_inverse_color' => __('Inverse Text Color', 'plx-parallax'),
        'plx_gradient_color_1'   => __('Gradient Color 1', 'plx-parallax'),
        'plx_gradient_color_2'   => __('Gradient Color 2', 'plx-parallax'),
        'plx_gradient_color_3'   => __('Gradient Color 3', 'plx-parallax'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => plx_parallax_get_default($setting),
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label'   => $config,
            'section' => 'plx_style_section',
        )));
    }

    $wp_customize->add_section('plx_dark_style_section', array(
        'title' => __('Dark Mode Colors', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    foreach (array(
        'plx_dark_primary_color'      => __('Dark Primary Color', 'plx-parallax'),
        'plx_dark_secondary_color'    => __('Dark Accent Color', 'plx-parallax'),
        'plx_dark_surface_color'      => __('Dark Surface Color', 'plx-parallax'),
        'plx_dark_text_color'         => __('Dark Text Color', 'plx-parallax'),
        'plx_dark_text_inverse_color' => __('Dark Inverse Text Color', 'plx-parallax'),
        'plx_dark_gradient_color_1'   => __('Dark Gradient Color 1', 'plx-parallax'),
        'plx_dark_gradient_color_2'   => __('Dark Gradient Color 2', 'plx-parallax'),
        'plx_dark_gradient_color_3'   => __('Dark Gradient Color 3', 'plx-parallax'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => plx_parallax_get_default($setting),
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting, array(
            'label'   => $config,
            'section' => 'plx_dark_style_section',
        )));
    }

    $wp_customize->add_setting('plx_dark_overlay_opacity', array(
        'default'           => plx_parallax_get_default('plx_dark_overlay_opacity'),
        'sanitize_callback' => 'plx_parallax_sanitize_float',
    ));
    $wp_customize->add_control('plx_dark_overlay_opacity', array(
        'label'       => __('Dark Hero Overlay Opacity', 'plx-parallax'),
        'section'     => 'plx_dark_style_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.05,
        ),
    ));

    $wp_customize->add_setting('plx_font_family', array(
        'default'           => plx_parallax_get_default('plx_font_family'),
        'sanitize_callback' => 'plx_parallax_sanitize_font_choice',
    ));
    $wp_customize->add_control('plx_font_family', array(
        'label'   => __('Google Font', 'plx-parallax'),
        'section' => 'plx_style_section',
        'type'    => 'select',
        'choices' => array_combine(array_keys(plx_parallax_get_font_choices()), array_keys(plx_parallax_get_font_choices())),
    ));

    $wp_customize->add_setting('plx_gradient_angle', array(
        'default'           => plx_parallax_get_default('plx_gradient_angle'),
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('plx_gradient_angle', array(
        'label'       => __('Gradient Angle', 'plx-parallax'),
        'section'     => 'plx_style_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 360,
        ),
    ));

    $wp_customize->add_setting('plx_overlay_opacity', array(
        'default'           => plx_parallax_get_default('plx_overlay_opacity'),
        'sanitize_callback' => 'plx_parallax_sanitize_float',
    ));
    $wp_customize->add_control('plx_overlay_opacity', array(
        'label'       => __('Hero Overlay Opacity', 'plx-parallax'),
        'section'     => 'plx_style_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.05,
        ),
    ));

    $wp_customize->add_section('plx_behavior_section', array(
        'title' => __('Behavior', 'plx-parallax'),
        'panel' => 'plx_theme_options',
    ));

    foreach (array(
        'plx_enable_parallax'         => __('Enable Parallax', 'plx-parallax'),
        'plx_disable_mobile_parallax' => __('Disable Parallax on Mobile', 'plx-parallax'),
        'plx_sticky_header'           => __('Sticky Header', 'plx-parallax'),
        'plx_smooth_scroll'           => __('Smooth Scroll', 'plx-parallax'),
    ) as $setting => $config) {
        $wp_customize->add_setting($setting, array(
            'default'           => plx_parallax_get_default($setting),
            'sanitize_callback' => 'plx_parallax_sanitize_checkbox',
        ));
        $wp_customize->add_control($setting, array(
            'label'   => $config,
            'section' => 'plx_behavior_section',
            'type'    => 'checkbox',
        ));
    }

    $wp_customize->add_setting('plx_parallax_speed', array(
        'default'           => plx_parallax_get_default('plx_parallax_speed'),
        'sanitize_callback' => 'plx_parallax_sanitize_float',
    ));
    $wp_customize->add_control('plx_parallax_speed', array(
        'label'       => __('Parallax Speed', 'plx-parallax'),
        'section'     => 'plx_behavior_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 1,
            'step' => 0.02,
        ),
    ));

    $wp_customize->add_setting('plx_content_width', array(
        'default'           => plx_parallax_get_default('plx_content_width'),
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('plx_content_width', array(
        'label'       => __('Content Width', 'plx-parallax'),
        'section'     => 'plx_behavior_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1440,
            'step' => 10,
        ),
    ));
}
add_action('customize_register', 'plx_parallax_customize_register');
