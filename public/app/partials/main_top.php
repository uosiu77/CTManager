<div id="logo" class="col-sm-2 center"> 
	<a href="#/"><img src="imgs/logo-160.png" alt="C&T Marine Consultants"/></a>
</div>

<div id="topMenu" class="col-sm-8 navbar">
	<div class="navbar-inner">
		<ul  ng-if="authenticated" class="nav nav-pills" data-ng-controller="NavbarController">
			<li><a class="btn btn-primary" data-ng-class="{'active':getClass('seamenList')}" href="#/seamenList">Seamen</a></li>
			<li data-ng-class="{'active':getClass('/vessels')}"><a class="btn btn-primary" href="#/vesselsList">Vessels</a></li>
			<li data-ng-class="{'active':getClass('/operators')}"><a class="btn btn-primary" href="#/operatorsList">Operators</a></li>
			<li data-ng-class="{'active':getClass('/contracts')}"><a class="btn btn-primary" href="#/contractsList">Contracts</a></li>
			<li data-ng-class="{'active':getClass('/admin')}"><a class="btn btn-primary" href="#/admin">Admin</a></li>
		</ul>
		<h1 ng-if="authenticated == null || authenticated == false">CTManger</h1>
	</div>
</div>

<div id="topLoginInfo" class="col-sm-2" data-ng-controller="AuthController" ng-if="authenticated">
	<div class="col-sm-6">
		<p>User: <strong>{{currentUser.first_name}} {{currentUser.last_name}}</strong></p>
	</div>
	<div class="col-sm-6">
		<button class="btn btn-lg btn-danger"  ng-click="logout()">Logout</button>
	</div>
</div>