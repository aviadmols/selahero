<?php
defined('ABSPATH') || exit;

return array(
    'type' => 'sela-experts',
    'label' => 'Sela — Experts',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'title',
            'type' => 'textarea',
            'label' => 'Title',
            'default' => 'Our tech experts,<br>your scale.',
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
            'id' => 'description',
            'type' => 'textarea',
            'label' => 'Description',
            'default' => 'With a deep bench of multi-cloud engineering talent, Sela delivers hands-on, end-to-end expertise that drives real business outcomes so you can grow, scale, and win.',
        ),
        array(
            'id' => 'cloud_1',
            'type' => 'image',
            'label' => 'Cloud 1',
            'default' => 'https://www.figma.com/api/mcp/asset/6d5bc49e-5442-4f99-a036-16dfcb34c0d4',
        ),
        array(
            'id' => 'cloud_2',
            'type' => 'image',
            'label' => 'Cloud 2',
            'default' => 'https://www.figma.com/api/mcp/asset/95405b2c-a2ce-4f59-8230-c56fb5a1b3f8',
        ),
        array(
            'id' => 'cloud_3',
            'type' => 'image',
            'label' => 'Cloud 3',
            'default' => 'https://www.figma.com/api/mcp/asset/882a7b42-70cf-4726-aaed-6153d05f8b19',
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
            'default' => '#ffffff',
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
            'id' => 'desc_color',
            'type' => 'color',
            'label' => 'Description color',
            'default' => '#686868',
        ),
        array(
            'tab' => 'style',
            'id' => 'chip_text_color',
            'type' => 'color',
            'label' => 'Chip text color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'chip_border_color',
            'type' => 'color',
            'label' => 'Chip border color',
            'default' => '#1c1c1c',
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
            'max' => 220,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_m',
            'type' => 'range',
            'label' => 'Section padding — mobile',
            'default' => 60,
            'min' => 0,
            'max' => 160,
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
            'id' => 'fz_desc_d',
            'type' => 'range',
            'label' => 'Description size — desktop',
            'default' => 18,
            'min' => 12,
            'max' => 32,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_desc_m',
            'type' => 'range',
            'label' => 'Description size — mobile',
            'default' => 16,
            'min' => 12,
            'max' => 26,
            'step' => 1,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'expert-chip',
        ),
        'min' => 0,
        'max' => 12,
    ),
    'block_types' => array(
        'expert-chip' => array(
            'label' => 'Expert chip',
            'settings' => array(
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
                    'id' => 'text',
                    'type' => 'text',
                    'label' => 'Text',
                    'default' => 'Migrations & Modernizations',
                ),
                array(
                    'id' => 'color',
                    'type' => 'select',
                    'label' => 'Color',
                    'default' => 'green',
                    'options' => array(
                        array(
                            'value' => 'green',
                            'label' => 'Green',
                        ),
                        array(
                            'value' => 'cyan',
                            'label' => 'Cyan',
                        ),
                        array(
                            'value' => 'pink',
                            'label' => 'Pink',
                        ),
                        array(
                            'value' => 'yellow',
                            'label' => 'Yellow',
                        ),
                        array(
                            'value' => 'blue-light',
                            'label' => 'Blue Light',
                        ),
                        array(
                            'value' => 'gray',
                            'label' => 'Gray',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'expert-chip',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/icon-settings.svg',
                'icon_alt' => '',
                'text' => 'Migrations & Modernizations',
                'color' => 'green',
            ),
        ),
        array(
            'type' => 'expert-chip',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/icon-database.svg',
                'icon_alt' => '',
                'text' => 'Data',
                'color' => 'cyan',
            ),
        ),
        array(
            'type' => 'expert-chip',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/icon-genai.svg',
                'icon_alt' => '',
                'text' => 'GenAI',
                'color' => 'pink',
            ),
        ),
        array(
            'type' => 'expert-chip',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/icon-appeng.svg',
                'icon_alt' => '',
                'text' => 'Application Engineering',
                'color' => 'yellow',
            ),
        ),
        array(
            'type' => 'expert-chip',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/icon-devops.svg',
                'icon_alt' => '',
                'text' => 'DevOps',
                'color' => 'blue-light',
            ),
        ),
        array(
            'type' => 'expert-chip',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/icon-shield.svg',
                'icon_alt' => '',
                'text' => 'Security',
                'color' => 'gray',
            ),
        ),
    ),
);