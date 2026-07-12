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

    return esc_url('https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-engine/media/' . ltrim($fallback, '/'));
};

$get_experts_media = function (string $key, string $fallback) use ($settings): string {
    $value = (string)($settings[$key] ?? '');

    if ($value !== '') {
        return esc_url($value);
    }

    return esc_url('https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-experts/media/' . ltrim($fallback, '/'));
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
            'type' => (string)($block_settings['type'] ?? 'text'),
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
            'type' => 'text',
            'text' => 'Migrations & Modernizations',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'green',
        ),
        array(
            'type' => 'text',
            'text' => 'Data',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'cyan',
        ),
        array(
            'type' => 'text',
            'text' => 'GenAI',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'pink',
        ),
        array(
            'type' => 'text',
            'text' => 'Application Engineering',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'yellow',
        ),
        array(
            'type' => 'text',
            'text' => 'DevOps',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'blue-light',
        ),
        array(
            'type' => 'text',
            'text' => 'Security',
            'icon' => '',
            'icon_alt' => '',
            'color' => 'gray',
        ),
    );
}


$mobile_panels = array();

foreach ($cards as $card) {
    $card_text = trim((string)($card['text'] ?? ''));
    $card_type = (string)($card['type'] ?? 'text');
    $card_style = sanitize_html_class((string)($card['style'] ?? 'pink'));

    $panel = array(
        'title' => '',
        'items' => array(),
        'style' => $card_style,
    );

    if (
        strcasecmp($card_text, (string)$left_column['title']) === 0 ||
        stripos($card_text, 'commercial') !== false
    ) {
        $panel['title'] = (string)$left_column['title'];
        $panel['items'] = (array)$left_column['items'];
    } elseif (
        strcasecmp($card_text, (string)$right_column['title']) === 0 ||
        stripos($card_text, 'technological') !== false
    ) {
        $panel['title'] = (string)$right_column['title'];
        $panel['items'] = (array)$right_column['items'];
    } elseif ($card_type !== 'image' && $card_text !== '') {
        $panel['title'] = $card_text;
    }

    $mobile_panels[] = $panel;
}

$wave_image = $get_img('wave_image', 'cloud-wave.svg');
$robot_image = $get_img('robot_image', 'engine-robot.png');
$experts_cloud_1 = $get_experts_media('experts_cloud_1', 'cloud-hero-1.svg');
$experts_cloud_2 = $get_experts_media('experts_cloud_2', 'cloud-hero-2.svg');
$experts_cloud_3 = $get_experts_media('experts_cloud_3', 'cloud-hero-1.svg');

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


