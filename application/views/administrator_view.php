<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Administrator Supplies
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <table class = "table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>On-hand Quantity</th>
                        <th>Cost Per Item</th>
                        <th>Receiving Quantity</th>
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

            </div>
        </div>
    </div>
</div>

<br>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    Administrator Recipes
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <table class = "table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Units Available</th>
                        <th>Picture</th>
                    </tr>
                    {recipeItems}
                    <tr> <td><a class="btn btn-default" role="button" href="/Administrator/editRecipes/{id}">{id}</a></td>
                        <td>{name}</td>
                        <td>{description}</td>
                        <td>{price}</td>
                        <td>{unit}</td>
                        <td><img class="scale-detail" src="/pix/{picture}"></td>
                    </tr>
                    {/recipeItems}
                </table>

            </div>
        </div>
    </div>
</div>