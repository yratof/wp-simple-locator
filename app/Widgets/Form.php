<?php namespace SimpleLocator\Widgets;

class Form extends \WP_Widget {

	/**
	* Unit of Measurement
	*/
	private $unit;

	/**
	* Widget Options
	*/
	public $options;


	public function __construct()
	{
		$this->setUnit();
		parent::__construct(
			'simple_locator',
			__('Simple Locator', 'wpsimplelocator'),
			array( 'description' => __( 'Display the Simple Locator Form', 'wpsimplelocator' ) )
		);
	}


	/**
	* Set the unit of measurement
	*/
	private function setUnit()
	{
		$this->unit = ( get_option('wpsl_measurement_unit') ) ? get_option('wpsl_measurement_unit') : 'miles';
	}

	/**
	* Options
	*/
	private function setOptions()
	{
		$this->options['distances'] = '5,10,20,50,100';
		$this->options['buttontext'] = __('Search', 'wpsimplelocator');
		$this->options['mapcontrols'] = 'show';
	}


	/**
	* Format Distances option as array & return a list of select options
	*/
	private function distanceOptions()
	{
		$this->options['distances'] = explode(',', $this->options['distances']);
		$out = "";
		foreach ( $this->options['distances'] as $distance ){
			if ( !is_numeric($distance) ) continue;
			$out .= '<option value="' . $distance . '">' . $distance . ' ' . $this->unit . '</option>';
		}
		return $out;
	}


	/**
	* Enqueue the Required Scripts
	*/
	private function enqueueScripts()
	{
		wp_enqueue_script('google-maps');
		wp_enqueue_script('simple-locator');
	}


	/**
	* Widget Form in Admin
	*/
	public function form( $instance ) {
		$title = ( isset($instance['title']) ) ? $instance[ 'title' ] : '';
		$distance_options = ( isset($instance['distance_options']) ) ? $instance[ 'distance_options' ] : '';
		$map_height = ( isset($instance['map_height']) ) ? $instance[ 'map_height' ] : '';
		include( \SimpleLocator\Helpers::view('widget-options') );
	}


	/**
	* Save Widget Form Data
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['distance_options'] = ( ! empty( $new_instance['distance_options'] ) ) ? strip_tags( $new_instance['distance_options'] ) : '5,10,20,50,100';
		$instance['map_height'] = ( ! empty( $new_instance['map_height'] ) ) ? strip_tags( intval($new_instance['map_height']) ) : '';
		return $instance;
	}


	/**
	* Front End of Widget
	*/
	public function widget( $args, $instance )
	{
		$this->setOptions();
		echo $args['before_widget'];
		
		if ( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		
		$this->enqueueScripts();
		$widget_instance = true;
		include( \SimpleLocator\Helpers::view('simple-locator-form') );
		echo $output;

		echo $args['after_widget'];
	}

}