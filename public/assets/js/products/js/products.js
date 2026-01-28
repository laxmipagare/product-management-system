$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    loadProducts();
    const productForm = '#productForm';
    $(document).on('submit', productForm, function (e) {
        e.preventDefault();
        let url = window.productStoreUrl
        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                $('#alertBox').html(`
                    <div class="alert alert-success alert-dismissible fade show">
                        ${res.success}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                loadProducts();
                $('#productForm')[0].reset();
                setTimeout(function () {
                        window.location.reload(); 
                    }, 800);
            }
        });
    });

    const editproductForm = '#editproductForm';
    $(document).on('submit', editproductForm, function (e) {
        e.preventDefault();
        let id = $('#product_id').val();
        let url = `${window.productUpdateUrl}/${id}`;

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                $('#editalertBox').html(`
                    <div class="alert alert-success alert-dismissible fade show">
                        ${res.success}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                loadProducts();
                $('#product_id').val('');
                setTimeout(function () {
                        window.location.reload(); 
                    }, 800);
            }
        });
    });

});

function loadProducts() {
    $.get(window.productListUrl, function (data) {
        let rows = '';
        $.each(data, function (i, p) {
            rows += `<tr>
                <td>${i + 1}</td>
                <td>${p.product_name}</td>
                <td>${p.product_price}</td>
                <td>
                    <a href=${window.baseUrl}/products/edit/${p.id} class="btn btn-sm btn-success">Edit</a>
                    <button onclick="deleteProduct(${p.id})" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>`;
        });
        $('#productTable tbody').html(rows);
    });
}

function editProduct(id) {
    $.get(window.baseUrl + '/products/edit/' + id, function(product) {
        //console.log(product);
        $('#product_id').val(product.id);
        $('input[name="product_name"]').val(product.product_name);
        $('input[name="product_price"]').val(product.product_price);
        $('textarea[name="product_description"]').val(product.product_description);
        // Note: You cannot pre-fill file inputs for security reasons
        // You may show existing images separately
        let imagesHtml = '';
        if(product.product_image) {
            product.product_image.forEach(function(img) {
                imagesHtml += '<img src="/uploads/'+img+'" width="50" style="margin:5px">';
            });
        }
        $('#existingImages').html(imagesHtml);
    });
}


function deleteProduct(id) {
    if (!confirm('Are you sure you want to delete this product?')) return;

    $.ajax({
        url: `${window.baseUrl}/products/delete/${id}`,
        type: 'DELETE',
        success: function(res){
            $('#deletealertBox').html(`
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ${res.success}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
            loadProducts(); // reload table
        },
        error: function(err) {
            console.log(err);
            alert('Something went wrong');
        }
    });
}


