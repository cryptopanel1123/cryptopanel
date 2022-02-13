let orders = document.getElementById('orders');
    orders=JSON.parse(orders.value);
let activeOrdersElem=document.getElementById('active-orders-body');
let html='';
for(let i in orders){
    if(orders[i].buy_sell=='1'){
        html+=`<tr>
                <td>${orders[i].coin}</td>
                <th>${orders[i].placed_at}</th>
                <td class="crypt-down">Sell</td>
                <td class="crypt-down">${orders[i].price}</td>
                <td class="crypt-down">${orders[i].amount} BTC</td>
                <td class="crypt-down">${orders[i].total} USDT</td>
                <td class="crypt-box-menu menu-red"><a href="php/cancelorder.php?orderid=${orders[i].id}">Cancel Order</a></td>
                </tr>`;
    }else{
        html+=`<tr>
                <td>${orders[i].coin}</td>
                <th>${orders[i].placed_at}</th>
                <td class="crypt-up">Buy</td>
                <td class="crypt-up">${orders[i].price}</td>
                <td class="crypt-up">${orders[i].amount} USDT</td>
                <td class="crypt-up">${orders[i].total} BTC</td>
                <td class="crypt-box-menu menu-red"><a onclick="return confirm('Are you sure you want to cancel this order?');" href="php/cancelorder.php?orderid=${orders[i].id}">Cancel Order</a></td>
                </tr>`;
    }
}
activeOrdersElem.innerHTML=html;
let orders_history = document.getElementById('ordersHistory');
    orders_history=JSON.parse(orders_history.value);
let closedOrdersElem=document.getElementById('closed-orders-body');
let html_orders_history='';
for(let i in orders_history){
    if(orders_history[i].buy_sell=='1'){
        html_orders_history+=`<tr>
                <td>${orders_history[i].coin}</td>
                <th>${orders_history[i].placed_at}</th>
                <th>${orders_history[i].resolved_at}</th>
                <td class="crypt-down">Sell</td>
                <td class="crypt-down">${orders_history[i].price}</td>
                <td class="crypt-down">${orders_history[i].amount} BTC</td>
                <td class="crypt-down">${orders_history[i].total} USDT</td>
                <td class="${(orders_history[i].status=="SUCCESS")?"crypt-up":"crypt-down"}">${orders_history[i].status}</td>
                </tr>`;
    }else{
        html_orders_history+=`<tr>
                <td>${orders_history[i].coin}</td>
                <th>${orders_history[i].placed_at}</th>
                <th>${orders_history[i].resolved_at}</th>
                <td class="crypt-up">Buy</td>
                <td class="crypt-up">${orders_history[i].price}</td>
                <td class="crypt-up">${orders_history[i].amount} USDT</td>
                <td class="crypt-up">${orders_history[i].total} BTC</td>
                <td class="${(orders_history[i].status=="SUCCESS")?"crypt-up":"crypt-down"}">${orders_history[i].status}</td>
                </tr>`;
    }
}
closedOrdersElem.innerHTML=html_orders_history;
