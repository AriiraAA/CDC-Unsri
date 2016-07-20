<?php
abstract class Model{
		abstract public function getKeyValue();
        abstract public function getDescriptionValue();
		abstract public function setField($index, $value);
		abstract public function getField($index);
}
?>