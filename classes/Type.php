<?php

interface Type {

    public function getAttribute($data);

}

class Dvd implements Type {
    public function getAttribute($data)
    {
        $attribute = $data['size']." MB";
        return $attribute;
    }
}

class Book implements Type {
    public function getAttribute($data)
    {
        $attribute = $data['weight']." KG";
        return $attribute;
    }
}

class Furniture implements Type {
    public function getAttribute($data)
    {
        $attribute = $data['height']."cm"." x ".$data['width']."cm"." x ".$data['length']."cm";
        return $attribute;
    }
}

class TypeController{
    public function show(Type $type, $data){
        $attribute=$type->getAttribute($data);
        return $attribute;
    }
}