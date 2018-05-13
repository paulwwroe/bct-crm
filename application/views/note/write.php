<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<h1 class="page-header">
			<i class="<?= iconify('Notes') ?>"></i> Notes | <small>Write a note</small>
		</h1>

		<!-- Alert -->
		<?php $this->load->view("alert.php"); ?>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<div class="panel panel-default" role="document">
			<div class="panel-body">

				<form action="create" id="write-a-note-form" method="POST">

					<!-- User ID -->
					<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user')['user_id']; ?>" />

					<!-- Type -->
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<label for="write-a-note_type">Type</label>
							<select title="Type" name="note_type_id" id="write-a-note_type" class="form-control">
							<?php foreach ($note_types as $note_type) : ?>
								<option value="<?php echo $note_type['note_type_id']; ?>"><?php echo $note_type['type'] ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>

					<!-- Client ID -->
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<label for="write-a-note_client">Client</label>
							<div class="input-group">
								<input type="text" class="form-control required" name="client_name" id="write-a-note-client_name" title="Client" />
								<span id="write-a-note-client_id_copy" class="input-group-addon" aria-label="client id"></span>
								<input type="hidden" name="client_id" id="write-a-note-client_id" />
							</div>
						</div>
					</div>

					<!-- Created -->
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<label for="write-a-note_created">Date</label>
							<select title="Created" class="form-control" name="created" id="write-a-note_created">
							<?php foreach ($retro_dates as $retro_date): ?>
								<option value="<?php echo $retro_date['date']; ?>"><?php echo $retro_date['label']; ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>

					<!-- Details -->
					<div class="col-lg-12 col-sm-12 col-md-12">
						<div class="form-group">
							<label for="write-a-note_details">Details</label>
							<textarea title="Details" class="form-control required" name="details"></textarea>
						</div>
					</div>

					<!-- Save -->
					<div class="col-lg-12">
						<button type="submit" class="btn btn-success btn-block btn-lg">
							<i class="fa fa-save"></i> Save
						</button>
					</div>

				</form>

			</div>

			<!-- Errors -->
			<div id="write-a-note-errors" class="panel-footer errors">
				<div class="alert alert-danger">
					<p><i class="fa fa-warning"></i> Please correct the following error(s).</p>
					<ul></ul>
				</div>
			</div>

		</div>

	</div>
</div>
