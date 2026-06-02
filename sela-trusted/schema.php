<?php
defined( 'ABSPATH' ) || exit;

return array (
  'type' => 'sela-trusted',
  'label' => 'Sela — Trusted By',
  'category' => 'content',
  'contexts' => 
  array (
    0 => 'page',
  ),
  'settings' => 
  array (
    0 => 
    array (
      'id' => 'headline',
      'type' => 'text',
      'label' => 'Headline',
      'default' => 'Trusted by more than 1,000 leading tech companies',
    ),
    1 => 
    array (
      'id' => 'logo_1',
      'type' => 'image',
      'label' => 'Logo 1',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner1.png',
    ),
    2 => 
    array (
      'id' => 'logo_2',
      'type' => 'image',
      'label' => 'Logo 2',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner2.png',
    ),
    3 => 
    array (
      'id' => 'logo_3',
      'type' => 'image',
      'label' => 'Logo 3',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner3.png',
    ),
    4 => 
    array (
      'id' => 'logo_4',
      'type' => 'image',
      'label' => 'Logo 4',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner4.png',
    ),
    5 => 
    array (
      'id' => 'logo_5',
      'type' => 'image',
      'label' => 'Logo 5',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner5.png',
    ),
    6 => 
    array (
      'id' => 'logo_6',
      'type' => 'image',
      'label' => 'Logo 6',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner6.png',
    ),
    7 => 
    array (
      'id' => 'logo_7',
      'type' => 'image',
      'label' => 'Logo 7',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner7.png',
    ),
    8 => 
    array (
      'id' => 'logo_8',
      'type' => 'image',
      'label' => 'Logo 8',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/logo-partner8.png',
    ),
    9 => 
    array (
      'id' => 'badge_aws',
      'type' => 'image',
      'label' => 'Badge — AWS',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/badge-aws.png',
    ),
    10 => 
    array (
      'id' => 'badge_aws_alt',
      'type' => 'text',
      'label' => 'Badge — AWS alt',
      'default' => 'aws.png',
    ),
    11 => 
    array (
      'id' => 'badge_google',
      'type' => 'image',
      'label' => 'Badge — Google',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/badge-google.png',
    ),
    12 => 
    array (
      'id' => 'badge_google_alt',
      'type' => 'text',
      'label' => 'Badge — Google alt',
      'default' => 'google.png',
    ),
    13 => 
    array (
      'id' => 'badge_azure',
      'type' => 'image',
      'label' => 'Badge — Azure',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-trusted/media/badge-azure.png',
    ),
    14 => 
    array (
      'id' => 'badge_azure_alt',
      'type' => 'text',
      'label' => 'Badge — Azure alt',
      'default' => 'azure.png',
    ),
    15 => 
    array (
      'tab' => 'style',
      'id' => 'bg_color',
      'type' => 'color',
      'label' => 'Section background',
      'default' => '#ffffff',
    ),
    16 => 
    array (
      'tab' => 'style',
      'id' => 'headline_color',
      'type' => 'color',
      'label' => 'Headline color',
      'default' => '#1c1c1c',
    ),
    17 => 
    array (
      'tab' => 'style',
      'id' => 'ff_headline',
      'type' => 'select',
      'label' => 'Headline font',
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
          'value' => 'system-ui, sans-serif',
          'label' => 'System UI',
        ),
      ),
    ),
    18 => 
    array (
      'tab' => 'style',
      'id' => 'fz_headline_d',
      'type' => 'range',
      'label' => 'Headline size — desktop (px)',
      'default' => 20,
      'min' => 14,
      'max' => 36,
      'step' => 1,
    ),
    19 => 
    array (
      'tab' => 'style',
      'id' => 'fz_headline_m',
      'type' => 'range',
      'label' => 'Headline size — mobile (px)',
      'default' => 17,
      'min' => 12,
      'max' => 28,
      'step' => 1,
    ),
    20 => 
    array (
      'tab' => 'style',
      'id' => 'fw_headline',
      'type' => 'select',
      'label' => 'Headline weight',
      'default' => '300',
      'options' => 
      array (
        0 => 
        array (
          'value' => '300',
          'label' => 'Light',
        ),
        1 => 
        array (
          'value' => '400',
          'label' => 'Regular',
        ),
        2 => 
        array (
          'value' => '500',
          'label' => 'Medium',
        ),
        3 => 
        array (
          'value' => '600',
          'label' => 'Semi Bold',
        ),
        4 => 
        array (
          'value' => '700',
          'label' => 'Bold',
        ),
      ),
    ),
    21 => 
    array (
      'tab' => 'style',
      'id' => 'lh_headline',
      'type' => 'range',
      'label' => 'Headline line-height (×100)',
      'default' => 132,
      'min' => 80,
      'max' => 200,
      'step' => 1,
    ),
    22 => 
    array (
      'tab' => 'style',
      'id' => 'logo_height_d',
      'type' => 'range',
      'label' => 'Logo row height — desktop (px)',
      'default' => 27,
      'min' => 12,
      'max' => 80,
      'step' => 1,
    ),
    23 => 
    array (
      'tab' => 'style',
      'id' => 'logo_height_m',
      'type' => 'range',
      'label' => 'Logo row height — mobile (px)',
      'default' => 20,
      'min' => 10,
      'max' => 60,
      'step' => 1,
    ),
    24 => 
    array (
      'tab' => 'style',
      'id' => 'badge_height_d',
      'type' => 'range',
      'label' => 'Badge height — desktop (px)',
      'default' => 107,
      'min' => 60,
      'max' => 200,
      'step' => 1,
    ),
    25 => 
    array (
      'tab' => 'style',
      'id' => 'badge_height_m',
      'type' => 'range',
      'label' => 'Badge height — mobile (px)',
      'default' => 44,
      'min' => 30,
      'max' => 100,
      'step' => 1,
    ),
    26 => 
    array (
      'tab' => 'style',
      'id' => 'pad_y_d',
      'type' => 'range',
      'label' => 'Section padding-y — desktop (px)',
      'default' => 60,
      'min' => 0,
      'max' => 200,
      'step' => 1,
    ),
    27 => 
    array (
      'tab' => 'style',
      'id' => 'pad_y_m',
      'type' => 'range',
      'label' => 'Section padding-y — mobile (px)',
      'default' => 40,
      'min' => 0,
      'max' => 120,
      'step' => 1,
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
