function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const sidebarTexts = document.querySelectorAll('.sidebar-item-text');

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
  