<?php
defined( 'ABSPATH' ) || exit;

return array (
  'type' => 'sela-case1',
  'label' => 'Sela — Case Study (text left)',
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
      'default' => 'Real People.<br/>Real Business Outcomes.',
    ),
    2 => 
    array (
      'id' => 'desc',
      'type' => 'textarea',
      'label' => 'Description',
      'default' => 'GenAI adoption, cloud landing zones, GTM-ready marketplaces, and cost optimization tools — Sela delivers tailored cloud solutions that accelerate outcomes and enable scale.',
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
      'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-case1/media/case1-dashboard.png',
    ),
    6 => 
    array (
      'id' => 'image_alt',
      'type' => 'text',
      'label' => 'Image alt',
      'default' => 'Dashboard',
    ),
    7 => 
    array (
      'id' => 'image_cloud_1',
      'type' => 'image',
      'label' => 'Decorative cloud 1',
      'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-case1/media/cloud-outline-1.svg',
    ),
    8 => 
    array (
      'id' => 'image_cloud_2',
      'type' => 'image',
      'label' => 'Decorative cloud 2',
      'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-case1/media/cloud-outline-2.svg',
    ),
    9 => 
    array (
      'id' => 'show_clouds',
      'type' => 'checkbox',
      'label' => 'Show decorative clouds',
      'default' => 1,
    ),
    10 => 
    array (
      'tab' => 'style',
      'id' => 'bg_color',
      'type' => 'color',
      'label' => 'Section background',
      'default' => '#f9f9f9',
    ),
    11 => 
    array (
      'tab' => 'style',
      'id' => 'label_color',
      'type' => 'color',
      'label' => 'Label color',
      'default' => '#0071f6',
    ),
    12 => 
    array (
      'tab' => 'style',
      'id' => 'title_color',
      'type' => 'color',
      'label' => 'Title color',
      'default' => '#1c1c1c',
    ),
    13 => 
    array (
      'tab' => 'style',
      'id' => 'desc_color',
      'type' => 'color',
      'label' => 'Description color',
      'default' => '#717171',
    ),
    14 => 
    array (
      'tab' => 'style',
      'id' => 'cta_color',
      'type' => 'color',
      'label' => 'CTA color',
      'default' => '#1c1c1c',
    ),
    15 => 
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
    16 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_d',
      'type' => 'range',
      'label' => 'Title size — desktop (px)',
      'default' => 38,
      'min' => 16,
      'max' => 80,
    ),
    17 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_m',
      'type' => 'range',
      'label' => 'Title size — mobile (px)',
      'default' => 26,
      'min' => 14,
      'max' => 60,
    ),
    18 => 
    array (
      'tab' => 'style',
      'id' => 'fz_desc_d',
      'type' => 'range',
      'label' => 'Desc size — desktop (px)',
      'default' => 17,
      'min' => 12,
      'max' => 28,
    ),
    19 => 
    array (
      'tab' => 'style',
      'id' => 'fz_desc_m',
      'type' => 'range',
      'label' => 'Desc size — mobile (px)',
      'default' => 14,
      'min' => 11,
      'max' => 22,
    ),
    20 => 
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
