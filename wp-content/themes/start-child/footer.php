<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package start
 */
?>

</div><!-- #content_ -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        <div class="site-info">
            <a href="<?php echo esc_url( __( 'https://freelance.ru/Usimov', 'start' ) ); ?>"><?php printf( esc_html__( 'Сделано %s', 'start' ), 'Игорем Грином' ); ?></a>
            <span class="sep"> | </span>
            <?php printf( esc_html__( 'Разработчик %1$s  %2$s.', '' ), '', '<a href="http://usimov.16mb.com/" rel="designer">iGreen</a>' ); ?>
        </div><!-- .site-info -->
    </div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>