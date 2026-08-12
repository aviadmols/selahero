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
      'id' => 'lottie_desktop',
      'type' => 'url',
      'label' => 'Lottie background — desktop (JSON URL)',
      'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-hero/media/lottie-desktop.json',
    ),
    5 => 
    array (
      'id' => 'lottie_mobile',
      'type' => 'url',
      'label' => 'Lottie background — mobile (JSON URL)',
      'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-hero/media/lottie-mobile.json',
    ),
    6 => 
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
      'label' => 'Section background (fallback)',
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
  ),
  'blocks' => 
  array (
    'allowed' => 
    array (
    ),
    'max' => 0,
  ),
);
