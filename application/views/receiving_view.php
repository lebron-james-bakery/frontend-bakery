<table class = "table table-bordered">
            <tr>
                <th>Item Name</th>
                <th>Receiving</th>
                <th>Cost</th>
                <th>Stock</th>
            </tr>
            {items}
            <tr>
                <td><a class="btn btn-default" role="button" href="/Receiving/edit/{name}">{name}</a></td>
                <td>{qty_onhand}</td>
                <td>{qty_inventory}</td>
                <td>{price}</td>
            </tr>
            {/items}
        </table>
