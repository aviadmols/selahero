<?php
defined('ABSPATH') || exit;

$accent_options = array(
    array('value' => 'blue', 'label' => 'Blue'),
    array('value' => 'green', 'label' => 'Green'),
    array('value' => 'cyan', 'label' => 'Cyan'),
    array('value' => 'pink', 'label' => 'Pink'),
    array('value' => 'dark', 'label' => 'Dark'),
);

$icon_size_options = array(
    array('value' => '24', 'label' => '24px'),
    array('value' => '28', 'label' => '28px'),
    array('value' => '33', 'label' => '33px'),
    array('value' => '40', 'label' => '40px'),
    array('value' => '48', 'label' => '48px'),
    array('value' => '56', 'label' => '56px'),
    array('value' => '64', 'label' => '64px'),
    array('value' => '80', 'label' => '80px'),
    array('value' => '96', 'label' => '96px'),
    array('value' => '120', 'label' => '120px'),
);

$default_icon = 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-products/media/product-icon-bag.svg';

return array(
    'type' => 'sela-products',
    'label' => 'Sela — Products / CTA',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'headline',
            'type' => 'text',
            'label' => 'Headline',
            'default' => 'Want your cloud better and faster?',
        ),
        array(
            'id' => 'subtitle',
            'type' => 'textarea',
            'label' => 'Subtitle',
            'default' => 'Use Sela Cloud Innovation Store to maximize performance, cut costs, and stay ahead with cloud-native automation and AI-driven optimization.',
        ),
        array(
            'tab' => 'style',
            'id' => 'bg_color',
            'type' => 'color',
            'label' => 'Section background',
            'default' => '#ffffff',
        ),
        array(
            'tab' => 'style',
            'id' => 'text_color',
            'type' => 'color',
            'label' => 'Headline color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'sub_color',
            'type' => 'color',
            'label' => 'Subtitle/desc color',
            'default' => '#676767',
        ),
        array(
            'tab' => 'style',
            'id' => 'ff',
            'type' => 'select',
            'label' => 'Font',
            'default' => '\'Lexend\', sans-serif',
            'options' => array(
                array('value' => '\'Lexend\', sans-serif', 'label' => 'Lexend'),
                array('value' => '\'Inter\', sans-serif', 'label' => 'Inter'),
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_h_d',
            'type' => 'range',
            'label' => 'Headline size — desktop (px)',
            'default' => 38,
            'min' => 16,
            'max' => 80,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_h_m',
            'type' => 'range',
            'label' => 'Headline size — mobile (px)',
            'default' => 26,
            'min' => 14,
            'max' => 60,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_sub_d',
            'type' => 'range',
            'label' => 'Subtitle size — desktop (px)',
            'default' => 18,
            'min' => 12,
            'max' => 32,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_sub_m',
            'type' => 'range',
            'label' => 'Subtitle size — mobile (px)',
            'default' => 15,
            'min' => 12,
            'max' => 24,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_name',
            'type' => 'range',
            'label' => 'Card name size (px)',
            'default' => 28,
            'min' => 16,
            'max' => 48,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y',
            'type' => 'range',
            'label' => 'Section padding-y (px)',
            'default' => 100,
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
    ),
    // Same repeater pattern as sela-engine center cards (engine-card).
    'blocks' => array(
        'allowed' => array(
            'product-card',
        ),
        'min' => 1,
        'max' => 12,
    ),
    'block_types' => array(
        'product-card' => array(
            'label' => 'Product card',
            'settings' => array(
                array(
                    'id' => 'icon',
                    'type' => 'image',
                    'label' => 'Icon',
                    'default' => $default_icon,
                ),
                array(
                    'id' => 'icon_size_d',
                    'type' => 'select',
                    'label' => 'Icon size — desktop',
                    'default' => '33',
                    'options' => $icon_size_options,
                ),
                array(
                    'id' => 'icon_size_m',
                    'type' => 'select',
                    'label' => 'Icon size — mobile',
                    'default' => '33',
                    'options' => $icon_size_options,
                ),
                array(
                    'id' => 'name',
                    'type' => 'text',
                    'label' => 'Title',
                    'default' => 'SavePro',
                ),
                array(
                    'id' => 'desc',
                    'type' => 'textarea',
                    'label' => 'Text',
                    'default' => 'The only automatic Azure cost optimization tool, built by FinOps from hands-on experience managing thousands of Azure environments.',
                ),
                array(
                    'id' => 'cta',
                    'type' => 'text',
                    'label' => 'Button label',
                    'default' => 'Get Started',
                ),
                array(
                    'id' => 'link',
                    'type' => 'url',
                    'label' => 'Button link',
                    'default' => '',
                ),
                array(
                    'id' => 'accent',
                    'type' => 'select',
                    'label' => 'Accent',
                    'default' => 'blue',
                    'options' => $accent_options,
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'product-card',
            'settings' => array(
                'icon' => $default_icon,
                'icon_size_d' => '33',
                'icon_size_m' => '33',
                'name' => 'SavePro',
                'desc' => 'The only automatic Azure cost optimization tool, built by FinOps from hands-on experience managing thousands of Azure environments.',
                'cta' => 'Get Started',
                'link' => '',
                'accent' => 'blue',
            ),
        ),
        array(
            'type' => 'product-card',
            'settings' => array(
                'icon' => $default_icon,
                'icon_size_d' => '33',
                'icon_size_m' => '33',
                'name' => 'SavePro',
                'desc' => 'The only automatic Azure cost optimization tool, built by FinOps from hands-on experience managing thousands of Azure environments.',
                'cta' => 'Get Started',
                'link' => '',
                'accent' => 'green',
            ),
        ),
        array(
            'type' => 'product-card',
            'settings' => array(
                'icon' => $default_icon,
                'icon_size_d' => '33',
                'icon_size_m' => '33',
                'name' => 'SavePro',
                'desc' => 'The only automatic Azure cost optimization tool, built by FinOps from hands-on experience managing thousands of Azure environments.',
                'cta' => 'Get Started',
                'link' => '',
                'accent' => 'cyan',
            ),
        ),
    ),
);
