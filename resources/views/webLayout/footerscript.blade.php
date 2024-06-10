  <!-- All JS Plugins -->
  <script src="{{asset('webasset/js/plugins.js')}}"></script>
  <!-- Main JS -->
  <script src="{{asset('webasset/js/main.js')}}"></script>
 <script>
    function setSearchCategoryId(categoryId) {
        // Set the value of the hidden input in the category selection
        console.log("Selected categoryId:", categoryId);
        document.getElementById('selectedSearchCategoryInput').value = categoryId;
        document.getElementById('selectedSearchCategoryForm').value = categoryId;
    }

    // Ensure the form submission includes the selected category ID
    document.getElementById('searchForm').addEventListener('submit', function() {
        const selectedCategoryId = document.getElementById('selectedSearchCategoryInput').value;
        if (selectedCategoryId) {
            document.getElementById('selectedSearchCategoryForm').value = selectedCategoryId;
        }
    });
</script>


  @yield('webScript')
</body>

</html>
