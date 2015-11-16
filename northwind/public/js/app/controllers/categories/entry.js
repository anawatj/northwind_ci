app.controller('categoriesEntryCtrl',function($scope,categoriesService)
{
	$scope.model=
	{
		id:0,
		categoryName:"",
		description:""
	};
	$scope.init=function()
	{

	};
	$scope.save=function()
	{
		categoriesService.save($scope.model)
		.success(function(data)
		{
			window.location=url+"categories/entry?id="+data.id;
		});
	};
	$scope.clear=function()
	{

	};
})