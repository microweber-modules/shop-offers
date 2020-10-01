<?php
namespace MicroweberPackages\Shop\Offers\Listeners;


class EditCustomFieldProductListener
{
    public function handle($event)
    {
        $request = $event->getRequest();
        $product = $event->getModel();



    }
}
