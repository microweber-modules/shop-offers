<?php must_have_access(); ?>

<?php
if (!isset($params['product_id'])) {
    return;
}

$productId = $params['product_id'];
$product = \MicroweberPackages\Product\Product::find($productId);

?>
<script>
    $(document).ready(function () {
        var specialPriceElement = $('.js-product-special-price');
        $(specialPriceElement).on('input', function () {
            mw.on.stopWriting(this, function () {
               if (parseFloat($('.js-product-price').val()) === parseFloat($(this).val())) {
                    mw.notification.warning('<?php _e('Special price must be different from the original price!'); ?>');
               }
            });
        });

    });
</script>

<div class="form-group">
	<label>Special Price</label>
	<div class="input-group mb-3 prepend-transparent append-transparent">
		<div class="input-group-prepend">
			<span class="input-group-text text-muted">BGN</span>
		</div>
		<input type="text" class="form-control js-product-special-price" name="special_price" value="">
		<div class="input-group-append">
			<span class="input-group-text" data-toggle="tooltip" title="" data-original-title="To put a product on sale, make Compare at price the original price and enter the lower amount into Price."><i class="mdi mdi-help-circle"></i></span>
		</div>
	</div>
</div>