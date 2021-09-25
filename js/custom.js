
function Ajax(jsonVar,isFound){	    
		$.ajax({
			type:"POST",
			url: "php/AddListsMovieSingle.php",
			data:{isfound:isFound, table:jsonVar.table, movieID:jsonVar.movieID},
			cache:false,
		});
}

function favourite(){
	var jsonf=JSON.parse(document.getElementById("favouriteJ").innerHTML);
	var isFound_f=jsonf.isFound;
	if(isFound_f){
		document.getElementById("add_to_favorite").className="add_to_favorite parent-btn";
		document.getElementById("add_to_rejected").className="add_to_rejected parent-btn";
		document.getElementById("favouriteJ").innerHTML= JSON.stringify({"isFound":false,"table":"1","movieID":jsonf.movieID});
	}else{
		document.getElementById("add_to_favorite").className="remove_favorite parent-btn";
		document.getElementById("add_to_rejected").className="to_rejected parent-btn";
		document.getElementById("favouriteJ").innerHTML= JSON.stringify({"isFound":true,"table":"1","movieID":jsonf.movieID});
	}
    Ajax(jsonf,isFound_f);
    return false; 
}

function rejected(){
	var jsonr=JSON.parse(document.getElementById("rejectedJ").innerHTML);
	var isFound_r=jsonr.isFound;
	if(isFound_r){
		document.getElementById("add_to_rejected").className="add_to_rejected parent-btn";
		document.getElementById("add_to_favorite").className="add_to_favorite parent-btn";
		document.getElementById("rejectedJ").innerHTML= JSON.stringify({"isFound":false,"table":"0","movieID":jsonr.movieID});
	}else{
		document.getElementById("add_to_rejected").className="remove_rejected parent-btn";
		document.getElementById("add_to_favorite").className="to_favorite parent-btn";
		document.getElementById("rejectedJ").innerHTML= JSON.stringify({"isFound":true,"table":"0","movieID":jsonr.movieID});
	}
    Ajax(jsonr,isFound_r);
    return false; 
}


