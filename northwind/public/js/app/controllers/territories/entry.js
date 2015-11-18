app.controller('territoriesEntryCtrl',function($scope,territoriesService,masterService,$q,$pageUtils)
{
		$scope.model=
		{
			id:0,
			name:"",
			region_id:0
		};
		$scope.regions=[];
		$scope.init=function()
		{
					$scope.urlParameter = $pageUtils.getUrlVars();
					$scope.id = $scope.urlParameter.id;
					var promise = $scope.load();
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
						$scope.regions=data[0].data;
						if($scope.id!=null && $scope.id!=undefined && $scope.id!=0)
						{
							territoriesService.getById($scope.id)
							.success(function(model)
							{
								$scope.model=model;
							});
						}
						deferred.resolve(data);

				});
				return promise;


		};
		$scope.save=function()
		{
			territoriesService.save($scope.model)
			.success(function(data)
			{
				window.location = url+"territories/entry?id="+data;
			});
		};
		$scope.clear=function()
		{
				
					$scope.model=
					{
						id:0,
						name:"",
						region_id:0
					};
		};
});