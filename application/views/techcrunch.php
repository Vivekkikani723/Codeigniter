
<table id="mytable" class="display" border = "1px" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Date</th>
            <th scope="col">Guid</th>
            <th scope="col">Slug</th>
            <th scope="col">Link</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Links</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($id as $row):?>   
         <tr>
             <td><?php echo $row['id'];?></td>
             <td><?php echo $row['date'];?></td>
             <td><?php echo $row['guid']['rendered'];?></td>
             <td><?php echo $row['slug'];?></td>
             <td><?php echo $row['link'];?></td>
             <td><?php echo $row['title']['rendered'];?></td>
             <td><?php echo substr($row['content']['rendered'],0,100)== '.';?>.................</td>
             <td><?php echo $row['_links']['self'][0]['href'];?></td>
         <?php endforeach ;?>
         </tr> 
    </tbody>
</table>