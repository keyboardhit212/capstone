/*-----------------------------------------------ABOUT-----------------------------*/
$('#editPhoto').click(function(e) {
	$('#uploadButton').click();
	e.preventDefault();
});

$('#editVideo').click(function(e) {
	$('#uploadButton').click();
	e.preventDefault();
});

$('#addExperienceField').click(function(e) {
	var text =  "<br/><br/><span>From : </span><select name='year1[]' id='year'><option></option></select><span>To : </span>" + 
					"<select name='year2[]' id='year'><option></option></select><br/><br/>" +
					"<input type='text' name='company[]' placeholder='Company Name' id='company'/><br/><br/>" +
					"<input type='text' name='position[]' placeholder='Position' id='position'/><br/><br/>" +
					"<textarea name='description[]' id='descriptionField' placeholder='Description'></textarea><br/><br/>";
	$('#experienceContainer').append(text);
	e.preventDefault();
});

$('#addCertificate').click(function(e) {
	/*var text = 
	"<form action='processes/process.student.add.credential.php' method='POST' enctype='multipart/form-data'><input type='text' name='title' placeholder='Title'/><br/><input type='file' name='file'/><br/><input type='submit'/></form>";
	$('#formContainer').append(text);*/
	$('#formContainer').toggle();
	e.preventDefault();
	
});

$('#addLink').click(function(e) {
	//var text = 
	//"<form action='processes/process.student.add.reference.php' method='POST' enctype='multipart/form-data'><input type='text' name='fname' placeholder='First Name'/><br/><input type='text' name='mname' placeholder='Middle Name'/><br/><input type='text' name='lname' placeholder='Last Name'/><br/><input type='text' name='company' placeholder='Company'/><br/><input type='text' name='contact' placeholder='Contact #'/><br/><input type='email' name='email' placeholder='Email'/><br/><input type='text' name='link' placeholder='Link'/><br/><input type='file' name='pic' /><br/><br/><input type='submit' /></form>";
	$('#addFormContainer').toggle();
	e.preventDefault();
});

/*---------------------------------------------------HEADER NAVIGATION-----------------------------*/
$('#toggle').mouseover(function(e){
	$('#headerNavigation').css("display","block");
});
$('#headerNavigation').mouseover(function(e) {
	$('#headerNavigation').css("display","block");
});
$('#headerNavigation').mouseout(function(e){
	$('#headerNavigation').toggle();
});
/*-----------------------------------------------------HEADER NAVIGATION END---------------------------*/


/*-----------------------------------------------NOTIF STATS AND MESSAGE FUNCTIONS--------------------------*/

$('#headerNavigation').ready(function(e) {
  (function notificationPoll(){
    $.ajax({ url: "misc/notification.statistics.php", success: function(data){
		$('#notifStat').html(data[0].notification);
		$('#messageStat').html(data[0].message);
	}, complete: notificationPoll, timeout: 60000 });
})();
});

function clearNotif() {
	$.get('processes/process.notification.clear.php',function(e) {});
}

function clearMessage() {
	$.get('processes/process.message.clear.php',function(e) {});
}

/*---------------------------------------------------------------------SEARCH SECTION----------------------------------------------*/

function saveJob(job_id, student_id) {
	$.post('processes/process.student.job.save.php',{'job_id':job_id,'student_id':student_id},function(data) {
		alert("Saved Successfully");
	});
}

function applyJob(job_id,student_id,company_id) {
	$.post('processes/process.student.job.apply.php',{'job_id':job_id,'student_id':student_id,'company_id':company_id},function(data) {
		alert("Applied Successfully");
	});
}

/*---------------------------------------------------------------MESSAGE SECTION--------------------------------------------------*/

function message(from,to) {
	$.post('processes/process.company.message.php',{'to':to,'from':from,'message':$('#textarea').val()});
	alert('Message Sent Successfully1');
	$('#textarea').val('');
}

$('#conversationContainer').ready(function(e) {
  (function conversationPoll(){
    $.ajax({ url: "conversation.php", success: function(data){
		$('#conversationContainer').html(data);
	}, complete: conversationPoll, timeout: 10000 });
})();
});

function send(to,from,e) {
	var KeyID = (window.event) ? event.keyCode : e.keyCode;
	if(KeyID == 13) {
		$.post('processes/process.company.message.php',{'to':to,'from':from,'message':$('#textarea').val()});
		$('#textarea').val('');
	}
}

$('#textarea').keypress(function(e) {
	$("#conversationContainer").animate({ scrollTop: $("#conversationContainer")[0].scrollHeight });
});


/*-----------------------------------------------------------------PASSING INFORMATIONAL IDS-----------------------------*/

$('#college').change(function(e) {
	var id = $('#college').val();
	$.post('misc/dropdown.course.php',{'id':id},function(data) {
		$('#course').html(data);
	});
});

$('#course').change(function(e) {
	var id = $('#course').val();
	$.post('misc/dropdown.specialization.php',{'id':id},function(data) {
		$('#specialization').html(data);
	});
});

$('#industries').change(function(e) {
	var id = $('#industries').val();
	$.post('misc/dropdown.job.php',{'id':id},function(data) {
		$('#professions').html(data);
	});
});

/*-----------------------------DROPDOWN NOTIFICATION-------------------------------*/

$('#studentNotificationToggle').change(function(e) {
	if($('#studentNotificationToggle').val() == 'Important') {
		$.get('misc/notification.priority.php',function(e) {
			$('#notificationContainer').html(e);
		});
	}
	else {
		$.get('misc/notification.all.php',function(e) {
			$('#notificationContainer').html(e);
		});
	}
});
