
<?php
defined('ABSPATH') || exit;

$title = (string)($settings['title'] ?? 'Cloud providers give you a powerful<br>engine for your growth.');
$subtitle = (string)($settings['subtitle'] ?? 'Partnering with Sela provides ongoing technical and commercial add-ons to that engine, maximizing its performance while reducing costs – So you can grow faster and more efficiently.');

$experts_title = (string)($settings['experts_title'] ?? 'Our tech experts,<br>your scale.');
$experts_desc = (string)($settings['experts_desc'] ?? 'With a deep bench of multi-cloud engineering talent, Sela delivers hands-on, end-to-end expertise that drives real business outcomes so you can grow, scale, and win.');

$source = (string)($section['source'] ?? '');
$type = (string)($section['type'] ?? 'sela-engine');
$media_base = '';

if ($source === 'uploads') {
    $upload_dir = wp_upload_dir();
    $media_base = trailingslashit($upload_dir['baseurl']) . 'hero/sections/' . sanitize_key($type) . '/media/';
}

$get_img = function (string $key, string $fallback) use ($settings, $media_base): string {
    $value = (string)($settings[$key] ?? '');

    if ($value !== '') {
        return esc_url($value);
    }

    if ($media_base !== '') {
        return esc_url($media_base . ltrim($fallback, '/'));
    }

    return '';
};

$get_media = function (string $fallback) use ($media_base): string {
    if ($media_base !== '') {
        return esc_url($media_base . ltrim($fallback, '/'));
    }

    return esc_url('https://selacloud.com/wp-content/uploads/hero/sections/sela-engine/media/' . ltrim($fallback, '/'));
};

$get_experts_img = function (string $key, string $fallback) use ($settings): string {
    $value = (string)($settings[$key] ?? '');

    if ($value !== '') {
        return esc_url($value);
    }

    return esc_url('https://selacloud.com/wp-content/uploads/hero/sections/sela-experts/media/' . ltrim($fallback, '/'));
};

$parse_items = function (string $raw): array {
    $items = array();

    foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
        $line = trim($line);

        if ($line === '') {
            continue;
        }

        $items[] = $line;
    }

    return $items;
};

$title_tag = function_exists('hero_pick_tag')
    ? hero_pick_tag((string)($settings['title_tag'] ?? 'auto'), 'h2')
    : 'h2';

$left_column = null;
$right_column = null;
$cards = array();
$experts_chips = array();

foreach (($blocks ?? array()) as $block) {
    $block_type = (string)($block['type'] ?? '');
    $block_settings = (array)($block['settings'] ?? []);

    if ($block_type === 'engine-column') {
        $column = array(
            'side' => (string)($block_settings['side'] ?? 'left'),
            'icon' => (string)($block_settings['icon'] ?? ''),
            'icon_alt' => (string)($block_settings['icon_alt'] ?? ''),
            'title' => (string)($block_settings['title'] ?? ''),
            'items' => $parse_items((string)($block_settings['items'] ?? '')),
        );

        if ($column['side'] === 'right') {
            $right_column = $column;
        } else {
            $left_column = $column;
        }
    }

    if ($block_type === 'engine-card') {
        $cards[] = array(
            'type' => (string)($block_settings['type'] ?? 'text'),
            'text' => (string)($block_settings['text'] ?? ''),
            'image' => (string)($block_settings['image'] ?? ''),
            'image_alt' => (string)($block_settings['image_alt'] ?? ''),
            'style' => sanitize_html_class((string)($block_settings['style'] ?? 'pink')),
        );
    }

    if ($block_type === 'experts-chip') {
        $experts_chips[] = array(
            'text' => (string)($block_settings['text'] ?? ''),
            'icon' => (string)($block_settings['icon'] ?? ''),
            'icon_alt' => (string)($block_settings['icon_alt'] ?? ''),
            'color' => sanitize_html_class((string)($block_settings['color'] ?? 'green')),
        );
    }
}

