<?php include_once "inc/header.php" ?>
<?php
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$slug = basename(parse_url($current_url, PHP_URL_PATH), '.html');

$getPostDetail = null;

$postDetail = $bai_viet->getBaiViet_bySlug($slug);

if (isset($postDetail) && isset($postDetail['name_khoa'])) {
    $getPostDetail = $postDetail;
} else {
    $postTinTuc = $bai_viet->getBaiVietDauTienByBenh($slug);
    if ($postTinTuc) {
        $getPostDetail = $postTinTuc;
    } else {
        $getPostDetail = null;
    }
}
// var_dump($getPostDetail);
function setTitleAndScroll()
{
    global $getPostDetail; // Đảm bảo truy cập biến toàn cục
    if ($getPostDetail && isset($getPostDetail['tieu_de'])) {
        // Lấy các giá trị từ $getPostDetail
        $title = isset($getPostDetail['tieu_de']) ? $getPostDetail['tieu_de'] : 'Default Title';
        $description = isset($getPostDetail['descriptions']) ? $getPostDetail['descriptions'] : 'Default Description';
        $keywords = isset($getPostDetail['keyword']) ? $getPostDetail['keyword'] : 'default, keywords';
        $image = isset($getPostDetail['img']) ? $getPostDetail['img'] : '/path/to/default-image.jpg';

        // Chuyển đổi các giá trị sang dạng an toàn cho HTML và JavaScript
        $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $safeKeywords = htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8');
        $safeImage = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');

        // Đảm bảo rằng bạn chèn vào trong thẻ <head>
        echo "<title>$safeTitle</title>\n";
        echo "<meta name='description' content='$safeDescription'>\n";
        echo "<meta name='keywords' content='$safeKeywords'>\n";
        echo "<meta property='og:title' content='$safeTitle'>\n";
        echo "<meta property='og:description' content='$safeDescription'>\n";
        echo "<meta property='og:image' content='https://andongclinic.vn/admin/uploads/$safeImage'>\n";
        echo "<meta property='og:image:width' content='1200'>\n";
        echo "<meta property='og:image:height' content='630'>\n";
        echo "<meta property='og:type' content='article'>\n";
        echo "<meta property='og:url' content='https://andongclinic.vn/{$getPostDetail['slug']}.html'>\n";
    }
}
setTitleAndScroll();
?>
<link rel="stylesheet" href="css/danh_muc.min.css">

</head>

