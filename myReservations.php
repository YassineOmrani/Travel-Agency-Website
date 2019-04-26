
<?php
      include ('inc/header.php');
      include ('inc/logNav.php');
?>

<div class="container">
    <div class="jumbotron" id="printablePart2">
      <div class="container">
          <h1 class="display-2">Mr. <?php echo $_SESSION['fullname']; ?></h1>
      </div>
    </div>
        <?php

        ?>
    <div id="printablePart">
      <table class="table">
      <thead class="thead-dark">
          <tr>
          <th scope="col"><strong># Reservation</strong></th>
          <th scope="col"><strong>Num° Circuit</strong></th>
          <th scope="col"><strong>Date de depart</strong></th>
          <th scope="col"><strong>Heure de depart</strong></th>
          <th scope="col"><strong>N° de Personnes</strong></th>
          <th scope="col" id="d-print-none"><strong>Update</strong></th>
          <th scope="col" id="d-print-none"><strong>Delete</strong></th>
          </tr>
      </thead>
      <tbody>
      <?php
          $numCin  = $_SESSION['numCin'];
          $sql0 = "
              SELECT idClient
              FROM client
              WHERE numCin = '$numCin'
          ";

          $result0     = query($sql0);
          confirm($result0);
          $row0        = fetch_data($result0);
          $idClient    = $row0['idClient'];

          $sql         = "SELECT * FROM reservation R WHERE R.idClient = '$idClient'";
          $result      = query($sql);
          confirm($result);

          if (row_count($result) > 0){
              $count = 1;
              while($fetch = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
          <th scope="row"><?php echo $count++; ?></th>
          <td><?php echo $fetch['idCircuit']; ?></td>
          <td><?php echo $fetch['dateDepart']; ?></td>
          <td><?php echo $fetch['heureDepart']; ?></td>
          <td><?php echo $fetch['nbrPersonne']; ?></td>
            <td  id="d-print-none">
                <button type="button" data-id = "<?php echo $fetch['idReservation']; ?>" class="btn btn-link edit_data">
                    <span class="glyphicon glyphicon-cog" style="color:green"></span>
                </button>
            </td>
            <td  id="d-print-none"> 
                <a href=<?php echo 'deleteQuery.php?idR='.$fetch['idReservation'] ?> class="btn btn-link">
                    <span class="glyphicon glyphicon-trash" style="color:red"></span>
                </a>
            </td>
          </tr>
      <?php
              }
          }
      ?>
      </tbody>
      </table>
    </div>
    <button class="btn btn-link" id="printBtn" style="float: right;">
          <span class="glyphicon glyphicon-print"></span>
    </button>
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Reservation</h4>
        </div>

        <div class="modal-body">
          <form method="GET" id="my_form">
                <input type="hidden" value="" id="idR">
                <input type="text"   name="dateDepart" id="dateDepart" class="form-control input datepicker" value="Mm/Dd/Yy">
                <br>
                <br>
                <input type="time"   name="heureDepart" id="heureDepart" class="form-control" value="10:00">
                <br>
                <br>
                <div class="text-center">
                    <a href="" class="btn btn-success" id="modalEdit">Edit</a>
                </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $(".edit_data").click(function(){
    $("#myModal").modal();
  });
});

$('.edit_data').click(function(){
    //get cover id
    var idR = $(this).data('id');
    //set href for cancel button
    $('#idR').attr('value',idR);
});
$('#modalEdit').click(function(){
    //get cover id
    var heureDepart = $('#heureDepart').val();
    var dateDepart = $('#dateDepart').val();
    var idR = $('#idR').val();
    //set href for cancel button
    $('#modalEdit').attr('href','updateQuery.php?idR='+idR+'&heureDepart='+heureDepart+'&dateDepart='+dateDepart);
});

</script>
<script src="js/print.js"></script>
<?php
          include ('inc/footer.php');
?>