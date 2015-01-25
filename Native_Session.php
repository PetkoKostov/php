<?php
// ------------------------------------------------------------------------
/** ========================================================================
 * PHP 
 * Petko Kostov
 * DESCTIPTION:
 * Small class for CI < 3.0 versions (in new one just set $config[‘sess_driver’] = ‘native’; to use the native PHP session implementation)
 * Now we can use session like normal human beings, instead of CI session stored in Cookies(<-- WTF ?!) or in DB.
 * USAGE:
 * Place it in application/libraries
 * Then in controller we can have:
 *
 *		$this->load->library('Native_Session', '', 'native_session'); //load our Native_Session library with alias 'native_session'
 *      
 *     $username = $this->native_session->get( 'username' ); //Read the username from session
 *
 *      
 *    $this->native_session->set( 'cart', $cart ); //Update shopping cart session data
 * ========================================================================
  */
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Native_Session
{
    public function __construct()
    { 
		if(!session_id())
			session_start();
    }

    public function set( $key, $value )
    {
        $_SESSION[$key] = $value;
    }

    public function get( $key )
    {
        return isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
    }

    public function regenerate_id( $del_old = false )
    {
        session_regenerate_id( $del_old );
    }

    public function unset( $key )
    {
        unset( $_SESSION[$key] );
    }
	
	public function destroy()
    {
        session_destroy();
    }
}