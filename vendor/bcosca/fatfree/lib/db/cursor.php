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

namespace DB;

//! Simple cursor implementation
abstract class Cursor extends \Magic implements \IteratorAggregate {

	//@{ Error messages
	const
		E_Field='Undefined field %s';
	//@}

	protected
		//! Query results
		$query=[],
		//! Current position
		$ptr=0,
		//! Event listeners
		$trigger=[];

	/**
	 *    Return database type
	 * @return string
	 **/
	abstract function dbtype();

	/**
	 *    Return field names
	 * @return array
	 **/
	abstract function fields();

	/**
	 *    Return fields of mapper object as an associative array
	 * @param $obj object
	 **@return array
	 */
	abstract function cast($obj=NULL);

	/**
	 *    Return records (array of mapper objects) that match criteria
	 * @param $filter string|array
	 * @param $options array
	 * @param $ttl int
	 **@return array
	 */
	abstract function find($filter=NULL,array $options=NULL,$ttl=0);

	/**
	 *    Count records that match criteria
	 * @param $filter array
	 * @param $options array
	 * @param $ttl int
	 **@return int
	 */
	abstract function count($filter=NULL,array $options=NULL,$ttl=0);

	/**
	 *    Insert new record
	 * @return array
	 **/
	abstract function insert();

	/**
	 *    Update current record
	 * @return array
	 **/
	abstract function update();

	/**
	 *    Hydrate mapper object using hive array variable
	 * @param $var array|string
	 * @param $func callback
	 **@return NULL
	 */
	abstract function copyfrom($var,$func=NULL);

	/**
	 *    Populate hive array variable with mapper fields
	 * @param $key string
	 **@return NULL
	 */
	abstract function copyto($key);

	/**
	 *    Get cursor's equivalent external iterator
	 *    Causes a fatal error in PHP 5.3.5 if uncommented
	 *    return ArrayIterator
	 **/
	abstract function getiterator();


	/**
	 *    Return TRUE if current cursor position is not mapped to any record
	 * @return bool
	 **/
	function dry() {
		return empty($this->query[$this->ptr]);
	}

	/**
	 *    Return first record (mapper object) that matches criteria
	 * @param $filter string|array
	 * @param $options array
	 * @param $ttl int
	 **@return static|FALSE
	 */
	function findone($filter=NULL,array $options=NULL,$ttl=0) {
		if (!$options)
			$options=[];
		// Override limit
		$options['limit']=1;
		return ($data=$this->find($filter,$options,$ttl))?$data[0]:FALSE;
	}

	/**
	 *    Return array containing subset of records matching criteria,
	 *    total number of records in superset, specified limit, number of
	 *    subsets available, and actual subset position
	 * @param $pos int
	 * @param $size int
	 * @param $filter string|array
	 * @param $options array
	 * @param $ttl int
	 * @param $bounce bool
	 **@return array
	 */
	function paginate(
		$pos=0,$size=10,$filter=NULL,array $options=NULL,$ttl=0,$bounce=TRUE) {
		$total=$this->count($filter,$options,$ttl);
		$count=(int)ceil($total/$size);
		if ($bounce)
			$pos=max(0,min($pos,$count-1));
		return [
			'subset'=>($bounce || $pos<$count)?$this->find($filter,
				array_merge(
					$options?:[],
					['limit'=>$size,'offset'=>$pos*$size]
				),
				$ttl
			):[],
			'total'=>$total,
			'limit'=>$size,
			'count'=>$count,
			'pos'=>$bounce?($pos<$count?$pos:0):$pos
		];
	}

	/**
	 *    Map to first record that matches criteria
	 * @param $filter string|array
	 * @param $options array
	 * @param $ttl int
	 **@return array|FALSE
	 */
	function load($filter=NULL,array $options=NULL,$ttl=0) {
		$this->reset();
		return ($this->query=$this->find($filter,$options,$ttl)) &&
		$this->skip(0)?$this->query[$this->ptr]:FALSE;
	}

	/**
	 *    Return the count of records loaded
	 * @return int
	 **/
	function loaded() {
		return count($this->query);
	}

