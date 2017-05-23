
//functions and variables for the functionality of the Clock
let startTime = 0
let start = 0
let end = 0
let diff = 0
let timerID = 0
function chrono(){
	//creating hours , minutes and seconds for the clock
	end = new Date()
	diff = end - start
	diff = new Date(diff)
	let msec = diff.getMilliseconds()
	let sec = diff.getSeconds()
	let min = diff.getMinutes()
	let hr = diff.getHours()-1
	if (min < 10){
		min = "0" + min
	}
	if (sec < 10){
		sec = "0" + sec
	}
	if(msec < 10){
		msec = "00" +msec
	}
	else if(msec < 100){
		msec = "0" +msec
	}
	//setting clock Format
	document.getElementById("chronotime").innerHTML = hr + ":" + min + ":" + sec + ":" + msec
	timerID = setTimeout("chrono()", 10)
}

// function continue clock
function chronoContinue(){
	document.chronoForm.startstop.value = "stop!"
	document.chronoForm.startstop.onclick = chronoStop
	document.chronoForm.reset.onclick = chronoReset
	start = new Date()-diff
	start = new Date(start)
	chrono()
	}
// function to start the clock
function chronoStart(){
	let inputField = document.chronoForm.task.value

	if ( inputField.length !== 0){
		alert("GO!");
		document.chronoForm.reset.onclick = chronoReset
		document.chronoForm.timer.value = document.getElementById("chronotime").innerHTML
		start = new Date()
		chrono()
		$(document).ready(function(){
            let taskValue = $("input[name*='task']").val()

			// Get assigmen and time init

            $.ajax({ 
            method: "post",
            url: "./sql/time.php",
            data: { task: taskValue },
			async: false
        })
			.done(function(data){
				console.log(data)
				$("input[name*='taskHidden']").val(data)
			})

        	$("input[name*='task']").val("")
		})
	} else {
		return alert("You must Insert a Task First!")
	}	
}

// Refresh data from database every two seconds
$(document).ready(function(){
setInterval( function(){
	$("#taskDone").load("./sql/getTotal.php")
}, 2000 )
})
//function to reset time
function chronoReset(){
	document.getElementById("chronotime").innerHTML = "0:00:00:000"
	start = new Date()
}
function chronoStopReset(){
	document.getElementById("chronotime").innerHTML = "0:00:00:000"
	document.chronoForm.startstop.onclick = chronoStart
}
 // function to stop the clock
function chronoStop(){
	document.chronoForm.reset.onclick = chronoStopReset
	document.chronoForm.timer.value = document.getElementById("chronotime").innerHTML
	clearTimeout(timerID)

	$(document).ready(function() {
		let lastTaskValue = $("input[name*='taskHidden']").val()
		alert('Task Ready!')

		// send the assigment for second time
        $.ajax({ 
            method: "post",
            url: "./sql/task.php",
            data: { saveTask: lastTaskValue  },
			async: false
        })
		.done(function(data){
			console.log(' DONE SECOND CALL')
		})
        $("#chronotime").text("0:00:00:00")
		})
	}
