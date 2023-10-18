<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<table id="mytable" class="display" border = "1px" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Readable Publish Date</th>
            <th scope="col">Slug</th>
            <th scope="col">Path</th>
            <th scope="col">Published Timestamp</th>
            <th scope="col">Social Image</th>
            <th scope="col">Canonical Url</th>
            <th scope="col">Published At</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($title as $row):?>   
         <tr>
             <td><?php echo $row['title'];?></td>
             <td><?php echo $row['description'];?></td>
             <td><?php echo $row['readable_publish_date'];?></td>
             <td><?php echo $row['slug'];?></td>
             <td><?php echo $row['path'];?></td>
             <td><?php echo $row['published_timestamp'];?></td>
             <td><?php echo $row['social_image'];?></td>
             <td><?php echo $row['canonical_url'];?></td>
             <td><?php echo $row['published_at'];?></td>
         <?php endforeach ;?>
         </tr> 
    </tbody>
</table>

<script>
   $(document).ready(function () {
    $('#mytable').DataTable();
});
</script>