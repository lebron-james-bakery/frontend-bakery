<div class="row">
    <div class="desc">
    <form>        
        <p class="lead">{name}</p><br>
        <label for="ReceivingUnit">Description</label>
        <p class="text-left">{description}</p><br/>
        
        <div class="form-group">
        <label for="Receiving">Receiving:</label>
        <input type="text" class ="form-control textbox" value="{receiving} {Unit}"><br/>
        </div>
        <div class="form-group">
        <label for="ReceivingCost">Receiving Cost:</label>
        <input type="text" class ="form-control textbox" value="$ {Cost}"><br/>
        </div>
        <div class="form-group">
        <label for="Stocking">Stocking:</label>
        <input type="text" class ="form-control textbox" value="{stocking} {Unit}"><br/>
        </div>
        <div class="form-group">
        <label for="Quantity">On-hand:</label>
        <input type="text" class ="form-control textbox" value="{quantities} {Unit}"><br/>
        </div>       
    </form>
    </div>              
</div>