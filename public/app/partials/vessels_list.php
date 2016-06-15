<div class="row" ng-if="authenticated">

	<header id="navSecondaryRow">
		<a class="inactive"><span class="glyphicon glyphicon-home"></span></a>
		<strong>Vessels List</strong> 
		<button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Vessel</button>
	</header>

	<!-- Table-to-load-the-data Part -->
	
	<section class="resourceLoop">
		<header class="resourceListHeader">
			<span class="col-sm-3">VESSEL NAME</span>
			<span class="col-sm-2">VESSEL TYPE</span>
			<span class="col-sm-3">VESSEL FLAG</span>
			<span class="col-sm-3">VESSEL CONTACT</span>
		</header>
		<div class="resourceListRow" ng-repeat="vessel in vessels">
			<div class="resourceListRowSegment" redirect="vesselDetails" data-vessel-id="{{ vessel.vessel_id }}">
				<span class="seamanSurname col-sm-3">{{ vessel.name }}</span>
				<span class="seamanSurname col-sm-2">{{ vessel.type }}</span>
				<span class="seamanSurname col-sm-3">{{ vessel.country }}</span>
				<span class="seamanSurname col-sm-3"><span class="glyphicon glyphicon-earphone"></span>{{ vessel.MOBILE }}</span>
			</div>
		</div>
	</section>

	<div id="pagination-wrapper">
		<a class="btn btn-primary skipPrev" ng-href="#/vesselsList/{{ skipPrev }}/{{ searchValue }}"><span class="glyphicon glyphicon-backward"></span> Prev page</a>
		<a class="btn btn-primary skipNext"  ng-href="#/vesselsList/{{ skipNext }}/{{ searchValue }}">Next page <span class="	glyphicon glyphicon-forward"></span></a>
	</div>

	<!-- End of Table-to-load-the-data Part -->	
	
	
	
	
</div>