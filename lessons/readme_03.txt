Nội dung kiến thức
	- Tách route theo từng module dự án
	- Nhúng css/js/photos vào frontend
	- Gửi dữ liệu từ Route/Controller -> sang View
	- 1 số cú pháp blade (if, else, for, foreach)
	- Xử lý form (get/post)


=========================================================
Mini Project: Quản lý thư viện
- Library: Hiển thị danh sách quấn sách
- Nhập thông tin sách (GET/POST)

Phan tich du an:
1) Dinh nghia route trong module
- Library:
	- /library/index => Library/LibraryController (controller) => index (func) => index.blade.php (view) -> GET
	- /library/input (View form) => Library/LibraryController (controller) => input (func) => input.blade.php (view) -> GET
	- ???
- library.php

2) Xay dung view
	- index
	- input

	(migration & model & DB)