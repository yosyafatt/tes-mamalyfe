$(function () {
  $(".tambahBtn").on("click", function () {
    const baseurl = $(this).data("baseurl");

    $("#tambahModalLabel").html("Tambah Data Interview Baru");
    $(".modal-footer button[type=submit]").html("Tambahkan");
    $(".modal-body form").attr("action", baseurl + "/home/tambahdata");

    $("#id").val("");
    $("#nama").val("");
    $("#alamat").val("");
    $("#jenisLaki").prop("checked", true);
    $("#agama").val("");
    $("#pekerjaandipilih").val("");
  });

  $(".editBtn").on("click", function () {
    const id = $(this).data("id");
    const baseurl = $(this).data("baseurl");

    $("#tambahModalLabel").html("Edit Data Interview Baru");
    $(".modal-footer button[type=submit]").html("Simpan");
    $(".modal-body form").attr("action", baseurl + "/home/editdata");

    $.ajax({
      url: baseurl + "home/getJson",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id").val(data.id);
        $("#nama").val(data.nama);
        $("#alamat").val(data.alamat);
        // console.log($("#jenisLaki").prop("checked"));
        switch (data.jenis_kelamin) {
          case "Laki-laki":
            $("#jenisLaki").prop("checked", true);
            break;
          case "Perempuan":
            $("#jenisPerempuan").prop("checked", true);
            break;
        }
        $("#agama").val(data.agama);
        $("#pekerjaandipilih").val(data.pekerjaandipilih);
      },
    });
  });

  //   $(".printBtn").on("click", function () {
  //     window.print();
  //   });
});
