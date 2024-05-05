// Lấy tham chiếu đến nút và menu
var dropdownBtn = document.getElementById("dropbtn");
var dropdownContent = document.getElementById("myDropdown");

// Thêm sự kiện click cho nút
dropdownBtn.addEventListener("click", function() {
    // Kiểm tra xem menu có được hiển thị không
    if (dropdownContent.classList.contains("show")) {
        // Nếu có, ẩn nó đi
        dropdownContent.classList.remove("show");
    } else {
        // Nếu không, hiển thị nó lên
        dropdownContent.classList.add("show");
    }
});

// Đóng menu nếu click bên ngoài nút hoặc menu
window.addEventListener("click", function(event) {
    if (!event.target.matches("#dropbtn") && !event.target.matches(".dropdown-content-link")) {
        dropdownContent.classList.remove("show");
    }
});
