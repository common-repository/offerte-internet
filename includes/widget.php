<?php
class offerte_internet_class extends WP_Widget {
	public function __construct(){
		//initializes the whole thing
		parent::__construct(
		'offerte_internet',
		'Offerte Internet',
		array( 'description' => __('Mostra le promozioni ADSL di OfferteInternet.net', 'offerteinternetwidget') )
		);
	}

	public function form( $instance ){
		//this is to enter widget options
		$title = (isset( $instance[ 'title' ] )) ? $instance[ 'title' ] : 'Offerte Internet';
		$intro_text = (isset( $instance[ 'intro_text' ] )) ? $instance[ 'intro_text' ] : 'Queste sono le offerte internet più allettanti sul mercato. Naviga in ADSL o Fibra a un prezzo mai visto.';
		$qty = (isset( $instance[ 'qty' ] )) ? $instance[ 'qty' ] : '5';
		$optin = (isset( $instance[ 'optin' ] )) ? $instance[ 'optin' ] : 'off';
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Titolo:', 'offerteinternetwidget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'intro_text' ); ?>"><?php _e('Intro Text:', 'offerteinternetwidget'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'intro_text' ); ?>" name="<?php echo $this->get_field_name( 'intro_text' ); ?>"><?php echo esc_html( $intro_text ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'qty' ); ?>"><?php _e('Quantità:', 'offerteinternetwidget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'qty' ); ?>" type="number" name="<?php echo $this->get_field_name( 'qty' ); ?>" value="<?php echo esc_attr( $qty ); ?>" min="1" max="15" />
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $optin, 'on' ); ?> id="<?php echo $this->get_field_id( 'optin' ); ?>" name="<?php echo $this->get_field_name( 'optin' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'optin' ); ?>"><?php _e('Includi link alle recensioni delle offerte e alla home di OfferteInternet.net', 'offerteinternetwidget'); ?></label>
		</p>
	<?php
	}

	public function update( $new_instance, $old_instance ){
		$qty = intval( $new_instance[ 'qty' ] ) === 0 ? 5 : intval( $new_instance[ 'qty' ] );
		//this is to process the form options
		$instance = array();
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'intro_text' ] = strip_tags( $new_instance[ 'intro_text' ] );
		$instance[ 'qty' ] = $qty;
		$instance[ 'optin' ] = $new_instance[ 'optin' ];
		return $instance;
	}

	public function widget( $args, $instance ){
		//this displays the widget
		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$intro_text = $instance[ 'intro_text' ];
		$optin = $instance[ 'optin' ];
		$tag = $optin ? 'a' : 'span';
		$qty = $instance[ 'qty' ];
		$offerte = get_option( 'offerte_internet_data' );

		echo $before_widget;

		if ( ! empty( $title) ) echo $before_title . $title . $after_title;?>

		<div class="offerte-internet-widget" data-optin="<?php echo $optin; ?>" data-qty="<?php echo $qty; ?>">

			<<?php echo $tag ?> href="https://www.offerteinternet.net" title="Offerte Internet e promozioni adsl. Scopri come risparmiare sull'adsl di casa" target="_blank">
				<h2 class="offerte-internet-widget__h2"><img src="<?php echo plugins_url( 'offerte-internet/offerte-internet-logo.png' ) ?>" alt="Offerte Internet e promozioni adsl. Scopri come risparmiare sull'adsl di casa" class="offerte-internet-widget__logo" loading="lazy" decoding="async" /><span>Offerte Internet</span></h2>
			</<?php echo $tag ?>>
			<p><?php echo $intro_text; ?></p>

			<ul class="offerte-internet-widget__ul">
				<?php for ($i=0; $i < $qty; $i++) { ?>
					<li class="offerta">
						<<?php echo $tag ?> class="operatore" href="<?php echo $offerte[$i]['compagnia_data']['link'] ?>" title="<?php echo $offerte[$i]['compagnia_data']['title'] ?>" target="_blank">
						<img src="<?php echo $offerte[$i]['compagnia_data']['image'] ?>" alt="<?php echo $offerte[$i]['compagnia_data']['title'] ?>" loading="lazy" decoding="async">
						</<?php echo $tag ?>>
						<<?php echo $tag ?> class="offerta__link" href="<?php echo $offerte[$i]['permalink'] ?>" title="<?php echo $offerte[$i]['title_attribute'] ?>" target="_blank">
							<?php echo $offerte[$i]['r_title'] ?>
						</<?php echo $tag ?>>
						<span class="speed"><?php echo $offerte[$i]['r_down'] ?> Mbps</span><del><?php echo isset($offerte[$i]['r_fullprice']) ? $offerte[$i]['r_fullprice']: '' ?></del><span class="promo"><?php echo $offerte[$i]['r_price'] ?></span>
					</li>
				<?php } // end for loop ?>
			</ul>
		</div>

		<?php echo $after_widget;
	}
}

function offerte_internet_register_widgets() {
	register_widget( 'offerte_internet_class' );
}

// register widget
add_action( 'widgets_init', 'offerte_internet_register_widgets' );
