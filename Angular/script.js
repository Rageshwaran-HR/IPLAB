angular.module("orderApp", []).controller("OrderController", [
  "$scope",
  function ($scope) {
    $scope.order = {};
    $scope.message = "";

    $scope.submitOrder = function () {
      $scope.message = `Order submitted! Customer: ${$scope.order.customerName}, Product: ${$scope.order.product}, Quantity: ${$scope.order.quantity}`;
      $scope.order = {}; // Reset form
    };
  },
]);
