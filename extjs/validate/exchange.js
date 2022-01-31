let buybtn=document.getElementById("buyButton");
let sellbtn=document.getElementById("sellButton");

let assets=document.getElementById("userassets");
    assets=JSON.parse(assets.value);
let coin=document.getElementById("assetcoin");
    coin=coin.value;
let buyprice=document.getElementById("buyPrice");
let buyamount=document.getElementById("buyAmount");
let buytotal=document.getElementById("buyTotal");
let sellprice=document.getElementById("sellPrice");
let sellamount=document.getElementById("sellAmount");
let selltotal=document.getElementById("sellTotal");

buyprice.addEventListener('change',function(e){
    if(buyprice.value<=0){
        buyprice.value='';
    }
});
buyamount.addEventListener('change',function(e){
    if(buyamount.value<=0 || buyamount.value > assets.USDT){
        buyamount.value='';
    }
});
sellprice.addEventListener('change',function(e){
    if(sellprice.value<=0){
        sellprice.value='';
    }
});
sellamount.addEventListener('change',function(e){
    if(sellamount.value<=0 || sellamount.value>assets[coin]){
        sellamount.value='';
    }
});

checktotal=setInterval(checkbuyamount,300);
function checkbuyamount(){
    if(buyamount.value==''){
        buyamount.value='';
    }
    if(buyprice.value==''){
        buyprice.value='';
    }
    if(sellamount.value==''){
        sellamount.value='';
    }
    if(sellprice.value==''){
        sellprice.value='';
    }

    if(buyamount.value<0 || buyamount.value > assets.USDT){
        buyamount.value='';
    }
    if(sellamount.value<0 || sellamount.value>assets[coin]){
        sellamount.value='';
    }

    if(buyprice.value!='' && buyamount.value!=''){
        if(buyprice.value>0 && buyamount.value>0){
            buytotal.value=(buyamount.value/buyprice.value);
        }else{
            buytotal.value='';
        }
    }else{
        buytotal.value='';
    }
    if(sellprice.value!='' && sellamount.value!=''){
        if(sellprice.value>0 && sellamount.value>0){
            selltotal.value=(sellamount.value*sellprice.value);
        }else{
            selltotal.value='';
        }
    }else{
        selltotal.value='';
    }
}

buybtn.addEventListener('click',function(e){
    if(buytotal.value=='' || buyamount.value=='' || buyprice.value==''){
        e.preventDefault();
    }else{
        if(window.confirm("Are you sure you want to place this order?")){
            assets.USDT=assets.USDT-buyamount.value;
            document.getElementById('assetsBuy').value=JSON.stringify(assets);
        }else{
            e.preventDefault();
        }
    }
});
sellbtn.addEventListener('click',function(e){
    if(selltotal.value=='' || sellamount.value=='' || sellprice.value==''){
        e.preventDefault();
    }else{
        if(window.confirm("Are you sure you want to place this order?")){
            assets[coin]=assets[coin]-sellamount.value;
            document.getElementById('assetsSell').value=JSON.stringify(assets);
        }else{
            e.preventDefault();
        }
    }
});