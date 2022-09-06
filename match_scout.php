<?php
	session_start();
    if(!isset($_SESSION["username"]) || !isset($_SESSION["name"]) || !isset($_SESSION["type"])){
		header("location:login.html");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <title>GreenAms Robotics Team 6520 - Scouting App</title>
    <!-- Bootstrap Core CSS -->
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./assets/plugins/wizard/steps.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="./assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<!--jsPanel -->
	<link href="./assets/plugins/jqueryui/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="./assets/plugins/jsPanel/jspanel.min.css" rel="stylesheet" type="text/css">
	<!-- page CSS -->
    <link href="./assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="./assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="./assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="./assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="./assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	<link href="./assets/plugins/icheck/skins/all.css" rel="stylesheet">
	<!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/megna-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="./assets/images/navres.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="./assets/images/navres.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="./assets/images/logo_text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="./assets/images/logo_text.png" class="light-logo" alt="homepage" /></span> 
					</a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
					<ul class="navbar-nav mr-auto mt-md-0">
						<li class="nav-item"><a class="nav-link text-muted waves-effect waves-dark hidden-sm-up" href="#"><i class="mdi mdi-xbox-controller"></i></a></li>
						<li class="nav-item"><a class="nav-link text-muted waves-effect waves-dark hidden-sm-up" title="This component is currently in the course of development" onclick="swal('Error', 'This component is currently in the course of development');" href="#"><i class="mdi mdi-account-multiple"></i></a></li>
						<li class="nav-item"><a class="nav-link text-muted waves-effect waves-dark hidden-sm-up" title="This component is currently in the course of development" onclick="swal('Error', 'This component is currently in the course of development');" href="#"><i class="mdi mdi-memory"></i></a></li>
						
						<li class="nav-item"><a class="nav-link text-muted waves-effect waves-dark hidden-xs-down" href="#">Match scout</i></a></li>
						<li class="nav-item"><a class="nav-link text-muted waves-effect waves-dark hidden-xs-down" title="This component is currently in the course of development" onclick="swal('Error', 'This component is currently in the course of development');" href="#">Alliance scout</i></a></li>
						<li class="nav-item"><a class="nav-link text-muted waves-effect waves-dark hidden-xs-down" title="This component is currently in the course of development" onclick="swal('Error', 'This component is currently in the course of development');" href="#">Pit scout</a></li>
					</ul>
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["name"]; ?><i class="ti-angle-down ico-gart"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION["name"]; ?></h4>
                                                <h5 class="text-muted">Role: <?php echo $_SESSION["type"]; ?></h5>
											</div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a class="right-side-toggle" href="#"><i class="ti-settings sv-panel"></i> Service Panel</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Match scout</h3>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content">
                                <form id="gart-frm" action="#" class="validation-wizard wizard-circle">
                                    <!-- Step 1 -->
                                    <h6>Info</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="control-label">Match number</label>
                                                <input class="form-control" id="tch3_22" type="text" value="" name="tch3_22" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline"> 
											</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Alliance</label>
                                                    <div class="input-group">
                                                        <ul class="icheck-list col-md-12 ul-alli">
                                                            <li class="col-md-6 col-sm-6 col-6">
                                                                <input type="radio" value="red" class="check" checked id="flat-radio-1" name="flat-radio" data-radio="iradio_flat-red">
                                                                <label for="flat-radio-1">Red</label>
                                                            </li>
                                                            <li class="col-md-5 col-sm-5 col-5">
                                                                <input type="radio" value="blue" class="check" id="flat-radio-2" name="flat-radio" data-radio="iradio_flat-blue">
                                                                <label for="flat-radio-2">Blue</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Region</label>
													<select name="gart-regn" class="form-control custom-select">
														<option value="SPR">South Pacific Regional</option>
														<option value="SCR">Southern Cross Regional</option>
														<option value="test">Test</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Match type</label>
													<select name="gart-mtchyp" class="form-control custom-select">
														<option value="practice">Practice Match</option>
														<option value="qualification">Qualification Match</option>
														<option value="elimination">Elimination Match</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wLocation1">Scouted team</label>
                                                    <select name="wlocation" id="wLocation1" class="select2 form-control required custom-select" data-placeholder="-----Team-----" style="width: 100%; height:36px;">
														<option value=""></option>
														<option value="2437">2437: Lancer Robotics</option>
														<option value="3132">3132: Thunder Down Under</option>
														<option value="3881">3881: WHEA Sharkbots</option>
														<option value="4253">4253: Raid Zero</option>
														<option value="4270">4270: Crusaders</option>
														<option value="4537">4537: RoboRoos</option>
														<option value="4613">4613: Barker Redbacks</option>
														<option value="4614">4614: Purple Monkey Dishwasher</option>
														<option value="4729">4729: EMUs (Experimental Mayhem Unit)</option>
														<option value="4739">4739: CNTRL F5</option>
														<option value="4774">4774: The Drop Bears</option>
														<option value="4801">4801: Blacktown Boys Cybernetic Phoenix</option>
														<option value="4802">4802: U.M.M (Unidentified Moving Machines)</option>
														<option value="4817">4817: One Degree North</option>
														<option value="5308">5308: Wuhan Yangtze</option>
														<option value="5333">5333: Can't C#</option>
														<option value="5449">5449: Prototype</option>
														<option value="5451">5451: Supernova</option>
														<option value="5516">5516: Iron Maple</option>
														<option value="5522">5522: Stargazer</option>
														<option value="5564">5564: GBHS Robotics</option>
														<option value="5584">5584: ICRobotics</option>
														<option value="5593">5593: Devil Robotics</option>
														<option value="5648">5648: Melbourne RoboCats</option>
														<option value="5663">5663: Ground Control</option>
														<option value="5876">5876: ARTEMIS</option>
														<option value="5983">5983: Blast Furnace Bots</option>
														<option value="5985">5985: Project Bucephalus</option>
														<option value="5988">5988: Narooma Robo Rebels</option>
														<option value="6007">6007: RoboPod</option>
														<option value="6035">6035: House of Ulladulla Robotics</option>
														<option value="6050">6050: Wee Waa Bush Bots</option>
														<option value="6063">6063: QLA Pineapples</option>
														<option value="6083">6083: Overlooking</option>
														<option value="6191">6191: RoboKryptonite</option>
														<option value="6304">6304: EAGLE</option>
														<option value="6386">6386: Guangzhou research robot club</option>
														<option value="6393">6393: Pioneer</option>
														<option value="6432">6432: St Cathodes</option>
														<option value="6434">6434: Bossley Park High School</option>
														<option value="6441">6441: Turbo Turtle</option>
														<option value="6476">6476: Supernova Star Squad</option>
														<option value="6508">6508: Hastings Heroes</option>
														<option value="6510">6510: Pymble Pride</option>
														<option value="6520">6520: GreenAms Robotics Team</option>
														<option value="6524">6524: Wilder Wolves FRC</option>
														<option value="6525">6525: Greater Sydney Robotics</option>
														<option value="6575">6575: Tempe T-Rex</option>
														<option value="6579">6579: Komplete Kaos Inc</option>
														<option value="6813">6813: Pangaea</option>
														<option value="6986">6986: White Shark</option>
														<option value="6996">6996: Koalafied</option>
														<option value="6997">6997: Bad wolf</option>
														<option value="7023">7023: Oxley High School Robotics Team</option>
														<option value="7047">7047: Magic Frog</option>
														<option value="7074">7074: Reapers</option>
														<option value="7113">7113: Control Rising</option>
														<option value="7124">7124: 8-bit Destroyers - Cranebrook HS</option>
														<option value="7128">7128: XLR8</option>
														<option value="7129">7129: Pilbara Protons</option>
														<option value="7130">7130: FABLAB MDHS</option>
														<option value="7146">7146: Infinity Robotics</option>
														<option value="7163">7163: A.I. Metal Pies</option>
														<option value="7278">7278: Toormina High School</option>
														<option value="7433">7433: Iona Fusion</option>
														<option value="7523">7523: SpringBots</option>
														<option value="7526">7526: Welcome to team</option>
														<option value="7527">7527: Kaohsiung power</option>
														<option value="7551">7551: Extreme Mechanism</option>
														<option value="7561">7561: Blue Flamingos</option>
														<option value="7583">7583: Elonera Embers</option>
														<option value="7586">7586: ShenHao_The Salted Fishballs</option>
														<option value="7588">7588: H.I.I Robot</option>
														<option value="7593">7593: SymbiOHSis</option>
														<option value="7601">7601: Iron Phoenix</option>
														<option value="7632">7632: An Kang Robotics Maker</option>
														<option value="7636">7636: Robomania</option>
														<option value="7641">7641: Normal Force</option>
														<option value="7644">7644: CCHS</option>
														<option value="7707">7707: Cutting Edge Robotics</option>
														<option value="7709">7709: Formosa Pangolin</option>
														<option value="7719">7719: Java Knights</option>
														<option value="7741">7741: South Taiwan AI Robot</option>
														<option value="7779">7779: Team Murdoch</option>
														<option value="7780">7780: Colyton High School</option>
														<option value="7838">7838: Crobotics</option>
														<option value="7844">7844: Yirara Colleg</option>
														<option value="7884">7884: Parramatta High School</option>
													</select>
												</div>
                                            </div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Team slot</label>
													<select name="gart-tmslt" class="form-control custom-select">
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
													</select>
												</div>
											</div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Setup</h6>
                                    <section>
                                        <div class="row">
											<div class="col-md-12 lab-gart">
												<label>Staged position</label>
												<label id="startpos-error" class="text-danger">Cax</label>
											</div>
                                            <div id="container-gart-preload" class="col-md-12">
                                                <canvas id="pre-load-gart"></canvas>
												<input type="hidden" name="hid" id="startpos" value="">
                                            </div>
                                        </div>
										<div class="row">
											<div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Preloaded game piece</label>
                                                    <div class="input-group">
                                                        <ul class="icheck-list col-md-12 ul-alli">
                                                            <li class="col-md-3 col-sm-3 col-3">
                                                                <input type="radio" value="none" class="check" checked id="gp-none" name="game-piece" data-radio="iradio_flat-red">
                                                                <label for="gp-none">None</label>
                                                            </li>
                                                            <li class="col-md-3 col-sm-3 col-3">
                                                                <input type="radio" value="cargo" class="check" id="gp-cargo" name="game-piece" data-radio="iradio_flat-red">
                                                                <label for="gp-cargo">Cargo</label>
                                                            </li>
															<li class="col-md-4 col-sm-4 col-4">
                                                                <input type="radio" value="hatch panel" class="check" id="gp-hp" name="game-piece" data-radio="iradio_flat-red">
                                                                <label for="gp-hp">Hatch panel</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
										</div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Process</h6>
                                    <section>
                                        <div class="row">
											<div class="col-md-12 lab-gart">
												<label>Strategy</label>
												<label id="strategy-error" class="text-danger">Cax</label>
												<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="rkscr" aria-labelledby="ScrRocket" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="ScrRocket">Level</h4>
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															</div>
															<div class="modal-body">
																<button id="gart-level-1" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">LEVEL 1</button>
																<button id="gart-level-2" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">LEVEL 2</button>
																<button id="gart-level-3" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">LEVEL 3</button>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												
												<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="grtfoul" aria-labelledby="Fol" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="Fol">Detail</h4>
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-6 col-sm-6">
																		<button id="gart-foul-general" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">General</button>
																		<button id="gart-foul-tech" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Tech foul</button>
																		<button id="gart-foul-player" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Player foul</button>
																		<button id="gart-foul-yellow" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Yellow card</button>
																		<button id="gart-foul-red" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Red card</button>
																	</div>
																	<div class="col-md-5 col-sm-5">
																		<button id="gart-foul-g04" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">G04: Controlling more<br>than 1 game piece</button>
																		<button id="gart-foul-g09" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">G09: More than 1 defender</button>
																		<button id="gart-foul-g13" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">G13: Contacted opponent<br>in HAB zone</button>
																		<button id="gart-foul-g16" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">G16: Touch opponent's<br>rocket during end game</button>
																		<button id="gart-foul-g18" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">G18: Pinning for more<br>than 5 seconds</button>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												
												<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="grtbreak" aria-labelledby="Brk" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="Brk">Detail</h4>
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-6 col-sm-6">
																		<button id="gart-break-pb" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Partial breakdown</button>
																		<button id="gart-break-nm" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Never moved</button>
																		<button id="gart-break-lp" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Lost parts</button>
																	</div>
																	<div class="col-md-6 col-sm-6">
																		<button id="gart-break-in" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Intermittent</button>
																		<button id="gart-break-na" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">No Autonomous</button>
																		<button id="gart-break-dn" type="button" data-dismiss="modal" class="btn btn-block waves-effect waves-light btn-info">Did not show</button>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
											</div>
                                            <div id="container-gart-process" class="col-md-12">
                                                <canvas id="process-gart"></canvas>
												<input type="hidden" name="hid1" id="autonomous" value="">
												<input type="hidden" name="hid2" id="teleop" value="">
												<input type="hidden" name="hid3" id="end-process" value="">
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>End</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
												<div class="form-group">
													<label>Occured</label>
													<select name="gart-occrd" class="form-control custom-select">
														<option value="None">None</option>
														<option value="Fast Hatch pickup from floor">Fast Hatch pickup from floor</option>
														<option value="Fast Cargo pickup from floor">Fast Cargo pickup from floor</option>
														<option value="Played defense all or part of the match">Played defense all or part of the match</option>
														<option value="Team de-scored previously scored Cargo">Team de-scored previously scored Cargo</option>
														<option value="Team de-scored previously scored Cargo">Team de-scored previously scored Cargo</option>
													</select>
												</div>
											</div>
                                        </div>
										<div class="row">
											<div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Sandstorm</label>
                                                    <div class="input-group">
                                                        <ul class="icheck-list col-md-12 ul-alli">
                                                            <li class="col-md-6 col-sm-6 col-6">
                                                                <input type="radio" value="Autonomous" class="check" checked id="st-ato" name="sandstr" data-radio="iradio_flat-red">
                                                                <label for="st-ato">Autonomous</label>
                                                            </li>
                                                            <li class="col-md-5 col-sm-5 col-5">
                                                                <input type="radio" value="Blind" class="check" id="st-tlp" name="sandstr" data-radio="iradio_flat-red">
                                                                <label for="st-tlp">Blind drive</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="row">
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="st-note">Sandstorm notes</label>
                                                    <textarea name="st-notes" id="st-note" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tlp-note">Teleop notes</label>
                                                    <textarea name="tlp-notes" id="tlp-note" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
										</div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
            <footer class="footer">
                © 2019 <a target="_blank" href="http://test.gart6520.com/">GreenAms Robotics Team 6520</a>, Admin Press Admin theme by <a target="_blank" href="http://themedesigner.in/">themedesigner.in</a>
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
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
	<script src="./assets/plugins/jqueryui/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="./assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="./assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
	<script src="js/validation.js"></script>
	<script src="./assets/plugins/moment/min/moment.min.js"></script>
    <script src="./assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="./assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="./assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="./assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="./assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="./assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="./assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="./assets/plugins/dff/dff.js" type="text/javascript"></script>
	<script src="./assets/plugins/fabric-js/fabric.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <!-- Sweet-Alert  -->
    <script src="./assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="./assets/plugins/wizard/steps.js"></script>
	<!-- icheck -->
    <script src="./assets/plugins/icheck/icheck.min.js"></script>
    <script src="./assets/plugins/icheck/icheck.init.js"></script>	
	<script>
    jQuery(document).ready(function() {
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
			min: 1,
            initval: 1
        });
    });
	! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green"
        }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    }(window, document, jQuery);
    </script>
	<!-- jsPanel -->
	<script src="./assets/plugins/jsPanel/jspanel.min.js"></script>
	<script src="js/prelfabric.js"></script>
	<script src="js/prosfabric.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="./assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
