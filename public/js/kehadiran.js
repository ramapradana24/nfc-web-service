let arrKehadiran = []
let apiPertama = true
moment.locale("id");

function refresh() {
    console.log("Memanggil API..")
    $.ajax({
        url: "/api/absen/" + JADWAL_ID,
        method: "GET",
        success(res) {
            if (res.length > arrKehadiran.length) {
                console.log("Kehadiran baru...")
                arrKehadiran = res
                $("#tableKehadiran tbody").html(
                    '<td colspan="10" class="text-center text-success">' +
                    '<span class="fa fa-spin fa-spinner mr-1" style="font-size: 20px"></span>' +
                    ' Memproses Data...</td>'
                )
                let tableHtml = ""
                arrKehadiran.forEach((e, i) => {
                    tableHtml += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + e.mahasiswa.nim + '</td>' +
                        '<td>' + e.mahasiswa.nama + '</td>' +
                        '<td class="text-center">' + moment(e.created_at).fromNow() + '</td>' +
                        '</tr>'
                });
                $("#tableKehadiran tbody").html(tableHtml)
                $("#totalAbsen").html(arrKehadiran.length + " Mahasiswa")
                //memunculkan notif
                if (!apiPertama) {
                    let kehadiran = arrKehadiran[0]
                    swal({
                        type: 'success',
                        title: 'Absensi Berhasil',
                        text: kehadiran.mahasiswa.nim + " - " + kehadiran.mahasiswa.nama,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                apiPertama = false
            } else if (res.length < arrKehadiran.length) {
                arrKehadiran = res
                $("#tableKehadiran tbody").html(
                    '<td colspan="10" class="text-center text-success">' +
                    '<span class="fa fa-spin fa-spinner mr-1" style="font-size: 20px"></span>' +
                    ' Memproses Data...</td>'
                )
                let tableHtml = ""
                arrKehadiran.forEach((e, i) => {
                    tableHtml += '<tr>' +
                        '<td>' + (i + 1) + '</td>' +
                        '<td>' + e.mahasiswa.nim + '</td>' +
                        '<td>' + e.mahasiswa.nama + '</td>' +
                        '<td class="text-center">' + moment(e.created_at).fromNow() + '</td>' +
                        '</tr>'
                });
                $("#tableKehadiran tbody").html(tableHtml)
                $("#totalAbsen").html(arrKehadiran.length + " Mahasiswa")
            } else if (res.length == 0) {
                $("#tableKehadiran tbody").html(
                    '<td colspan="10" class="text-center">Belum ada yang absensi</td>'
                )
                $("#totalAbsen").html("Tidak Ada")
            }
            apiPertama = false
        }
    })
    return
}

let interval = setInterval(() => {
    refresh()
}, 2000)
