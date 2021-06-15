<div class="modal fade " id="modal-secondary" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title info"></h4>
              <input type="hidden" id="id_employee">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal">
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sheet </label>
                    <div class="col-sm-10">
                    <select class="form-control select2" id="id">
                        <option value="default">-- Choose option --</option>
                            <?php
                                foreach($data["list"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_schedule']?>"> <?=$arr['time_in']?> - <?= $arr["time_out"] ?></option>
                                    <?php
                                }
                            ?>
                        </select> 
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light" id="edit">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>