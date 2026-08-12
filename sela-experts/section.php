<?php
defined('ABSPATH') || exit;

$title = (string)($settings['title'] ?? 'Our tech experts,<br>your scale.');
$description = (string)($settings['description'] ?? 'With a deep bench of multi-cloud engineering talent, Sela delivers hands-on, end-to-end expertise that drives real business outcomes so you can grow, scale, and win.');

$source = (string)($section['source'] ?? '');
$type = (string)($section['type'] ?? 'sela-experts');
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

    return esc_url('https://selacloud.com/wp-content/uploads/hero/sections/sela-experts/media/' . ltrim($fallback, '/'));
};

$title_tag = function_exists('hero_pick_tag')
    ? hero_pick_tag((string)($settings['title_tag'] ?? 'auto'), 'h2')
    : 'h2';
$robot_image = $get_img('robot_image', 'engine-robot.png');

$clouds = array(
    array(
        'src' => $get_img('cloud_1', 'cloud-1.svg'),
        'class' => 'experts__cloud experts__cloud--1',
    ),
    array(
        'src' => $get_img('cloud_2', 'cloud-2.svg'),
        'class' => 'experts__cloud experts__cloud--2',
    ),
    array(
        'src' => $get_img('cloud_3', 'cloud-3.svg'),
        'class' => 'experts__cloud experts__cloud--3',
    ),
);

$chips = array();

foreach (($blocks ?? array()) as $block) {
    $block_type = (string)($block['type'] ?? '');
    $block_settings = (array)($block['settings'] ?? []);

    if ($block_type !== 'expert-chip') {
        continue;
    }

    $text = (string)($block_settings['text'] ?? '');

    if ($text === '') {
        continue;
    }

    $chips[] = array(
        'icon' => (string)($block_settings['icon'] ?? ''),
        'icon_alt' => (string)($block_settings['icon_alt'] ?? ''),
        'text' => $text,
        'color' => sanitize_html_class((string)($block_settings['color'] ?? 'green')),
    );
}

if (empty($chips)) {
    $chips = array(
        array(
            'icon' => $get_media('icon-settings.svg'),
            'icon_alt' => '',
            'text' => 'Migrations & Modernizations',
            'color' => 'green',
        ),
        array(
            'icon' => $get_media('icon-database.svg'),
            'icon_alt' => '',
            'text' => 'Data',
            'color' => 'cyan',
        ),
        array(
            'icon' => $get_media('icon-genai.svg'),
            'icon_alt' => '',
            'text' => 'GenAI',
            'color' => 'pink',
        ),
        array(
            'icon' => $get_media('icon-appeng.svg'),
            'icon_alt' => '',
            'text' => 'Application Engineering',
            'color' => 'yellow',
        ),
        array(
            'icon' => $get_media('icon-devops.svg'),
            'icon_alt' => '',
            'text' => 'DevOps',
            'color' => 'blue-light',
        ),
        array(
            'icon' => $get_media('icon-shield.svg'),
            'icon_alt' => '',
            'text' => 'Security',
            'color' => 'gray',
        ),
    );
}

$uid = 'slex-' . esc_attr($section['id'] ?? uniqid('sec', true));
?>

<style>
#<?php echo $uid; ?> {
    --experts-bg: <?php echo esc_attr($settings['bg_section'] ?? '#ffffff'); ?>;
    --experts-title: <?php echo esc_attr($settings['title_color'] ?? '#1c1c1c'); ?>;
    --experts-desc: <?php echo esc_attr($settings['desc_color'] ?? '#686868'); ?>;
    --experts-chip-text: <?php echo esc_attr($settings['chip_text_color'] ?? '#1c1c1c'); ?>;
    --experts-chip-border: <?php echo esc_attr($settings['chip_border_color'] ?? '#1c1c1c'); ?>;
    --experts-ff: <?php echo esc_attr((string)($settings['ff_base'] ?? "'Lexend', sans-serif")); ?>;
    --experts-pad-y: <?php echo (int)($settings['pad_y_d'] ?? 100); ?>px;
    --experts-title-size: <?php echo (int)($settings['fz_title_d'] ?? 38); ?>px;
    --experts-desc-size: <?php echo (int)($settings['fz_desc_d'] ?? 18); ?>px;
}

@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --experts-pad-y: <?php echo (int)($settings['pad_y_m'] ?? 35); ?>px;
        --experts-title-size: <?php echo (int)($settings['fz_title_m'] ?? 28); ?>px;
        --experts-desc-size: <?php echo (int)($settings['fz_desc_m'] ?? 16); ?>px;
    }
}
</style>

