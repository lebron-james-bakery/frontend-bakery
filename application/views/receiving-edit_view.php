<h2>{action} Receiving </h2>
{error_messages}
<form action="/Receiving/save" method="post" enctype="multipart/form-data">
    {id}
    {receiving}
    {price}
    {submit}
    <a class="btn btn-default" role="button" href="/Receiving/cancel">Cancel</a>
</form>