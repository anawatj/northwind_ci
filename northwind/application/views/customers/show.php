<div class="col-xs-12" ng-controller="customersShowCtrl" ng-init="init()">
		<form>
				<div class="row">
						<div class="col-xs-3">
								<label>CompanyName</label>
						</div>
						<div class="col-xs-3">
								<input type="text" class="form-control" ng-model="model.company_name"/>
						</div>
						<div class="col-xs-3">
								<label>ContactName</label>
						</div>
						<div class="col-xs-3">
								<input type="text" class="form-control" ng-model="model.contact_name"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
								<label>Contact Title</label>
						</div>
						<div class="col-xs-3">
								<input type="text" class="form-control" ng-model="model.contact_title"/>
						</div>
						<div class="col-xs-3">
								<label>Country</label>
						</div>
						<div class="col-xs-3">
								<select class="form-control" ng-model="model.country_id" ng-change="countryChange()">
									<option value="0"></option>
									<option ng-repeat="item in countries" value="{{item.id}}">{{item.name}}</option>
								</select>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
								<label>City</label>
						</div>
						<div class="col-xs-3">
								<select class="form-control" ng-model="model.city_id">
									<option value="0"></option>
									<option ng-repeat="item in cities" value="{{item.id}}">{{item.name}}</option>
								</select>
						</div>
						<div class="col-xs-3">
								<label>Region</label>
						</div>
						<div class="col-xs-3">
								<select class="form-control" ng-model="model.region_id">
									<option value="0"></option>
									<option ng-repeat="item in regions" value="{{item.id}}">{{item.name}}</option>
								</select>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-12">
								<button class="btn btn-primary" ng-click="search()">Search</button>
								<button class="btn btn-primary" ng-click="clear()">Clear</button>
						</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
							<table class="table table-striped table-bordered table-hover table-condensed">
									<thead class="primary">
										<tr>
											<th></th>
											<th></th>
											<th>CompanyName</th>
											<th>ContactName</th>
											<th>ContactTitle</th>
											<th>Country</th>
											<th>City</th>
											<th>Region</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="item in results">
												<td>
														<button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
												</td>
												<td>
														<button class="btn btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
												</td>
												<td>
														{{item.company_name}}
												</td>
												<td>
														{{item.contact_name}}
												</td>
												<td>
														{{item.contact_title}}
												</td>
												<td>
														{{item.country_name}}
												</td>
												<td>
														{{item.city_name}}
												</td>
												<td>
														{{item.region_name}}
												</td>
										</tr>
									</tbody>
							</table>
					</div>
				</div>
		</form>
</div>