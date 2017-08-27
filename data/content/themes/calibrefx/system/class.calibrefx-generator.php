<?php
/**
 * Generator Class
 *
 * Generator Class to generate all hooks
 *
 */

class Calibrefx_Generator{
	/**
	 * Reference to the global Plugin instance
	 *
	 * @var object
	 */
	protected static $instance;

	/**
	 * Store all hooks
	 *
	 * @var	object
	 */
	private $_hooks = array();

	/**
	 * Constructor
	 *
	 * Initialize
	 *
	 * @return	void
	 */
	public function __construct() {
		$this->_hooks = array();
	}

	/**
	 * Return the Calibrefx object
	 *
	 * @return  object
	 */
	public static function get_instance() {
		if ( ! self::$instance ){
			self::$instance = new Calibrefx_Generator();
		}

		return self::$instance;
	}

	/**
	 * Set hook
	 */
	public function set_hook( $tags ) {
		$this->_hooks = $tags;
	}

	/**
	 * Get Hook
	 */
	public function get_hook( $tag = null ) {
		if ( is_null( $tag ) ){
			return $this->_hooks;
		}

		return $this->_hooks[ $tag ];
	}

	/**
	 * Get the hook list
	 *
	 * @return array
	 */
	public function __get( $tag ) {
		if ( empty( $this->_hooks[ $tag ] ) ) {
			return array(); }

		return $this->_hooks[ $tag ];
	}

	/**
	 * Set the hook list
	 *
	 * @return array
	 */
	public function __set( $tag, $functions ) {
		if ( ! array( $functions ) ) { return; }

		if ( empty( $this->_hooks[ $tag ]) ){
			$this->_hooks[ $tag ] = array();
		}

		foreach ( $functions as $function ) {
			if ( is_string( $function ) ) {
				$this->add( $tag, $function );
	    	} elseif ( is_array( $function ) ) {
	    		$this->add(
	    			$tag,
	    			$function['function'],
	    			isset( $function['priority'] )? $function['priority'] : 10,
				isset( $function['args'] )? $function['args'] : 0 );
	    	}
		}
	}

	/**
	 * Check if the hook isset
	 */
	public function __isset( $tag ) {
		return isset( $this->_hooks[ $tag ] );
	}

	/**
	 * Add a hook
	 */
	public function add( $tag, $function, $priority = 10, $args = 0 ) {
		$this->_hooks[ $tag ][] = array(
			'function'	=> $function,
			'priority'	=> $priority,
			'args'		=> $args,
		);

		//For late call, then we need to add the action
		if ( ! has_action( $tag, $function ) ) {
			add_action( $tag, $function, $priority );
		}

		return true;
	}

	/**
	 * Remove a function from a hook
	 */
	public function remove( $tag, $function, $priority = 10 ) {
		if ( ! isset( $this->_hooks[ $tag ] ) ) { return; }

		$keysearch = $this->find_key( $tag, $function );

		if ( -1 == $keysearch ) { 
			return false; 
		}
		unset( $this->_hooks[ $tag ][ $keysearch ] );

		//For late call, then we need to change the action
		if ( has_action( $tag, $function ) ) {
			remove_action( $tag, $function, $priority );
		}

		return true;
	}

	/**
	 * Move a function to another hook
	 */
	public function move( $old_tag, $new_tag, $function, $old_priority = 10, $new_priority = 10 ) {
		if ( ! isset( $this->_hooks[ $old_tag ] ) ) { return; }

		$keysearch = $this->find_key( $old_tag, $function );

		if ( -1 == $keysearch ) {
			return false;
		}
		$func_array = $this->_hooks[ $old_tag ][ $keysearch ];
		unset( $this->_hooks[ $old_tag ][ $keysearch ] );
		$this->add( $new_tag, $func_array['function'], $new_priority, $func_array['args'] );

		//For late call, then we need to change the action
		if ( has_action( $old_tag, $function ) ) {
			remove_action( $old_tag, $function, $old_priority );
			add_action( $new_tag, $function, $new_priority );
		}

		return true;
	}

	/**
	 * Remove a function from a hook
	 */
	public function replace( $tag, $function_old, $function_new, $old_priority = 10, $new_priority = 10 ) {
		if ( ! isset( $this->_hooks[ $tag ]) ) { return; }

		$keysearch = $this->find_key( $tag, $function_old );

		if ( -1 == $keysearch ) {
			return false;
		}
		$this->_hooks[ $tag ][ $keysearch ]['function'] = $function_new;

		//For late call, then we need to change the action
		if ( has_action( $tag, $function_old ) ) {
			remove_action( $tag, $function_old, $old_priority );
			add_action( $tag, $function_new, $new_priority );
		}

		return true;
	}

	/**
	 * Run all the stored hooks
	 */
	public function run_hook() {
		if ( empty( $this->_hooks ) ) {
			return;
		}

		foreach ( $this->_hooks as $hook => $list ) {
			foreach ( $list as $value ) {
				add_action( $hook, $value['function'], $value['priority'], $value['args'] );
			}
		}
	}

	private function find_key( $tag, $function ){
		foreach ( $this->$tag as $key => $haystack ) {
			if ( $haystack['function'] == $function ) {
				return $key;
			}
		}

		//function not found
		return -1;
	}
}