<?php
/**
 * Pagination Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

global $wp_query;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'query' => $wp_query,
    )
);

$query = $args['query'];

if ( empty( $query ) || $query->max_num_pages <= 1 ) {
    return;
}

$links = paginate_links(
    array(
        'total'     => $query->max_num_pages,
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'type'      => 'array',
        'prev_text' => '← Vorige',
        'next_text' => 'Volgende →',
    )
);

if ( empty( $links ) ) {
    return;
}
?>

<nav
    class="pagination"
    aria-label="<?php esc_attr_e( 'Paginanavigatie', 'stoopendaal' ); ?>"
>

    <ul class="pagination__list">

        <?php foreach ( $links as $link ) : ?>

            <li class="pagination__item">

                <?php echo wp_kses_post( $link ); ?>

            </li>

        <?php endforeach; ?>

    </ul>

</nav>