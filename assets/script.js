$(document).ready( function () {
    $('.item-table').DataTable({
        "columnDefs": [ {
            "targets": 4,
            "itemable": false
            } ]
    });

    $(".table-block .category-name").each(function () {
        $(this).click(function () {
            var nextElem = $(this).parent().find(".dataTables_wrapper");

            $(".dataTables_wrapper")
                .not(nextElem)
                .each(function () {
                    $(this).hide();
                    $(".table-block .category-name").css('background-color', 'gray')
                });

            if (nextElem.css("display") === "block") {
                nextElem.hide();
                $(".table-block .category-name").css('background-color', 'gray')
                return;

            }

            nextElem.fadeIn(500);
            $(this).parent().find('.category-name').css('background-color', 'black')
        });
    });
});