/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/general/vis-timeline/style.js":
/*!*************************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/vis-timeline/style.js ***!
  \*************************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTVisTimelineStyle = function () {\n  // Private functions\n  var exampleStyle = function exampleStyle() {\n    var container = document.getElementById(\"kt_docs_vistimeline_style\"); // Generate HTML content\n\n    var getContent = function getContent(title, img) {\n      var _name$classList, _symbol$classList;\n\n      var item = document.createElement('div');\n      var name = document.createElement('div');\n      var nameClasses = ['fw-bolder', 'mb-2'];\n\n      (_name$classList = name.classList).add.apply(_name$classList, nameClasses);\n\n      name.innerHTML = title;\n      var image = document.createElement('img');\n      image.setAttribute('src', img);\n      var symbol = document.createElement('div');\n      var symbolClasses = ['symbol', 'symbol-circle', 'symbol-30'];\n\n      (_symbol$classList = symbol.classList).add.apply(_symbol$classList, symbolClasses);\n\n      symbol.appendChild(image);\n      item.appendChild(name);\n      item.appendChild(symbol);\n      return item;\n    }; // note that months are zero-based in the JavaScript Date object\n\n\n    var items = new vis.DataSet([{\n      start: new Date(2010, 7, 23),\n      content: getContent('Conversation', hostUrl + '/media/avatars/300-6.jpg')\n    }, {\n      start: new Date(2010, 7, 23, 23, 0, 0),\n      content: getContent('Mail from boss', hostUrl + '/media/avatars/300-1.jpg')\n    }, {\n      start: new Date(2010, 7, 24, 16, 0, 0),\n      content: \"Report\"\n    }, {\n      start: new Date(2010, 7, 26),\n      end: new Date(2010, 8, 2),\n      content: \"Traject A\"\n    }, {\n      start: new Date(2010, 7, 28),\n      content: getContent('Memo', hostUrl + '/media/avatars/300-2.jpg')\n    }, {\n      start: new Date(2010, 7, 29),\n      content: getContent('Phone call', hostUrl + '/media/avatars/300-5.jpg')\n    }, {\n      start: new Date(2010, 7, 31),\n      end: new Date(2010, 8, 3),\n      content: \"Traject B\"\n    }, {\n      start: new Date(2010, 8, 4, 12, 0, 0),\n      content: getContent('Report', hostUrl + '/media/avatars/300-20.jpg')\n    }]);\n    var options = {\n      editable: true,\n      margin: {\n        item: 20,\n        axis: 40\n      }\n    };\n    var timeline = new vis.Timeline(container, items, options);\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleStyle();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTVisTimelineStyle.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC92aXMtdGltZWxpbmUvc3R5bGUuanMuanMiLCJtYXBwaW5ncyI6IkNBR0E7O0FBQ0EsSUFBSUEsa0JBQWtCLEdBQUcsWUFBWTtFQUNqQztFQUNBLElBQUlDLFlBQVksR0FBRyxTQUFmQSxZQUFlLEdBQVk7SUFDM0IsSUFBSUMsU0FBUyxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsMkJBQXhCLENBQWhCLENBRDJCLENBRzNCOztJQUNBLElBQU1DLFVBQVUsR0FBRyxTQUFiQSxVQUFhLENBQUNDLEtBQUQsRUFBUUMsR0FBUixFQUFnQjtNQUFBOztNQUMvQixJQUFNQyxJQUFJLEdBQUdMLFFBQVEsQ0FBQ00sYUFBVCxDQUF1QixLQUF2QixDQUFiO01BQ0EsSUFBTUMsSUFBSSxHQUFHUCxRQUFRLENBQUNNLGFBQVQsQ0FBdUIsS0FBdkIsQ0FBYjtNQUNBLElBQU1FLFdBQVcsR0FBRyxDQUFDLFdBQUQsRUFBYyxNQUFkLENBQXBCOztNQUNBLG1CQUFBRCxJQUFJLENBQUNFLFNBQUwsRUFBZUMsR0FBZix3QkFBc0JGLFdBQXRCOztNQUNBRCxJQUFJLENBQUNJLFNBQUwsR0FBaUJSLEtBQWpCO01BRUEsSUFBTVMsS0FBSyxHQUFHWixRQUFRLENBQUNNLGFBQVQsQ0FBdUIsS0FBdkIsQ0FBZDtNQUNBTSxLQUFLLENBQUNDLFlBQU4sQ0FBbUIsS0FBbkIsRUFBMEJULEdBQTFCO01BRUEsSUFBTVUsTUFBTSxHQUFHZCxRQUFRLENBQUNNLGFBQVQsQ0FBdUIsS0FBdkIsQ0FBZjtNQUNBLElBQU1TLGFBQWEsR0FBRyxDQUFDLFFBQUQsRUFBVyxlQUFYLEVBQTRCLFdBQTVCLENBQXRCOztNQUNBLHFCQUFBRCxNQUFNLENBQUNMLFNBQVAsRUFBaUJDLEdBQWpCLDBCQUF3QkssYUFBeEI7O01BQ0FELE1BQU0sQ0FBQ0UsV0FBUCxDQUFtQkosS0FBbkI7TUFFQVAsSUFBSSxDQUFD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dXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC92aXMtdGltZWxpbmUvc3R5bGUuanM/NDMyMyJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVFZpc1RpbWVsaW5lU3R5bGUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVTdHlsZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICB2YXIgY29udGFpbmVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJrdF9kb2NzX3Zpc3RpbWVsaW5lX3N0eWxlXCIpO1xyXG5cclxuICAgICAgICAvLyBHZW5lcmF0ZSBIVE1MIGNvbnRlbnRcclxuICAgICAgICBjb25zdCBnZXRDb250ZW50ID0gKHRpdGxlLCBpbWcpID0+IHtcclxuICAgICAgICAgICAgY29uc3QgaXRlbSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2RpdicpO1xyXG4gICAgICAgICAgICBjb25zdCBuYW1lID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XHJcbiAgICAgICAgICAgIGNvbnN0IG5hbWVDbGFzc2VzID0gWydmdy1ib2xkZXInLCAnbWItMiddO1xyXG4gICAgICAgICAgICBuYW1lLmNsYXNzTGlzdC5hZGQoLi4ubmFtZUNsYXNzZXMpO1xyXG4gICAgICAgICAgICBuYW1lLmlubmVySFRNTCA9IHRpdGxlO1xyXG5cclxuICAgICAgICAgICAgY29uc3QgaW1hZ2UgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdpbWcnKTtcclxuICAgICAgICAgICAgaW1hZ2Uuc2V0QXR0cmlidXRlKCdzcmMnLCBpbWcpO1xyXG5cclxuICAgICAgICAgICAgY29uc3Qgc3ltYm9sID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnZGl2Jyk7XHJcbiAgICAgICAgICAgIGNvbnN0IHN5bWJvbENsYXNzZXMgPSBbJ3N5bWJvbCcsICdzeW1ib2wtY2lyY2xlJywgJ3N5bWJvbC0zMCddO1xyXG4gICAgICAgICAgICBzeW1ib2wuY2xhc3NMaXN0LmFkZCguLi5zeW1ib2xDbGFzc2VzKTtcclxuICAgICAgICAgICAgc3ltYm9sLmFwcGVuZENoaWxkKGltYWdlKTtcclxuXHJcbiAgICAgICAgICAgIGl0ZW0uYXBwZW5kQ2hpbGQobmFtZSk7XHJcbiAgICAgICAgICAgIGl0ZW0uYXBwZW5kQ2hpbGQoc3ltYm9sKTtcclxuXHJcbiAgICAgICAgICAgIHJldHVybiBpdGVtO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gbm90ZSB0aGF0IG1vbnRocyBhcmUgemVyby1iYXNlZCBpbiB0aGUgSmF2YVNjcmlwdCBEYXRlIG9iamVjdFxyXG4gICAgICAgIHZhciBpdGVtcyA9IG5ldyB2aXMuRGF0YVNldChbXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHN0YXJ0OiBuZXcgRGF0ZSgyMDEwLCA3LCAyMyksXHJcbiAgICAgICAgICAgICAgICBjb250ZW50OiBnZXRDb250ZW50KCdDb252ZXJzYXRpb24nLCBob3N0VXJsICsgJy9tZWRpYS9hdmF0YXJzLzMwMC02LmpwZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHN0YXJ0OiBuZXcgRGF0ZSgyMDEwLCA3LCAyMywgMjMsIDAsIDApLFxyXG4gICAgICAgICAgICAgICAgY29udGVudDogZ2V0Q29udGVudCgnTWFpbCBmcm9tIGJvc3MnLCBob3N0VXJsICsgJy9tZWRpYS9hdmF0YXJzLzMwMC0xLmpwZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHsgc3RhcnQ6IG5ldyBEYXRlKDIwMTAsIDcsIDI0LCAxNiwgMCwgMCksIGNvbnRlbnQ6IFwiUmVwb3J0XCIgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgc3RhcnQ6IG5ldyBEYXRlKDIwMTAsIDcsIDI2KSxcclxuICAgICAgICAgICAgICAgIGVuZDogbmV3IERhdGUoMjAxMCwgOCwgMiksXHJcbiAgICAgICAgICAgICAgICBjb250ZW50OiBcIlRyYWplY3QgQVwiLFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICBzdGFydDogbmV3IERhdGUoMjAxMCwgNywgMjgpLFxyXG4gICAgICAgICAgICAgICAgY29udGVudDogZ2V0Q29udGVudCgnTWVtbycsIGhvc3RVcmwgKyAnL21lZGlhL2F2YXRhcnMvMzAwLTIuanBnJylcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgc3RhcnQ6IG5ldyBEYXRlKDIwMTAsIDcsIDI5KSxcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQ6IGdldENvbnRlbnQoJ1Bob25lIGNhbGwnLCBob3N0VXJsICsgJy9tZWRpYS9hdmF0YXJzLzMwMC01LmpwZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgIHN0YXJ0OiBuZXcgRGF0ZSgyMDEwLCA3LCAzMSksXHJcbiAgICAgICAgICAgICAgICBlbmQ6IG5ldyBEYXRlKDIwMTAsIDgsIDMpLFxyXG4gICAgICAgICAgICAgICAgY29udGVudDogXCJUcmFqZWN0IEJcIixcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgc3RhcnQ6IG5ldyBEYXRlKDIwMTAsIDgsIDQsIDEyLCAwLCAwKSxcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQ6IGdldENvbnRlbnQoJ1JlcG9ydCcsIGhvc3RVcmwgKyAnL21lZGlhL2F2YXRhcnMvMzAwLTIwLmpwZycpXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgXSk7XHJcblxyXG4gICAgICAgIHZhciBvcHRpb25zID0ge1xyXG4gICAgICAgICAgICBlZGl0YWJsZTogdHJ1ZSxcclxuICAgICAgICAgICAgbWFyZ2luOiB7XHJcbiAgICAgICAgICAgICAgICBpdGVtOiAyMCxcclxuICAgICAgICAgICAgICAgIGF4aXM6IDQwLFxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgIH07XHJcblxyXG4gICAgICAgIHZhciB0aW1lbGluZSA9IG5ldyB2aXMuVGltZWxpbmUoY29udGFpbmVyLCBpdGVtcywgb3B0aW9ucyk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBleGFtcGxlU3R5bGUoKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uICgpIHtcclxuICAgIEtUVmlzVGltZWxpbmVTdHlsZS5pbml0KCk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiS1RWaXNUaW1lbGluZVN0eWxlIiwiZXhhbXBsZVN0eWxlIiwiY29udGFpbmVyIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImdldENvbnRlbnQiLCJ0aXRsZSIsImltZyIsIml0ZW0iLCJjcmVhdGVFbGVtZW50IiwibmFtZSIsIm5hbWVDbGFzc2VzIiwiY2xhc3NMaXN0IiwiYWRkIiwiaW5uZXJIVE1MIiwiaW1hZ2UiLCJzZXRBdHRyaWJ1dGUiLCJzeW1ib2wiLCJzeW1ib2xDbGFzc2VzIiwiYXBwZW5kQ2hpbGQiLCJpdGVtcyIsInZpcyIsIkRhdGFTZXQiLCJzdGFydCIsIkRhdGUiLCJjb250ZW50IiwiaG9zdFVybCIsImVuZCIsIm9wdGlvbnMiLCJlZGl0YWJsZSIsIm1hcmdpbiIsImF4aXMiLCJ0aW1lbGluZSIsIlRpbWVsaW5lIiwiaW5pdCIsIktUVXRpbCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/vis-timeline/style.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/vis-timeline/style.js"]();
/******/ 	
/******/ })()
;