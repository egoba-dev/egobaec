<?php

namespace Plugin\Rental\Service;

use Plugin\Rental\Entity\RentalProduct;

class RentalCalculationService
{
    /**
     * レンタル期間のオプションを取得
     *
     * @param RentalProduct $rentalProduct
     * @return array
     */
    public function getRentalPeriodOptions(RentalProduct $rentalProduct)
    {
        $options = [];
        
        // 基本的な期間オプション
        $options[1] = '1日間';
        $options[3] = '3日間';
        $options[7] = '7日間';
        
        // 最大レンタル可能日数に応じて追加オプション
        $maxDays = $rentalProduct->getRentalMaxDays() ?: 30; // デフォルト30日
        
        if ($maxDays >= 14) {
            $options[14] = '14日間';
        }
        
        if ($maxDays >= 30) {
            $options[30] = '30日間';
        }
        
        // 最大レンタル日数が特殊な値の場合、それも追加
        if ($maxDays > 30 && $maxDays % 30 != 0) {
            $options[$maxDays] = $maxDays . '日間';
        }
        
        return $options;
    }
    
    /**
     * レンタル料金を計算
     * 
     * @param RentalProduct $RentalProduct レンタル商品情報
     * @param int $period レンタル期間（日数）
     * @param int $quantity 数量（デフォルト: 1）
     * @return int 料金
     */
    public function calculateRentalPrice(RentalProduct $RentalProduct, int $period, int $quantity = 1)
    {
        // 日額料金
        $dailyPrice = $RentalProduct->getRentalPriceDaily() ?: 0;
        
        // 単純に日数と日額料金、数量で計算
        $totalPrice = $dailyPrice * $period * $quantity;
        
        return $totalPrice;
    }
}