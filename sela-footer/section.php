<?php
defined('ABSPATH') || exit;

$logo_alt = (string)($settings['logo_alt'] ?? 'Sela');

$contact_email = (string)($settings['contact_email'] ?? 'info@selacloud.com');
$contact_email_link = (string)($settings['contact_email_link'] ?? 'mailto:info@selacloud.com');

$contact_phone_1 = (string)($settings['contact_phone_1'] ?? 'US: +1 484-369-0439');
$contact_phone_1_link = (string)($settings['contact_phone_1_link'] ?? 'tel:+14843690439');

$contact_phone_2 = (string)($settings['contact_phone_2'] ?? 'Israel: +972 3-6176666');
$contact_phone_2_link = (string)($settings['contact_phone_2_link'] ?? 'tel:+97236176666');

$copy_text = (string)($settings['copy_text'] ?? 'Copyright © 2025 – Sela cloud solution');

$show_robot = !empty($settings['show_robot']);
$show_socials = !empty($settings['show_socials']);
$show_certs = !empty($settings['show_certs']);
$show_divider = !empty($settings['show_divider']);

$bg_section = (string)($settings['bg_section'] ?? '#1c1c1c');
$color_text = (string)($settings['color_text'] ?? '#ffffff');
$color_muted = (string)($settings['color_muted'] ?? '#7f7f7f');
$color_link = (string)($settings['color_link'] ?? '#ffffff');
$color_divider = (string)($settings['color_divider'] ?? '#262626');

$ff_base = (string)($settings['ff_base'] ?? "'Lexend', sans-serif");
$fw_col_h = (string)($settings['fw_col_h'] ?? '500');

$fz_col_h_d = (int)($settings['fz_col_h_d'] ?? 15);
$fz_col_h_m = (int)($settings['fz_col_h_m'] ?? 14);
$fz_link_d = (int)($settings['fz_link_d'] ?? 12);
$fz_link_m = (int)($settings['fz_link_m'] ?? 13);
$fz_copy = (int)($settings['fz_copy'] ?? 12);

$pad_y_top = (int)($settings['pad_y_top'] ?? 64);
$pad_y_bottom = (int)($settings['pad_y_bottom'] ?? 32);

$logo_height_d = (int)($settings['logo_height_d'] ?? 25);
$social_size = (int)($settings['social_size'] ?? 33);
$cert_height = (int)($settings['cert_height'] ?? 50);

$source = (string)($section['source'] ?? '');
$type = (string)($section['type'] ?? 'sela-footer');
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

$parse_links = function (string $raw): array {
    $items = array();

    foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
        $line = trim($line);

        if ($line === '') {
            continue;
        }

        $parts = array_map('trim', explode('|', $line, 2));
        $label = $parts[0] ?? '';
        $url = $parts[1] ?? '#';

        if ($label === '') {
            continue;
        }

        $items[] = array(
            'label' => $label,
            'url' => $url,
        );
    }

    return $items;
};

$footer_columns = array();
$social_links = array();
$cert_badges = array();
$legal_links = array();

foreach (($blocks ?? array()) as $block) {
    $block_type = (string)($block['type'] ?? '');
    $block_settings = (array)($block['settings'] ?? []);

    if ($block_type === 'footer-column') {
        $footer_columns[] = array(
            'title' => (string)($block_settings['title'] ?? ''),
            'links' => $parse_links((string)($block_settings['links'] ?? '')),
        );
    }

    if ($block_type === 'social-link') {
        $social_links[] = array(
            'icon' => (string)($block_settings['icon'] ?? ''),
            'alt' => (string)($block_settings['alt'] ?? ''),
            'url' => (string)($block_settings['url'] ?? '#'),
        );
    }

    if ($block_type === 'cert-badge') {
        $cert_badges[] = array(
            'image' => (string)($block_settings['image'] ?? ''),
            'alt' => (string)($block_settings['alt'] ?? ''),
        );
    }

    if ($block_type === 'legal-link') {
        $legal_links[] = array(
            'text' => (string)($block_settings['text'] ?? ''),
            'url' => (string)($block_settings['url'] ?? '#'),
        );
    }
}

