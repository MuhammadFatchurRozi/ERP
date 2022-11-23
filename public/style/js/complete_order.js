$(".order").click(function(e) {
    let button = $(this);

    if (!button.hasClass("animate")) {
        button.addClass("animate");
        setTimeout(() => {
            button.removeClass("animate");
        }, 10000);
    }
});

// $(function() {
//     $("a").click(function(evt) {
//         var link = $(this).attr("href");
//         setTimeout(function() {
//             window.location.href = link;
//         }, 10000);
//     });
// });