<!DOCTYPE html>
<html lang="en">
<?php
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
        $result=mysqli_query($con,"select * from portfolio where uid='$id';");
        if($result!=null){
        $result=mysqli_fetch_array($result);
        $assets=json_decode($result['assets'],true);
        }else{
            echo mysqli_error($con);
        }
        $result1=mysqli_query($con,"select * from orders where uid='$id';");
        if($result1!=null){
            while($row=mysqli_fetch_array($result1)){
                $orders[]=$row;
            }
        }
    }
?>

<head class="crypt-dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cryptorio - Cryptocurrency Trading Dashboard</title>
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
                            <li><a href="market-overview.html">Overview</a></li>
                            <li><a href="marketcap.html">Market Cap</a></li>
                            <li><a href="trading.html">Trading</a></li>
                            <li><a href="withdrawl.html">Wallet</a></li>
                            <li class="crypt-box-menu menu-red"><a href="php/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row sm-gutters">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                <div class="crypt-market-status mt-4">
                    <div>
                        <ul class="nav nav-tabs" id="crypt-tab">
                            <li role="presentation"><a href="#usd" class="active" data-toggle="tab">usdt</a></li>
                            <li role="presentation"><a href="#btc" data-toggle="tab">btc</a></li>
                            <li role="presentation"><a href="#eth" data-toggle="tab">eth</a></li>
                        </ul>
                        <div class="tab-content crypt-tab-content">
                            <div role="tabpanel" class="tab-pane active mb-4" id="usd">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Last Price</th>
                                            <th scope="col">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody class="crypt-table-hover">
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> BTC/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00004356</span></td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> LTC/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00005640</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> ETH/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00002340</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> DOGE/USDT</td>
                                            <td class="crypt-up align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00003644</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> XMR/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00063440</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>3.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> ERC20/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                         <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CFT/USDT</td>
                                            <td class="crypt-up align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00003644</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> RIF/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> NEO/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                         <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> MXM/USDT</td>
                                            <td class="crypt-up align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00003644</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> LSK/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> XRP/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CXC/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> HUP/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> TRX/USDT</td>
                                            <td class="crypt-up align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00003644</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> ODC/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> AIPE/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> B91/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> BGC/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                       <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> GOM/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00004356</span></td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> RBZ/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00005640</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CUST/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00002340</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> GRAM/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> TVB/USDT</td>
                                            <td class="crypt-up align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00003644</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> TIMO/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CCE/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                       <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> QTUM/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00004356</span></td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> PAX/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00005640</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CS/USDT</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00002340</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> HNB/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> FTN/USDT</td>
                                            <td class="crypt-up align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.00003644</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> MZG/USDT</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                            
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="btc">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Last Price</th>
                                            <th scope="col">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> ETH/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.0000234</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> EOS/BTC</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000056</span></td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> LTC/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.0000564</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> DOGE/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> XMR/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>3.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> LINK/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> FTN/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> RIF/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> NEO/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> TRX/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> LSK/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> XRP/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CNB/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> VEN/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> DASH/BTC</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="eth">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Last Price</th>
                                            <th scope="col">Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> BTC/ETH</td>
                                            <td class="crypt-down align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000056</span></td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> LTC/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.0000564</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> ERC20/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.0000234</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> DOGE/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> XMR/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span>3.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> HMB/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> FTN/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> MGC/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> IOTE/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> YTA/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> PQR/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> PAX/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.000344</span></td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> VBT/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> CCE/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                         <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> QTUM/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="images/star.svg" width="15"> BOA/ETH</td>
                                            <td class="align-middle"><span class="pr-2" data-toggle="tooltip" data-placement="right" title="$ 0.05">0.56723</span></td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-8">
                <div class="crypt-gross-market-cap mt-4">
                    <div class="row">
                        <div class="col-3 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>84568.85</p>
                                    <p>≈$8378.6850 USDT</p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>24H Change</p>
                                    <p class="crypt-down">-0.0234230 -3.35%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>24H High</p>
                            <p class="crypt-up">0.435453</p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>24H Low</p>
                            <p class="crypt-down">0.09945</p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>24H Volume</p>
                            <p>12.33445</p>
                        </div>
                    </div>
                </div>
                <div class="tradingview-widget-container mb-3">
                    <div id="crypt-candle-chartext" style="height:400px"></div>
                </div>
                <div id="depthchart" class="depthchart h-40 crypt-dark-segment"></div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                <div class="crypt-market-status mt-4">
                    <div>
                        <ul class="nav nav-tabs">
                            <li role="presentation"><a href="#history" class="active" data-toggle="tab">Order Book</a></li>
                            <li role="presentation"><a href="#market-trading" data-toggle="tab">market trading</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="history">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity (BTC)</th>
                                            <th scope="col">Total (BTC)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="crypt-down">8700.80</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">5410.56</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">9800.43</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">7090.78</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">6577.88</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">6556.34</td>
                                            <td>0.0000564</td>
                                            <td>6.6768876</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">8887.70</td>
                                            <td>0.000056</td>
                                            <td>5.3424984</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">6577.87</td>
                                            <td>0.0000564</td>
                                            <td>6.6768876</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">7324.44</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">7111.56</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">5888.98</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-down">6590.08</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                    </tbody>
                                        </table>
                                        <h6 class="text-center pt-2 pt-2">29384798 <span class="pl-3">938475</span></h6>
                                        <table class="table table-striped">
                                            <tbody>
                                        <tr>
                                            <td class="crypt-up">4300.67</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">9510.56</td>
                                            <td>0.0000564</td>
                                            <td>6.6768876</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">9080.67</td>
                                            <td>0.000056</td>
                                            <td>5.3424984</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">2346.64</td>
                                            <td>0.0000564</td>
                                            <td>6.6768876</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">5478.87</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">5689.78</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">4518.56</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">6900.67</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">6898.56</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">7894.34</td>
                                            <td>0.0000564</td>
                                            <td>6.6768876</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">8765.90</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">5674.76</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">3452.09</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">7689.65</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">3468.34</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">8794.12</td>
                                            <td>0.0000564</td>
                                            <td>6.6768876</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">2315.86</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">463.98</td>
                                            <td>0.0000234</td>
                                            <td>4.3456600</td>
                                        </tr>
                                        <tr>
                                            <td class="crypt-up">673.67</td>
                                            <td>0.0000567</td>
                                            <td>4.3456600</td>
                                        </tr>
                                    </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="market-trading">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Volume</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000564</td>
                                                    <td>6.6768876</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-down">0.000056</td>
                                                    <td>5.3424984</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-up">0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000567</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-up">0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000567</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000564</td>
                                                    <td>6.6768876</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-down">0.000056</td>
                                                    <td>5.3424984</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-up">0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000567</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-up">0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000567</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000564</td>
                                                    <td>6.6768876</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-down">0.000056</td>
                                                    <td>5.3424984</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-up">0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td>0.0000567</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                                <tr>
                                                    <td>22:35:59</td>
                                                    <td class="crypt-up">0.0000234</td>
                                                    <td>4.3456600</td>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>
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
                    <div class="row no-gutters">
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
                                        <input type="hidden" id="assetsBuy" name="assets" value=''>
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
                                        <input type="hidden" id="assetsSell" name="assets" value=''>
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
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="active-orders">
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
                                <div role="tabpanel" class="tab-pane" id="closed-orders">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Time</th>
                                                <th scope="col">Buy/sell</th>
                                                <th scope="col">Price USDT</th>
                                                <th scope="col">Amount BPS</th>
                                                <th scope="col">Dealt BPS</th>
                                                <th scope="col">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody id="closed-orders-body">
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-up">Buy</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-down">Sell</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-up">Buy</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-down">Sell</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-up">Buy</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-down">Sell</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-up">Buy</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-down">Sell</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.000056</td>
                                                <td class="crypt-down">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>22:35:59</th>
                                                <td class="crypt-up">Buy</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.000056</td>
                                                <td class="crypt-up">0.0003456</td>
                                                <td>5.3424984</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="balance">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Currency</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Volume</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>BTC</th>
                                                <td>0.0000564</td>
                                                <td>6.6768876</td>
                                            </tr>
                                            <tr>
                                                <th>ETC</th>
                                                <td>0.000056</td>
                                                <td>5.3424984</td>
                                            </tr>
                                            <tr>
                                                <th>LTC</th>
                                                <td>0.0000234</td>
                                                <td>4.3456600</td>
                                            </tr>
                                            <tr>
                                                <th>XMR</th>
                                                <td>0.0000234</td>
                                                <td>4.3456600</td>
                                            </tr>
                                            <tr>
                                                <th>BIT</th>
                                                <td>0.0000567</td>
                                                <td>4.3456600</td>
                                            </tr>
                                            <tr>
                                                <th>EGF</th>
                                                <td>0.0000234</td>
                                                <td>4.3456600</td>
                                            </tr>
                                            <tr>
                                                <th>EER</th>
                                                <td>0.0000567</td>
                                                <td>4.3456600</td>
                                            </tr>
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