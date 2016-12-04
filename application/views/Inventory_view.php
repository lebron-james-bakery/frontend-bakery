<h2>Menu Maintenance - {action}</h2>
{error_messages}
<form action="/receiving/save" method="post" enctype="multipart/form-data">
    {fname}
    {freceiving}
    {fprice}

    {zsubmit}
    <a class="btn btn-default" role="button" href="/receiving/cancel">Cancel</a>
</form>