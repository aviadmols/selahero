<?php
defined('ABSPATH') || exit;

$headline = (string) ($settings['headline'] ?? 'Want your cloud better and faster?');
$subtitle = (string) ($settings['subtitle'] ?? '');

$media_base = '';
if (($section['source'] ?? '') === 'uploads') {
    $u = wp_upload_dir();
    $media_base = trailingslashit($u['baseurl']) . 'hero/sections/' . sanitize_key((string) ($section['type'] ?? 'sela-products')) . '/media/';
}

$default_icon = $media_base
    ? esc_url($media_base . 'product-icon-bag.svg')
    : 'https://selacloud.ussl.co/wp-content/uploads/hero/sections/sela-products/media/product-icon-bag.svg';

$resolve_icon = static function (string $icon) use ($default_icon): string {
    $icon = trim($icon);

    return $icon !== '' ? esc_url($icon) : $default_icon;
};

$has_cta_link = static function (string $link): bool {
    $link = trim($link);

    return $link !== '' && $link !== '#' && strtolower($link) !== 'javascript:void(0)';
};

$cards = array();

foreach (($blocks ?? array()) as $block) {
    if ((string) ($block['type'] ?? '') !== 'product-card') {
        continue;
    }

    $bs = (array) ($block['settings'] ?? array());
    $name = trim((string) ($bs['name'] ?? ''));

    if ($name === '') {
        continue;
    }

    $cards[] = array(
        'name' => $name,
        'desc' => (string) ($bs['desc'] ?? ''),
        'cta' => (string) ($bs['cta'] ?? 'Get Started'),
        'link' => trim((string) ($bs['link'] ?? '')),
        'icon' => $resolve_icon((string) ($bs['icon'] ?? '')),
        'icon_size_d' => max(16, (int) ($bs['icon_size_d'] ?? 33)),
        'icon_size_m' => max(16, (int) ($bs['icon_size_m'] ?? 33)),
        'accent' => (string) ($bs['accent'] ?? 'blue'),
    );
}

// Legacy fallback: card_1 / card_2 / card_3 settings from older schema.
if (empty($cards)) {
    for ($i = 1; $i <= 3; $i++) {
        $name = trim((string) ($settings["card_{$i}_name"] ?? ''));

        if ($name === '') {
            continue;
        }

        $icon = trim((string) ($settings["card_{$i}_icon"] ?? ''));

        $cards[] = array(
            'name' => $name,
            'desc' => (string) ($settings["card_{$i}_desc"] ?? ''),
            'cta' => (string) ($settings["card_{$i}_cta"] ?? 'Get Started'),
            'link' => trim((string) ($settings["card_{$i}_link"] ?? '')),
            'icon' => $resolve_icon($icon),
            'icon_size_d' => max(16, (int) ($settings["card_{$i}_icon_size_d"] ?? 33)),
            'icon_size_m' => max(16, (int) ($settings["card_{$i}_icon_size_m"] ?? 33)),
            'accent' => (string) ($settings["card_{$i}_accent"] ?? 'blue'),
        );
    }
}

$tag_h = function_exists('hero_pick_tag')
    ? hero_pick_tag((string) ($settings['headline_tag'] ?? 'auto'), 'h2')
    : 'h2';

$uid = 'slpr-' . esc_attr($section['id'] ?? uniqid('sec', true));
?>
<style>
#<?php echo $uid; ?> {
    --slpr-bg: <?php echo esc_attr($settings['bg_color'] ?? '#ffffff'); ?>;
    --slpr-text: <?php echo esc_attr($settings['text_color'] ?? '#1c1c1c'); ?>;
    --slpr-sub: <?php echo esc_attr($settings['sub_color'] ?? '#676767'); ?>;
    --slpr-ff: <?php echo (string) ($settings['ff'] ?? "'Lexend', sans-serif"); ?>;
    --slpr-fz-h: <?php echo (int) ($settings['fz_h_d'] ?? 38); ?>px;
    --slpr-fz-sub: <?php echo (int) ($settings['fz_sub_d'] ?? 18); ?>px;
    --slpr-fz-name: <?php echo (int) ($settings['fz_name'] ?? 28); ?>px;
    --slpr-pad-y: <?php echo (int) ($settings['pad_y'] ?? 100); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slpr-fz-h: <?php echo (int) ($settings['fz_h_m'] ?? 26); ?>px;
        --slpr-fz-sub: <?php echo (int) ($settings['fz_sub_m'] ?? 15); ?>px;
        --slpr-pad-y: 35px;
    }
}
</style>

<section class="slpr-section hero-section--sela-products" id="<?php echo $uid; ?>">
    <div class="slpr-wrap">
        <<?php echo $tag_h; ?> class="slpr-headline"><?php echo wp_kses_post($headline); ?></<?php echo $tag_h; ?>>
        <?php if ($subtitle !== '') : ?>
            <p class="slpr-sub"><?php echo wp_kses_post($subtitle); ?></p>
        <?php endif; ?>

        <div class="slpr-grid">
            <?php foreach ($cards as $card) :
                $accent = preg_replace('/[^a-z]/', '', strtolower((string) ($card['accent'] ?? 'blue')));
                if ($accent === '') {
                    $accent = 'blue';
                }
                $icon_d = (int) $card['icon_size_d'];
                $icon_m = (int) $card['icon_size_m'];
                $show_cta = $has_cta_link((string) ($card['link'] ?? ''));
                ?>
                <div class="slpr-card" data-product-card style="--slpr-icon-d: <?php echo $icon_d; ?>px; --slpr-icon-m: <?php echo $icon_m; ?>px;">
                    <div class="slpr-card-content">
                        <?php if (!empty($card['icon'])) : ?>
                            <img src="<?php echo esc_url($card['icon']); ?>" alt="" class="slpr-icon">
                        <?php endif; ?>
                        <h3 class="slpr-name slpr-name--<?php echo esc_attr($accent); ?>"><?php echo esc_html($card['name']); ?></h3>
                        <?php if (($card['desc'] ?? '') !== '') : ?>
                            <p class="slpr-desc"><?php echo wp_kses_post($card['desc']); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ($show_cta) : ?>
                        <a href="<?php echo esc_url($card['link']); ?>" class="slpr-cta"><?php echo esc_html($card['cta'] !== '' ? $card['cta'] : 'Get Started'); ?></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
