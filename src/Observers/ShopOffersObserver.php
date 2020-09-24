<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 9/24/2020
 * Time: 4:05 PM
 */

namespace MicroweberPackages\Shop\Offers\Observers;

use Illuminate\Support\Facades\Request;
use MicroweberPackages\Product\Product;

class ShopOffersObserver
{

    public function saved(Product $product)
    {
        if (isset($product->additionalData['special_price'])) {

            $productId = $product->id;
            $priceId = $product->priceModel->id;

            $findOffer = offers_get_price($productId, $priceId);

            $saveOffer = array();
            if ($findOffer) {
                $saveOffer['id'] = $findOffer['id'];
            }
            $saveOffer['is_active'] = 'on';
            $saveOffer['product_id_with_price_id'] = $productId . '|'.$priceId;
            $saveOffer['offer_price'] = $product->additionalData['special_price'];

            $save = offer_save($saveOffer);

        }
    }

}