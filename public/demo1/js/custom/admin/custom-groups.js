"use strict";

// Class definition
var customGroup = (function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation: https://formvalidation.io/
        validation = FormValidation.formValidation(form, {
            fields: {
                records: {
                    validators: {
                        notEmpty: {
                            message: "keyword name is required",
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: "",
                }),
            },
        });
    };

    var handleForm = function () {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            // Validate form
            validation.validate().then(function (status) {
                if (status === "Valid") {
                    
                    // Show loading indication
                    submitButton.setAttribute("data-kt-indicator", "on");

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Send ajax request
                    axios
                        .post(
                            submitButton.closest("form").getAttribute("action"),
                            new FormData(form)
                        )
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Thank you! it's done",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    window.location = APP_URL + "/domains/project_logs/show?domain_id="+$("#groupIDValue").val();
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey))
                                    continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: dataMessage,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute("data-kt-indicator");

                            // Enable button
                            submitButton.disabled = false;
                        });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                }
            });
        });
    };

    // Public methods
    return {
        init: function () {
            form = document.getElementById("kt_modal_new_group_form");
            submitButton = form.querySelector("#kt_modal_new_group_submit");
            initValidation();
            handleForm();
        },
    };
})();

var addupdatecustomGroup = (function () {
    // Private variables
    var form;
    var submitButton;
    var handleForm = function () {
        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            // Validate form
                    // Show loading indication
                    submitButton.setAttribute("data-kt-indicator", "on");
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;
                    // Send ajax request
                    axios
                        .post(
                            submitButton.closest("form").getAttribute("action"),
                            new FormData(form)
                        )
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Thank you! it's done",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    window.location = APP_URL + "/domains/project_logs/show?domain_id="+$("#groupIDValue").val();
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey))
                                    continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: dataMessage,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute("data-kt-indicator");

                            // Enable button
                            submitButton.disabled = false;
                        });
                
        });
    };

    // Public methods
    return {
        init: function () {
            form = document.getElementById("kt_modal_new_target_form");
            submitButton = form.querySelector("#kt_modal_group_value");
            handleForm();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    customGroup.init();
    addupdatecustomGroup.init();
});

$('.primaryKeywordList').on('click',function() {
    var domainID = $(this).attr('domainID');
    var groupID = $(this).attr('groupID');
    $("#projectLogId").val($("#project_log_id").val());
    $("#groupIDValue").val(groupID);
    $('.showAll').prop('checked', true);
    $('#usedAllGropupValue').attr('disabled','disabled');
    $('#usedAllGropupValue').prop('checked', true);
    $('#notUsedAllGropupValue').attr('disabled','disabled');
    $('#notUsedAllGropupValue').prop('checked', true);
    $.ajax({
        url: "getKeywordInformation",
        cache: false,
        data:{"domain_id":domainID,"group_id":groupID},
        success: function(response) {
            $("#keywordListing").html(response);
            if($(".listofGroupValue").hasClass('selectedGroupValue')) {
                $("#selectInputGroupValue").val($(".selectedGroupValue").attr('groupValueName'));
                $("#selectHiddenInputGroupValue").val($(".selectedGroupValue").attr('unique_row_num'));
                
            }
            $('#kt_modal_new_target').modal('show');
        }
    });
});

$('.filterButtonValue').on('click',function() {
    if($(this).hasClass('showAll')) {
        if($(this).is(':checked')) {
            $('.listofGroupValue').removeClass('hide');
                $('#usedAllGropupValue').attr('disabled','disabled');
                $('#usedAllGropupValue').prop('checked', true);
                $('#notUsedAllGropupValue').attr('disabled','disabled');
                $('#notUsedAllGropupValue').prop('checked', true);
        } else {
            $('.listofGroupValue').addClass('hide');
            $('.usedValueOfGroup').removeClass('hide');
            $('#notUsedAllGropupValue').prop('checked', false);
            $('#notUsedAllGropupValue').removeAttr('disabled');
            $('#usedAllGropupValue').removeAttr('disabled');
        }
    } else if($(this).hasClass('usedAll')) {
        if($(this).is(':checked')) {
            $('.usedValueOfGroup').removeClass('hide');
            $('.notUsedvalueOfGroup').addClass('hide');
            $('#notUsedAllGropupValue').prop('checked', false);
        } else {
            $('.notUsedvalueOfGroup').removeClass('hide');
            $('.usedValueOfGroup').addClass('hide');
            $('#notUsedAllGropupValue').prop('checked', true);
            
        }
    } else if($(this).hasClass('notUsedAll')) {
        if($(this).is(':checked')) {
            $('.usedValueOfGroup').addClass('hide');
            $('.notUsedvalueOfGroup').removeClass('hide');
            $('#usedAllGropupValue').prop('checked', false);
        } else {
            $('.usedValueOfGroup').removeClass('hide');
            $('.notUsedvalueOfGroup').addClass('hide');
            $('#usedAllGropupValue').prop('checked', true);
        }
    }
});

$('#custom_group_modal').on('click',function() {
    var groupIDValue = $("#groupIDValue").val();
    $.ajax({
        url: "addGroupInformation",
        cache: false,
        data:{"group_id":groupIDValue},
        success: function(response) {
            $("#responseID").html(response);
            $('#kt_modal_new_group').modal('show');
            $('#kt_modal_new_target').modal('hide');
        }
    });
});

$('#kt_modal_new_target_form').on('click', '.listofGroupValue', function() {
    $("#selectInputGroupValue").val($(this).attr('groupValueName'));
    $("#selectHiddenInputGroupValue").val($(this).attr('unique_row_num'));
    $('.listofGroupValue').removeClass('active');
    $(this).addClass('active');
});

$('#kt_modal_new_target_form').on('keyup', '#searchBarforGroupValue', function() {
    var filter = $(this).val();
    $(".listofGroupValue").each(function () {
        if ($(this).attr("groupvaluename").search(new RegExp(filter, "i")) < 0) {
            $(this).addClass('d-none');
        } else {
            $(this).removeClass('d-none');
        }
    });
    setTimeout(function () {
        if(!$(".listofGroupValue").is(":visible")) {
                $("#hideIfNoRecordExist").removeClass('hide');
        } else {
            $("#hideIfNoRecordExist").addClass('hide');
        }
    }, 100);
});
 
