<div class="content">
    <h2>{name}</h2>
    <label class="ingredient">Quantity:&nbsp;</label>{qty}<span></span>
    <table class="table ingredient">
        <tr>
            <th>Name</th>
            <th>Quantity(g)</th>
            <th>OnHand Quantity(kg)</th>
        </tr>
        {ingredient}
        <tr>
            <td>{ing_name}</td>
            <td>{ing_qty}</td>
            <td>{ing_onhand}</td>
        </tr>
        {/ingredient}
    </table>
    <a class="btn btn-primary" role="button" href="/Production/cook/{id}">Cook One</a>
</div>
