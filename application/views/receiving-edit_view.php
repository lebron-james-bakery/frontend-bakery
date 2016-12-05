<h2>{action} Receiving </h2>
{error_messages}
<form action="/Receiving/save" method="post" enctype="multipart/form-data">
    {fid}
    {freceiving}
    {fprice}
    {zsubmit}
    <a class="btn btn-default" role="button" href="/Receiving/cancel">Cancel</a>
</form>