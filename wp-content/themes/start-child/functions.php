<?php
/**
 * Created by PhpStorm.
 * User: 21vek
 * Date: 18.06.2016
 * Time: 19:58
 */

function exec_php($matches){
    eval('ob_start();'.$matches[1].'$inline_execute_output = ob_get_contents();ob_end_clean();');
    return $inline_execute_output;
}
function inline_php($content){
    $content = preg_replace_callback('/\[exec\]((.|\n)*?)\[\/exec\]/', 'exec_php', $content);
    $content = preg_replace('/\[exec off\]((.|\n)*?)\[\/exec\]/', '$1', $content);
    return $content;
}
add_filter('the_content', 'inline_php', 0);



if ( ! function_exists( 'start_the_archive_title' ) ) :
    /**
     * Shim for `start_the_archive_title()`.
     *
     * Display the archive title based on the queried object.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     *
     * @param string $before Optional. Content to prepend to the title. Default empty.
     * @param string $after  Optional. Content to append to the title. Default empty.
     */
    function start_the_archive_title( $before = '', $after = '' ) {
        if ( is_category() ) {
            $title = sprintf( esc_html__( 'Рубрика: %s', 'start' ), single_cat_title( '', false ) );
        } elseif ( is_tag() ) {
            $title = sprintf( esc_html__( 'Tag: %s', 'start' ), single_tag_title( '', false ) );
        } elseif ( is_author() ) {
            $title = sprintf( esc_html__( 'Автор: %s', 'start' ), '<span class="vcard">' . get_the_author() . '</span>' );
        } elseif ( is_year() ) {
            $title = sprintf( esc_html__( 'Год: %s', 'start' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'start' ) ) );
        } elseif ( is_month() ) {
            $title = sprintf( esc_html__( 'Месяц: %s', 'start' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'start' ) ) );
        } elseif ( is_day() ) {
            $title = sprintf( esc_html__( 'День: %s', 'start' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'start' ) ) );
        } elseif ( is_tax( 'post_format' ) ) {
            if ( is_tax( 'post_format', 'post-format-aside' ) ) {
                $title = esc_html_x( 'Asides', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
                $title = esc_html_x( 'Galleries', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
                $title = esc_html_x( 'Images', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
                $title = esc_html_x( 'Videos', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
                $title = esc_html_x( 'Quotes', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
                $title = esc_html_x( 'Links', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
                $title = esc_html_x( 'Statuses', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
                $title = esc_html_x( 'Audio', 'post format archive title', 'start' );
            } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
                $title = esc_html_x( 'Chats', 'post format archive title', 'start' );
            }
        } elseif ( is_post_type_archive() ) {
            $title = sprintf( esc_html__( 'Архивы: %s', 'start' ), post_type_archive_title( '', false ) );
        } elseif ( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = sprintf( esc_html__( '%1$s: %2$s', 'start' ), $tax->labels->singular_name, single_term_title( '', false ) );
        } else {
            $title = esc_html__( 'Archives', 'start' );
        }

        /**
         * Filter the archive title.
         *
         * @param string $title Archive title to be displayed.
         */
        $title = apply_filters( 'get_the_archive_title', $title );

        if ( ! empty( $title ) ) {
            echo $before . $title . $after;
        }
    }
endif;


if ( ! function_exists( 'start_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function start_entry_footer() {
        // Hide category and tag text for pages.
        if ( 'post' == get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ', ', 'start' ) );
            if ( $categories_list && start_categorized_blog() ) {
                printf( '<span class="cat-links">' . esc_html__( 'Раздел %1$s', 'start' ) . '</span>', $categories_list );
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html__( ', ', 'start' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'start' ) . '</span>', $tags_list );
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link( esc_html__( ' Оставить комментарий ', 'start' ), esc_html__( '1 комментарий', 'start' ), esc_html__( '% комментарий', 'start' ) );
            echo '</span>';
        }

        edit_post_link( esc_html__( ' Изменить', 'start' ), '<span class="edit-link">', '</span>' );
    }
endif;


if ( ! function_exists( 'start_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function start_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( 'c' ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
            esc_html_x( 'Опубликовано %s', 'post date', 'start' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            esc_html_x( 'by %s', 'post author', 'start' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

    }
endif;

