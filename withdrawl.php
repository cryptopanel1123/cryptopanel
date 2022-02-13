<!DOCTYPE html>
<html lang="en">
<?php
	date_default_timezone_set("Asia/Kolkata");
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.html");
    }
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cryptorio - Cryptocurrency Trading Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/ui.css">
</head>
<body class="crypt-dark">
	<header>
		<div class="container-full-width">
			<div class="crypt-header">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
						<div class="row">
							<div class="col-xs-2">
								<a href="exchange.php">
								<div class="crypt-logo"><img src="images/logo.png" alt="">
								</div>
							</div>
							<div class="col-xs-2">
								
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 d-none d-md-block d-lg-block">
						<ul class="crypt-heading-menu fright">
							<li><a href="exchange.php">Exchange</a></li>
							<li><a href="market-overview.html">Overview</a></li>
							<li><a href="marketcap.html">Market Cap</a></li>
							<li><a href="trading.html">Trading</a></li>
                            <li class="crypt-box-menu menu-red"><a href="php/logout.php">Logout</a></li>
						</ul>
					</div>
					<i class="menu-toggle pe-7s-menu d-xs-block d-sm-block d-md-none d-sm-none"></i>
				</div>
			</div>
		</div>
		<div class="crypt-mobile-menu">
			<ul class="crypt-heading-menu">
				<li class="active"><a href="#">Exchange</a></li>
				<li><a href="#">Market Cap</a></li>
				<li><a href="#">Treanding</a></li>
				<li><a href="#">Tools</a></li>
				<li class="crypt-box-menu menu-red"><a href="#">register</a></li>
				<li class="crypt-box-menu menu-green"><a href="#">login</a></li>
			</ul>
			<div class="crypt-gross-market-cap">
				<h5>$34.795.90 <span class="crypt-up pl-2">+3.435 %</span></h5>
				<h6>0.7925.90 BTC <span class="crypt-down pl-2">+7.435 %</span></h6>
			</div>
		</div>
	</header>
	<!-- Main Content -->
	<div class="crypt-side-menu crypt-left-sided crypt-floatable-menu bg-white">
		<ul>
			<li><a href="#"><i class="pe-7s-graph1"></i> Dashboard</a></li>
		</ul>
		<hr>
		<p>Market</p>
		<ul>
			<li><a href="#"><i class="pe-7s-way"></i> Exchange</a></li>
			<li><a href="#"><i class="pe-7s-gym"></i> Leverage</a></li>
		</ul>
		<hr>
		<p>Account</p>
		<ul>
			<li><a href="#"><i class="pe-7s-wallet"></i> Wallet</a></li>
			<li><a href="#"><i class="pe-7s-cash"></i> Card</a></li>
			<li><a href="#"><i class="pe-7s-wristwatch"></i> History</a></li>
		</ul>
	</div>	
	<div class="container-full-width">
		<div class="row sm-gutters">
			<div class="col-xl-2 d-none d-xl-block">	
			</div>
			<div class="col-md-3 col-lg-4 col-xl-4">
				<div class="crypt-deepblue-segment p-2 mt-3">
					<form class="crypt-dash-search">
						<input type="search" placeholder="Search..." name="s" class="crypt-big-search">
						<button type="submit">
						    <i class="pe-7s-search"></i>
						</button>
					</form>
					<ul class="crypt-big-list crypt-coin-select">
						<li>
							<a href="#bitcoin">
								<img src="images/coins/btc.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Bitcoin <p class="fright"><b>$456568</b></p>
							</a>
						</li>
						<li>
							<a href="#ethrium">
								<img src="images/coins/eth.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Ethrium <p class="fright"><b>$456568</b></p>
							</a>
						</li>
						<li>
							<a href="#litecoin">
								<img src="images/coins/ltc.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Litecoin <p class="fright crypt-down"><b>$456568</b></p>
							</a>
						</li>
						<li>
							<a href="#xrp">
								<img src="images/coins/xrp.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> XRP <p class="fright"><b>$456568</b></p>
							</a>
						</li>
						<li>
							<a href="#monero">
								<img src="images/coins/monero.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Monero <p class="fright"><b>$456568</b></p>
							</a>
						</li>
						<li>
							<a href="#zilliqua">
								<img src="images/coins/zil.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Zilliqua <p class="fright"><b>$456568</b></p>
							</a>
						</li>
						<li>
							<a href="#dash">
								<img src="images/coins/dash.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Dash <p class="fright"><b>$456568</b></p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-lg-8 col-xl-6">
				<div class="crypt-dash-withdraw mt-3 d-block" id="bitcoin">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 BTC</b></p>
								<p class="crypt-up"><b>$3,483.59 USDT (0.28%) </b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 0.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 23454.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-zilliqua-btc-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-zilliqua-btc-deposit" 
									role="tab" 
									aria-controls="v-pills-zilliqua-btc-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-zilliqua-btc-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-zilliqua-btc-withdrawl" 
									role="tab" 
									aria-controls="v-pills-zilliqua-btc-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-zilliqua-btc-history-tab" 
									data-toggle="pill" 
									href="#v-pills-zilliqua-btc-history" 
									role="tab" 
									aria-controls="v-pills-zilliqua-btc-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-zilliqua-btc-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-zilliqua-btc-buysell" 
									role="tab" 
									aria-controls="v-pills-zilliqua-btc-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-zilliqua-btc-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-zilliqua-btc-deposit" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-deposit-tab">
							  		<!-- <h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p> -->
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-amount" id="payment-btc-amount1" class="payment-amount">
								  			<label for="payment-btc-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-amount" id="payment-btc-amount2" class="payment-amount"><label for="payment-btc-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-amount" id="payment-btc-amount3" class="payment-amount"><label for="payment-btc-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-amount" id="payment-btc-amount4" class="payment-amount"><label for="payment-btc-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-amount" id="payment-btc-amount5" class="payment-amount"><label for="payment-btc-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-amount" id="payment-btc-amount6" class="payment-amount"><label for="payment-btc-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-zilliqua-btc-withdrawl" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-btc">
										      	<label class="form-check-label" for="recipient-btc">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-zilliqua-btc-history" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-zilliqua-btc-buysell" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="crypt-dash-withdraw mt-3 d-none" id="ethrium">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 ETH</b></p>
								<p class="crypt-up"><b>$109.13 USD (1.97%)</b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 0.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 23454.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-ethrium-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-ethrium-deposit" 
									role="tab" 
									aria-controls="v-pills-ethrium-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-ethrium-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-ethrium-withdrawl" 
									role="tab" 
									aria-controls="v-pills-ethrium-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-ethrium-history-tab" 
									data-toggle="pill" 
									href="#v-pills-ethrium-history" 
									role="tab" 
									aria-controls="v-pills-ethrium-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-ethrium-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-ethrium-buysell" 
									role="tab" 
									aria-controls="v-pills-ethrium-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-ethrium-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-ethrium-deposit" role="tabpanel" aria-labelledby="v-pills-ethrium-deposit-tab">
							  		<h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p>
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-eth-amount" id="payment-eth-amount1" class="payment-eth-amount">
								  			<label for="payment-eth-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-eth-amount" id="payment-eth-amount2" class="payment-eth-amount"><label for="payment-eth-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-eth-amount" id="payment-eth-amount3" class="payment-eth-amount"><label for="payment-eth-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-eth-amount" id="payment-eth-amount4" class="payment-eth-amount"><label for="payment-eth-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-eth-amount" id="payment-eth-amount5" class="payment-eth-amount"><label for="payment-eth-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-eth-amount" id="payment-eth-amount6" class="payment-eth-amount"><label for="payment-eth-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-ethrium-withdrawl" role="tabpanel" aria-labelledby="v-pills-ethrium-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-eth">
										      	<label class="form-check-label" for="recipient-eth">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-ethrium-history" role="tabpanel" aria-labelledby="v-pills-ethrium-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-ethrium-buysell" role="tabpanel" aria-labelledby="v-pills-ethrium-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="crypt-dash-withdraw mt-3 d-none" id="litecoin">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 LTC</b></p>
								<p class="crypt-up"><b>$34.05 USD (3.60%)</b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 10.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 435,634,234.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-litecoin-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-litecoin-deposit" 
									role="tab" 
									aria-controls="v-pills-litecoin-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-litecoin-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-litecoin-withdrawl" 
									role="tab" 
									aria-controls="v-pills-litecoin-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-litecoin-history-tab" 
									data-toggle="pill" 
									href="#v-pills-litecoin-history" 
									role="tab" 
									aria-controls="v-pills-litecoin-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-litecoin-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-litecoin-buysell" 
									role="tab" 
									aria-controls="v-pills-litecoin-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-litecoin-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-litecoin-deposit" role="tabpanel" aria-labelledby="v-pills-litecoin-deposit-tab">
							  		<h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p>
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-litecoin-amount" id="payment-litecoin-amount1" class="payment-litecoin-amount">
								  			<label for="payment-litecoin-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-litecoin-amount" id="payment-litecoin-amount2" class="payment-litecoin-amount"><label for="payment-litecoin-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-litecoin-amount" id="payment-litecoin-amount3" class="payment-litecoin-amount"><label for="payment-litecoin-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-litecoin-amount" id="payment-litecoin-amount4" class="payment-litecoin-amount"><label for="payment-litecoin-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-litecoin-amount" id="payment-litecoin-amount5" class="payment-litecoin-amount"><label for="payment-litecoin-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-litecoin-amount" id="payment-litecoin-amount6" class="payment-litecoin-amount"><label for="payment-litecoin-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-litecoin-withdrawl" role="tabpanel" aria-labelledby="v-pills-litecoin-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-ltc">
										      	<label class="form-check-label" for="recipient-ltc">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-litecoin-history" role="tabpanel" aria-labelledby="v-pills-litecoin-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-litecoin-buysell" role="tabpanel" aria-labelledby="v-pills-litecoin-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="crypt-dash-withdraw mt-3 d-none" id="xrp">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 XRP</b></p>
								<p class="crypt-up"><b>$0.306974 USD (0.17%)</b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 10.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 435,634,234.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-xrp-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-xrp-deposit" 
									role="tab" 
									aria-controls="v-pills-xrp-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-xrp-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-xrp-withdrawl" 
									role="tab" 
									aria-controls="v-pills-xrp-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-xrp-history-tab" 
									data-toggle="pill" 
									href="#v-pills-xrp-history" 
									role="tab" 
									aria-controls="v-pills-xrp-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-xrp-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-xrp-buysell" 
									role="tab" 
									aria-controls="v-pills-xrp-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-xrp-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-xrp-deposit" role="tabpanel" aria-labelledby="v-pills-xrp-deposit-tab">
							  		<h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p>
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-xrp-amount" id="payment-xrp-amount1" class="payment-xrp-amount">
								  			<label for="payment-xrp-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-xrp-amount" id="payment-xrp-amount2" class="payment-xrp-amount"><label for="payment-xrp-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-xrp-amount" id="payment-xrp-amount3" class="payment-xrp-amount"><label for="payment-xrp-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-xrp-amount" id="payment-xrp-amount4" class="payment-xrp-amount"><label for="payment-xrp-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-xrp-amount" id="payment-xrp-amount5" class="payment-xrp-amount"><label for="payment-xrp-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-xrp-amount" id="payment-xrp-amount6" class="payment-xrp-amount"><label for="payment-xrp-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-xrp-withdrawl" role="tabpanel" aria-labelledby="v-pills-xrp-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-xrp">
										      	<label class="form-check-label" for="recipient-xrp">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-xrp-history" role="tabpanel" aria-labelledby="v-pills-xrp-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-xrp-buysell" role="tabpanel" aria-labelledby="v-pills-xrp-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="crypt-dash-withdraw mt-3 d-none" id="monero">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 Monero</b></p>
								<p class="crypt-down"><b>$43.12 USD (-0.79%)</b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 10.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 435,634,234.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-monero-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-monero-deposit" 
									role="tab" 
									aria-controls="v-pills-monero-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-monero-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-monero-withdrawl" 
									role="tab" 
									aria-controls="v-pills-monero-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-monero-history-tab" 
									data-toggle="pill" 
									href="#v-pills-monero-history" 
									role="tab" 
									aria-controls="v-pills-monero-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-monero-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-monero-buysell" 
									role="tab" 
									aria-controls="v-pills-monero-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-monero-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-monero-deposit" role="tabpanel" aria-labelledby="v-pills-monero-deposit-tab">
							  		<h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p>
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-monero-amount" id="payment-monero-amount1" class="payment-monero-amount">
								  			<label for="payment-monero-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-monero-amount" id="payment-monero-amount2" class="payment-monero-amount"><label for="payment-monero-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-monero-amount" id="payment-monero-amount3" class="payment-monero-amount"><label for="payment-monero-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-monero-amount" id="payment-monero-amount4" class="payment-monero-amount"><label for="payment-monero-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-monero-amount" id="payment-monero-amount5" class="payment-monero-amount"><label for="payment-monero-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-monero-amount" id="payment-monero-amount6" class="payment-monero-amount"><label for="payment-monero-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-monero-withdrawl" role="tabpanel" aria-labelledby="v-pills-monero-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-monero">
										      	<label class="form-check-label" for="recipient-monero">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-monero-history" role="tabpanel" aria-labelledby="v-pills-monero-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-monero-buysell" role="tabpanel" aria-labelledby="v-pills-monero-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="crypt-dash-withdraw mt-3 d-none" id="zilliqua">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 Zilliqua</b></p>
								<p class="crypt-up"><b>$0.018092 USD (0.29%)</b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 0.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 23454.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-deposit" 
									role="tab" 
									aria-controls="v-pills-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-withdrawl" 
									role="tab" 
									aria-controls="v-pills-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-history-tab" 
									data-toggle="pill" 
									href="#v-pills-history" 
									role="tab" 
									aria-controls="v-pills-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-buysell" 
									role="tab" 
									aria-controls="v-pills-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-deposit" role="tabpanel" aria-labelledby="v-pills-deposit-tab">
							  		<h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p>
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-zil-amount" id="payment-zil-amount1" class="payment-zil-amount">
								  			<label for="payment-zil-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-zil-amount" id="payment-zil-amount2" class="payment-zil-amount"><label for="payment-zil-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-zil-amount" id="payment-zil-amount3" class="payment-zil-amount"><label for="payment-zil-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-zil-amount" id="payment-zil-amount4" class="payment-zil-amount"><label for="payment-zil-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-zil-amount" id="payment-zil-amount5" class="payment-zil-amount"><label for="payment-zil-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-zil-amount" id="payment-zil-amount6" class="payment-zil-amount"><label for="payment-zil-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-withdrawl" role="tabpanel" aria-labelledby="v-pills-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-zil">
										      	<label class="form-check-label" for="recipient-zil">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-buysell" role="tabpanel" aria-labelledby="v-pills-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class="crypt-dash-withdraw mt-3 d-none" id="dash">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-3">
								<p><b>1 Dash</b></p>
								<p class="crypt-up"><b>$67.35 USD (0.30%)</b></p>
							</div>
							<div class="col-md-5">
								<i class="pe-7s-lock icon-big"></i> 
								<p><b>Locked: $ 0.00</b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total:</b></p>
								<p class="crypt-up"><b> $ 23454.00</b></p>
							</div>
						</div>
					</div>
					<div class="crypt-withdraw-body bg-white">
						<div class="row">
							<div class="col-md-3">
							<div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
								<a 
									class="nav-link active" 
									id="v-pills-dash-deposit-tab" 
									data-toggle="pill" 
									href="#v-pills-dash-deposit" 
									role="tab" 
									aria-controls="v-pills-dash-deposit" 
									aria-selected="true">
										<i class="pe-7s-bottom-arrow"></i> Deposit
								</a>

								<a 
									class="nav-link" 
									id="v-pills-dash-withdrawl-tab" 
									data-toggle="pill"
									href="#v-pills-dash-withdrawl" 
									role="tab" 
									aria-controls="v-pills-dash-withdrawl" 
									aria-selected="false">
										<i class="pe-7s-up-arrow"></i> Withdraw
								</a>

								<a 
									class="nav-link" 
									id="v-pills-dash-history-tab" 
									data-toggle="pill" 
									href="#v-pills-dash-history" 
									role="tab" 
									aria-controls="v-pills-dash-history" 
									aria-selected="false">
										<i class="pe-7s-clock"></i> History
								</a>

								<a 
									class="nav-link" 
									id="v-pills-dash-buysell-tab" 
									data-toggle="pill" 
									href="#v-pills-dash-buysell" 
									role="tab" 
									aria-controls="v-pills-dash-buysell" 
									aria-selected="false">
										<i class="pe-7s-refresh-2"></i> Buy / Sell
								</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-dash-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-dash-deposit" role="tabpanel" aria-labelledby="v-pills-dash-deposit-tab">
							  		<h6 class="text-uppercase">REMAINING TO VIP $3000</h6>
							  		<p>Details - <a href="#" class="crypt-up">Get VIP Now</a></p>
							  		<form class="deposit-form">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-dash-amount" id="payment-dash-amount1" class="payment-dash-amount">
								  			<label for="payment-dash-amount1">$ 30000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" name="payment-dash-amount" id="payment-dash-amount2" class="payment-dash-amount"><label for="payment-dash-amount2">$ 20000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-dash-amount" id="payment-dash-amount3" class="payment-dash-amount"><label for="payment-dash-amount3">$ 10000 <img src="images/vip.svg" width="40" alt=""></label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-dash-amount" id="payment-dash-amount4" class="payment-dash-amount"><label for="payment-dash-amount4">$ 5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-dash-amount" id="payment-dash-amount5" class="payment-dash-amount"><label for="payment-dash-amount5">$ 2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" name="payment-dash-amount" id="payment-dash-amount6" class="payment-dash-amount"><label for="payment-dash-amount6">$ 1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select" required>
										      	<option value="">Choose A Payment Option</option>
										      	<option value="1">Visa</option>
										      	<option value="2">Master Card</option>
										      	<option value="3">AMEX</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
										    	<input placeholder="Amount" type="text" class="form-control crypt-input-lg" aria-label="">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<option value="2">GBP</option>
										    	<option value="3">EUR</option>
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>You will approximately pay</p>
											<h3>$500</h3>
										</div>
										<a href="#" class="crypt-button-red-full">Proceed To Payment</a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-dash-withdrawl" role="tabpanel" aria-labelledby="v-pills-dash-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Amount" class="form-control" name="amount">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="text" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code" name="swift">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control">
											      <option>Country</option>
											      <option>United States</option>
											      <option>India</option>
											      <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option>
											    </select>
											</div>
										</div>
										<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-dash">
										      	<label class="form-check-label" for="recipient-dash">
										        Add To recipient
										      	</label>
										    </div>
										</div>
										<a href="#" class="crypt-button-red-full">Initiate Withdraw</a>
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-dash-history" role="tabpanel" aria-labelledby="v-pills-dash-history-tab">
							  		<table class="table table-striped">
									  	<thead>
										    <tr>
										      <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Currency</th>
										    </tr>
									  	</thead>
									  	<tbody>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td class="crypt-down">0.000056</td>
										      <td>BTC</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000564</td>
										      <td>ETH</td>
										    </tr>
										    <tr>
										      <th scope="row">22:35:59</th>
										      <td>0.0000234</td>
										      <td>XHO</td>
										    </tr>
									  	</tbody>
									</table>
							  	</div>
							  	<div class="tab-pane fade" id="v-pills-dash-buysell" role="tabpanel" aria-labelledby="v-pills-dash-buysell-tab">
							  		<div class="crypt-boxed-area">
										<h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
										<div class="row no-gutters">
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Buy <span class="crypt-up">BTC</span> <span class="fright">Available: <b class="crypt-up">20 BTC</b></span></p>
													<div class="crypt-buy">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-up">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div class="menu-green">
															<a href="#" class="crypt-button-green-full">Buy</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-xxl-6">
												<div class="crypt-buy-sell-form">
													<p>Sell <span class="crypt-down">BTC</span> <span class="fright">Available: <b class="crypt-down">20 BTC</b></span></p>
													<div class="crypt-sell">
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Price</span>
														  	</div>
														  	<input type="text" class="form-control" placeholder="0.02323476" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Amount</span>
														  	</div>
														  	<input type="number" class="form-control">
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div class="input-group mb-3">
														  	<div class="input-group-prepend">
														    	<span class="input-group-text">Total</span>
														  	</div>
														  	<input type="text" class="form-control" readonly>
														  	<div class="input-group-append">
														   	 	<span class="input-group-text">BTC</span>
														  	</div>
														</div>
														<div>
															<p>Fee: <span class="fright">100%x0.2 = 0.02</span></p>
														</div>
														<div class="text-center mt-5 mb-5 crypt-down">
															<p>You will approximately pay</p>
															<h4>0.09834 BTC</h4>
														</div>
														<div>
															<a href="#" class="crypt-button-red-full">Sell</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							  	</div>
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
</body>
</html>