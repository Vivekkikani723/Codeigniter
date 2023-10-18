<?php $this->load->view('layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>

    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">User List</h6>
        <table id="mytable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Profilepic</th>
                    <th scope="col">status</th>
                    <th scope="col">Edit</th>
                    <!-- <th scope="col">Delete</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($registration)):?>
                <?php foreach($registration as $row):?>
                    
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td>
                        <?php if($row['profilepic']){ ?>
                        <img src="<?php echo base_url('asset/upload/').$row['profilepic']?>" style="width: 200px;">
                        <?php } ?>
                    </td>
                    <td><?php $status = $row['status'];
                            if($status == 1){ ?>
                                <a class="btn btn-success">Active</a>
                            <?php }else{ ?>
                                <a class="btn btn-danger">InActive</a>
                            <?php } ?>
                        </td>
                    <td><?php echo anchor('admin/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <!-- <td><?php echo anchor('newemployee/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger']);?></td> -->

                    <?php endforeach ;?>
                    <?php endif;?>
                </tr> 

            </tbody>
        </table>
    </div>
    </div>
    </div>
    
<script>
   $(document).ready(function () {
    $('#mytable').dataTable();
    });
</script>
<?php $this->load->view('layout/footer.php');?>