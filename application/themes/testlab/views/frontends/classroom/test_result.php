<?php if (isset($question_id)) {
    $count = 0;
?>
    <div class="row">
        <div class="container">
            <div class="col-sm-2">
                <h3>Results</h3>
            </div>
        </div>
    </div>
    <?php
    foreach ($question_id as $key) {
        $count = $count + 1;
    ?>
        <div class="row">
            <div class="container">
                <div class="col-sm-2">
                    <h3>Question <?php echo $count; ?>:</h3>
                </div>
                <div class="col-sm-10">
                    <h3><?php echo $key->content; ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="col-sm-2">
                    <h3>Selections:</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <?php $this->load->model('answer_model');
                $this->load->model('results_model');
                $selection = $this->answer_model->get_by_id($key->id);
                if ($selection != null) {
                    foreach ($selection as $option) {
                        $selected = $this->results_model->get_by_user_and_question($user_id, $option->question_id);
                        // print_r($selected);
                        $array_selected = explode(',', $selected);
                ?>
                        <div class="row">
                            <div class="container col-sm-12">
                                <?php if (in_array($option->id, $array_selected)) {
                                ?>
                                    <div class="col-sm-3">
                                        <input type="checkbox" checked value="<?php echo $option->selection; ?>"><?php echo $option->selection; ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3><?php echo $option->result; ?></h3>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-sm-5">
                                        <input type="checkbox" value="<?php echo $option->selection; ?>"><?php echo $option->selection; ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                <?php
                    }
                };
                ?>
            </div>
        </div>
<?php
    };
};
?>