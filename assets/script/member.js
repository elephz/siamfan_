$(document).ready(function () {
    run();
    upviewcount();
});
function run() {
    $("body").on("click", "#btn-login", function (e) {
        window.location.assign('login');
    });
    $("body").on("click", ".logout", function (e) {
        e.preventDefault();
        console.log("ddd");
        swal({
            title: "ต้องการออกจากระบบ?",
            text: "",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        },
            function () {
                setTimeout(function () {
                    window.location.href = 'logout.php';
                }, 500);
            }
        );
    });

    $("body").on("click", ".report", function (e) {
        e.preventDefault();
        if (currentjs_id == null) {
            swal("", "เฉพาะสมาชิกเท่านั้น", "error");
            return
        }
        $('#report').modal('show');
    });
    $("body").on("click", ".bullhorn", function (e) {
        currentjs_id
        console.log(currentjs_id);

        if (currentjs_id == null) {
            swal("", "เฉพาะสมาชิกเท่านั้น", "error");
            return
        }
        data = { currentjs_id, member_id, action: "vote-user" }
        $.ajax({
            type: "POST",
            url: "api/api.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) {
                console.log(result);
                if (result.status) {
                    swal("บันทึกสำเร็จ", "", "success");
                }
                else if (result.status == false && result.respond == "todayvoted") {
                    swal("", "1 สมาชิก/1 โหวต/1 คน/วัน เท่านั้น!", "error");
                    console.log("erroerr");
                }
            }
        });
    });
    $("body").on("click", ".btn-save-rerpot", function (e) {
        currentjs_id
        let reson = $('input[name="reson"]:checked').val();
        let more = $('#more').val();
        let reportedid = $(this).attr("repotedid");
        data = { currentjs_id, reson, more, reportedid, action: "report-user" }
        $.ajax({
            type: "POST",
            url: "api/api.php",
            data: data,
            dataType: 'json',
            cache: false,
            success: function (result) {
                if (result.status) {
                    swal("บันทึกสำเร็จ", "", "success");
                    setTimeout(function () {
                        $("#report").modal('hide');
                        $("#more").val('');
                    }, 500);
                }
            }
        });
    });
}

function upviewcount() {
    data = { member_id, action: "upviewcount" }
    $.ajax({
        type: "POST",
        url: "api/api.php",
        data: data,
        dataType: 'json',
        cache: false,
        success: function (result) {
            if (result.status) {
                console.log("true");
            }
        }
    });
}