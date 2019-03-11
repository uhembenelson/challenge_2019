<?php
namespace Dreamaker\Entreat;

interface TaskInterface 
{
    public static function exists($type);

	public static function get($value);

	public static function all($src);
}