<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {

            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            $item->sell_in = updateSellIn($item->sell_in);

            $new_quality = $item->Quality;

            if ($item->name == 'Aged Brie') {
                if ($item->sell_in < 0) {
                    $new_quality = $item->quality + 2;
                }
                else{
                    $new_quality = $item->quality + 1;
                }
            } 

            else if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->sell_in < 0) {
                    $new_quality = 0;
                }
                else if ($item->sell_in < 6) {
                    $new_quality = $item->quality + 3;
                }
                else if ($item->sell_in < 11) {
                    $new_quality = $item->quality + 2;
                }
            }
            else {
                if ($item->sell_in < 0) {
                    $new_quality = $item->quality - 2;
                }
                else if ($item->sell_in < 6) {
                    $new_quality = $item->quality - 1;
                }
            }

            $item = updateItemQuality($item,$new_quality)
        
    }
}

    public function updateSellIn(int $sellIn): int
        {
            return $sellIn -1;
        } 

    public function updateItemQuality(Item $item, int $new_quality): Item
        {
            if ($new_quality > 50){
                $item->quality = 50
            }
            else if ($new_quality < 0){
                $item->quality = 0
            }
            else{
                $item->quality = $new_quality
            }

            return $item
        } 
