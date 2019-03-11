<?php
namespace Dreamaker\Entreat;

use Dreamaker\Entreat\TaskInterface;

class Task implements TaskInterface {

    public function __construct(){
        return (object)$_REQUEST;
    }
    public static function exists($type = 'post'){
		switch ($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
				break;
			
			case 'get':
				return (!empty($_GET)) ? true : false;
				break;

			case 'files':
				return (!empty($_FILES)) ? true : false;
				break;

			default:
				return false;
				break;
		}
	}

	public static function get($value){
		if(isset($_POST[$value])){
			return $_POST[$value];
		} elseif(isset($_FILES)){
			return $_FILES[$value];
		} else {
			return $_GET[$value];
		}
		return '';
    }
    
    public static function input($value)
    {
        if(isset($value)){
            return $_REQUEST[$value];
        }
        return '';
    }

	public static function all($src = 'post'){
		if($src === 'get'){
			if(!empty($_GET)){
				return $_GET;
			}
		}
        
        if(!empty($_POST)){
			return $_POST;
		}
        
        if($src === 'files'){
            if(!empty($_FILES)){
                return $_FILES;
            }
        }
		return '';
    }
    
    public function validate($source, $condition, $messagetype, $nametodisplay)
    {
        // if($source ==)
    }
}