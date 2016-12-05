<h1>Productions list</h1>
<table class="table">
    <tr>
        <th>Production #</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Qty</th>
    </tr>
    {items}
    <tr>
        <td><a href="/production/{id}">{id}</a></td>
        <td><img class="scale" src="/pix/{pic}"/></td>
        <td>{name}</td>
        <td>{desc}</td>
        <td>{price}</td>
        <td>{qty}</td>
    </tr>
    {/items}
</table>
<a class="btn btn-default" role="button" href="/production/new_production">Add a New Production</a>