<?php
defined( 'ABSPATH' ) || exit;

return array (
  'type' => 'sela-stats',
  'label' => 'Sela — Stats Counters',
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
      'type' => 'text',
      'label' => 'Section title',
      'default' => 'Fueling Tech Growth',
    ),
    1 => 
    array (
      'id' => 'image_badge',
      'type' => 'image',
      'label' => 'Side badge image',
      'default' => 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-stats/media/stats-badge.png',
    ),
    2 => 
    array (
      'id' => 'show_badge',
      'type' => 'checkbox',
      'label' => 'Show side badge',
      'default' => 1,
    ),
    3 => 
    array (
      'id' => 'stat_1_target',
      'type' => 'number',
      'label' => 'Stat 1 — target',
      'default' => 400,
      'min' => 0,
    ),
    4 => 
    array (
      'id' => 'stat_1_label',
      'type' => 'text',
      'label' => 'Stat 1 — label',
      'default' => 'Expert engineers',
    ),
    5 => 
    array (
      'id' => 'stat_1_unit',
      'type' => 'text',
      'label' => 'Stat 1 — unit suffix',
      'default' => '',
    ),
    6 => 
    array (
      'id' => 'stat_1_plus',
      'type' => 'checkbox',
      'label' => 'Stat 1 — show + symbol',
      'default' => 1,
    ),
    7 => 
    array (
      'tab' => 'style',
      'id' => 'stat_1_sep_color',
      'type' => 'color',
      'label' => 'Stat 1 — separator dot',
      'default' => '#00dbe9',
    ),
    8 => 
    array (
      'id' => 'stat_2_target',
      'type' => 'number',
      'label' => 'Stat 2 — target',
      'default' => 9,
      'min' => 0,
    ),
    9 => 
    array (
      'id' => 'stat_2_label',
      'type' => 'text',
      'label' => 'Stat 2 — label',
      'default' => 'Response time',
    ),
    10 => 
    array (
      'id' => 'stat_2_unit',
      'type' => 'text',
      'label' => 'Stat 2 — unit suffix',
      'default' => 'Min',
    ),
    11 => 
    array (
      'id' => 'stat_2_plus',
      'type' => 'checkbox',
      'label' => 'Stat 2 — show + symbol',
      'default' => 0,
    ),
    12 => 
    array (
      'tab' => 'style',
      'id' => 'stat_2_sep_color',
      'type' => 'color',
      'label' => 'Stat 2 — separator dot',
      'default' => '#00dd95',
    ),
    13 => 
    array (
      'id' => 'stat_3_target',
      'type' => 'number',
      'label' => 'Stat 3 — target',
      'default' => 24,
      'min' => 0,
    ),
    14 => 
    array (
      'id' => 'stat_3_label',
      'type' => 'text',
      'label' => 'Stat 3 — label',
      'default' => 'Hours Resolution Time',
    ),
    15 => 
    array (
      'id' => 'stat_3_unit',
      'type' => 'text',
      'label' => 'Stat 3 — unit suffix',
      'default' => '',
    ),
    16 => 
    array (
      'id' => 'stat_3_plus',
      'type' => 'checkbox',
      'label' => 'Stat 3 — show + symbol',
      'default' => 0,
    ),
    17 => 
    array (
      'tab' => 'style',
      'id' => 'stat_3_sep_color',
      'type' => 'color',
      'label' => 'Stat 3 — separator dot',
      'default' => '#f191a1',
    ),
    18 => 
    array (
      'id' => 'stat_4_target',
      'type' => 'number',
      'label' => 'Stat 4 — target',
      'default' => 30,
      'min' => 0,
    ),
    19 => 
    array (
      'id' => 'stat_4_label',
      'type' => 'text',
      'label' => 'Stat 4 — label',
      'default' => 'Cloud cost savings',
    ),
    20 => 
    array (
      'id' => 'stat_4_unit',
      'type' => 'text',
      'label' => 'Stat 4 — unit suffix',
      'default' => '%',
    ),
    21 => 
    array (
      'id' => 'stat_4_plus',
      'type' => 'checkbox',
      'label' => 'Stat 4 — show + symbol',
      'default' => 0,
    ),
    22 => 
    array (
      'tab' => 'style',
      'id' => 'stat_4_sep_color',
      'type' => 'color',
      'label' => 'Stat 4 — separator dot',
      'default' => '#0071f6',
    ),
    23 => 
    array (
      'tab' => 'style',
      'id' => 'bg_color',
      'type' => 'color',
      'label' => 'Section background',
      'default' => '#1c1c1c',
    ),
    24 => 
    array (
      'tab' => 'style',
      'id' => 'text_color',
      'type' => 'color',
      'label' => 'Text color',
      'default' => '#ffffff',
    ),
    25 => 
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
    26 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_d',
      'type' => 'range',
      'label' => 'Title size — desktop (px)',
      'default' => 38,
      'min' => 16,
      'max' => 80,
    ),
    27 => 
    array (
      'tab' => 'style',
      'id' => 'fz_title_m',
      'type' => 'range',
      'label' => 'Title size — mobile (px)',
      'default' => 26,
      'min' => 14,
      'max' => 60,
    ),
    28 => 
    array (
      'tab' => 'style',
      'id' => 'fz_num_d',
      'type' => 'range',
      'label' => 'Counter size — desktop (px)',
      'default' => 80,
      'min' => 30,
      'max' => 160,
    ),
    29 => 
    array (
      'tab' => 'style',
      'id' => 'fz_num_m',
      'type' => 'range',
      'label' => 'Counter size — mobile (px)',
      'default' => 48,
      'min' => 24,
      'max' => 100,
    ),
    30 => 
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
    31 => 
    array (
      'tab' => 'style',
      'id' => 'pad_y',
      'type' => 'range',
      'label' => 'Section padding-y (px)',
      'default' => 80,
      'min' => 20,
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
