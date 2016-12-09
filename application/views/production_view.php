<div class="content">
    <h2>{name}</h2>
    <div class="desc">
        <p>{desc}</p>
        <label>Price:&nbsp;</label>{price}<span> C$</span></br>
        <label>Units Available:&nbsp;</label>{qty}<span> Pieces</span>
    </div>
    <img class="scale-detail" src="/pix/{pic}">
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
</div>
