
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $aplikasi;?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo $site;?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="<?php echo $site;?>assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="<?php echo $site;?>assets/css/style.css" rel="stylesheet" />
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $site;?>assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.css">
	<!-- DataTables Responsive CSS -->
	<link href="<?php echo $site;?>assets/plugins/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="<?php echo $site;?>"><?php echo $aplikasi;?>

                </a>
            </div>

            <div class="notifications-wrapper">
<ul class="nav">
               
                <li class="dropdown">
                    <a href="<?php echo $site;?>logout" ><i class="fa fa-sign-out fa-fw"></i>Logout
					</a>
                </li>
            </ul>
               
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
						<?php if (empty($_SESSION['foto'])){?>
                            <img src="<?php echo $site;?>assets/img/user.jpg" class="img-circle" />
						<?php }else{?>
							<img src="<?php echo $site;?>assets/file/foto/<?php echo $_SESSION['foto'];?> " class="img-circle" />
						<?php } ?>
						</div>

                    </li>
					<li><a  href="<?php echo $site;?>"> <strong> <?php echo $_SESSION[nama];?> </strong></a> </li>
					<li><a class="active-menu"  href="<?php echo $site;?>"><i class="fa fa-dashboard "></i>Dashboard</a></li>
                    <li><a href="<?php echo $site;?>user"><i class="fa fa-user "></i>User </a></li>
                    <li><a href="<?php echo $site;?>kriteria"><i class="fa fa-bars "></i>Kriteria </a></li>
                     <li><a href="<?php echo $site;?>subkriteria"><i class="fa fa-building "></i>Subkriteria </a></li>
                     <li><a href="<?php echo $site;?>alternatif"><i class="fa fa-users"></i>Alternatif </a></li>
                     <li><a href="<?php echo $site;?>penilaian"><i class="fa fa-check-square-o"></i>Penilaian </a></li>
                   <li><a href="<?php echo $site;?>hasil"><i class="fa  fa-location-arrow"></i>Hasil </a></li>
                     <li><a href="<?php echo $site;?>logout"><i class="fa fa-sign-out "></i>Logout</a></li>
                  
                </ul>
            </div>

        </nav>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
			<?php 
			modul($_GET['m']);
			?>			
			</div>
        <!-- /. PAGE WRAPPER  -->
    </div>
        </div>
    <!-- /. WRAPPER  -->
    <footer >
        &copy; <?php echo date('Y');?> wpsaw
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo $site;?>assets/js/custom.js"></script>
	<!-- DATA TABLE -->
	<script src="<?php echo $site;?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $site;?>assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<script>
	//datatable
    $(document).ready(function() {
        $('#t1,#t2').DataTable({
                responsive: true,
				stateSave: true // keep paging
        });
    });
	//menu
	$('ul li a').click(function(){ 
	$('li a').removeClass("active-menu"); 
	$(this).addClass("active-menu"); 
	});
	</script>
	

</body>
</html>
