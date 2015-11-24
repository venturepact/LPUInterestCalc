<?php
	$duration = '';
	if(isset($proposal->fp_total_price_interval)){
		if(isset($proposal->duration) && ($proposal->duration!='Indefinite')){
			$duration = $proposal->duration;
			if($proposal->fp_total_price_interval==0)
				 $duration .= " Days";
			else if($proposal->fp_total_price_interval==1)
				$duration .= " Weeks";
			else
				 $duration .= " Months";
		}
	}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>VenturePact - Client Agreement</title>
  </head>
  <body style=" width:720px; margin: 0 auto; padding: 0; color:#333; font-size: 13px !important; line-height: 16px; font-family: arial; text-align:left; background:#fff;">
	<p style="padding: 10px; padding-botom:25px; border-bottom: 1px solid #ddd;font-size:24px; color:#333; padding-top:20px;padding-bottom:20px; ">Software Services Agreement </p>

	<p  style="padding: 5px 10px; text-align: left; font-size:14px;">
		This Software Development Agreement is made on <b><?php echo date('m-d-Y',strtotime($proposal->start_date)); ?></b> (the "Effective Date") between <b><?php echo $proposal->suppliersProjects->suppliers->users->company_name;?></b> (the "Developer") and <b><?php echo $proposal->suppliersProjects->clientProjects->clientProfiles->users->company_name;?></b> (the "Customer")
	</p>

	<p style=" text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold " >
		SPECIFICATIONS, PAYMENTS, AND CHANGE MANAGEMENT 
	</p>
	<!-- <p style=" float:left; font-size:14px; padding:5px 5px 5px 10px; margin-left:20px; text-align " ><b>1.1 Project. </b> The Client is hiring the Developer to do the following: </p>
	
	<p style=" float:left; padding-top:5px; width:100%; font-size:16px; margin-left:12px; margin-bottom:10px;  text-align:left;"><b><?php //echo isThere($_POST['ProposalPitches']['client_comment'])?$_POST['ProposalPitches']['client_comment']:htmlentities('<description>'); ?></b></p>
	 -->
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>1. Work Product.</b> The Customer engages the Developer, and the Developer agrees, to perform services for the Customer to develop, deliver, support and maintain the Work Product in accordance with the “Specifications” and the terms of this agreement. </p>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>2. Specifications.</b> The Customer shall define the specifications, requirements, and deliverables (the "Specifications"), with input from the Developer. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Broad Definition.</b> While the Customer will outline higher level or broad specifications at the beginning of the project, it is understood that the specifications may change over the course of development. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. Continuous Definition.</b> In keeping with Agile Philosophy, the specifications may be defined, edited or changed while the project is underway. Specifications will be considered valid if they are laid out in clear detail on the VenturePact platform. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>c. Changes.</b> All changes will be subject to terms as laid out in “Change Management”. </p>

	 <?php if($proposal->billing_type==1) { ?>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>3. Schedule.</b> The Developer will begin work on <b><?php echo date('m-d-Y',strtotime($proposal->start_date)); ?></b> and will continue work <b><?php echo !empty($duration)?$duration:'for an indefinite period of time'; ?></b>. The time period may be changed or extended by agreement of both the parties. </p>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>4. Payment.</b> The Customer will pay the Developer a <b><?php if($proposal->tm_billing_schedule_type == 0)   echo "Weekly";  else  echo "Monthly";?></b> fee of <b><?php echo '$ '.$proposal->tm_amount; ?></b>. This fee corresponds to 40 hours of work done each week or 160 hours of work done each month. The Developer may, after due approval from the customer, charge additional fee for overtime. If the Customer chooses to on board additional resources from the Developer the amount then the amount will be subject to change. Any change in the price should be approved by the Customer first. </p>
	 <?php } else if($proposal->billing_type==2) {?>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>3. Schedule.</b> The Developer will begin work on <b><?php echo date('m-d-Y',strtotime($proposal->start_date)); ?></b> and shall use reasonable efforts to deliver the work product to the Customer no later than <b><?php echo !empty($duration)?$duration:'for an indefinite period of time'; ?></b> OR as soon as commercially practicable in accordance with the Specifications.  </p>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>4. Payment.</b> The Customer and the Developer agree to use an escrow service to make payments for the said milestones. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Funding Escrow.</b> The Customer agrees to fund the escrow for each payment before the beginning of the milestone. The Developer is not liable to start the development for a milestone untill the escrow has been funded for that milestone. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. Releasing Escrow.</b> The Customer must not release the funds held in escrow until it is fully satisfied with the deliverables of the milestone. The Customer will pay the Developer as per the milestone schedule laid out below. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>c. Milestones.</b> The work product is divided into the following milestones and the Developer agrees to use reasonable efforts to complete all milestones by their respective deadlines. </p>
	 <div style="float:left; width:100%; margin-top:30px; margin-bottom:30px; ">
		<b>	
			<table width="700" style=" margin-left:70px; " cellpadding="0" cellspacing="0">
				<?php 
				$index = 1; 
				foreach ($proposal->pitchHasMilestones as $milestone) {
				?>
				<tr>
					<td  style="width:30px;">
						<?php echo $index; ?>
					</td>
					<td width= style="width:120px;" >
						Milestone <?php echo $milestone->title; ?>
					</td>
					<td  style="width:200px;">
						(Due on <?php echo date('m-d-Y',strtotime($milestone->due_date)); ?>) :  
					</td>
					<td  style="width:200px;">
						<?php echo $milestone->overview; ?> : 
					</td>
					<td style="width:120px;"> 
						<?php echo '$ '.$milestone->amount; ?>
					</td>              
				</tr>
				<?php $index=$index+1;
				}
				?>   
			</table> 	 
		</b>
	 </div>
	 <?php } ?>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>5. Acceptance.</b> The Customer will have 7 days following the date of delivery to assess and test the work product and make payment against an invoice or a request for escrow release. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Completion.</b> If the Developer, in the Customer&rsquo;s opinion, delivers the Work Product in accordance with the Specifications, then the Developer will be deemed to have completed its delivery obligations. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. Rejection.</b> If the Developer, in the Customer's opinion, fails to deliver the Software in accordance with the Specifications, the Customer shall detail in writing its grounds for rejection. In that case, the Developer shall use reasonable efforts to correct the Software, in which case upon delivery of the corrected Software, the process of acceptance testing will restart. </p>
	 <p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " ><b>i.</b> In case there is a disagreement around the actual deliverables and specifications, both the parties will refer to the milestone notes documented on the VenturePact platform. </p>
	 <p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " ><b>ii.</b> If there is not a clear answer, the benefit of the doubt will be given to the Customer as it is the duty of the Developer to ensure that the deliverables and specifications are clearly laid out. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>c. Each milestone is its own work product.</b> If Customer has strong concerns about the quality of the deliverables, the Customer must notify the Developer during this acceptance period. Any concerns voice thereafter may be considered a change request and treated as described under “Change Management”. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>d. Customer will Communicate Preferences Upfront.</b> The Customer will be clear if they have any preferences with regard to styling, code architecture, programming language, commenting, documentation or any other coding related preferences from the beginning of the project. </p>
	 <p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " ><b>i.</b> If the client has any objections to set up of styling, file structure, documentation, commenting the software architecture or any other coding related preferences, it must be clearly communicated by the Customer from the beginning of the project and must be reviewed thoroughly during the first week of development by the Customer. Any problems with the work of the Developer resulting from these issues must be communicated by the Customer to the Developer within the first 2 weeks of the funding of the first milestone. </p>
	 <p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " ><b>ii.</b> If not done, the developer is not obligated to redo any part of the work product. Any changes may be considered a change request and treated as described under “Change Management”. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>e. Continued Failure.</b> If the Developer&rsquo;s corrections[, in the Customer&rsquo;s opinion,] fail to deliver the Software in accordance with the Specifications, then the Customer may elect to terminate this agreement as per the Termination procedure. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>f. Late Penalty.</b> In case no clear grounds are presented, the Customer will incur a late fee of 5% per month on the outstanding amount. </p>
	 
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>6. Support and Maintenance.</b></p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Initial Period.</b> The Developer shall provide the Customer with support and maintenance services for 6 months following delivery and acceptance. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. Scope.</b> The work done during the maintenance period is limited to bug fixes and small adjustments that take, in the developer’s opinion, not more than 3 man hours per change. Larger change requests may not be handled without incurring an expense as per the policies laid out in “Change Management”. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>c. Renewal Periods.</b> The Customer may renew its support and maintenance subscription after the initial subscription period at the Developer&rsquo;s then-current rates. </p>

	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>7. Change Management.</b> Both the parties understand that software projects are susceptible to change. The Customer and the Developer agree that the deliverables as well as the amounts/fees and deadlines of the milestones and the invoices can be changed if both agree to the changed terms on the VenturePact platform.</p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Changes.</b> The Customer may at any time request changes to the Specifications. The Developer agrees to entertain any change that amounts to a change in a feature and not in the broader definition of the Work Product. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. Additional Time or Expense.</b> If the proposed change will, in the Developer&rsquo;s reasonable opinion, require a significant delay in the delivery of the Software or result in additional expense, then the Customer and the Developer shall confer. The Customer may in that case elect to either: </p>
	 <p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " ><b>i.</b> withdraw its proposed change, or <br/><b>ii.</b> be subject to a delay or additional expense or both. </p>
	 
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>c. Change management during maintenance:</b> During the maintenance period, if any change is requested that does not qualify as a bug, the developer is not liable to entertain the request. If it does entertain,  it can price the change request and only after the client agrees to that price and timeline the Developer should go ahead and complete that change request. </p>

	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>8. Use of VenturePact Platform.</b> Both the parties agree that all communication regarding payments and the payments themselves will happen on the VenturePact platform.</p>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>9. Trial Period.</b> <?php if(!empty($proposal->trial)) { ?>  The developer agrees to provide for a <?php echo $proposal->trial." Days";?> risk free trial period.<?php } ?> The Customer may be billed for this period but a refund is due in case the Customer is not satisfied with the services provided.</p>
	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>10. Expenses.</b> The Customer shall reimburse the Developer for all reasonable expenses that the Developer incurs in developing the Software, but only if the Customer has given its prior approval to the expenses.</p>

	 <p style=" float:left; font-size:14px;  margin-left:30px; line-height:22px; margin-top:5px;  " ><b>11. Technology Transfer.</b> The developer will make all effort to ensure that the technology transfer is done professionally.</p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Availability.</b> The developer will be available to answer any questions regarding the work product’s code base or documentation during the maintenance period. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. File Transfer.</b>  All code files including all version history shall be handed over in an acceptable format. </p>
	 <p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>c. Documentation.</b> The developer will provide all necessary documentation required by the client including in-line comments, code walkthroughs or any other information that is required to be able to run the application and code base by the Customer itself or by any other 3rd party that it may hire from time to time. </p>

	 <p style=" float:left; text-align:left; font-size:20px; padding: 10px; margin-top:20px; font-weight:bold " >OWNERSHIP AND LICENSES.</p>

	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  "><b>1. Customer Owns All Work Product After Full Payment.</b> As part of this job, the Developer is creating “work product” for the Customer. To avoid confusion, work product is the finished product, as well as drafts, notes, materials, mockups, hardware, designs, inventions, patents, code, and anything else that the Developer works on—that is, conceives, creates, designs, develops, invents, works on, or reduces to practice—as part of this project, whether before the date of this Contract or after. The Developer hereby gives the Customer this work product once the Customer pays for it in full. This means the Developer is giving the Customer all of its rights, titles, and interests in and to the work product (including intellectual property rights), and the Customer will be the sole owner of it. The Customer can use the work product however it wants or it can decide not to use the work product at all. The Customer, for example, can modify, destroy, or sell it, as it sees fit.</p>

	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  "><b>2. Developer&rsquo;s Use Of Work Product.</b> Once the Developer gives the work product to the Customer, the Developer does not have any rights to it, except those that the Customer explicitly gives the Developer here. The Developer is not allowed to sell or otherwise use the work product to make money or for any other commercial use. The Customer is not allowed to take back this license, even after the Contract ends.</p>

	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  "><b>3. Developer&rsquo;s Help Securing Ownership.</b> Down the road, the Customer may need the Developer’s help to show that the Customer owns the work product or to complete the transfer. The Developer agrees to help with that. For example, the Developer may have to sign a patent application. The Customer will pay any required expenses for this. If the Customer can’t find the Developer, the Developer agrees that the Customer can act on the Developer’s behalf to accomplish it. The following language gives the Customer that right: if the Customer can’t find the Developer after spending reasonable effort trying to do so, the Developer hereby irrevocably designates and appoints the Customer as the Developer’s agent and attorney-in-fact, which appointment is coupled with an interest, to act for the Developer and on the Developer’s behalf to execute, verify, and file the required documents and to take any other legal action to accomplish the purposes of paragraph 2.1.</p>

	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  "><b>4. Developer&rsquo;s IP That Is Not Work Product.</b> During the course of this project, the Developer might use intellectual property that the Developer owns or has licensed from a third party, but that does not qualify as “work product.” This is called “background IP.” Possible examples of background IP are pre-existing code, type fonts, properly-licensed stock photos, and web application tools. The Developer is not giving the Customer this background IP. But, as part of the Contract, the Developer is giving the Customer a right to use and license (with the right to sublicense) the background IP to develop, market, sell, and support the Customer’s products and services. The Customer may use this background IP worldwide and free charge, but it cannot transfer its rights to the background IP (except as allowed in Section 13.1 (Assignment)). The Customer cannot sell or license the background IP separately from its products or services. The Developer cannot take back this grant, and this grant does not end when the Contract is terminated.</p>

	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;  line-height:20px; margin-top:5px;  "><b>5. Developer&rsquo;s Right To Use Client IP.</b> The Developer may need to use the Customer’s intellectual property to do its job. For example, if the Customer is hiring the Developer to build a website, the Developer may have to use the Customer’s logo. The Customer agrees to let the Developer use the Customer’s intellectual property and other intellectual property that the Customer controls to the extent reasonably necessary to do the Developer’s job. Beyond that, the Customer is not giving the Developer any intellectual property rights, unless specifically stated otherwise in this Contract.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;  line-height:20px; margin-top:5px;  "><b>6. Portfolio Showcase.</b> The Developer may use the Customer’s logo or the work product  on their public portfolio only after taking due approval from the Customer.</p>


	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold " >COMPETITIVE ENGAGEMENTS.</p> 
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " >
	The Developer won’t work for a competitor of the Customer until this Contract ends. To avoid confusion, a competitor is any third party that develops, manufactures, promotes, sells, licenses, distributes, or provides products or services that are substantially similar and directly competitive to the specific Customer’s products or services that the developer is works on under this contract. It is also a third party that plans to do any of those things. The one exception to this restriction is if the Developer asks for permission beforehand and the Customer agrees to it in writing. If the Developer uses employees or subcontractors, the Developer must make sure they follow the obligations in this paragraph, as well.
	</p>


	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold " >NON-SOLICITATION.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " >
	 Until this Contract ends, the Developer won’t: (a) encourage Customer employees or service providers to stop working for the Customer; (b) encourage Customer customers or Customers to stop doing business with the Customer; or (c) hire anyone who worked for the Customer over the 12-month period after the Contract ends. The one exception is if the Developer puts out a general ad and someone who happened to work for the Customer responds. In that case, the Developer may hire that candidate. The Developer promises that it won’t do anything in this paragraph on behalf of itself or a third party.
	</p>

	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >REPRESENTATIONS.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1. Authority To Sign.</b> Each party promises to the other party that it has the authority to enter into this Contract and to perform all of its obligations under this Contract.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " ><b>2. Developer Has Right To Give Customer Work Product.</b> The Developer promises that it owns the work product, that the Developer is able to give the work product to the Customer, and that no other party will claim that it owns the work product. If the Developer uses employees or subcontractors, the Developer also promises that these employees and subcontractors have signed contracts with the Developer giving the Developer any rights that the employees or subcontractors have related to the Developer’s background IP and work product.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>3. Developer Will Comply With Laws.</b> The Developer promises that the manner it does this job, its work product, and any background IP it uses comply with applicable U.S. laws and regulations.</p>

	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;  line-height:20px; margin-top:5px;  " ><b>4. Work Product Does Not Infringe.</b> The Developer promises that its work product does not and will not infringe on someone else’s intellectual property rights, that the Developer has the right to let the Customer use the background IP as described in Section 2.4 (Developer’s IP That Is Not Work Product), and that this Contract does not and will not violate any contract that the Developer has entered into or will enter into with someone else.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;  line-height:20px; margin-top:5px;  " ><b>5. Customer Will Review Work.</b> The Customer promises to review the work product, to be reasonably available to the Developer if the Developer has questions regarding this project, and to provide timely feedback and decisions.</p>
	<p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Feedback.</b> The Customer will respond within 24-48 hours. If not, then the Customer understands that this can cause delay of project as it requires Developer to make an assumption or to hold off on development until they get an answer.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;  line-height:20px; margin-top:5px;  " ><b>6. Customer-Supplied Material Does Not Infringe.</b> If the Customer provides the Developer with material to incorporate into the work product, the Customer promises that this material does not infringe on someone else’s intellectual property rights.</p>

	<div style="float:left">
	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >TERMINATION.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1. Termination upon Notice.</b> Either party may terminate this agreement for any reason upon 30 days&rsquo; Notice to the other party.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " ><b>2. Termination for Cause.</b> If either party</p>
	<p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a.</b> commits a material breach or material default in the performance or observance of any of its obligations under this agreement, and</p>
	<p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b.</b> the breach or default continues for a period of 7 DAYS after delivery by the other party of written notice reasonably detailing such breach or default, then the non-breaching or non-defaulting party may terminate this agreement, with immediate effect, upon written notice to the breaching or defaulting party.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>3. Effect of Termination.</b></p>
	<p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>a. Termination for Customer&rsquo;s Breach.</b> In the event of termination of this agreement due to a material breach or default committed by the Customer,</p>
	<p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " >
	<b>i.</b> The assignment of rights to the Customer in this agreement will terminate, and 
	<br>
	<b>ii.</b> the Customer shall immediately stop using the Software and destroy or erase all copies in its possession or control.
	</p>
	<p style=" float:left; font-size:14px;  margin-left:50px; line-height:22px; margin-top:5px;  " ><b>b. Termination for any other Reason.</b> In the event of termination of this agreement for any other reason, </p>
	<p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " >
		<b>i.</b> the Customer will continue to exercise all rights to the Software that it has acquired under this agreement in so far it has made all the necessary payments for all services provided until that time,
		<br>
		<b>ii.</b> the Developer shall immediately deliver to the Customer all Software, documentation, source code, and other Customer property in its possession relating to the Software and then destroy all copies in its possession or control, in so far that the Customer has made all the necessary payments for all services provided until that time.
		<br>
		<b>iii.</b> the Customer shall pay the Developer for all services rendered and work performed up to the effective date of termination, unless the Customer has terminated for cause, in which case it will only be required to pay the amount for services rendered but not paid for since the beginning or the last payment
		<br>
		<b>iv.</b> The Developer shall provide the Customer with an invoice for its fees within 30 days of the effective date of the termination, and the Customer shall pay the invoice within 14 days of receipt.
	</p>
	</div>

	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >INDEPENDENT CONTRACTOR.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " >1. The Customer is hiring the Developer as an independent contractor. The following statements accurately reflect their relationship:</p>
	<p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " >
	<b>a.</b> The Developer will use its own equipment, tools, and material to do the work.
	<br>
	<b>b.</b> The Customer will not control how the job is performed on a day-to-day basis. Rather, the Developer is responsible for determining when, where, and how it will carry out the work.
	<br>
	<b>c.</b> The Customer will not provide the Developer with any training.
	<br>
	<b>d.</b> The Customer and the Developer do not have a partnership or employer-employee relationship.
	<br>
	<b>e.</b> The Developer cannot enter into contracts, make promises, or act on behalf of the Customer.
	<br>
	<b>f.</b> The Developer is not entitled to the Customer’s benefits (e.g., group insurance, retirement benefits, retirement plans, vacation days).
	<br>
	<b>g.</b> The Developer is responsible for its own taxes.
	<br>
	<b>h.</b> The Customer will not withhold social security and Medicare taxes or make payments for disability insurance, unemployment insurance, or workers compensation for the Developer or any of the Developer’s employees or subcontractors.
	<br>
	</p>

	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >CONFIDENTIAL INFORMATION.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1. Overview.</b> This Contract imposes special restrictions on how the Customer and the Developer must handle confidential information. These obligations are explained in this section.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>2. The Customer’s Confidential Information.</b> While working for the Customer, the Developer may come across, or be given, Customer information that is confidential. This is information like customer lists, business strategies, research & development notes, statistics about a website, and other information that is private. The Developer promises to treat this information as if it is the Developer’s own confidential information. The Developer may use this information to do its job under this Contract, but not for anything else. For example, if the Customer lets the Developer use a customer list to send out a newsletter, the Developer cannot use those email addresses for any other purpose. The one exception to this is if the Customer gives the Developer written permission to use the information for another purpose, the Developer may use the information for that purpose, as well. When this Contract ends, the Developer must give back or destroy all confidential information, and confirm that it has done so. The Developer promises that it will not share confidential information with a third party, unless the Customer gives the Developer written permission first. The Developer must continue to follow these obligations, even after the Contract ends. The Developer’s responsibilities only stop if the Developer can show any of the following: (i) that the information was already public when the Developer came across it; (ii) the information became public after the Developer came across it, but not because of anything the Developer did or didn’t do; (iii) the Developer already knew the information when the Developer came across it and the Developer didn’t have any obligation to keep it secret; (iv) a third party provided the Developer with the information without requiring that the Developer keep it a secret; or (v) the Developer created the information on its own, without using anything belonging to the Customer.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1. Third-Party Confidential Information.</b> It’s possible the Customer and the Developer each have access to confidential information that belongs to third parties. The Customer and the Developer each promise that it will not share with the other party confidential information that belongs to third parties, unless it is allowed to do so. If the Customer or the Developer is allowed to share confidential information with the other party and does so, the sharing party promises to tell the other party in writing of any special restrictions regarding that information.</p>

	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >LIMITATION OF LIABILITY.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " >Neither party is liable for breach-of-contract damages that the breaching party could not reasonably have foreseen when it entered this Contract.</p>

	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >INDEMNITY.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1. Overview.</b> This section transfers certain risks between the parties if a third party sues or goes after the Customer or the Developer or both. For example, if the Customer gets sued for something that the Developer did, then the Developer may promise to come to the Customer’s defense or to reimburse the Customer for any losses.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>2. Customer Indemnity.</b> In this Contract, the Developer agrees to indemnify the Customer (and its affiliates and its and their directors, officers, employees, and agents) from and against all liabilities, losses, damages, and expenses (including reasonable attorneys’ fees) related to a third-party claim or proceeding arising out of: (i) the work the Developer has done under this Contract; (ii) a breach by the Developer of its obligations under this Contract; or (iii) a breach by the Developer of the promises it is making in Section 5 (Representations).</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>3. Developer Indemnity.</b> In this Contract, the Customer agrees to indemnify the Developer (and its affiliates and its and their directors, officers, employees, and agents) from and against liabilities, losses, damages, and expenses (including reasonable attorneys’ fees) related to a third-party claim or proceeding arising out: a breach by the Customer of its obligations under this Contract.</p>

	<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >GENERAL.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1. Assignment.</b> This Contract applies only to the Customer and the Developer. The Developer cannot assign its rights or delegate its obligations under this Contract to a third-party (other than by will or intestate), without first receiving the Customer’s written permission. In contrast, the Customer may assign its rights and delegate its obligations under this Contract without the Developer’s permission. This is necessary in case, for example, another Customer buys out the Customer or if the Customer decides to sell the work product that results from this Contract.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>2. Arbitration.</b> As the exclusive means of initiating adversarial proceedings to resolve any dispute arising under this Contract, a party may demand that the dispute be resolved by arbitration administered by the American Arbitration Association in accordance with its commercial arbitration rules.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>3. Modification; Waiver.</b> To change anything in this Contract, the Customer and the Developer must agree to that change in writing and sign a document showing their contract. Neither party can waive its rights under this Contract or release the other party from its obligations under this Contract, unless the waiving party acknowledges it is doing so in writing and signs a document that says so.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>4. Notices.</b> 
	<br>
	<b>a.</b> Over the course of this Contract, one party may need to send a notice to the other party. For the notice to be valid, it must be in writing and delivered in one of the following ways: personal delivery, email, or certified or registered mail (postage prepaid, return receipt requested). The notice must be delivered to the party’s address listed at the end of this Contract or to another address that the party has provided in writing as an appropriate address to receive notice.
	<br>
	<b>b.</b> The timing of when a notice is received can be very important. To avoid confusion, a valid notice is considered received as follows: (i) if delivered personally, it is considered received immediately; (ii) if delivered by email, it is considered received upon acknowledgement of receipt; (iii) if delivered by registered or certified mail (postage prepaid, return receipt requested), it is considered received upon receipt as indicated by the date on the signed receipt. If a party refuses to accept notice or if notice cannot be delivered because of a change in address for which no notice was given, then it is considered received when the notice is rejected or unable to be delivered. If the notice is received after 5:00pm on a business day at the location specified in the address for that party, or on a day that is not a business day, then the notice is considered received at 9:00am on the next business day.
	</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>5. Severability.</b> This section deals with what happens if a portion of the Contract is found to be unenforceable. If that’s the case, the unenforceable portion will be changed to the minimum extent necessary to make it enforceable, unless that change is not permitted by law, in which case the portion will be disregarded. If any portion of the Contract is changed or disregarded because it is unenforceable, the rest of the Contract is still enforceable.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>6. Signatures.</b> Once the Customer and the Developer agree to terms on the VenturePact platform, start the project, this document will be considered signed.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>7. Governing Law.</b> The laws of the state of Pennsylvania govern the rights and obligations of the Customer and the Developer under this Contract, without regard to conflict of law principles of that state.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>8. Entire Contract.</b> This Contract represents the parties’ final and complete understanding of this job and the subject matter discussed in this Contract. This Contract supersedes all other contracts (both written and oral) between the parties.</p>
	<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>9. VenturePact Liability.</b> The Customer and Developer agree to not hold VenturePact liable or accountable for any issues that may arise as a result of Customer;s or Developer’s lack of satisfactory services or non-compliance to any obligation put forward in this contract including any payment or software issues that may result.</p>
	

	<div ctyle="float:left">
		<p style=" float:left; text-align:left; font-size:20px;padding: 10px; margin-top:20px; font-weight:bold; width:100%;  " >12. DIRECTIVES.</p>
		<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px;line-height:20px; margin-top:5px;  " ><b>1.</b> In order for the project to be successful, there are certain directive that ought to be followed. Both the parties agree to abide by these directives as much as possible.</p>
		<p style=" float:left; font-size:14px;  margin-left:70px; line-height:22px; margin-top:5px;  " >
		<b>a.</b> The Developer and the Customer will communicate ideally every working day but at the least, every 2 days at a predetermined mutually convenient time. The communication will take place using a clear video call system.
		<br>
		<b>b.</b> The Developer and the Customer will be available and will answer any questions within 24 hours, so as to not delay the timelines.
		</p>
		<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " >THE PARTIES HERE TO AGREE TO THE FOREGOING AS EVIDENCED BY THEIR SIGNATURES BELOW.</p>
		  <div style="float:left; width:100%; margin-bottom:50px;  margin-top:50px;">
		<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " ><?php echo $proposal->suppliersProjects->suppliers->users->first_name;?> <br />
		<?php echo $proposal->suppliersProjects->suppliers->users->company_name;?><br />
		 <?php echo $proposal->suppliersProjects->suppliers->users->company_name;?></p>
		  </div>
		  <div style="float:left; width:100%;">
		<p style=" float:left; font-size:14px;  margin-left:30px; margin-top:20px; line-height:20px; margin-top:5px;  " ><?php echo $proposal->suppliersProjects->clientProjects->clientProfiles->users->first_name;?><br />
		 <?php echo $proposal->suppliersProjects->clientProjects->clientProfiles->users->company_name;?><br />
		  <?php echo $proposal->suppliersProjects->clientProjects->clientProfiles->users->company_name;?></p>
		</div>
	</div>
	</body>
</html>