<table class = "table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>On-Hand Quantity</th>
                <th>Receiving Quantity</th>
                <th>Price</th>
            </tr>
            {items}
            <tr> <td><a class="btn btn-default" role="button" href="/Receiving/edit/{id}">{id}</a></td>
                <td>{name}</td>
                <td>{qty_onhand}</td>
                <td>{qty_inventory}</td>
                <td>{price}</td>
            </tr>
            {/items}
        </table>
