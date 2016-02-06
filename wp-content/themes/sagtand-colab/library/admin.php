<?php
/*
Admin specific functions
*/


/**
 * Add a FAQ widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function sagtand_faq_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'sagtand_faq_dashboard_widget',         // Widget slug.
                 'Frequent Answered Questions',       // Title.
                 'sagtand_faq_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'sagtand_faq_dashboard_widgets' );

/* Write your most frequent questions in the ol-list width an hash-link to the correct h2-tag with the same id. */
function sagtand_faq_dashboard_widget_function() {
	$html  = '<style>
				#sagtand_faq_dashboard_widget h1 { 
					background: #333; 
					color: #fff; 
					padding: 0.5em;
				}
				#sagtand_faq_dashboard_widget li {
					margin-bottom:0; 
					list-style:decimal; 
					list-style-position: inside;
				} 
				#sagtand_faq_dashboard_widget .questions li {
					background: #f2f2f2;
				}
				#sagtand_faq_dashboard_widget ol {
					margin-left:0;
				}
				#sagtand_faq_dashboard_widget .answers ol {
					counter-reset: foo;
    				display: table;
				}
				#sagtand_faq_dashboard_widget .answers li {
					list-style: none;
				    counter-increment: foo;
				    display: table-row;
			        line-height: 1.5em;
				}
				#sagtand_faq_dashboard_widget .answers li:before {
					content: counter(foo) ".";
				    display: table-cell;
				    text-align: right;
				    padding-right: .3em;
				}
				#sagtand_faq_dashboard_widget ol a {
					transition: all 0.3s; 
				} 
				#sagtand_faq_dashboard_widget .questions ol a {
					display: block;
					padding: 0.5em; 
					border-bottom: 1px solid #ddd; 
				} 
				#sagtand_faq_dashboard_widget ol a:hover {
					opacity: 0.5;
				} 
				#sagtand_faq_dashboard_widget h2 {
					margin-top: 1em;
				}
			</style>';
	$html .= '<div class="questions">';
		$html .= '<h1>FAQ</h1>';
		$html .= '<ol>';
		$html .= '<li><a href="#question-1">No FAQ yet :)</a></li>';
		$html .= '</ol>';
	$html .= '</div>';
	$html .= '<div class="answers">';
		$html .= '<h2 id="question-1">1. No FAQ yet :)</h2>';
			$html .= '<p><ol>';
				$html .= '<li>Ask your questions to Jonas: <a href="mailto:kontakta@jonassandstedt.se">kontakta@jonassandstedt.se</a></li>';
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
    // remove_menu_page( 'edit-comments.php' );    // Comments
}
add_action( 'admin_menu', 'custom_menu_page_removing' );
?>