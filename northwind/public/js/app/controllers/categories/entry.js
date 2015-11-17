app.controller('categoriesEntryCtrl',function($scope,categoriesService,$pageUtils)
{
	$scope.model=
	{
		id:0,
		name:"",
		description:""
	};
	$scope.init=function()
	{
			$scope.urlParameter = $pageUtils.getUrlVars();
			$scope.id = $scope.urlParameter.id;
			if($scope.id != undefined && $scope.id!=null && $scope.id!=0)
			{
				categoriesService.getById($scope.id)
				.success(function(data)
				{
					$scope.model=data;
					$scope.model.id=$scope.id;
				});
			}

	};
	$scope.save=function()
	{
		categoriesService.save($scope.model)
		.success(function(data)
		{
			window.location=url+"categories/entry?id="+data;
		});
	};
	$scope.clear=function()
	{

	};
})