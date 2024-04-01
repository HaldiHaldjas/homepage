document.addEventListener("DOMContentLoaded", function() {
    // event listener - search button
    document.getElementById("searchButton").addEventListener("click", function(event) {
        event.preventDefault(); 

        // search from the input field
        var searchTerm = document.getElementById("searchInput").value.trim().toLowerCase();

        if (searchTerm === "") {
            alert("Proovi uuesti.");
            return; 
        }

        // URLs and content
        var pages = [
            { url: "index.html", content: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. " +
                    "Provident molestias repellendus eum sapiente tenetur inventore ratione " +
                    "ipsam maiores deleniti commodi, delectus quibusdam harum, quaerat, quod autem in. " +
                    "Voluptatum, dolorum deserunt." },
            { url: "contacts.html", content: "Contact Information Name: John Doe Email: john.doe@example.com Phone: 123-456-7890 Address: 123 Main St, Anytown, USA"
            },
        ];

        // Perform the search
        var searchResults = [];
        for (var i = 0; i < pages.length; i++) {
            var pageContent = pages[i].content.trim().toLowerCase();
            if (pageContent.includes(searchTerm)) {
                searchResults.push(pages[i]);
            }
        }

        // Display the search results
        displaySearchResults(searchResults);
        searchResults = "block";
        
        setTimeout(function() {
            searchResults = "none";;
        }, 3000);
    });
});
    

function displaySearchResults(results) {
    var searchResults = document.getElementById("searchResults");
    searchResults.innerHTML = "";

    if (results.length === 0) {
        searchResults.innerHTML = "<p>Ei leitud!</p>";
        setTimeout(function() {
            searchResults.style.display = "none";
        }, 2000); 

        return;
    } else {
        results.forEach(function(result) {

            var resultDiv = document.createElement("div");
            resultDiv.style.backgroundColor = "#FFFFE0";
            resultDiv.style.padding = "10px";
            resultDiv.style.marginBottom = "10px";

            // display the content
            var contentParagraph = document.createElement("p");
            contentParagraph.textContent = result.content;

            // Append the content to the result <div>
            resultDiv.appendChild(contentParagraph);

            // Append the result <div> to the search results container
            searchResults.appendChild(resultDiv);
            searchResults.innerHTML += "<p>Leitud dokumendist <a href='" + result.url + "'> " + result.url + "</a> <br>Tulemused kustuvad 5 sekundi jooksul! </p>";
            setTimeout(function() {
                searchResults.style.display = "none";
            }, 5000); 
    
            return;
        });
    }
}
