app.factory('customersService',['$http',function($http)
{
	var factory = {};
	factory.getAll=function()
	{
		return $http.get(url+"customers/all");
	};
	factory.getById=function(id)
	{
		return $http.get(url+"customers/single",{params:{key:id}});
	};
	factory.save=function(model)
	{
		return $http.post(url+"customers/save",model);
	};
	factory.search=function(model)
	{
		return $http.post(url+"customers/search",model);
	};
	factory.remove=function(key)
	{
		var model={id:key};
		return $http.post(url+"customers/delete",model);
		
	}

	return factory;
}]);