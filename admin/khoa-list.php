<?php
ob_start();
include 'inc/header.php';
include '../classes/user.php';
include '../classes/benh.php';
include '../classes/khoa.php';

if (Session::get('role') === '1') {
    $users = new Users();
    $benh = new Benh();
    $khoa = new Khoa();

    $getAllDSKhoa = $khoa->getAllKhoa();

    $message = null;
   
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }

    $tenBenh = isset($_GET['ten-benh']) ? $_GET['ten-benh'] : '';
    $IdKhoa = isset($_GET['id-khoa']) ? $_GET['id-khoa'] : '';

    $limit = 10;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $list_benh = $khoa->getPaginationKhoas($limit, $offset);
    $total_articles = $khoa->getTotalCountKhoas();
    $total_pages = ceil($total_articles / $limit);

?>

<style>
    .action .action_edit {
        text-decoration: none;
        color: orange;
    }

    .action .action_delete {
        text-decoration: none;
        color: red;
    }

    .action .action_view {
        text-decoration: none;
        color: #01969a;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">khoa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách khoa</li>
    </ol>
</nav>



<div style="padding: 10px;">
    <table style="background-color: #a9c2c3; border-collapse: inherit; border-radius: 10px; " class="table table-striped table-hover">
        <thead>
            <tr>
                <th style="border-top-left-radius: 8px; " scope="col">ID</th>
                <th scope="col">Tên khoa</th>
                <th scope="col">Slug</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Ngày tạo</th>
            </tr>
        </thead>
        <tbody style="border-bottom-right-radius: 8px; ">
            <?php
            if ($list_benh) {
                while ($result = $list_benh->fetch_assoc()) {
                    $hiden = 'Đang ẩn';
                    if ($result['hiden'] === '0') {
                        $hiden = 'Đang hiển thị';
                    }
            ?>
                    <tr>
                        <th scope="row"><?php echo $result['id']; ?></th>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['slug']; ?></td>
                        <td style="width: 200px;">
                            <select style="text-transform: capitalize;" name="id_khoa" class="form-select" onchange="getOptionValue(this, '<?php echo $result['id']; ?>')">
                                <?php if ($result['hiden'] === '0') { ?>
                                    <option style="text-transform: capitalize;" value="0" selected>Đang hiển thị</option>
                                    <option style="text-transform: capitalize;" value="1">Đang ẩn</option>
                                <?php } else { ?>
                                    <option style="text-transform: capitalize;" value="0">Đang hiển thị</option>
                                    <option style="text-transform: capitalize;" value="1" selected>Đang ẩn</option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><?php echo $result['created_at']; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <div style="display: flex; align-items: flex-end; justify-content: flex-end; ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($total_pages > 1) : ?>
                    <?php if ($page > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?ten-benh=<?php echo $tenBenh ?>&id-khoa=<?php echo $IdKhoa ?>&page=<?php echo $page - 1; ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php if ($page > 2) : ?>
                        <li class="page-item"><a class="page-link" href="?ten-benh=<?php echo $tenBenh ?>&id-khoa=<?php echo $IdKhoa ?>&page=1">1</a></li>
                    <?php endif; ?>

                    <?php if ($page > 3) : ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>

                    <?php for ($i = max(1, $page - 1); $i <= min($page + 1, $total_pages); $i++) : ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>"><a class="page-link" href="?ten-benh=<?php echo $tenBenh ?>&id-khoa=<?php echo $IdKhoa ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages - 2) : ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>

                    <?php if ($page < $total_pages - 1) : ?>
                        <li class="page-item"><a class="page-link" href="?ten-benh=<?php echo $tenBenh ?>&id-khoa=<?php echo $IdKhoa ?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
                    <?php endif; ?>

                    <?php if ($page < $total_pages) : ?>
                        <li class="page-item"><a class="page-link" href="?ten-benh=<?php echo $tenBenh ?>&id-khoa=<?php echo $IdKhoa ?>&page=<?php echo $page + 1; ?>">Next</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    async function postData(url, data) {
        try {
            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            let result = await response.json();
            if (result.status === 'success') {
                toastr.success(result.message);
            } else {
                toastr.error(result.message);
            }
            return result;
        } catch (error) {
            toastr.error("Đã xảy ra lỗi khi gọi API: " + error.message);
            throw error;
        }
    }

    async function getOptionValue(select, khoa_id) {
        let hidden = select.value;
        let formData = {
            khoa_id: khoa_id,
            hidden: hidden
        };
        try {
            let responses = await Promise.all([
                postData("<?php echo $local ?>/api/khoa/update-hidden-benh.php", formData),
              
            ]);

            let errorFound = responses.some(response => response.status !== 'success');
            if (errorFound) {
                toastr.error("Có lỗi xảy ra khi thực hiện cập nhật.");
            } else {
                // toastr.success("Cập nhật thành công.");
            }
        } catch (error) {
            toastr.error("Đã xảy ra lỗi khi gọi API: " + error.message);
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        <?php if ($message) : ?>
            toastr.<?php echo $message['status']; ?>('<?php echo $message['message']; ?>');
        <?php endif; ?>
    });

    function redirectToSelf() {
        location.href = "<?php echo $_SERVER['PHP_SELF']; ?>";
    }
</script>

<?php
    include 'inc/footer.php';
} else {
?>
    <div style="display: flex; align-items: center; justify-content: center; font-size: 30px; text-transform: uppercase; font-weight: 600; height: 90vh; color: red; ">Trang này không tồn tại</div>
<?php
}
?>
