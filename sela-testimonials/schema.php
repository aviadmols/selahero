<?php
defined( 'ABSPATH' ) || exit;

return array(
    'type' => 'sela-testimonials',
    'label' => 'Sela — Testimonials (Tabs + Video)',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'image_video',
            'type' => 'image',
            'label' => 'Video thumbnail',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/testi-video.jpg',
        ),
        array(
            'id' => 'image_play_btn',
            'type' => 'image',
            'label' => 'Play button icon',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/play-btn.svg',
        ),
        array(
            'id' => 'image_cloud',
            'type' => 'image',
            'label' => 'Decorative cloud',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/cloud-hero-1.svg',
        ),
        array(
            'id' => 'show_cloud',
            'type' => 'checkbox',
            'label' => 'Show decorative cloud',
            'default' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'bg_color',
            'type' => 'color',
            'label' => 'Section background',
            'default' => '#f9f9f9',
        ),
        array(
            'tab' => 'style',
            'id' => 'text_color',
            'type' => 'color',
            'label' => 'Panel text color',
            'default' => '#717171',
        ),
        array(
            'tab' => 'style',
            'id' => 'author_color',
            'type' => 'color',
            'label' => 'Author color',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'tab_active_bg',
            'type' => 'color',
            'label' => 'Active tab background',
            'default' => '#d9f3f5',
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
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_text_d',
            'type' => 'range',
            'label' => 'Text size — desktop (px)',
            'default' => 18,
            'min' => 12,
            'max' => 32,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_text_m',
            'type' => 'range',
            'label' => 'Text size — mobile (px)',
            'default' => 15,
            'min' => 12,
            'max' => 24,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y',
            'type' => 'range',
            'label' => 'Section padding-y (px)',
            'default' => 80,
            'min' => 0,
            'max' => 200,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'testimonial-tab',
        ),
        'min' => 0,
        'max' => 100,
    ),
    'block_types' => array(
        'testimonial-tab' => array(
            'label' => 'Testimonial tab',
            'settings' => array(
                array(
                    'id' => 'name',
                    'type' => 'text',
                    'label' => 'Name',
                    'default' => 'eToro',
                ),
                array(
                    'id' => 'logo',
                    'type' => 'image',
                    'label' => 'Tab logo',
                    'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-etoro.png',
                ),
                array(
                    'id' => 'panel_logo',
                    'type' => 'image',
                    'label' => 'Panel logo',
                    'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/testi-logo-etoro.png',
                ),
                array(
                    'id' => 'video',
                    'type' => 'url',
                    'label' => 'Video URL',
                    'default' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
                ),
                array(
                    'id' => 'text',
                    'type' => 'textarea',
                    'label' => 'Text',
                    'default' => 'Over 6 million traders in 140 countries use the eToro Social Trading Network to invest. They buy and sell financial instruments while copying successful traders\' decisions in real time, making trading social. In 2015, eToro moved to Microsoft Azure, adding analytics tools for its CopyFunds.',
                ),
                array(
                    'id' => 'author',
                    'type' => 'text',
                    'label' => 'Author',
                    'default' => 'Jasmine Lee, Creative Director',
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'testimonial-tab',
            'settings' => array(
                'name' => 'eToro',
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-etoro.png',
                'panel_logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/testi-logo-etoro.png',
                'video' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
                'text' => 'Over 6 million traders in 140 countries use the eToro Social Trading Network to invest. They buy and sell financial instruments while copying successful traders\' decisions in real time, making trading social. In 2015, eToro moved to Microsoft Azure, adding analytics tools for its CopyFunds.',
                'author' => 'Jasmine Lee, Creative Director',
            ),
        ),
        array(
            'type' => 'testimonial-tab',
            'settings' => array(
                'name' => 'WIZ',
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-wiz.png',
                'panel_logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-wiz.png',
                'video' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
                'text' => 'Wiz partnered with Sela to accelerate cloud security posture management across multi-cloud environments. With Sela\'s expertise, we dramatically reduced our time-to-deploy and cloud spend while maintaining enterprise-grade security across all workloads.',
                'author' => 'Dan Cohen, CISO, Wiz',
            ),
        ),
        array(
            'type' => 'testimonial-tab',
            'settings' => array(
                'name' => 'Island',
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-island.png',
                'panel_logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-island.png',
                'video' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
                'text' => 'Island leverages Sela\'s cloud expertise to build robust, scalable infrastructure for our enterprise browser. Sela\'s 24/7 support and FinOps capabilities have been critical in helping us scale quickly while keeping infrastructure costs under control.',
                'author' => 'Michael Brown, CTO, Island',
            ),
        ),
        array(
            'type' => 'testimonial-tab',
            'settings' => array(
                'name' => 'IONIX',
                'logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-ionix.png',
                'panel_logo' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-testimonials/media/tab-ionix.png',
                'video' => 'https://www.youtube.com/embed/zfVHUuJB3Dk?autoplay=1&rel=0',
                'text' => 'IONIX\'s attack surface management platform requires high availability and performance. Sela\'s cloud engineering team helped us optimize our AWS infrastructure, achieving significant cost savings while improving response times across all global regions.',
                'author' => 'Sarah Gold, VP Engineering, IONIX',
            ),
        ),
    ),
);
