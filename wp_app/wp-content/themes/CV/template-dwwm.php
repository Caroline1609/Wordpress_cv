<?php

/**
 * Template Name: Page DWWM
 * Template Post Type: page
 */

?>

<?php get_header(); ?>

<main class="dwwm-page">
    
    <!-- SECTION À PROPOS -->
    <section class="dwwm-section">
        <h2>À Propos</h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'a_propos', true); ?>
        </div>
    </section>

    <!-- SECTION PASSIONS & LOISIRS -->
    <section class="dwwm-section">
        <h2>Passions & Loisirs</h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'passions_loisirs', true); ?>
        </div>
    </section>

    <!-- SECTION FORMATION -->
    <section class="dwwm-section">
        <h2>Formation</h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'formation', true); ?>
        </div>
    </section>

    <!-- SECTION DWWM - COMPETENCES -->
    <section class="dwwm-section dwwm-highlight">
        <h2>DWWM - Développeur Web et Applications Mobiles</h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'dwwm_competences', true); ?>
        </div>
        <div class="dwwm-avantages">
            <h3>Avantages de la CCI :</h3>
            <?php echo get_post_meta(get_the_ID(), 'dwwm_avantages', true); ?>
        </div>
    </section>

    <!-- SECTION DÉBOUCHÉS -->
    <section class="dwwm-section">
        <h2>Débouchés - Les métiers</h2>
        <div class="section-content">
            <?php echo get_post_meta(get_the_ID(), 'debouches', true); ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>