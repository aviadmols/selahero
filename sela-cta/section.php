<?php
defined('ABSPATH') || exit;

$title = (string)($settings['title'] ?? 'Want your cloud better and faster?');

$media_base = '';
$source = (string)($section['source'] ?? '');
$type = (string)($section['type'] ?? 'sela-cta');

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

    return esc_url('https://selacloud.com/wp-content/uploads/hero/sections/sela-cta/media/' . ltrim($fallback, '/'));
};

$tag_t = function_exists('hero_pick_tag')
    ? hero_pick_tag((string)($settings['title_tag'] ?? 'auto'), 'h2')
    : 'h2';

$cards = array();

foreach (($blocks ?? array()) as $block) {
    $block_type = (string)($block['type'] ?? '');
    $block_settings = (array)($block['settings'] ?? []);

    if ($block_type !== 'testimonial-card') {
        continue;
    }

    $name = (string)($block_settings['name'] ?? '');

    if ($name === '') {
        continue;
    }

    $cards[] = array(
        'logo' => (string)($block_settings['logo'] ?? ''),
        'logo_alt' => (string)($block_settings['logo_alt'] ?? ''),
        'quote' => (string)($block_settings['quote'] ?? ''),
        'avatar' => (string)($block_settings['avatar'] ?? ''),
        'avatar_alt' => (string)($block_settings['avatar_alt'] ?? ''),
        'name' => $name,
    );
}

if (empty($cards)) {
    $cards = array(
        array(
            'logo' => $get_media('testi-logo-nucleus.png'),
            'logo_alt' => '',
            'quote' => '"What sets Sela apart from other companies is the dedication and willingness to go the extra mile to help with our technical needs. Our relationship with 2bcloud has resulted in increased cloud cost savings, better reporting, and much faster and more direct enterprise support than before."',
            'avatar' => $get_media('testi-avatar-jeff.png'),
            'avatar_alt' => '',
            'name' => 'Jeff Gouge, CISO, Nucleus Security',
        ),
        array(
            'logo' => $get_media('testi-logo-nucleus.png'),
            'logo_alt' => '',
            'quote' => '"Sela\'s engineering depth is unmatched. Their team helped us modernize our AWS infrastructure, cut cloud costs by 28%, and enabled us to ship features 3× faster. The 24/7 support is a game changer for a growing startup like ours."',
            'avatar' => $get_media('testi-avatar-jeff.png'),
            'avatar_alt' => '',
            'name' => 'Dan Cohen, CISO, Wiz',
        ),
        array(
            'logo' => $get_media('testi-logo-nucleus.png'),
            'logo_alt' => '',
            'quote' => '"From cloud migration to GenAI adoption, Sela has been our trusted partner at every stage. Their FinOps expertise alone saved us hundreds of thousands of dollars annually while improving reliability across all our cloud workloads."',
            'avatar' => $get_media('testi-avatar-jeff.png'),
            'avatar_alt' => '',
            'name' => 'Michael Brown, CTO, Island',
        ),
    );
}

$uid = 'slct-' . esc_attr($section['id'] ?? uniqid('sec', true));
?>

<style>
#<?php echo $uid; ?> {
    --slct-bg: <?php echo esc_attr($settings['bg_color'] ?? '#eef5ff'); ?>;
    --slct-title: <?php echo esc_attr($settings['title_color'] ?? '#1c1c1c'); ?>;
    --slct-card-bg: <?php echo esc_attr($settings['card_bg'] ?? '#fff'); ?>;
    --slct-quote: <?php echo esc_attr($settings['quote_color'] ?? '#1c1c1c'); ?>;
    --slct-name: <?php echo esc_attr($settings['name_color'] ?? '#1c1c1c'); ?>;
    --slct-dot-active: <?php echo esc_attr($settings['dot_active'] ?? '#00dbe9'); ?>;
    --slct-ff: <?php echo esc_attr((string)($settings['ff'] ?? "'Lexend', sans-serif")); ?>;
    --slct-fz-title: <?php echo (int)($settings['fz_title_d'] ?? 38); ?>px;
    --slct-fz-quote: <?php echo (int)($settings['fz_quote_d'] ?? 16); ?>px;
    --slct-pad-y: <?php echo (int)($settings['pad_y'] ?? 100); ?>px;
}

@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slct-fz-title: <?php echo (int)($settings['fz_title_m'] ?? 26); ?>px;
        --slct-fz-quote: <?php echo (int)($settings['fz_quote_m'] ?? 14); ?>px;
        --slct-pad-y: 35px;
    }
}
</style>

<section class="slct-section" id="<?php echo $uid; ?>">
<div class="hero-clouds">
    <img class="hero-clouds__item hero-clouds__item--back" src="https://selacloud.com/wp-content/uploads/2026/04/cloud-hero-2-7.svg" alt="">
    <img class="hero-clouds__item hero-clouds__item--front" src="https://selacloud.com/wp-content/uploads/2026/04/cloud-hero-1-7.svg" alt="">
