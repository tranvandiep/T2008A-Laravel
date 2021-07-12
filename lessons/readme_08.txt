Nội dung kiến thức:
- Tìm hiểu phân quyền người: Phân theo role.

Yêu cầu đề bài:
- Quản lý được tất cả các route.
- Phân quyền role được phép truy cập vào route đó.

B1. Phân tích:
- Sửa lại database:

roles
	id tự tăng
	role_name: Hiển thị
users
	role_id -} foreign key roles (id)
routes
	id tự tăng
	route_name
	route_title -} Tiêu đề -} đặt gợi nhớ -} ko có ý nghĩa trong phân quyền -} Hiển thị -} giúp người dùng đọc dễ hiểu.
permission
	route_id
	role_id
	status -} int (0: Ko được phép truy cập, 1: Đc phép truy cập)

- Phân tích bước làm:
roles -} fakes dữ liệu
users -} role_id -} update tay -} sửa lại role người dùng.
routes -} Quản lý tất cả route trong chương trình -} add tay cho nhanh.

1) Chức năng bảng phân quyền theo roles (thay đổi dữ liệu trên bảng permission)
2) Kích hoạt chức năng phân quyên -} middles (filter)

B2. Triển khai dự án.
1) Thiết kế database
2) Fake data -} DONE
3) Phat trien chuc nang cua chuong trinh
- Phan quyen:
	- Hien thi danh sach roles -} Phan quyen
	- Cai dat phan quyen cho roles
- Test Phan Quyen: -} TEST
- Kich hoat chuc nang phan quyen
	- Yêu cầu auth -} login
	- Phan quyen theo bảng permission