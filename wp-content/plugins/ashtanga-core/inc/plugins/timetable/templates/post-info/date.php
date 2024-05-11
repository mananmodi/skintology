<?php
$month = get_the_time( 'm' );
$year  = get_the_time( 'Y' );
$title = get_the_title();
$link  = empty( $title ) && ! is_single() ? get_the_permalink() : get_month_link( $year, $month );
?>

<a itemprop="url" href="<?php echo esc_url( $link ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
<div class="qodef-info-separator-end"></div>