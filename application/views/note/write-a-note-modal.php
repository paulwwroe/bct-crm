<div class="dialog" aria-hidden="true"  id="write-a-note-modal">

  <div class="dialog-overlay" tabindex="-1" data-a11y-dialog-hide></div>
  
  <div
    class="dialog-content"
    aria-labelledby="dialogTitle-write-a-note-modal"
    aria-describedby="dialogDescription--write-a-note-modal"
    role="dialog">

    <div class="panel panel-default" role="document">
      
      <div class="panel-heading">
        <div class="panel-title">
          <h1 id="dialogTitle--write-a-note-modal">Write a Note</h1>
        </div>
      </div>

      <div class="panel-body">

        <form action="#" id="write-a-note-form" method="POST">

          <!-- Type -->
          <div class="col-lg-6">
            <div class="form-group">
              <label for="write-a-note_type">Type</label>
              <select title="Type" name="type" id="write-a-note_type" class="form-control">
              <?php foreach ($data['note_types'] as $type): ?>
                <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Client -->
          <div class="col-lg-6">
            <div class="form-group">
                <label for="write-a-note_client">Client</label>
                <div class="input-group">
                  <input title="Client" type="text" class="form-control required" name="client" id="write-a-note_client" />
                  <span id="write-a-note_client_id_copy" class="input-group-addon" aria-label="client id"></span>
                  <input type="hidden" name="client_id" id="write-a-note_client_id" />
                </div>
            </div>
          </div>

          <!-- Report -->
          <div class="col-lg-6">
            <div class="form-group">
              <label for="write-a-note_report">Report</label>
              <select title="Report" class="form-control required" id="write-a-note_report" name="report">
                <option value="1" selected>Include</option>
                <option value="0">Exclude</option>
              </select>
            </div>
          </div>

          <!-- Date -->
          <div class="col-lg-6">
            <div class="form-group">
              <label for="write-a-note_created">Date</label>
              <select title="Date" class="form-control" name="created" id="write-a-note_created">
              <?php foreach ($data['retro_dates'] as $date): ?>
                <option value="<?php echo $date['date']; ?>"><?php echo $date['label']; ?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Details -->
          <div class="col-lg-12">
            <div class="form-group">
              <label for="write-a-note_details">Details</label>
              <textarea title="Details" class="form-control required" name="details"></textarea>
            </div>
          </div>

          <!-- Save -->
          <div class="col-lg-6">
            <button type="submit" class="btn btn-success btn-block btn-lg">
              <i class="fa fa-save"></i> Save
            </button>
          </div>

          <!-- Cancel -->
          <div class="col-lg-6">
              <button type="button" data-a11y-dialog-hide class="btn btn-danger btn-block btn-lg">
                <i class="fa fa-close"></i> Cancel
              </button>
          </div>

          <!-- Errors -->
          <div id="write-a-note-errors" class="col-lg-12 errors">
            <div class="alert alert-danger">
              <p><i class="fa fa-warning"></i> Please correct the following error(s).</p>
              <ul></ul>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>