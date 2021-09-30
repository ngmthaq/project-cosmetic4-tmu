// Navigation bar dropdown
let categoryPosts = document.querySelector('.category-posts');  // Tìm kiếm element class category-posts
let categoryBox = document.querySelector('.category-box');      // Tìm kiếm element class category-box
categoryPosts.addEventListener('mouseover', function() {        // Xử lý sự kiện di chuột vào category-posts
    categoryBox.style.display = 'block';                        // Hiện category-box
})
categoryPosts.addEventListener('mouseout', function() {         // Xử lý sự kiện di chuột ra
    categoryBox.style.display = 'none';                         // Ẩn category-box
})

// Search input validate
let headerSearchForm = document.querySelector('#search-form');  // Tìm element id search-form
let searchInput = document.querySelector('#search');            // Tìm element id search
headerSearchForm.addEventListener('submit', function(e) {       
    if (searchInput.value == "") {                              // Nếu người dùng không nhập gì vào input
        e.preventDefault()                                      // Form sẽ không gửi dữ liệu đi
    }
})