<?php
SassCompiler::run("scss/", "css/");
?>
<!DOCTYPE html>
<html lang="en-US" ng-app="ctManager">
    <head>
        <title>CTM//Seamen edit test</title>
	</head>
    <body>
		<div id="page" class="container-fluid">
	
			<header id="topHeader" class="row sidebar_color"> 
				<div ng-include="'app/partials/main_top.php'"></div>
			</header> 
		
			<div id="workplace" class="row">
			
				<aside id="leftSidebar"  class="col-sm-2 sidebar ">
					<div ng-include="'app/partials/main_left.php'"></div>
				</aside>
			
				<section id="middleSection"  class="col-sm-8">
					
					<div ng-view></div>					
					
				</section> <!-- #middleSection -->
				
				<aside id="rightSidebar" class="col-sm-2 sidebar sidebar_color">
					<div ng-include="'app/partials/main_right.php'"></div>
				</aside> <!-- #rightSidebar -->
			
			</div> <!-- workplace -->
			
			<footer class="row sidebar_color">
			dis is the end
			</footer>
			
		</div> <!-- #page -->


        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('app/lib/angular/angular-route.min.js') ?>"></script>
        <script src="<?= asset('app/lib/angular/angular-animate.min.js') ?>"></script>
        <script src="<?= asset('js/jquery-2.2.0.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
		<script src="<?= asset('js/moment.min.js') ?>"></script>
		<script src="<?= asset('js/angular-moment.min.js') ?>"></script>
		<script src="<?= asset('js/satellizer.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/ctm_app.js') ?>"></script>
        <script src="<?= asset('app/controllers/ctm_controllers.js') ?>"></script>	
        <script src="<?= asset('app/factories/ctm_factories.js') ?>"></script>	
    </body>
</html>