@media (max-width: 1024px) {
    #<?php echo $uid; ?> .engine__layout {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    #<?php echo $uid; ?> .engine__center {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
        width: 100%;
        max-width: 334px;
        margin: 0 auto;
        padding: 0;
    }

    #<?php echo $uid; ?> .engine__center .engine__card {
        width: 100%;
        max-width: none;
        margin: 0;
    }

    #<?php echo $uid; ?> .engine__center .engine__card--logos img {
        width: 100%;
        max-width: 220px;
        height: auto;
    }
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
    <div class="engine__top-pin">
    <div class="engine__top">
        <div class="wrap">
            <<?php echo $title_tag; ?> class="engine__title"><?php echo wp_kses_post($title); ?></<?php echo $title_tag; ?>>

            <?php if ($subtitle !== '') : ?>
                <p class="engine__sub"><?php echo wp_kses_post($subtitle); ?></p>
            <?php endif; ?>

            <div class="engine__layout">
                <div class="engine__col engine__col--left">
                    <div class="engine__col-text">
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
                    <?php foreach ($cards as $index => $card) : ?>
                        <?php
                        $card_class = 'engine__card engine__card--' . sanitize_html_class($card['style']);

                        if ($card['type'] === 'image') {
                            $card_class .= ' engine__card--logos';
                        }
                        ?>

                        <div
                            class="<?php echo esc_attr($card_class); ?>"
                            data-engine-card
                        >
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

                    <div class="engine__col-text">
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

    if (chipsArea && chips.length) {
        let mouseX = 0;
        let mouseY = 0;
        let targetMouseX = 0;
        let targetMouseY = 0;

        const isMobile = function() {
            return window.matchMedia('(max-width: 768px)').matches;
        };

        const buildChipStates = function() {
            const mobile = isMobile();

            return chips.map(function(chip) {
                if (mobile) {
                    // Slow but clearly floating chips on mobile — larger motion, low speed.
                    return {
                        chip: chip,
                        phaseX: Math.random() * Math.PI * 2,
                        phaseY: Math.random() * Math.PI * 2,
                        phaseRotate: Math.random() * Math.PI * 2,
                        speedX: 0.00012 + Math.random() * 0.00008,
                        speedY: 0.0001 + Math.random() * 0.00007,
                        speedRotate: 0.00008 + Math.random() * 0.00005,
                        amplitudeX: 5 + Math.random() * 4,
                        amplitudeY: 6 + Math.random() * 5,
                        rotateAmount: 0.8 + Math.random() * 0.7,
                        mouseStrengthX: 0,
                        mouseStrengthY: 0
                    };
                }

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
        };

        let chipStates = buildChipStates();

        chipsArea.addEventListener('mousemove', function(event) {
            if (isMobile()) {
                return;
            }

            const rect = chipsArea.getBoundingClientRect();

            targetMouseX = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
            targetMouseY = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        });

        chipsArea.addEventListener('mouseleave', function() {
            targetMouseX = 0;
            targetMouseY = 0;
        });

        window.addEventListener('resize', function() {
            chipStates = buildChipStates();
            targetMouseX = 0;
            targetMouseY = 0;
            mouseX = 0;
            mouseY = 0;
        });

        function animateChips(time) {
            const ease = isMobile() ? 0.02 : 0.045;

            mouseX += (targetMouseX - mouseX) * ease;
            mouseY += (targetMouseY - mouseY) * ease;

            chipStates.forEach(function(state) {
                const floatX = Math.sin(time * state.speedX + state.phaseX) * state.amplitudeX;
                const floatY = Math.cos(time * state.speedY + state.phaseY) * state.amplitudeY;
                const rotate = Math.sin(time * state.speedRotate + state.phaseRotate) * state.rotateAmount;
                const mouseOffsetX = mouseX * state.mouseStrengthX;
                const mouseOffsetY = mouseY * state.mouseStrengthY;

                state.chip.style.transform =
                    'translate3d(' +
                    (floatX + mouseOffsetX) + 'px, ' +
                    (floatY + mouseOffsetY) + 'px, 0) rotate(' +
                    rotate + 'deg)';
            });

            window.requestAnimationFrame(animateChips);
        }

        window.requestAnimationFrame(animateChips);
    }

    const layout = section.querySelector('.engine__layout');
    const center = section.querySelector('.engine__center');
    const topPin = section.querySelector('.engine__top-pin');
    const rightCol = section.querySelector('.engine__col--right');
    const second = section.querySelector('.engine__second');
    const cards = center ? Array.from(center.querySelectorAll('.engine__card')) : [];
    const icons = Array.from(section.querySelectorAll('.engine__col-icon'));
    const texts = Array.from(section.querySelectorAll('.engine__col-text'));

    if (!layout || !center || !topPin || !second || !cards.length) {
        return;
    }

    // One group per card, then icons together, then column texts together.
    // Each group fades in on its own scroll step while the area stays pinned.
    const groups = cards.map(function(card) { return [card]; });

    if (icons.length) {
        groups.push(icons);
    }

    if (texts.length) {
        groups.push(texts);
    }

    const STEP_PX = 160;
    const STICKY_HOLD_PX = 220;
    const TAKEOVER_PX = 700;
    const PIN_OFFSET = 60;
    const revealDistance = groups.length * STEP_PX;

    const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const desktopQuery = window.matchMedia('(min-width: 1025px)');

    let track = section.querySelector('.engine__scroll-track');

    if (!track) {
        track = document.createElement('div');
        track.className = 'engine__scroll-track';
        second.parentNode.insertBefore(track, second);
        track.appendChild(second);
    }

    function toggleGroup(group, on) {
        group.forEach(function(el) {
            el.classList.toggle('is-revealed', on);
        });
    }

    function revealAll(on) {
        groups.forEach(function(group) {
            toggleGroup(group, on);
        });

        if (rightCol) {
            rightCol.classList.toggle('is-revealed-col', on);
        }
    }

    function clearStyles() {
        [topPin, track, second].forEach(function(el) {
            el.style.position = '';
            el.style.top = '';
            el.style.height = '';
            el.style.zIndex = '';
            el.style.overflow = '';
        });

        second.style.transform = '';
        second.style.willChange = '';

        if (rightCol) {
            rightCol.classList.remove('is-revealed-col');
        }
    }

    let scrubbing = false;

    function configure() {
        if (reduceMotion || !desktopQuery.matches) {
            layout.classList.remove('engine--anim');
            revealAll(true);
            clearStyles();
            scrubbing = false;
            return;
        }

        layout.classList.add('engine--anim');
        revealAll(false);

        const vh = window.innerHeight;
        const pinHeight = vh - PIN_OFFSET;

        section.style.setProperty('--engine-pin-offset', PIN_OFFSET + 'px');

        topPin.style.position = 'sticky';
        topPin.style.top = PIN_OFFSET + 'px';
        topPin.style.height = pinHeight + 'px';
        topPin.style.zIndex = '1';
        topPin.style.overflow = 'hidden';

        track.style.position = 'relative';
        track.style.height = (revealDistance + STICKY_HOLD_PX + TAKEOVER_PX + vh) + 'px';

        second.style.position = 'sticky';
        second.style.top = PIN_OFFSET + 'px';
        second.style.height = pinHeight + 'px';
        second.style.zIndex = '5';
        second.style.willChange = 'transform';

        scrubbing = true;
    }

    let ticking = false;

    function update() {
        ticking = false;

        if (!scrubbing) {
            return;
        }

        const scrolledIntoPin = Math.max(0, PIN_OFFSET - section.getBoundingClientRect().top);

        groups.forEach(function(group, index) {
            toggleGroup(group, scrolledIntoPin >= (index + 1) * STEP_PX);
        });

        const allRevealed = scrolledIntoPin >= revealDistance;

        if (rightCol) {
            rightCol.classList.toggle('is-revealed-col', allRevealed);
        }

        const takeoverStart = revealDistance + STICKY_HOLD_PX;
        let takeover = (scrolledIntoPin - takeoverStart) / TAKEOVER_PX;
        takeover = Math.max(0, Math.min(1, takeover));
        second.style.transform = 'translate3d(0, ' + ((1 - takeover) * 100) + '%, 0)';
    }

    function onScroll() {
        if (!ticking) {
            ticking = true;
            window.requestAnimationFrame(update);
        }
    }

    configure();
    update();

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', function() {
        configure();
        update();
    });
})();
</script>