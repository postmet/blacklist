<?php
if(isset($message)){
	$infohtml = '<div class="well well-info">';
	$infohtml .= $message;
	$infohtml .= '</div>';	
}


?>
<div class="container-fluid">
	<h1><?php echo _('Blacklist Module')?></h1>
	<?php echo $infohtml?>
	<div class = "display full-border">
		<div class="row">
			<div class="col-sm-9">
					<div class="fpbx-container">
						<form class="fpbx-submit" name="frm_blacklist" action="" method="post" role="form">
							<form autocomplete="off" name="edit" action="" method="post" onsubmit="return edit_onsubmit();">
							<input type="hidden" name="action" value="settings">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" data-name="blacklist" class="active">
									<a href="#blacklist" aria-controls="blacklist" role="tab" data-toggle="tab">
										<?php echo _("Blacklist")?>
									</a>
								</li>
								<li role="presentation" data-name="importexport" class="change-tab">
									<a href="#importexport" aria-controls="importexport" role="tab" data-toggle="tab">
										<?php echo _("Import/Export")?>
									</a>
								</li>
								<li role="presentation" data-name="settings" class="change-tab">
									<a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
										<?php echo _("Settings")?>
									</a>
								</li>
							</ul>
								<div class="tab-content display">
									<div role=tabpanel" id="blacklist" class="tab-pane active">
										<?php echo load_view(__DIR__.'/blgrid.php',array('blacklist' => $blacklist));?>
									</div>
									<div role=tabpanel" id="importexport" class="tab-pane">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6">
														<span class="btn btn-default btn-file">
															<?php echo _('Import from CSV')?><input type="file" class="form-control" name="blacklistfile" id="blacklistfile">
														</span>
														<span class="filename"></span>
													</div>
													<div class="col-md-6">
														<a class="btn btn-default" role="button" href="?display=blacklist&amp;action=export&amp;quietmode=1"><?php echo _('Export to CSV')?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div role=tabpanel" id="settings" class="tab-pane">
										<!--Block Anonymous-->
										<div class="element-container">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="form-group">
															<div class="col-md-4">
																<b><?php echo _("Block Unknown/Blocked Caller ID") ?></b>
																<i class="fa fa-question-circle fpbx-help-icon" data-for="blocked"></i>
															</div>
															<div class="col-md-8 radioset">
																<input type="radio" name="blocked" id="blockedyes" value="1" <?php echo ($filter_blocked === true?"CHECKED":"") ?>>
																<label for="blockedyes"><?php echo _("Yes");?></label>
																<input type="radio" name="blocked" id="blockedno" value="" <?php echo ($filter_blocked === true?"":"CHECKED") ?>>
																<label for="blockedno"><?php echo _("No");?></label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<span id="blocked-help" class="help-block fpbx-help-block"><?php echo _("Check here to catch Unknown/Blocked Caller ID")?></span>
												</div>
											</div>
										</div>
										<!--End Block Anonymous-->
										<!--Destination-->
										<div class="element-container">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="form-group">
															<div class="col-md-4">
																<label class="control-label" for="goto0"><?php echo _("Destination for BlackListed Calls") ?></label>
																<i class="fa fa-question-circle fpbx-help-icon" data-for="goto0"></i>
															</div>
															<div class="col-md-8 radioset">
																<?php echo drawselects(isset($destination)?$destination:null,0);?>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<span id="goto0-help" class="help-block fpbx-help-block"><?php echo _("Choose where blacklisted calls go")?></span>
												</div>
											</div>
										</div>
										<!--End Destination-->
									</div>
								</div>
						</form>
					</div>
				</div>
				<div class="col-sm-3 bootnav">
					<div class="list-group">
						<a href="#" class="list-group-item" data-toggle="modal" data-target="#addNumber"><i class="fa fa-plus"></i>&nbsp;&nbsp;Blacklist Number</a>
						<a href='#' class="list-group-item hidden" id = "trashchecked"><i class="fa fa-trash-o"></i>&nbsp&nbsp&nbsp;<?php echo _('Delete Selected')?></a>

					</div>
				</div>
				<!--Modals-->
					<?php echo load_view(__DIR__.'/addnumber.php',array());?>
				<!--Modals-->
			</div>
		</div>
	</div>
</div>
