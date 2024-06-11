  <!-- All JS Plugins -->
  <script src="{{ asset('webasset/js/plugins.js') }}"></script>
  <!-- Main JS -->
  <script src="{{ asset('webasset/js/main.js') }}"></script>


  @yield('webScript')
  <script>
  document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('.category-select').addEventListener('click', function(event) {
        // if (event.target.tagName === 'A') {
            event.preventDefault();
            const categoryId = event.target.getAttribute('data-id'); // Change to 'data-id'
            const categoryName = event.target.textContent.trim(); // Get the category name
            setSearchCategoryId(categoryId, categoryName); // Pass both categoryId and categoryName
       // }
    });
});

    function setSearchCategoryId(categoryId, categoryName) {
    console.log("categoryId:>>", categoryId);
    console.log("categoryName:>>", categoryName);
    document.getElementById('selectedSearchCategoryId').value = categoryId;
    // Navigate to products page
    window.location.href = `{{ url('/products') }}?selectedSearchCategoryId=${categoryId}`;

}
    document.addEventListener('DOMContentLoaded', () => {
        const newsletterForm = document.getElementById('newsletterForm');
        const agreeCheckbox = document.getElementById('agree');
        const errorMessage = document.getElementById('error-message');

        newsletterForm.addEventListener('submit', (event) => {
            if (!agreeCheckbox.checked) {
                event.preventDefault();
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
    });

    //   $(document).ready(function($) {
    //       // Event handler for search button click
    //       $('#searchButton').click(function(e) {
    //           console.log(['test', $('#selectedCategoryId').val()])
    //           e.preventDefault();
    //           var searchQuery = $('#search_name').val(); // Get the search query from the input field
    //           var mobsearchQuery = $('#mob_search_name').val();
    //           var selectedSearchCategoryId = $('#selectedSearchCategoryId')
    //       .val(); // Get the search query from the input field
    //           var mobsearchCategory = $('#mobselectedSearchCategoryId').val();
    //           $.ajax({
    //               url: "/products?page=1",
    //               data: {
    //                   search_name: searchQuery,
    //                   selectedSearchCategoryId: selectedSearchCategoryId,
    //                   mobsearchQuery: mobsearchQuery,
    //                   mobsearchCategory: mobsearchCategory
    //               },
    //               success: function(data) {
    //                   console.log("Received data:", data);
    //                   //    window.location.href = "/products?search_name=" + searchQuery;
    //                   // Construct the URL with all the data
    //                   var url = "/products?search_name=" + encodeURIComponent(
    //                           searchQuery) +
    //                       "&mobsearchQuery=" + encodeURIComponent(mobsearchQuery) +
    //                       // Redirect to the constructed URL
    //                       window.location.href = url;

    //               },
    //               error: function(xhr, status, error) {
    //                   console.error("Error fetching products:", error);
    //               }
    //           });
    //       });
    //   });
</script>
  </body>

  </html>
