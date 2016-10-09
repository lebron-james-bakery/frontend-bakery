<div class="row">
        <table class = "table table-bordered">
            <tr>
                <th>Item</th>
                <th>Receiving Unit</th>
                <th>Qty</th>
            </tr>
            {items}
            <tr>            
                <td><a href="{href}">{name}</a></td>
                <td>{receivingNo}</td>
                <td><button type="button">Add</button></td>
            </tr>
            {/items}
        </table>
                    
</div>