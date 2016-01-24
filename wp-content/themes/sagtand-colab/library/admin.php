<?php
/*
Admin specific functions
*/


/**
 * Add a FAQ widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function ffda_faq_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'ffda_faq_dashboard_widget',         // Widget slug.
                 'Vanliga frågor',         // Title.
                 'ffda_faq_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'ffda_faq_dashboard_widgets' );

/* Write your most frequent questions in the ol-list width an hash-link to the correct h2-tag with the same id. */
function ffda_faq_dashboard_widget_function() {
	$html  = '<style>
				#ffda_faq_dashboard_widget h1 { 
					background: #333; 
					color: #fff; 
					padding: 0.5em;
				}
				#ffda_faq_dashboard_widget li {
					margin-bottom:0; 
					list-style:decimal; 
					list-style-position: inside;
				} 
				#ffda_faq_dashboard_widget .questions li {
					background: #f2f2f2;
				}
				#ffda_faq_dashboard_widget ol {
					margin-left:0;
				}
				#ffda_faq_dashboard_widget .answers ol {
					counter-reset: foo;
    				display: table;
				}
				#ffda_faq_dashboard_widget .answers li {
					list-style: none;
				    counter-increment: foo;
				    display: table-row;
			        line-height: 1.5em;
				}
				#ffda_faq_dashboard_widget .answers li:before {
					content: counter(foo) ".";
				    display: table-cell;
				    text-align: right;
				    padding-right: .3em;
				}
				#ffda_faq_dashboard_widget ol a {
					transition: all 0.3s; 
				} 
				#ffda_faq_dashboard_widget .questions ol a {
					display: block;
					padding: 0.5em; 
					border-bottom: 1px solid #ddd; 
				} 
				#ffda_faq_dashboard_widget ol a:hover {
					opacity: 0.5;
				} 
				#ffda_faq_dashboard_widget h2 {
					margin-top: 1em;
				}
			</style>';
	$html .= '<div class="questions">';
		$html .= '<h1>FAQ</h1>';
		$html .= '<ol>';
		$html .= '<li><a href="#fraga-1">Hur byter man ut bakgrundsbilden på startsidan?</a></li>';
		$html .= '<li><a href="#fraga-2">Kontakt - Hantera personal</a></li>';
		$html .= '<li><a href="#fraga-3">Lägga till en användare</a></li>';
		$html .= '<li><a href="#fraga-4">Underhåll - Uppdatera Wordpress & plugins?</a></li>';
		$html .= '</ol>';
	$html .= '</div>';
	$html .= '<div class="answers">';
		$html .= '<h2 id="fraga-1">1. Ändra bakgrundsbilden på startsidan</h2>';
			$html .= '<p><ol>';
				$html .= '<li>Gå till Sidor i huvudmenyn till vänster.</li>';
				$html .= '<li>Välj Hem.</li>';
				$html .= '<li>Scrolla ner en bit och leta efter rubriken "Utvald bild" till vänster. Klicka och välj en ny bild från mediabiblioteket eller ladda upp en ny. Rekommenderad storlek 1920x1280px.</li>';
			$html .= '</ol></p>';
		$html .= '<h2 id="fraga-2">2. Kontaktsidan - Hantera personal</h2>';
			$html .= '<p><ol>';
				$html .= '<li>Gå till Personal i huvudmenyn till vänster.</li>';
				$html .= '<li>Klicka på en befintlig person i listan för att redigera denna, eller klicka på New Personal högst upp.</li>';
				$html .= '<li>Redigera eller fyll i titel samt fälten för kontaktinformations.</li>';
				$html .= '<li>Under rubriken "Utvald bild" till vänster väljer man en profilbild till personen. Klicka och välj en ny bild från mediabiblioteket eller ladda upp en ny. Rekommenderad storlek 350x350px.</li>';
			$html .= '</ol></p>';
		$html .= '<h2 id="fraga-3">3. Lägga till en användare i Wordpress</h2>';
			$html .= '<p><ol>';
				$html .= '<li>Gå till Användare i huvudmenyn till vänster.</li>';
				$html .= '<li>Klicka på en befintlig användare i listan för att redigera denna, eller klicka på Lägg till ny högst upp.</li>';
				$html .= '<li>Fyll i alla obligatoriska uppgifter. Ange ett <a href="https://strongpasswordgenerator.com/">strakt lösenord</a> som innehåller både bokstäver och siffror.</li>';
				$html .= '<li>Ange en giltig e-postadress.</li>';
				$html .= '<li>Välj vilken roll användaren skall ha. Fler än en administratör rekommenderas inte för att.</li>';
			$html .= '</ol></p>';
		$html .= '<h2 id="fraga-4">4. Underhåll - Uppdatera Wordpress & plugins</h2>';
			$html .= '<p><ol>';
				$html .= '<li>Det är viktigt att hålla Wordpress uppdaterat för att hålla säkerheten på topp. Men det finns alltid en risk när systemet uppdateras eftersom Wordpress och installerade plugins måste vara kompatibla med varandra.</li>';
				$html .= '<li>Om backup: Webbhotellet Oderland där sidan ligger, tillhandahåller säkerhetskopior, så det går smidigt att återställa sidan ifall systemet skulle krascha.</li>';
				$html .= '<li>Uppdatera alla plugins innan du uppdaterar Wordpress.</li>';
				$html .= '<li>Plugins uppdateras under fliken Plugins i huvudmenyn till vänster. Det står under varje plugin om det finns en uppdatering tillgänglig.</li>';
				$html .= '<li>Wordpress meddelar på startsidan i kontrollpanelen om det finns en uppdatering tillgänglig. Följ anvisningarna.</li>';
			$html .= '</ol></p>';
		$html .= '</div>';
	echo $html;
}

/**
 * Removes unnaccesary dashboard-widgets
 * @return [type] [description]
 */
function remove_dashboard_meta() {
        //remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/**
 * Removes unnaccesary sidebars-menu-links
 * 
 */
function custom_menu_page_removing() {
    remove_menu_page( 'edit.php' );				// Posts
    remove_menu_page( 'edit-comments.php' );    // Comments
}
add_action( 'admin_menu', 'custom_menu_page_removing' );
?>