function updatePW(){
	$('body').click(function (event) {
		if(!$(event.target).closest('#overlayMsg').length && !$(event.target).is('#overlayMsg')) {
			$('#overlayForMassage').removeClass('activeMsg');
			$('.container').removeClass('smaller');
		}     
	});

	var currentPassword = $('#old_password');
	var newPassword = $('#new_password');
	var confirmPassword = $('#con_newpassword');
	
	$.ajax({
		type: "POST",
		url: "php/ChangeDetails.php",
		data: {
			old_password: currentPassword.val(),
			new_password: newPassword.val(),
			con_newpassword: confirmPassword.val()
		},
		success: function(data){
			if(data=="1"){
				$('#overlayContent').attr('class', 'overlayMsg-ok');
				$('#overlayContent').text("Password Changed Successfully!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
				newPassword.val("");
				currentPassword.val("");
				confirmPassword.val("");
			}else if(data=="2"){
				$('#overlayContent').attr('class', 'overlayMsg-error');
				$('#overlayContent').text("Password could not be updated. Contact Your Administration!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}else if(data=="3"){
				$('#overlayContent').attr('class', 'overlayMsg-warning');
				$('#overlayContent').text("Passwords do not match!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
				newPassword.val("");
				confirmPassword.val("");
				newPassword.focus();
			}else if(data=="4"){
				$('#overlayContent').attr('class', 'overlayMsg-warning');
				$('#overlayContent').text("Currunt Password Is Wrong!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
				currentPassword.focus();
			}else{
				alert("Error");
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert(textStatus);
		}
	});
	return false;
}

function updateDP(event){
	$('body').click(function (event) {
		if(!$(event.target).closest('#overlayMsg').length && !$(event.target).is('#overlayMsg')) {
			$('#overlayForMassage').removeClass('activeMsg');
			$('.container').removeClass('smaller');
		}     
	});

	var name = document.getElementById("saveProfileImg").files[0].name;
	var form_data = new FormData();
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("saveProfileImg").files[0]);
	var f = document.getElementById("saveProfileImg").files[0];
	var fsize = f.size||f.fileSize;
	if(fsize > 2000000)
	{
		$('#overlayContent').attr('class', 'overlayMsg-warning');
		$('#overlayContent').text("Image size is too Big!");
		$('#overlayForMassage').addClass('activeMsg');
		$('.container').addClass('smaller');
	}
	else
	{
		form_data.append("fileToUpload", document.getElementById('saveProfileImg').files[0]);

		$.ajax({
			url: "php/ChangeDetails.php",
			type: 'POST',
			processData: false,
			contentType: false,
			dataType : 'json',
			data: form_data,
			cache: false,
			beforeSend : function()
			{
				$('#overlayContent').attr('class', 'overlayMsg-warning');
				$('#overlayContent').text("Image Uploading...");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			},
			success: function(data)
			{
				if(data == '5')
				{
					$('#overlayContent').attr('class', 'overlayMsg-ok');
					$('#overlayContent').text("Image Changed Successfully!");
					$('#overlayForMassage').addClass('activeMsg');
					$('.container').addClass('smaller');
					var image = document.getElementById('output');
					image.src = URL.createObjectURL(event.target.files[0]);				
				}
				else if(data == '7')
				{
					$('#overlayContent').attr('class', 'overlayMsg-error');
					$('#overlayContent').text("Invalid File!");
					$('#overlayForMassage').addClass('activeMsg');
					$('.container').addClass('smaller');
				}
				else if(data == '6')
				{
					$('#overlayContent').attr('class', 'overlayMsg-error');
					$('#overlayContent').text("Image Upload Error!");
					$('#overlayForMassage').addClass('activeMsg');
					$('.container').addClass('smaller');
				}
			},
			error: function(e) 
			{
				alert(e);
			}          
		});
	}
}

function updateTP(){
	$('body').click(function (event) {
		if(!$(event.target).closest('#overlayMsg').length && !$(event.target).is('#overlayMsg')) {
			$('#overlayForMassage').removeClass('activeMsg');
			$('.container').removeClass('smaller');
		}     
	});

	var newTPno = $('#updatetpno');
	
	$.ajax({
		type: "POST",
		url: "php/ChangeDetails.php",
		data: {
			newtp: newTPno.val(),
		},
		success: function(data){
			if(data=="8"){
				$('#overlayContent').attr('class', 'overlayMsg-ok');
				$('#overlayContent').text("Telephone Number Changed Successfully!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}else if(data=="9"){
				$('#overlayContent').attr('class', 'overlayMsg-error');
				$('#overlayContent').text("Invalid Telephone Number!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}else{
				alert(data)
				$('#overlayContent').attr('class', 'overlayMsg-error');
				$('#overlayContent').text("Telephone Number could not be updated. Contact Your Administration!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert(textStatus);
		}
	});
	newTPno.val("");
	return false;
}

function loadFile(event) {
	$('body').click(function (event) {
		if(!$(event.target).closest('#overlayMsg').length && !$(event.target).is('#overlayMsg')) {
			$('#overlayForMassage').removeClass('activeMsg');
			$('.container').removeClass('smaller');
		}     
	});
	var f = document.getElementById("file").files[0];
	var fsize = f.size||f.fileSize;
	var ext = $('#file').val().split('.').pop().toLowerCase();
	if(fsize > 1000000)
	{
		$('#overlayContent').attr('class', 'overlayMsg-warning');
		$('#overlayContent').text("Image size is too Big!");
		$('#overlayForMassage').addClass('activeMsg');
		$('.container').addClass('smaller');
	}
	else if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
		$('#overlayContent').attr('class', 'overlayMsg-error');
		$('#overlayContent').text("Invalid Profile Picture!");
		$('#overlayForMassage').addClass('activeMsg');
		$('.container').addClass('smaller');
	}else{
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	}
}

function register(event){
	$('body').click(function (event) {
		if(!$(event.target).closest('#overlayMsg').length && !$(event.target).is('#overlayMsg')) {
			$('#overlayForMassage').removeClass('activeMsg');
			$('.container').removeClass('smaller');
		}     
	});
	event.preventDefault();
	// form_data.append("fileToUpload", document.getElementById('saveProfileImg').files[0]);
    var formElement = document.getElementById("registerForm");
	var form_data = new FormData(formElement);
	$.ajax({
		url: "php/Register.php",
		type: 'POST',
		data: form_data,
		contentType: false,
		cache: false,
		processData:false,
		beforeSend : function()
		{
			$('#overlayContent').attr('class', 'overlayMsg-warning');
			$('#overlayContent').text("Creating Account...");
			$('#overlayForMassage').addClass('activeMsg');
			$('.container').addClass('smaller');
		},
		success: function(data)
		{
			if(data.search("tpno")>0)
			{
				$('#overlayContent').attr('class', 'overlayMsg-error');
				$('#overlayContent').text("Invalid Telephone Number!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');			
			}
			else if(data.search("email")>0)
			{
				$('#overlayContent').attr('class', 'overlayMsg-error');
				$('#overlayContent').text("Invalid Email Address!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}
			else if(data.search("pwlength")>0)
			{
				$('#overlayContent').attr('class', 'overlayMsg-warning');
				$('#overlayContent').text("Password Must contain at least 8 or more characters!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}
			else if(data.search("pwstrength")>0)
			{
				$('#overlayContent').attr('class', 'overlayMsg-warning');
				$('#overlayContent').text("Password Must contain at least one number!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}
			else if(data.search("ok")>0)
			{
				$('#overlayContent').attr('class', 'overlayMsg-ok');
				$('#overlayContent').text("Registration Completed!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
				location.replace('index.php?signup=first');
			}
			else
			{
				$('#overlayContent').attr('class', 'overlayMsg-error');
				$('#overlayContent').text("Cannot create a New account. Contact Your Administration!");
				$('#overlayForMassage').addClass('activeMsg');
				$('.container').addClass('smaller');
			}
		},
		error: function(e) 
		{
			alert(e);
		}          
	});
	return false;
}


$("#addFilterTxt").keyup(function() { 
    var typetext = $(this).val();
    if (typetext!=" ") {
        $.ajax({
            type: "POST",
            url: "imdbphp/searchData.php",
            data:{movieName:typetext},
            success: function (data) {
                var dataarray=[];
                spiltTxt=data.split("<br>");
                // console.log(spiltTxt)
                spiltTxt.forEach(spiltdata);
                function spiltdata(item, index) {
                    dataarray.push(item);
                }
                $('#show-list').html(dataarray);
                   
            
            }
        });
    } else {
        $('#show-list').html("");
    }
    $(Document).on('click','a',function() {
        $('#addFilterTxt').val($(this).text());
        var saveData=$('#save').attr('name');
        $('#saveData').html(saveData);
        $('#show-list').html('');
        
    });
});

$("#addFilterBtn").click(function () {
    let $txt = $("#addFilterTxt");
    let filter = $txt.val();
    var id = document.getElementById('saveData');
    id=id.textContent;

    $.ajax({
        type: "POST",
        url: "imdbphp/searchData.php",
        data:{nameTag:filter,imdb_id:id},
        success: function (data) {
             $("#res").html(data);
        }
    });

    let value = parseInt(document.getElementById('numberI').value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    document.getElementById('numberI').value = value;
    $txt.val("");
    if((value+10) >= 0){
        document.getElementById('numberI').innerHTML = "Film List : " + (value+10) + " Remaining...";
        $(`<div class = "chip" tabindex = "-1">
            <span id="selectData">
                ${filter}
            </span>
            <button type="button" onclick = "
                $(this).parent().remove();
                let value2 = parseInt(document.getElementById('numberI').value, 10);
                value2 = isNaN(value2) ? 0 : value2;
                value2++;
                document.getElementById('numberI').value = value2;
                document.getElementById('numberI').innerHTML = 'Film List : ' + (value2+10) + ' Remaining...';
            ">
                <met class="material-icons">x</met>
            </button>
        </div>`).appendTo("#filterChipsContainer");
	}
});

function selectedPage(){
	return  parseInt(document.getElementById("pageSelect").innerHTML);
}

function selectedpage(condition){
	var selected=1;
	switch(condition) {
		case "2":
			selected=selectedPage()+1;
		   break;
		case "3":
			selected=selectedPage()-1;
		   break;
		default:
	  }
	var stable= document.getElementById("stable_R").innerHTML;
	var elmnt = document.getElementById("TOP_BAR");
	elmnt.scrollIntoView({behavior: 'smooth'});
	$("#base_movie").load(
		"php/filterData.php",
		{selected_page:selected,clickedBtn:selectFilter(false),table:stable}
	);
	
}

function removeFromSelected(movie_ID,table){
	document.getElementById(((table=="1")?"RFF_":"RFR_")+movie_ID).className="remove_from_selected movie-item-style-1"; 
	var innerHtml=document.getElementById("top_bar_numMovies");
	setTimeout(function(){
		$("#base_movie").load(
			"php/filterData.php",
			{ clickedBtn:selectFilter(false),isfound:true, table:table, movieID:movie_ID,selected_page:selectedPage()}
			);
		},500);
	
	innerHtml.innerHTML=parseInt(innerHtml.innerHTML)-1;
	return false; 
}
      

$("#base_movie").ready(function() {
	 selectFilter(true);
	// selectedpage("default");
	ajax("Date Added");
	 });

function selectFilter(con){
	var selected=document.getElementById("selectFilter");
	selected=selected.options[selected.selectedIndex].text;
	if(con){
        ajax(selected);
	}else{
         return selected;
	}
}

function ajax(btn) {
	var stable= document.getElementById("stable_R").innerHTML;
	$("#base_movie").load(
	"php/filterData.php",
	{clickedBtn:btn,selected_page:1,table:stable}
 );
}


$(".movie-item >a, .movie-item >.title-in> h6 > a , .movie-item>.mv-img >a, .movie-item >.title-in >h6 >a").click(function(){
    var movieid= $(this).attr("href").replace("moviesingle.php?M_ID=","");
	countConnection(movieid,"TB_1");
});

$("#btn-trailer > a").click(function(){
	var movie_ID=JSON.parse(document.getElementById("favouriteJ").innerHTML).movieID;
	countConnection(movie_ID,"TB_2");
});
$("#btn-subtitle > a").click(function(){
	var movie_ID=JSON.parse(document.getElementById("favouriteJ").innerHTML).movieID;
	countConnection(movie_ID,"TB_3");
});
$("#btn-download > a").click(function(){
	var movie_ID=JSON.parse(document.getElementById("favouriteJ").innerHTML).movieID;
	countConnection(movie_ID,"TB_4");
});


function countConnection(movieid,Table){
	$.ajax({
		type: "POST",
		url: "php/CountConnection.php",
		data:{movieID:movieid ,table:Table},
		success: function (data) {
		if(data!=""){
			alert(data);
		 }
	   }
	});
}

