<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<h1 class="page-header">
			<i class="<?= iconify('Notes') ?>"></i> Notes | <small>edit a note</small>
		</h1>

		<!-- Alert -->
		<?php $this->load->view("alert.php"); ?>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<div class="panel panel-default" role="document">
			<div class="panel-body">

				<form action="/note/save" id="edit-note-form" method="POST">
					
					<!-- Note ID -->
					<input type="hidden" name="note_id" value="<?php echo $note['note_id']; ?>" />

					<!-- User ID -->
					<?php if ($this->session->userdata('user')['isAdmin']) : ?>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<label for="write-a-note_author">Author</label>
							<select title="Author" name="user_id" id="write-a-note_author" class="form-control" data-selected="<?php echo $note['user_id']; ?>">
							<?php foreach ($users as $user) : ?>
								<option value="<?php echo $user['user_id']; ?>"><?php echo $user['forename'] ?> <?php echo $user['surname'] ?></option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>
					<?php else: ?>
					<input type="hidden" name="user_id" value="<?php echo $note['user_id']; ?>" />
					<?php endif; ?>

					<!-- Type -->
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="form-group">
							<label for="write-a-note_type">Type</label>
							<select title="Type" name="type" id="write-a-note_type" class="form-control" data-selected="<?php echo $note['note_type_id']; ?>">
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
								<input type="text" class="form-control required" name="client" id="write-a-note_client" title="Client" value="<?php echo $note['client_forename']; ?> <?php echo $note['client_surname']; ?>" />
								<span id="write-a-note_client_id_copy" class="input-group-addon" aria-label="client id"><?php echo $note['client_id']; ?></span>
								<input type="hidden" name="client_id" id="write-a-note_client_id" />
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
							<textarea title="Details" class="form-control required" name="details"><?php echo $note['details']; ?></textarea>
						</div>
					</div>

					<!-- Save -->
					<div class="col-lg-6 col-md-6 col-sm-12">
						<button type="submit" class="btn btn-success btn-block btn-lg">
							<i class="fa fa-save"></i> Save
						</button>
					</div>

					<!-- Delete -->
					<div class="col-lg-6 col-md-6 col-sm-12">
						<a href="<?php echo base_url('note/delete/'.$note['note_id']); ?>" class="btn btn-danger btn-block btn-lg">
							<i class="fa fa-trash"></i> Delete
						</a>
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
