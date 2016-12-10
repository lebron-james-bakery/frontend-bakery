<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Hey!</strong> You can minimize the tables by clicking on the headers.
</div>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    To prevent system overload, any price adjustments are rounded down to the nearest integer.
</div>
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
                        <th>Item Id</th>
                        <th>Item Name</th>
                        <th>On-Hand Quantity (g)</th>
                        <th>Receiving Quantity (g)</th>
                        <th>Price per Unit ($)</th>
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
                        <th>Units Available (Pieces)</th>
                        <th>Picture</th>
                    </tr>
                    {recipeItems}
                    <tr> <td><a class="btn btn-default" role="button" href="/Production/edit/{id}">{id}</a></td>
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