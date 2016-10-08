<div class="row">
    homepage_view.php: hello world
    <h1>Welcome to Gerard's Log: These are dummy data for now</h1>

    <button class="btn btn-primary" type="button">
        Total Stock Price <span class="badge">$ {total_stock_price}</span>
    </button>
    <button class="btn btn-primary" type="button">
        Average Stock Price <span class="badge">$ {average_stock_price}</span>
    </button>
    <button class="btn btn-info" type="button">
        Total Stock Order <span class="badge">{total_stock_order} orders</span>
    </button>
    <button class="btn btn-success" type="button">
        Total Supply Quantities <span class="badge">{total_supply_quantities} supplies</span>
    </button>
    <button class="btn btn-warning" type="button">
        Total Supply Receiving Cost <span class="badge">$ {total_supply_receivingCost}</span>
    </button>
    <button class="btn btn-warning" type="button">
        Average Supply Receiving Cost <span class="badge">$ {average_supply_receivingCost}</span>
    </button>
    <button class="btn btn-danger" type="button">
        Total Supply Receiving Number <span class="badge">{total_supply_receivingNo} units</span>
    </button>

    <br><h1>Recipes</h1><br>
    {recipes}
    <h3 class="text-right">{name}</h3>
    <div class="span4"><a href="{href}"><img src="/pix/{pic}" title="{name}"/></a></div>
    <p class="text-left">Name{}: {name}</p>
    <p class="text-left">Ingredients{}: {ingredients}</p>
    <p class="text-left">IngredientAmount{}: {ingredientAmount}</p>
    {/recipes}

    <br><h1>Stocks</h1><br>
    {stocks}
    <h3 class="text-right">{name}</h3>
    <div class="span4"><a href="{href}"><img src="/pix/{pic}" title="{name}"/></a></div>
    <p class="text-left">Name{}: {name}</p>
    <p class="text-left">Price{}: {price}</p>
    <p class="text-left">Order{}: {order}</p>
    <p class="text-left">Description{}: {description}</p>
    {/stocks}

    <br><h1>Supplies</h1><br>
    {supplies}
    <h3 class="text-right">{name}</h3>
    <p class="text-left">Name{}: {name}</p>
    <p class="text-left">receivingNo{}: {receivingNo}</p>
    <p class="text-left">receivingUnit{}: {receivingUnit}</p>
    <p class="text-left">receivingCost{}: {receivingCost}</p>
    <p class="text-left">quantities{}: {quantities}</p>
    <p class="text-left">Order{}: {order}</p>
    <p class="text-left">Description{}: {description}</p>
    {/supplies}



</div>