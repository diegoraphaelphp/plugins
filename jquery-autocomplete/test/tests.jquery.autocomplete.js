$(document).ready(function () {
    "use strict";

    var $input1;

    module("Setup jQuery, DOM and autocompleter");

    test("Create INPUT tag", function() {
        $input1 = $('<input type="text" id="input1">');
        $('#qunit-fixture').append($input1);
        $input1 = $("#input1");
        equal($input1.attr("id"), "input1");
    });

    test("Create autocompleter", function() {
        $input1.autocomplete();
        equal($input1.data("autocompleter") instanceof $.Autocompleter, true);
    });

    test("Check default options", function() {
        var ac = $input1.data("autocompleter");
        var defaultOptions = $.fn.autocomplete.defaults;
        var acOptions = ac.options;
        $.each(defaultOptions, function(index) {
            equal(defaultOptions[index], acOptions[index]);
        });
    });


});
