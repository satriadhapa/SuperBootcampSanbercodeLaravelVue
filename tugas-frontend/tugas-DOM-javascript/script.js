document.addEventListener('DOMContentLoaded', function() {
    var items = [
        ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', "./assets/logitek.jpg"], 
        ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', "./assets/msi.jpg"],
        ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', "./assets/genius.jpeg"],
        ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', "./assets/jerry.jpg"]
    ];

    let cartCount = 0;

    // fungsi untuk menampilkan list produk
    function displayProducts(productList) {
        const listBarang = document.getElementById('listBarang');
        listBarang.innerHTML = '';
        productList.forEach(item => {
            const productCard = `
                <div class="col-4 mt-2">
                    <div class="card" style="width: 18rem;">
                        <img src="${item[4]}" class="card-img-top" height="200px" width="200px" alt="${item[1]}">
                        <div class="card-body">
                            <h5 class="card-title">${item[1]}</h5>
                            <p class="card-text">${item[3]}</p>
                            <p class="card-text">Rp ${item[2].toLocaleString()}</p>
                            <a href="#" class="btn btn-primary add-to-cart" data-id="${item[0]}">Tambahkan ke keranjang</a>
                        </div>
                    </div>
                </div>`;
            listBarang.insertAdjacentHTML('beforeend', productCard);
        });
    }
    // ambil product berdasarkan pencarian di form search
    document.getElementById('formItem').addEventListener('submit', function(event) {
        event.preventDefault();
        const keyword = document.getElementById('keyword').value.toLowerCase();
        const filteredItems = items.filter(item => item[1].toLowerCase().includes(keyword));
        displayProducts(filteredItems);
    });

    // memanggil fungsi untuk menampilkan produk
    displayProducts(items);
});