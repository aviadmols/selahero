<?php
defined('ABSPATH') || exit;

$title = (string)($settings['title'] ?? 'Latest Insights and News');

$tag_title = function_exists('hero_pick_tag')
    ? hero_pick_tag((string)($settings['title_tag'] ?? 'h2'), 'h2')
    : 'h2';

$source = (string)($section['source'] ?? '');
$type = (string)($section['type'] ?? 'sela-blog');
$media_base = '';

if ($source === 'uploads') {
    $upload_dir = wp_upload_dir();
    $media_base = trailingslashit($upload_dir['baseurl']) . 'hero/sections/' . sanitize_key($type) . '/media/';
}

$get_media = function (string $fallback) use ($media_base): string {
    if ($media_base !== '') {
        return esc_url($media_base . ltrim($fallback, '/'));
    }

    return esc_url('https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-blog/media/' . ltrim($fallback, '/'));
};

$cards = array();

foreach (($blocks ?? array()) as $block) {
    $block_type = (string)($block['type'] ?? '');
    $block_settings = (array)($block['settings'] ?? []);

    if ($block_type !== 'blog-card') {
        continue;
    }

    $cards[] = array(
        'image' => (string)($block_settings['image'] ?? ''),
        'image_alt' => (string)($block_settings['image_alt'] ?? ''),
        'tag' => (string)($block_settings['tag'] ?? ''),
        'title' => (string)($block_settings['title'] ?? ''),
        'date' => (string)($block_settings['date'] ?? ''),
        'url' => (string)($block_settings['url'] ?? ''),
    );
}

if (empty($cards)) {
    $cards = array(
        array(
            'image' => $get_media('blog-img1.jpg'),
            'image_alt' => 'Event',
            'tag' => 'Next Event',
            'title' => 'Driving Tomorrow\'s Success 2025',
            'date' => '15 Jul 2025',
            'url' => '#',
        ),
        array(
            'image' => $get_media('blog-img2.jpg'),
            'image_alt' => 'SaaS Journey',
            'tag' => 'Media and News',
            'title' => 'From Code to Cloud: the SaaS Journey by Sela Cloud Experts',
            'date' => '15 Jul 2025',
            'url' => '#',
        ),
        array(
            'image' => $get_media('blog-img3.jpg'),
            'image_alt' => 'Google Cloud',
            'tag' => 'Next Event',
            'title' => 'From Code to Cloud: the SaaS Journey by Sela and Google Cloud Experts',
            'date' => '15 Jul 2025',
            'url' => '#',
        ),
    );
}

$uid = 'slbl-' . esc_attr($section['id'] ?? uniqid('sec', true));
?>

<style>
#<?php echo $uid; ?> {
    --blog-bg: <?php echo esc_attr($settings['bg_section'] ?? '#ffffff'); ?>;
    --blog-title: <?php echo esc_attr($settings['color_title'] ?? '#1c1c1c'); ?>;
    --blog-card-border: <?php echo esc_attr($settings['color_card_border'] ?? '#2f2f2f'); ?>;
    --blog-tag: <?php echo esc_attr($settings['color_tag'] ?? '#777777'); ?>;
    --blog-tag-dot: <?php echo esc_attr($settings['color_dot'] ?? '#00dbe9'); ?>;
    --blog-text: <?php echo esc_attr($settings['color_text'] ?? '#1c1c1c'); ?>;
    --blog-slider-dot: <?php echo esc_attr($settings['color_slider_dot'] ?? '#1c1c1c'); ?>;
    --blog-ff: <?php echo esc_attr((string)($settings['ff_base'] ?? "'Lexend', sans-serif")); ?>;
    --blog-pad-y: <?php echo (int)($settings['pad_y_d'] ?? 80); ?>px;
    --blog-title-size: <?php echo (int)($settings['fz_title_d'] ?? 38); ?>px;
    --blog-card-width: <?php echo (int)($settings['card_width'] ?? 380); ?>px;
    --blog-image-height: <?php echo (int)($settings['image_height'] ?? 231); ?>px;
}

