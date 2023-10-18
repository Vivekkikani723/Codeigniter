<?php $this->load->view('layout/header.php');?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                            <h6 class="mb-4">Status</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                            <div class="row">
                                <div class="col-lg-6" >
                                    <div class="alert alert-danger">
                                    <?= $error; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($error=$this->session->flashdata('Good')):?>
                                    <div class="row">
                                        <div class="col-lg-6" >
                                            <div class="alert alert-success">
                                            <?= $error; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endif; ?>
                            <form  action="<?php echo site_url('admin/update');?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $registration['id']; ?>">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="active"  id="active" value="1"<?php echo ($registration['status'] =='1') ? 'checked':'';?>>
                                    <label class="form-check-label"  for="exampleActive">Active</label>
                                </div>
                                <button type="submit" name="submit" value="Add" class="btn btn-primary">Edit</button>   
                            </form> 
                            <p><?php echo $this->session->flashdata('resp_message');?></p>
                    </div>
                </div>
            </div>

<?php $this->load->view('layout/footer.php');?>