function addProduct(base_url){
    document.getElementById("nama").value = "";
    document.getElementById("harga").value = "";
    document.getElementById("jenis").value = "";
    document.getElementById("deskripsi").value = "";
    document.getElementById("foto").innerHTML = "";
    document.getElementById("id_product").value = "";
    document.getElementById("modal-title").innerHTML = "Form Tambah Product";
    document.getElementById("action").action = base_url + 'product/addProduct';
}

function updateProduct(id,nama,harga,jenis,foto,base_url){
    
    $.ajax({
        type        : "GET",
        url         : base_url + 'product/readDataById/' + id,
        dataType    : "html",
        success     : function(response){
           var data = JSON.parse(response);
           document.getElementById("deskripsi").value = data.deskripsi;
        }
    });
    document.getElementById("nama").value = nama;
    document.getElementById("harga").value = harga;
    document.getElementById("jenis").value = jenis;
    document.getElementById("foto").innerHTML = foto;
    document.getElementById("id_product").value = id;
    document.getElementById("modal-title").innerHTML = "Form Ubah Product";
    document.getElementById("action").action = base_url + 'product/updateProduct';
}

function deleteProduct(id,base_url){
    document.getElementById("btn_delete").href = base_url + "product/deleteProduct/"+ id;
}

function seeImageProduct(image,base_url){
    document.getElementById("image").src = base_url + 'assets/image_product/' + image;
}

function updateJenis(id,nama){
    document.getElementById('jenis').value = nama;
    document.getElementById("id_jenis").value = id;
}

function deleteJenis(id,base_url){
    document.getElementById('btn_delete').href = base_url +'jenis/deleteJenis/'+id;
}