<script src="./assets/js/jquery-3.6.0.min.js"></script>

<!-- Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (toggleSidebar && sidebar && overlay) {
            toggleSidebar.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        }
    });
</script>

</body>

</html>
