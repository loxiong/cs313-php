<?php
class Product
{
    public $productArray = array(
        "11" => array(
            'id' => '1',
            'name' => 'Honey Crisp Apples',
            'code' => '11',
            'image' => 'images/apples.jpg',
            'price' => '10.00'
        ),
        "22" => array(
            'id' => '2',
            'name' => 'Kiona Sweet Cherries',
            'code' => '22',
            'image' => 'images/cherries.jpg',
            'price' => '20.00'
        ),
        "33" => array(
            'id' => '3',
            'name' => 'Sweetest Orange',
            'code' => '33',
            'image' => 'images/oranges.jpg',
            'price' => '15.00'
        ),
        "44" => array(
            'id' => '4',
            'name' => 'Kyoho Grapes',
            'code' => '44',
            'image' => 'images/grapes.jpg',
            'price' => '15.00'
        ),
        "55" => array(
            'id' => '5',
            'name' => 'Sun Glow Apricot',
            'code' => '55',
            'image' => 'images/apricots.jpg',
            'price' => '25.00'
        ),
        "66" => array(
            'id' => '6',
            'name' => 'Ozark Beauty Strawberries',
            'code' => '66',
            'image' => 'images/strawberries.jpg',
            'price' => '20.00'
        )
    );
    public function getAllProduct()
    {
        return $this->productArray;
    }
}

