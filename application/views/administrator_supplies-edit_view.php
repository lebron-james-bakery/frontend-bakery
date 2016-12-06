<h2>{action} Administrator Receiving </h2>
{error_messages}
<form action="/Administrator/saveSupplies" method="post" enctype="multipart/form-data">
    {fid}
    {freceiving}
    {fprice}
    {zsubmit}
    <a class="btn btn-default" role="button" href="/Administrator/cancel">Cancel</a>
</form>