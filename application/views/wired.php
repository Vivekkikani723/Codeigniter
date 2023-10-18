<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<table id="mytable" class="display" border = "1px" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Guid</th>
            <th scope="col">Link</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Links</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($title as $row):?>   
         <tr>
             <td><?php echo $row['date'];?></td>
             <td><?php echo $row['guid']['rendered'];?></td>
             <td><?php echo $row['link'];?></td>
             <td><?php echo $row['title']['rendered'];?></td>
             <td><?php echo substr($row['content']['rendered'],0,100) ;?>.................</td>
             <td><?php echo $row['_links']['self'][0]['href'];?></td>
         <?php endforeach ;?>
         </tr> 
    </tbody>
</table>