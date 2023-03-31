// Class definition
var KTFormRepeater = (function () {
    // Private functions
    var demo2 = function () {
        $("#kt_repeater_2").repeater({
            initEmpty: false,

            defaultValues: {
                "text-input": "",
            },

            show: function () {
                $(this).slideDown();
                $(this)
                    .find(".delete-group-button")
                    .append(
                        '<a href="javascript:;" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon"><i class="la la-close"></i></a>'
                    );
            },

            hide: function (deleteElement) {
                if (confirm("Are you sure you want to delete this element?")) {
                    $(this).slideUp(deleteElement);
                }
            },
        });
    };
    return {
        // public functions
        init: function () {
            demo2();
        },
    };
})();
// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormRepeater.init();
});
