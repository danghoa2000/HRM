<div class="modal fade " id="modal-secondary" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title info"></h4>
              <input type="hidden" id="id">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="id" placeholder="Name Department">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Start </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="start" placeholder="start...">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Finish </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="finish" placeholder="finish...">
                    </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Descriable</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="info" placeholder="Enter ..."></textarea>
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


      <div class="modal fade " id="modal-add" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Setting Model</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ID Employee </label>
                    <div class="col-sm-10">
                    <select class="form-control select2" id="id">
                        <option value="default" selected="selected">-- Choose option --</option>
                            <?php
                                foreach($data["staff"] as $arr)
                                {
                                    ?>
                                    <option value = "<?=$arr['id_employee']?>"> <?=$arr['id_employee']?> - <?= $arr["name"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Start </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="start" placeholder="start...">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Finish </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="finish" placeholder="finish...">
                    </div>
                  </div>
                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Descriable</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="info" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <span type="button" class="btn btn-outline-light" id="add">Save changes</span>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>