<div class="row">
    homepage_view.php: hello world
    <h1>Welcome to Gerard's Log: These are dummy data for now</h1>
    {items}
    <h3 class="text-right">{who}</h3>
    <br>
    <div class="span4"><a href="{href}"><img src="/pix/{pic}" title="{who}"/></a></div>
    <br>
    <p class="text-left">{what}</p>
    <br>
    {/items}

    <br><h1>Recipes</h1><br>
    {recipes}
    <h3 class="text-right">{name}</h3>
    <br>
    <div class="span4"><a href="{href}"><img src="/pix/{pic}" title="{name}"/></a></div>
    <br>
    <p class="text-left">{ingredients}</p>
    <br>
    {/recipes}
</div>