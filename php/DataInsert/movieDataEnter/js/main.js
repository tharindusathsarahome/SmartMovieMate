
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    
})(jQuery);








// ADD DATA




$(document).on("keyup",".chip.chip-checkbox, .chip.toggle, .chip.clickable",function (e) {if (e.which == 13 || e.which == 32) this.click();});
$(document).on("click", ".chip button", function (e) {e.stopPropagation();});
$(document).on("click", ".chip.chip-checkbox", function () {
    let $this = $(this);
    let $option = $this.find("input");
    if ($option.is(":radio")) {
    let $others = $("input[name=" + $option.attr("name") + "]").not($option);
    $others.prop("checked", false);
    $others.change();
    }
    $option.prop("checked", !$this.hasClass("active"));
    $option.change();
});
$(document).on("click", ".chip.toggle", function () {$(this).toggleClass("active");});
$(document).on("change", ".chip.chip-checkbox input", function () {
    let $chip = $(this).parent(".chip");
    $chip.toggleClass("active", this.checked);
    $chip.attr("aria-checked", this.checked ? "true" : "false");
});

$("#addFilterTxt").keyup(function() { 
    var typetext = $(this).val();
    if (typetext!=" ") {
        $.ajax({
            type: "POST",
            url: "php/searchData.php",
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
        url: "php/searchData.php",
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
            <button title="Remove chip" aria-label="Remove chip" type = "button" onclick = "
                $(this).parent().remove();
                let value2 = parseInt(document.getElementById('numberI').value, 10);
                value2 = isNaN(value2) ? 0 : value2;
                value2++;
                document.getElementById('numberI').value = value2;
                document.getElementById('numberI').innerHTML = 'Film List : ' + (value2+10) + ' Remaining...';
            ">
                <p class="material-icons">x</p>
            </button>
        </div>`).appendTo("#filterChipsContainer");
        }
    });



 