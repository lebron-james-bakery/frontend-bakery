<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Prepare</strong> allows the staff to convert receiving inventory into on-hand quantity.
    <strong>Order</strong> displays a form for staff to order new materials. These transactions will be logged and deducted from the bakery's funds.
</div>
<h1>Receiving list</h1>
<table class = "table table-bordered">
            <tr>
                <th>Item Id</th>
                <th>Item Name</th>
                <th>On-Hand Quantity (g)</th>
                <th>Receiving Quantity (g)</th>
                <th>Price per Unit ($)</th>
                <th>Action</th>
            </tr>
            {items}
            <tr> <td><a class="btn btn-default" role="button" href="/Receiving/edit/{id}">{id}</a></td>
                <td>{name}</td>
                <td>{qty_onhand}</td>
                <td>{qty_inventory}</td>
                <td>{price}</td>
                <td><a class="btn btn-default" role="button" href="/Receiving/edit/{id}">Order</a>
                    <a class="btn btn-default" role="button" href="/Receiving/prepare/{id}">Prepare</a></td>
            </tr>
            {/items}
        </table>
