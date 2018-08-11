<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package progression
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>	

<div id="page-title">		
	<div class="width-container">
		<h1><?php if (is_tax('portfolio_type')) {
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$tax_term_breadcrumb_taxonomy_slug = $term->taxonomy;
					echo '' . $term->name . '';
				}
				?></h1>
		<?php if(function_exists('bcn_display')) {echo '<div id="bread-crumb">'; bcn_display(); echo '</div>'; }?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">
<div class="width-container">
	<div id="portfolio-index">			
				<ul id="portfolio-sub-nav">
					<?php echo progression_portfolio_category_nav(); ?>
				</ul>
				
				<div id="portfolio-cat-description"><?php echo category_description( ); ?></div>

				<?php
				/* Start the Loop */
				$count = 1;
				$count_2 = 1;
				?>
				<?php while ( have_posts() ) : the_post();
					$col_count_progression = get_theme_mod('portfolio_col_progression', '2');
					if($count >= 1+$col_count_progression) { $count = 1; }
				?>
				<div class="grid<?php echo get_theme_mod('portfolio_col_progression', '2'); ?>column-progression <?php if($count == get_theme_mod('portfolio_col_progression', '2')): echo ' lastcolumn-progression'; endif; ?>">
					<?php
						get_template_part( 'content', 'portfolio');
					?>
				</div>

				<?php if($count == get_theme_mod('portfolio_col_progression', '2')): ?><div class="clearfix"></div><?php endif; ?>
				<?php $count ++; $count_2++; endwhile; ?>

				<div class="clearfix"></div>
				<?php show_pagination_links( ); ?>

				<?php else : ?>
					<?php get_template_part( 'no-results', 'archive' ); ?>
				<?php endif; ?>
		

			<div class="clearfix"></div>
	</div>
</div><!-- close .width-container -->
<?php get_footer(); ?>