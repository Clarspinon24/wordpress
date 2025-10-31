<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** CSS child dépend du parent */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        [ 'astra-theme-css' ],
        wp_get_theme()->get( 'Version' )
    );
}, 20 );

/** Kill tout le footer Astra puis injecter le tien */
add_action( 'wp', function () {
    // Supprime toutes les callbacks déjà ajoutées au hook astra_footer
    remove_all_actions( 'astra_footer' );

    // Ajoute TON footer
    add_action( 'astra_footer', 'astra_child_footer_markup', );
} );

add_filter('wp_nav_menu_primary_items',function($items){
    $items = str_replace('Home','Accueil',$items);
    $items = str_replace('Services',"Centre d'intérêt",$items);
    $items = str_replace('About','UX-UI',$items);
    $items = str_replace('Reviews','Citation',$items);
    $items = str_replace('Why Us','Vous',$items);

    return $items;
});






function astra_child_footer_markup() { ?>
<div class="contenu">
    <footer class="site-footer ast-container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4>À propos</h4>
                <p>Coucou ^^</p>
            </div>
            <div class="footer-col">
                <h4>Liens</h4>
                <ul>
                    <li><a href="http://portefolio-clara.local"><p>Centre d'intérêt</p></a></li>
                    <li><a href="http://portefolio-clara.local/sample-page/"><p>Expérience</p></a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Suivez-nous</h4>
                <p class="copy">© <?php echo date('Y'); ?> — Mon Entreprise</p>
            </div>
        </div>
    </footer>
</div>
<?php }


