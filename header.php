<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> and opening <div class="container-fluid">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage CarePanda
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div class="container-fluid">

	<!-- Header - Top Navbar -->
	<?php include( 'header-parts/header-top-navbar.php' ); ?>
	<!-- Header - Navbar -->
	<?php get_template_part( 'header-parts/header', 'navbar' ); ?>
	<div class="header-dropdown-menu-container container padding-0">
	    <div class="header-dropdown-menu-fixed-row row grey-bg">
	      <!-- Header - Dropdown -->
	      <?php get_template_part( 'header-parts/header', 'dropdown' ); ?>
	    </div>
	</div><!-- end of <div class="container"> -->