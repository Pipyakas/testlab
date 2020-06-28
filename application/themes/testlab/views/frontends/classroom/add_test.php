<?php if (isset($_SESSION['user'])) {
    if (($_SESSION['user'][0]->perm == 0) && ($_SESSION['user'][0]->id == $owner_id)) {
?>
        <form class="form-horizontal" id="form" method="post" action="<?php echo base_url(); ?>index.php/testlab/classrooms/add_test" enctype="multipart/form-data">
            <fieldset>
                <div class="row">
                    <div class="container">
                        <div class="form-group">
                            <div class="control-label col-sm-3">
                                <h3> <label>Add a test</label></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                <label>Test Topic</label>
                            </div>
                            <div class="col-sm-5 ">
                                <input name="test_topic" class="form-control" value="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="form-group">
                            <div class="col-sm-2 control-label">
                                <label>Picture</label>
                            </div>
                            <div class="col-sm-5 ">
                                <input type="file" class="form-control" name="pic" id="pic">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="form-group">
                            <div class="control-label col-sm-3">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
<?php
    };
}
?>