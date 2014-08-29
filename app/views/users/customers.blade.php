 <div class="row">
    <div class="col-md-12" ng-show="customers.length > 0">
    
    <nav class= "navbar navbar-default" role= "navigation" >
    <div class= "navbar-header" >
    <a class="btn btn-lg btn-success" href="#/edit-customer/0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add new Customer</a>
    </div>
    </nav>
        <table class="table table-striped table-bordered">
        <thead>
        <th>Customer Name&nbsp;</th>
        <th>Email&nbsp;</th>
        <th>Address&nbsp;</th>
        <th>City&nbsp;</th>
        <th>Country&nbsp;</th>
        <th>Action&nbsp;</th>
        </thead>
        <tbody>
            <tr ng-repeat="data in users">
                <td>%%data.customerName%%</td>
                </tr>
        </tbody>
        </table>
    </div>
    <div class="col-md-12" ng-show="customers.length == 0">
        <div class="col-md-12">
            <h4>No customers found</h4>
        </div>
    </div>
</div>