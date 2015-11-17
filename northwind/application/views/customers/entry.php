<div class="col-xs-12" ng-controller="customersEntryCtrl" ng-init="init()">
		<fieldset>
			<legend>Customer Save</legend>
			<form>
				<div class="row">
						<div class="col-xs-3">
							<label>CompanyName</label>
						</div>
						<div class="col-xs-6">
							<input type="text" class="form-control" ng-model="model.company_name"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>ContactName</label>
						</div>
						<div class="col-xs-6">
							<input type="text" class="form-control" ng-model="model.contact_name"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>ContactTitle</label>
						</div>
						<div class="col-xs-6">
							<input type="text" class="form-control" ng-model="model.contact_title"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>Address</label>
						</div>
						<div class="col-xs-6">
							<textarea class="form-control" ng-model="model.address"></textarea>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>Region</label>
						</div>
						<div class="col-xs-6">
							<select ng-model="model.region_id" class="form-control">
								<option value="0"></option>
								<option ng-repeat="item in regions" ng-selected="item.id==model.region_id" value="{{item.id}}">{{item.name}}</option>
							</select>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>Country</label>
						</div>
						<div class="col-xs-6">
							<select ng-model="model.country_id" class="form-control" ng-change="countryChange()">
								<option value="0"></option>
								<option ng-repeat="item in countries" ng-selected="item.id==model.country_id" value="{{item.id}}">{{item.name}}</option>
							</select>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>City</label>
						</div>
						<div class="col-xs-6">
							<select ng-model="model.city_id" class="form-control">
								<option value="0"></option>
								<option ng-repeat="item in cities" ng-selected="item.id==model.city_id" value="{{item.id}}">{{item.name}}</option>
							</select>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>Phone</label>
						</div>
						<div class="col-xs-6">
							<input type="tel" class="form-control" ng-model="model.phone"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>Fax</label>
						</div>
						<div class="col-xs-6">
							<input type="tel" class="form-control" ng-model="model.fax"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
							<label>Demographic</label>
						</div>
						<div class="col-xs-6">
							<label ng-repeat="item in demographics">
									
  											<input type="checkbox" data-checklist-model="model.demos" data-checklist-value="item"> {{item.name}}
  									
							</label>
						</div>
				</div>
				<div class="row">
					<div class="col-xs-9">
						<button class="btn btn-primary" ng-click="save()">Save</button>
						<button class="btn btn-primary" ng-click="clear()">Clear</button>
					</div>
				</div>
			</form>
		</fieldset>
</div>