<?php
include("config.php");
$id = $_POST['id'];
function fetchPartybyID($id){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  id,
  name,
  contact,
  gstin,
  pan,
  cin,
  address,
  bank
  FROM buyerDetails
  WHERE id = ?
  ");
  $stmt->bind_param("s",$id);
  $stmt->execute();
  $stmt->bind_result($id,$name,$contact,$gstin,$pan,$cin,$address,$bank);
  while($stmt->fetch()){
    $row[] = array('id' =>$id ,'name'=>$name,'contact'=>$contact,'gstin'=>$gstin,'pan'=>$pan,'cin'=>$cin,'address'=>$address,'bank'=>$bank );
  }
  $stmt->close();
  if(!empty($row)){
  return ($row); }
  else
  { return ""; }
}
$fetchPartybyIDDate = fetchPartybyID($id);
foreach ($fetchPartybyIDDate as $v2) {
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
                <form id="form1" action="ajax_submit_party_detail.php" method="post" >
                  <div class="form-body">
                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Party's Info</h6>
                    <hr class="light-grey-hr"/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label mb-10">Party Name</label>
                          <input type="text" name="name" id="firstName" class="form-control" value="<?php echo $v2['name'];?>" placeholder="Buyer's Name" required>
                          <span class="help-block"> </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">Contact Number</label>
                          <input type="text" name="contact" data-mask="+99 999 999 999" class="form-control" value="<?php echo $v2['contact'];?>" placeholder="Mobile No" required>
                          <span class="help-block"> </span>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">GSTIN </label>
                          <input type="text"  name="gstin" data-mask="99-a****9999a-9-Z-9" class="form-control" value="<?php echo $v2['gstin'];?>" required placeholder="State Code - PAN - Entity No - Z - Check sum digit">
                          <span class="help-block"> </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">PAN Number </label>
                          <input type="text"  name="pan" data-mask="a****9999a" class="form-control" value="<?php echo $v2['pan'];?>" required placeholder="PAN Number">
                          <span class="help-block">  </span>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">CIN Number </label>
                          <input type="text" name="cin" data-mask="a-99999-a*-9999-a**-999999" class="form-control" value="<?php echo $v2['cin'];?>" required placeholder="PAN Number">
                          <span class="help-block">  </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">Address</label>
                          <textarea type="text" name="address"  class="form-control" required placeholder="Enter your Address"><?php echo $v2['address'];?></textarea>
                          <span class="help-block">  </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label mb-10">Bank Details</label>
                          <textarea type="text" name="bank"  class="form-control" required placeholder="Enter your Address"><?php echo $v2['bank'];?></textarea>
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
                swal("Good job!", "Party is Successfully Updated!! Please refresh the page", "success");
              //$('#pks1').load(document.URL +  ' #pks1');
               $('#form11').load(document.URL +  ' #form11');
            },
            error: function (data) {
                alert('An error occurred.');
            },
        });
    });
</script>
