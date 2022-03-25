<!DOCTYPE html>
<html lang="en">
<?php
    date_default_timezone_set("Asia/Kolkata");
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.html");
    }
    if(isset($_GET['coin']) && isset($_GET['coinx'])){
        $coin=$_GET['coin'];
        $coinx=$_GET['coinx'];
    }else{
        $coin='BTC';
        $coinx='Bitcoin';
    }
    $chart=$coin.'USDT';
    $id=$_SESSION['id'];
    $con=mysqli_connect('localhost','root','','cryptopanel');
    if($con){
        $result=mysqli_query($con,"select * from user where id= '$id';");
        $row=mysqli_fetch_array($result);
        if($row!=null){
            if($row['isRestricted']=="1")
            { 
                header("location:php/display.php?title=RESTRICTED USER!&msg=");
            }
        }    
        $result=mysqli_query($con,"select * from portfolio where uid='$id';");
        if($result!=null){
        $result=mysqli_fetch_array($result);
        $assets=json_decode($result['assets'],true);
        }else{
            echo mysqli_error($con);
        }
        $result1=mysqli_query($con,"select * from orders where uid='$id';");
        if($result1!=null){
            $orders=null;
            while($row=mysqli_fetch_array($result1)){
                $orders[]=$row;
            }
        }
        $result2=mysqli_query($con,"select * from orders_history where uid='$id';");
        if($result2!=null){
            $ordersHistory=null;
            while($row1=mysqli_fetch_array($result2)){
                $ordersHistory[]=$row1;
            }
        }
    }
?>

<head class="crypt-dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cryptopanel - Cryptocurrency Trading Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/ui.css">
</head>

