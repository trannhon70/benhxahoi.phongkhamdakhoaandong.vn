<?php
ob_start("ob_gzhandler");
header("Timing-Allow-Origin: *");
header("Cache-Control: public, max-age=31536000, must-revalidate");

// $local = 'http://localhost/_andong/benhxahoi.phongkhamdakhoaandong.vn';
$local = 'https://benhxahoi.phongkhamdakhoaandong.vn';
?>
<!DOCTYPE html>
<html ⚡ lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="description"
        content="Phòng khám đa khoa chuyên điều trị bệnh nam khoa, bệnh xã hội, da liễu, hậu môn - trực tràng uy tính tại thành phố Hồ Chí Minh">
    <title>Phòng khám đa khoa</title>
    <link rel="icon" href="<?php echo $local ?>/images/icons/icon_logo.webp" type="image/x-icon">
    <link rel="preload" href="css/index.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="preload" href="css/chuyen-de-sui-mau-ga.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <noscript>
        <link rel="stylesheet" href="css/index.min.css">
        <link rel="stylesheet" href="css/chuyen-de-sui-mau-ga.min.css">
    </noscript>
    <script>
    // Chỉ tải Google Analytics khi người dùng cuộn xuống
    document.addEventListener('scroll', function loadGA() {
        console.log('Người dùng cuộn xuống - Tải Google Analytics');
        
        // Tạo thẻ script
        var g = document.createElement('script'),
            s = document.scripts[0];
        g.src = 'https://www.googletagmanager.com/gtag/js?id=G-TQC7WML3PS';
        g.async = true;
        s.parentNode.insertBefore(g, s);

        // Cấu hình gtag
        g.onload = function () {
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', 'G-TQC7WML3PS');
        };

        // Xóa sự kiện lắng nghe để không tải lại
        document.removeEventListener('scroll', loadGA);
    });
</script>
</head>
<?php
$slides = [
    [
        "image" => "/images/sui_mau_ga/icons/icon_70.webp",
        "alt" => "icon 70",
        "symptom" => "Qua hành vi quan hệ tình dục",
        "complication" => "Đối tác của người bệnh có khả năng bị lây nhiễm virus HPV cao nhất."
    ],
    [
        "image" => "/images/sui_mau_ga/icons/icon_30.webp",
        "alt" => "icon 3",
        "symptom" => "Gián tiếp qua vật dụng mang mầm bệnh",
        "complication" => "Dùng chung vật dụng sinh hoạt với người mang bệnh như khăn mặt, khăn tắm, quần áo, bồn tắm, v.v…"
    ],
    [
        "image" => "/images/sui_mau_ga/icons/icon_18.webp",
        "alt" => "icon 18",
        "symptom" => "Từ mẹ sang con",
        "complication" => "Trẻ sinh thường dễ bị nhiễm HPV từ cổ tử cung, đường sinh môn của người mẹ."
    ],
    [
        "image" => "/images/sui_mau_ga/icons/icon_9.webp",
        "alt" => "icon 70",
        "symptom" => "Qua vết thương hở",
        "complication" => "Virus HPV cũng có thể lây lan qua niêm mạc da bị tổn thương, tới tận biểu mô tế bào đáy."
    ],

];
?>