if (!$left_column) {
    $left_column = array(
        'side' => 'left',
        'icon' => $get_media('engine-row-left.svg'),
        'icon_alt' => '',
        'title' => 'Commercial Add-ons',
        'items' => $parse_items('FinOps & cost optimization
Private Pricing Deal Structuring Assistance
Cloud vendor engagement & funds securing
GTM'),
    );
}

if (!$right_column) {
    $right_column = array(
        'side' => 'right',
        'icon' => $get_media('engine-right-icon.svg'),
        'icon_alt' => '',
        'title' => 'Technological Add-ons',
        'items' => $parse_items('Consulting & Professional Services
Architecture Best Practices
24/7 Multi-cloud Support Portal, 10 mins response time
Flexible expert certified teams
Staff augmentation'),
    );
}

if (empty($cards)) {
    $cards = array(
        array(
            'type' => 'text',
            'text' => 'Commercial Add-ons',
            'image' => '',
            'image_alt' => '',
            'style' => 'pink',
        ),
        array(
            'type' => 'text',
            'text' => 'Technological Add-ons',
            'image' => '',
            'image_alt' => '',
            'style' => 'blue',
        ),
        array(
            'type' => 'image',
            'text' => '',
            'image' => $get_media('engine-cloud-logos.svg'),
            'image_alt' => 'AWS, Google Cloud, Azure',
            'style' => 'cyan',
        ),
    );
}

if (empty($experts_chips)) {
    $experts_chips = array(
        array(
            'text' => 'Migrations & Modernizations',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'green',
        ),
        array(
            'text' => 'Data',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'cyan',
        ),
        array(
            'text' => 'GenAI',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'pink',
        ),
        array(
            'text' => 'Application Engineering',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'yellow',
        ),
        array(
            'text' => 'DevOps',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'blue-light',
        ),
        array(
            'text' => 'Security',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'gray',
        ),
    );
}

$wave_image = $get_img('wave_image', 'cloud-wave.svg');
$robot_image = $get_img('robot_image', 'engine-robot.png');
$experts_cloud_1 = $get_experts_img('experts_cloud_1', 'cloud-hero-1.svg');
$experts_cloud_2 = $get_experts_img('experts_cloud_2', 'cloud-hero-2.svg');
$experts_cloud_3 = $get_experts_img('experts_cloud_3', 'cloud-hero-1.svg');

$uid = 'slen-' . esc_attr($section['id'] ?? uniqid('sec', true));
?>

<style>
#<?php echo $uid; ?> {
    --engine-bg: <?php echo esc_attr($settings['bg_section'] ?? '#eef5ff'); ?>;
    --engine-title: <?php echo esc_attr($settings['title_color'] ?? '#1c1c1c'); ?>;
    --engine-text: <?php echo esc_attr($settings['text_color'] ?? '#686868'); ?>;
    --engine-card-bg: <?php echo esc_attr($settings['card_bg'] ?? '#ffffff'); ?>;
    --engine-card-border: <?php echo esc_attr($settings['card_border_color'] ?? '#1c1c1c'); ?>;
    --engine-ff: <?php echo esc_attr((string)($settings['ff_base'] ?? "'Lexend', sans-serif")); ?>;
    --engine-pad-y: <?php echo (int)($settings['pad_y_d'] ?? 100); ?>px;
    --engine-title-size: <?php echo (int)($settings['fz_title_d'] ?? 38); ?>px;
    --engine-sub-size: <?php echo (int)($settings['fz_sub_d'] ?? 18); ?>px;
}

#<?php echo $uid; ?> .chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

#<?php echo $uid; ?> .chip__icon {
    width: 20px;
    height: 20px;
    object-fit: contain;
    flex: 0 0 auto;
}

#<?php echo $uid; ?> .chip__text {
    display: inline-block;
}

@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --engine-pad-y: <?php echo (int)($settings['pad_y_m'] ?? 35); ?>px;
        --engine-title-size: <?php echo (int)($settings['fz_title_m'] ?? 28); ?>px;
        --engine-sub-size: <?php echo (int)($settings['fz_sub_m'] ?? 16); ?>px;
    }
}
</style>