<body class="crypt-dark">
    <form>
        <input type="hidden" id="chartcoin" value="<?php echo $chart?>">
        <input type="hidden" id="assetcoin" value="<?php echo $coin?>">
        <input type="hidden" id="userassets" value=<?php echo $result['assets']?>>
        <input type="hidden" id="orders" value='<?php echo json_encode($orders,JSON_FORCE_OBJECT)?>'>
        <input type="hidden" id="ordersHistory" value='<?php echo json_encode($ordersHistory,JSON_FORCE_OBJECT)?>'>
    </form>
    <header>
        <div class="container-full-width">
            <div class="crypt-header">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
                        <div class="row">
                            <div class="col-xs-2">
                                <a href="exchange.html">
                                <div class="crypt-logo"><img src="images/logo.png" alt=""></div>
                            </div>
                            <!-- <here> -->
                            <div class="col-xs-2" style="padding-left:30px;">
                                <ul class="crypt-heading-menu fright">
                                    <li class="crypto-has-dropdown"><a href="exchange.php?coin=<?php echo $coin;?>&coinx=<?php echo $coinx?>"><h6><?php echo $coin."-".$coinx;?></h6></a>
                                        <ul class="crypto-dropdown">
                                            <li><a href="exchange.php?coin=BTC&coinx=Bitcoin">BTC-Bitcoin</a></li>
                                            <li><a href="exchange.php?coin=ETH&coinx=Ethereum">ETH-Ethereum</a></li>
                                            <li><a href="exchange.php?coin=BNB&coinx=BinanceCoin">BNB-BinanceCoin</a></li>
                                            <li><a href="exchange.php?coin=XRP&coinx=Ripple">XRP-Ripple</a></li>
                                            <li><a href="exchange.php?coin=SOL&coinx=Solana">SOL-Solana</a></li>
                                            <li><a href="exchange.php?coin=DOT&coinx=Polkadot">DOT-Polkadot</a></li>
                                            <li><a href="exchange.php?coin=ADA&coinx=Cardano">ADA-Cardano</a></li>
                                            <li><a href="exchange.php?coin=LUNA&coinx=Terra">LUNA-Terra</a></li>
                                            <li><a href="exchange.php?coin=SHIB&coinx=ShibaInu">SHIB-ShibaInu</a></li>
                                            <li><a href="exchange.php?coin=DOGE&coinx=DogeCoin">DOGE-DogeCoin</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 d-none d-md-block d-lg-block">
                        <ul class="crypt-heading-menu fright">
                            <!-- <li><a href="market-overview.html">Overview</a></li>
                            <li><a href="marketcap.html">Market Cap</a></li>
                            <li><a href="trading.html">Trading</a></li> -->
                            <li><a href="withdrawl.php">Wallet</a></li>
                            <li class="crypt-box-menu menu-red"><a href="php/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row sm-gutters">
            <!-- ########## -->
            <?php
                $coin_stats_string=array('BTC'=>'bitcoin','ETH'=>'ethereum','BNB'=>'binancecoin','XRP'=>'ripple','SOL'=>'solana','DOT'=>'polkadot','ADA'=>'cardano','LUNA'=>'terra-luna','SHIB'=>'shiba-inu','DOGE'=>'dogecoin');
                $fetch_coin=$coin_stats_string[$coin];
                $response=file_get_contents("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=$fetch_coin&order=market_cap_desc&per_page=100&page=1&sparkline=false&price_change_percentage=24h");
                $response=json_decode($response,JSON_OBJECT_AS_ARRAY);
            ?>
            <!-- ########## -->
            <div class="col-md-6 col-lg-6 col-xl-9 col-xxl-10">
                <div class="crypt-gross-market-cap mt-4">
                    <div class="row">
                        <div class="col-3 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>Market capitalisation</p>
                                    <p class="crypt-up"><?php echo '$'.$response[0]['market_cap']?></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>24H Change</p>
                                    <?php
                                    if($response[0]['price_change_24h']<0){
                                        echo "<p class='crypt-down'>".$response[0]['price_change_24h']." ".$response[0]['price_change_percentage_24h']."%</p>";
                                    }else{
                                        echo "<p class='crypt-up'>".$response[0]['price_change_24h']." ".$response[0]['price_change_percentage_24h']."%</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>24H High</p>
                            <p class="crypt-up"><?php echo '$'.$response[0]['high_24h']?></p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>24H Low</p>
                            <p class="crypt-down"><?php echo '$'.$response[0]['low_24h']?></p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>Market cap rank</p>
                            <p class="crypt-up">&nbsp;<?php echo $response[0]['market_cap_rank']?></p>
                        </div>
                    </div>
                </div>
                <div class="tradingview-widget-container mb-3">
                    <div id="crypt-candle-chartext" style="height:400px;"></div>
                </div>
                <div id="depthchart" class="depthchart h-40 crypt-dark-segment"></div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                <div class="crypt-market-status mt-4">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="#history" class="active" data-toggle="tab">Recent News</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="history">
                            <?php $new = mysqli_query($con,"SELECT * FROM news ORDER BY id DESC ");
                                for($i=0;$i<7;$i++){
                                    if($res = mysqli_fetch_array($new)){  
                                        echo "<div class=\"crypto-panel-block\">";
                                        echo "<div class=\"crypto-panel-date\">";
                                        echo "<p>".date('M, d h:i',strtotime($res['date']))."</p></div>";
                                        echo "<div class=\"crypto-panel-title\">";
                                        echo "<h6>".$res['title']."</h6></div>";
                                        echo "<div class=\"crypto-panel-desc\">";
                                        echo "<p>".$res['content']."</p>";
                                        echo "<hr></div></div>";
                                    }
                               }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row sm-gutters">
            <div class="col-xl-5">
                <div class="crypt-boxed-area">
                    <h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
                    <div class="row no-gutters" style="height:45vh">
                        <div class="col-md-6">
                            <div class="crypt-buy-sell-form">
                                <p>Buy <span class="crypt-up"><?php echo $coin;?></span> <span class="fright">Available: <b class="crypt-up"><?php echo $assets['USDT'];?> USDT</b></span></p>
                                <div class="crypt-buy">
                                    <form action="php/buy.php" method="post">
                                        <input type="hidden" name="coin" value="<?php echo $coin?>">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"> <span class="input-group-text">Price</span> </div>
                                            <input type="number" name="buyPrice" id="buyPrice" class="form-control" step="any">
                                            <div class="input-group-append"> <span class="input-group-text">USDT</span> </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"> <span class="input-group-text">Amount</span> </div>
                                            <input type="number" name="buyAmount" id="buyAmount" class="form-control" step="any">
                                            <div class="input-group-append"> <span class="input-group-text">USDT</span> </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"> <span class="input-group-text">Total</span> </div>
                                            <input type="text" name="buyTotal" id="buyTotal" class="form-control" readonly>
                                            <div class="input-group-append"> <span class="input-group-text"><?php echo $coin;?></span> </div>
                                        </div>
                                        <input type="hidden" id="assetsBuy" name="assets" value=<?php echo $result['assets']?>>
                                        <!-- <div>
                                            <p>Fee: <span class="fright">100%x0.2=0.02</span></p>
                                        </div>
                                        <div class="text-center mt-3 mb-3 crypt-up">
                                            <p>You will approximately pay</p>
                                            <h4>0.09834 BTC</h4></div> -->
                                        <!-- <div class="menu-green"> -->
                                            <!-- <a href="#" class="crypt-button-green-full">Buy</a> -->
                                            <input class="crypt-button-green-full" name="buyButton" id="buyButton" type="submit" value="Buy">
                                        <!-- </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="crypt-buy-sell-form">
                                <p>Sell <span class="crypt-down"><?php echo $coin;?></span> <span class="fright">Available: <b class="crypt-down"><?php echo $assets[$coin];?> <?php echo $coin;?></b></span></p>
                                <div class="crypt-sell">
                                    <form action="php/sell.php" method="post">
                                        <input type="hidden" name="coin" value="<?php echo $coin?>">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"> <span class="input-group-text">Price</span> </div>
                                            <input type="number" name="sellPrice" id="sellPrice" class="form-control" step="any">
                                            <div class="input-group-append"> <span class="input-group-text">USDT</span> </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"> <span class="input-group-text">Amount</span> </div>
                                            <input type="number" name="sellAmount" id="sellAmount" class="form-control" step="any">
                                            <div class="input-group-append"> <span class="input-group-text"><?php echo $coin;?></span> </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"> <span class="input-group-text">Total</span> </div>
                                            <input type="text" name="sellTotal" id="sellTotal" class="form-control" readonly>
                                            <div class="input-group-append"> <span class="input-group-text">USDT</span> </div>
                                        </div>
                                        <input type="hidden" id="assetsSell" name="assets" value=<?php echo $result['assets']?>>
                                        <!-- <div>
                                            <p>Fee: <span class="fright">100%x0.2=0.02</span></p>
                                        </div>
                                        <div class="text-center mt-3 mb-3 crypt-down">
                                            <p>You will approximately pay</p>
                                            <h4>0.09834 BTC</h4></div> -->
                                        <!-- <div><a href="#" class="crypt-button-red-full">Sell</a></div> -->
                                        <!-- <div class="menu-green"> -->
                                            <!-- <a href="#" class="crypt-button-green-full">Buy</a> -->
                                            <input class="crypt-button-red-full" name="sellButton" id="sellButton" type="submit" value="Sell">
                                        <!-- </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div>
                    <div class="crypt-market-status">
                        <div>
                            <ul class="nav nav-tabs">
                                <li role="presentation"><a href="#active-orders" class="active" data-toggle="tab">Active Orders</a></li>
                                <li role="presentation"><a href="#closed-orders" data-toggle="tab">Closed Orders</a></li>
                                <li role="presentation"><a href="#balance" data-toggle="tab">Balance</a></li>
                                <a href="<?php echo"exchange.php?coin=$coin&coinx=$coinx"?>" class="fright" style="color:#3898ff">Update orders? last updated: <?php echo date("H:i:s")?></a>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="active-orders" style="height:45vh">
                                    <table class="table table-striped">
                                        <thead >
                                            <tr>
                                                <th scope="col">Coin</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Buy/sell</th>
                                                <th scope="col">Price USDT</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="active-orders-body">
                                        
                                        </tbody>
                                    </table>
                                    <!-- <div class="no-orders text-center p-160"><img src="images/empty.svg" alt="no-orders"></div> -->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="closed-orders" style="height:45vh">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Coin</th>
                                                <th scope="col">Placed Time</th>
                                                <th scope="col">Resolved Time</th>
                                                <th scope="col">Buy/sell</th>
                                                <th scope="col">Price USDT</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="closed-orders-body">
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="balance" style="height:45vh">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Currency</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Last price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $balance=json_decode($result['assets'],JSON_OBJECT_AS_ARRAY);
                                            unset($balance['USDT']);
                                            $prices=mysqli_fetch_array(mysqli_query($con,"select * from prices where id=1"),MYSQLI_ASSOC);
                                            foreach($balance as $bcoin => $bvalue){
                                                echo "<tr>
                                                    <td>$bcoin</td>
                                                    <td>$bvalue</td>
                                                    <td>{$prices[$bcoin."USDT"]}</td>
                                                    </tr>";
                                            }
                                        ?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>

    </footer>
    <script src="js/bundle.js"></script>
	<!-- <script src="js/s3.tradingview.com/tv.js"></script> -->
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script>
        if (document.getElementById('crypt-candle-chartext')){
            let coin = document.getElementById('chartcoin');
            new TradingView.widget(
            {
            "autosize": true,
            // "width": 1520,
            // "height": 400,
            "symbol": coin.value,
            "interval": "1",
            "timezone": "Asia/Kolkata",
            "theme": "dark",
            "style": "3",
            "locale": "in",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "withdateranges": true,
            "range": "1D",
            "hide_side_toolbar": false,
            "allow_symbol_change": true,
            "details": true,
            "hotlist": true,
            "calendar": true,
            "show_popup_button": true,
            "popup_width": screen.width,
            "popup_height": screen.height,
            "container_id": "crypt-candle-chartext"
            });
        }
    </script>
    <script src="extjs/orders.js"></script>
    <script src="extjs/validate/exchange.js"></script>
</body>
</html>