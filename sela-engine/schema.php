<?php
defined('ABSPATH') || exit;

return array(
    'type' => 'sela-engine',
    'label' => 'Sela — Cloud Engine',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'title',
            'type' => 'textarea',
            'label' => 'Title',
            'default' => 'Cloud providers give you a powerful<br>engine for your growth.',
        ),
        array(
            'id' => 'title_tag',
            'type' => 'select',
            'label' => 'Title tag',
            'default' => 'auto',
            'options' => array(
                array(
                    'value' => 'auto',
                    'label' => 'Auto',
                ),
                array(
                    'value' => 'h1',
                    'label' => 'H1',
                ),
                array(
                    'value' => 'h2',
                    'label' => 'H2',
                ),
                array(
                    'value' => 'h3',
                    'label' => 'H3',
                ),
            ),
        ),
        array(
            'id' => 'subtitle',
            'type' => 'textarea',
            'label' => 'Subtitle',
            'default' => 'Partnering with Sela provides ongoing technical and commercial add-ons to that engine, maximizing its performance while reducing costs – So you can grow faster and more efficiently.',
        ),
        array(
            'id' => 'wave_image',
            'type' => 'image',
            'label' => 'Wave image',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/cloud-wave.svg',
        ),
        array(
            'id' => 'robot_image',
            'type' => 'image',
            'label' => 'Robot image',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/engine-robot.png',
        ),
        array(
            'tab' => 'style',
            'id' => 'bg_section',
            'type' => 'color',
            'label' => 'Section background',
            'default' => '#eef5ff',
        ),
        array(
            'tab' => 'style',
            'id' => 'title_color',
            'type' => 'color',
            'label' => 'Title color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'text_color',
            'type' => 'color',
            'label' => 'Text color',
            'default' => '#686868',
        ),
        array(
            'tab' => 'style',
            'id' => 'card_border_color',
            'type' => 'color',
            'label' => 'Card border color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'card_bg',
            'type' => 'color',
            'label' => 'Card background',
            'default' => '#ffffff',
        ),
        array(
            'tab' => 'style',
            'id' => 'ff_base',
            'type' => 'select',
            'label' => 'Font',
            'default' => '\'Lexend\', sans-serif',
            'options' => array(
                array(
                    'value' => '\'Lexend\', sans-serif',
                    'label' => 'Lexend',
                ),
                array(
                    'value' => '\'Inter\', sans-serif',
                    'label' => 'Inter',
                ),
                array(
                    'value' => '\'Roboto\', sans-serif',
                    'label' => 'Roboto',
                ),
                array(
                    'value' => 'system-ui, sans-serif',
                    'label' => 'System UI',
                ),
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_d',
            'type' => 'range',
            'label' => 'Section padding — desktop',
            'default' => 100,
            'min' => 0,
            'max' => 240,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_m',
            'type' => 'range',
            'label' => 'Section padding — mobile',
            'default' => 64,
            'min' => 0,
            'max' => 180,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_d',
            'type' => 'range',
            'label' => 'Title size — desktop',
            'default' => 38,
            'min' => 18,
            'max' => 90,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_m',
            'type' => 'range',
            'label' => 'Title size — mobile',
            'default' => 28,
            'min' => 18,
            'max' => 56,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_sub_d',
            'type' => 'range',
            'label' => 'Subtitle size — desktop',
            'default' => 18,
            'min' => 12,
            'max' => 32,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_sub_m',
            'type' => 'range',
            'label' => 'Subtitle size — mobile',
            'default' => 16,
            'min' => 12,
            'max' => 26,
            'step' => 1,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'engine-column',
            'engine-card',
        ),
        'min' => 0,
        'max' => 12,
    ),
    'block_types' => array(
        'engine-column' => array(
            'label' => 'Engine column',
            'settings' => array(
                array(
                    'id' => 'side',
                    'type' => 'select',
                    'label' => 'Side',
                    'default' => 'left',
                    'options' => array(
                        array(
                            'value' => 'left',
                            'label' => 'Left',
                        ),
                        array(
                            'value' => 'right',
                            'label' => 'Right',
                        ),
                    ),
                ),
                array(
                    'id' => 'icon',
                    'type' => 'image',
                    'label' => 'Icon',
                    'default' => '',
                ),
                array(
                    'id' => 'icon_alt',
                    'type' => 'text',
                    'label' => 'Icon alt',
                    'default' => '',
                ),
                array(
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Column title',
                    'default' => 'Commercial Add-ons',
                ),
                array(
                    'id' => 'items',
                    'type' => 'textarea',
                    'label' => 'Items — one per line',
                    'default' => 'FinOps & cost optimization
Private Pricing Deal Structuring Assistance
Cloud vendor engagement & funds securing
GTM',
                ),
            ),
        ),
        'engine-card' => array(
            'label' => 'Center card',
            'settings' => array(
                array(
                    'id' => 'type',
                    'type' => 'select',
                    'label' => 'Card type',
                    'default' => 'text',
                    'options' => array(
                        array(
                            'value' => 'text',
                            'label' => 'Text',
                        ),
                        array(
                            'value' => 'image',
                            'label' => 'Image',
                        ),
                    ),
                ),
                array(
                    'id' => 'text',
                    'type' => 'text',
                    'label' => 'Text',
                    'default' => 'Commercial Add-ons',
                ),
                array(
                    'id' => 'image',
                    'type' => 'image',
                    'label' => 'Image',
                    'default' => '',
                ),
                array(
                    'id' => 'image_alt',
                    'type' => 'text',
                    'label' => 'Image alt',
                    'default' => '',
                ),
                array(
                    'id' => 'style',
                    'type' => 'select',
                    'label' => 'Style',
                    'default' => 'pink',
                    'options' => array(
                        array(
                            'value' => 'pink',
                            'label' => 'Pink shadow',
                        ),
                        array(
                            'value' => 'blue',
                            'label' => 'Blue shadow',
                        ),
                        array(
                            'value' => 'cyan',
                            'label' => 'Cyan shadow',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'engine-column',
            'settings' => array(
                'side' => 'left',
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/engine-row-left.svg',
                'icon_alt' => '',
                'title' => 'Commercial Add-ons',
                'items' => 'FinOps & cost optimization
Private Pricing Deal Structuring Assistance
Cloud vendor engagement & funds securing
GTM',
            ),
        ),
        array(
            'type' => 'engine-card',
            'settings' => array(
                'type' => 'text',
                'text' => 'Commercial Add-ons',
                'image' => '',
                'image_alt' => '',
                'style' => 'pink',
            ),
        ),
        array(
            'type' => 'engine-card',
            'settings' => array(
                'type' => 'text',
                'text' => 'Technological Add-ons',
                'image' => '',
                'image_alt' => '',
                'style' => 'blue',
            ),
        ),
        array(
            'type' => 'engine-card',
            'settings' => array(
                'type' => 'image',
                'text' => '',
                'image' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/engine-cloud-logos.svg',
                'image_alt' => 'AWS, Google Cloud, Azure',
                'style' => 'cyan',
            ),
        ),
        array(
            'type' => 'engine-column',
            'settings' => array(
                'side' => 'right',
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/engine-right-icon.svg',
                'icon_alt' => '',
                'title' => 'Technological Add-ons',
                'items' => 'Consulting & Professional Services
Architecture Best Practices
24/7 Multi-cloud Support Portal, 10 mins response time
Flexible expert certified teams
Staff augmentation',
            ),
        ),
    ),
);