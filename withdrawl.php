<!DOCTYPE html>
<html lang="en">
<?php
	date_default_timezone_set("Asia/Kolkata");
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:login.html");
    }
    $id=$_SESSION['id'];
    $con=mysqli_connect('localhost','root','','cryptopanel');
    if($con){
        $result=mysqli_query($con,"select * from portfolio where uid='$id';");
        $user=mysqli_query($con,"SELECT * from user where id='$id'");
        $res = mysqli_fetch_array($user);
        if($result!=null){
        $result=mysqli_fetch_array($result);
        }else{
            echo mysqli_error($con);
        }
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
		
	<?php
        $balance=json_decode($result['assets'],JSON_OBJECT_AS_ARRAY);
	?>
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
							<!-- <li><a href="market-overview.html">Overview</a></li>
							<li><a href="marketcap.html">Market Cap</a></li>
							<li><a href="trading.html">Trading</a></li> -->
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
	<!-- <div class="crypt-side-menu crypt-left-sided crypt-floatable-menu bg-white">
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
	</div>	 -->
	<div class="container-full-width">
		<div class="row sm-gutters">
			<!-- <div class="col-xl-2 d-none d-xl-block">	
			</div> -->
			<div class="col-md-3 col-lg-4 col-xl-4">
				<div class="crypt-deepblue-segment p-2 mt-3">
					<!-- <form class="crypt-dash-search">
						<input type="search" placeholder="Search..." name="s" class="crypt-big-search">
						<button type="submit">
						    <i class="pe-7s-search"></i>
						</button>
					</form> -->
					<ul class="crypt-big-list crypt-coin-select">
						<li>
							<a href="#bitcoin">
								<img src="images/coins/btc.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Bitcoin <p class="fright"><b><?php echo $balance['BTC']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/eth.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Ethereum <p class="fright"><b><?php echo $balance['ETH']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/bnb.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> BNB <p class="fright"><b><?php echo $balance['BNB']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/xrp.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> XRP <p class="fright"><b><?php echo $balance['XRP']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/solana.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Solona <p class="fright"><b><?php echo $balance['SOL']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/dot.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> PolkaDot <p class="fright"><b><?php echo $balance['DOT']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/ada.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Cardano <p class="fright"><b><?php echo $balance['ADA']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/luna.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Terra <p class="fright"><b><?php echo $balance['LUNA']?></b></p>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="images/coins/shib.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Shiba Inu <p class="fright"><b><?php echo $balance['SHIB']?></b></p>
							</a>
						</li>
						<li>
							<a href="php/../withdrawl.php">
								<img src="images/coins/doge.png" width="25" class="crypt-market-cap-logo pr-2" alt="coin"> Dogecoin <p class="fright"><b><?php echo $balance['DOGE']?></b></p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-lg-8 col-xl-8">
				<div class="crypt-dash-withdraw mt-3 d-block">
					<div class="crypt-withdraw-heading">
						<div class="row">
							<div class="col-md-2">
								<b><p>USER:</p><p><?php echo $res['email'];?></p></b>
								<input type="hidden" id="user_email" value="<?php echo $res['email'];?>">
							</div>
							<div class="col-md-3"> 
								<p><b></b></p>
							</div>
							<div class="col-md-4">
								<p><b>Total USDT:</b></p>
								<p class="crypt-up"><b>$ <?php echo $balance['USDT']?></b></p>
							</div>
							<div class="col-md-1">
								<p><b><a class="crypt-down" id="delete_user" href="php/delete_account.php">DELETE ACCOUNT</a></b></p>
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
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content" id="v-pills-zilliqua-btc-tabContent">
							  	<div class="tab-pane fade show active" id="v-pills-zilliqua-btc-deposit" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-deposit-tab">
							  		<form method="POST" action="php/pay.php" class="deposit-form" id="gpayform">
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" value="50000" name="payment-amount" id="payment-btc-amount1" class="payment-amount">
								  			<label for="payment-btc-amount1">$50000</label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
								  			<input type="radio" value="25000" name="payment-amount" id="payment-btc-amount2" class="payment-amount"><label for="payment-btc-amount2">$25000</label>
								  			<div class="check"></div>
							  			</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" value="10000" name="payment-amount" id="payment-btc-amount3" class="payment-amount"><label for="payment-btc-amount3">$10000</label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" value="5000" name="payment-amount" id="payment-btc-amount4" class="payment-amount"><label for="payment-btc-amount4">$5000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" value="2000" name="payment-amount" id="payment-btc-amount5" class="payment-amount"><label for="payment-btc-amount5">$2000 </label>
								  			<div class="check"></div>
						  				</div>
							  			<div class="crypt-radio-boxed">
							  				<input type="radio" value="1000" name="payment-amount" id="payment-btc-amount6" class="payment-amount"><label for="payment-btc-amount6">$1000 </label>
								  			<div class="check"></div>
						  				</div>
						  				<div class="form-group mt-2">
										    <select class="crypt-image-select">
										      	<option value="">GPAY (Visa,Master Card,AMEX,Discover)</option>
										    </select>
										</div>
										<div class="input-group input-text-select mb-3">
										  	<div class="input-group-prepend">
											  <input name="payamount" id="payamount" placeholder="Amount" type="number" min="1" max="50000" class="form-control crypt-input-lg">
											  <input name="payamounthid" id="payamounthid" type="hidden" min="1" max="50000" class="form-control crypt-input-lg">
										    	<input name="payfeehid" id="payfeehid" type="hidden" min="1" max="50000" class="form-control crypt-input-lg">
										  	</div>
										  	<select class="custom-select" name="inputGroupSelect01">
										    	<option value="1">USD</option>
										    	<!-- <option value="2">GBP</option>
										    	<option value="3">EUR</option> -->
										  	</select>
										</div>
										<div class="text-center crypt-up mt-5 mb-5">
											<p>Excluding 0.5% charge. You will approximately pay</p>
											<h3 id="payamountdisplay">$0</h3>
										</div>
										<a href="#" id="gpaybtn" class=""></a>
							  		</form>
							  	</div>
								<div class="tab-pane fade" id="v-pills-zilliqua-btc-withdrawl" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-withdrawl-tab">
									<h4 class="crypt-down">Wire bank transfer</h4>
							  		<p><i class="pe-7s-info"></i> Standard bank transfer will be made up to 2 workdays</p>
							  		<form name="withdraw" action="php/initiate_withdraw.php" method="post" onsubmit="return validateForm()">
									  <input type="hidden" name="userassets" id="userassets" value=<?php echo $result['assets']?>>	
									  <div class="input-group mb-3">
										  	<input type="number" placeholder="Amount" class="form-control" name="amount" step="any">
										  	<div class="input-group-append">
										    	<span class="input-group-text">USD</span>
										  	</div>
										</div>
							  			<div class="input-group mb-3">
										  	<input type="number" placeholder="Bank Account Number" class="form-control" name="bank-account">
										  	<!--<div class="input-group-append">
											    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">Other Address</button>
											    <div class="dropdown-menu">
											      <a class="dropdown-item" href="#">234235234</a>
											      <a class="dropdown-item" href="#">2343453453</a>
											      <a class="dropdown-item" href="#">234234234234</a>
											    </div>
											  </div>
											--> 
										</div>
										<div class="form-group">
										    <input type="text" pattern="[a-zA-Z\s]+" class="form-control" placeholder="Name" name="name">
										</div>
										<div class="form-group">
										    <input type="text" class="form-control" placeholder="Swift Code 8-11 digits" name="swift" pattern=".{8,11}">
										</div>
										<div class="form-group">
										    <div class="form-group">
											    <select class="form-control" name="country">
													<!-- <option>India</option>
											      <option>Country</option> -->
											      <option>United States</option>
											      <!-- <option>Japan</option>
											      <option>Korea</option>
											      <option>China</option> -->
											    </select>
											</div>
										</div>
									<!--	<div class="form-group">
										    <div class="form-check">
										      	<input class="form-check-input" type="checkbox" id="recipient-btc">
										      	<label class="form-check-label" for="recipient-btc">
										        Add To recipient
										      	</label>
										    </div>
										</div> 
									-->	


										<input class="crypt-button-red-full" name="withdraw" type="submit" value="Initiate Withdraw">
							  		</form>
								</div>
							  	<div class="tab-pane fade" id="v-pills-zilliqua-btc-history" role="tabpanel" aria-labelledby="v-pills-zilliqua-btc-history-tab">
							  		<table class="table table-striped">
									  
									  	<thead>
										    <tr>
											  <th scope="col">Time</th>
										      <th scope="col">Amount</th>
										      <th scope="col">Account Name</th>
										      <th scope="col">Account Number</th>
											  <th scope="col">STATUS</th>
										    </tr>
									  	</thead>
									  	<tbody>
										  <?php $history = mysqli_query($con,"SELECT * FROM withdraw where uid=$id");
									  while($res = mysqli_fetch_array($history)) {         
										echo "<tr>";
										echo "<td>".$res['time']."</td>";
										echo "<td>".$res['amt']."</td>";
										echo "<td>".$res['name']."</td>";
										echo "<td>".$res['bnk_num']."</td>"; 
										if($res['status']=='PENDING')
										{
										  ?><td style="color:#3898ff">PENDING</td><?php
										} 
										else if($res['status']=='REJECTED')
											{
											  ?><td class="crypt-down">REJECTED</td><?php
											} 
										else
										{
										  ?><td class="crypt-up">APPROVED</td><?php
										}	
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
				<!-- ######### -->
				
				<!-- ######### -->
			</div>
		</div>
	</div>
	
	
	<footer>
		
	</footer>
	<script>
		let elem1=document.getElementById('payamount');
		let elem2=document.getElementById('payamountdisplay');
		for(let i=1;i<7;i++){
			document.getElementById(`payment-btc-amount${i}`).addEventListener('change',(e)=>{elem1.value=document.querySelector('input[name="payment-amount"]:checked').value;elem2.innerText="$"+elem1.value})
		} 
		elem1.addEventListener('keyup',(e)=>{ elem2.innerText='$'+elem1.value;if(elem1.value<1){elem1.value="";}if(elem1.value==""){elem2.innerText="$0"}validatePayment(e)});
		function validatePayment(e){
			elem2.innerText='$'+elem1.value;
			if(elem1.value<1 || elem1.value>50000){
				elem1.value="";
			}
			if(elem1.value==""){
				elem2.innerText="$0"
			}
		}
	</script>


    <script src="js/bundle.js"></script>
	<script src="extjs/payment.js"></script>
	<script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
	<script>
		function validateForm()
		{
			if(!confirm("Are you sure you want to withdraw(cancelation not available once placed)"))
			{
				return false;
			}
			let assets=document.getElementById("userassets");
    			assets=JSON.parse(assets.value);
    			console.table(assets);

  			let amt = document.forms["withdraw"]["amount"].value;
  			let bnk_num=document.forms["withdraw"]["bank-account"].value;
  			let name=document.forms["withdraw"]["name"].value;
  			let scode=document.forms["withdraw"]["swift"].value;

  				if(amt>assets.USDT)
  				{
  					alert("Insufficient Balance");
  					return false;
   				}

				if(amt <= 0)
				{
					alert("Amount should be greater than 0");
					return false;
				}

				if(bnk_num.length <9 || bnk_num.length >18)
				{
					alert("Bank Number should be between 9-18 digits");
					return false;
				}

  				if (amt == "" || bnk_num == "" || name == "" || scode == "") 
  				{
    				alert("Fields cann't be empty");
    				return false;
  				}
				  assets.USDT-=amt;
				  assets=JSON.stringify(assets)
				  document.forms["withdraw"]["userassets"].value=assets
		}
		let delete_elem = document.getElementById('delete_user');
		delete_elem.addEventListener('click',(e)=>{
			if(!confirm("Are you sure you want to delete the account?")){
				e.preventDefault();
				return
			}
			let email1 = document.getElementById("user_email").value;
			let email2 = prompt("Confirm your email to delete the account permanently!");
			if(email1!=email2){
				alert("INCORRECT EMAIL!");
				e.preventDefault();
				return
			}
		})
	</script>
</body>
</html>