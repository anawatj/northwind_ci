app.factory('categoriesService',['$http',function($http)
{
	var factory ={};
	factory.getAll=function()
			{
				return $http.get(url+'categories/all');
			};
	factory.getById=function(id)
	{
			return $http.get(url+'categories/single',{params:{key:id}});
	};
	factory.save=function(model)
	{
			return $http.post(url+"categories/save",model);
	};
	factory.remove=function(key)
	{
			var model={id:key};
				return $http.post(url+"categories/delete",model);
	};
	factory.search=function(model)
	{
			return $http.post(url+"categories/search",model);
	};
	return factory;
	
}]);