KTUtil.onDOMContentLoaded(function () {
    KTLayoutSearchData.init();
});
"use strict";
// Class definition
var KTLayoutSearchData = (function () {
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
            var filter = $("#analyticsSearch").val();
            var count = 0;
            $(".gooleDomainList").each(function () {
                if (
                    $(this).attr("domain").search(new RegExp(filter, "i")) < 0
                ) {
                    $(this)
                        .parents(".domainAnalyticsParentDiv")
                        .attr("style", "display: none !important");
                } else {
                    $(this).parents(".domainAnalyticsParentDiv").removeAttr("style");
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
        $(".domainAnalyticsParentDiv").removeAttr("style");
        mainElement.classList.remove("d-none");
        // Hide empty message
        emptyElement.classList.add("d-none");
    };

    // Public methods
    return {
        init: function () {
            // Elements
            element = document.querySelector("#kt_analytics_search");

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
            // Initialize search handler
            searchObject = new KTSearch(element);
            // Search handler
            searchObject.on("kt.search.process", processs);
            // Clear handler
            searchObject.on("kt.search.clear", clear);
        },
    };
})();

$('.gooleDomainList').on('click',function() {
    if(!$(this).hasClass('active')) {
        var reportUrl ='';
        var newReportUrl = '';
        var dataStudioReportUrl = "https://datastudio.google.com/embed/reporting/";
        var reportUrl = $(this).attr('reportUrl');
        if(reportUrl) {
            var $iframe = $('#googleAnalyticsId');
            var newReportUrl = dataStudioReportUrl+reportUrl;
            if ($iframe.length) {
                $iframe.attr('src',newReportUrl);
                $(".googleSearchDomain").text($(this).attr('domain'));
                $(".gooleDomainList").removeClass('active');
                $(this).addClass('active');
                $('body').trigger('click');
                return false;
            }
        } else {
            alert("Sorry for this domain no information avalilable");
        }
    } else {
        alert("Already information is showing of this domain,please choose anoher one");
    }
});