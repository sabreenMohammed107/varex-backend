  <!-- All JS Plugins -->
  <script src="{{asset('webasset/js/plugins.js')}}"></script>
  <!-- Main JS -->
  <script src="{{asset('webasset/js/main.js')}}"></script>
  <script>
    function setSearchCategoryId(categoryId) {
        document.getElementById('selectedSearchCategoryId').value = categoryId;
    }
    </script>

  @yield('webScript')
</body>

</html>
