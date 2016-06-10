<?php
require ("MyIterator.php");

class ListGroup implements IteratorAggregate
{
    private $items = array();
    private $count = 0;
    // Définition requise de l'interface IteratorAggregate
    public function getIterator() {
        return new MyIterator($this->items);
    }

    public function add($value) {
        $this->items[$this->count++] = $value;
    }
}

?>



