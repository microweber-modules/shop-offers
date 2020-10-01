<?php
namespace MicroweberPackages\Shop\Offers\Listeners;

class AddSpecialPriceProductListener
{
    public function handle($event)
    {
        $request = $event->getRequest();
        $product = $event->getModel();




    }
}
