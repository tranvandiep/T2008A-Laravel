Nội dung:
- DB:
 	- Làm việc: insert/update/delete
 	- Thao tác trên nhiều tables & Tìm kiếm
 	- Phân trang.

=================================================
Mini Project:
- Quản lý sản phẩm: Thêm/sửa/xoá -> Liên kế vs danh mục sản phẩm
- DB: Sử dụng dữ liệu trong buổi học trước

Module: Sản phẩm (product)

B1) Tạo route (Controller + View + Route + Model)
- /product/index => Hiển thị danh sách sản phẩm => GET
- /product/editor => Hiển thị View nhập thông tin => GET
- /product/post => Save dữ liệu đẩy lên => POST
- /product/delete => Xoá danh mục sản phẩm => POST

Controller: ProductController

B2) Hien thi danh sach san pham

===========================================================
============================= DB ==========================
===========================================================
Product:

id category_id name
1  1           A1
2  1           A2
3  2           A3
4  null        A4


Category
id name
1  C1
2  C2
3  C3

=> select product.*, category.name as category_name from product left join category on category.id = product.category_id where product.category_id = 1 and 

id category_id name category_name
1  1           A1   C1
2  1           A2   C1