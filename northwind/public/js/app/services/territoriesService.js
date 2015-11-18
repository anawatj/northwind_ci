app.factory('territoriesService',['$http',function($http)
{
	var factory = {};
	factory.getAll=function()
	{
		return $http.get(url+"territories/all");
	};
	factory.getById=function(id)
	{
		return $http.get(url+"territories/single",{params:{key:id}});
	};
	factory.save=function(model)
	{
		return $http.post(url+"territories/save",model);
	};
	return factory;
}]);