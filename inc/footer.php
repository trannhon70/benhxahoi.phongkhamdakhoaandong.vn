 <footer id="footer" class="footer">
     <div class="footer__top">
         <div class="footer__top-row">
             <div class="footer__top-row-left">
                 <img width="100%" height="auto" src="<?php echo $local ?>/images/users/user_bacsi1.webp" alt="...">
             </div>
             <div class="footer__top-row-right">
                 <div class="footer__top-row-right-body">
                     <div class="footer__top-row-right-body-title">DANH MỤC BỆNH</div>
                     <img width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_line.webp" alt="line">
                     <ul>
                         <li><a href="<?php echo $local ?>">Ngoại Khoa</a></li>
                         <li><a href="<?php echo $local ?>">Da Liễu</a></li>
                         <li><a href="<?php echo $local ?>">Xét Nghiệm</a></li>
                         <li><a href="<?php echo $local ?>">Chuẩn Đoán Hình Ảnh</a></li>
                     </ul>
                     <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="footer__top-row-right-body-img">
                         <img width="284px" height="52px" src="<?php echo $local ?>/images/background/bg_tuvan.webp" alt="...">
                     </a>
                     <div class="footer__top-row-right-body-icon">
                         <div></div>
                         <img class="footer__top-row-right-body-icon-happy" loading="lazy" width="201px" height="201px" src="<?php echo $local ?>/images/icons/icon_happy.webp" alt="...">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer__bottom">
         <img width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/images/background/bg_footer.webp" alt="...">
         <div class="footer__bottom-container">
             <div class="footer__bottom-container-body">
                 <div class="footer__bottom-container-body-list">
                     <div class="footer__bottom-container-body-list-item">
                         <div>
                             <img loading="lazy" width="100px" height="100px" src="<?php echo $local ?>/images/icons/icon_logo.webp" alt="...">
                             <div>
                                 <strong>An Đông</strong>
                                 <p>Phòng khám đa khoa</p>
                             </div>
                         </div>
                         <img width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_line.webp" alt="line">

                     </div>
                     <div class="footer__bottom-container-body-list-item">
                         <img class="footer__bottom-container-body-list-item-img" loading="lazy" width="248px" height="248px" src="<?php echo $local ?>/images/icons/icon_heat1.webp" alt="...">
                     </div>
                 </div>
                 <ul>
                     <li><strong>Địa chỉ:</strong>360 An Dương Vương, P.4, Q.5, TP.HCM</li>
                     <li><strong>Thời gian làm việc: </strong>8:00 - 20:00</li>
                     <li><strong>Hotline: </strong>028 7777 9888</li>
                     <li>Tất cả các ngày trong tuần, kể cả ngày lễ</li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>

 <footer id="footer__mobile" class="footer__mobile">

 </footer>

 <section id="footer_mobileFix">
     <div style="position: relative; margin-top: 3px;">
         <amp-anim loading="lazy" width="768" height="200" src="<?php echo $local ?>/images/background/footer_mobile.gif"
             alt="..." layout="responsive">
         </amp-anim>
         <div class="footer_mobile_a">
             <a aria-label="Tư vấn" style="width: 30%; height: 100px; display: block; "
                 href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
             </a>
             <a aria-label="phone" style="width: 40%; height: 100px; display: block; " href="tel:02877779888"></a>
             <a aria-label="Đăt hẹn" style="width: 30%; height: 100px; display: block; "
                 href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>


         </div>
     </div>
 </section>

 <div class="icon__list">
     <a href="tel:02877779888" class="icon__list-item">
         <img loading="lazy" width="41px" height="41px" src="<?php echo $local ?>/images/icons_chat/icon_phone.webp" alt="...">
     </a>
     <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="icon__list-item1">
         <img loading="lazy" width="41px" height="41px" src="<?php echo $local ?>/images/icons_chat/icon_mess.webp" alt="...">
         <p class="randum__number">
             10
         </p>
     </a>
     <!-- <a href="" class="icon__list-item2" onclick="openModal_footer()"> -->
     <a href="<?php echo $local ?>/khuyen-mai.php?2HQ" class="icon__list-item2">
         <img loading="lazy" width="41px" height="41px" src="<?php echo $local ?>/images/icons_chat/icon_happy.gif" alt="...">
     </a>
 </div>

 <!-- Modal footer -->
 <div id="modal__footer" class="modal__footer" style="display:none;">
     <div class="modal__footer-content">
         <span class="close" onclick="closeModal_footer()">&times;</span>
         <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" style="margin-top: 30px; display:block;">
             <img width="100%" loading="lazy" height="auto" src="<?php echo $local ?>/images/icons_chat/goi-kham.gif" alt="">
         </a>
     </div>
 </div>

 <?php include_once './layout/modalKhuyenMai.php' ?>
 <script language="javascript" src="https://npa.zoosnet.net/JS/LsJS.aspx?siteid=NPA46777247&float=1&lng=en"></script>
 <script>
     // Đợi 10 giây (10000ms) sau khi trang được tải
     window.addEventListener('load', function() {
         setTimeout(function() {
             const script = document.createElement('script');
             script.src = '<?php echo $local ?>/js/random_number.min.js';
             script.defer = true; // Trì hoãn thực thi script cho đến khi nó được tải
             document.body.appendChild(script);
         }, 10000); // 10000ms = 10 giây
     });
 </script>

 <script defer>
     function updateHeaderScripts() {
         // Xóa các script cũ nếu có
         const existingMobileScripts = document.querySelectorAll('script[id^="mobile-"]');
         const existingDesktopScripts = document.querySelectorAll('script[id^="desktop-"]');
         existingMobileScripts.forEach(script => script.remove());
         existingDesktopScripts.forEach(script => script.remove());

         // Thêm script mới dựa trên kích thước cửa sổ
         if (window.innerWidth < 1000) {
             const mobileScripts = [{
                     src: 'js/sidebar_mobile.min.js',
                     id: 'mobile-0'
                 },


             ];
             mobileScripts.forEach(({
                 src,
                 id
             }) => {
                 const script = document.createElement('script');
                 script.src = src;
                 script.id = id;
                 script.defer = true;
                 document.body.appendChild(script);
             });
         } else {
             const desktopScripts = [
                 // {
                 //     src: 'js/slider.min.js',
                 //     id: 'desktop-0'
                 // },

             ];
             desktopScripts.forEach(({
                 src,
                 id
             }) => {
                 const script = document.createElement('script');
                 script.src = src;
                 script.id = id;
                 document.body.appendChild(script);
             });
         }
     }

     updateHeaderScripts();

     function deleteComponent() {

         const header = document.getElementById('header');
         const headerMobile = document.getElementById('header__mobile');
         const vision = document.getElementById('vision');
         const vision__mobile = document.getElementById('vision__mobile');
         const facilities = document.getElementById('facilities');
         const facilities__mobile = document.getElementById('facilities__mobile');
         const footer = document.getElementById('footer');
         const footer__mobile = document.getElementById('footer__mobile');
         const footer_mobileFix = document.getElementById('footer_mobileFix');
         const category__left = document.getElementById('category__left');
         const category_breadcrumb_mobile = document.getElementById('category__right-breadcrumb');

         if (window.innerWidth <= 999) {
             header?.remove();
             vision?.remove();
             facilities?.remove();
             footer?.remove();
             category__left?.remove();

             if (headerMobile) headerMobile.classList.add('block');
             if (vision__mobile) vision__mobile.classList.add('block');
             if (facilities__mobile) facilities__mobile.classList.add('block');
             if (footer__mobile) footer__mobile.classList.add('block');
             if (footer_mobileFix) footer_mobileFix.classList.add('block');
             if (category_breadcrumb_mobile) category_breadcrumb_mobile.classList.add('block');
         } else {
             headerMobile?.remove();
             vision__mobile?.remove();
             facilities__mobile?.remove();
             footer__mobile?.remove();
             footer_mobileFix?.remove();
             category_breadcrumb_mobile?.remove();

             if (header) header.style.display = 'block';
             if (vision) vision.style.display = 'block';
             if (facilities) facilities.style.display = 'block';
             if (footer) footer.style.display = 'block';
             if (category__left) category__left.style.display = 'block';
         }

     }

     deleteComponent()
 </script>
 <script>
    

     function openModal_footer() {
         document.getElementById('modal__footer').style.display = 'block';
     }

     function closeModal_footer() {
         document.getElementById('modal__footer').style.display = 'none';
     }
 </script>

 <script defer>
     if (window.innerWidth < 1000) {
         const footerPlaceholder = document.getElementById("footer__mobile");

         const loadFooter = () => {
             footerPlaceholder.innerHTML = `
             <div class="footer__mobile-top">
         <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/users/user_bacsi1.webp" alt="...">
     </div>
     <div class="footer__mobile-center">
         <div class="footer__mobile-center-body">
             <div class="footer__mobile-center-body-title">danh mục bệnh</div>
             <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/icons/icon_line.webp" alt="line">
             <ul>
                 <li><a href="<?php echo $local ?>">Ngoại Khoa</a></li>
                 <li><a href="<?php echo $local ?>">Da Liễu</a></li>
                 <li><a href="<?php echo $local ?>">Xét Nghiệm</a></li>
                 <li><a href="<?php echo $local ?>">Chuẩn Đoán Hình Ảnh</a></li>
             </ul>
             <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="footer__mobile-center-body-img">
                 <img loading="lazy" width="50%" height="auto" src="<?php echo $local ?>/images/background/bg_tuvan.webp" alt="...">
             </a>
             <div style="margin-top: 15px;">
                 <img width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/images/background/map.webp" alt="...">
             </div>
         </div>
         <img class="footer__mobile-center-img" loading="lazy" width="86px" height="86px" src="<?php echo $local ?>/images/icons/icon_heat1.webp" alt="...">
     </div>
     <div class="footer__mobile-bottom">

         <div class="footer__mobile-bottom-logo">
             <img loading="lazy" width="100px" height="100px" src="<?php echo $local ?>/images/icons/icon_logo.webp" alt="...">
             <div>
                 an đông
             </div>
             <p>phòng khám đa khoa</p>
         </div>
         <ul>
             <li><strong>Địa chỉ:</strong>An Dương Vương, P.4, Q.5, TP.HCM</li>
             <li><strong>Hotline: </strong>028 7777 9888</li>
             <li><strong>Thời gian làm việc: </strong>8:00 - 20:00</li>
             <li>Tất cả các ngày trong tuần, kể cả ngày lễ</li>
         </ul>
     </div>
    `;
             footerPlaceholder.classList.add("loaded");
             observer.unobserve(footerPlaceholder);
         };
         const observer = new IntersectionObserver((entries) => {
             entries.forEach(entry => {
                 if (entry.isIntersecting) {

                     console.log('sadasdsa');

                     loadFooter();
                 }
             });
         });


         observer.observe(footerPlaceholder);
     }
 </script>

 <script>
    new PerformanceObserver((list) => {
  const latestEntry = list.getEntries().at(-1);

  if (latestEntry?.element?.getAttribute('loading') == 'lazy') {
    console.warn('Warning: LCP element was lazy loaded', latestEntry);
  }
}).observe({type: 'largest-contentful-paint', buffered: true});
 </script>



<script >
   document.addEventListener('DOMContentLoaded', () => {
    const checkUrl = window.location.pathname.split('/');
    const fileName = checkUrl[checkUrl.length - 1];
    if (fileName === 'khuyen-mai.php') {
        const observer = new MutationObserver(() => {
            const footerTop = document.querySelector('.footer__mobile-top');
            if (footerTop) {
                footerTop.style.display = 'none';
                observer.disconnect(); // Ngừng quan sát sau khi thực hiện
            }
        });

        observer.observe(document.body, { childList: true, subtree: true });
    }
});
</script>
 </body>

 </html>