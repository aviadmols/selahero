<?php
defined('ABSPATH') || exit;

return array(
    'type' => 'sela-scale',
    'label' => 'Sela — Scale & Win',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'find_text',
            'type' => 'text',
            'label' => 'Subtitle',
            'default' => 'Find out how Sela can help you',
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
            'id' => 'cta_text',
            'type' => 'text',
            'label' => 'CTA text',
            'default' => 'Get Started',
        ),
        array(
            'id' => 'cta_link',
            'type' => 'url',
            'label' => 'CTA link',
            'default' => '#',
        ),
        array(
            'tab' => 'style',
            'id' => 'box_bg',
            'type' => 'color',
            'label' => 'Box background',
            'default' => '#f9f9f9',
        ),
        array(
            'tab' => 'style',
            'id' => 'find_color',
            'type' => 'color',
            'label' => 'Subtitle color',
            'default' => '#1c1c1c',
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
            'id' => 'cta_bg',
            'type' => 'color',
            'label' => 'CTA background',
            'default' => '#00dbe9',
        ),
        array(
            'tab' => 'style',
            'id' => 'cta_color',
            'type' => 'color',
            'label' => 'CTA text color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'ff',
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
                    'value' => 'system-ui, sans-serif',
                    'label' => 'System UI',
                ),
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_find_d',
            'type' => 'range',
            'label' => 'Subtitle size — desktop',
            'default' => 22,
            'min' => 14,
            'max' => 36,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_find_m',
            'type' => 'range',
            'label' => 'Subtitle size — mobile',
            'default' => 16,
            'min' => 12,
            'max' => 28,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_d',
            'type' => 'range',
            'label' => 'Title size — desktop',
            'default' => 52,
            'min' => 16,
            'max' => 100,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_m',
            'type' => 'range',
            'label' => 'Title size — mobile',
            'default' => 30,
            'min' => 14,
            'max' => 60,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y',
            'type' => 'range',
            'label' => 'Section padding-y',
            'default' => 56,
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'scale-face',
        ),
        'min' => 0,
        'max' => 20,
    ),
    'block_types' => array(
        'scale-face' => array(
            'label' => 'Face image',
            'settings' => array(
                array(
                    'id' => 'image',
                    'type' => 'image',
                    'label' => 'Image',
                    'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face1.jpg',
                ),
                array(
                    'id' => 'alt',
                    'type' => 'text',
                    'label' => 'Alt text',
                    'default' => '',
                ),
                array(
                    'id' => 'style',
                    'type' => 'select',
                    'label' => 'Image style',
                    'default' => 'default',
                    'options' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default',
                        ),
                        array(
                            'value' => 'border',
                            'label' => 'Border',
                        ),
                        array(
                            'value' => 'wide',
                            'label' => 'Wide',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face1.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face2.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face3.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face4.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face5.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face6.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face7.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face8.jpg',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face9.jpg',
                'alt' => '',
                'style' => 'border',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face10.png',
                'alt' => '',
                'style' => 'default',
            ),
        ),
        array(
            'type' => 'scale-face',
            'settings' => array(
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-scale/media/scale-face11.png',
                'alt' => '',
                'style' => 'wide',
            ),
        ),
    ),
);