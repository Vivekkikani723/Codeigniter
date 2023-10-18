<?php $this->load->view('layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>

    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">  
    <div class="col-sm-12 col-xl-65">
    <h6 class="mb-4">User List</h6>
    <div class="nav-item dropdown">
        <a href="<?php echo base_url('blogs/allBlog')?>" >Add Blog</a>
    </div>
        <table id="mytable">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Date</th>
            <th scope="col">Guid</th>
            <th scope="col">Slug</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Tag</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($blog)):?>
        <?php foreach($blog as $row):?>   
         <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo date("d-m-Y", strtotime($row['date']));?></td>
            <td><?php echo $row['guid'];?></td>
            <td><?php echo $row['slug'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo substr($row['content'],0,50,);?>.................</td>
            <td><?php echo $row['tag'];?></td>
            <td><?php $status = $row['status'];
                if($status == 1){ ?>
                    <a class="btn btn-success">Active</a>
                <?php }else{ ?>
                    <a class="btn btn-danger">InActive</a>
                <?php } ?>
            </td>
            <td><?php echo anchor('blogs/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
            <td><?php echo anchor('blogs/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger']);?></td>
        <?php endforeach ;?>
        <?php endif;?>
         </tr> 
    </tbody>
</table>
<script>
   $(document).ready(function () {
    $('#mytable').dataTable();
    });
</script>
<?php $this->load->view('layout/footer.php');?>