<section class="engine" id="<?php echo $uid; ?>">
    <div class="engine__top-pin">
        <div class="engine__top">
            <div class="wrap">
                <<?php echo $title_tag; ?> class="engine__title"><?php echo wp_kses_post($title); ?></<?php echo $title_tag; ?>>

                <?php if ($subtitle !== '') : ?>
                    <p class="engine__sub"><?php echo wp_kses_post($subtitle); ?></p>
                <?php endif; ?>

                <div class="engine__layout">
                    <div class="engine__col engine__col--left">
                        <div>
                            <?php if (!empty($left_column['title'])) : ?>
                                <h3 class="engine__col-title"><?php echo esc_html($left_column['title']); ?></h3>
                            <?php endif; ?>

                            <?php if (!empty($left_column['items'])) : ?>
                                <ul class="engine__list">
                                    <?php foreach ($left_column['items'] as $item) : ?>
                                        <li><?php echo esc_html($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($left_column['icon'])) : ?>
                            <div class="engine__col-icon">
                                <img src="<?php echo esc_url($left_column['icon']); ?>" alt="<?php echo esc_attr($left_column['icon_alt']); ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="engine__center">
                        <?php foreach ($cards as $card) : ?>
                            <?php
                            $card_class = 'engine__card engine__card--' . sanitize_html_class($card['style']);

                            if ($card['type'] === 'image') {
                                $card_class .= ' engine__card--logos';
                            }
                            ?>

                            <div class="<?php echo esc_attr($card_class); ?>">
                                <?php if ($card['type'] === 'image' && !empty($card['image'])) : ?>
                                    <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['image_alt']); ?>">
                                <?php elseif (!empty($card['text'])) : ?>
                                    <span><?php echo esc_html($card['text']); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="engine__col engine__col--right">
                        <?php if (!empty($right_column['icon'])) : ?>
                            <div class="engine__col-icon">
                                <img src="<?php echo esc_url($right_column['icon']); ?>" alt="<?php echo esc_attr($right_column['icon_alt']); ?>">
                            </div>
                        <?php endif; ?>

                        <div>
                            <?php if (!empty($right_column['title'])) : ?>
                                <h3 class="engine__col-title"><?php echo esc_html($right_column['title']); ?></h3>
                            <?php endif; ?>

                            <?php if (!empty($right_column['items'])) : ?>
                                <ul class="engine__list">
                                    <?php foreach ($right_column['items'] as $item) : ?>
                                        <li><?php echo esc_html($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="engine__second">
        <?php if ($wave_image !== '') : ?>
            <img class="engine__wave" src="<?php echo esc_url($wave_image); ?>" alt="" aria-hidden="true">
        <?php endif; ?>

        <?php if ($robot_image !== '') : ?>
            <img class="engine__robot" src="<?php echo esc_url($robot_image); ?>" alt="" aria-hidden="true">
        <?php endif; ?>

        <div class="wrap">
            <div class="experts__inner">
                <div class="experts__left">
                    <?php if ($experts_title !== '') : ?>
                        <h3 class="experts__title"><?php echo wp_kses_post($experts_title); ?></h3>
                    <?php endif; ?>

                    <?php if ($experts_desc !== '') : ?>
                        <p class="experts__desc"><?php echo wp_kses_post($experts_desc); ?></p>
                    <?php endif; ?>
                </div>

                <div class="experts__chips-area">
                    <?php if ($experts_cloud_1 !== '') : ?>
                        <img class="experts__cloud experts__cloud--1" src="<?php echo esc_url($experts_cloud_1); ?>" alt="" aria-hidden="true">
                    <?php endif; ?>

                    <?php if ($experts_cloud_2 !== '') : ?>
                        <img class="experts__cloud experts__cloud--2" src="<?php echo esc_url($experts_cloud_2); ?>" alt="" aria-hidden="true">
                    <?php endif; ?>

                    <?php if ($experts_cloud_3 !== '') : ?>
                        <img class="experts__cloud experts__cloud--3" src="<?php echo esc_url($experts_cloud_3); ?>" alt="" aria-hidden="true">
                    <?php endif; ?>

                    <div class="experts__chips">
                        <?php foreach ($experts_chips as $chip) : ?>
                            <?php if (!empty($chip['text'])) : ?>
                                <span class="chip chip--<?php echo esc_attr($chip['color']); ?>">
                                    <?php if (!empty($chip['icon'])) : ?>
                                        <img class="chip__icon" src="<?php echo esc_url($chip['icon']); ?>" alt="<?php echo esc_attr($chip['icon_alt']); ?>">
                                    <?php endif; ?>

                                    <span class="chip__text"><?php echo esc_html($chip['text']); ?></span>
                                </span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    const section = document.getElementById('<?php echo esc_js($uid); ?>');

    if (!section) {
        return;
    }

    const chipsArea = section.querySelector('.experts__chips-area');
    const chips = Array.from(section.querySelectorAll('.experts__chips .chip'));

    if (!chipsArea || !chips.length) {
        return;
    }

    let mouseX = 0;
    let mouseY = 0;
    let targetMouseX = 0;
    let targetMouseY = 0;

    const chipStates = chips.map(function(chip) {
        return {
            chip: chip,
            phaseX: Math.random() * Math.PI * 2,
            phaseY: Math.random() * Math.PI * 2,
            phaseRotate: Math.random() * Math.PI * 2,
            speedX: 0.00055 + Math.random() * 0.00035,
            speedY: 0.00045 + Math.random() * 0.00035,
            speedRotate: 0.00035 + Math.random() * 0.00025,
            amplitudeX: 3 + Math.random() * 4,
            amplitudeY: 4 + Math.random() * 5,
            rotateAmount: 0.35 + Math.random() * 0.55,
            mouseStrengthX: 2.5 + Math.random() * 2.5,
            mouseStrengthY: 2 + Math.random() * 2.5
        };
    });

    chipsArea.addEventListener('mousemove', function(event) {
        const rect = chipsArea.getBoundingClientRect();
        targetMouseX = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
        targetMouseY = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
    });

    chipsArea.addEventListener('mouseleave', function() {
        targetMouseX = 0;
        targetMouseY = 0;
    });

    function animateChips(time) {
        mouseX += (targetMouseX - mouseX) * 0.045;
        mouseY += (targetMouseY - mouseY) * 0.045;

        chipStates.forEach(function(state) {
            const floatX = Math.sin(time * state.speedX + state.phaseX) * state.amplitudeX;
            const floatY = Math.cos(time * state.speedY + state.phaseY) * state.amplitudeY;
            const rotate = Math.sin(time * state.speedRotate + state.phaseRotate) * state.rotateAmount;
            const mouseOffsetX = mouseX * state.mouseStrengthX;
            const mouseOffsetY = mouseY * state.mouseStrengthY;

            state.chip.style.transform =
                'translate3d(' +
                    (floatX + mouseOffsetX) + 'px, ' +
                    (floatY + mouseOffsetY) + 'px, 0' +
                ') rotate(' + rotate + 'deg)';
        });

        window.requestAnimationFrame(animateChips);
    }

    window.requestAnimationFrame(animateChips);
})();
</script>
```

---

## קובץ SCHEMA

```php
<?php
defined('ABSPATH') || exit;

