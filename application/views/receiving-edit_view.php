<h2>Order Ingredients Form</h2>
{error_messages}
<form action="/Receiving/save" method="post" enctype="multipart/form-data">
    {fid}
    {fname}
    {fonhand}
    {freceiving}
    {fprice}
    {zsubmit}
    <a class="btn btn-default" role="button" href="/Receiving/cancel">Cancel</a>
</form>