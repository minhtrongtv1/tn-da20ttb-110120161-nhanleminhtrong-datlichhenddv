<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for social icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .footer {
            background-color: #2c3e50; /* Màu nền đậm */
            color: #ecf0f1; /* Màu chữ sáng */
            padding: 3rem 0; /* Khoảng cách nội dung */
        }
        .footer a {
            color: #ecf0f1; /* Màu liên kết */
        }
        .footer a:hover {
            color: #f39c12; /* Màu liên kết khi hover */
            text-decoration: none; /* Xóa gạch chân khi hover */
        }
        .footer .social-icons a {
            color: #ecf0f1;
            margin: 0 0.75rem;
        }
        .footer .social-icons a:hover {
            color: #f39c12; /* Màu biểu tượng khi hover */
        }
        .footer h5 {
            color: #f39c12; /* Màu tiêu đề */
            border-bottom: 2px solid #f39c12; /* Đường kẻ dưới tiêu đề */
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Về Chúng Tôi</h5>
                    <p>Chúng tôi cung cấp những lịch hẹn và dịch vụ tốt nhất cho khách hàng. Liên hệ với chúng tôi để biết thêm thông tin.</p>
                </div>
                <div class="col-md-4">
                    <h5>Dịch Vụ</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li><a href="khachhang_datlich.php?id_vaitro=1">Công Chứng</a></li>
                        <li><a href="khachhang_datlich.php?id_vaitro=2">Đăng Kiểm</a></li>
                        <li><a href="khachhang_datlich.php?id_vaitro=3">Y Tế</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Liên Hệ</h5>
                    <p>Địa chỉ: Hẻm 67 Đường Thạch Ngọc Biên, Khóm 9 Phường 9, TP. Trà Vinh</p>
                    <p>Email: minhtrongtv1@gmail.com</p>
                    <p>Điện thoại: (+84) 762-887-908</p>
                    <div class="social-icons mt-3">
                        <a href="https://www.facebook.com/mtrong.nope" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/habbit__mii/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; 2024 by Minh Trọng. Bảo lưu mọi quyền.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
