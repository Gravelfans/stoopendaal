<?php
/**
 * Podcast Fields
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

/**
 * Spotify Meta Box
 */
function stoopendaal_add_podcast_metabox() {

    add_meta_box(
        'stoopendaal_spotify',
        'Spotify',
        'stoopendaal_spotify_callback',
        'podcast',
        'normal',
        'high'
    );

}
add_action( 'add_meta_boxes', 'stoopendaal_add_podcast_metabox' );


function stoopendaal_spotify_callback( $post ) {

    wp_nonce_field( 'stoopendaal_save_spotify', 'stoopendaal_spotify_nonce' );

    $spotify = get_post_meta( $post->ID, '_spotify_url', true );
    $guest   = get_post_meta( $post->ID, '_podcast_guest', true );
    $duration = get_post_meta( $post->ID, '_podcast_duration', true );
    $date     = get_post_meta( $post->ID, '_podcast_recorded', true );
    ?>

    <p>
        <strong>Spotify URL</strong>
    </p>

    <input
        type="url"
        name="spotify_url"
        value="<?php echo esc_attr( $spotify ); ?>"
        style="width:100%;padding:10px;"
        placeholder="https://open.spotify.com/episode/...">

    <hr>

    <p>
        <strong>Gast(en)</strong>
    </p>

    <input
        type="text"
        name="podcast_guest"
        value="<?php echo esc_attr( $guest ); ?>"
        style="width:100%;padding:10px;"
        placeholder="Bijv. Erik Bouw">

    <p>
        <strong>Duur</strong>
    </p>

    <input
        type="text"
        name="podcast_duration"
        value="<?php echo esc_attr( $duration ); ?>"
        style="width:220px;padding:10px;"
        placeholder="1u 12m">

    <p>
        <strong>Opnamedatum</strong>
    </p>

    <input
        type="date"
        name="podcast_recorded"
        value="<?php echo esc_attr( $date ); ?>">

    <?php
}/**
 * Opslaan podcast velden
 */
function stoopendaal_save_podcast_metabox( $post_id ) {

    if ( ! isset( $_POST['stoopendaal_spotify_nonce'] ) ) {
        return;
    }

    if (
        ! wp_verify_nonce(
            $_POST['stoopendaal_spotify_nonce'],
            'stoopendaal_save_spotify'
        )
    ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['spotify_url'] ) ) {

        update_post_meta(
            $post_id,
            '_spotify_url',
            esc_url_raw( $_POST['spotify_url'] )
        );

    }

    if ( isset( $_POST['podcast_guest'] ) ) {

        update_post_meta(
            $post_id,
            '_podcast_guest',
            sanitize_text_field( $_POST['podcast_guest'] )
        );

    }

    if ( isset( $_POST['podcast_duration'] ) ) {

        update_post_meta(
            $post_id,
            '_podcast_duration',
            sanitize_text_field( $_POST['podcast_duration'] )
        );

    }

    if ( isset( $_POST['podcast_recorded'] ) ) {

        update_post_meta(
            $post_id,
            '_podcast_recorded',
            sanitize_text_field( $_POST['podcast_recorded'] )
        );

    }

}

add_action(
    'save_post_podcast',
    'stoopendaal_save_podcast_metabox'
);