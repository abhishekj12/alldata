<?php
include('connection.php');
/*$per_page_record = 4;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$start_from = ($page - 1) * $per_page_record;
$query = "SELECT * FROM data LIMIT $start_from, $per_page_record";
$result = mysqli_query($conn, $query);


// sorting
$orderBy = !empty($_GET["orderby"]) ? $_GET["orderby"] : "id";
$order = !empty($_GET["order"]) ? $_GET["order"] : "asc";
$query = "SELECT * FROM data  ORDER BY " . $orderBy . " " . $order;
$result = mysqli_query($conn, $query);

$nameOrder = "asc";
$emailOrder = "asc";
$rightOrder = "asc";


if ($orderBy == "name" && $order == "asc") {
  $nameOrder = "desc";
}
if ($orderBy == "email" && $order == "asc") {
  $emailOrder = "desc";
}
if ($orderBy == "pernission	" && $order == "asc") {
  $emailOrder = "desc";
}
*/
/*function sortorder($fieldname)
{
  $sorturl = "?order_by=" . $fieldname . "&sort=";
  $sorttype = "asc";
  if (isset($_GET['order_by']) && $_GET['order_by'] == $fieldname) {
    if (isset($_GET['sort']) && $_GET['sort'] == "asc") {
      $sorttype = "desc";
    }
  }
  $sorturl .= $sorttype;
  return $sorturl;
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <style>
    .pagination {
      margin-left: 600px;
      margin-top: 200px;
    }
  </style>
</head>

<body>
 
  <input type="text " id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search']:'' ?>" placeholder="Search here">
  <button id="sub" onclick="urlGenerator(Global_order_by,Global_sort,Global_page,Global_limit)">submit</button>


  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left:1500px;">
    Add
  </button>

  <form method="post" action="" style="margin-top:0px">
    <select name="limit-records" id="limit-records" onchange="urlGenerator(Global_order_by,Global_sort,Global_page,this.value)">
      <option disabled="disabled" selected="selected">---Limit Records---</option>
      <?php foreach ([3, 4, 5,7] as $limit) : ?>
        <option <?php if (isset($_GET["limit-records"]) && $_GET["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
      <?php endforeach; ?>
    </select>
  </form>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="submit.php" method="POST">
            <div class="form-group row">
              <label for="inputname" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Rights</div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="Dashboard">
                  <label class="form-check-label" for="gridCheck1">
                    Dashboard
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="provide list">
                  <label class="form-check-label" for="gridCheck1">
                    provide list
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="customerlist">
                  <label class="form-check-label" for="gridCheck1">
                    customer List
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="joblist">
                  <label class="form-check-label" for="gridCheck1">
                    Job List
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" name="rights[]" value="complainelist">
                  <label class="form-check-label" for="gridCheck1">
                    Compalaine List
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th><a href="javascript:void(0)" class="sort" onclick="urlGenerator('id',Global_sort,Global_page,Global_limit,true)">id</a></th>
        <th><a href="javascript:void(0)" class="sort" onclick="urlGenerator('name',Global_sort,Global_page,Global_limit,true)">Name</a></th>
        <th><a href="javascript:void(0)" class="sort" onclick="urlGenerator('email',Global_sort,Global_page,Global_limit,true)">email</a></th>
        <th><a href="javascript:void(0)" class="sort" onclick="urlGenerator('pernission',Global_sort,Global_page,Global_limit,true)">rights</a></th>
        <th scope="col">action</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody id="demo">
      <?php
      $orderby = "order by   id ASC ";
      if (  isset($_GET['order_by']) && isset($_GET['sort'])) {
        $orderby = ' order by ' . $_GET['order_by'] . ' ' . $_GET['sort'];
      }
      $search = !empty($_GET['search']) ? $_GET['search']:'' ;
      $limit = isset($_GET['limit-records']) ? $_GET['limit-records'] : 7;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $start = ($page - 1) * $limit;

     $result = $conn->query("SELECT count(id) AS id FROM data where  CONCAT(id,name) LIKE '%".$search."%'    LIMIT  $limit");
     $custCount = $result->fetch_all(MYSQLI_ASSOC);
     $total = $custCount[0]['id'];
     $pages = ceil($total / $limit);
      $Previous = $page - 1;
       $Next = $page + 1;
       

    if(!empty($_GET['search']) && $_GET['search'] != "" ){
      $query = "SELECT *  FROM  data where CONCAT(id,name)LIKE '%".$search."%'   " . $orderby . " LIMIT  $start, $limit ";
     }    
     else {
      $query = "SELECT * FROM   data   " . $orderby . " LIMIT  $start, $limit ";
     }
     
           $result = mysqli_query($conn, $query);
        
     
           // if (isset($_GET['search'])) {
      //$search = $_GET['search'];  
      // $sql = "select * from data where  id  LIKE '%$search%' OR name  LIKE '%$search%' ";
      //$result = mysqli_query($conn, $sql);
      //

      while ($rows = mysqli_fetch_array($result)){
      ?>
         <tr>
          <td><?php echo $rows['id'] ?></td>
          <td><?php echo $rows['name'] ?></td>
          <td><?php echo $rows['email'] ?></td>
          <td><?php echo  $rows['pernission'] ?></td>
          <td><a href="delete.php?id=<?php echo $rows['id'] ?>" onclick="return confirm('Are you sure?')"><img src="a.png" widht="100px" height="40px"></a></td>
          <td><a href="edit.php?id=<?php echo $rows['id'] ?>"><img src="pen.png" widht="100px" height="40px"></a></td>
        <?php
      }
        ?>
    </tbody>
  </table>

  <div class="row">
    <div class="col-md-10">
      <nav aria-label="Page navigation">
        <ul class="pagination">
          <li  class="">
            <a class="btn btn-primary"    onclick="urlGenerator(Global_order_by, Global_sort, <?php if($page > 1){echo $Previous;} ?>, Global_limit)"  href="javascript:void(0)" aria-label="Previous">
              <span aria-hidden="true">&laquo; Previous</span>
            </a>
          </li>
          <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <li><a class="btn btn-primary" onclick="urlGenerator(Global_order_by,Global_sort, <?php echo $i; ?>,Global_limit)" href="javascript:void(0)"><?= $i; ?></a></li>
          <?php endfor; ?>
          <li>
            <a onclick="urlGenerator(Global_order_by,Global_sort,<?php if($page < $pages){echo $Next;} ?>,Global_limit)" href="javascript:void(0)" aria-label="Next" class="btn btn-primary">
              <span aria-hidden="true">Next &raquo;</span>
            </a>
          </li>
        </ul>
        
</body>

<script>
 // $(document).ready(function() {
  //  $('#sub').click(function() {
//var nameTextBox = $('#search');
    //  var name = nameTextBox.val();
   //   urlGenerator(Global_order_by, Global_sort, Global_page, Global_limit, name);
   // });
  //});
  
    var Global_order_by = "<?php echo isset($_GET['order_by']) ? $_GET['order_by'] : 'id' ?>";
    var Global_sort =    "<?php echo isset($_GET['sort']) ?  $_GET['sort'] : '' ?>";
    var Global_page =   "<?php echo isset($_GET['page']) ?  $_GET['page'] : '1' ?>";
    var Global_limit =  "<?php echo isset($_GET['limit-records']) ? $_GET['limit-records'] : '7' ?>";

  function urlGenerator(order_by, sort, page, limit, do_sort=false ) {
    Global_order_by = order_by;
    if(do_sort){
      var current_order_by = "<?php echo isset($_GET['order_by']) ? $_GET['order_by'] : 'id' ?>";

      if(current_order_by == order_by){
        //second time click on same orderby
        if(sort == ''){
          Global_sort = 'ASC'; 
        }
        else if (sort == 'ASC') {
          Global_sort = 'DESC';
        }
        else{
          Global_sort = 'ASC'; 
        }
      }
      else{
        //first time click on new orderby
        Global_sort = 'ASC';
      }
      
    }
    else{
      Global_sort = "<?php echo isset($_GET['sort']) ?  $_GET['sort'] : 'ASC' ?>";
    }
    Global_page = page;
    Global_limit = limit;
    var Global_search = document.getElementById("search").value;
    
    var url = 'index.php?order_by=' + Global_order_by + '&sort=' + Global_sort + '&page=' + Global_page + '&limit-records=' + Global_limit + 
    '&search=' + Global_search;
      
    window.location.href = url;
  }
</script>

</html>