"use strict";
// Class definition
var KTLayoutSearch = (function () {
    // Private variables
    var element;
    var formElement;
    var mainElement;
    var resultsElement;
    var wrapperElement;
    var emptyElement;

    var preferencesElement;
    var preferencesShowElement;
    var preferencesDismissElement;

    var advancedOptionsFormElement;
    var advancedOptionsFormShowElement;
    var advancedOptionsFormCancelElement;
    var advancedOptionsFormSearchElement;

    var searchObject;

    // Private functions
    var processs = function (search) {
        var timeout = setTimeout(function () {
            var filter = $("#domainSearch").val();
            var count = 0;
            $(".domainList").each(function () {
                if (
                    $(this).attr("domain").search(new RegExp(filter, "i")) < 0
                ) {
                    $(this)
                        .parents(".domainParentDiv")
                        .attr("style", "display: none !important");
                } else {
                    $(this).parents(".domainParentDiv").removeAttr("style");
                    count++;
                }
            });
            search.complete();
            if (count == 0) {
                emptyElement.classList.remove("d-none");
            } else {
                emptyElement.classList.add("d-none");
            }
        }, 1500);
    };

    var clear = function (search) {
        // Show recently viewed
        $(".domainParentDiv").removeAttr("style");
        mainElement.classList.remove("d-none");
        // Hide empty message
        emptyElement.classList.add("d-none");
    };

    // Public methods
    return {
        init: function () {
            // Elements
            element = document.querySelector("#kt_header_search");

            if (!element) {
                return;
            }

            wrapperElement = element.querySelector(
                '[data-kt-search-element="wrapper"]'
            );
            formElement = element.querySelector(
                '[data-kt-search-element="form"]'
            );
            mainElement = element.querySelector(
                '[data-kt-search-element="main"]'
            );
            resultsElement = element.querySelector(
                '[data-kt-search-element="results"]'
            );
            emptyElement = element.querySelector(
                '[data-kt-search-element="empty"]'
            );

            preferencesElement = element.querySelector(
                '[data-kt-search-element="preferences"]'
            );
            preferencesShowElement = element.querySelector(
                '[data-kt-search-element="preferences-show"]'
            );
            preferencesDismissElement = element.querySelector(
                '[data-kt-search-element="preferences-dismiss"]'
            );

            advancedOptionsFormElement = element.querySelector(
                '[data-kt-search-element="advanced-options-form"]'
            );
            advancedOptionsFormShowElement = element.querySelector(
                '[data-kt-search-element="advanced-options-form-show"]'
            );
            advancedOptionsFormCancelElement = element.querySelector(
                '[data-kt-search-element="advanced-options-form-cancel"]'
            );
            advancedOptionsFormSearchElement = element.querySelector(
                '[data-kt-search-element="advanced-options-form-search"]'
            );
            // Initialize search handler
            searchObject = new KTSearch(element);
            // Search handler
            searchObject.on("kt.search.process", processs);
            // Clear handler
            searchObject.on("kt.search.clear", clear);
        },
    };
})();