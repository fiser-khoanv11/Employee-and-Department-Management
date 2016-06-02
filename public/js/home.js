app.controller('AppCtrl', function ($scope, $timeout,$mdSidenav, $mdDialog, $http, $mdToast) {
	$scope.tab = {home:'md-raised'};
	var loc = 'http://' + location.host + '/';
 	$scope.emp=0;
    $scope.dep = 0;  
    $scope.usr = 0;

	$scope.loadEmp = function(){
		$http.get(loc + 'countEmp/').then(function (response) {
			$scope.total = response.data;

			if($scope.emp < $scope.total){
		        $timeout(function(){
		            $scope.emp++ ;
		            $scope.loadEmp();
		        },80);
	    	}
		});
	}
    
   $scope.loadDep = function(){
		$http.get(loc + 'countDep/').then(function (response) {
			$scope.total = response.data;

			if($scope.dep < $scope.total){
		        $timeout(function(){
		            $scope.dep++ ;
		            $scope.loadDep();
		        },80);
	    	}
		});
	}

	$scope.loadUser= function(){
		$http.get(loc + 'countUser/').then(function (response) {
			$scope.total = response.data;
			if($scope.usr < $scope.total){
		        $timeout(function(){
		            $scope.usr++;
		            $scope.loadUser();
		        },80);
	    	}
		});
	}

    $scope.loadEmp();
	$scope.loadDep();
	$scope.loadUser();
	
	   
});