</div>
    <div class="slct-wrap slct-inner">
        <<?php echo $tag_t; ?> class="slct-title"><?php echo wp_kses_post($title); ?></<?php echo $tag_t; ?>>

        <div class="slct-box">
            <div class="slct-cards" data-track>
                <?php foreach ($cards as $card) : ?>
                    <div class="slct-card">
                        <?php if (!empty($card['logo'])) : ?>
                            <img src="<?php echo esc_url($card['logo']); ?>" alt="<?php echo esc_attr($card['logo_alt']); ?>" class="slct-card-logo">
                        <?php endif; ?>

                        <?php if (!empty($card['quote'])) : ?>
                            <blockquote class="slct-quote"><?php echo wp_kses_post($card['quote']); ?></blockquote>
                        <?php endif; ?>

                        <div class="slct-author">
                            <?php if (!empty($card['avatar'])) : ?>
                                <img src="<?php echo esc_url($card['avatar']); ?>" alt="<?php echo esc_attr($card['avatar_alt']); ?>" class="slct-avatar">
                            <?php endif; ?>

                            <p class="slct-name"><?php echo esc_html($card['name']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (count($cards) > 1) : ?>
            <div class="slct-sdots">
                <?php foreach ($cards as $index => $_) : ?>
                    <span class="slct-sdot<?php echo $index === 0 ? ' slct-sdot--active' : ''; ?>"  data-idx="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr('Slide ' . ($index + 1)); ?>"></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
(function () {
    const section = document.getElementById('<?php echo esc_js($uid); ?>');

    if (!section) {
        return;
    }

    const track = section.querySelector('[data-track]');
    const box = track ? track.parentElement : null;
    const dots = section.querySelectorAll('.slct-sdot');

    if (!track || !box || !dots.length) {
        return;
    }

    let current = 0;
    let startX = 0;
    let startY = 0;
    let deltaX = 0;
    let dragging = false;
    let axis = null;

    const getStep = function () {
        const card = track.querySelector('.slct-card');
        if (!card) {
            return box.getBoundingClientRect().width;
        }

        const styles = window.getComputedStyle(track);
        const gap = parseFloat(styles.columnGap || styles.gap) || 0;

        return card.getBoundingClientRect().width + gap;
    };

    const slide = function (index, animate) {
        const step = getStep();
        current = Math.max(0, Math.min(index, dots.length - 1));

        if (animate === false) {
            track.style.transition = 'none';
        } else {
            track.style.transition = '';
        }

        track.style.transform = 'translateX(-' + (current * step) + 'px)';

        dots.forEach(function (dot, dotIndex) {
            dot.classList.toggle('slct-sdot--active', dotIndex === current);
        });

        if (animate === false) {
            track.offsetHeight;
            track.style.transition = '';
        }
    };

    const onPointerDown = function (clientX, clientY) {
        dragging = true;
        axis = null;
        startX = clientX;
        startY = clientY;
        deltaX = 0;
        track.style.transition = 'none';
        box.classList.add('is-dragging');
    };

    const onPointerMove = function (clientX, clientY, event) {
        if (!dragging) {
            return;
        }

        const dx = clientX - startX;
        const dy = clientY - startY;

        if (!axis) {
            if (Math.abs(dx) < 8 && Math.abs(dy) < 8) {
                return;
            }
            axis = Math.abs(dx) > Math.abs(dy) ? 'x' : 'y';
        }

        if (axis !== 'x') {
            return;
        }

        if (event && event.cancelable) {
            event.preventDefault();
        }

        deltaX = dx;
        const base = -current * getStep();
        track.style.transform = 'translateX(' + (base + deltaX) + 'px)';
    };

    const onPointerUp = function () {
        if (!dragging) {
            return;
        }

        dragging = false;
        box.classList.remove('is-dragging');
        track.style.transition = '';

        if (axis !== 'x') {
            slide(current);
            axis = null;
            deltaX = 0;
            return;
        }

        const threshold = Math.max(40, getStep() * 0.18);

        if (deltaX <= -threshold) {
            slide(current + 1);
        } else if (deltaX >= threshold) {
            slide(current - 1);
        } else {
            slide(current);
        }

        axis = null;
        deltaX = 0;
    };

    box.addEventListener('touchstart', function (event) {
        if (!event.touches || !event.touches.length) {
            return;
        }
        onPointerDown(event.touches[0].clientX, event.touches[0].clientY);
    }, { passive: true });

    box.addEventListener('touchmove', function (event) {
        if (!event.touches || !event.touches.length) {
            return;
        }
        onPointerMove(event.touches[0].clientX, event.touches[0].clientY, event);
    }, { passive: false });

    box.addEventListener('touchend', onPointerUp);
    box.addEventListener('touchcancel', onPointerUp);

    box.addEventListener('pointerdown', function (event) {
        if (event.pointerType === 'touch') {
            return;
        }
        if (event.button !== 0) {
            return;
        }
        onPointerDown(event.clientX, event.clientY);
    });

    window.addEventListener('pointermove', function (event) {
        if (!dragging || event.pointerType === 'touch') {
            return;
        }
        onPointerMove(event.clientX, event.clientY, event);
    });

    window.addEventListener('pointerup', function (event) {
        if (event.pointerType === 'touch') {
            return;
        }
        onPointerUp();
    });

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            slide(Number(dot.dataset.idx || 0));
        });
    });

    window.addEventListener('resize', function () {
        slide(current, false);
    });

    slide(0);
}());
</script>