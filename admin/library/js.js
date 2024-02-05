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


/*-------------------------------------------------------------NOTIFICATION---------------------------------------------*/

$('#conversationContainer').ready(function(e) {
  (function requestPoll(){
    $.ajax({ url: "misc/process.request.pending.php", success: function(data){
		$('#requestStat span').html(data[0].pending_request);
	}, complete: requestPoll, timeout: 60000 });
})();
});



/*----------------------------------------------PENDING REQUEST DROPDOWN------------------------------------*/
//Request
$('#listContainer').ready(function(e) {
	$.get('requests/student.request.pending.php',function(e){
			$('#requestList').html(e);
		})
});

$('#requestSelect').change(function(e) {
	if($('#requestSelect').val() == 'students') {
		$.get('requests/student.request.pending.php',function(e){
			$('#requestList').html(e);
		})
	}
	else {
		$.get('requests/employer.request.pending.php',function(e){
			$('#requestList').html(e);
		})
	}
});

//Block
$('#listContainer').ready(function(e) {
	$.get('block/student.block.php',function(e){
			$('#blockList').html(e);
		})
});
$('#blockSelect').change(function(e) {
	if($('#blockSelect').val() == 'students') {
		$.get('block/student.block.php',function(e){
			$('#blockList').html(e);
		});
	}
	else {
		$.get('block/employer.block.php',function(e){
			$('#blockList').html(e);
		});
	}
});

/*----------------------------------------------------REPORTS-------------------------------------------------------*/

$('#option').change(function(e) {
	var option = $('#option').val();
	if(option == 'year') {
		$('#queue').attr("type","text");
		$('#queue').val('');
	}
	else if(option == 'month') {
		$('#queue').attr("type","month");
	}
	else {
		$('#queue').attr("type","date");
	}
});

$('#queue').change(function(e) {

	var category = $('#category').val();
	var option = $('#option').val();
	var queue = $('#queue').val();
	
	if(category == 'employer' && option == 'month') {
		$.get('reports/monthly.employer.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'employer' && option == 'year') {
		//alert('Employer and year');
		$.get('reports/yearly.employer.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'employer' && option == 'day') {
		$.get('reports/daily.employer.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'record' && option == 'month') {
		alert('Record and month');
	}
	else if(category == 'record' && option == 'year') {
		alert('Record and Year');
	}
	else if(category == 'record' && option == 'day') {
	
	}
	else if(category == 'account' && option == 'month') {
		$.get('reports/monthly.account.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'account' && option  == 'year') {
		$.get('reports/yearly.account.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'account' && option == 'day') {
		$.get('reports/daily.account.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'industry' && option == 'month') {
		$.get('reports/monthly.industry.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'industry' && option == 'year') {
		$.get('reports/yearly.industry.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'industry' && option == 'day') {
		$.get('reports/daily.industry.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'job' && option == 'month') {
		$.get('reports/monthly.job.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'job' && option == 'year') {
		$.get('reports/yearly.job.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
	else if(category == 'job' && option == 'day') {
		$.get('reports/daily.job.php',{'date':$('#queue').val()},function(e) {
			$('#reportList').html(e);
		});
	}
});

/*-------------------------NOTIFS STATS AND MESSAGE FUNCTIONS----------------------*/

$('#headerNavigation').ready(function(e) {
  (function notificationPoll(){
    $.ajax({ url: "misc/notification.statistics.php", success: function(data){
		$('#notifStat').html(data[0].notification);
		$('#messageStat').html(data[0].message);
	}, complete: notificationPoll, timeout: 60000 });
})();
});

function clearMessage() {
	$.get('processes/process.message.clear.php',function(e) {});
}

/*----------------------APPROVE STUDENT ACHIEVER-----------------------------------------------*/

$('#checkbox').toggle(function(e) {
	
});



/*---------------------------APPROVED ACCOUTNTS-------------------------*/

$('#approveToggle').change(function(e) {
	if($('#approveToggle').val() == 'Student') {
		$.get('requests/student.approved.php',function(e) {
			$('#requestLists').html(e);
		});
	}
	else {
		$.get('requests/employer.approved.php',function(e) {
			$('#requestLists').html(e);
		});
	}
});