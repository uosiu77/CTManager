<div id="logo" class="col-sm-2 center"> 
	<a href="#/"><img src="imgs/logo-160.png" alt="C&T Marine Consultants"/></a>
</div>

<div id="topMenu" class="col-sm-8 navbar">
	<div class="navbar-inner">
		<ul class="nav nav-pills" data-ng-controller="NavbarController">
			<li><a class="btn btn-primary" data-ng-class="{'active':getClass('seamenList')}" href="#/seamenList">Seamen</a></li>
			<li data-ng-class="{'active':getClass('/vessels')}"><a class="btn btn-primary" href="#/vesselsList">Vessels</a></li>
			<li data-ng-class="{'active':getClass('/operators')}"><a class="btn btn-primary" href="#/operatorsList">Operators</a></li>
			<li data-ng-class="{'active':getClass('/contracts')}"><a class="btn btn-primary" href="#/contractsList">Contracts</a></li>
			<li data-ng-class="{'active':getClass('/admin')}"><a class="btn btn-primary" href="#/admin">Admin</a></li>
		</ul>
	</div>
</div>

<div id="topLoginInfo" class="col-sm-2">
	<p>Logged in as:</p>
</div>