@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --blog-pad-y: <?php echo (int)($settings['pad_y_m'] ?? 56); ?>px;
        --blog-title-size: <?php echo (int)($settings['fz_title_m'] ?? 30); ?>px;
    }
}
</style>

<section class="blog" id="<?php echo $uid; ?>">
    <div class="wrap">
        <<?php echo $tag_title; ?> class="blog__title"><?php echo esc_html($title); ?></<?php echo $tag_title; ?>>

        <div class="blog__track-outer">
            <div class="blog__track" data-blog-track>
                <?php foreach ($cards as $card) : ?>
                    <?php
                    $card_url = trim((string)($card['url'] ?? ''));
                    $card_tag = (string)($card['tag'] ?? '');
                    $card_title = (string)($card['title'] ?? '');
                    $card_date = (string)($card['date'] ?? '');
                    $card_image = (string)($card['image'] ?? '');
                    $card_alt = (string)($card['image_alt'] ?? '');
                    ?>

                    <article class="blog__card">
                        <?php if ($card_url !== '') : ?>
                            <a class="blog__card-link" href="<?php echo esc_url($card_url); ?>">
                        <?php endif; ?>

                        <?php if ($card_image !== '') : ?>
                            <div class="blog__card-img">
                                <img src="<?php echo esc_url($card_image); ?>" alt="<?php echo esc_attr($card_alt); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="blog__card-body">
                            <?php if ($card_tag !== '') : ?>
                                <span class="blog__tag"><?php echo esc_html($card_tag); ?></span>
                            <?php endif; ?>

                            <?php if ($card_title !== '') : ?>
                                <h3 class="blog__card-title"><?php echo esc_html($card_title); ?></h3>
                            <?php endif; ?>

                            <?php if ($card_date !== '') : ?>
                                <p class="blog__card-date"><?php echo esc_html($card_date); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if ($card_url !== '') : ?>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (count($cards) > 1) : ?>
            <div class="blog__dots" data-blog-dots>
                <?php foreach ($cards as $index => $card) : ?>
                    <button class="blog__dot<?php echo $index === 0 ? ' blog__dot--active' : ''; ?>" type="button" data-idx="<?php echo esc_attr($index); ?>" aria-label="<?php echo esc_attr('Go to slide ' . ($index + 1)); ?>"></button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.blog').forEach(function (section) {
        const track = section.querySelector('.blog__track');
        const dots = section.querySelectorAll('.blog__dot');

        if (!track || !dots.length) {
            return;
        }

        let current = 0;
        let touchStartX = 0;

        const getGap = function () {
            const styles = window.getComputedStyle(track);
            return parseFloat(styles.columnGap || styles.gap || 16) || 16;
        };

        const getCardWidth = function () {
            const firstCard = track.querySelector('.blog__card');

            if (!firstCard) {
                return 0;
            }

            return firstCard.offsetWidth + getGap();
        };

        const getMaxIndex = function () {
            return Math.max(dots.length - 1, 0);
        };

        const goToSlide = function (index) {
            current = Math.max(0, Math.min(index, getMaxIndex()));
            track.style.transform = 'translateX(-' + current * getCardWidth() + 'px)';

            dots.forEach(function (dot, dotIndex) {
                dot.classList.toggle('blog__dot--active', dotIndex === current);
            });
        };

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goToSlide(Number(dot.dataset.idx || 0));
            });
        });

        track.addEventListener('touchstart', function (event) {
            touchStartX = event.touches[0].clientX;
        }, { passive: true });

        track.addEventListener('touchend', function (event) {
            const diff = touchStartX - event.changedTouches[0].clientX;

            if (Math.abs(diff) < 40) {
                return;
            }

            const next = diff > 0
                ? current + 1
                : current - 1;

            goToSlide(next);
        }, { passive: true });

        window.addEventListener('resize', function () {
            goToSlide(current);
        });

        goToSlide(0);
    });
});
</script>