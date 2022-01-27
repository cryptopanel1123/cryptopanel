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
                <td class="crypt-box-menu menu-red"><a href="php/cancelorder.php?orderid=${orders[i].id}">Cancel Order</a></td>
                </tr>`;
    }
}
activeOrdersElem.innerHTML=html;