if (empty($footer_columns)) {
    $footer_columns = array(
        array(
            'title' => 'Solutions',
            'links' => $parse_links('devOps as a service|#
Cloud Migration|#
GenAI Solutions|#
FinOps|#
Security|#'),
        ),
        array(
            'title' => 'Products',
            'links' => $parse_links('SavePro|#
Cloud Innovation Store|#
Support Portal|#
Resources|#
Partners|#'),
        ),
        array(
            'title' => 'Company',
            'links' => $parse_links('About|#
Blog|#
Media and News|#
Careers|#
Contact|#'),
        ),
    );
}

if (empty($social_links)) {
    $social_links = array(
        array(
            'icon' => $media_base !== '' ? esc_url($media_base . 'social-linkedin.svg') : '',
            'alt' => 'LinkedIn',
            'url' => '#',
        ),
        array(
            'icon' => $media_base !== '' ? esc_url($media_base . 'social-twitter.svg') : '',
            'alt' => 'Twitter',
            'url' => '#',
        ),
        array(
            'icon' => $media_base !== '' ? esc_url($media_base . 'social-fb.svg') : '',
            'alt' => 'Facebook',
            'url' => '#',
        ),
        array(
            'icon' => $media_base !== '' ? esc_url($media_base . 'social-yt.svg') : '',
            'alt' => 'YouTube',
            'url' => '#',
        ),
    );
}

if (empty($cert_badges)) {
    $cert_badges = array(
        array(
            'image' => $media_base !== '' ? esc_url($media_base . 'iso27001.png') : '',
            'alt' => 'ISO 27001',
        ),
        array(
            'image' => $media_base !== '' ? esc_url($media_base . 'iso9001.png') : '',
            'alt' => 'ISO 9001',
        ),
    );
}

if (empty($legal_links)) {
    $legal_links = array(
        array(
            'text' => 'Privacy Policy',
            'url' => '#',
        ),
        array(
            'text' => 'Terms of Service',
            'url' => '#',
        ),
        array(
            'text' => 'Cookie Policy',
            'url' => '#',
        ),
        array(
            'text' => 'Code of Ethics',
            'url' => '#',
        ),
        array(
            'text' => 'Accessibility',
            'url' => '#',
        ),
    );
}

$uid = 'footer-' . esc_attr($section['id'] ?? uniqid('section', true));
?>

<style>
#<?php echo $uid; ?> {
    --footer-bg: <?php echo esc_attr($bg_section); ?>;
    --footer-text: <?php echo esc_attr($color_text); ?>;
    --footer-muted: <?php echo esc_attr($color_muted); ?>;
    --footer-link: <?php echo esc_attr($color_link); ?>;
    --footer-divider: <?php echo esc_attr($color_divider); ?>;
    --footer-font: <?php echo esc_attr($ff_base); ?>;
    --footer-col-title-weight: <?php echo esc_attr($fw_col_h); ?>;
    --footer-col-title-size: <?php echo esc_attr($fz_col_h_d); ?>px;
    --footer-link-size: <?php echo esc_attr($fz_link_d); ?>px;
    --footer-copy-size: <?php echo esc_attr($fz_copy); ?>px;
    --footer-padding-top: <?php echo esc_attr($pad_y_top); ?>px;
    --footer-padding-bottom: <?php echo esc_attr($pad_y_bottom); ?>px;
    --footer-logo-height: <?php echo esc_attr($logo_height_d); ?>px;
    --footer-social-size: <?php echo esc_attr($social_size); ?>px;
    --footer-cert-height: <?php echo esc_attr($cert_height); ?>px;
}

@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --footer-col-title-size: <?php echo esc_attr($fz_col_h_m); ?>px;
        --footer-link-size: <?php echo esc_attr($fz_link_m); ?>px;
    }
}
</style>

