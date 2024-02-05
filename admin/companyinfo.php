<br/>
<div id="email">
	<span class="left">Email</span><span class="right"><?php echo $company->get_email($company_id); ?></span>
</div>
<div id="contact">
	<span class="left">Contact Number</span><span class="right"><?php echo $company->get_phone($company_id); ?></span>
</div>
<div id="contact">
	<span class="left">Employer's Name</span><span class="right"><?php echo $user->get_full_name($company_id); ?></span>
</div>
<div id="contact">
	<span class="left">Links</span><span class="right"><div id="links"><?php foreach($company_link->get_links($company_id) as $links){echo $links['company_link']." ";} ?></div></span>
</div>