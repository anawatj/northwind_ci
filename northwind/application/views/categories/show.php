<div class="col-xs-12" ng-controller="categoriesShowCtrl" ng-init="init()">
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
				<label>Description</label>
			</div>
			<div class="col-xs-6">
					<textarea class="form-control" ng-model="model.description"></textarea>
			</div>
		</div>
		<div class="row">
				<button class="btn btn-primary" ng-click="search()">Search</button>
				<button class="btn btn-primary" ng-click="clear()">Clear</button>
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
								<th>Description</th>
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
									{{item.description}}
								</td>
							</tr>
						</tbody>
				</table>
		    </div>
		</div>
	</form>
</div>