
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


$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    items: 1, // Số lượng items hiển thị mỗi lần
    loop: true,
    margin: 10,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    responsive: {
      0: {
        items: 1 // 1 item trên màn hình nhỏ
      },
      600: {
        items: 1 // 1 item trên màn hình trung bình
      },
      1000: {
        items: 1 // 1 item trên màn hình lớn
      }
    }
  });
});