<section class="experts" id="<?php echo $uid; ?>">
    <div class="wrap experts__inner">
        <div class="experts__left">
            <<?php echo $title_tag; ?> class="experts__title"><?php echo wp_kses_post($title); ?></<?php echo $title_tag; ?>>
            <p class="experts__desc"><?php echo wp_kses_post($description); ?></p>
        </div>

        <div class="experts__chips-area">
            <?php if ($robot_image !== '') : ?>
                <img class="experts__robot" src="<?php echo esc_url($robot_image); ?>" alt="" aria-hidden="true">
            <?php endif; ?>

            <?php foreach ($clouds as $cloud) : ?>
                <?php if (!empty($cloud['src'])) : ?>
                    <img class="<?php echo esc_attr($cloud['class']); ?>" src="<?php echo esc_url($cloud['src']); ?>" alt="" aria-hidden="true">
                <?php endif; ?>
            <?php endforeach; ?>

            <div class="experts__chips">
                <?php foreach ($chips as $chip) : ?>
                    <span class="chip chip--<?php echo esc_attr($chip['color']); ?>">
                        <?php if (!empty($chip['icon'])) : ?>
                            <img src="<?php echo esc_url($chip['icon']); ?>" alt="<?php echo esc_attr($chip['icon_alt']); ?>">
                        <?php endif; ?>
                        <?php echo esc_html($chip['text']); ?>
                    </span>
                <?php endforeach; ?>
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

    const area = section.querySelector('.experts__chips-area');
    const chips = Array.from(section.querySelectorAll('.experts__chips .chip'));
    const robot = section.querySelector('.experts__robot');

    const hasChipAnimation = area && chips.length;
    const chipStates = hasChipAnimation
        ? chips.map(function(chip, index) {
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
                mouseStrengthY: 2 + Math.random() * 2.5,
                hoverLift: index % 2 === 0 ? -0.6 : 0.6
            };
        })
        : [];

    let mouseX = 0;
    let mouseY = 0;
    let targetMouseX = 0;
    let targetMouseY = 0;
    let robotTicking = false;
    let overlapTicking = false;
    const expertsWrap = section.closest('.hero-section--sela-experts');
    let engineWrap = null;

    if (expertsWrap) {
        let current = expertsWrap.previousElementSibling;

        while (current) {
            if (current.classList && current.classList.contains('hero-section--sela-engine')) {
                engineWrap = current;
                break;
            }
            current = current.previousElementSibling;
        }
    }

    if (!hasChipAnimation && !robot) {
        return;
    }

    function updateRobotParallax() {
        if (!robot) {
            robotTicking = false;
            return;
        }

        const rect = section.getBoundingClientRect();
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
        const progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
        const movement = (0.5 - progress) * 35;

        section.style.setProperty('--experts-robot-parallax-y', movement + 'px');
        robotTicking = false;
    }

    function requestRobotParallaxUpdate() {
        if (!robotTicking) {
            window.requestAnimationFrame(updateRobotParallax);
            robotTicking = true;
        }
    }

    function updateOverlapTakeover() {
        if (!engineWrap || !expertsWrap) {
            section.style.setProperty('--experts-overlap-y', '0px');
            overlapTicking = false;
            return;
        }

        const expertsRect = expertsWrap.getBoundingClientRect();
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
        const maxLift = window.matchMedia('(max-width: 768px)').matches ? 110 : 220;
        const triggerStart = viewportHeight * 0.92;
        const triggerEnd = viewportHeight * 0.30;
        const rawProgress = (triggerStart - expertsRect.top) / (triggerStart - triggerEnd);
        const progress = Math.max(0, Math.min(1, rawProgress));
        const lift = -maxLift * progress;

        section.style.setProperty('--experts-overlap-y', lift.toFixed(2) + 'px');
        overlapTicking = false;
    }

    function requestOverlapTakeoverUpdate() {
        if (!overlapTicking) {
            window.requestAnimationFrame(updateOverlapTakeover);
            overlapTicking = true;
        }
    }

    if (hasChipAnimation) {
        area.addEventListener('mousemove', function(event) {
            const rect = area.getBoundingClientRect();

            targetMouseX = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
            targetMouseY = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        });

        area.addEventListener('mouseleave', function() {
            targetMouseX = 0;
            targetMouseY = 0;
        });
    }

    function animate(time) {
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

        window.requestAnimationFrame(animate);
    }

    requestRobotParallaxUpdate();
    requestOverlapTakeoverUpdate();
    window.addEventListener('scroll', requestRobotParallaxUpdate, { passive: true });
    window.addEventListener('resize', requestRobotParallaxUpdate);
    window.addEventListener('scroll', requestOverlapTakeoverUpdate, { passive: true });
    window.addEventListener('resize', requestOverlapTakeoverUpdate);

    if (hasChipAnimation) {
        window.requestAnimationFrame(animate);
    }
})();
</script>