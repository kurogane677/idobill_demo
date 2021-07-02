jQuery.datetimepicker.setLocale("id");
// Date start
$("#picker1").datetimepicker({
    timepicker: false,
    datepicker: true,
    weeks: true,
    format: "d-m-Y",
    // value: '2019-8-1',
    mask: true,
    lang: "id",
    i18n: {
        month: [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        dayOfWeek: [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        ]
    }
    // onShow: function(ct) {
    //     this.setOptions({
    //         maxDate: $("#picker2").val() ? $("#picker2").val() : false
    //     });
    // },
});
// Date End
$("#picker2").datetimepicker({
    timepicker: false,
    datepicker: true,
    weeks: true,
    format: "d-m-Y",
    // value: '2019-8-1',
    mask: true,
    lang: "id",
    i18n: {
        month: [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        dayOfWeek: [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        ]
    }
    // onShow: function(ct) {
    //     this.setOptions({
    //         minDate: $("#picker1").val() ? $("#picker1").val() : false
    //     });
    // },
});

$("#genInvoice_tglInvoice, #genInvoice_tglJthTempo, #picker1x").datetimepicker({
    timepicker: false,
    datepicker: true,
    weeks: true,
    format: "d-m-Y",
    // value: '2019-8-1',
    mask: true,
    lang: "id",
    i18n: {
        month: [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        dayOfWeek: [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        ]
    }
});
