Nội dung kiến thức: API Resfull
- API:
	- Lấy danh sách/thêm/sửa/xóa -> danh mục sản phẩm
	- Lấy danh sách (Tìm kiếm theo id danh mục, tìm kiếm theo title)/thêm/sửa/xóa -> sản phẩm

Chuẩn bị:
- Database
- Category & Product -> dữ liệu.

Server:
API
1) Danh mục sản phẩm
	URL Route: api/category
	Định nghĩa route & controller (Api/ApiCategoryController)
2) Sản phẩm 
	URL Route: api/product
	Định nghĩa route & controller (Api/ApiProductController)