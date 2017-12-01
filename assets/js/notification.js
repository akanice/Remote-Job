var module = angular.module("locnuoc_crm", []);
module.controller("notificationCtrl",['$scope','$http','$sce',function($scope,$http,$sce){
    $scope.callAPI = function(api,data,callBackFunction){
        var url = site_url + api;
        $http({
            url: url,
            method: 'POST',
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined},
            data: data
        }).success(callBackFunction);
    };
    $scope.getNotifications = function(){
        var data = new FormData();
        data.append('user_id', user_id);
        $scope.callAPI('admin/ajax/getNotifications', data,function(result){
            if (result.ok){
                $scope.notifications = result.notifications;

                if($scope.notifications.length > 0){
                    if(localStorage.getItem("notifications" + user_id) != undefined){
                        if($scope.notifications.length > localStorage.getItem("notifications" + user_id)){
                            toastr.success('Bạn có ' + ($scope.notifications.length - localStorage.getItem("notifications" + user_id)) + ' thông báo mới!');
                        }
                    }else{
                        toastr.success('Bạn có ' + $scope.notifications.length + ' thông báo mới!');
                    }
                }
                setTimeout(function(){
                    localStorage.setItem("notifications" + user_id, $scope.notifications.length);
                    $scope.getNotifications();
                }, 10000);
            }else if (result.msg){
                alert(result.msg);
            }else{

            }
        });
    }

    $scope.getNotifications();

    $scope.readNotification = function(notification_id, order_id){
        var data = new FormData();
        data.append('notification_id', notification_id);
        $scope.callAPI('admin/ajax/readNotification', data, function(result){
            if(result.ok){
                window.location.href = site_url + 'admin/orders/edit/' + order_id;
            }else{
                alert(result.msg);
            }
        });
    }

}]);


module.controller("OrderEditCtrl",['$scope','$http','$sce',function($scope,$http,$sce){
    $scope.products = [{pro_id:"",quantity:""}];
    if (typeof products != 'undefined' && products != 'undefined') $scope.products = products;
    $scope.addProduct = function(){
        var h = {pro_id:"",quantity:""};
        $scope.products.push(h);
    };
    $scope.textProduct = function(){
        return JSON.stringify($scope.products);
    }
    $scope.deleteProduct = function (h){
        $scope.products.splice(h.id,1);
        for (var i=0; i<$scope.products.length;i++){
            var tmp = $scope.products[i];
            tmp.id = i;
        }
    }
}]);
