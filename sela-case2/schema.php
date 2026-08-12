<?php
defined( 'ABSPATH' ) || exit;

return array (
  'type' => 'sela-case2',
  'label' => 'Sela — Case Study (image left)',
  'category' => 'content',
  'contexts' => 
  array (
    0 => 'page',
  ),
  'settings' => 
  array (
    0 => 
    array (
      'id' => 'label',
      'type' => 'text',
      'label' => 'Label',
      'default' => 'our Solution',
    ),
    1 => 
    array (
      'id' => 'title',
      'type' => 'textarea',
      'label' => 'Title',
      'default' => 'Solving What<br/>Matters Most.',
    ),
    2 => 
    array (
      'id' => 'desc',
      'type' => 'textarea',
      'label' => 'Description',
      'default' => 'Whether you\'re pushing a release or scaling overnight, our global 24/7 support team — spread across time zones — is always on, with super-fast response times and zero drama. Open tickets easily through our user-friendly support portal, and get the help you need, when you need it.',
    ),
    3 => 
    array (
      'id' => 'cta_text',
      'type' => 'text',
      'label' => 'CTA text',
      'default' => 'Learn More >',
    ),
    4 => 
    array (
      'id' => 'cta_link',
      'type' => 'url',
      'label' => 'CTA link',
      'default' => '#',
    ),
    5 => 
    array (
      'id' => 'image',
      'type' => 'image',
      'label' => 'Image',
      'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-case2/media/case2-photo.jpg',
    ),
    6 => 
    array (
      'id' => 'image_alt',
      'type' => 'text',
      'label' => 'Image alt',
      'default' => 'Solution',
    ),
    7 => 
    array (
      'tab' => 'style',
      'id' => 'bg_color',
      'type' => 'color',
      'label' => 'Section background',
      'default' => '#ffffff',
    ),
    8 => 
    array (
      'tab' => 'style',
      'id' => 'label_color',
      'type' => 'color',
      'label' => 'Label color',
      'default' => '#0071f6',
    ),
    9 => 
    array (
      'tab' => 'style',
      'id' => 'title_color',
      'type' => 'color',
      'label' => 'Title color',
      'default' => '#1c1c1c',
    ),
    10 => 
    array (
      'tab' => 'style',
      'id' => 'desc_color',
      'type' => 'color',
      'label' => 'Description color',
      'default' => '#717171',
    ),
    11 => 
    array (
      'tab' => 'style',
      'id' => 'cta_color',
      'type' => 'color',
      'label' => 'CTA color',
      'default' => '#1c1c1c',
    ),
    12 => 
    array (
      'tab' => 'style',
      'id' => 'ff',
      'type' => 'select',
      'label' => 'Font',
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
      ),
    ),
    13 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_d',
      'type' => 'range',
      'label' => 'Title size — desktop (px)',
      'default' => 38,
      'min' => 16,
      'max' => 80,
    ),
    14 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_m',
      'type' => 'range',
      'label' => 'Title size — mobile (px)',
      'default' => 26,
      'min' => 14,
      'max' => 60,
    ),
    15 => 
    array (
      'tab' => 'style',
      'id' => 'fz_desc_d',
      'type' => 'range',
      'label' => 'Desc size — desktop (px)',
      'default' => 17,
      'min' => 12,
      'max' => 28,
    ),
    16 => 
    array (
      'tab' => 'style',
      'id' => 'fz_desc_m',
      'type' => 'range',
      'label' => 'Desc size — mobile (px)',
      'default' => 14,
      'min' => 11,
      'max' => 22,
    ),
    17 => 
    array (
      'tab' => 'style',
      'id' => 'pad_y',
      'type' => 'range',
      'label' => 'Section padding-y (px)',
      'default' => 80,
      'min' => 0,
      'max' => 200,
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