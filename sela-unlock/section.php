<?php
defined( 'ABSPATH' ) || exit;

$title    = (string) ( $settings['title']    ?? "Unlock Your Cloud's Full Potential with Sela" );
$subtitle = (string) ( $settings['subtitle'] ?? '' );
$ph_first = (string) ( $settings['placeholder_first']   ?? 'First Name*' );
$ph_last  = (string) ( $settings['placeholder_last']    ?? 'Last Name*' );
$ph_email = (string) ( $settings['placeholder_email']   ?? 'Business Email*' );
$ph_co    = (string) ( $settings['placeholder_company'] ?? 'Company*' );
$ph_phone = (string) ( $settings['placeholder_phone']   ?? 'Phone Number*' );
$submit_t = (string) ( $settings['submit_text']         ?? 'Get Started Now' );
$action   = (string) ( $settings['form_action']         ?? '#' );
$privacy  = (string) ( $settings['privacy']             ?? '' );
$show_dots = ! empty( $settings['show_dots'] );

$tag_t = function_exists( 'hero_pick_tag' ) ? hero_pick_tag( (string) ( $settings['title_tag'] ?? 'auto' ), 'h2' ) : 'h2';
$uid   = 'slun-' . esc_attr( $section['id'] ?? uniqid( 'sec', true ) );
?>
<style>
#<?php echo $uid; ?> {
    --slun-bg: <?php echo esc_attr( $settings['bg_color']     ?? '#fff' ); ?>;
    --slun-title: <?php echo esc_attr( $settings['title_color']  ?? '#1c1c1c' ); ?>;
    --slun-sub: <?php echo esc_attr( $settings['sub_color']    ?? '#1c1c1c' ); ?>;
    --slun-btn-bg: <?php echo esc_attr( $settings['btn_bg']       ?? '#00dbe9' ); ?>;
    --slun-btn: <?php echo esc_attr( $settings['btn_color']    ?? '#1c1c1c' ); ?>;
    --slun-input-border: <?php echo esc_attr( $settings['input_border'] ?? '#e5e5e5' ); ?>;
    --slun-dot-1: <?php echo esc_attr( $settings['dot_1'] ?? '#3dba7e' ); ?>;
    --slun-dot-2: <?php echo esc_attr( $settings['dot_2'] ?? '#f191a1' ); ?>;
    --slun-dot-3: <?php echo esc_attr( $settings['dot_3'] ?? '#00dbe9' ); ?>;
    --slun-dot-4: <?php echo esc_attr( $settings['dot_4'] ?? '#0071f6' ); ?>;
    --slun-ff: <?php echo (string) ( $settings['ff'] ?? "'Lexend', sans-serif" ); ?>;
    --slun-fz-title: <?php echo (int) ( $settings['fz_title_d'] ?? 45 ); ?>px;
    --slun-fz-sub: <?php echo (int) ( $settings['fz_sub_d']   ?? 25 ); ?>px;
    --slun-pad-y: <?php echo (int) ( $settings['pad_y'] ?? 100 ); ?>px;
}
@media (max-width: 768px) {
    #<?php echo $uid; ?> {
        --slun-fz-title: <?php echo (int) ( $settings['fz_title_m'] ?? 28 ); ?>px;
        --slun-pad-y: 35px;
    }
}
</style>

<section class="slun-section" id="<?php echo $uid; ?>">
    <div class="slun-wrap">
        <div class="slun-inner">
            <div class="slun-left">
                <?php if ( $show_dots ) : ?>
                    <div class="slun-dots">
                        <span class="slun-dot slun-dot--1"></span>
                        <span class="slun-dot slun-dot--2"></span>
                        <span class="slun-dot slun-dot--3"></span>
                        <span class="slun-dot slun-dot--4"></span>
                    </div>
                <?php endif; ?>
                <<?php echo $tag_t; ?> class="slun-title"><?php echo wp_kses_post( $title ); ?></<?php echo $tag_t; ?>>
                <?php if ( $subtitle !== '' ) : ?>
                    <p class="slun-sub"><?php echo wp_kses_post( $subtitle ); ?></p>
                <?php endif; ?>
            </div>
            <div class="slun-right">
                <form class="slun-form" action="<?php echo esc_url( $action ); ?>" method="post">
                    <div class="slun-row">
                        <input type="text"  class="slun-input" placeholder="<?php echo esc_attr( $ph_first ); ?>" name="first_name">
                        <input type="text"  class="slun-input" placeholder="<?php echo esc_attr( $ph_last ); ?>"  name="last_name">
                    </div>
                    <input type="email" class="slun-input" placeholder="<?php echo esc_attr( $ph_email ); ?>" name="email">
                    <input type="text"  class="slun-input" placeholder="<?php echo esc_attr( $ph_co );    ?>" name="company">
                    <input type="tel"   class="slun-input" placeholder="<?php echo esc_attr( $ph_phone ); ?>" name="phone">
                    <button type="submit" class="slun-btn">
                        <?php echo esc_html( $submit_t ); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 20 18" fill="none">
                            <path d="M11.6795 14.4546L18.3049 8.62664L11.8943 2.66199" stroke="currentColor"/>
                            <path d="M0 8.62659L18.1001 8.62659" stroke="currentColor"/>
                        </svg>
                    </button>
                    <?php if ( $privacy !== '' ) : ?>
                        <p class="slun-privacy"><?php echo wp_kses_post( $privacy ); ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</section>
