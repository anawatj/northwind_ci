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
	</form>
</div>