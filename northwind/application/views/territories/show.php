<div class="col-xs-12" ng-controller="territoriesShowCtrl" ng-init="init()">
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
						<option ng-repeat="item in regions" value="{{item.id}}">{{item.name}}</option>
					</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-9">
					<button class="btn btn-primary" ng-click="search()">Search</button>
					<button class="btn btn-primary" ng-click="clear()">Clear</button>
			</div>
		</div>
		<div class="row">
				<div class="col-xs-9">
					   <table class="table table-striped table-bordered table-hover table-condensed">
						<thead class="primary">
							<tr>
								<th></th>
								<th></th>
								<th>ID</th>
								<th>Name</th>
								<th>Region</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="item in results">
								<td>
									<button class="btn btn-primary" ng-click="edit(item)"><i class="glyphicon glyphicon-pencil"></i></button>
								</td>
								<td>
									<button class="btn btn-primary"><i class="glyphicon glyphicon-trash"></i></button>
								</td>
								<td>
									{{item.id}}
								</td>
								<td>
									{{item.name}}
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