<body>
    <header class="header">
        <h1 class="header__title">
            CHUYÊN KHOA BỆNH XÃ HỘI UY TÍN TẠI TP.HCM
        </h1>
    </header>

    <section class="banner">
        <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/banner.webp" alt="...">
    </section>
    <section class="cardbs" >
        <div class="cardbs__body" >
            <div class="cardbs__body-left" >
            <img loading="lazy" width="100%" src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_bs.webp" alt="...">
            </div>
            <div class="cardbs__body-right" >
                <div class="cardbs__body-right-bs">
                    BS Võ Minh Nguyễn
                </div>
                <div class="cardbs__body-right-ck">
                    Chuyên khoa ngoại
                </div>
                <div class="cardbs__body-right-ct">
                   Từng công tác tại Bệnh viện Đa khoa Sainpaul Hà Nội <a href="#bs" >xem thêm...</a>
                </div>
            </div>
        </div>
    </section>
    <section class="banner">
        <div class="banner__button">
            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" aria-label="title" class="box">tư vấn với bác sĩ tại đây</a>
        </div>
    </section>
    <section class="sick">
        <div class="sick__container">
            <div class="sick__container-item sick__container-item-active ">Sùi Màu Gà </div>
            <div class="sick__container-item">Bệnh Lậu</div>
            <div class="sick__container-item">Mụn Rộp</div>
        </div>
    </section>
    <section class="sick">
        <div class="sick__body ">
            <div class="sick__body-card">
                <strong>Bệnh sùi mào gà</strong> là căn bệnh xã hội, lây lan qua hành vi quan hệ tình dục, bản chất là tình trạng tăng sinh của các tế bào biểu bì do lây nhiễm virus HPV (Human Papilloma Virus). Virus HPV bao gồm các tuýp 1, 2, 6, 11, 16, 18, 31, 33, và 35. Trong đó, bệnh ung thư cổ tử cung ở nữ giới có liên quan tới việc nhiễm HPV tuýp 16 và 18 trong thời gian dài. HPV là một phân tử khá nhỏ với đường kính = 55 nm, thuộc nhóm DNA. Có hơn 100 kiểu gen HPV, trong đó hơn 30 kiểu sẽ lây nhiễm và gây bệnh trên da và niêm mạc của bộ phận sinh dục, và gây ra các loại bệnh. Do bệnh có khả năng lây lan mạnh nên cần nhận biết triệu chứng để điều trị kịp thời.
            </div>
        </div>
    </section>
    <section class="treatment">
        <a aria-label="chat" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="expert__chat">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/icons/chat_dakhoa.gif" alt="...">
        </a>
    </section>

    <section class="information">
        <div class="information__bacsi">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/bac_si1.webp" alt="bác sĩ">
        </div>
    </section>
    <section class="banner">
        <div class="banner__button">
            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" aria-label="title" class="box">đặt lịch khám ngay</a>
        </div>
    </section>
    <section class="complication">
        <div class="complication__tile">
            BIỂU HIỆN VÀ BIẾN CHỨNG
        </div>
    </section>
    <section class="complication">
        <div class="complication__body">
            <strong> Biểu hiện:</strong>
            Nổi các nốt sần, gai thịt mềm tại âm đạo, môi lớn, môi bé, cổ tử cung (nữ); Lỗ sáo, quy đầu, bao quy đầu, thân dương vật (nam); Vùng hậu môn hoặc miệng, họng.
        </div>
        <div class="complication__img ">
            <div class="shock_img">
                <img class="" loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/sui_mau_ga.webp" alt="bác sĩ">
            </div>
        </div>
    </section>
    <section class="complication">
        <div class="complication__body">
            <strong> Biến chứng:</strong>
            Ảnh hưởng đến tâm lý, chất lượng cuộc sống và sức khỏe tổng thể. Thậm chí dẫn tới ung thư cổ tử cung (nữ), dương vật (nam), hậu môn hoặc hầu họng.
        </div>
        <div class="complication__img ">
            <div class="shock_img">
                <img class="" loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/sui_mau_ga1.webp" alt="bác sĩ">
            </div>
        </div>
    </section>
    <section class="treatment">
        <a aria-label="chat" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="expert__chat">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/icons/chat_dakhoa.gif" alt="...">
        </a>
    </section>
    <section class="harm">
        <div class="harm__tile">3 TÁC HẠI CỦA SÙI MÀU GÀ</div>
        <div class="harm__body">
            <div class="harm__body-text">
                <div>
                    1. Lây lan nhanh, mạnh, dễ dàng truyền bệnh cho người khác.
                </div>
                <div>
                    2. Các nốt sùi có thể hợp lại với nhau thành khóm lớn và biến chứng gây ung thư cổ tử cung, ung thư âm đạo, ung thư dương vật, ung thư vòm họng v.v….
                </div>
                <div>
                    3. Dễ tái phát bệnh do khả năng miễn dịch suy giảm, quan hệ tình dục không an toàn, điều trị không triệt để.
                </div>
            </div>
        </div>
    </section>

    <section class="virus">
        <div class="virus__title">
            VỊ TRÍ SINH TRƯỞNG CỦA VIRUS HPV TRÊN CƠ THỂ
        </div>
        <div class="virus__list">
            <div class="virus__item">
                Rãnh quy đầu, vùng hãm, bao quy đầu, túi tinh, xung quanh dương vật… của nam giới.
            </div>
            <div class="virus__item">
                Miệng và hậu môn.
            </div>
            <div class="virus__item">
                Môi lớn, môi bé, âm đạo,
                cổ tử cung… của nữ giới.
            </div>
            <div class="virus__item">
                Ngực, vị trí tiếp xúc
                khi quan hệ.
            </div>
        </div>
    </section>

    <section class="infection">
        <div class="infection__title">CON ĐƯỜNG LÂY NHIỄM </div>
    </section>


    <section class="infection">
        <div id="slider">
            <div class="slide_show w-100">
                <div class="list_image">
                    <?php foreach ($slides as $slide): ?>
                        <div class="list_image_card">
                            <img loading="lazy" height="300px" width="300px" src="<?php echo $local . $slide['image']; ?>" alt="<?php echo $slide['alt']; ?>">
                            <div class="list_image_card-text">
                                <div>
                                    <strong><?php echo $slide['symptom']; ?></strong>
                                </div>
                                <div>
                                    <span><?php echo $slide['complication']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="btns">
                    <div class="btn-left btn"><img loading="lazy" width="30px" height="30px" src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_prev.webp" alt="..."></div>
                    <div class="btn-right btn"><img loading="lazy" width="30px" height="30px" src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_next.webp" alt="..."></i></div>
                </div>

            </div>
        </div>
    </section>
    <section class="banner">
        <div class="banner__button">
            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" aria-label="title" class="box">liên hệ ngay</a>
        </div>
    </section>

    <section class="information">
        <div class="information__bacsi">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/phuong_phap.webp" alt="bác sĩ">
        </div>
    </section>
    <section class="information">
        <h2 class="information__tile ">CHỮA SÙI MÀO GÀ BAO NHIÊU TIỀN?</h2>
        <div style="padding: 10px; box-sizing: border-box; text-align: center; font-size: 18px; border: 1px dashed #9b9b9b; ">
            Đơn giá công khai và minh bạch, giúp bệnh nhân lựa chọn phương pháp phù hợp với tài chính. Ngoài ra, còn có nhiều chương trình ưu đãi hỗ trợ giảm chi phí để người bệnh yên tâm hơn.
        </div>
    </section>
    <section class="information">
        <div class="information__bacsi">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/tu_van.webp" alt="bác sĩ">
        </div>
    </section>
    <section id="bs" class="banner">
        <div class="banner__button">
            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" aria-label="title" class="box">đặt lịch tại đây</a>
        </div>
    </section>
    <section  class="information">
        <h2 class="information__tile ">GIỚI THIỆU BÁC SĨ VÕ MINH NGUYỄN</h2>
    </section>
    <section class="information">
        <div class="information__body">
            <div class="information__body-title">
                <img width="30px" height="27px" loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_bv.webp" alt="...">
                <div class="information__body-right">
                    <strong>
                        trình độ học vấn
                    </strong>
                    <div>
                        <strong> THS, BÁC SĨ CHUYÊN KHOA NGOẠI </strong>
                        <span>tại Trường Đại Học Y Hà Nội </span>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="information">
        <div class="information__body">
            <div class="information__body-bottom ">
                <img width="30px" height="27px" loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_bv.webp" alt="...">
                <div class="information__body-right">
                    <strong>
                        quá trình công tác :
                    </strong>
                    <div class="information__body-right-text">
                        <strong> - CÔNG TÁC TẠI KHỐI NGOẠI</strong>
                        <span>tại Bệnh viện Đa khoa Sainpaul Hà Nội: </span>
                        <div class="information__body-right-text-li">
                            . Phẫu thuật thần kinh
                        </div>
                        <div class="information__body-right-text-li">
                            . Tiết niệu
                        </div>
                        <div class="information__body-right-text-li">
                            . Tiêu hóa
                        </div>
                        <div>
                            <strong> - CHUYÊN GIA Y TẾ TẠI NƯỚC NGOÀI</strong>
                        </div>
                        <div>
                            <strong>- TRƯỞNG KHOA NGOẠI BỆNH VIỆN ĐA KHOA TÂM TRÍ SÀI GÒN</strong>
                        </div>
                        <div>
                            <strong> - CHUYÊN MÔN ĐIỀU TRỊ:</strong>
                            <span>Bao quy đầu, tiết niệu tuyến, sinh dục tiết niệu, hậu môn trực tràng, thần kinh trung ương và ngoại biên. </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="information">
        <div class="information__bacsi">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/bac_si.webp" alt="bác sĩ">
        </div>
    </section>

    <section class="information">
        <div class="information__thongtin">
            <div class="information__thongtin-body">
                <div class="information__thongtin-text">
                    “Tôi quan niệm rằng bệnh nhân luôn là trung tâm trong mọi quá trình điều trị. Một người bác sĩ giỏi không chỉ biết chữa bệnh, mà còn phải biết lắng nghe và thấu hiểu những tâm tư của bệnh nhân...”
                </div>
                <div class="information__thongtin-hr">
                    <span></span>
                </div>
                <div class="information__thongtin-bs">VÕ MINH NGUYỄN</div>
            </div>
        </div>
    </section>
    <section class="information">
        <div class="information__bacsi">
            <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/giay_phep.webp" alt="bác sĩ">
        </div>
    </section>
    <section class="time">
        <div class="ping-wrapper">
            <div class="ping-border">
                <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/time.webp" alt="...">
            </div>
        </div>
    </section>

    <section style="background-color: #038291; color: white;" class="contact">
        <div class="contact__title">
            LIÊN HỆ TƯ VẤN VÀ ĐẶT LỊCH KHÁM
        </div>
        <div class="contact__body">
            <div>
                <a style="color: white;" aria-label="phone" href="tel:+0968063109">
                    <strong>HOTLINE: </strong> <span>028 7777 9888</span>
                </a>
            </div>
            <div>
                <a style="color: white;" aria-label="phone" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                    <strong>ZALO: </strong> <span>0968 063 109</span>
                </a>
            </div>
            <div>
                <a style="color: white;" aria-label="phone" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                    <strong>CHAT TRỰC TIẾP </strong>
                </a>
            </div>
            <div>
                <strong>ĐỊA CHỈ: </strong> <span>360 An Dương Vương, P.4, Q.5, TP.HCM</span>
            </div>
        </div>
    </section>
    <div class="footer">
        <img loading="lazy" src="<?php echo $local ?>/images/sui_mau_ga/banner/footer.webp" alt="...">
        <div class="footer__body">
            <div class="footer__body-top">
                <a aria-label="left" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>
                <a aria-label="center" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>
                <a aria-label="right" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>
            </div>
            <div class="footer__body-botom">
                <a aria-label="bottom" href="tel:+0968063109"></a>
            </div>
        </div>
    </div>
    <div class="footer_list_icon1">
        <div>
            <a class="footer_icon_mess" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                <img style="margin-left:3px" src="<?php echo $local ?>/images/icons/icon_message.webp"
                    height="45px" width="45px" alt="..."></img>
                <div class="ping"></div>
                <div class="footer_list_icon_number">10</div>
            </a>
        </div>
    </div>


    <script language="javascript" src="https://npa.zoosnet.net/JS/LsJS.aspx?siteid=NPA46777247&float=1&lng=en"></script>
    <script>
        function animateNumber(element, values, duration) {
            let index = 0;
            const interval = duration / values.length;
            let startTime = null;

            function updateNumber(timestamp) {
                if (!startTime) startTime = timestamp;
                const elapsed = timestamp - startTime;
                if (elapsed >= interval * index && index < values.length) {
                    element.textContent = values[index];
                    index++
                }
                if (index < values.length) {
                    requestAnimationFrame(updateNumber)
                } else {
                    setTimeout(() => {
                        index = 0;
                        startTime = null;
                        requestAnimationFrame(updateNumber)
                    }, 1000)
                }
            }
            requestAnimationFrame(updateNumber)
        }
        const numberElement = document.querySelector('.footer_list_icon_number');
        // const numberElement1 = document.querySelector('.footer_list_icon_number1'); 
        const values = [3, 6, 9, 13, 15, 17, 20, 23, 25];
        animateNumber(numberElement, values, 10000);
    </script>
    <script defer>
        function handleShockImages() {
            //images gây shock
            const shockElements = document.querySelectorAll('.shock_img');
            shockElements.forEach(shockElement => {
                shockElement.classList = 'hiden_img'
                const viewdiv = document.createElement('div');
                viewdiv.id = 'viewdiv';
                viewdiv.className = 'view';
                viewdiv.textContent = 'Hình ảnh có nội dung gây shock !! cân nhất trước khi xem';

                const viewbutton = document.createElement('button');
                viewbutton.id = 'viewbutton';
                viewbutton.className = 'view_button';
                viewbutton.textContent = 'click vào xem';
                // Append the button to the parent of the shockElement (image-container)
                shockElement.appendChild(viewdiv);
                shockElement.appendChild(viewbutton);

                // Add click event listener to the button
                viewbutton.addEventListener('click', () => {
                    // Remove the blur effect
                    shockElement.classList.remove('blurred');
                    shockElement.classList.remove('hiden_img');
                    // Hide the button
                    viewdiv.classList.add('hidden');
                    viewbutton.classList.add('hidden');
                });
            })
        }
    </script>
    <script defer>
        function handlePing() {
            // Số lượng lớp ping cần tạo
            const numberOfLayers = 10;
            // Lấy phần tử chứa các lớp ping
            const pingWrapper = document.querySelector('.ping-wrapper');
            // Hàm tạo màu ngẫu nhiên tươi sáng
            function getRandomBrightColor() {
                // Sử dụng HSL để tạo màu với độ bão hòa và độ sáng cao
                const hue = Math.floor(Math.random() * 360);
                const saturation = 50;
                const lightness = Math.floor(Math.random() * 21) + 20;
                return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
            }

            // Tạo các lớp ping
            for (let i = 1; i <= numberOfLayers; i++) {
                const pingLayer = document.createElement('div');
                pingLayer.className = `ping-layer ping-layer${i}`;
                pingLayer.style.width = `calc(100% + ${10 * i}px)`;
                pingLayer.style.height = `calc(100% + ${10 * i}px)`;
                pingLayer.style.border = '4px solid';
                pingLayer.style.borderColor = getRandomBrightColor();
                pingLayer.style.animationDelay = `${0.2 * (i - 0.6)}s`;
                pingWrapper.appendChild(pingLayer);
            }
        }
        handleShockImages();
        handlePing();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            //         const contentPlaceholder = document.getElementById("content-placeholder");
            //         const bodyPlaceholder = document.getElementById("body-placeholder");
            //         const footer = document.getElementById("footer1");

            //         const loadContent = () => {
            //             contentPlaceholder.innerHTML = ` `;
            //             contentPlaceholder.classList.add("loaded");
            //         };

            //         const loadBody = () => {
            //             bodyPlaceholder.innerHTML = `



            // `;
            //             bodyPlaceholder.classList.add("loaded");
            //             observer.unobserve(bodyPlaceholder);
            //         };

            //         const loadFooter = () => {
            //             footer.innerHTML = `

            //         `;
            //             footer.classList.add("loaded");
            //         }

            //         const observer = new IntersectionObserver((entries) => {
            //             entries.forEach(entry => {
            //                 if (entry.isIntersecting) {
            //                     loadBody();

            //                     loadFooter();
            //                 }
            //             });
            //         });

            //         // Khởi tạo tải content ban đầu và bắt đầu quan sát bodyPlaceholder
            //         loadContent();
            //         observer.observe(bodyPlaceholder);
        });
    </script>
    <script>
        function initImageSlider() {
            const listImage = document.querySelector('.list_image');
            const imgs = document.querySelectorAll('.list_image .list_image_card:nth-child(-n+7)');
            const btnLeft = document.querySelector('.btn-left');
            const btnRight = document.querySelector('.btn-right');
            const indicators = document.querySelectorAll('.index-item');
            const length = imgs.length;
            let current = 0;
            let width = imgs[0].offsetWidth;

            // Chuẩn bị cho các thay đổi để trình duyệt tối ưu hóa
            listImage.style.willChange = 'transform';

            const updateSlide = () => {
                requestAnimationFrame(() => {
                    listImage.style.transform = `translateX(${-width * current}px)`;
                });
            };

            const handleChangeSlide = (direction = 1) => {
                current = (current + direction + length) % length;
                updateSlide();
            };

            btnRight.addEventListener('click', () => {
                handleChangeSlide(1);
            });

            btnLeft.addEventListener('click', () => {
                handleChangeSlide(-1);
            });

            // Đặt lại chiều rộng mỗi khi cửa sổ thay đổi kích thước để đảm bảo sự chính xác
            window.addEventListener('resize', () => {
                width = imgs[0].offsetWidth;
                updateSlide();
            });
        }

        initImageSlider();
    </script>


</body>

</html>