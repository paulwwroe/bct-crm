<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
	    
	    <h1 class="page-header">
	    	<i class="<?= iconify('Notes') ?>"></i> Notes
	    </h1>

	    <!-- Alert -->
	    <?php $this->load->view("alert.php"); ?>

	</div>
</div>

<!-- Buttons -->
<div class="row">
	
	<!-- Write a New Note -->
	<div class="col-lg-6">
		<div class="form-group" id="write-a-note-parent">
			<a href="<?php echo base_url('note/write'); ?>" class="btn btn-success btn-block btn-lg btn-collapse">
				<i class="fa fa-plus-circle"></i> New
			</a>
		</div>
	</div>

	<!-- Filters -->
	<div class="col-lg-6">
		<div class="form-group" id="filters-parent">
			<button
				type="button"
				class="btn btn-default btn-block btn-lg btn-collapse"
				data-toggle="collapse"
				data-target="#filters">
					<i class="fa fa-gear"></i> Filters
			</button>
		</div>
	</div>
</div>

<!-- Filters -->
<div class="row collapse" id="filters">
	<div class="col-lg-12">
		<form action="#" id="note-filters-form">
			<div class="well">
				<div class="row">
					
					<div class="col-lg-4">
						<div class="form-group">
							<label for="order-filter">Order by</label>
							<select id="order-filter" class="form-control">
								<option value="newest-first">Newest First</option>
								<option value="oldest-first">Oldest First</option>
							</select>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label for="user-filter">Written by</label>
							<select id="user-filter" class="form-control">
								<option value="" selected>Everyone's</option>
								<?php foreach(get_users() as $user): ?>
								<option value="<?= $user['user_id'] ?>"><?= $user['forename'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label for="date-filter">Written</label>
							<select id="date-filter" class="form-control">
								<option value="today">Today</option>
								<option value="yesterday">Yesterday</option>
								<option value="this-week">This Week</option>
								<option value="last-week">Last Week</option>
								<option value="this-month">This Month</option>
								<option value="last-month">Last Month</option>
								<option value="this-year" selected>This Year</option>
								<option value="last-year">Last Year</option>
							</select>
						</div>
					</div>

					<div class="col-lg-12">
						<div class="form-group">
						<label for="search-filer">Client's name</label>
							<input type="text" id="search-filter" class="form-control"  />
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<div id="loader" class="loader"></div>

		<div id="notes"></div>

	</div>
</div>