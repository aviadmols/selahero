<?php
defined('ABSPATH') || exit;

return array(
    'type' => 'sela-cta',
    'label' => 'Sela — CTA #2 + Cards',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'title',
            'type' => 'text',
            'label' => 'Title',
            'default' => 'Want your cloud better and faster?',
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
            'tab' => 'style',
            'id' => 'bg_color',
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
            'id' => 'card_bg',
            'type' => 'color',
            'label' => 'Card background',
            'default' => '#ffffff',
        ),
        array(
            'tab' => 'style',
            'id' => 'quote_color',
            'type' => 'color',
            'label' => 'Quote color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'name_color',
            'type' => 'color',
            'label' => 'Name color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'dot_active',
            'type' => 'color',
            'label' => 'Active dot color',
            'default' => '#00dbe9',
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
            'id' => 'fz_title_d',
            'type' => 'range',
            'label' => 'Title size — desktop',
            'default' => 38,
            'min' => 16,
            'max' => 80,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_m',
            'type' => 'range',
            'label' => 'Title size — mobile',
            'default' => 26,
            'min' => 14,
            'max' => 60,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_quote_d',
            'type' => 'range',
            'label' => 'Quote size — desktop',
            'default' => 16,
            'min' => 12,
            'max' => 24,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_quote_m',
            'type' => 'range',
            'label' => 'Quote size — mobile',
            'default' => 14,
            'min' => 11,
            'max' => 22,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y',
            'type' => 'range',
            'label' => 'Section padding-y',
            'default' => 100,
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'testimonial-card',
        ),
        'min' => 0,
        'max' => 12,
    ),
    'block_types' => array(
        'testimonial-card' => array(
            'label' => 'Testimonial card',
            'settings' => array(
                array(
                    'id' => 'logo',
                    'type' => 'image',
                    'label' => 'Logo',
                    'default' => '',
                ),
                array(
                    'id' => 'logo_alt',
                    'type' => 'text',
                    'label' => 'Logo alt',
                    'default' => '',
                ),
                array(
                    'id' => 'quote',
                    'type' => 'textarea',
                    'label' => 'Quote',
                    'default' => '',
                ),
                array(
                    'id' => 'avatar',
                    'type' => 'image',
                    'label' => 'Avatar',
                    'default' => '',
                ),
                array(
                    'id' => 'avatar_alt',
                    'type' => 'text',
                    'label' => 'Avatar alt',
                    'default' => '',
                ),
                array(
                    'id' => 'name',
                    'type' => 'text',
                    'label' => 'Name',
                    'default' => '',
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'testimonial-card',
            'settings' => array(
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-cta/media/testi-logo-nucleus.png',
                'logo_alt' => '',
                'quote' => '"What sets Sela apart from other companies is the dedication and willingness to go the extra mile to help with our technical needs. Our relationship with 2bcloud has resulted in increased cloud cost savings, better reporting, and much faster and more direct enterprise support than before."',
                'avatar' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-cta/media/testi-avatar-jeff.png',
                'avatar_alt' => '',
                'name' => 'Jeff Gouge, CISO, Nucleus Security',
            ),
        ),
        array(
            'type' => 'testimonial-card',
            'settings' => array(
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-cta/media/testi-logo-nucleus.png',
                'logo_alt' => '',
                'quote' => '"Sela\'s engineering depth is unmatched. Their team helped us modernize our AWS infrastructure, cut cloud costs by 28%, and enabled us to ship features 3× faster. The 24/7 support is a game changer for a growing startup like ours."',
                'avatar' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-cta/media/testi-avatar-jeff.png',
                'avatar_alt' => '',
                'name' => 'Dan Cohen, CISO, Wiz',
            ),
        ),
        array(
            'type' => 'testimonial-card',
            'settings' => array(
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-cta/media/testi-logo-nucleus.png',
                'logo_alt' => '',
                'quote' => '"From cloud migration to GenAI adoption, Sela has been our trusted partner at every stage. Their FinOps expertise alone saved us hundreds of thousands of dollars annually while improving reliability across all our cloud workloads."',
                'avatar' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-cta/media/testi-avatar-jeff.png',
                'avatar_alt' => '',
                'name' => 'Michael Brown, CTO, Island',
            ),
        ),
    ),
);