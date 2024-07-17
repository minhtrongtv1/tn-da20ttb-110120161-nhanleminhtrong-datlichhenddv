<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Nội dung chính của trang -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <p>&copy; 2024 <a href="#">Đặt lịch hẹn đa dịch vụ</a>. Tất cả các quyền được bảo lưu.</p>
            </div>
            <div class="footer-middle">
                <ul class="footer-links">
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Hướng Dẫn</a></li>
                    <li><a href="#">Hỗ Trợ</a></li>
                    <li><a href="#">Cài Đặt</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                </ul>
                <div class="footer-social">
                    <a href="https://www.facebook.com/mtrong.nope" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/habbit__mii/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-right">
                <p>Thiết kế bởi <a href="https://www.facebook.com/mtrong.nope">Minh Trọng</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>



<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f6f9;
}

/* Nội dung chính của trang */
.content {
    padding: 20px;
    min-height: 80vh;
}

/* Cài đặt cho footer */
.footer {
    background: linear-gradient(135deg, #1f2937 0%, #3b4c63 100%);
    color: #f1f5f9;
    padding: 30px 20px;
    position: relative;
    bottom: 0;
    width: 100%;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    font-size: 16px;
}

/* Cài đặt cho các phần tử bên trong footer */
.footer-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    gap: 20px;
}

/* Cài đặt cho phần bên trái của footer */
.footer-left {
    text-align: center;
}

.footer-left a {
    color: #f1f5f9;
    text-decoration: none;
}

.footer-left a:hover {
    text-decoration: underline;
}

/* Cài đặt cho phần giữa của footer */
.footer-middle {
    text-align: center;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
}

.footer-links li {
    display: inline;
}

.footer-links a {
    color: #f1f5f9;
    text-decoration: none;
}

.footer-links a:hover {
    text-decoration: underline;
}

/* Cài đặt cho phần bên phải của footer */
.footer-right {
    text-align: center;
}

.footer-right a {
    color: #f1f5f9;
    text-decoration: none;
}

.footer-right a:hover {
    text-decoration: underline;
}

/* Cài đặt cho phần biểu tượng xã hội */
.footer-social {
    margin-top: 15px;
}

.footer-social a {
    color: #f1f5f9;
    margin: 0 10px;
    font-size: 20px;
    text-decoration: none;
}

.footer-social a:hover {
    color: #50b3a2;
}

/* Cài đặt cho biểu tượng xã hội Font Awesome */
.fab {
    transition: color 0.3s ease;
}

</style>