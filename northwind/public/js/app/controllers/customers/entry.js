app.controller('customersEntryCtrl',function($scope,customersService,masterService,$pageUtils,$q)
{
	$scope.model=
	{
		id:0,
		company_name:"",
		contact_name:"",
		contact_title:"",
		address:"",
		country_id:undefined,
		region_id:undefined,
		city_id:undefined,
		postal_code:"",
		phone:"",
		fax:"",
		demos:[]
	};
	$scope.demographics=[];
	$scope.countries=[];
	$scope.cities=[];
	$scope.regions=[];
	$scope.init=function()
	{
		$scope.urlParameter = $pageUtils.getUrlVars();
		$scope.id = $scope.urlParameter.id;
		var promise = $scope.load();
        promise.then(function ()
        {
            //$scope.loading = false;
        });
	};
	$scope.load=function()
	{
		  var deferred = $q.defer();
		  var promise = $q.all
		  (
		  		[
		  			masterService.getAllCountry(),
		  			masterService.getAllRegion(),
		  			masterService.getAllDemographic()
		  			
		  		]
		  	).then(function(data)
		  	{
		  			$scope.countries=data[0].data;
		  			$scope.regions=data[1].data;
		  			$scope.demographics=data[2].data;
		  			if($scope.id!=null && $scope.id!=undefined && $scope.id!=0)
		  			{
		  					customersService.getById($scope.id)
		  					.success(function(cus)
		  					{
		  		
		  							$scope.model=cus;
		  							if($scope.model.demos==null || $scope.model.demos==undefined)
		  							{
		  						$scope.model.demos=[];
		  							}
		  					$scope.countryChange();
		  					});
		  		}

		  			 deferred.resolve(data);
		  	});
		  	return promise;
	};
	$scope.countryChange=function()
	{
		masterService.getAllCity($scope.model.country_id)
		.success(function(data)
		{
			$scope.cities=data;
		});
	};
	$scope.save=function()
	{
		customersService.save($scope.model)
		.success(function(data)
		{
			window.location= url+"customers/entry?id="+data;
		});
	}
});