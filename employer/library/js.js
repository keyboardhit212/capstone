$('#toggle').mouseover(function(e){
	$('#headerNavigation').css("display","block");
});
$('#headerNavigation').mouseover(function(e) {
	$('#headerNavigation').css("display","block");
});
$('#headerNavigation').mouseout(function(e){
	$('#headerNavigation').toggle();
});
/*---------------------------------------------------------------------SEARCH SECTION----------------------------------------------*/

function saveJob(job_id, student_id) {
	$.post('processes/process.student.job.save.php',{'job_id':job_id,'student_id':student_id},function(data) {
		alert("Saved Successfully");
	});
}

function applyJob(job_id,student_id) {
	$.post('processes/process.student.job.apply.php',{'job_id':job_id,'student_id':student_id},function(data) {
		alert("Applied Successfully");
	});
}

/*---------------------------------------------------------------MESSAGE SECTION--------------------------------------------------*/

function message(from,to) {
	$.post('processes/process.company.message.php',{'to':to,'from':from,'message':$('#textarea').val()});
	alert('Message Sent Successfully!');
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


function sendMessage(to,from) {
	$.post('processes/process.company.message.php',{'to':to,'from':from,'message':$('#textarea').val()});
	$('#textarea').val('');
	alert('Message Sent Successfully');
}

/*--------------------------------------------------------NOTIFICATION STUFF-----------------------------------*/

function hire(to,from) {

}

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
	
/*----------------------------------------DROPDOWN JOB---------------------------------------------------------------------*/

$('#industry').change(function(e) {
	$.post('misc/dropdown.job.php',{'id':$('#industry').val()},function(data) {
		$('#profession').html(data);
	});
});

/*---------------------------------------------EMPLOYER NOTIFICATION TOGGLE----------------*/

$('#employerNotificationToggle').change(function(e) {
	if($('#employerNotificationToggle').val() == 'Important') {
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

