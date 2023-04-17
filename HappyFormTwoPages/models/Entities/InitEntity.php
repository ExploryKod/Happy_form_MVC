<?php

abstract class InitEntity {

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $method = str_replace("_", " ", $key);
            $method = ucwords($method);
            $method =  'set' . str_replace(" ", "", $method);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}