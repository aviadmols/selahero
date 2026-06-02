<?php
defined( 'ABSPATH' ) || exit;

return array (
  'type' => 'sela-hero',
  'label' => 'Sela Hero',
  'category' => 'content',
  'contexts' => 
  array (
    0 => 'page',
  ),
  'settings' => 
  array (
    0 => 
    array (
      'id' => 'title',
      'type' => 'textarea',
      'label' => 'Title',
      'default' => 'Cloud services and AI solutions for startups & SaaS companies',
    ),
    1 => 
    array (
      'id' => 'subtitle',
      'type' => 'textarea',
      'label' => 'Subtitle',
      'default' => 'As a top-tier partner of AWS, Microsoft Azure, and Google Cloud, Sela optimizes cloud spend, accelerates development, and boosts growth.',
    ),
    2 => 
    array (
      'id' => 'cta_text',
      'type' => 'text',
      'label' => 'CTA text',
      'default' => 'Get Started',
    ),
    3 => 
    array (
      'id' => 'cta_link',
      'type' => 'url',
      'label' => 'CTA link',
      'default' => '#',
    ),
    4 => 
    array (
      'tab' => 'style',
      'id' => 'ff_title',
      'type' => 'select',
      'label' => 'Title font',
      'default' => '\'Lexend\', sans-serif',
      'options' => 
      array (
        0 => 
        array (
          'value' => '\'Lexend\', sans-serif',
          'label' => 'Lexend',
        ),
        1 => 
        array (
          'value' => '\'Inter\', sans-serif',
          'label' => 'Inter',
        ),
        2 => 
        array (
          'value' => '\'Roboto\', sans-serif',
          'label' => 'Roboto',
        ),
        3 => 
        array (
          'value' => '\'Open Sans\', sans-serif',
          'label' => 'Open Sans',
        ),
        4 => 
        array (
          'value' => '\'Poppins\', sans-serif',
          'label' => 'Poppins',
        ),
        5 => 
        array (
          'value' => 'system-ui, sans-serif',
          'label' => 'System UI',
        ),
      ),
    ),
    5 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_d',
      'type' => 'range',
      'label' => 'Title size — desktop (px)',
      'default' => 52,
      'min' => 16,
      'max' => 120,
      'step' => 1,
    ),
    6 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_m',
      'type' => 'range',
      'label' => 'Title size — mobile (px)',
      'default' => 30,
      'min' => 14,
      'max' => 80,
      'step' => 1,
    ),
    7 => 
    array (
      'tab' => 'style',
      'id' => 'fw_title',
      'type' => 'select',
      'label' => 'Title weight',
      'default' => '300',
      'options' => 
      array (
        0 => 
        array (
          'value' => '200',
          'label' => 'Extra Light',
        ),
        1 => 
        array (
          'value' => '300',
          'label' => 'Light',
        ),
        2 => 
        array (
          'value' => '400',
          'label' => 'Regular',
        ),
        3 => 
        array (
          'value' => '500',
          'label' => 'Medium',
        ),
        4 => 
        array (
          'value' => '600',
          'label' => 'Semi Bold',
        ),
        5 => 
        array (
          'value' => '700',
          'label' => 'Bold',
        ),
      ),
    ),
    8 => 
    array (
      'tab' => 'style',
      'id' => 'lh_title',
      'type' => 'range',
      'label' => 'Title line-height (×100)',
      'default' => 111,
      'min' => 80,
      'max' => 250,
      'step' => 1,
    ),
    9 => 
    array (
      'tab' => 'style',
      'id' => 'ls_title',
      'type' => 'range',
      'label' => 'Title letter-spacing (px)',
      'default' => 0,
      'min' => -3,
      'max' => 5,
      'step' => 1,
    ),
    10 => 
    array (
      'tab' => 'style',
      'id' => 'ff_sub',
      'type' => 'select',
      'label' => 'Subtitle font',
      'default' => '\'Lexend\', sans-serif',
      'options' => 
      array (
        0 => 
        array (
          'value' => '\'Lexend\', sans-serif',
          'label' => 'Lexend',
        ),
        1 => 
        array (
          'value' => '\'Inter\', sans-serif',
          'label' => 'Inter',
        ),
        2 => 
        array (
          'value' => '\'Roboto\', sans-serif',
          'label' => 'Roboto',
        ),
        3 => 
        array (
          'value' => '\'Open Sans\', sans-serif',
          'label' => 'Open Sans',
        ),
        4 => 
        array (
          'value' => '\'Poppins\', sans-serif',
          'label' => 'Poppins',
        ),
        5 => 
        array (
          'value' => 'system-ui, sans-serif',
          'label' => 'System UI',
        ),
      ),
    ),
    11 => 
    array (
      'tab' => 'style',
      'id' => 'fz_sub_d',
      'type' => 'range',
      'label' => 'Subtitle size — desktop (px)',
      'default' => 16,
      'min' => 12,
      'max' => 32,
      'step' => 1,
    ),
    12 => 
    array (
      'tab' => 'style',
      'id' => 'fz_sub_m',
      'type' => 'range',
      'label' => 'Subtitle size — mobile (px)',
      'default' => 14,
      'min' => 12,
      'max' => 24,
      'step' => 1,
    ),
    13 => 
    array (
      'tab' => 'style',
      'id' => 'fw_sub',
      'type' => 'select',
      'label' => 'Subtitle weight',
      'default' => '300',
      'options' => 
      array (
        0 => 
        array (
          'value' => '200',
          'label' => 'Extra Light',
        ),
        1 => 
        array (
          'value' => '300',
          'label' => 'Light',
        ),
        2 => 
        array (
          'value' => '400',
          'label' => 'Regular',
        ),
        3 => 
        array (
          'value' => '500',
          'label' => 'Medium',
        ),
        4 => 
        array (
          'value' => '600',
          'label' => 'Semi Bold',
        ),
        5 => 
        array (
          'value' => '700',
          'label' => 'Bold',
        ),
      ),
    ),
    14 => 
    array (
      'tab' => 'style',
      'id' => 'lh_sub',
      'type' => 'range',
      'label' => 'Subtitle line-height (×100)',
      'default' => 158,
      'min' => 80,
      'max' => 250,
      'step' => 1,
    ),
    15 => 
    array (
      'tab' => 'style',
      'id' => 'bg_section',
      'type' => 'color',
      'label' => 'Section background',
      'default' => '#f9f9f9',
    ),
    16 => 
    array (
      'tab' => 'style',
      'id' => 'color_title',
      'type' => 'color',
      'label' => 'Title color',
      'default' => '#1c1c1c',
    ),
    17 => 
    array (
      'tab' => 'style',
      'id' => 'color_sub',
      'type' => 'color',
      'label' => 'Subtitle color',
      'default' => '#585858',
    ),
    18 => 
    array (
      'tab' => 'style',
      'id' => 'color_btn',
      'type' => 'color',
      'label' => 'Button color',
      'default' => '#1c1c1c',
    ),
    19 => 
    array (
      'tab' => 'style',
      'id' => 'orb_cyan_color',
      'type' => 'color',
      'label' => 'Orb — cyan',
      'default' => '#00dbe9',
    ),
    20 => 
    array (
      'tab' => 'style',
      'id' => 'orb_green_color',
      'type' => 'color',
      'label' => 'Orb — green',
      'default' => '#00dd95',
    ),
    21 => 
    array (
      'tab' => 'style',
      'id' => 'orb_blue_color',
      'type' => 'color',
      'label' => 'Orb — blue',
      'default' => '#0071f6',
    ),
    22 => 
    array (
      'tab' => 'style',
      'id' => 'orb_pink_color',
      'type' => 'color',
      'label' => 'Orb — pink',
      'default' => '#f191a1',
    ),
    23 => 
    array (
      'id' => 'show_orb_cyan',
      'type' => 'checkbox',
      'label' => 'Show cyan orb',
      'default' => 1,
    ),
    24 => 
    array (
      'id' => 'show_orb_green',
      'type' => 'checkbox',
      'label' => 'Show green orb',
      'default' => 1,
    ),
    25 => 
    array (
      'id' => 'show_orb_blue',
      'type' => 'checkbox',
      'label' => 'Show blue orb',
      'default' => 1,
    ),
    26 => 
    array (
      'id' => 'show_orb_pink',
      'type' => 'checkbox',
      'label' => 'Show pink orb',
      'default' => 1,
    ),
    27 => 
    array (
      'id' => 'show_robot',
      'type' => 'checkbox',
      'label' => 'Show robot mascot',
      'default' => 1,
    ),
    28 => 
    array (
      'id' => 'show_stars',
      'type' => 'checkbox',
      'label' => 'Show star decorations',
      'default' => 1,
    ),
    29 => 
    array (
      'id' => 'show_clouds',
      'type' => 'checkbox',
      'label' => 'Show cloud decorations',
      'default' => 1,
    ),
    30 => 
    array (
      'id' => 'image_robot',
      'type' => 'image',
      'label' => 'Robot mascot image',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/hero-graphic.png',
    ),
    31 => 
    array (
      'id' => 'image_star',
      'type' => 'image',
      'label' => 'Star image',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/star.gif',
    ),
    32 => 
    array (
      'id' => 'image_orb_cyan',
      'type' => 'image',
      'label' => 'Orb ellipse — cyan',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/ellipse-cyan.svg',
    ),
    33 => 
    array (
      'id' => 'image_orb_green',
      'type' => 'image',
      'label' => 'Orb ellipse — green',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/ellipse-green.svg',
    ),
    34 => 
    array (
      'id' => 'image_orb_blue',
      'type' => 'image',
      'label' => 'Orb ellipse — blue',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/ellipse-blue.svg',
    ),
    35 => 
    array (
      'id' => 'image_orb_pink',
      'type' => 'image',
      'label' => 'Orb ellipse — pink',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/ellipse-pink.svg',
    ),
    36 => 
    array (
      'id' => 'image_cloud_1',
      'type' => 'image',
      'label' => 'Cloud 1 (left, top)',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/cloud-hero-1.svg',
    ),
    37 => 
    array (
      'id' => 'image_cloud_2',
      'type' => 'image',
      'label' => 'Cloud 2 (left, mid)',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/cloud-hero-2.svg',
    ),
    38 => 
    array (
      'id' => 'image_cloud_3',
      'type' => 'image',
      'label' => 'Cloud 3 (left, bottom)',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/cloud-hero-1.svg',
    ),
    39 => 
    array (
      'id' => 'image_cloud_4',
      'type' => 'image',
      'label' => 'Cloud 4 (right, decorative)',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/cloud-hero-2.svg',
    ),
    40 => 
    array (
      'id' => 'image_cloud_5',
      'type' => 'image',
      'label' => 'Cloud 5 (right, bottom)',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/cloud-hero-1.svg',
    ),
    41 => 
    array (
      'id' => 'image_cloud_6',
      'type' => 'image',
      'label' => 'Cloud 6 (right, mid)',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-hero/media/cloud-hero-2.svg',
    ),
  ),
  'blocks' => 
  array (
    'allowed' => 
    array (
    ),
    'max' => 0,
  ),
);