return array(
    'type' => 'sela-engine',
    'label' => 'Sela — Cloud Engine',
    'category' => 'content',
    'contexts' => array(
        'page',
    ),
    'settings' => array(
        array(
            'id' => 'title',
            'type' => 'textarea',
            'label' => 'Title',
            'default' => 'Cloud providers give you a powerful<br>engine for your growth.',
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
            'id' => 'subtitle',
            'type' => 'textarea',
            'label' => 'Subtitle',
            'default' => 'Partnering with Sela provides ongoing technical and commercial add-ons to that engine, maximizing its performance while reducing costs – So you can grow faster and more efficiently.',
        ),
        array(
            'id' => 'wave_image',
            'type' => 'image',
            'label' => 'Wave image',
            'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-engine/media/cloud-wave.svg',
        ),
        array(
            'id' => 'robot_image',
            'type' => 'image',
            'label' => 'Robot image',
            'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-engine/media/engine-robot.png',
        ),
        array(
            'id' => 'experts_title',
            'type' => 'textarea',
            'label' => 'Experts title',
            'default' => 'Our tech experts,<br>your scale.',
        ),
        array(
            'id' => 'experts_desc',
            'type' => 'textarea',
            'label' => 'Experts description',
            'default' => 'With a deep bench of multi-cloud engineering talent, Sela delivers hands-on, end-to-end expertise that drives real business outcomes so you can grow, scale, and win.',
        ),
        array(
            'id' => 'experts_cloud_1',
            'type' => 'image',
            'label' => 'Experts cloud 1',
            'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-experts/media/cloud-hero-1.svg',
        ),
        array(
            'id' => 'experts_cloud_2',
            'type' => 'image',
            'label' => 'Experts cloud 2',
            'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-experts/media/cloud-hero-2.svg',
        ),
        array(
            'id' => 'experts_cloud_3',
            'type' => 'image',
            'label' => 'Experts cloud 3',
            'default' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-experts/media/cloud-hero-1.svg',
        ),
        array(
            'tab' => 'style',
            'id' => 'bg_section',
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
            'id' => 'text_color',
            'type' => 'color',
            'label' => 'Text color',
            'default' => '#686868',
        ),
        array(
            'tab' => 'style',
            'id' => 'card_border_color',
            'type' => 'color',
            'label' => 'Card border color',
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
            'id' => 'ff_base',
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
                    'value' => '\'Roboto\', sans-serif',
                    'label' => 'Roboto',
                ),
                array(
                    'value' => 'system-ui, sans-serif',
                    'label' => 'System UI',
                ),
            ),
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_d',
            'type' => 'range',
            'label' => 'Section padding — desktop',
            'default' => 100,
            'min' => 0,
            'max' => 240,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'pad_y_m',
            'type' => 'range',
            'label' => 'Section padding — mobile',
            'default' => 35,
            'min' => 0,
            'max' => 180,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_d',
            'type' => 'range',
            'label' => 'Title size — desktop',
            'default' => 38,
            'min' => 18,
            'max' => 90,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_title_m',
            'type' => 'range',
            'label' => 'Title size — mobile',
            'default' => 28,
            'min' => 18,
            'max' => 56,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_sub_d',
            'type' => 'range',
            'label' => 'Subtitle size — desktop',
            'default' => 18,
            'min' => 12,
            'max' => 32,
            'step' => 1,
        ),
        array(
            'tab' => 'style',
            'id' => 'fz_sub_m',
            'type' => 'range',
            'label' => 'Subtitle size — mobile',
            'default' => 16,
            'min' => 12,
            'max' => 26,
            'step' => 1,
        ),
    ),
    'blocks' => array(
        'allowed' => array(
            'engine-column',
            'engine-card',
            'experts-chip',
        ),
        'min' => 0,
        'max' => 24,
    ),
    'block_types' => array(
        'engine-column' => array(
            'label' => 'Engine column',
            'settings' => array(
                array(
                    'id' => 'side',
                    'type' => 'select',
                    'label' => 'Side',
                    'default' => 'left',
                    'options' => array(
                        array(
                            'value' => 'left',
                            'label' => 'Left',
                        ),
                        array(
                            'value' => 'right',
                            'label' => 'Right',
                        ),
                    ),
                ),
                array(
                    'id' => 'icon',
                    'type' => 'image',
                    'label' => 'Icon',
                    'default' => '',
                ),
                array(
                    'id' => 'icon_alt',
                    'type' => 'text',
                    'label' => 'Icon alt',
                    'default' => '',
                ),
                array(
                    'id' => 'title',
                    'type' => 'text',
                    'label' => 'Column title',
                    'default' => 'Commercial Add-ons',
                ),
                array(
                    'id' => 'items',
                    'type' => 'textarea',
                    'label' => 'Items — one per line',
                    'default' => 'FinOps & cost optimization
Private Pricing Deal Structuring Assistance
Cloud vendor engagement & funds securing
GTM',
                ),
            ),
        ),
        'engine-card' => array(
            'label' => 'Center card',
            'settings' => array(
                array(
                    'id' => 'type',
                    'type' => 'select',
                    'label' => 'Card type',
                    'default' => 'text',
                    'options' => array(
                        array(
                            'value' => 'text',
                            'label' => 'Text',
                        ),
                        array(
                            'value' => 'image',
                            'label' => 'Image',
                        ),
                    ),
                ),
                array(
                    'id' => 'text',
                    'type' => 'text',
                    'label' => 'Text',
                    'default' => 'Commercial Add-ons',
                ),
                array(
                    'id' => 'image',
                    'type' => 'image',
                    'label' => 'Image',
                    'default' => '',
                ),
                array(
                    'id' => 'image_alt',
                    'type' => 'text',
                    'label' => 'Image alt',
                    'default' => '',
                ),
                array(
                    'id' => 'style',
                    'type' => 'select',
                    'label' => 'Style',
                    'default' => 'pink',
                    'options' => array(
                        array(
                            'value' => 'pink',
                            'label' => 'Pink shadow',
                        ),
                        array(
                            'value' => 'blue',
                            'label' => 'Blue shadow',
                        ),
                        array(
                            'value' => 'cyan',
                            'label' => 'Cyan shadow',
                        ),
                    ),
                ),
            ),
        ),
        'experts-chip' => array(
            'label' => 'Experts chip',
            'settings' => array(
                array(
                    'id' => 'text',
                    'type' => 'text',
                    'label' => 'Text',
                    'default' => 'GenAI',
                ),
                array(
                    'id' => 'icon',
                    'type' => 'image',
                    'label' => 'Icon',
                    'default' => '',
                ),
                array(
                    'id' => 'icon_alt',
                    'type' => 'text',
                    'label' => 'Icon alt',
                    'default' => '',
                ),
                array(
                    'id' => 'color',
                    'type' => 'select',
                    'label' => 'Color',
                    'default' => 'green',
                    'options' => array(
                        array(
                            'value' => 'green',
                            'label' => 'Green',
                        ),
                        array(
                            'value' => 'cyan',
                            'label' => 'Cyan',
                        ),
                        array(
                            'value' => 'pink',
                            'label' => 'Pink',
                        ),
                        array(
                            'value' => 'yellow',
                            'label' => 'Yellow',
                        ),
                        array(
                            'value' => 'blue-light',
                            'label' => 'Blue light',
                        ),
                        array(
                            'value' => 'gray',
                            'label' => 'Gray',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'default_blocks' => array(
        array(
            'type' => 'engine-column',
            'settings' => array(
                'side' => 'left',
                'icon' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-engine/media/engine-row-left.svg',
                'icon_alt' => '',
                'title' => 'Commercial Add-ons',
                'items' => 'FinOps & cost optimization
Private Pricing Deal Structuring Assistance
Cloud vendor engagement & funds securing
GTM',
            ),
        ),
        array(
            'type' => 'engine-card',
            'settings' => array(
                'type' => 'text',
                'text' => 'Commercial Add-ons',
                'image' => '',
                'image_alt' => '',
                'style' => 'pink',
            ),
        ),
        array(
            'type' => 'engine-card',
            'settings' => array(
                'type' => 'text',
                'text' => 'Technological Add-ons',
                'image' => '',
                'image_alt' => '',
                'style' => 'blue',
            ),
        ),
        array(
            'type' => 'engine-card',
            'settings' => array(
                'type' => 'image',
                'text' => '',
                'image' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-engine/media/engine-cloud-logos.svg',
                'image_alt' => 'AWS, Google Cloud, Azure',
                'style' => 'cyan',
            ),
        ),
        array(
            'type' => 'engine-column',
            'settings' => array(
                'side' => 'right',
                'icon' => 'https://selacloud.com/wp-content/uploads/hero/sections/sela-engine/media/engine-right-icon.svg',
                'icon_alt' => '',
                'title' => 'Technological Add-ons',
                'items' => 'Consulting & Professional Services
Architecture Best Practices
24/7 Multi-cloud Support Portal, 10 mins response time
Flexible expert certified teams
Staff augmentation',
            ),
        ),
        array(
            'type' => 'experts-chip',
            'settings' => array(
                'text' => 'Migrations & Modernizations',
                'icon' => '',
                'icon_alt' => '',
                'color' => 'green',
            ),
        ),
        array(
            'type' => 'experts-chip',
            'settings' => array(
                'text' => 'Data',
                'icon' => '',
                'icon_alt' => '',
                'color' => 'cyan',
            ),
        ),
        array(
            'type' => 'experts-chip',
            'settings' => array(
                'text' => 'GenAI',
                'icon' => '',
                'icon_alt' => '',
                'color' => 'pink',
            ),
        ),
        array(
            'type' => 'experts-chip',
            'settings' => array(
                'text' => 'Application Engineering',
                'icon' => '',
                'icon_alt' => '',
                'color' => 'yellow',
            ),
        ),
        array(
            'type' => 'experts-chip',
            'settings' => array(
                'text' => 'DevOps',
                'icon' => '',
                'icon_alt' => '',
                'color' => 'blue-light',
            ),
        ),
        array(
            'type' => 'experts-chip',
            'settings' => array(
                'text' => 'Security',
                'icon' => '',
                'icon_alt' => '',
                'color' => 'gray',
            ),
        ),
    ),
);