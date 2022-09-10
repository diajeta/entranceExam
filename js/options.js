$('#display_data').click(function () {
    var subject = $('#select_subject').val();

    $.ajax({
        url: "display.php",
        method: "POST",
        data: { subject: subject },
        dataType: "text",
        success: function (data) {
            $('#live_data').html(data);

        }
    });
});

function checknull(en) {
    if (en == '') {
        return 0;
    } else { return en; }

}

function check100(en) {
    if (en > 100) {
        alert('This score can not be more than 100.');
    } else if (en <= 100) {
        return en;
    } else {
        alert('Invalid data');
    }
}

function check50(en) {
    if (en > 50) {
        alert('This score can not be more than 50.');
    } else if (en <= 50) {
        return en;
    } else {
        alert('Invalid data');
    }
}

function check30(en) {
    if (en > 30) {
        alert('This score can not be more than 30.');
    } else if (en <= 30) {
        return en;
    } else {
        alert('Invalid data');
    }
}

function totalAverage(identity) {

    $.ajax({
        url: "totalAverage.php",
        method: "POST",
        data: { identity: identity },
        dataType: "json",
        success: function (msg, string, jqXHR) {
            $('#sum').html(msg.total);
            $('#avg').html(msg.average);
        }
    }).success(function () {
        var sum = $('#sum').html();
        var avg = $('#avg').html();
        $.ajax({
            url: "updateTotalAvg.php",
            method: "POST",
            data: { identity: identity, sum: sum, avg: avg },
            dataType: "text",
            success: function () {
            }
        });
    });
}

$(document).on('blur', '.exam', function () {
    var subject = $('#select_subject').val(); 
    var id = $(this).data("id1");
    var fTestE = $(this).text();

    if(subject == "ma" || "en" || "ps" || "gk"){
        var exam_value = check100(parseInt(checknull($(this).text())));
    }else if(subject == "qa" || "va"){
        var exam_value = check50(parseInt(checknull($(this).text())));
    }else{
        var exam_value = check30(parseInt(checknull($(this).text())));
    }

   // var grade3_value = checkGrade(totalF_value);

    $.ajax({
        url: "editE.php",
        method: "POST",
        data: { id: id, exam_value: exam_value, subject: subject },
        dataType: "text",
        success: function (data) {

            $('#display_data').trigger("click");
            totalAverage(id);
        }
    }).success(function () {
        if (fTestE == '') {
            $.ajax({
                url: "clear_input.php",
                method: "POST",
                data: { id: id, subject: subject },
                dataType: "text",
                success: function (data) {
                    $('#display_data').trigger("click");
                }
            });
        }

    });
});

