  <!-- All JS Plugins -->
  <script src="{{asset('webasset/js/plugins.js')}}"></script>
  <!-- Main JS -->
  <script src="{{asset('webasset/js/main.js')}}"></script>
  <script>
    function setSearchCategoryId(categoryId) {
        document.getElementById('selectedSearchCategoryId').value = categoryId;
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

    </script>

  @yield('webScript')
</body>

</html>
