function addDataCourier(base_url){
    document.getElementById("username").value = "";
    document.getElementById("email").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("no_hp").value = "";
    document.getElementById("wilayah").value = "";
    document.getElementById("modal_title").innerHTML = "Form Tambah Kurir";
    document.getElementById("form").action = base_url + "courier/addData/";
    document.getElementById("username").readOnly =false;
}

function seeImage(base_url,locPhoto){
    if(locPhoto == ""){
        $('#image_courier').hide();
        $('#notif_image').show()
    }else{
        $('#notif_image').hide()
        $('#image_courier').show();
        document.getElementById('image_courier').src = base_url +locPhoto;
    }
}

function updateDataCourier(base_url,nama,phone,email,username,wilayah){
    document.getElementById("username").value = username;
    document.getElementById("email").value = email;
    document.getElementById("nama").value = nama;
    document.getElementById("no_hp").value = phone;
    document.getElementById("wilayah").value = wilayah;
    document.getElementById("modal_title").innerHTML = "Form Ubah Data Kurir";
    document.getElementById("form").action = base_url + "courier/updateData/";
    document.getElementById("username").readOnly =true;
}

function updateWilayah(base_url,id,nama){
    document.getElementById("id_wilayah").value = id;
    document.getElementById("wilayah").value = nama;
}

function deleteWilayah(id,base_url){
    document.getElementById("btn_delete").href = base_url+'wilayah/deleteWilayah/'+id;
}

function deleteCourier(base_url,id){
    document.getElementById('btn_delete').href = base_url + 'courier/deleteCourier/'+id;
}