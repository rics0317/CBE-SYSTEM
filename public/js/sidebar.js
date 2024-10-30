document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const contentWrapper = document.querySelector('.content-wrapper');
    
    // Toggle sidebar
    toggleButton.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        contentWrapper.classList.toggle('collapsed');
        
        // Save state
        localStorage.setItem('sidebarState', sidebar.classList.contains('collapsed'));
    });
    
    // Restore sidebar state on page load
    const sidebarState = localStorage.getItem('sidebarState');
    if (sidebarState === 'true') {
        sidebar.classList.add('collapsed');
        contentWrapper.classList.add('collapsed');
    }
});