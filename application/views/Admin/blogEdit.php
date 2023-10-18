<?php $this->load->view('layout/header.php');?>
 <!-- Form Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded h-100 p-3">
                            <h6 class="mb-4">Edit Post</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form  action="<?php echo site_url('blogs/updateBlog');?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" value="<?php echo $blog['date'];?>" id="date" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="<?php echo $blog['slug'];?>" id="slug" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $blog['title'];?>" id="title" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Content</label>
                                    <input type="text" name="content" class="form-control" value="<?php echo $blog['content'];?>" id="content" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label"  for="exampleActive">Tag</label>
                                    <input type="text" class="form-control" name="tag"  id="tag" value="<?php echo $blog['tag'];?>">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="active"  id="active" value="1"<?php echo ($blog['status'] =='1') ? 'checked':'';?>>
                                    <label class="form-check-label"  for="exampleActive">Active</label>
                                </div>
                                <button type="submit" name="submit" value="Add" class="btn btn-primary">Edit</button>   
                            </form> 
                            <p><?php echo $this->session->flashdata('resp_message');?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
<?php $this->load->view('layout/footer.php');?>