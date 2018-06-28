<?php

class MY_Router extends CI_Router {
    protected function _set_default_controller() {

        if (empty($this->default_controller)) {

            show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
        }
        // Is the method being specified?
        if (sscanf($this->default_controller, '%[^/]/%s', $class, $method) !== 2) {
            $method = 'index';
        }

        // This is what I added, checks if the class is a directory
        if( is_dir(APPPATH.'controllers/'.$class) ) {

            // Set the class as the directory

            $this->set_directory($class);

            // $method is the class

            $class = $method;

            // Re check for slash if method has been set

            if (sscanf($method, '%[^/]/%s', $class, $method) !== 2) {
                $method = 'index';
            }
        }

        if ( ! file_exists(APPPATH.'controllers/'.$this->directory.ucfirst($class).'.php')) {

            // This will trigger 404 later

            return;
        }
        $this->set_class($class);
        $this->set_method($method);
        // Assign routed segments, index starting from 1
        $this->uri->rsegments = array(
            1 => $class,
            2 => $method
        );
        log_message('debug', 'No URI present. Default controller set.');
    }
}