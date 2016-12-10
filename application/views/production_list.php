<h1>Products list</h1>
<table class="table">
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Qty</th>
    </tr>
    {items}
    <tr>
        <td><a class="btn btn-default" role="button" href="/production/{id}">{id}</a></td>
        <td>{name}</td>
        <td>{qty}</td>
    </tr>
    {/items}
</table>