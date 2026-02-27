<?php

function cb_cv_setup()
{
    add_theme_support('title-tag'); // Permet à WordPress de gérer le titre de la page automatiquement

    add_theme_support('post-thumbnails'); // Active le support des images à la une (featured images)

    add_image_size('custom-size', 350, 215, true); // Définit une nouvelle taille d'image personnalisée (800x600 pixels, recadrée)

    register_nav_menus(array( // Enregistre les emplacements de menus de navigation
        'menu-principal' => 'Menu de Navigation Principal',
        'footer-menu'    => 'Menu de Navigation Footer',
    ));
}

function cb_cv_custom_box(){
    add_meta_box('cv_sponso', 'Sponsoring', 'cv_rendez_sponso_box', 'post');
    add_meta_box('dwwm_fields', 'Contenu DWWM', 'dwwm_render_box', 'page');
}

function cv_rendez_sponso_box ($post){
    echo 'salut les gens';
}

function dwwm_render_box($post) {
    $a_propos = get_post_meta($post->ID, 'a_propos', true);
    $passions = get_post_meta($post->ID, 'passions_loisirs', true);
    $formation = get_post_meta($post->ID, 'formation', true);
    $dwwm_competences = get_post_meta($post->ID, 'dwwm_competences', true);
    $dwwm_avantages = get_post_meta($post->ID, 'dwwm_avantages', true);
    $debouches = get_post_meta($post->ID, 'debouches', true);
    
    wp_nonce_field('dwwm_save', 'dwwm_nonce');
    ?>
    
    <style>
        .dwwm-field { margin-bottom: 20px; }
        .dwwm-field label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        .dwwm-field textarea { width: 100%; min-height: 100px; padding: 10px; border: 1px solid #ddd; }
    </style>
    
    <div class="dwwm-field">
        <label for="a_propos">À Propos</label>
        <textarea name="a_propos" id="a_propos" placeholder="Présentez-vous..."><?php echo esc_textarea($a_propos); ?></textarea>
    </div>
    
    <div class="dwwm-field">
        <label for="passions_loisirs">Passions & Loisirs</label>
        <textarea name="passions_loisirs" id="passions_loisirs" placeholder="Vos centres d'intérêts..."><?php echo esc_textarea($passions); ?></textarea>
    </div>
    
    <div class="dwwm-field">
        <label for="formation">Formation</label>
        <textarea name="formation" id="formation" placeholder="Votre formation..."><?php echo esc_textarea($formation); ?></textarea>
    </div>
    
    <div class="dwwm-field">
        <label for="dwwm_competences">DWWM - Compétences acquises</label>
        <textarea name="dwwm_competences" id="dwwm_competences" placeholder="Les compétences acquises..."><?php echo esc_textarea($dwwm_competences); ?></textarea>
    </div>
    
    <div class="dwwm-field">
        <label for="dwwm_avantages">DWWM - Avantages CCI</label>
        <textarea name="dwwm_avantages" id="dwwm_avantages" placeholder="Les avantages de la CCI (salles équipées, intervenants, diplômes reconnus, ambiance...)..."><?php echo esc_textarea($dwwm_avantages); ?></textarea>
    </div>
    
    <div class="dwwm-field">
        <label for="debouches">Débouchés - Les métiers</label>
        <textarea name="debouches" id="debouches" placeholder="Les métiers et débouchés..."><?php echo esc_textarea($debouches); ?></textarea>
    </div>
    
    <?php
}

function dwwm_save_meta($post_id) {
    if (!isset($_POST['dwwm_nonce']) || !wp_verify_nonce($_POST['dwwm_nonce'], 'dwwm_save')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = ['a_propos', 'passions_loisirs', 'formation', 'dwwm_competences', 'dwwm_avantages', 'debouches'];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
        }
    }
}




add_action('after_setup_theme', 'cb_cv_setup');
add_action('add_meta_boxes', 'cb_cv_custom_box');
add_action('save_post_page', 'dwwm_save_meta');


