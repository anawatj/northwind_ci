<div class="col-xs-12">
	<fieldset>
		<legend>Save Territories</legend>
		<form>
				<div class="row">
						<div class="col-xs-3">
								<label>Name</label>
						</div>
						<div class="col-xs-6">
								<input type="text" class="form-control" ng-model="model.name"/>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-3">
								<label>Region</label>
						</div>
						<div class="col-xs-6">
								<select class="form-control" ng-model="model.region_id">
									<option value="0"></option>
									<option ng-repeat="item in regions" ng-selected="item.id==model.region_id" value="{{item.id}}">{{item.name}}</option>
								</select>
						</div>
				</div>
				<div class="row">
						<div class="col-xs-9">
								<button class="btn btn-primary" ng-click="save()">Save</button>
								<button class="btn btn-primary" ng-clear="clear()">Clear</button>
						</div>
				</div>
		</form>
	</fieldset>

</div>