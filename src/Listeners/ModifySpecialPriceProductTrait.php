<?php

/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/1/2020
 * Time: 11:13 AM
 */

namespace MicroweberPackages\Shop\Offers\Listeners;

trait ModifySpecialPriceProductTrait {

    public function handle($event)
    {
        $request = $event->getRequest();
        $product = $event->getModel();

        if (!isset($product->priceModel->id)) {
            return;
        }

        if (isset($request['special_price'])) {

            $productId = $product->id;
            $priceId = $product->priceModel->id;

            $findOffer = offers_get_price($productId, $priceId);

            $saveOffer = array();
            if ($findOffer) {
                $saveOffer['id'] = $findOffer['id'];
            }
            $saveOffer['is_active'] = 'on';
            $saveOffer['product_id_with_price_id'] = $productId . '|'.$priceId;
            $saveOffer['offer_price'] = $request['special_price'];

            $save = offer_save($saveOffer);

        }
        clearcache();
    }
}