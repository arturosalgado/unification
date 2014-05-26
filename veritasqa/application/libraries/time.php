<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time {

	/** Time substraction function
	/* returns an integer with the difference in seconds diference example:
	/* substract(10:00:00, 9:00:00)
	/* returns 3600
	/* 	*/
    public function substract($minuendo, $substraendo)
    {
		$min = explode(":", $minuendo);
		$sub = explode(":", $substraendo);
		
		$inicio = $min[2]+$min[1]*60+$min[0]*3600;
		$fin = $min[2]+$min[1]*60+$min[0]*3600;
		$timediff = $fin - $inicio;
		return $timediff;
    }
}

/* End of file Time.php */