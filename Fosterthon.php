<?php
/*
Plugin Name: Fosterthon Animal Aid Suite
Plugin URI: http://www.austinthemes.com
Description: A suite of animal foster and adoption gallery features designed to empower non-profit organizations to appeal to the public.
Version: 1.2
Author: Ryan Bishop, Austin Themes
Author URI: http://www.austinthemes.com
*/

/*
Created by Ryan Bishop for free distribution. Based on the plugin creation tutorial by 
Paul McKnight (http://www.reallyeffective.co.uk/archives/2009/06/22/how-to-code-your-own-wordpress-shortcode-plugin-tutorial-part-1/)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

// DEFINE PLUGIN GLOBAL VARIABLES

// CREATE MANAGEMENT MENUS

// REGISTER CUSTOM POST TYPE

if ( ! function_exists('create_animal_cpt') ) {
function create_animal_cpt() {

	$labels = array(
		'name'                  => _x( 'Animals', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Animal', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Animal List', 'text_domain' ),
		'name_admin_bar'        => __( 'Animal List', 'text_domain' ),
		'archives'              => __( 'Animal Archives', 'text_domain' ),
		'attributes'            => __( 'Animal Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Animals', 'text_domain' ),
		'add_new_item'          => __( 'Add New Animal', 'text_domain' ),
		'add_new'               => __( 'Add New Animal', 'text_domain' ),
		'new_item'              => __( 'New Animal', 'text_domain' ),
		'edit_item'             => __( 'Edit Animal Entry', 'text_domain' ),
		'update_item'           => __( 'Update Entry', 'text_domain' ),		'view_item'             => __( 'View Animal Profile', 'text_domain' ),
		'view_items'            => __( 'View Animal Profiles', 'text_domain' ),
		'search_items'          => __( 'Find Animal', 'text_domain' ),
		'not_found'             => __( 'No Animal(s) Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Deleted Animal Entries Found', 'text_domain' ),
		'featured_image'        => __( 'Animal Profile Photo', 'text_domain' ),
		'set_featured_image'    => __( 'Set Photo', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Profile Photo', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Profile Photo', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Entry Materials', 'text_domain' ),
		'items_list'            => __( 'Animals List', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Animal Lives', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Animal', 'text_domain' ),
		'description'           => __( 'A post type used to manage individual animal profiles', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
register_post_type( 'animal', $args );}add_action( 'init', 'create_animal_cpt', 0 );}
// TAXONOMY : ANIMAL TAGGING

if ( ! function_exists( 'creaste_animal_taxonomy' ) ) {

// Register Custom Taxonomy
function creaste_animal_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Animal Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Animal Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Animal Tags', 'text_domain' ),
		'all_items'                  => __( 'All Tags', 'text_domain' ),
		'parent_item'                => __( 'Parent Tag', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'text_domain' ),
		'new_item_name'              => __( 'New Animal Tag', 'text_domain' ),
		'add_new_item'               => __( 'Add New Animal Tag', 'text_domain' ),
		'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
		'update_item'                => __( 'Update Animal Tag', 'text_domain' ),
		'view_item'                  => __( 'View Tag Details', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'text_domain' ),
		'popular_items'              => __( 'Popular Tags', 'text_domain' ),
		'search_items'               => __( 'Search Tags', 'text_domain' ),
		'not_found'                  => __( 'No Tags Found', 'text_domain' ),
		'no_terms'                   => __( 'No Tags Found', 'text_domain' ),
		'items_list'                 => __( 'Existing Tags', 'text_domain' ),
		'items_list_navigation'      => __( 'Tags List Navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'animaltags', array( 'animal' ), $args );
}
add_action( 'init', 'creaste_animal_taxonomy', 0 );
}
// TAXONOMY : ANIMAL SPECIES

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_animal_type_taxonomies', 0 );

// create two taxonomies, types and writers for the post type "book"
function create_animal_type_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Animal Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Animal Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Animal Types', 'textdomain' ),
		'all_items'         => __( 'All Animal Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Animal Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Animal Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Animal Type', 'textdomain' ),
		'update_item'       => __( 'Update Animal Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Animal Type', 'textdomain' ),
		'new_item_name'     => __( 'New Animal Type Name', 'textdomain' ),
		'menu_name'         => __( 'Animal Type', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,		'rewrite'           => array( 'slug' => 'animaltype' ),
	);

register_taxonomy( 'animaltype', array( 'animal' ), $args );
  
// DISPLAY ANIMAL INFO ON ANIMAL CPT INDIVIDUAL PAGES 
function GetWidthForGraphBar(){
$WidthCalc_needed = GetAnimalMeta('animal_need_amount');
$WidthCalc_donated = GetAnimalMeta('animal_need_collected');
return $WidthCalc_donated / $WidthCalc_needed;
}
function CreateInfoListItemFromString($ThisAnimalKeyLabel,$ThisAnimalKey){return '<li><strong>' . $ThisAnimalKeyLabel . ' :</strong> ' . $ThisAnimalKey . '</li>';} 
function CreateInfoListItemFromKey($ThisAnimalKeyLabel,$ThisAnimalKey){return '<li><strong>' . $ThisAnimalKeyLabel . ' :</strong> ' . get_post_meta(get_the_id(), $ThisAnimalKey, true) . '</li>';}
function GetAnimalMeta($ThisAnimalKey){
return get_post_meta(get_the_id(), $ThisAnimalKey, true);
}

function GetAnimalRiskFactors(){
$ThisRiskFactorsArray = get_post_meta(get_the_id(), 'animal_risk_factors', true);
return array_values($ThisRiskFactorsArray);

}

add_filter( 'the_content', 'merge_animal_custom_fields_and_content' );
function merge_animal_custom_fields_and_content( $content ) { 
    if ( is_singular('animal') ) {
$AnimalActions = '<div class="fosterthon-action-menu fosterthon-info-section"><h4>Take Action</h4>
<a href="#" class="button fosterthon-button fosterthon-button-donate fusion-button button-default button-large">Donate Now</a>
<a href="#" class="button fosterthon-button fosterthon-button-message fusion-button button-default button-large">Send Owner Message</a>
' . do_shortcode('[addtoany]') . '</div>';
$AnimalDonationsBarScript = '<script type="text/javascript">
var TheBar = document.getElementById(\'fosterthon-donations-graph-bar\');
var BarContainer = document.getElementById(\'fosterthon-donations-graph-1\');
var BarContainerWidth = jQuery(\'#fosterthon-donations-graph-1\').width();
var BarNeeded = ' . GetAnimalMeta('animal_need_amount') . ';
var BarCollected = ' . GetAnimalMeta('animal_need_collected') . ';
var NewBarWidth = ( BarCollected / BarNeeded ) * BarContainerWidth;
document.getElementById(\'fosterthon-donations-graph-bar\').style.width = NewBarWidth + \'px\';
</script>';
        $AnimalDonations = '<div class="fosterthon-donation-readout fosterthon-info-section"><h4>Donations</h4>' . get_the_title() . '\'s owner needs $' . GetAnimalMeta('animal_need_amount') . ' for : ' . GetAnimalMeta('animal_needs') . '<div id="fosterthon-donations-graph-1" class="fosterthon-donations-graph"><div id="fosterthon-donations-graph-bar">$' . GetAnimalMeta('animal_need_collected') . ' of $' . GetAnimalMeta('animal_need_amount') . ' Collected</div></div></div>';        $AnimalBio = '<div class="fosterthon-bio-section fosterthon-info-section"><h4>The Story</h4>' . $content . '</div>';        $AnimalRiskFactors = '<div class="fosterthon-risk-factors-section fosterthon-info-section"><h4>Risk Factors</h4>' . GetAnimalRiskFactors() . '</div>';        $AnimalHeader = '<div class="fosterthon-page-content-wrapper"><h3 class="fosterthon-individual-animal-title">About : ' . get_the_title() . '</h3>';        $AnimalFeaturedImage = '<div class="fosterthon-individual-animal-featured-image fosterthon-featured-image">' . get_the_post_thumbnail( get_the_id(), 'full' ) . '</div>';
        $AnimalInfoPane = '<div class="fosterthon-page-content-details fosterthon-info-section"><h4 class="fosterthon-individual-animal-subtitle">The Basics</h4>
        <ul class="fosterthon-individual-info-list">' . 
        CreateInfoListItemFromString('Name',GetAnimalMeta('animal_first_name') . ' ' . GetAnimalMeta('animal_last_name')) .
        CreateInfoListItemFromKey('Status','animal_status') . 
        CreateInfoListItemFromKey('Funding Needed','animal_need_amount') . 
        CreateInfoListItemFromKey('Needed by','animal_need_duedate') .         '</ul></div>';       
        $content = '<div class="fosterthon-individual-animal-content">' . $AnimalHeader . $AnimalFeaturedImage . $AnimalBio . $AnimalInfoPane . $AnimalRiskFactors . $AnimalDonations . $AnimalActions . $AnimalDonationsBarScript . '</div></div>';		
		}

    return $content;
}
}

?>