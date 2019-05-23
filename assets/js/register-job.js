function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload").change(function() {
    readURL(this);
});
$("#uploadCV").change(function() {
    if (this.files && this.files[0]) {
        $('#showcv').text(this.files[0].name);
    }
});
$('#UserName').on("blur focus keyup", function() {
    if ($('#UserName').val().length <= 2) {
        $("#alertusername").css("display", 'block');
    } else {
        $("#alertusername").css("display", 'none');
    }

});
$('#UserNamep').on("blur focus keyup", function() {
    if ($('#UserNamep').val().length <= 2) {
        $("#alertusernamep").css("display", 'block');
    } else {
        $("#alertusernamep").css("display", 'none');
    }

});
$('#career').change(function() {
    if ($('#career').val() == "") {
        $("#alertcareer").css("display", 'block');
    } else {
        $("#alertcareer").css("display", 'none');
    }


})
$('#email').on("blur focus keyup", function() {
    if ($('#email').val() == "") {
        $("#alertemail").css("display", 'block');
    } else {
        $("#alertemail").css("display", 'none');
    }

});
$('#emailp').on("blur focus keyup", function() {
    if ($('#emailp').val() == "") {
        $("#alertemailp").css("display", 'block');
    } else {
        $("#alertemailp").css("display", 'none');
    }

});
$("#password ").on("blur focus keyup", function() {
    if ($("#password").val() == "") {
        $("#alertpass").css("display", 'block');
    } else {
        $("#alertpass").css("display", 'none');
    }
    if ($("#confirmpwd").val() !== $("#password").val()) {
        $("#alertconfirmpass").css("display", 'block');
    } else {
        $("#alertconfirmpass").css("display", 'none');
    }
})
$("#passwordp ").on("blur focus keyup", function() {
    if ($("#passwordp").val() == "") {
        $("#alertpassp").css("display", 'block');
    } else {
        $("#alertpassp").css("display", 'none');
    }
    if ($("#confirmpwdp").val() !== $("#passwordp").val()) {
        $("#alertconfirmpassp").css("display", 'block');
    } else {
        $("#alertconfirmpassp").css("display", 'none');
    }
})
$("#confirmpwd ").on("blur focus keyup", function() {
    if ($("#confirmpwd").val() !== $("#password").val()) {
        $("#alertconfirmpass").css("display", 'block');
    } else {
        $("#alertconfirmpass").css("display", 'none');
    }
})
$("#confirmpwdp ").on("blur focus keyup", function() {
    if ($("#confirmpwdp").val() !== $("#passwordp").val()) {
        $("#alertconfirmpassp").css("display", 'block');
    } else {
        $("#alertconfirmpassp").css("display", 'none');
    }
})
$("#confirmpwd ").on("blur focus keyup", function() {
    $("#alertconfirmpassvalid").css("display", 'none');
})
$("#confirmpwdp ").on("blur focus keyup", function() {
    $("#alertconfirmpassvalidp").css("display", 'none');
})
$('#sign_out').click(function() {
    $('#log_out').css("display", 'none');
})