	/**
	 *    Map to first record in cursor
	 * @return mixed
	 **/
	function first() {
		return $this->skip(-$this->ptr);
	}

	/**
	 *    Map to last record in cursor
	 * @return mixed
	 **/
	function last() {
		return $this->skip(($ofs=count($this->query)-$this->ptr)?$ofs-1:0);
	}

	/**
	 *    Map to nth record relative to current cursor position
	 * @param $ofs int
	 **@return mixed
	 */
	function skip($ofs=1) {
		$this->ptr+=$ofs;
		return $this->ptr>-1 && $this->ptr<count($this->query)?
			$this->query[$this->ptr]:FALSE;
	}

	/**
	 *    Map next record
	 * @return mixed
	 **/
	function next() {
		return $this->skip();
	}

	/**
	 *    Map previous record
	 * @return mixed
	 **/
	function prev() {
		return $this->skip(-1);
	}

	/**
	 * Return whether current iterator position is valid.
	 */
	function valid() {
		return !$this->dry();
	}

	/**
	 *    Save mapped record
	 * @return mixed
	 **/
	function save() {
		return $this->query?$this->update():$this->insert();
	}

	/**
	 *    Delete current record
	 * @return int|bool
	 **/
	function erase() {
		$this->query=array_slice($this->query,0,$this->ptr,TRUE)+
			array_slice($this->query,$this->ptr,NULL,TRUE);
		$this->skip(0);
	}

	/**
	 *    Define onload trigger
	 * @param $func callback
	 **@return callback
	 */
	function onload($func) {
		return $this->trigger['load']=$func;
	}

	/**
	 *    Define beforeinsert trigger
	 * @param $func callback
	 **@return callback
	 */
	function beforeinsert($func) {
		return $this->trigger['beforeinsert']=$func;
	}

	/**
	 *    Define afterinsert trigger
	 * @param $func callback
	 **@return callback
	 */
	function afterinsert($func) {
		return $this->trigger['afterinsert']=$func;
	}

	/**
	 *    Define oninsert trigger
	 * @param $func callback
	 **@return callback
	 */
	function oninsert($func) {
		return $this->afterinsert($func);
	}

	/**
	 *    Define beforeupdate trigger
	 * @param $func callback
	 **@return callback
	 */
	function beforeupdate($func) {
		return $this->trigger['beforeupdate']=$func;
	}

	/**
	 *    Define afterupdate trigger
	 * @param $func callback
	 **@return callback
	 */
	function afterupdate($func) {
		return $this->trigger['afterupdate']=$func;
	}

	/**
	 *    Define onupdate trigger
	 * @param $func callback
	 **@return callback
	 */
	function onupdate($func) {
		return $this->afterupdate($func);
	}

	/**
	 *    Define beforesave trigger
	 * @param $func callback
	 **@return callback
	 */
	function beforesave($func) {
		$this->trigger['beforeinsert']=$func;
		$this->trigger['beforeupdate']=$func;
		return $func;
	}

	/**
	 *    Define aftersave trigger
	 * @param $func callback
	 **@return callback
	 */
	function aftersave($func) {
		$this->trigger['afterinsert']=$func;
		$this->trigger['afterupdate']=$func;
		return $func;
	}

	/**
	 *    Define onsave trigger
	 * @param $func callback
	 **@return callback
	 */
	function onsave($func) {
		return $this->aftersave($func);
	}

	/**
	 *    Define beforeerase trigger
	 * @param $func callback
	 **@return callback
	 */
	function beforeerase($func) {
		return $this->trigger['beforeerase']=$func;
	}

	/**
	 *    Define aftererase trigger
	 * @param $func callback
	 **@return callback
	 */
	function aftererase($func) {
		return $this->trigger['aftererase']=$func;
	}

	/**
	 *    Define onerase trigger
	 * @param $func callback
	 **@return callback
	 */
	function onerase($func) {
		return $this->aftererase($func);
	}

	/**
	 *    Reset cursor
	 * @return NULL
	 **/
	function reset() {
		$this->query=[];
		$this->ptr=0;
	}

}
