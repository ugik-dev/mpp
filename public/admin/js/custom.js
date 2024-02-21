function decoderValue(string) {
    if (string == undefined || string == null || string == "") {
        return;
    }
    return string.replace(/&#(\d+);/g, function (match, dec) {
        return String.fromCharCode(dec);
    });
}

function validateForm(validationRules, activeBtn) {
    var isValid = true;
    // Iterate over validation rules for each input field
    $.each(validationRules, function (fieldName, rules) {
        var $field = $("#" + fieldName);
        $.each(rules, function (ruleName, ruleValue) {
            switch (ruleName) {
                case "required":
                    if (ruleValue && $field.val() === "") {
                        // Hanya cek required jika aturannya true
                        $field.addClass("is-invalid");
                        isValid = false;
                    } else {
                        $field.removeClass("is-invalid");
                    }
                    break;
                case "pattern":
                    if (!$field.val().match(ruleValue)) {
                        $field.addClass("is-invalid");
                        isValid = false;
                    } else {
                        $field.removeClass("is-invalid");
                    }
                    break;
                case "minlength":
                    if ($field.val().length < ruleValue) {
                        $field.addClass("is-invalid");
                        isValid = false;
                    } else {
                        $field.removeClass("is-invalid");
                    }
                    break;
                case "digits":
                    if (!/^\d+$/.test($field.val())) {
                        $field.addClass("is-invalid");
                        isValid = false;
                    } else {
                        $field.removeClass("is-invalid");
                    }
                    break;
                case "email":
                    if (!isValidEmail($field.val())) {
                        $field.addClass("is-invalid");
                        isValid = false;
                    } else {
                        $field.removeClass("is-invalid");
                    }
                    break;
            }
        });
    });

    if (isValid) {
        activeBtn.prop("disabled", false); // Enable submit button
    } else {
        activeBtn.prop("disabled", true); // Disable submit button
    }

    return isValid;
}
function validateField($field, validationRules) {
    var fieldName = $field.attr("name");
    var fieldValue = $field.val();
    var rules = validationRules[fieldName] || {};

    $.each(rules, function (ruleName, ruleValue) {
        switch (ruleName) {
            case "required":
                if ($field.val() === "") {
                    $field.addClass("is-invalid");
                    isValid = false;
                } else {
                    $field.removeClass("is-invalid");
                }
                break;
            case "pattern":
                if (!$field.val().match(ruleValue)) {
                    $field.addClass("is-invalid");
                    isValid = false;
                } else {
                    $field.removeClass("is-invalid");
                }
                break;
            case "minlength":
                if ($field.val().length < ruleValue) {
                    $field.addClass("is-invalid");
                    isValid = false;
                } else {
                    $field.removeClass("is-invalid");
                }
                break;
            case "digits":
                if (!/^\d+$/.test($field.val())) {
                    $field.addClass("is-invalid");
                    isValid = false;
                } else {
                    $field.removeClass("is-invalid");
                }
                break;
            case "email":
                if (!isValidEmail($field.val())) {
                    $field.addClass("is-invalid");
                    isValid = false;
                } else {
                    $field.removeClass("is-invalid");
                }
                break;
        }
    });
}

// Fungsi untuk mendapatkan aturan validasi untuk field tertentu
function getValidationRules(fieldName) {}
// Helper function to validate email format
function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

/* Fungsi formatRupiah untuk form surat */
function formatRupiah(angka, prefix, nol_sen = true) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah =
        split[1] != undefined
            ? rupiah + (nol_sen ? "" : "," + split[1])
            : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function scrollTampil(elem) {
    elem.scrollIntoView({ behavior: "smooth" });
}

