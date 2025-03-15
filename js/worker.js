self.onmessage = (e) => {
    const { slug, local } = e.data;

    // Fetch dữ liệu từ API
    fetch(`${local}/api/baiviet/get-by-slug-bai-viet.php?slug=${slug}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Gửi dữ liệu lại về main thread
            self.postMessage({ success: true, data });
        })
        .catch(error => {
            // Gửi thông báo lỗi về main thread
            self.postMessage({ success: false, error: error.message });
        });
};