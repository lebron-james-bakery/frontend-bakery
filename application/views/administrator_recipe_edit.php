<form action="/production/save" method="post" enctype="multipart/form-data">
    {name}
    <img class="scale-detail" src="/pix/{pic}">
    <div class="form-group">        
        <label for="changepic">Change picture</label>
        <input type="file" id="changepic" name="changepic"/> 
    </div>
    {desc}
    {price}
    {qty}
    <table class="table ingredient">
        <tr>
            <th>Name</th>
            <th>Quantity(g)</th>
            <th>OnHand Quantity(kg)</th>
        </tr>
        {ingredient}
        <tr>
            <td>{ing_name}</td>
            <td><input class="form-control" type="number" name="{ing_name}" title="{ing_id}" value={ing_qty}></td>
            <td>{ing_onhand}</td>
        </tr>
        {/ingredient}
    </table>
    {zsubmit}
    <a class="btn btn-default" role="button" href="/Administrator/cancel">Cancel</a>
</form>