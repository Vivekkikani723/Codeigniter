<?php $this->load->view('templates/header.php');?>

        <div class="container">
        <form class="well form-horizontal" action="<?php echo site_url('registration/registration');?>" method="post"  id="contact_form" enctype="multipart/form-data">
        <fieldset>

        <!-- Form Name -->
        <legend><center><h2><b>Registration Form</b></h2></center></legend><br>
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
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-5 control-label">Full Name</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input  name="fullname" placeholder="First Name" class="form-control"  type="text" id="fullname" value="<?php echo set_value('fullname');?>">
        </div>
        </div>
        </div>
        <?php echo form_error('fullname','<div class="text-danger">',"</div>");?><br>

        <!-- Text input-->
        <div class="form-group" >
        <label class="col-md-4 control-label">E-Mail</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input name="email" placeholder="E-Mail Address" class="form-control"  type="email" id="email" value="<?php echo set_value('email');?>">
        </div>
        </div>
        </div>
        <?php echo form_error('email','<div class="text-danger">',"</div>");?><br>

        <!-- Text input-->

        <div class="form-group">
        <label class="col-md-4 control-label">Username</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input  name="username" placeholder="Username" class="form-control"  type="text"  id="username" value="<?php echo set_value('username');?>">
        </div>
        </div>
        </div>
        <?php echo form_error('username','<div class="text-danger">',"</div>");?><br>

        <!-- Text input-->
        <div class="form-group" >
        <label class="col-md-4 control-label">Profilepic</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input class="form-control bg-dark" type="file"  name="profilepic" id="profilepic">
        </div>
        </div>
        </div>
        <?php echo form_error('profilepic','<div class="text-danger">',"</div>");?><br>


        <!-- Text input-->

        <div class="form-group">
        <label class="col-md-4 control-label" >Password</label> 
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="password" placeholder="Password" class="form-control"  type="password" id= "password" value="<?php echo set_value('password');?>">
        </div>
        </div>
        </div>
        <?php echo form_error('password','<div class="text-danger">',"</div>");?><br>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4"><br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
        </div>
        </div>

        </fieldset>
        </form>
        </div>
        </div><!-- /.container -->
<?php $this->load->view('templates/footer.php');?>