<footer class="footer" id="<?php echo $uid; ?>">
	    <div class="wrap">
			   <?php if ($show_robot) : ?>
                        <img class="footer__robot_mobile" src="<?php echo $get_img('image_robot', 'footer-robot.png'); ?>" alt="" aria-hidden="true">
                    <?php endif; ?>

        <div class="footer__top">
            <div class="footer__brand">
                <img src="<?php echo $get_img('image_logo', 'footer-logo.png'); ?>" alt="<?php echo esc_attr($logo_alt); ?>" class="footer__logo">
            </div>

            <div class="footer__middle">
                <div class="footer__cols">
                    <?php foreach ($footer_columns as $column) : ?>
                        <div class="footer__col">
                            <h4 class="footer__col-h"><?php echo esc_html($column['title']); ?></h4>

                            <?php if (!empty($column['links'])) : ?>
                                <ul>
                                    <?php foreach ($column['links'] as $link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url($link['url']); ?>">
                                                <?php echo esc_html($link['label']); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="footer__aside">
                    <?php if ($show_robot) : ?>
                        <img class="footer__robot" src="<?php echo $get_img('image_robot', 'footer-robot.png'); ?>" alt="" aria-hidden="true">
                    <?php endif; ?>

                    <div class="footer__contact">
                        <ul class="footer__contact-list">
                            <?php if ($contact_email !== '') : ?>
                                <li>
                                    <a href="<?php echo esc_url($contact_email_link); ?>">
                                        <?php echo esc_html($contact_email); ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if ($contact_phone_1 !== '') : ?>
                                <li>
                                    <a href="<?php echo esc_url($contact_phone_1_link); ?>">
                                        <?php echo esc_html($contact_phone_1); ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if ($contact_phone_2 !== '') : ?>
                                <li>
                                    <a href="<?php echo esc_url($contact_phone_2_link); ?>">
                                        <?php echo esc_html($contact_phone_2); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <?php if ($show_socials && !empty($social_links)) : ?>
                        <div class="footer__social">
                            <?php foreach ($social_links as $social) : ?>
                                <?php if (!empty($social['icon'])) : ?>
                                    <a href="<?php echo esc_url($social['url']); ?>" aria-label="<?php echo esc_attr($social['alt']); ?>">
                                        <img src="<?php echo esc_url($social['icon']); ?>" alt="<?php echo esc_attr($social['alt']); ?>">
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ($show_divider) : ?>
            <div class="footer__divider"></div>
        <?php endif; ?>

        <div class="footer__bottom">
            <p class="footer__copy">
                <?php echo esc_html($copy_text); ?>

                <?php if (!empty($legal_links)) : ?>
                    <span class="footer__copy-legal">
                        <?php foreach ($legal_links as $legal_link) : ?>
                            <?php if (!empty($legal_link['text'])) : ?>
                                &nbsp;&nbsp;
                                <a href="<?php echo esc_url($legal_link['url']); ?>">
                                    <?php echo esc_html($legal_link['text']); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </span>
                <?php endif; ?>
            </p>

            <?php if ($show_certs && !empty($cert_badges)) : ?>
                <div class="footer__certs">
                    <?php foreach ($cert_badges as $badge) : ?>
                        <?php if (!empty($badge['image'])) : ?>
                            <img src="<?php echo esc_url($badge['image']); ?>" alt="<?php echo esc_attr($badge['alt']); ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<script>
document.addEventListener('click', function (event) {
    const heading = event.target.closest('#<?php echo esc_js($uid); ?> .footer__col-h');

    if (!heading || window.innerWidth > 768) {
        return;
    }

    const column = heading.closest('.footer__col');

    if (!column) {
        return;
    }

    column.classList.toggle('open');
});
</script>