<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['aid'])){
    header("location:admin_login.html");
}
$con=mysqli_connect('localhost','root','','cryptopanel');
date_default_timezone_set("Asia/Kolkata");

?>

<head class="crypt-dark">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cryptopanel - Cryptocurrency Trading Dashboard</title>
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
                                <a href="exchange.html">
                                <div class="crypt-logo"><img src="images/logo.png" alt=""></div>
                            </div>
                            <div class="col-xs-2" style="padding-left:30px;">
                                <ul class="crypt-heading-menu fright">
                                    <?php
                                        $aid=$_SESSION['aid'];
                                        $result=mysqli_query($con,"select email from admin where id=$aid");
                                        $result=mysqli_fetch_array($result);
                                        echo "<b>Welcome admin: ".$result[0]."</b>";
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 d-none d-md-block d-lg-block">
                        <ul class="crypt-heading-menu fright">
                        <li class="crypt-box-menu menu-red"><a href="php/logout.php">Logout</a></li>
                        </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row sm-gutters">
            <div class="col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                <div class="crypt-market-status mt-4">
                    <div>
                        <ul class="nav nav-tabs" id="crypt-tab">
                            <li role="presentation"><a href="#user" class="active" data-toggle="tab">Restrict Users</a></li>
                        </ul>
                        <div class="tab-content crypt-tab-content">
                            <div role="tabpanel" class="tab-pane active" id="user">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="crypt-table-hover">
                                         <?php $user = mysqli_query($con,"SELECT * FROM user");
                                            while($res = mysqli_fetch_array($user)) 
                                            {         
                                             $id=$res['id'];
                                             echo "<tr>";
                                             echo "<td>".$res['email']."</td>";
                                             if($res['isRestricted']==1)
                                               { 
                                                echo "<td class=\"crypt-down\">RESTRICTED</td>";
                                                }
                                                else 
                                                {
                                                    echo "<td class=\"crypt-up\">UNRESTRICTED</td>";
                                                }
                                             echo "<td class='crypt-box-menu menu-red'><a onclick='return confirm(\"Are you sure you want to Restrict this user?\");' href='php/restrict.php?userid=${id} && restricted=1 '>RESTRICT</a></td>";
                                             echo "<td class='crypt-box-menu menu-red'><a onclick='return confirm(\"Are you sure you want to un-restrict this user?\");' href='php/restrict.php?userid=${id} && restricted=0 '>UNRESTRICT</a></td>";
                                             
                                            }
                                            ?>
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
                                    <p>Total revenue</p>
                                    <p class="crypt-up"><?php
                                        $order=mysqli_query($con,"select revenue from revenue_stats where id=1;");
                                        $order=mysqli_fetch_array($order);
                                        echo "$".$order[0];
                                     ?></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>Active orders</p>
                                    <p class="crypt-up"><?php
                                        $order=mysqli_query($con,"select count(*) from orders;");
                                        $order=mysqli_fetch_array($order);
                                        echo $order[0];
                                     ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>Pending requests</p>
                            <p class="crypt-down"><?php
                                        $order=mysqli_query($con,"select count(*) from withdraw where status='PENDING';");
                                        $order=mysqli_fetch_array($order);
                                        echo $order[0];
                                     ?></p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p><b>restricted users</b></p>
                            <p class="crypt-down"><?php
                                        $order=mysqli_query($con,"select count(*) from user where isRestricted=1;");
                                        $order=mysqli_fetch_array($order);
                                        echo $order[0];
                                     ?>
                            </p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p><b>unrestricted users</b></p>
                            <p class="crypt-up"><?php
                                        $order=mysqli_query($con,"select count(*) from user where isRestricted=0;");
                                        $order=mysqli_fetch_array($order);
                                        echo $order[0];
                                     ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tradingview-widget-container mb-3">
                    <div id="crypt-candle-chartext" style="height:400px"></div>
                </div>
                <div id="depthchart" style="height:375px"> class="depthchart h-40 crypt-dark-segment"></div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                <div class="crypt-market-status mt-4">
                    <div>
                        <ul class="nav nav-tabs">
                            <li role="presentation"><a href="#history" class="active" data-toggle="tab">Recent News</a></li>
                        </ul>
                        <div class="tab-content">
                            <form action="php/news.php" method="post" name="n" onsubmit="return validateForm()">
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend"> <span class="input-group-text">TITLE</span> </div>
                                        <input type="text" class="form-control" name="title"> </div>
                                    </div>
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend"> <span class="input-group-text">CONTENT</span> </div>
                                        <textarea class="form-control" name="content"></textarea>
                                    </div>
                                    <div class="input-group mb-3">&nbsp;&nbsp;&nbsp;
                                        <li style="list-style:none;margin:-8px -5px;padding:0px;">
                                       <input style="color: white" class="crypt-box-menu menu-green" type="submit" value="ADD NEWS">
                                   </li>
                                </div>
                            </form>
                            <div role="tabpanel" class="tab-pane active" id="history">
                                        <?php $new = mysqli_query($con,"SELECT * FROM news ORDER BY id DESC ");
                                        for($i=0;$i<5;$i++)
                                        {
                                            if($res = mysqli_fetch_array($new))
                                         {  
                                            echo "<div class=\"crypto-panel-block\">";
                                            echo "<div class=\"crypto-panel-date\">";
                                            echo "<p>".date('M, d h:i',strtotime($res['date']))."</p></div>";
                                            echo "<div class=\"crypto-panel-title\">";
                                            echo "<h6>".$res['title']."</h6></div>";
                                            echo "<div class=\"crypto-panel-desc\">";
                                            echo "<p>".$res['content']."</p>";
                                            echo "<ul style='list-style:none;margin:-15px 0px 15px 0px;padding:0px,20p,0px,10px;' class='crypt-box-menu menu-red'><a href=\"php/deletenews.php?id=${res['id']}\" onclick='return confirm(\"Are you sure you want to delete this news?\");'><h6>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Delete</h6></a></li></ul></div></div>";
                                         }
                                        }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row sm-gutters">
            <div class="col-xl-12">
                <div>
                    <div class="crypt-market-status">
                        <div>
                            <ul class="nav nav-tabs">
                                <li role="presentation"><a href="#active-orders" class="active" data-toggle="tab">Withdraw Requests</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="active-orders">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                              <th scope="col">Time</th>
                                              <th scope="col">Amount</th>
                                              <th scope="col">Account Name</th>
                                              <th scope="col">Account Number</th>
                                              <th scope="col">SWIFT CODE</th>
                                              <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $history = mysqli_query($con,"SELECT * FROM withdraw where status = 'PENDING'");
                                            while($res = mysqli_fetch_array($history)) 
                                            {         
                                             $id=$res['id'];
                                             echo "<tr>";
                                             echo "<td>".$res['time']."</td>";
                                             echo "<td>".$res['amt']."</td>";
                                             echo "<td>".$res['name']."</td>";
                                             echo "<td>".$res['bnk_num']."</td>"; 
                                             echo "<td>".$res['scode']."</td>";
                                             echo "<td class='crypt-box-menu menu-red'><a onclick='return confirm(\"Are you sure you want to approve this withdraw request?\");' href='php/approvewithdraw.php?orderid=${id} '>APPROVE</a></td>";
                                             echo "<td class='crypt-box-menu menu-red'><a onclick='return confirm(\"Are you sure you want to cancel this withdraw request?\");' href='php/cancelwithdraw.php?orderid=${id} '>REJECT</a></td>";
                                             
                                            }
                                            ?>
                                        </tbody>    
                                    </table>
                                    <div class="no-orders text-center p-160"><img src="images/empty.svg" alt="no-orders"></div>
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
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script>
            new TradingView.widget(
            {
            "autosize": true,
            // "width": 1520,
            // "height": 500,
            "symbol": 'BTCUSDT',
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
    </script>
    <script>
        function validateForm()
        {
            let title=document.forms["n"]["title"].value;
            let content=document.forms["n"]["content"].value;

            if(title == "" || content == "")
               {
                alert("Fields can't be empty");
                return false;
               } 
            if(!confirm("Are you sure you want to add this news?"))
            {
                return false;
            }
            
        }
    </script>
</body>

</html>