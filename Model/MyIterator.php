<?php
class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "clé : $var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "suivant : $var\n";
        return $var;
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        echo "valide : $var\n";
        return $var;
    }

}
?>