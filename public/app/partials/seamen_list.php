<div class="row">

	<header id="navSecondaryRow">
		<a class="inactive"><span class="glyphicon glyphicon-home"></span></a>
		<strong>Seamen List</strong>
		<button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Seaman</button>
	</header>

	<!-- Table-to-load-the-data Part -->
	
	<section class="resourceLoop">
		<header class="resourceListHeader">
			<div class="semanListRowSegment col-sm-6">
				<span class=" col-sm-3">Surname</span>
				<span class="  col-sm-3">Forename</span>
				<span class="  col-sm-2">Rank</span>
				<span class=" col-sm-3">Date of birth</span>
			</div>

			<div class="semanListRowSegment col-sm-3">
				<span class=" col-sm-12 ">Phone</span>
			</div>
			<div class="semanListRowSegment col-sm-2">
				Status
			</div>
			<div class="semanListRowSegment col-sm-1">
				Picture
			</div>
		</header>
		<div class="resourceListRow" ng-repeat="seaman in seamen">
			<div redirect="seamanDetails" data-seaman-id="{{ seaman.seaman_id }}">
				<div class="semanListRowSegment col-sm-6">
					<span class="seamanSurname col-sm-3">{{ seaman.surname }}</span>
					<span class="seamanForename  col-sm-3">{{ seaman.forename }}</span>
					<span class="seamanRank  col-sm-2">{{ seaman.rank_short_desc }}</span>
					<span class="seamanDateofbirth col-sm-3">{{ seaman.date_of_birth }}</span>
				</div>

				<div class="semanListRowSegment col-sm-3">
					<span class="seamanPhone col-sm-12 "><span class="glyphicon glyphicon-earphone"></span> {{ seaman.phone }}</span>
					<!-- <span class="seamanEmail col-sm-12 "><span class="glyphicon glyphicon-envelope"></span> {{ seaman.email }}</span> -->
				</div>
				<div class="semanListRowSegment col-sm-2">
				{{ seaman.seaman_id }}
				</div>
				<div class="semanListRowSegment col-sm-1">
				pic
				</div>
			</div>
		</div>
	</section>

	<div id="pagination-wrapper">
		<a class="btn btn-primary skipPrev" ng-href="#/seamenList/{{ skipPrev }}/{{ searchValue }}"><span class="glyphicon glyphicon-backward"></span> Prev page</a>
		<a class="btn btn-primary skipNext"  ng-href="#/seamenList/{{ skipNext }}/{{ searchValue }}">Next page <span class="	glyphicon glyphicon-forward"></span></a>
	</div>

	<!-- End of Table-to-load-the-data Part -->	
	
	 
	 
	
</div>