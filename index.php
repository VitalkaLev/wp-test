<?php get_header();

$cta_content = get_field('acf_cta_form','option');
$cta_text = get_field('acf_cta_text','option');
$form = get_field('acf_cta_ form_shortcode','option');

?>

<main class="main">
    <?php if ( isset($form) && !empty($form) ) { ?>
        <section class="cta">
            <div class="cta__wrapper">
                <div class="cta__content">
                    <div class="cta__content-decor">
                        <img width="114px" height="114px" class="cta__content-decor-1" src="<?php echo PATH_URL; ?>/assets/src/images/decor-1.png" alt="<?php _e('decor', THEME); ?>" loading="lazy">
                        <img width="87px" height="87px" class="cta__content-decor-2" src="<?php echo PATH_URL; ?>/assets/src/images/decor-2.png" alt="<?php _e('decor', THEME); ?>" loading="lazy">
                        <svg width="585" height="585" viewBox="0 0 585 585" fill="none" xmlns="http://www.w3.org/2000/svg" loading="lazy">
                            <path d="M0.445686 526.554C0.445686 493.825 26.1618 468.109 58.8914 468.109C91.621 468.109 117.337 493.825 117.337 526.554C117.337 493.825 143.053 468.109 175.783 468.109C208.512 468.109 234.228 493.825 234.228 526.554C234.228 493.825 259.945 468.109 292.674 468.109C325.404 468.109 351.12 493.825 351.12 526.554C351.12 493.825 376.836 468.109 409.565 468.109C468.011 468.109 468.011 468.109 468.011 409.663C468.011 351.217 468.011 351.217 409.565 351.217C395.539 351.217 382.68 346.542 373.329 338.359C333.586 314.981 312.546 304.461 292.674 304.461C272.803 304.461 252.931 314.981 212.019 338.359C202.668 346.542 189.81 351.217 175.783 351.217C143.053 351.217 117.337 325.501 117.337 292.772C117.337 234.326 117.337 234.326 58.8914 234.326C26.1618 234.326 0.445686 208.61 0.445686 175.88C0.445686 143.151 26.1618 117.435 58.8914 117.435C117.337 117.435 117.337 117.435 117.337 58.9888C117.337 26.2592 143.053 0.543152 175.783 0.543152C208.512 0.543152 234.228 26.2592 234.228 58.9888C234.228 26.2592 259.945 0.543152 292.674 0.543152C325.404 0.543152 351.12 26.2592 351.12 58.9888C351.12 26.2592 376.836 0.543152 409.565 0.543152C442.295 0.543152 468.011 26.2592 468.011 58.9888C468.011 26.2592 493.727 0.543152 526.457 0.543152C559.186 0.543152 584.903 26.2592 584.903 58.9888C584.903 91.7184 559.186 117.435 526.457 117.435C493.727 117.435 468.011 91.7184 468.011 58.9888C468.011 91.7184 442.295 117.435 409.565 117.435C376.836 117.435 351.12 91.7184 351.12 58.9888C351.12 91.7184 325.404 117.435 292.674 117.435C259.945 117.435 234.228 91.7184 234.228 58.9888C234.228 91.7184 208.512 117.435 175.783 117.435C117.337 117.435 117.337 117.435 117.337 175.88C117.337 234.326 117.337 234.326 175.783 234.326C189.81 234.326 202.668 239.002 212.019 247.184C252.931 269.393 272.803 281.082 292.674 281.082C312.546 281.082 333.586 269.393 373.329 247.184C382.68 239.002 395.539 234.326 409.565 234.326C442.295 234.326 468.011 260.042 468.011 292.772C468.011 351.217 468.011 351.217 526.457 351.217C559.186 351.217 584.903 376.933 584.903 409.663C584.903 442.393 559.186 468.109 526.457 468.109C468.011 468.109 468.011 468.109 468.011 526.554C468.011 559.284 442.295 585 409.565 585C376.836 585 351.12 559.284 351.12 526.554C351.12 559.284 325.404 585 292.674 585C259.945 585 234.228 559.284 234.228 526.554C234.228 559.284 208.512 585 175.783 585C143.053 585 117.337 559.284 117.337 526.554C117.337 559.284 91.621 585 58.8914 585C26.1618 585 0.445686 559.284 0.445686 526.554Z" fill="#DAE2F4"/>
                        </svg>
                    </div>
                    <div class="cta__content-text">
                        <?php echo theme_text( $cta_text ); ?>
                    </div>
                </div>
                <div class="cta__form">
                    <?php 
                        echo do_shortcode( theme_text( $cta_content ) );
                        echo do_shortcode( $form );
                    ?>
                </div>
            </div>
            <div class="cta__popup hidden">
                <div class="cta__popup__wrapper">
                    <div class="cta__popup__button">
                        <button class="btn btn-close">
                            <?php _e('Закрити', THEME); ?> 
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.21851 2L13.4999 14.2814" stroke="#6F6F72" stroke-linecap="round"/>
                                <path d="M13.272 2L0.990552 14.2814" stroke="#6F6F72" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="cta__popup__content">
                        <img width="62px" height="62px" class="cta__popup-decor" src="<?php echo PATH_URL; ?>/assets/src/images/popup-decor.svg" alt="<?php _e('decor', THEME); ?>" loading="lazy">
                        <div class="cta__popup__text">
                            <p><?php _e('Ваш запит надіслано', THEME); ?></p>
                            <h2><?php _e('Дякуємо, <br> що довіряєте!', THEME); ?></h2>  
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>

<?php get_footer(); ?>
