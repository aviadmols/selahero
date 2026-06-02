<?php
defined('ABSPATH') || exit;

$title = (string)($settings['title'] ?? 'Cloud providers give you a powerful<br>engine for your growth.');
$subtitle = (string)($settings['subtitle'] ?? 'Partnering with Sela provides ongoing technical and commercial add-ons to that engine, maximizing its performance while reducing costs – So you can grow faster and more efficiently.');

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

    return esc_url('https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/' . ltrim($fallback, '/'));
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

$wave_image = $get_img('wave_image', 'cloud-wave.svg');
$robot_image = $get_img('robot_image', 'engine-robot.png');
$get_experts_media = function (string $fallback): string {
    return esc_url('https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/' . ltrim($fallback, '/'));
};
$experts_cloud_1 = $get_experts_media('cloud-hero-1.svg');
$experts_cloud_2 = $get_experts_media('cloud-hero-2.svg');
$experts_cloud_3 = $get_experts_media('cloud-hero-1.svg');
$experts_chips = array(
    array('text' => 'Migrations & Modernizations', 'color' => 'green'),
    array('text' => 'Data', 'color' => 'cyan'),
    array('text' => 'GenAI', 'color' => 'pink'),
    array('text' => 'Application Engineering', 'color' => 'yellow'),
    array('text' => 'DevOps', 'color' => 'blue-light'),
    array('text' => 'Security', 'color' => 'gray'),
);

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

@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --engine-pad-y: <?php echo (int)($settings['pad_y_m'] ?? 64); ?>px;
        --engine-title-size: <?php echo (int)($settings['fz_title_m'] ?? 28); ?>px;
        --engine-sub-size: <?php echo (int)($settings['fz_sub_m'] ?? 16); ?>px;
    }
}
</style>

<section class="engine" id="<?php echo $uid; ?>">
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
                    <div class="engine__col-icon">
                        <img src="/homepage/media/engine-row-left.svg" alt="">
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
                    <div class="engine__col-icon">
                        <img src="/homepage/media/engine-right-icon.svg" alt="">
                    </div>
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
                    <h3 class="experts__title">Our tech experts,<br>your scale.</h3>
                    <p class="experts__desc">With a deep bench of multi-cloud engineering talent, Sela delivers hands-on, end-to-end expertise that drives real business outcomes so you can grow, scale, and win.</p>
                </div>
                <div class="experts__chips-area">
                    <img class="experts__cloud experts__cloud--1" src="<?php echo esc_url($experts_cloud_1); ?>" alt="" aria-hidden="true">
                    <img class="experts__cloud experts__cloud--2" src="<?php echo esc_url($experts_cloud_2); ?>" alt="" aria-hidden="true">
                    <img class="experts__cloud experts__cloud--3" src="<?php echo esc_url($experts_cloud_3); ?>" alt="" aria-hidden="true">

                    <div class="experts__chips">
                        <?php foreach ($experts_chips as $chip) : ?>
                            <span class="chip chip--<?php echo esc_attr($chip['color']); ?>">
                                <?php echo esc_html($chip['text']); ?>
                            </span>
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

    const topArea = section.querySelector('.engine__top');
    const secondArea = section.querySelector('.engine__second');
    const robot = section.querySelector('.engine__robot');
    const chipsArea = section.querySelector('.experts__chips-area');
    const chips = Array.from(section.querySelectorAll('.experts__chips .chip'));
    const hasChips = Boolean(chipsArea && chips.length);

    if (!topArea || !secondArea) {
        return;
    }

    let ticking = false;
    let overlapTicking = false;
    let mouseX = 0;
    let mouseY = 0;
    let targetMouseX = 0;
    let targetMouseY = 0;

    const chipStates = hasChips ? chips.map(function(chip) {
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
    }) : [];

    function updateSecondTakeover() {
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
        const secondRect = secondArea.getBoundingClientRect();
        const maxLift = window.matchMedia('(max-width: 768px)').matches ? 110 : 220;
        const triggerStart = viewportHeight * 0.92;
        const triggerEnd = viewportHeight * 0.30;
        const rawProgress = (triggerStart - secondRect.top) / (triggerStart - triggerEnd);
        const progress = Math.max(0, Math.min(1, rawProgress));
        const lift = -maxLift * progress;

        section.style.setProperty('--engine-second-overlap-y', lift.toFixed(2) + 'px');
        section.classList.toggle('engine--overlap-complete', progress >= 1);
        overlapTicking = false;
    }

    function requestSecondTakeoverUpdate() {
        if (!overlapTicking) {
            window.requestAnimationFrame(updateSecondTakeover);
            overlapTicking = true;
        }
    }

    function updateWaveParallax() {
        const rect = section.getBoundingClientRect();
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

        if (rect.bottom < 0 || rect.top > viewportHeight) {
            ticking = false;
            return;
        }

        const progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
        const waveMovement = (progress - 0.52) * 80;
        const robotMovement = (0.5 - progress) * 28;

        section.style.setProperty('--engine-second-wave-y', waveMovement + 'px');
        if (robot) {
            section.style.setProperty('--engine-robot-y', robotMovement + 'px');
        }
        ticking = false;
    }

    function requestWaveParallaxUpdate() {
        if (!ticking) {
            window.requestAnimationFrame(updateWaveParallax);
            ticking = true;
        }
    }

    updateWaveParallax();
    updateSecondTakeover();

    if (hasChips) {
        chipsArea.addEventListener('mousemove', function(event) {
            const rect = chipsArea.getBoundingClientRect();
            targetMouseX = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
            targetMouseY = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        });
        chipsArea.addEventListener('mouseleave', function() {
            targetMouseX = 0;
            targetMouseY = 0;
        });
    }

    function animateChips(time) {
        if (!hasChips) {
            return;
        }
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

    window.addEventListener('scroll', requestWaveParallaxUpdate, { passive: true });
    window.addEventListener('resize', requestWaveParallaxUpdate);
    window.addEventListener('scroll', requestSecondTakeoverUpdate, { passive: true });
    window.addEventListener('resize', requestSecondTakeoverUpdate);

    if (hasChips) {
        window.requestAnimationFrame(animateChips);
    }
})();
</script>