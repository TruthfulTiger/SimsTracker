<?php

/*

	Copyright (c) 2009-2019 F3::Factory/Bong Cosca, All rights reserved.

	This file is part of the Fat-Free Framework (http://fatfreeframework.com).

	This is free software: you can redistribute it and/or modify it under the
	terms of the GNU General Public License as published by the Free Software
	Foundation, either version 3 of the License, or later.

	Fat-Free Framework is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	General Public License for more details.

	You should have received a copy of the GNU General Public License along
	with Fat-Free Framework.  If not, see <http://www.gnu.org/licenses/>.

*/

//! PHP magic wrapper
abstract class Magic implements ArrayAccess {

	/**
	 *    Return TRUE if key is not empty
	 * @param $key string
	 **@return bool
	 */
	abstract function exists($key);

	/**
	 *    Bind value to key
	 * @param $key string
	 * @param $val mixed
	 **@return mixed
	 */
	abstract function set($key,$val);

	/**
	 *    Retrieve contents of key
	 * @param $key string
	 **@return mixed
	 */
	abstract function &get($key);

	/**
	 *    Unset key
	 * @param $key string
	 **@return NULL
	 */
	abstract function clear($key);

	/**
	 *    Convenience method for checking property value
	 * @param $key string
	 **@return mixed
	 */
	function offsetexists($key) {
		return Base::instance()->visible($this,$key)?
			isset($this->$key):
			($this->exists($key) && $this->get($key)!==NULL);
	}

	/**
	 *    Convenience method for assigning property value
	 * @param $key string
	 * @param $val mixed
	 **@return mixed
	 */
	function offsetset($key,$val) {
		return Base::instance()->visible($this,$key)?
			($this->$key=$val):$this->set($key,$val);
	}

	/**
	 *    Convenience method for retrieving property value
	 * @param $key string
	 **@return mixed
	 */
	function &offsetget($key) {
		if (Base::instance()->visible($this,$key))
			$val=&$this->$key;
		else
			$val=&$this->get($key);
		return $val;
	}

	/**
	 *    Convenience method for removing property value
	 * @param $key string
	 **@return NULL
	 */
	function offsetunset($key) {
		if (Base::instance()->visible($this,$key))
			unset($this->$key);
		else
			$this->clear($key);
	}

	/**
	 *    Alias for offsetexists()
	 * @param $key string
	 **@return mixed
	 */
	function __isset($key) {
		return $this->offsetexists($key);
	}

	/**
	 *    Alias for offsetset()
	 * @param $key string
	 * @param $val mixed
	 **@return mixed
	 */
	function __set($key,$val) {
		return $this->offsetset($key,$val);
	}

	/**
	 *    Alias for offsetget()
	 * @param $key string
	 **@return mixed
	 */
	function &__get($key) {
		$val=&$this->offsetget($key);
		return $val;
	}

	/**
	 *    Alias for offsetunset()
	 * @param $key string
	 **/
	function __unset($key) {
		$this->offsetunset($key);
	}

}
