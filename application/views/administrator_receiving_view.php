<table class = "table table-bordered">
    <tr>
        <th>Id</th>
        <th>Item Name</th>
        <th>Receiving</th>
        <th>Cost</th>
        <th>Stock</th>
    </tr>
    {items}
    <tr> <td><a class="btn btn-default" role="button" href="/Administrator/edit/{id}">{id}</a></td>
        <td>{name}</td>
        <td>{qty_onhand}</td>
        <td>{qty_inventory}</td>
        <td>{price}</td>
    </tr>
    {/items}
</table>
