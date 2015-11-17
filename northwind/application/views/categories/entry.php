<div class="col-xs-12" ng-controller="categoriesEntryCtrl" ng-init="init()">
		<legend>Categories Save</legend>
		<form>
			<div class="row">
				<div class="col-xs-3">
						<label>CategoryName</label>
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
					<div class="col-xs-9">
						<button class="btn btn-primary" ng-click="save()">Save</button>
						<button class="btn btn-primary" ng-click="clear()">Clear</button>
					</div>
			</div>
		</form>
	</fieldset>
</div>