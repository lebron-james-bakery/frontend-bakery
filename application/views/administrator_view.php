<div class="panel panel-default">
    <div class="panel-body">
        Administrator Supplies
    </div>
</div>
<table class = "table table-bordered">
    <tr>
        <th>Id</th>
        <th>Item Name</th>
        <th>Receiving</th>
        <th>Cost</th>
        <th>Stock</th>
    </tr>
    {supplyItems}
    <tr> <td><a class="btn btn-default" role="button" href="/Administrator/editSupplies/{id}">{id}</a></td>
        <td>{name}</td>
        <td>{qty_onhand}</td>
        <td>{qty_inventory}</td>
        <td>{price}</td>
    </tr>
    {/supplyItems}
</table>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        Administrator Recipes
    </div>
</div>
<table class = "table table-bordered">
    <tr>
        <th>Id</th>
        <th>Item Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Picture</th>
    </tr>
    {recipeItems}
    <tr> <td><a class="btn btn-default" role="button" href="/Administrator/editRecipes/{id}">{id}</a></td>
        <td>{name}</td>
        <td>{description}</td>
        <td>{price}</td>
        <td>{qty}</td>
        <td>{picture}</td>
    </tr>
    {/recipeItems}
</table>