function checkAll(id = "#checkall") {
    $("table").on("click", id, function () {
        if ($(this).is(":checked")) {
            $(".table input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
        } else {
            $(".table input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
        $(".table input[type=checkbox]").change();
        enableHapusTerpilih();
    });
    $("[data-toggle=tooltip]").tooltip();
}

function enableHapusTerpilih() {
    // cek jika ada tombol hapus ter disable.
    var disable = $("input[name='id_cb[]']:checked:not(:disabled)").filter(
        function (index) {
            return $(this).data("deletable") == 0;
        }
    );

    if ($("input[name='id_cb[]']:checked:not(:disabled)").length <= 0) {
        // cek disable hapus
        $(".aksi-terpilih").addClass("disabled");
        $(".hapus-terpilih").addClass("disabled");
        $(".hapus-terpilih").attr("href", "#");
    } else {
        $(".aksi-terpilih").removeClass("disabled");
        $(".hapus-terpilih").removeClass("disabled");
        $(".hapus-terpilih").attr("href", "#confirm-delete");
        if (disable.length != 0) {
            $(".hapus-terpilih").addClass("disabled");
            $(".hapus-terpilih").attr("href", "#");
        }
    }
}

function deleteAllBox(idForm, action) {
    $("#confirm-delete").modal("show");
    $("#ok-delete").click(function () {
        $("#" + idForm).attr("action", action);
        addCsrfField($("#" + idForm)[0]);
        $("#" + idForm).submit();
    });
    return false;
}

function aksiBorongan(idForm, action) {
    $("#confirm-status").modal("show");
    $("#ok-status").click(function () {
        $("#" + idForm).attr("action", action);
        addCsrfField($("#" + idForm)[0]);
        $("#" + idForm).submit();
    });
    return false;
}

function cetakBox() {
    $("#cetakBox").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        var title = link.data("title");
        var aksi = link.data("aksi");
        var form_action = link.data("href");
        var modal = $(this);
        modal.find(".title").text(title);
        modal.find(".aksi").text(aksi);
        modal.find("form").attr("action", form_action);
        setTimeout(function () {
            // tambahkan csrf token
            addCsrfField(modal.find("form")[0]);
        }, 500);
    });
    return false;
}

function mapBox() {
    $("#mapBox").on("show.bs.modal", function (e) {
        var link = $(e.relatedTarget);
        $(".modal-header #myModalLabel").html(link.attr("data-title"));
        $(this).find(".fetched-data").load(link.attr("href"));
    });
}
function formAction(idForm, action, target = "") {
    csrf_semua_form();
    if (target != "") {
        $("#" + idForm).attr("target", target);
    }
    $("#" + idForm).attr("action", action);
    $("#" + idForm).submit();
}

//Delay Alert
setTimeout(function () {
    $("#notification").fadeIn("slow");
}, 500);
setTimeout(function () {
    $("#notification").fadeOut("slow");
}, 3000);

function notification(type, message) {
    if (type == "") {
        return;
    }
    $("#maincontent").prepend(
        "" +
            '<div id="notification" class="alert alert-' +
            type +
            ' alert-dismissible">' +
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
            message +
            "" +
            "</div>" +
            ""
    );
}

function cek_koneksi() {
    $("#maincontent").prepend(
        '<div class = "callout callout-warning">' +
            '<h4><i class="fa fa-warning"></i>&nbsp;&nbsp;Informasi</h4 >' +
            "<p> Aplikasi tidak dapat terhubung dengan koneksi internet, beberapa modul mungkin tidak berjalan dengan baik. </a></p>" +
            "</div>"
    );
}

function cari_nik() {
    $("#cari_nik").change(function () {
        $("#" + "main").submit();
    });

    $("#cari_nik_suami").change(function () {
        $("#" + "main").submit();
    });

    $("#cari_nik_istri").change(function () {
        $("#" + "main").submit();
    });
}

// Ganti pilihan RW dan RT di form penduduk
function select_options(select, params) {
    var url_data = select.attr("data-source") + params;
    select.find("option").not(".placeholder").remove().end();

    $.ajax({
        url: url_data,
    }).then(function (options) {
        JSON.parse(options).forEach((option) => {
            var option_elem = $("<option>");

            option_elem
                .val(option[select.attr("data-valueKey")])
                .text(option[select.attr("data-displayKey")]);

            select.append(option_elem);
        });
    });
}

$(function () {
    $("#op_item input:checked")
        .parent()
        .css({ background: "#c9cdff", border: "0.5px solid #7a82eb" });
    $("#op_item input").change(function () {
        if ($(this).is("input:checked")) {
            $("#op_item input").parent().css({ background: "#fafafa" });
            $("#op_item input:checked")
                .parent()
                .css({ background: "#c9cdff", border: "0.5px solid #7a82eb" });
            $(this).parent().css({ background: "#c9cdff" });
        } else {
            $(this).parent().css({ background: "#fafafa", border: "0px" });
        }
    });
    $("#op_item label").click(function () {
        $(this).prev().trigger("click");
    });
});

function _calculateAge(birthday) {
    // birthday is a date (dd-mm-yyyy)
    if (birthday) {
        var parts = birthday.split("-");
        // Ubah menjadi format ISO yyyy-mm-dd
        // please put attention to the month (parts[0]), Javascript counts months from 0:
        // January - 0, February - 1, etc
        // https://stackoverflow.com/questions/5619202/converting-string-to-date-in-js
        var birthdate = new Date(parts[2], parts[1] - 1, parts[0]);
        var ageDifMs = new Date().getTime() - birthdate.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }
}

// https://stackoverflow.com/questions/332872/encode-url-in-javascript
// Menyamakan dengan PHP urlencode supaya kurung '()' juga diencode
// Digunakan untuk mengirim nama dusun sebagai parameter url query
function urlencode(str) {
    str = (str + "").toString();

    // Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
    // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
    return encodeURIComponent(str)
        .replace(/!/g, "%21")
        .replace(/'/g, "%27")
        .replace(/\(/g, "%28")
        .replace(/\)/g, "%29")
        .replace(/\*/g, "%2A");
    // .replace(/%20/g, '+');
}

// https://stackoverflow.com/questions/26018756/bootstrap-button-drop-down-inside-responsive-table-not-visible-because-of-scroll
$("document").ready(function () {
    $(".table-responsive").on("show.bs.dropdown", function (e) {
        var table = $(this),
            menu = $(e.target).find(".dropdown-menu"),
            tableOffsetHeight = table.offset().top + table.height(),
            menuOffsetHeight =
                $(e.target).offset().top +
                $(e.target).outerHeight(true) +
                menu.outerHeight(true);

        if (menuOffsetHeight > tableOffsetHeight) {
            table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
            $(".table-responsive")[0].scrollIntoView(false);
        }
    });

    $(".table-responsive").on("hide.bs.dropdown", function () {
        $(this).css("padding-bottom", 0);
    });
});

// Notifikasi
function tampil_badge(elem, url) {
    elem.load(url);
    setTimeout(function () {
        if (elem.text().trim().length) elem.show();
        else elem.hide();
    }, 500);
}

function refresh_badge(elem, url) {
    if (!elem.length) return;

    tampil_badge(elem, url);
    var refreshInbox = setInterval(function () {
        tampil_badge(elem, url);
    }, 10000);
}

function huruf_awal_besar(str) {
    return str.replace(
        /\S+/g,
        (str) => str.charAt(0).toUpperCase() + str.substr(1).toLowerCase()
    );
}

// cek suport es6/es2015
var supportsES6 = (function () {
    try {
        new Function("(a = 0) => a");
        return true;
    } catch (err) {
        return false;
    }
})();

function ditolak(
    id,
    ajax_url,
    redirect,
    title = "Alasan Ditolak",
    text,
    placeHolders
) {
    Swal.fire({
        title: title,
        input: "textarea",
        inputPlaceholder: placeHolders,
        text: text,
        inputValidator: (value) => {
            if (!value) {
                return "Kolom keterangan tidak boleh kosong";
            }
        },
        customClass: {
            popup: "swal-lg",
            htmlContainer: "swal-left swal-bold",
        },
        showCancelButton: true,
        confirmButtonText: "Kirim",
        cancelButtonText: "Tutup",
        showLoaderOnConfirm: true,
        preConfirm: (alasan) => {
            const formData = new FormData();
            formData.append("sidcsrf", getCsrfToken());
            formData.append("id", id);
            formData.append("alasan", alasan);

            return fetch(ajax_url, {
                method: "POST",
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(response.statusText);
                    }
                    return response.json();
                })
                .catch((error) => {
                    console.log(error);
                    Swal.showValidationMessage(`Request failed: ${error}`);
                });
        },
    }).then((result) => {
        if (result.isConfirmed) {
            if (result.value.status == true) {
                swal2_success(redirect, "Berhasil dikembalikan");
            } else {
                Swal.fire({ icon: "error", title: result.value.message });
            }
        }
    });
}

function swal2_success(to, message = "Berhasil disimpan") {
    Swal.fire({
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 1500,
    }).then((result) => {
        window.location.replace(to);
    });
}

function swal2_question(url_ajax, redirect, message, data, tolak = false) {
    Swal.fire({
        title: message,
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d73925",
        confirmButtonText: "Ya",
        showDenyButton: tolak,
        denyButtonColor: "#ffc107",
        denyButtonText: `Tolak`,
        cancelButtonText: `Tutup`,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Sedang Memproses",
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            $.ajax({
                url: url_ajax.confirm,
                type: "Post",
                data: data,
            })
                .done(function () {
                    window.location.replace(redirect.confirm);
                })
                .fail(function (e) {
                    Swal.fire({
                        icon: "error",
                        text: e.statusText,
                    });
                });
        } else if (result.isDenied) {
            ditolak(data.id, url_ajax.denied, redirect.denied);
        }
    });
}

