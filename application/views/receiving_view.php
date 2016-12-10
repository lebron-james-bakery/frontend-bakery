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
