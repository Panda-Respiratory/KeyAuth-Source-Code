<?php

ob_start();

include '../../../includes/connection.php';
include '../../../includes/functions.php';
session_start();

if (!isset($_SESSION['username'])) {
         header("Location: ../../../login/");
        exit();
}


	        $username = $_SESSION['username'];
            ($result = mysqli_query($link, "SELECT * FROM `accounts` WHERE `username` = '$username'")) or die(mysqli_error($link));
            $row = mysqli_fetch_array($result);
            
            $isbanned = $row['isbanned'];
            if($isbanned == "1")
            {
				echo "<meta http-equiv='Refresh' Content='0; url=../../../login/'>"; 
				session_destroy();
				exit();
            }
        
            $role = $row['role'];
            $_SESSION['role'] = $role;
			
			$darkmode = $row['darkmode'];

			
                            
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, xtreme admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, material design, material dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Xtreme is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <title>KeyAuth - Balance</title>
	<script src="https://cdn.sellix.io/static/js/embed.js" ></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../static/images/favicon.png">
	<script src="../../files/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Custom CSS -->
	<link href="../../files/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../files/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../files/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../files/dist/css/style.min.css" rel="stylesheet">
	

	<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">



	                    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php


// $_SESSION['app'] = "appname";
if(!$_SESSION['app']) { // if app is not 



$result = mysqli_query($link, "SELECT 1 FROM apps WHERE owner='".$_SESSION['username']."' LIMIT 1");
if (mysqli_fetch_row($result)) {
    
    $row = mysqli_fetch_array($result);
    $_SESSION['app'] = $row["name"];
    
echo '
                <script type=\'text/javascript\'>
                
                        $(document).ready(function(){
        $("#changeapp").fadeIn(1900);
        });             
                
                </script>
                ';
}
else // if user doesnt have any apps created
{
    echo '
                <script type=\'text/javascript\'>
                
                        $(document).ready(function(){
        $("#createapp").fadeIn(1900);
        });             
                
                </script>
                ';
}

}
else // if sesssion var 'app' exists, display tables using app in query etc
{
    echo '
                <script type=\'text/javascript\'>
                
                        $(document).ready(function(){
        $("#content").fadeIn(1900);
        $("#sticky-footer bg-white").fadeIn(1900);
        });             
                
                </script>
                ';
}

?>
</head>
<body data-theme="<?php if($darkmode == 0){echo "dark";}else{echo"light";}?>">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin1">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../files/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../../files/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="../../files/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->    
                             <img src="../../files/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin1">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle waves-effect waves-dark" href="https://keyauth.com/discord/" target="discord"> <i class="mdi mdi-discord font-24"></i>
						</a>
						</li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle waves-effect waves-dark" href="https://t.me/KeyAuth" target="telegram"> <i class="mdi mdi-telegram font-24"></i>
						</a>
						</li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $_SESSION['img']; ?>" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                                    <div class=""><img src="<?php echo $_SESSION['img']; ?>" alt="user" class="img-circle" width="60"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0"><?php echo $_SESSION['username']; ?></h4>
                                        <p class=" mb-0"><?php echo $_SESSION['email']; ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="../../account/logs/"><i class="mdi mdi-folder-account font-18"></i> Account Logs</a>
                                <a class="dropdown-item" href="../../account/settings/"><i class="ti-settings mr-1 ml-1"></i> Account Settings</a>
                                <a class="dropdown-item" href="../../account/logout/"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
						<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Reseller</span></li>                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../reseller/keys/" aria-expanded="false"><i data-feather="key"></i><span class="hide-menu">Licenses</span></a></li>                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../reseller/balance/" aria-expanded="false"><i data-feather="credit-card"></i><span class="hide-menu">Balance</span></a></li>
						
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Balance</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
			
	
   
            <!-- ============================================================== -->
            <div class="container-fluid" id="content" style="display:none;">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- File export -->
                <div class="row">
                    <div class="col-12">
					

<script type="text/javascript">

var myLink = document.getElementById('mylink');

