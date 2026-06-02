<?php
defined('ABSPATH') || exit;

return array(
    'type' => 'sela-footer',
    'label' => 'Sela — Footer',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'image_logo',
            'type' => 'image',
            'label' => 'Footer logo',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/footer-logo.png',
        ),
        array(
            'id' => 'logo_alt',
            'type' => 'text',
            'label' => 'Footer logo alt',
            'default' => 'Sela',
        ),
        array(
            'id' => 'image_robot',
            'type' => 'image',
            'label' => 'Robot mascot',
            'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/footer-robot.png',
        ),
        array(
            'id' => 'contact_email',
            'type' => 'text',
            'label' => 'Contact email',
            'default' => 'info@selacloud.com',
        ),
        array(
            'id' => 'contact_email_link',
            'type' => 'url',
            'label' => 'Contact email link',
            'default' => 'mailto:info@selacloud.com',
        ),
        array(
            'id' => 'contact_phone_1',
            'type' => 'text',
            'label' => 'Phone 1',
            'default' => 'US: +1 484-369-0439',
        ),
        array(
            'id' => 'contact_phone_1_link',
            'type' => 'url',
            'label' => 'Phone 1 link',
            'default' => 'tel:+14843690439',
        ),
        array(
            'id' => 'contact_phone_2',
            'type' => 'text',
            'label' => 'Phone 2',
            'default' => 'Israel: +972 3-6176666',
        ),
        array(
            'id' => 'contact_phone_2_link',
            'type' => 'url',
            'label' => 'Phone 2 link',
            'default' => 'tel:+97236176666',
        ),
        array(
            'id' => 'copy_text',
            'type' => 'text',
            'label' => 'Copyright text',
            'default' => 'Copyright © 2025 – Sela cloud solution',
        ),
        array(
            'id' => 'show_robot',
            'type' => 'checkbox',
            'label' => 'Show robot mascot',
            'default' => 1,
        ),
        array(
            'id' => 'show_socials',
            'type' => 'checkbox',
            'label' => 'Show social icons',
            'default' => 1,
        ),
        array(
            'id' => 'show_certs',
            'type' => 'checkbox',
            'label' => 'Show certification badges',
            'default' => 1,
        ),
        array(
            'id' => 'show_divider',
            'type' => 'checkbox',
            'label' => 'Show divider line',
            'default' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'bg_section',
            'type' => 'color',
            'label' => 'Section background',
            'default' => '#1c1c1c',
        ),
        array(
            'tab' => 'style',
            'id' => 'color_text',
            'type' => 'color',
            'label' => 'Text color',
            'default' => '#ffffff',
        ),
        array(
            'tab' => 'style',
            'id' => 'color_muted',
            'type' => 'color',
            'label' => 'Muted color',
            'default' => '#7f7f7f',
        ),
        array(
            'tab' => 'style',
            'id' => 'color_link',
            'type' => 'color',
            'label' => 'Link color',
            'default' => '#ffffff',
        ),
        array(
            'tab' => 'style',
            'id' => 'color_divider',
            'type' => 'color',
            'label' => 'Divider color',
            'default' => '#262626',
        ),
        array(
            'tab' => 'style',
            'id' => 'ff_base',
            'type' => 'select',
            'label' => 'Footer font',
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
                    'value' => '\'Open Sans\', sans-serif',
                    'label' => 'Open Sans',
                ),
                array(
                    'value' => 'system-ui, sans-serif',
                    'label' => 'System UI',
                ),
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'fw_col_h',
            'type' => 'select',
            'label' => 'Column title weight',
            'default' => '500',
            'options' => array(
                array(
                    'value' => '300',
                    'label' => 'Light',
                ),
                array(
                    'value' => '400',
                    'label' => 'Regular',
                ),
                array(
                    'value' => '500',
                    'label' => 'Medium',
                ),
                array(
                    'value' => '600',
                    'label' => 'Semi Bold',
                ),
                array(
                    'value' => '700',
                    'label' => 'Bold',
                ),
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_col_h_d',
            'type' => 'range',
            'label' => 'Column title size — desktop',
            'default' => 15,
            'min' => 11,
            'max' => 28,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_col_h_m',
            'type' => 'range',
            'label' => 'Column title size — mobile',
            'default' => 14,
            'min' => 11,
            'max' => 22,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_link_d',
            'type' => 'range',
            'label' => 'Link size — desktop',
            'default' => 12,
            'min' => 10,
            'max' => 22,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_link_m',
            'type' => 'range',
            'label' => 'Link size — mobile',
            'default' => 13,
            'min' => 10,
            'max' => 22,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_copy',
            'type' => 'range',
            'label' => 'Copyright text size',
            'default' => 12,
            'min' => 10,
            'max' => 18,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_top',
            'type' => 'range',
            'label' => 'Section padding top',
            'default' => 64,
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_bottom',
            'type' => 'range',
            'label' => 'Section padding bottom',
            'default' => 32,
            'min' => 0,
            'max' => 200,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'logo_height_d',
            'type' => 'range',
            'label' => 'Logo height',
            'default' => 25,
            'min' => 12,
            'max' => 80,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'social_size',
            'type' => 'range',
            'label' => 'Social icon size',
            'default' => 33,
            'min' => 16,
            'max' => 64,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'cert_height',
            'type' => 'range',
            'label' => 'Certification badge height',
            'default' => 50,
            'min' => 24,
            'max' => 120,
            'step' => 1,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'footer-column',
            'social-link',
            'cert-badge',
            'legal-link',
        ),
        'min' => 0,
        'max' => 40,
    ),
    'block_types' => array(
        'footer-column' => array(
            'label' => 'Footer column',
            'settings' => array(
                array(
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Column title',
                    'default' => 'Solutions',
                ),
                array(
                    'id' => 'links',
                    'type' => 'textarea',
                    'label' => 'Links — Label|URL per line',
                    'default' => 'devOps as a service|#
Cloud Migration|#
GenAI Solutions|#
FinOps|#
Security|#',
                ),
            ),
        ),
        'social-link' => array(
            'label' => 'Social link',
            'settings' => array(
                array(
                    'id' => 'icon',
                    'type' => 'image',
                    'label' => 'Icon',
                    'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/social-linkedin.svg',
                ),
                array(
                    'id' => 'alt',
                    'type' => 'text',
                    'label' => 'Alt text',
                    'default' => 'LinkedIn',
                ),
                array(
                    'id' => 'url',
                    'type' => 'url',
                    'label' => 'URL',
                    'default' => '#',
                ),
            ),
        ),
        'cert-badge' => array(
            'label' => 'Certification badge',
            'settings' => array(
                array(
                    'id' => 'image',
                    'type' => 'image',
                    'label' => 'Badge image',
                    'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/iso27001.png',
                ),
                array(
                    'id' => 'alt',
                    'type' => 'text',
                    'label' => 'Alt text',
                    'default' => 'ISO 27001',
                ),
            ),
        ),
        'legal-link' => array(
            'label' => 'Legal link',
            'settings' => array(
                array(
                    'id' => 'text',
                    'type' => 'text',
                    'label' => 'Text',
                    'default' => 'Privacy Policy',
                ),
                array(
                    'id' => 'url',
                    'type' => 'url',
                    'label' => 'URL',
                    'default' => '#',
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'footer-column',
            'settings' => array(
                'title' => 'Solutions',
                'links' => 'devOps as a service|#
Cloud Migration|#
GenAI Solutions|#
FinOps|#
Security|#',
            ),
        ),
        array(
            'type' => 'footer-column',
            'settings' => array(
                'title' => 'Products',
                'links' => 'SavePro|#
Cloud Innovation Store|#
Support Portal|#
Resources|#
Partners|#',
            ),
        ),
        array(
            'type' => 'footer-column',
            'settings' => array(
                'title' => 'Company',
                'links' => 'About|#
Blog|#
Media and News|#
Careers|#
Contact|#',
            ),
        ),
        array(
            'type' => 'social-link',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/social-linkedin.svg',
                'alt' => 'LinkedIn',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'social-link',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/social-twitter.svg',
                'alt' => 'Twitter',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'social-link',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/social-fb.svg',
                'alt' => 'Facebook',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'social-link',
            'settings' => array(
                'icon' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/social-yt.svg',
                'alt' => 'YouTube',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'cert-badge',
            'settings' => array(
                'image' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/iso27001.png',
                'alt' => 'ISO 27001',
            ),
        ),
        array(
            'type' => 'cert-badge',
            'settings' => array(
                'image' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-footer/media/iso9001.png',
                'alt' => 'ISO 9001',
            ),
        ),
        array(
            'type' => 'legal-link',
            'settings' => array(
                'text' => 'Privacy Policy',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'legal-link',
            'settings' => array(
                'text' => 'Terms of Service',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'legal-link',
            'settings' => array(
                'text' => 'Cookie Policy',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'legal-link',
            'settings' => array(
                'text' => 'Code of Ethics',
                'url' => '#',
            ),
        ),
        array(
            'type' => 'legal-link',
            'settings' => array(
                'text' => 'Accessibility',
                'url' => '#',
            ),
        ),
    ),
);