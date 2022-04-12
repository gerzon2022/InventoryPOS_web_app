<!-- Config -->
<!-- <style href="public/ext/datetimepicker/bootstrap-datepicker.min.css" rel="stylesheet"></style> -->

<script>
    var currentItems = <?=json_encode($current_items)?>;
</script>

<div class="modal fade" id="config">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title"><i class="fa fa-cog"></i>&nbsp;<b>Settings</b></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="row">
                 <div class="col-sm-6 form-group-sm">
                       <a href="index.php?page=categories" class="btn btn-success form-control nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Category </a><br><br>
                </div><div class="col-sm-6 form-group-sm">
                       <a href="index.php?page=product" class="btn btn-success form-control nav-product"><span class='icon-field'><i class="fa fa-boxes"></i></span> Product </a><br><br>
                  </div>
            </div>
                   <!-- <a href="index.php?page=report" class="btn btn-success form-control nav-print" target="_black"><span class="fa fa-print"></span> Print Inventory Report</a><br><br> -->
                    <div class="row">
                  <div class="col-sm-6 form-group-sm">
                       <a href="index.php?page=users" class="btn btn-success form-control nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a><br><br>
                      </div>
                    <div class="col-sm-6 form-group-sm">
                          <a href="index.php?page=report2" class="btn btn-success form-control" >
                           <span class='icon-field'><i class="fa fa-print"></i></span> Generate Report 
                        </a>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6 form-group-sm">
                   <a href="backup.php" class="btn btn-success form-control nav-backup"><span class="fa fa-download"></span>Backup Database</a></div></div>
                 <!--      <div class="form-group"> target="_blank"
                          <label for="title" class="col-sm-3 control-label"></label>
                          <div class="col-sm-12 btn-group">


 <a href="#" class="btn btn-success form-control" data-dismiss="modal" data-toggle='modal' data-target='#reportModal'>
                           <span class='icon-field'><i class="fa fa-print"></i></span> Generate Report 
                        </a>




                            <button type="button" class="btn btn-success ">Other Settings Action</button>
                            <button type="button" class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                              <li></li>
                              <li></li>
                              <li class="nav-item nav-logout" role="separator" class="divider"></li>
                              <li></li>
                            </ul>
                          </div>
                      </div> -->
  
              </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id='reportModal' data-backdrop='static' role='dialog'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <p class="modal-title"><i class="fa fa-print"></i>&nbsp;<b>Generate Report</b></p>
            </div>
            
            <div class="modal-body">
                <div class="row" id="datePair">
                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">From Date</label>                                    
                        <div class="input-group">
                            <div class="input-group-addon">
                              
                            </div>
                            <input type="date" id='transFrom' class="form-control date start">
                        </div>
                        <span class="help-block errMsg" id='transFromErr'></span>
                    </div>

                    <div class="col-sm-6 form-group-sm">
                        <label class="control-label">To Date</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                               
                            </div>
                            <input type="date" id='transTo' class="form-control date end">
                        </div>
                        <span class="help-block errMsg" id='transToErr'></span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-success" id='clickToGen'>Generate</button>
                <button class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div> -->