<body>

    <?php if (isset($getPostDetail['hiden_khoa']) && $getPostDetail['hiden_khoa'] === '1'): ?>
        <script type="text/javascript">
            window.location.href = "<?php echo $local ?>/404.php";
        </script>
    <?php endif; ?>

    <?php if (isset($getPostDetail)) { ?>
        <?php include "layout/header_layout.php" ?>
        <main>
            <article>
                <div class="category">
                    <div id="category__left" class="category__left">
                        <div class="category__left-icon">
                            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_call.webp" alt="...">
                            </a>
                            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_lich.webp" alt="...">
                            </a>
                            <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                                <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_mess.webp" alt="...">
                            </a>
                        </div>
                        <div class="category__left-doctor">
                            <div class="category__left-doctor-list">
                                <div class="category__left-doctor-list-item category__left-doctor-list-item-active">
                                    <div class="category__left-doctor-list-item-title">
                                        BS. cao hữu minh
                                    </div>
                                    <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/user_bacsiminh1.webp" alt="...">
                                </div>
                                <div class="category__left-doctor-list-item ">
                                    <div class="category__left-doctor-list-item-title">
                                        BS. Võ minh nguyễn
                                    </div>
                                    <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/user_bacsinguyen1.webp" alt="...">
                                </div>
                            </div>
                            <div class="category__left-doctor-pagi">
                                <div class="category__left-doctor-pagi-item category__left-doctor-pagi-item-active"></div>
                                <div class="category__left-doctor-pagi-item "></div>
                            </div>
                        </div>
                        <div class="category__left-questions">
                            <div class="category__left-questions-title">
                                Câu hỏi mới nhất
                            </div>
                            <span></span>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>1</span>
                                <div>Khám nam khoa ở đâu uy tín?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>2</span>
                                <div>Cắt bao quy đầu bao nhiêu tiền?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>3</span>
                                <div>Cách điều trị xuất tinh sớm hiệu quả?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>4</span>
                                <div>Dương vật không cương là bệnh gì?</div>
                            </a>
                            <a href="<?php echo $local ?>" class="category__left-questions-item">
                                <span>5</span>
                                <div>Chi phí chữa sùi mào gà bao nhiêu?</div>
                            </a>
                        </div>
                        <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="category__left-promotion">
                            <img width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/images/background/bg_khuyenmai.webp" alt="...">
                        </a>
                    </div>
                    <div class="category__right">
                        <div id="category__right-breadcrumb" class="category__right-breadcrumb">
                            Trang chủ > <?php echo $getPostDetail['name_khoa'] ?> > <?php echo $getPostDetail['name_benh'] ?>
                        </div>
                        <?php if ($getPostDetail !== 'Hiện tại dữ liệu này chưa có bài viết!') { ?>
                            <h1 id="titleBaiViet" class="category__right-title">
                                <?php echo $getPostDetail['tieu_de'] ?>
                            </h1>
                            <div id="banner_mobile" style="padding: 0px 10px;">
                                <section class="cardbs">
                                    <div class="cardbs__body">
                                        <div class="cardbs__body-left">
                                            <img loading="lazy" width="100%"
                                                src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_bs.webp" alt="...">
                                        </div>
                                        <div class="cardbs__body-right">
                                            <div class="cardbs__body-right-bs">
                                                BS Võ Minh Nguyễn
                                            </div>
                                            <div class="cardbs__body-right-ck">
                                                Chuyên khoa ngoại
                                            </div>
                                            <div class="cardbs__body-right-ct">
                                                Từng công tác tại Bệnh viện Chuyên khoa Sainpaul Hà Nội <a href="<?php echo $local ?>/chuyen-de-sui-mao-ga.php">xem thêm...</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="section__button">
                                    <a aria-label="liên hệ" class="animated-button"
                                        href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        tư vấn với bác sĩ tại đây</a>
                                </section>


                            </div>
                           
                            <div  style="background-color: #DBEAFD; padding: 6px; box-sizing: border-box; border-radius: 10px; display: flex; align-items: center; gap: 10px; font-size: 16px; color: red; margin-top: 10px; line-height: 21px; " >
                                <img loading="lazy" width="30px" height="30px" src="<?php echo $local ?>/images/icons/icon_KM2025.gif" alt="...">
                                <div>
                                <strong>**Khuyến mãi</strong>: Chào năm mới 2025 phòng khám gửi tới bệnh nhân chương trình ưu đãi lớn.
                                Dành cho khách hàng đăng ký trong ngày hôm nay.  <a href="<?php echo $local ?>/khuyen-mai.php?2CT"><strong>Xem chi tiết tại đây</strong></a>
                                </div>
                            </div>
                            <!-- <div class="danhmuc__menu">
                                <div class="danhmuc__menu-top">
                                    <img loading="lazy" src="<?php echo $local ?>/images/icons/icon_menu.webp" height="20px" width="25px" alt="..."></img>
                                    <span>Mục lục</span>
                                </div>
                                <nav class="danhmuc__menu-nav">
                                    <ul>

                                    </ul>
                                </nav>
                            </div> -->

                            <div style="padding-top:10px">
                                <?php if (Session::get('role') === '1' || Session::get('role') === '2') {
                                ?>
                                    <?php if (isset($getPostDetail) && isset($getPostDetail['name_khoa'])) { ?>
                                        <a class="chinh-sua"
                                            href="<?php echo $local ?>/admin/bai-viet-edit.php?edit=<?php echo $getPostDetail['id'] ?>"><i
                                                style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa</a>
                                    <?php } else { ?>
                                        <a class="chinh-sua"
                                            href="<?php echo $local ?>/admin/tin-tuc-edit.php?edit=<?php echo $getPostDetail['id'] ?>">
                                            <i style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa</a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div id="bai-viet" class="body-placeholder">

                            </div>
                            <div class="bai-viet-footer">Nội dung bài viết cung cấp nhằm mục đích tham khảo thêm kiến thức y tế,
                                một số nội dung có thể không thuộc nghiệp vụ của phòng khám chúng tôi, Hiệu quả của việc hỗ trợ
                                điều trị phụ thuộc vào cơ địa của mỗi người. Cần biết thông tin liên hệ để được tư vấn trực
                                tuyến miễn phí.<a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">[TƯ VẤN TRỰC TUYẾN]</a>
                            </div>
                    </div>
                <?php } else { ?>
                    <div><?php echo $getPostDetail ?></div>
                <?php } ?>
                </div>
                <?php include_once './layout/comment_layout.php' ?>
            </article>
        </main>

        <?php include_once "inc/footer.php" ?>
        <script defer>
            const itemsCate = document.querySelectorAll('.category__left-doctor-list-item')
            const pagiItems = document.querySelectorAll('.category__left-doctor-pagi-item');
            let current = 0

            function changeSlide(index) {
                itemsCate[current].classList.remove('category__left-doctor-list-item-active');
                pagiItems[current].classList.remove('category__left-doctor-pagi-item-active');

                current = index;

                itemsCate[current].classList.add('category__left-doctor-list-item-active');
                pagiItems[current].classList.add('category__left-doctor-pagi-item-active');
            }

            // Gắn sự kiện click cho các nút phân trang
            pagiItems.forEach((item, index) => {
                item.addEventListener('click', () => {
                    changeSlide(index);
                });
            });

            // Khởi động với slide đầu tiên
            changeSlide(0);

            setInterval(() => {
                let nextIndex = (current + 1) % itemsCate.length;
                changeSlide(nextIndex);
            }, 5000);
        </script>

        <!-- <script defer>
            const slug = "<?php echo $slug; ?>";

            function fetchPostData() {
                fetch(`<?php echo $local ?>/api/baiviet/get-by-slug-bai-viet.php?slug=${slug}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            const titleContainer = document.getElementById('titleBaiViet');
                            const contentContainer = document.getElementById('bai-viet');
                            // Kiểm tra và cập nhật tiêu đề nếu thay đổi
                            if (titleContainer.innerText !== (data.data.tieu_de || 'Không có tiêu đề')) {
                                // titleContainer.innerText = data.data.tieu_de || 'Không có tiêu đề';
                            }
                            // Kiểm tra và cập nhật nội dung nếu thay đổi
                            if (contentContainer.innerHTML !== (data.data.content || 'Không có nội dung')) {
                                // contentContainer.innerHTML = data.data.content || 'Không có nội dung';
                                // applyCSSandJS(); // Chỉ gọi lại nếu nội dung thay đổi
                                // checkImgMobile(); // Chỉ gọi lại nếu nội dung thay đổi
                            }
                        } else {
                            console.log('Không tìm thấy dữ liệu');
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi fetch dữ liệu:', error);
                    });
            }
            // Gọi hàm fetch ngay lập tức, sau đó mỗi 10 giây
            // fetchPostData();

            // setInterval(fetchPostData, 10000);
        </script> -->

        <script defer>
            function applyCSSandJS() {

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

                let baiVietElement = document.getElementById('bai-viet');
                if (baiVietElement) {
                    let pElements = baiVietElement.getElementsByTagName('p');
                    for (let i = 0; i < pElements.length; i++) {
                        pElements[i].style.color = '#000000'; // Ghi đè CSS trước đó
                        pElements[i].style.fontWeight = 400;
                        pElements[i].style.fontSize = '13px';
                        pElements[i].style.lineHeight = '27px';
                    }
                }

                let imgElements = baiVietElement.getElementsByTagName('img');
                if (imgElements) {
                    for (let i = 0; i < imgElements.length; i++) {
                        // convert link img
                        if (imgElements[i].src.startsWith('<?php echo $local ?>/ckeditor/uploads/') == true) {
                            let urlParts = imgElements[i].src.split('/');
                            let fileName = urlParts[urlParts.length - 1];
                            imgElements[i].src = '<?php echo $local ?>/admin/ckeditor/uploads/' + fileName;
                        }



                        //hiển thị css img chatbox
                        if (imgElements[i].src.startsWith('<?php echo $local ?>/ckfinder/userfiles/images/Chat/Chat-Dakhoa.gif') ==
                            // if (imgElements[i].src.startsWith('http://localhost/ckfinder/userfiles/images/Chat/Chat-Dakhoa.gif') ==
                            true) {
                            imgElements[i].style.borderRadius = '8px';
                            imgElements[i].style.setProperty('display', 'block', 'important');
                            let divWrapper = document.createElement('a');
                            divWrapper.className = 'glow-on-hover';
                            divWrapper.href = "https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en";
                            imgElements[i].parentNode.insertBefore(divWrapper, imgElements[i]);
                            divWrapper.appendChild(imgElements[i])
                        }

                    }

                }

                if (baiVietElement) {
                    let h2Elements = baiVietElement.getElementsByTagName('h2');
                    for (let i = 0; i < h2Elements?.length; i++) {

                        h2Elements[i].classList.add('custom-h2-style');

                    }

                    let h3Element = baiVietElement.getElementsByTagName('h3');

                    for (let i = 0; i < h3Element.length; i++) {
                        h3Element[i].style.color = '#00D8D8';
                        h3Element[i].style.fontWeight = '700';
                        h3Element[i].style.fontSize = '18px';
                        h3Element[i].style.textTransform = 'capitalize';
                        h3Element[i].style.background =
                            'url("<?php echo $local ?>/images/icons/icon_mui.gif") no-repeat left center';
                        h3Element[i].style.backgroundSize = '21px 21px';
                        h3Element[i].style.paddingLeft = '25px';
                        h3Element[i].style.margin = '7px 0px';
                    }
                }

                var rightBottom = document.querySelector('.category__left-promotion');
                var containerRow = document.querySelector('.category');
                var rightColumn = document.querySelector('.category__left');
                var rightCenter = document.querySelector('.category__left-questions');
                var baiViet = document.getElementById('bai-viet');

                if (rightBottom && containerRow && rightColumn && baiViet) {
                    window.addEventListener('scroll', function() {
                        var containerRowRect = containerRow.getBoundingClientRect();
                        var rightColumnRect = rightColumn.getBoundingClientRect();
                        var rightBottomHeight = rightBottom.offsetHeight;
                        var rightCenterRect = rightCenter.getBoundingClientRect();
                        var baiVietRect = baiViet.getBoundingClientRect();

                        // Kiểm tra khi scroll đến hết nội dung của id="bai-viet"
                        if (baiVietRect.bottom > window.innerHeight) {
                            if (containerRowRect.bottom - (rightBottomHeight - 700) <= window.innerHeight) {
                                rightBottom.style.position = 'absolute';
                                rightBottom.style.bottom = '0';
                                rightBottom.style.top = 'unset';
                            } else if (rightColumnRect.top + rightCenterRect.height <= 0) {
                                rightBottom.style.position = 'fixed';
                                rightBottom.style.top = '20px';
                                rightBottom.style.bottom = 'unset';
                                rightBottom.style.width = '275px';
                            } else {
                                rightBottom.style.position = 'relative';
                                rightBottom.style.top = 'unset';
                                rightBottom.style.bottom = 'unset';
                            }
                        } else {
                            rightBottom.style.position = 'relative';
                            rightBottom.style.top = 'unset';
                            rightBottom.style.bottom = 'unset';
                        }
                    });


                } else {
                    console.warn("One or more elements were not found in the DOM.");
                }
                // Create menu for h2 and h3
                // const menuNav = document.querySelector('.danhmuc__menu-nav > ul');
                // const headings = baiVietElement.querySelectorAll('h2, h3');

                // let currentH2 = null;
                // let menuList = document.createElement('ul');
                // headings.forEach((heading) => {
                //     const id = heading.textContent.replace(/\s+/g, '-').toLowerCase();
                //     heading.id = id;
                //     if (heading.tagName === 'H2') {
                //         if (currentH2) {
                //             // Append the previous menuList under the last H2
                //             currentH2.appendChild(menuList);
                //         }
                //         // Create a new H2 list item
                //         currentH2 = document.createElement('li');
                //         currentH2.classList.add('danhmuc__menu-item');
                //         const h2Link = document.createElement('a');
                //         h2Link.href = `#${id}`;
                //         h2Link.textContent = heading.textContent;
                //         currentH2.appendChild(document.createElement('span')); // Add the span
                //         currentH2.appendChild(h2Link);
                //         menuList = document.createElement('ul');
                //         menuNav.appendChild(currentH2);
                //     } else if (heading.tagName === 'H3' && currentH2) {
                //         // Create a new H3 list item
                //         const h3Item = document.createElement('li');
                //         h3Item.classList.add('danhmuc__menu-subitem');
                //         const h3Link = document.createElement('a');
                //         h3Link.href = `#${id}`;
                //         h3Link.textContent = `> ${heading.textContent}`;
                //         h3Item.appendChild(h3Link);
                //         // Create a new ul for h3 items if not already created
                //         if (!menuList.classList.contains('danhmuc__menu-ul')) {
                //             menuList.classList.add('danhmuc__menu-ul');
                //         }
                //         menuList.appendChild(h3Item);
                //     }
                // });
                // // Append the last menuList (for the last H2)
                // if (currentH2) {
                //     currentH2.appendChild(menuList);
                // }
                // // Smooth scroll when clicking on menu links
                // menuNav.addEventListener('click', (event) => {
                //     if (event.target.tagName === 'A') {
                //         event.preventDefault();
                //         const targetId = event.target.getAttribute('href').substring(1);
                //         const targetElement = document.getElementById(targetId);
                //         if (targetElement) {
                //             targetElement.scrollIntoView({
                //                 behavior: 'smooth'
                //             });
                //         }
                //     }
                // });
            }
        </script>

        <script>
            const bodyPlaceholder = document.getElementById("bai-viet");

            const loadBody = () => {
                let content = `<?php echo htmlspecialchars_decode($getPostDetail['content']); ?>`;
                const phoneRegex = /0968\s063\s109/g; // Regex tìm số điện thoại
                content = content.replace(phoneRegex, '0968 063 109, 028 7777 9888'); 
                const addressRegex = /360,\sAn\sDương\sVương,\sP\.4,\sQ\.5,\sTPHCM\./g;
                content = content.replace(addressRegex, 'An Dương Vương, P.4, Q.5, TPHCM.');
                const multiTagRegex = /Đa\sKhoa/gi;
                content = content.replace(multiTagRegex, 'Chuyên khoa');
                bodyPlaceholder.innerHTML = content;
                bodyPlaceholder.classList.add("loaded");
                observer.unobserve(bodyPlaceholder);
            };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {

                        loadBody();
                        applyCSSandJS();
                        checkImgMobile();
                    }
                });
            });

            // Khởi tạo tải content ban đầu và bắt đầu quan sát bodyPlaceholder

            observer.observe(bodyPlaceholder);
        </script>
    <?php } else { ?> <div
            style="display:flex;align-items:center;justify-content:center;color:red;font-size:30px;height:100vh">link bài
            viết này không tồn tại!</div> <?php } ?>