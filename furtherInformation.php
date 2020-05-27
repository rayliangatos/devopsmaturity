<?php
	require 'header.php';
?>
<div class="container-fluid">
    <form id="contactForm" class="needs-validation" method="POST">
    <div class="row">
        <div class="col-xl-9 col-lg-11 m-2 pb-4 rounded text-center text-dark mx-auto">
            <h3>Further Information</h3>
		        <div class="card mt-4  ml-sm-2 ml-xs-0 mr-sm-2 mr-xs-0 text-dark text-left bg-light border-primary border">
		            <h6 class="card-header">Would you like us to contact you for further help and discussion on your Devops Maturity result?</h6>
						<div class="card-body pt-1 pb-1 bg-gradient-secondary">
                            <div class="custom-control custom-radio my-2">
                                <input name="furtherContact" id="furtherContactYes" type="radio" class="custom-control-input" value="yes" onclick="showForm(true)"/>
                                <label class="custom-control-label" for="furtherContactYes">Yes</label>
                            </div>
                            <div class="custom-control custom-radio my-2">
                                <input name="furtherContact" id="furtherContactNo" type="radio" class="custom-control-input" value="no" onclick="showForm(false)"/>
                                <label class="custom-control-label" for="furtherContactNo">No</label>
                            </div>
					    </div>
		        </div>

		        <div id="contacts" class="invisible card mt-4  ml-sm-2 ml-xs-0 mr-sm-2 mr-xs-0 text-dark text-left bg-light border-primary border">
							<div class="container">
		            <div class="row">
		                <div class="col-3 my-2">
		                    <label>Name *:</label>
		                </div>
		                <div class="col-9 my-2">
		                    <input type="text" id="name" class="form-control" name="name"/>
		                </div>
		            </div>
                    <div class="row">
                        <div class="col-3 my-2">
                                <label>Contact email *:</label>
                        </div>
                        <div class="col-9 my-2">
                                <input type="text" id="contactEmail" class="form-control" name="contactEmail"/>
                        </div>
                        <div id='validResult' class="invalid-feedback">
                          Please provide your email.
                        </div>
                    </div>
		            <div class="row">
		                <div class="col-3 my-2">
		                    <label>Organisation:</label>
		                </div>
		                <div class="col-9 my-2">
		                    <input type="text" id="organisation" class="form-control" name="organisation"/>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-3 my-2">
		                    <label>Telephone number:</label>
		                </div>
		                <div class="col-9 my-2">
		                    <input type="text" id="telephoneNumber" class="form-control" name="telephoneNumber"/>
		                </div>
		            </div>
							</div>
		        </div>

				</div>
    </div>

      <div class="container-fluid">
          <div class="row">
              <div class="text-center col-lg-12">
                  <div class="btn-group btn-group-justified">
                      <div class="btn-group" role="group">
                          <button type="submit" class="btn btn-primary" onclick="previous()">Previous</button>
                          <button id="viewResults" type="submit" class="btn btn-primary">View Results</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
	</form>
</div>
<script type="text/javascript">
 $(document).ready(function() {
     $("#viewResults").click(function(){
         var name = $('#name').val();
         var contactEmail = $('#contactEmail').val();
         var organisation = $('#organisation').val();
         var telephoneNumber = $('#telephoneNumber').val();
         var furtherContact = $("input[name='furtherContact']:checked"). val();
         $('#contactForm').attr('action', 'results');
         if (furtherContact == 'yes' && name !='' && contactEmail !='') {
            sendEmail(name,contactEmail,organisation,telephoneNumber,furtherContact);
         }
     });
 });

 var sendEmail = function(name, contactEmail,organisation,telephoneNumber,furtherContact) {
	console.log("sendEmail");
	//console.log(name);
	//console.log(contactEmail);
	//console.log(organisation);
	//console.log(telephoneNumber);
 	$.ajax({
 			 url: 'sendEmail',
 			 type: 'POST',
 			 data: {"name":name, "contactEmail":contactEmail, "organisation":organisation, "telephoneNumber":telephoneNumber,"furtherContact":furtherContact},
 			 success: function(data) {
 					 console.log(data); // Inspect this in your console
 			 }
 		 });
 };

 function previous(){
		 $('form').attr('action', 'section-standardisation');
 }

 function showForm(isShowForm){
		 if (isShowForm){
				 $('#contacts').removeClass('invisible');
				 $('#name').prop('required',true);
				 $('#contactEmail').prop('required',true);
		 } else  {
				 $('#contacts').addClass('invisible');
				 $('#name').removeAttr('required');
				 $('#contactEmail').removeAttr('required');
		 }
 }
</script>
<?php
	require 'footer.php';
?>
