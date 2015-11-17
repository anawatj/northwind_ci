app.factory('masterService',['$http',function($http)
{
		var factory = {};
		factory.getAllCountry=function()
		{
			return $http.get(url+"master/getAllCountry");
		};
		factory.getAllCity=function(key)
		{
			return $http.get(url+"master/getAllCity",{params:{id:key}});

		};
		factory.getAllRegion=function()
		{
			return $http.get(url+"master/getAllRegion");
		};
		factory.getAllDemographic=function()
		{
			return $http.get(url+"master/getAllDemographic");
		};
		return factory;
}]);