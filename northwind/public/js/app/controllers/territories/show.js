app.controller('territoriesShowCtrl',function($scope,territoriesService,masterService,$q,$pageUtils)
{
	$scope.model=
	{
		name:"",
		region_id:""
	};
	$scope.regions=[];
	$scope.results=[];
	$scope.init=function()
	{
		var promise= $scope.load();
		promise.then(function()
		{

		});
	};
	$scope.load=function()
	{
			var deferred = $q.defer();
			var promise = $q.all
			(
				[
					masterService.getAllRegion()
				]
				).then(function(data)
				{
					$scope.regions= data[0].data;
					deferred.resolve(data);
				});
			return promise;

	};
	$scope.search=function()
	{
		territoriesService.search($scope.model)
		.success(function(data)
		{
			$scope.results=data;
		})
	};
	$scope.edit=function(item)
	{
		window.location=url+"territories/entry?id="+item.id;
	};
	$scope.remove=function(item)
	{

	};
});