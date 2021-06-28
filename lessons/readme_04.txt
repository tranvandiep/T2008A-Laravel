Nội dung kiến thức:
- migration
- DB: căn bản
- Model căn bản: ORM (Table (db) - Class Object (Ngon ngu lap trinh)) -] insert/update/delete -] tu dong cap nhat du lieu vao table tuong ung khi goi ham.
====================================================
Mini Project:
- Xây dựng 1 hệ thống web bán
- Yêu cầu:
	- Thiết kế database
	- Truý vấn CSDL (Model & DB)
- Triển khai:
	- Thiết kế database

	create table category (
		id int primary key auto_increment,
		name varchar(100),
		parent_id int references category (id)
	);

	create table product (
		id int primary key auto_increment,
		title varchar(150) not null,
		thumbnail varchar(500),
		price float,
		content longtext,
		category_id int references category (id),
		created_at datetime,
		updated_at datetime
	);