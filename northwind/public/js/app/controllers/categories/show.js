app.controller('categoriesShowCtrl',function($scope,categoriesService)
{
	$scope.model=
	{
		name:"",
		description:""
	};
	$scope.results=[];
	$scope.init=function()
	{

	};
	$scope.search=function()
	{
			categoriesService.search($scope.model)
			.success(function(results)
			{
					$scope.results=results;
			});
	};
	$scope.clear=function()
	{

	};
});