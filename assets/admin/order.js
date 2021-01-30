function infoPemesan(nama, no_hp, alamat) {
	document.getElementById("info_nama").innerHTML = nama;
	document.getElementById("info_telepon").innerHTML = no_hp;
	document.getElementById("info_alamat").innerHTML = alamat;
}

function infoPesanan(id_order, base_url) {
	clearTable();
	$.ajax({
		type: "GET",
		url: base_url + "order/readDataByIdOrder/" + id_order,
		dataType: "html",
		success: function (response) {
			var data = JSON.parse(response);
			var ongkir = data[0].shipping_costs;
			var biayaTambahan = data[0].additional_costs;
			var total = 0;
			var k = 1;
			for (var i = 0; i < data.length; i++) {
				var tr = $("<tr>");
				tr.append("<td>" + k++ + "</td>");
				tr.append("<td>" + data[i].nama_ikan + "</td>");
				tr.append(
					"<td> Rp " +
						data[i].harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
						"</td>"
				);
				tr.append("<td>" + data[i].quantity + "</td>");
				tr.append(
					"<td> Rp " +
						(data[i].quantity * data[i].harga)
							.toString()
							.replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
						"</td>"
				);
				$("#table_data").append(tr);
				total += data[i].quantity * data[i].harga;
			}
			var ongkirInt = parseInt(ongkir);
			var biayaTambahanInt = parseInt(biayaTambahan);
			var subTotal = total + ongkirInt + biayaTambahanInt;
			document.getElementById("sub_total").innerHTML =
				"Rp " + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			document.getElementById("ongkir").innerHTML = "Rp " + ongkir.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			document.getElementById("biaya_tambahan").innerHTML = "Rp " + biayaTambahan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById("modal-title-info-pesanan").innerHTML = "Detail Data Pesanan "+id_order;
		},
	});
}

function infoCourier(courier_name,email,phone,foto,wilayah,base_url){
	document.getElementById("courier_name").innerHTML = courier_name;
	document.getElementById("email").innerHTML = email;
	document.getElementById("phone").innerHTML = phone;
	document.getElementById("wilayah").innerHTML = wilayah;
	if(foto == ""){
		document.getElementById("foto_courier").src = base_url +'assets/image_profile/user.png';
	}else{
		document.getElementById("foto_courier").src = base_url +'assets/image_profile/'+foto;
	}
}

function clearTable() {
	$("#table_data tbody").empty();
}

function confirmPesanan(id_order,base_url){
    document.getElementById("btn_confirm").href = base_url + 'order/confirm_order/'+id_order;
}

function seePayment(image_payment,id_order,base_url){
    var image = image_payment;
    if(image != ""){

        document.getElementById("image_payment").src = base_url + 'assets/image_payment/'+image_payment;
        $("#image_payment").show();
        $("#info_payment").hide();
    }else{
        $("#image_payment").hide();
        $("#info_payment").show();
    }
}

function kemasPesanan(id_order,base_url){
	document.getElementById("btn_kemas").href = base_url + 'order/packaging_order/'+id_order;
}

function sendCourier(order_id,base_url,alamat,number){
	document.getElementById("alamat").innerHTML = alamat;
	document.getElementById("id_order").value = order_id;
	document.getElementById("number_order").value = number;
	document.getElementById("form").action = base_url + 'order/sendCourier';
}

function cancelOrder(id,base_url){
	document.getElementById("btn_delete").href = base_url + 'order/cancelOrder/'+id;
}