function parseJwt(token) {
    var base64Url = token.split(".")[1];
    var base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
    var jsonPayload = decodeURIComponent(
        window
            .atob(base64)
            .split("")
            .map(function (c) {
                return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
            })
            .join("")
    );

    return JSON.parse(jsonPayload);
}

function swalLoading() {
    Swal.fire({
        title: "Loading!",
        allowOutsideClick: false,
        customClass: {
            confirmButton: "btn btn-primary waves-effect waves-light d-none",
        },
        buttonsStyling: false,
    });
    Swal.showLoading();
}

function swalBerhasil(label = "Berhasil !!", btn = true, redirect = false) {
    btnclass = btn ? "" : "d-none";
    Swal.fire({
        title: label,
        icon: "success",
        showClass: {
            popup: "animate__animated animate__flipInX",
        },
        allowOutsideClick: false,
        customClass: {
            confirmButton: `btn btn-primary waves-effect waves-light ${btnclass}`,
        },
        buttonsStyling: false,
    }).then((result) => {
        if (redirect != false) window.location.href = redirect;
    });
}

function swalError(message = "", label = "Gagal !!", btn = true) {
    Swal.fire({
        title: label,
        icon: "error",
        text: message,
        showClass: {
            popup: "animate__animated animate__flipInX",
        },
        allowOutsideClick: true,
        customClass: {
            confirmButton: `btn btn-primary waves-effect waves-light`,
        },
        buttonsStyling: false,
    });
}
function SwalOpt(
    title = "Apakah anda yakin ?",
    text = "Data akan disimpan!",
    icon = "warning"
) {
    return {
        title: title,
        icon: icon,
        text: text,
        allowOutsideClick: false,

        showCancelButton: true,
        confirmButtonText: "Ya !!",
        showLoaderOnConfirm: true,
        customClass: {
            confirmButton: "btn btn-primary me-3 waves-effect waves-light",
            cancelButton: "btn btn-outline-danger waves-effect",
        },
    };
}
