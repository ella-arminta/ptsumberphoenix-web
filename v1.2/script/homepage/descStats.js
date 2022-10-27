$(document).ready(function(){
    $(".statistic-data").each(function () {
        $(this).click(function(){
            var title = $(this).find('.statistic-data-category').text();
            var desc = $(this).find('.statistic-data-content').text();

            // ganti title
            $('.statsTitle').text(title)
            // ganti desc
            $('.statsBody').text(desc)
        })
    });
})