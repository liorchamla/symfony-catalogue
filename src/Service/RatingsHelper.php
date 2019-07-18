<?php

namespace App\Service;

use App\Entity\Product;
use App\Entity\Rating;

class RatingsHelper
{
    public function calculateAvgForProduct(Product $product): float
    {
        $ratings = $product->getRatings();

        return array_reduce($ratings->toArray(), function (float $total, Rating $rating) {
            return $total + $rating->getNotation();
        }, 0) / $ratings->count();
    }
}
