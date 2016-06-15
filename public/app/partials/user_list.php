<div class="row">

	<header id="navSecondaryRow">
		<a redirect="seamenList"><span class="glyphicon glyphicon-arrow-left"></span></a>
		<strong>Administrator's Panel</strong>
		<a class="btn btn-primary" href="#/admin/Users">USERS</a></li>
		<button id="btn-add" 	class="btn btn-primary btn-xs" 				ng-click="toggle('add', 0)">Add New User</button>
		<button id="btn-edit" 	class="btn btn-primary btn-xs" 				ng-click="toggle('edit', user.id)">Edit User</button>
		<!-- <button id="btn-del" 	class="btn btn-danger btn-xs btn-delete" 	ng-click="confirmDelete(seaman.id)">Delete</button> -->
	</header>
		
	<!-- Table-to-load-the-data Part -->
	
	<section id="seamanDetailsHead">
		<div class="col-sm-6">
			<h3>Users</h3>
			<h5 ng-if="authenticated">{{currentUser.first_name}} welcome!!</h5>
			<button class="btn btn-primary" style="margin-bottom: 10px" ng-click="getUsers()">Get Users!</button>
			<ul class="list-group" ng-if="users">
				<li class="list-group-item" ng-repeat="user in users">
					<p><strong>{{user.last_name}} {{user.first_name}}</strong>
					<br/><Span>{{user.email}}</span></p>
				</li>
			</ul>
			<div class="alert alert-danger" ng-if="error">
				<strong>There was an error: </strong> {{error.error}}
				<br>Please go back and login again
			</div>
		</div>
	</div>		
	
	
</div>