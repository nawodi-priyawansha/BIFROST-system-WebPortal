function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const sidebarTexts = document.querySelectorAll('.sidebar-item-text');

    if (window.innerWidth < 768) { // Mobile view logic
        if (sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('hidden');
            sidebarTexts.forEach(text => text.style.display = 'inline');
        } else {
            sidebar.classList.add('hidden');
            sidebarTexts.forEach(text => text.style.display = 'none');
        }
    } else { // Desktop view logic
        if (sidebar.classList.contains('w-18')) {
            sidebar.classList.remove('w-18');
            sidebar.classList.add('w-80');
            sidebarTexts.forEach(text => text.style.display = 'inline');
        } else {
            sidebar.classList.remove('w-80');
            sidebar.classList.add('w-18');
            sidebarTexts.forEach(text => text.style.display = 'none');
        }
    }
}

function hideSidebarOnLoad() {
    const sidebar = document.getElementById('sidebar');
    if (window.innerWidth < 768) { // Checks if the screen width is less than 768px
        sidebar.classList.add('hidden');
    }
}

window.onload = hideSidebarOnLoad;
window.onresize = hideSidebarOnLoad; // Ensure the sidebar is hidden/shown correctly when the window is resized
