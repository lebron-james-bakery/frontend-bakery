<div class="row">
    {items}
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <a href="{href}"><img src="/pix/{picture}" title="{name}"/></a>
            <h5 class="text-center">{name}</h5>
            <h5 class="text-center">Price: ${price}</h5>
            <h5 class="text-center">Stock Available: {qty}</h5>
        </div>
    </div>
    {/items}
    <div class='col-md-3'>
        <div class="row">
            {receipt}
        </div>
        <div class="row">
            <a class="btn btn-primary btn-default" role="button" href="/shopping/checkout">Checkout</a>
            <a class="btn btn-default" role="button" href="/shopping/cancel">Cancel This Order</a>
        </div>
     </div>
</div>