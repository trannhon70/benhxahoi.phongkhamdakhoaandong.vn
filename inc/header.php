<?php
session_start();
include 'lib/session.php';
Session::init();

ob_start("ob_gzhandler");
header("Timing-Allow-Origin: *");
header("Cache-Control: public, max-age=31536000, must-revalidate");

setcookie(
    "myCookie",                // Tên cookie
    "value",                   // Giá trị cookie
    [
        "expires" => time() + 3600, // Thời gian hết hạn (1 giờ)
        "path" => "/",              // Đường dẫn
        "domain" => "https://benhxahoi.phongkhamdakhoaandong.vn",  // Tên miền (tuỳ chỉnh)
        "secure" => true,           // Chỉ gửi qua HTTPS
        "httponly" => true,         // Chỉ gửi cookie qua HTTP (không JavaScript)
        "samesite" => "None"        // SameSite=None
    ]
);


    include_once 'classes/bai_viet.php';
    include_once 'classes/tin_tuc.php';
    include_once 'classes/benh.php';

    spl_autoload_register(function ($className) {
        include_once "classes/" . $className . ".php";
    });
    $dbReadStarTime = hrtime(true);

    $bai_viet = new post();
    $tin_tuc = new news();
    $benh = new Benh();

    $dbReadEndTime = hrtime(true);
    $dbReadTotalTime = ($dbReadEndTime - $dbReadStarTime) / 1e+6;
   
    header('Server-Timing: db;desc="Database";dur=' . $dbReadTotalTime);

    // $local ='http://localhost/_andong/benhxahoi.phongkhamdakhoaandong.vn.vn'
    $local ='https://benhxahoi.phongkhamdakhoaandong.vn'
    ?>
<!DOCTYPE html>
<html ⚡ lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    

    <script defer src="<?php echo $local ?>/js/cdn_image.min.js"></script>
    <link rel="preload" fetchpriority="high" as="image" href="<?php echo $local ?>/images/banner/banner_mobile.webp"
    type="image/webp">
   
    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }
    </style><noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>
    
    <link rel="icon" href="<?php echo $local ?>/images/icons/icon_logo.webp" type="image/x-icon">
    <link rel="preload" href="css/index.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="preload" href="css/@media_header.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <noscript>
        <link rel="stylesheet" href="css/index.min.css">
        <link rel="stylesheet" href="css/@media_header.min.css">
    </noscript>
    <script>
        function updateHeaderStylesheet() {
            // Xóa các stylesheet cũ nếu có
            const existingMobile = document.querySelectorAll('link[id^="mobile-"]');
            const existingDesktop = document.querySelectorAll('link[id^="desktop-"]');
            existingMobile.forEach(mobile => mobile.remove());
            existingDesktop.forEach(desktop => desktop.remove());

            // Thêm stylesheet mới dựa trên kích thước cửa sổ
            if (window.innerWidth < 999) {
                const mobileLink = [
                    {
                        href: 'css/header_mobile.min.css',
                        id: 'mobile-0'
                    },
                    {
                        href: 'css/trang_chu_mobile.min.css',
                        id: 'mobile-1'
                    },
                    {
                        href: 'css/footer_mobile.min.css',
                        id: 'mobile-1'
                    },

                ];
                mobileLink.forEach(({
                    href,
                    id
                }) => {
                    const link = document.createElement('link');
                    link.rel = 'preload';
                    link.href = href;
                    link.id = id;
                    link.as = 'style';
                    link.onload = function () {
                        this.rel = 'stylesheet'; // Khi preload xong, đổi sang stylesheet
                    };
                    document.head.appendChild(link);
                });

            } else {
                const desktopLink = [
                    {
                        href: 'css/header.min.css',
                        id: 'desktop-0'
                    },
                    {
                        href: 'css/footer.min.css',
                        id: 'desktop-1'
                    },

                ];
                desktopLink.forEach(({
                    href,
                    id
                }) => {
                    const link = document.createElement('link');
                    link.rel = 'stylesheet';
                    link.href = href;
                    link.id = id;
                    document.head.appendChild(link);
                });
            }
        }

        updateHeaderStylesheet();
        
    </script>


  


<!-- <script>
    // Chỉ tải Google Analytics khi người dùng cuộn xuống
    document.addEventListener('scroll', function loadGA() {
        console.log('Người dùng cuộn xuống - Tải Google Analytics');
        
        // Tạo thẻ script
        var g = document.createElement('script'),
            s = document.scripts[0];
        g.src = 'https://www.googletagmanager.com/gtag/js?id=G-XWJ4VGC40M';
        g.async = true;
        s.parentNode.insertBefore(g, s);

        // Cấu hình gtag
        g.onload = function () {
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', 'G-XWJ4VGC40M');
        };

        // Xóa sự kiện lắng nghe để không tải lại
        document.removeEventListener('scroll', loadGA);
    });
</script> -->
