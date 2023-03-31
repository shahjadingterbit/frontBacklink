KTUtil.onDOMContentLoaded(function () {
    $("#kt_heading_table").DataTable();
    $(".menu-link").removeClass("active");
    $(".mainGroup").addClass("active");
    $(".staticGroup").addClass("active");
    $(".subGroup").each(function () {
        if ($(this).attr("href") == window.location.href) {
            $(this).addClass("active");
            return;
        }
    });
});
