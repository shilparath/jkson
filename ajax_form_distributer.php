<?php
include("config.php");
$id = $_POST['id'];
function fetchSupplierFromID($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
    id,
    name,
    contact,
    gstin,
    pan,
    cin,
    address
    FROM distributer_details
    WHERE id = ?
     ");
     $stmt->bind_param("s",$id);
     $stmt->execute();
     $stmt->bind_result($id,$name,$contact,$gstin,$pan,$cin,$address);
     while($stmt->fetch()){
       $row[]=array('id'=>$id,'name'=>$name,'contact'=>$contact,'gstin'=>$gstin,'pan'=>$pan,'cin'=>$cin,'address'=>$address);
     }
     $stmt->close();
    if(!empty($row)){
    return ($row);
    }
    else {
       return "";
     }
}
//print_r($id);
$fetchBuyerByID = fetchSupplierFromID($id);
//print_r($fetchBuyerByID);
foreach ($fetchBuyerByID as $v2) {
?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark">	</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <div class="form-wrap">
                <form id="form1" action="ajax_submit_detail_distributer.php" method="post" >
                  <div class="form-body">
                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Sub-Distributer's Info</h6>
                    <hr class="light-grey-hr"/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label mb-10">Sub-Dristibuter Name</label>
                          <input type="text" name="name" id="firstName" class="form-control" value="<?php echo $v2['name'];?>" placeholder="Buyer's Name" required>
                          <span class="help-block"> </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">Contact Number</label>
                          <input type="text" name="contact" class="form-control" value="<?php echo $v2['contact'];?>" placeholder="Mobile No" required>
                          <span class="help-block"> </span>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">GSTIN </label>
                          <input type="text"  name="gstin" class="form-control" value="<?php echo $v2['gstin'];?>" required placeholder="State Code - PAN - Entity No - Z - Check sum digit">
                          <span class="help-block"> </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">PAN Number </label>
                          <input type="text"  name="pan" class="form-control" value="<?php echo $v2['pan'];?>" required placeholder="PAN Number">
                          <span class="help-block">  </span>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">CIN Number </label>
                          <input type="text" name="cin" class="form-control" value="<?php echo $v2['cin'];?>" required placeholder="PAN Number">
                          <span class="help-block">  </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">Address</label>
                          <textarea type="text" name="address" class="form-control" required placeholder="Enter your Address"><?php echo $v2['address'];?></textarea>
                          <span class="help-block">  </span>
                        </div>
                      </div>
                      <input type="hidden" value="<?php echo $v2['id'];?>" name="sl_no">
                    </div>
                  </div>
                  <div class="form-actions mt-10">
                    <button type="submit" class="btn btn-success  mr-10"> Save</button>
                    <button type="reset" value="Reset" class="btn btn-default">Reset</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<script type="text/javascript">
    var frm = $('#form1');
    frm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url:  frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                swal("Good job!", "Buyer is Successfully Updated!!", "success")
              //  $('#pks1').load(document.URL +  ' #pks1');
                $('#form11').load(document.URL +  ' #form11');
				location. reload(true);
            },
            error: function (data) {
                alert('An error occurred.');
            },
        });
    });
</script>
