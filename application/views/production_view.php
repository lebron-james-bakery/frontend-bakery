<div class="row">
    <h2>{name}</h2>
    <img class="scale" src="/pix/{pic}">
    <p>{desc}</p>
    <span>{price}</span>
    <span>{qty}</span>
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>OnHand Quantity</th>
        </tr>
        {ingredient}
        <tr>
            <td>{ing_name}</td>
            <td>{ing_qty}</td>
            <td>{ing_onhand}</td>
        </tr>
        {/ingredient}
    </table>
</div>