myLink.onclick = function(){


$(document).ready(function(){
        $("#content").fadeOut(100);
        $("#changeapp").fadeIn(1900);
        }); 

}


</script>

                        <div class="card">
                            <div class="card-body">
                                <?php

                        $result = mysqli_query($link, "SELECT * FROM `apps` WHERE `secret` = '".$_SESSION['app']."'");

                        $row = mysqli_fetch_array($result);

						if($row["sellixsecret"] != NULL)

                        {

							

						if($row["dayproduct"] != NULL)

                        {

							echo '<a data-sellix-product="'.$row["dayproduct"].'" data-sellix-custom-Username="'.$_SESSION['username'].'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Purchase Day Keys</a>';

						}

						if($row["weekproduct"] != NULL)

                        {

							echo '<br><br><a data-sellix-product="'.$row["weekproduct"].'" data-sellix-custom-Username="'.$_SESSION['username'].'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Purchase Week Keys</a>';

						}

						if($row["monthproduct"] != NULL)

                        {

							echo '<br><br><a data-sellix-product="'.$row["monthproduct"].'" data-sellix-custom-Username="'.$_SESSION['username'].'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Purchase Month Keys</a>';

						}

						if($row["lifetimeproduct"] != NULL)

                        {

							echo '<br><br><a data-sellix-product="'.$row["lifetimeproduct"].'" data-sellix-custom-Username="'.$_SESSION['username'].'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Purchase Lifetime Keys</a>';

						}

						

                        }

						

                        if($row["resellerstore"] != NULL)

                        {

                        echo '<a href="'.$row["resellerstore"].'" target="resellerstore" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Purchase Keys</a>';

                        return;

                        }

                        ?>
						
						<?php

                            $result = mysqli_query($link, "SELECT `balance` FROM `accounts` WHERE `username` = '".$_SESSION['username']."'");

                            

                            $row = mysqli_fetch_array($result);

                            

                            $balance = $row["balance"];

                            

                            $balance = explode("|", $balance);

                            

                            $day = $balance[0];

                            $week = $balance[1];

                            $month = $balance[2];

                            $threemonth = $balance[3];

                            $sixmonth = $balance[4];

                            $life = $balance[5];

                            

                            echo '

                            

                            <p>'.$day.' Day Key(s)</p>

                            <br>

                            <p>'.$week.' Week Key(s)</p>

                            <br>

                            <p>'.$month.' Month Key(s)</p>

                            <br>

                            <p>'.$threemonth.' Three Month Key(s)</p>

                            <br>

                            <p>'.$sixmonth.' Six Month Key(s)</p>

                            <br>

                            <p>'.$life.' Lifetime Key(s)</p>

                            ';

                            

                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Show / hide columns dynamically -->
                
                <!-- Column rendering -->
                
                <!-- Row grouping -->
                
                <!-- Multiple table control element -->
                
                <!-- DOM / jQuery events -->
                
                <!-- Complex headers with column visibility -->
                
                <!-- language file -->
                
                <!-- Setting defaults -->
                
                <!-- Footer callback -->
                
                <?php
				if(isset($_POST['deletekey']))
				{
					$key = sanitize($_POST['deletekey']);
					mysqli_query($link, "DELETE FROM `keys` WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `genby` = '".$_SESSION['username']."'");
					if(mysqli_affected_rows($link) != 0)
					{
						success("Key Successfully Deleted!");
						echo "<meta http-equiv='Refresh' Content='2'>";
					}
					else
					{
						mysqli_close($link);
						error("Failed To Delete Key!");
					}
				}
				if(isset($_POST['resetkey']))
				{
					$key = sanitize($_POST['resetkey']);
					mysqli_query($link, "UPDATE `keys` SET `hwid` = '' WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `genby` = '".$_SESSION['username']."'");
					if(mysqli_affected_rows($link) != 0)
					{
						success("Key Successfully Reset!");
						echo "<meta http-equiv='Refresh' Content='2'>";
					}
					else
					{
						mysqli_close($link);
						error("Failed To Reset Key!");
					}
				}
				if(isset($_POST['bankey']))
				{
					$key = sanitize($_POST['key']);
					
					$result = mysqli_query($link, "SELECT * FROM `keys` WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `genby` = '".$_SESSION['username']."'");
					if(mysqli_num_rows($result) == 0)
					{
						mysqli_close($link);
						error("Key not Found!");
						echo "<meta http-equiv='Refresh' Content='2'>";
						return;
					}
					
					$row = mysqli_fetch_array($result);
					$hwid = $row["hwid"];
					$reason = sanitize($_POST['reason']);
					
					mysqli_query($link, "UPDATE `keys` SET `banned` = '$reason', `status` = 'Banned' WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key'");
					
					if($hwid != NULL)
					{
					mysqli_query($link, "INSERT INTO `bans`(`hwid`, `app`) VALUES ('$hwid','".$_SESSION['app']."')");
					}
					success("Key Successfully Banned!");
					echo "<meta http-equiv='Refresh' Content='2'>";
				}
				
				if(isset($_POST['unbankey']))
				{
					$key = sanitize($_POST['unbankey']);
					
					$result = mysqli_query($link, "SELECT * FROM `keys` WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `genby` = '".$_SESSION['username']."'");
					if(mysqli_num_rows($result) == 0)
					{
						mysqli_close($link);
						error("Key not Found!");
						echo "<meta http-equiv='Refresh' Content='2'>";
						return;
					}
					
					$row = mysqli_fetch_array($result);
					$hwid = $row["hwid"];
					
					mysqli_query($link, "UPDATE `keys` SET `banned` = NULL, `status` = 'Used' WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key'");
					mysqli_query($link, "DELETE FROM `bans` WHERE `hwid` = '$hwid' AND `app` = '".$_SESSION['app']."'");
					
					success("Key Successfully Unbanned!");
					echo "<meta http-equiv='Refresh' Content='2'>";
				}
				
				if(isset($_POST['pausekey']))
				{
					$key = sanitize($_POST['pausekey']);
					
					$result = mysqli_query($link, "SELECT * FROM `keys` WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `status` = 'Used' AND `genby` = '".$_SESSION['username']."'");
					if(mysqli_num_rows($result) == 0)
					{
						mysqli_close($link);
						error("Key isn\'t used!");
						echo "<meta http-equiv='Refresh' Content='2'>";
						return;
					}
					
					$row = mysqli_fetch_array($result);
					$expires = $row['expires'];
					
					$exp = $expires - time();
					mysqli_query($link, "UPDATE `keys` SET `status` = 'Paused', `expires` = '$exp' WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `genby` = '".$_SESSION['username']."'");
					
					success("Key Successfully Paused!");
					echo "<meta http-equiv='Refresh' Content='2'>";
				}
				
				if(isset($_POST['unpausekey']))
				{
					$key = sanitize($_POST['unpausekey']);
					
					$result = mysqli_query($link, "SELECT * FROM `keys` WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `status` = 'Paused' AND `genby` = '".$_SESSION['username']."'");
					if(mysqli_num_rows($result) == 0)
					{
						mysqli_close($link);
						error("Key isn\'t paused!");
						echo "<meta http-equiv='Refresh' Content='2'>";
						return;
					}
					
					$row = mysqli_fetch_array($result);
					$expires = $row['expires'];
					
					$exp = $expires + time();
					mysqli_query($link, "UPDATE `keys` SET `status` = 'Used', `expires` = '$exp' WHERE `app` = '".$_SESSION['app']."' AND `key` = '$key' AND `genby` = '".$_SESSION['username']."'");
					
					success("Key Successfully Unpaused!");
					echo "<meta http-equiv='Refresh' Content='2'>";
				}
				
				if(isset($_POST['editkey']))
				{
					$key = sanitize($_POST['editkey']);
					
					$result = mysqli_query($link, "SELECT * FROM `keys` WHERE `key` = '$key' AND `app` = '".$_SESSION['app']."' AND `genby` = '".$_SESSION['username']."'");
                    if(mysqli_num_rows($result) == 0)
					{
						mysqli_close($link);
						error("Key not Found!");
						echo "<meta http-equiv='Refresh' Content='2'>";
						return;
					}
					
                    $row = mysqli_fetch_array($result);
					
					$expiry = date("Y-m-d\TH:i", $row["expires"]);
					$currtime = date("Y-m-d\TH:i", time());
					
					echo'<div id="ban-key" class="modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block;" aria-modal="true"o ydo >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex align-items-center">
												<h4 class="modal-title">Edit License</h4>
                                                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">�</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post"> 
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Key Level:</label>
                                                        <input type="text" class="form-control" name="level" value="' . $row['level'] . '" required>
														<input type="hidden" name="key" value="' . $key . '">
                                                    </div>
													<div class="form-group">
                                                        <label for="recipient-name" class="control-label">Key Expiry:</label>
                                                        <input class="form-control" type="datetime-local" name="expiry" value="' . date("Y-m-d\TH:i", $row["expires"]) . '" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="recipient-name" class="control-label">Additional HWID:</label>
                                                        <input type="text" class="form-control" name="hwid" placeholder="Enter HWID if you want this key to support multiple computers">
                                                    </div>
													<div class="form-group">
                                                        <label for="recipient-name" class="control-label">HWID:</label>
                                                        <p>' . $row['hwid'] . '</p>
                                                    </div>
													<div class="form-group">
                                                        <label for="recipient-name" class="control-label">IP:</label>
                                                        <p>' . $row['ip'] . '</p>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger waves-effect waves-light" name="savekey">Save</button>
												</form>
                                            </div>
                                        </div>
                                    </div>
									</div>';
				}
				
				if(isset($_POST['savekey']))
				{
					$key = sanitize($_POST['key']);
					
					$expiry = sanitize($_POST['expiry']);
					$level = sanitize($_POST['level']);
					$hwid = sanitize($_POST['hwid']);
					
					$expiry = strtotime($expiry);
					
					if(isset($hwid) && trim($hwid) != '')
					{
						$result = mysqli_query($link, "SELECT `hwid` FROM `keys` WHERE `key` = '$key' AND `app` = '".$_SESSION['app']."' AND `genby` = '".$_SESSION['username']."'");                           
						$row = mysqli_fetch_array($result);                      
						$hwidd = $row["hwid"];

						$hwidd = $hwidd .= $hwid;

						mysqli_query($link, "UPDATE `keys` SET `hwid` = '$hwidd' WHERE `key` = '$key' AND `app` = '".$_SESSION['app']."' AND `genby` = '".$_SESSION['username']."'");
					}

					mysqli_query($link, "UPDATE `keys` SET `expires` = '$expiry',`level` = '$level' WHERE `key` = '$key' AND `app` = '".$_SESSION['app']."' AND `genby` = '".$_SESSION['username']."'");
		
					success("Successfully Updated Settings!");
					echo "<meta http-equiv='Refresh' Content='2'>";
				}
					?>
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
       Copyright &copy; <script>document.write(new Date().getFullYear())</script> KeyAuth
</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../files/assets/libs/popper-js/dist/umd/popper.min.js"></script>
    <script src="../../files/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../files/dist/js/app.min.js"></script>
    <script src="../../files/dist/js/app.init.dark.js"></script>
    <script src="../../files/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../files/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../files/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../files/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../files/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
   <script src="../../files/dist/js/feather.min.js"></script>
    <script src="../../files/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../../files/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../../files/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="../../files/assets/extra-libs/c3/d3.min.js"></script>
    <script src="../../files/assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="../../files/assets/libs/chart-js/dist/chart.min.js"></script>
    <script src="../../files/dist/js/pages/dashboards/dashboard1.js"></script>
		<script src="../../files/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
	    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  
					

<script src="../../files/dist/js/pages/datatable/datatable-advanced.init.js"></script>

<script>
                        
		function bankey(key) {
		 var bankey = $('.bankey');
		 bankey.attr('value', key);
      }
                    </script>
</body>
</html>