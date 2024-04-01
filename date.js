function blogDate() {

    var elements = document.getElementsByClassName("publishDate");
    for (var i = 0; i < elements.length; i++) {
        var publishDate = elements[i].getAttribute("data-publish-date");
        elements[i].textContent = publishDate;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    blogDate();
});


//     var elements = document.getElementsByClassName("publishDate");
//     var currentDate = new Date();
//     var formattedDate = currentDate.toLocaleDateString('et-EE', {
//         year: 'numeric',
//         month: 'long',
//         day: 'numeric'
//     });
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].textContent = "Postitatud " + formattedDate;
//     }
    
//     console.log("Now: ", currentDate);
//     console.log("Formatted Date: ", formattedDate);
// }

// document.addEventListener("DOMContentLoaded", function() {
//     blogDate();
// });
