<h1>Orders Processed So Far</h1>

<table class="table">
    <tr><th>Order #</th><th>Date/time</th><th>Amount</th></tr>
{Orders}
    <tr>
        <td><a href="/Sales/examine/{number}">{number}</a></td>
        <td>{datetime}</td>
        <td>{total}</td>
    </tr>
{/Orders}
</table>

<a class="btn btn-default" role="button" href="/Sales/neworder">Start a New Order</a>