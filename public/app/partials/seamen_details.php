<div class="row">
 
	<header id="navSecondaryRow">
		<a redirect="seamenList"><span class="glyphicon glyphicon-arrow-left"></span></a>
		<strong>Seamen Details</strong>
		<a class="btn btn-primary" href="#/seamenDetails/Personal">PERSONAL</a></li>
		<a class="btn btn-primary" href="#/seamenDetails/Docs">DOCS</a></li>
		<a class="btn btn-primary" href="#/seamenDetails/SeaService">SEA SERVICE</a></li>
		<a class="btn btn-primary" href="#/seamenDetails/Contracts">CONTRACTS</a></li>
		<button id="btn-add" 	class="btn btn-primary btn-xs" 				ng-click="toggle('add', 0)">Add New Seaman</button>
		<button id="btn-edit" 	class="btn btn-primary btn-xs" 				ng-click="toggle('edit', seaman.id)">Edit Seaman</button>
		<button id="btn-scuts" 	class="btn btn-primary btn-xs" >Add to Shortcuts</button>
		<!-- <button id="btn-del" 	class="btn btn-danger btn-xs btn-delete" 	ng-click="confirmDelete(seaman.id)">Delete</button> -->
	</header>
		
	<!-- Table-to-load-the-data Part -->
	
	<section id="seamanDetailsHead">
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-10">
					<span class="seamanSurname ">{{ seaman.surname }} </span>
					<span class="seamanForename ">{{ seaman.forename }}</span>
				</div>
				<span class="seamanRank col-sm-2">{{ seaman.rank_short_desc }}</span>
			</div>
			<div class="row">
				<span class="seamanPesel col-sm-12">PESEL: {{ seaman.pesel }}</span> 
			</div>
			<div class="row">
				<span class="seamanDateofbirth col-sm-4">DOB: {{ seaman.date_of_birth }}</span>
				<span class="col-sm-3">Age: {{  seaman.date_of_birth | amDifference : null : 'years' | abs  }}</span>
				<span class=" col-sm-3">Kids: </span>
			</div>
			<div class="row">
				<span class="seamanPlaceofbirth col-sm-4">POB: {{ seaman.place_of_birth }}</span>
				<span class="seamanNationality col-sm-4">Nationality: {{ seaman.nationality }}</span>
			</div>
		</div>
		<div class="col-sm-2">
			<p><span class="glyphicon glyphicon-earphone"></span> {{ seaman.phone }}</p>
			<p ng-hide="seaman.phone_2 == null"><span class="glyphicon glyphicon-earphone"></span> {{ seaman.phone_2 }}</p>
			<p ng-hide="seaman.phone_3 == null"><span class="glyphicon glyphicon-earphone"></span> {{ seaman.phone_3 }}</p>
			<p ng-hide="seaman.email == ''"><span class="glyphicon glyphicon-envelope"></span> {{ seaman.email }}</p>
			<p ng-hide="seaman.skype == ''"><span class="glyphicon glyphicon-cloud-upload"></span> {{ seaman.skype }}</p>
		</div>
		<div class="col-sm-2">
			status
		</div>
		<div class="col-sm-2">
			photo
		</div>
	</section>
	
	<section id="seamanDetailsPersonal">
		<div class="col-sm-3">
			<h4>Address: </h4>
			<p>{{ seaman.street }}</p>
			<p>{{ seaman.postal_code }} {{ seaman.city }}</p>
			<p>{{ seaman.country }} </p>
		</div>
		<div class="col-sm-3">
			<h4>Next of kin</h4>
			<p><label>Name:</label> {{ seaman.nok_name }}</p>
			<p><label>Relation:</label> {{ seaman.nok_relation }}</p>
			<p><label>Address:</label> {{ seaman.nok_street }}</p>
			<p>{{ seaman.nok_postal_code }}</p>
			<p>{{ seaman.country }}</p>
			<p><span class="glyphicon glyphicon-earphone"></span> {{ seaman.phone }}</p>
		</div>
		<div class="col-sm-3">
			<h4>Beneficiary</h4>
			<p><label>Name:</label> {{ seaman.ben_name }}</p>
		</div>
		<div class="col-sm-3">
			kids
		</div>
	</section>
	
	<section id="seamanDetailsParents">
		<div class="col-sm-4">
			father
		</div>
		<div class="col-sm-4">
			mother
		</div>
		<div class="col-sm-4">
			airport
		</div>
	</section>
	
	
	<section id="seamanDetailsOther">
		<div class="col-sm-4">
			<span class="seamanID">ID: {{ seaman.id }}</span>
		</div>
		<div class="col-sm-8">
			remarks
		</div>
	</section>
	
	
	
	<!-- End of Table-to-load-the-data Part -->

	

	<!-- Modal (Pop up when add button clicked) -->
	
	<div class="modal fade" id="seamanModal" tabindex="-1" role="dialog" aria-labelledby="seamanModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="seamanModalLabel">{{form_title}}</h4>
				</div>
				<div class="modal-body row">
					<form name="frmSeamen" class="form-horizontal" novalidate="">

							<div class="form-group col-sm-6 error">
								<label for="inputEmail3" class="col-sm-3 control-label">Surname</label>
								<div class="col-sm-9">
									<input type="text" class="form-control has-error" id="surname" name="surname" placeholder="Surname" value="{{surname}}" 
									ng-model="seaman.surname" ng-required="true">
									<span class="help-inline" 
									ng-show="frmSeamen.surname.$invalid && frmSeamen.surname.$touched">Surname field is required</span>
								</div>
							</div>
						
							<div class="form-group error col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">Forename</label>
								<div class="col-sm-9">
									<input type="text" class="form-control has-error" id="forename" name="forename" placeholder="Forename" value="{{forename}}" 
									ng-model="seaman.forename" ng-required="true">
									<span class="help-inline" 
									ng-show="frmSeamen.forename.$invalid && frmSeamen.forename.$touched">Forename field is required</span>
								</div>
							</div>
							
							<div class="form-group col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">Rank</label>
								<div class="col-sm-9">
									<select class="form-control" id="rank_id" name="rank_id" placeholder="Seman's Rank" value="{{rank_id}}" 
									ng-model="seaman.rank_id" ng-required="true">
									  <option>1</option>
									  <option>2</option>
									  <option>3</option>
									  <option>4</option>
									  <option>5</option>
									</select>
								<span class="help-inline" 
									ng-show="frmSeamen.rank_id.$invalid && frmSeamen.rank_id.$touched">Rank field is required</span>
								</div>
							</div>

							
							<div class="form-group col-sm-6">
								<label for="inputPESEL3" class="col-sm-3 control-label">PESEL</label>
								<div class="col-sm-9">
									<input type="pesel" class="form-control" id="pesel" name="pesel" placeholder="PESEL Number" value="{{pesel}}" 
									ng-model="seaman.pesel" ng-required="true">
									<span class="help-inline" 
									ng-show="frmSeamen.pesel.$invalid && frmSeamen.pesel.$touched">Valid PESEL field is required</span>
								</div>
							</div>

							<div class="form-group col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">DOB</label>
								<div class="col-sm-9">
									<!--<md-datepicker ng-model="seaman.date_of_birth" md-placeholder="Date of Birth" id="date_of_birth" name="date_of_birth" value="{{date_of_birth}}"></md-datepicker>-->
									<input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{date_of_birth}}" 
									ng-model="seaman.date_of_birth" ng-required="true">
								<span class="help-inline" 
									ng-show="frmSeamen.date_of_birth.$invalid && frmSeamen.date_of_birth.$touched">Date of birth field is required</span>
								</div>
							</div>

							<div class="form-group col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">POB</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" value="{{place_of_birth}}" 
									ng-model="seaman.place_of_birth" ng-required="true">
								<span class="help-inline" 
									ng-show="frmSeamen.place_of_birth.$invalid && frmSeamen.place_of_birth.$touched">Place of birth field is required</span>
								</div>
							</div>

							<div class="col-sm-12">
							Address:
							<hr/>
							</div>
						
							<div class="form-group error col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">Nationality</label>
								<div class="col-sm-9">
									<input type="text" class="form-control has-error" id="surname" name="surname" placeholder="Nationality" value="{{surname}}" 
									ng-model="seaman.surname" ng-required="true">
									<span class="help-inline" 
									ng-show="frmSeamen.surname.$invalid && frmSeamen.surname.$touched">Nationality field is required</span>
								</div>
							</div>
						
							<div class="form-group error col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">Forename</label>
								<div class="col-sm-9">
									<input type="text" class="form-control has-error" id="forename" name="forename" placeholder="Forename" value="{{forename}}" 
									ng-model="seaman.forename" ng-required="true">
									<span class="help-inline" 
									ng-show="frmSeamen.forename.$invalid && frmSeamen.forename.$touched">Forename field is required</span>
								</div>
							</div>
							
							<div class="form-group col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">Rank</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="rank_id" name="rank_id" placeholder="Seman's Rank" value="{{rank_id}}" 
									ng-model="seaman.rank_id" ng-required="true">
								<span class="help-inline" 
									ng-show="frmSeamen.rank_id.$invalid && frmSeamen.rank_id.$touched">Rank field is required</span>
								</div>
							</div>

							
							<div class="form-group col-sm-6">
								<label for="inputPESEL3" class="col-sm-3 control-label">PESEL</label>
								<div class="col-sm-9">
									<input type="pesel" class="form-control" id="pesel" name="pesel" placeholder="PESEL Number" value="{{pesel}}" 
									ng-model="seaman.pesel" ng-required="true">
									<span class="help-inline" 
									ng-show="frmSeamen.pesel.$invalid && frmSeamen.pesel.$touched">Valid PESEL field is required</span>
								</div>
							</div>

							<div class="form-group col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">DOB</label>
								<div class="col-sm-9">
									<!--<md-datepicker ng-model="seaman.date_of_birth" md-placeholder="Date of Birth" id="date_of_birth" name="date_of_birth" value="{{date_of_birth}}"></md-datepicker>-->
									<input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="{{date_of_birth}}" 
									ng-model="seaman.date_of_birth" ng-required="true">
								<span class="help-inline" 
									ng-show="frmSeamen.date_of_birth.$invalid && frmSeamen.date_of_birth.$touched">Date of birth field is required</span>
								</div>
							</div>

							<div class="form-group col-sm-6">
								<label for="inputEmail3" class="col-sm-3 control-label">POB</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" value="{{place_of_birth}}" 
									ng-model="seaman.place_of_birth" ng-required="true">
								<span class="help-inline" 
									ng-show="frmSeamen.place_of_birth.$invalid && frmSeamen.place_of_birth.$touched">Place of birth field is required</span>
								</div>
							</div>

				
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmSeamen.$invalid">Save changes</button>
				</div>
			</div>
		</div>
	</div>		
	
	
</div>