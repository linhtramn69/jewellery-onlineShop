# Website bán trang sức DUENDE
Website được viết và xây dựng nhằm mục đích hỗ trợ khách hàng có thể tiếp cận, cập nhật với hoạt động kinh doanh của cửa hàng trang sức.
Qua đó, khách hàng có thể tham khảo những thông tin cần thiết và người quản trị có thể dễ dàng quản lý các thông tin.

***Một số chức năng hỗ trợ khách hàng:
1. Đăng ký(Register):

Khách hàng cần cung cấp những thông tin cơ bản như  họ tên, username, email, password. Ngoài ra username và password phải thỏa mãn ràng buộc mới có thể đăng ký. 
Nếu thỏa mãn ràng buộc và username chưa tồn tại, hệ thống sẽ báo đăng ký thành công và chuyển sang trang đăng nhập, nếu không sẽ báo lỗi.

2. Đăng nhập (Login):

- Tài khoản user:
VD:  linhtram - Tram@123 (Phải đăng ký mới có được tài khoản user)

- Tài khoản admin: admin - admin (Có sẵn trong database)

Tài khoản người dùng được phân quyền với 2 giá trị 0 (user) và 1(admin).

Khi đăng nhập bằng tài khoản user, hệ thống sẽ chuyển sang giao diện người dùng (Trang chủ)
Khi đăng nhập bằng tài khoản admin, hệ thống sẽ chuyển sang giao diện quản lý

3. Quản lý sản phẩm

Người dùng có thể xem sản phẩm theo loại, tìm kiếm sản phẩm, xem chi tiết sản phẩm.

4. Quản lý giỏ hàng

Người dùng có thể thêm sản phẩm vào giỏ hàng với số lượng mong muốn. Và có thể xóa sản phẩm bất kì khỏi giỏ hàng.

5. Thanh toán

Người dùng nhập các thông tin liên hệ để tiến hành thanh toán. Sau khi thanh toán, đơn hàng được hiển thị bên trang quản lý của người quản trị với trạng thái 'Đang xác nhận'.

***Một số chức năng hỗ trợ người quản trị:

1. Quản lý sản phẩm

Người quản trị có thể xem danh sách tất cả sản phẩm, thao tác thêm, sửa, xóa sản phẩm.

2. Quản lý đơn hàng

Người quản trị có thể xem danh sách tất cả đơn hàng, xem chi tiết đơn hàng và cập nhật trạng thái đơn hàng.

3. Quản lý người dùng

Người quản trị có thể xem danh sách tất cả người dùng

*** Cơ sở dữ liệu: duende.sql








