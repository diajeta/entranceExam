$('#display').click(function(){
	var adnum = $('#adnum').val();

    $.ajax({
        url: "display_edit.php",
        method: "POST",
        data: { adnum: adnum },
        dataType: "text",
        success: function (data) {
            $('#live_edit').html(data);

        }
    });
});

$(document).on('blur', '.select_name', function () {
    var serial = $(this).data("id1");
    var name = $(this).text();

    $.ajax({
        url: "edit/editName.php",
        method: "POST",
        data: { serial: serial, name: name },
        dataType: "text",
        success: function (data) {

            $('#display').trigger("click");
        }
    });
});

$(document).on('blur', '.select_examNo', function () {
    var serial = $(this).data("id2");
    var examNo = $(this).text();

    $.ajax({
        url: "edit/editExam_no.php",
        method: "POST",
        data: { serial: serial, examNo: examNo },
        dataType: "text",
        success: function (data) {

            $('#display').trigger("click");
            alert(data);
        }
    });
});

$(document).on('blur', '.select_add', function () {
    var serial = $(this).data("id3");
    var address = $(this).text();

    $.ajax({
        url: "edit/editAddr.php",
        method: "POST",
        data: { serial: serial, address: address },
        dataType: "text",
        success: function (data) {

            $('#display').trigger("click");
        }
    });
});

$(document).on('blur', '.select_class', function () {
    var serial = $(this).data("id4");
    var clas = $('#classes').val();

    $.ajax({
        url: "edit/editClass.php",
        method: "POST",
        data: { serial: serial, clas: clas },
        dataType: "text",
        success: function (data) {

            $('#display').trigger("click");
            alert(clas);
        }
    });
});

$(document).on('blur', '.select_gen', function () {
    var serial = $(this).data("id5");
    var gender = $('#gender').val();

    $.ajax({
        url: "edit/editGen.php",
        method: "POST",
        data: { serial: serial, gender: gender },
        dataType: "text",
        success: function (data) {

            $('#display').trigger("click");
            alert(clas);
        }
    });
});