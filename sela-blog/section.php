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

$source_mode = (string)($settings['source_mode'] ?? 'auto');
$taxonomy = sanitize_key((string)($settings['taxonomy'] ?? 'post_tag'));

if ($taxonomy === '') {
    $taxonomy = 'post_tag';
}

$slbl_get_tax_query = function (string $tag_slug, string $taxonomy_name): array {
    $tag_slug = sanitize_title($tag_slug);

    if ($tag_slug === '') {
        return array();
    }

    return array(
        array(
            'taxonomy' => $taxonomy_name,
            'field' => 'slug',
            'terms' => array($tag_slug),
        ),
    );
};

$slbl_format_ymd_date = function (string $ymd): string {
    $ymd = preg_replace('/\D/', '', $ymd);

    if (strlen($ymd) !== 8) {
        return '';
    }

    $date = DateTime::createFromFormat('Ymd', $ymd);

    if (!$date instanceof DateTime) {
        return '';
    }

    return wp_date('j M Y', $date->getTimestamp());
};

$slbl_parse_event_date_to_ymd = function ($value): string {
    if (is_array($value)) {
        if (!empty($value['Ymd'])) {
            $value = $value['Ymd'];
        } else {
            $value = reset($value);
        }
    }

    $value = trim((string) $value);

    if ($value === '') {
        return '';
    }

    $digits = preg_replace('/\D/', '', $value);

    if (strlen($digits) === 8) {
        $as_ymd = DateTime::createFromFormat('Ymd', $digits);

        if ($as_ymd instanceof DateTime) {
            return $as_ymd->format('Ymd');
        }

        $as_dmy = DateTime::createFromFormat('dmY', $digits);

        if ($as_dmy instanceof DateTime) {
            return $as_dmy->format('Ymd');
        }
    }

    if (preg_match('/^(\d{4})-(\d{2})-(\d{2})/', $value, $matches)) {
        return $matches[1] . $matches[2] . $matches[3];
    }

    if (preg_match('#^(\d{1,2})/(\d{1,2})/(\d{4})$#', $value, $matches)) {
        $candidates = array(
            sprintf('%02d/%02d/%s', (int) $matches[1], (int) $matches[2], $matches[3]),
            sprintf('%02d/%02d/%s', (int) $matches[2], (int) $matches[1], $matches[3]),
        );

        foreach (array('d/m/Y', 'm/d/Y') as $format) {
            foreach ($candidates as $candidate) {
                $parsed = DateTime::createFromFormat($format, $candidate);

                if ($parsed instanceof DateTime) {
                    return $parsed->format('Ymd');
                }
            }
        }
    }

    $timestamp = strtotime($value);

    if ($timestamp !== false) {
        return wp_date('Ymd', $timestamp);
    }

    return '';
};

$slbl_get_event_date_ymd = function (int $post_id) use ($slbl_parse_event_date_to_ymd): string {
    if (function_exists('get_field')) {
        $raw = get_field('date_of_event', $post_id, false);
        $ymd = $slbl_parse_event_date_to_ymd($raw);

        if ($ymd !== '') {
            return $ymd;
        }

        $value = get_field('date_of_event', $post_id);
    } else {
        $value = get_post_meta($post_id, 'date_of_event', true);
    }

    return $slbl_parse_event_date_to_ymd($value);
};

$slbl_get_event_display_date = function (int $post_id) use ($slbl_get_event_date_ymd, $slbl_format_ymd_date): string {
    return $slbl_format_ymd_date($slbl_get_event_date_ymd($post_id));
};

$slbl_post_to_card = function ($post, string $tag_label, string $date_override = '') use ($slbl_get_event_display_date) {
    if (!$post instanceof WP_Post) {
        return null;
    }

    $image = get_the_post_thumbnail_url($post, 'large');
    $alt = (string) get_post_meta($post->ID, '_wp_attachment_image_alt', true);

    if ($alt === '') {
        $alt = $post->post_title;
    }

    $date = $date_override;

    if ($date === '' && $post->post_type === 'event') {
        $date = $slbl_get_event_display_date((int) $post->ID);
    }

    if ($date === '') {
        $date = get_the_date('j M Y', $post);
    }

    return array(
        'image' => $image ? esc_url($image) : '',
        'image_alt' => $alt,
        'tag' => $tag_label,
        'title' => $post->post_title,
        'date' => $date,
        'url' => get_permalink($post),
    );
};

$cards_from_blocks = function () use ($blocks): array {
    $items = array();

    foreach (($blocks ?? array()) as $block) {
        $block_type = (string)($block['type'] ?? '');
        $block_settings = (array)($block['settings'] ?? []);

        if ($block_type !== 'blog-card') {
            continue;
        }

        $items[] = array(
            'image' => (string)($block_settings['image'] ?? ''),
            'image_alt' => (string)($block_settings['image_alt'] ?? ''),
            'tag' => (string)($block_settings['tag'] ?? ''),
            'title' => (string)($block_settings['title'] ?? ''),
            'date' => (string)($block_settings['date'] ?? ''),
            'url' => (string)($block_settings['url'] ?? ''),
        );
    }

    return $items;
};

$demo_cards = function () use ($get_media): array {
    return array(
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
            'tag' => 'Media and News',
            'title' => 'From Code to Cloud: the SaaS Journey by Sela and Google Cloud Experts',
            'date' => '15 Jul 2025',
            'url' => '#',
        ),
    );
};

$cards_from_wp = function () use (
    $settings,
    $slbl_get_event_display_date,
    $slbl_post_to_card
): array {
    if (!function_exists('wp_date')) {
        return array();
    }

    $event_label = (string)($settings['slot_1_tag_label'] ?? 'Next Event');
    $media_label = (string)($settings['slot_2_tag_label'] ?? 'Media and News');

    $type_labels = array(
        'event' => $event_label,
        'media-news' => $media_label,
        'post' => $media_label,
    );

    // newest content overall (events + posts) by publish date, not one per category
    $query = new WP_Query(array(
        'post_type' => array('event', 'media-news', 'post'),
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'ignore_sticky_posts' => true,
    ));

    if (!$query->have_posts()) {
        wp_reset_postdata();

        return array();
    }

    $items = array();

    while ($query->have_posts()) {
        $query->the_post();
        $post = get_post();

        if (!$post instanceof WP_Post) {
            continue;
        }

        $label = isset($type_labels[$post->post_type]) ? $type_labels[$post->post_type] : $media_label;

        $date_override = '';

        if ($post->post_type === 'event') {
            $date_override = $slbl_get_event_display_date((int) $post->ID);
        }

        $card = $slbl_post_to_card($post, $label, $date_override);

        if ($card !== null) {
            $items[] = $card;
        }
    }

    wp_reset_postdata();

    return $items;
};

$cards = array();

if ($source_mode === 'manual') {
    $cards = $cards_from_blocks();
} else {
    $cards = $cards_from_wp();

    if (empty($cards)) {
        $cards = $cards_from_blocks();
    }
}

if (empty($cards)) {
    $cards = $demo_cards();
}

$track_count = max(1, min(3, count($cards)));

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
            <div class="blog__track blog__track--count-<?php echo (int) $track_count; ?>" data-blog-track>
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
