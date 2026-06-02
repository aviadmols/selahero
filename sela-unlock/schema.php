<?php
defined( 'ABSPATH' ) || exit;

return array (
  'type' => 'sela-unlock',
  'label' => 'Sela — Contact Form',
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
      'default' => 'Unlock Your Cloud\'s Full Potential with Sela',
    ),
    1 => 
    array (
      'id' => 'subtitle',
      'type' => 'textarea',
      'label' => 'Subtitle',
      'default' => 'don\'t let the complexities of cloud adoption hold you back. Partner with Sela to',
    ),
    2 => 
    array (
      'id' => 'placeholder_first',
      'type' => 'text',
      'label' => 'Placeholder — first name',
      'default' => 'First Name*',
    ),
    3 => 
    array (
      'id' => 'placeholder_last',
      'type' => 'text',
      'label' => 'Placeholder — last name',
      'default' => 'Last Name*',
    ),
    4 => 
    array (
      'id' => 'placeholder_email',
      'type' => 'text',
      'label' => 'Placeholder — email',
      'default' => 'Business Email*',
    ),
    5 => 
    array (
      'id' => 'placeholder_company',
      'type' => 'text',
      'label' => 'Placeholder — company',
      'default' => 'Company*',
    ),
    6 => 
    array (
      'id' => 'placeholder_phone',
      'type' => 'text',
      'label' => 'Placeholder — phone',
      'default' => 'Phone Number*',
    ),
    7 => 
    array (
      'id' => 'submit_text',
      'type' => 'text',
      'label' => 'Submit button text',
      'default' => 'Get Started Now',
    ),
    8 => 
    array (
      'id' => 'form_action',
      'type' => 'url',
      'label' => 'Form submit URL',
      'default' => '#',
    ),
    9 => 
    array (
      'id' => 'privacy',
      'type' => 'textarea',
      'label' => 'Privacy line (HTML allowed)',
      'default' => '*By submitting this form, I agree to Sela\'s <a href="#">Privacy Policy</a>.',
    ),
    10 => 
    array (
      'id' => 'show_dots',
      'type' => 'checkbox',
      'label' => 'Show colored dots above title',
      'default' => 1,
    ),
    11 => 
    array (
      'tab' => 'style',
      'id' => 'bg_color',
      'type' => 'color',
      'label' => 'Section background',
      'default' => '#ffffff',
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
      'id' => 'sub_color',
      'type' => 'color',
      'label' => 'Subtitle color',
      'default' => '#1c1c1c',
    ),
    14 => 
    array (
      'tab' => 'style',
      'id' => 'btn_bg',
      'type' => 'color',
      'label' => 'Button background',
      'default' => '#00dbe9',
    ),
    15 => 
    array (
      'tab' => 'style',
      'id' => 'btn_color',
      'type' => 'color',
      'label' => 'Button text color',
      'default' => '#1c1c1c',
    ),
    16 => 
    array (
      'tab' => 'style',
      'id' => 'input_border',
      'type' => 'color',
      'label' => 'Input border',
      'default' => '#e5e5e5',
    ),
    17 => 
    array (
      'tab' => 'style',
      'id' => 'dot_1',
      'type' => 'color',
      'label' => 'Dot 1 color',
      'default' => '#3dba7e',
    ),
    18 => 
    array (
      'tab' => 'style',
      'id' => 'dot_2',
      'type' => 'color',
      'label' => 'Dot 2 color',
      'default' => '#f191a1',
    ),
    19 => 
    array (
      'tab' => 'style',
      'id' => 'dot_3',
      'type' => 'color',
      'label' => 'Dot 3 color',
      'default' => '#00dbe9',
    ),
    20 => 
    array (
      'tab' => 'style',
      'id' => 'dot_4',
      'type' => 'color',
      'label' => 'Dot 4 color',
      'default' => '#0071f6',
    ),
    21 => 
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
    22 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_d',
      'type' => 'range',
      'label' => 'Title size — desktop (px)',
      'default' => 45,
      'min' => 16,
      'max' => 80,
    ),
    23 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_m',
      'type' => 'range',
      'label' => 'Title size — mobile (px)',
      'default' => 28,
      'min' => 14,
      'max' => 60,
    ),
    24 => 
    array (
      'tab' => 'style',
      'id' => 'fz_sub_d',
      'type' => 'range',
      'label' => 'Subtitle size — desktop (px)',
      'default' => 25,
      'min' => 14,
      'max' => 36,
    ),
    25 => 
    array (
      'tab' => 'style',
      'id' => 'pad_y',
      'type' => 'range',
      'label' => 'Section padding-y (px)',
      'default' => 100,
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
