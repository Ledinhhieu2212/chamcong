# 1. Cài đặt phần mềm:
 - VSCode
 - Laragon
 - Composer
 - nodejs
 - nvm
# 2. Các framework sử dụng trong dự án:
- Laravel
- React
- Tailwind
- sass
- vite 
# 3. Cài đặt bạn đầu project:
Chúng ta sẽ xây dựng website chấm công như sau:
	

Bước 1: Cài đặt các phần mềm ở trên (google hướng dẫn 
tự cài)

Bước 2: Cài đặt laravel:

`composer create-project laravel/laravel app-chamcong`
`cd app-chamcong`
`php artisan serve`

Bước 3: Cài đặt reactjs bằng vite trong laravel:
`npm install react@latest react-dom@latest`
`npm i @vitejs/plugin-react`

Chỉnh lại code trong file `vite.config.js`
Trước 


Sau


Tạo file sau `resources/view/index.blade.php`

Chỉnh sửa file `resources/js/app.jsx`


Tạo file `resources/js/Page/Home.jsx`

Chạy dự án
`npm run dev`
và
`php artisan serve`

Lập trình Login - đăng nhập cho project:

