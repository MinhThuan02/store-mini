
document.addEventListener('DOMContentLoaded', function () {
    const tabElms = document.querySelectorAll('a[data-bs-toggle="list"]');
    tabElms.forEach(tabElm => {
        tabElm.addEventListener('shown.bs.tab', event => {
            console.log('Newly activated tab:', event.target);
            console.log('Previous active tab:', event.relatedTarget);
        });
    });

    const triggerEl = document.querySelector('#list-profile-list');
    bootstrap.Tab.getOrCreateInstance(triggerEl).show(); // Select tab by name

    const triggerFirstTabEl = document.querySelector('#list-tab a:first-child');
    bootstrap.Tab.getOrCreateInstance(triggerFirstTabEl).show(); // Select first tab
});

