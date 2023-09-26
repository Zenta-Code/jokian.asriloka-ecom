$(document).ready(function () {
  loadKetentuanData();
  loadFasilitasData();
  function loadKetentuanData() {
    $.ajax({
      url: "ajax/ketentuan.php?action=loadUmum",
      type: "GET",
      dataType: "json",
      success: function (data) {
        var html = "";
        for (var i = 0; i < data.length; i++) {
          html += "<div class='form-check'>";
          html +=
            "<input class='form-check-input' type='checkbox' value='" +
            data[i].id +
            "' id='rule" +
            data[i].id +
            "' name='rule[]'>";
          html +=
            "<label class='form-check-label' for='rule" +
            data[i].id +
            "'>" +
            data[i].description +
            "</label>";
          html += "</div>";
        }
        loadPERUSAHAAN();
        $("#bundling_rule").html(html);
      },
    });
  }
  function loadFasilitasData() {
    $.ajax({
      url: "ajax/fasilitas.php?action=loadUmum",
      type: "GET",
      dataType: "json",
      success: function (data) {
        var html = "";
        for (var i = 0; i < data.length; i++) {
          html += "<div class='form-check'>";
          html +=
            "<input class='form-check-input' type='checkbox' value='" +
            data[i].id +
            "' id='facility" +
            data[i].id +
            "' name='facility[]'>";
          html +=
            "<label class='form-check-label' for='facility" +
            data[i].id +
            "'>" +
            data[i].name +
            "</label>";
          html += "</div>";
        }
        $("#bundling_facility").html(html);
      },
    });
  }

  function loadPERUSAHAAN() {
    $.ajax({
      url: "ajax/bundling.php?action=loadPERUSAHAAN",
      type: "GET",
      dataType: "json",
      success: function (data) {
        console.log(data);
        var html = "";
        var isReady = 0;
        for (var i = 0; i < data.length; i++) {
          html += "<tr>";
          if (data[i].isReady == 1) {
            isReady = 1;
            html +=
              "<td class='text-center'><i class='bi bi-check-circle-fill'></i></td>";
          } else {
            isReady = 0;
            html +=
              "<td class='text-center'><i class='bi bi-x-circle-fill'></i></td>";
          }
          html += "<td>" + data[i].name + "</td>";

          html +=
            "<td class='text-center'> <img class='rounded img-thumbnail' src='./../assets/images/bundling/" +
            data[i].picture +
            "' width='124' height='124'></td>";
          html += "<td>" + data[i].price + "</td>";
          html += "<td><ul>";
          for (var j = 0; j < data[i].rule.length; j++) {
            html += "<li class=''>" + data[i].rule[j].description + "</li>";
          }
          html += "</ul></td>";

          html += "<td><ul>";
          for (var j = 0; j < data[i].facility.length; j++) {
            html +=
              "<li class=''><i class=''></i> " +
              data[i].facility[j].name +
              "</li>";
          }
          html += "</ul></td>";
          html += "<td>";
          html += "<button type='button' class='btn btn-primary me-2' ";
          html +=
            "data-bs-toggle='modal' data-bs-target='#staticBackdropBundlingEdit'";
          html += "data-id='" + data[i].id + "'";
          html += "data-name='" + data[i].name + "'";
          html += "data-price='" + data[i].price + "'";
          html += "data-isReady='" + isReady + "'";
          html += "data-picture='" + data[i].picture + "'";
          html += "data-rule-id='";
          for (var j = 0; j < data[i].rule.length; j++) {
            html += data[i].rule[j].id + ",";
          }
          html += "'";
          html += "data-facility-id='";
          for (var j = 0; j < data[i].facility.length; j++) {
            html += data[i].facility[j].id + ",";
          }
          html += "'";
          html += ">Edit</button>";
          html += "<button type='button' class='btn btn-danger' ";
          html +=
            "data-bs-toggle='modal' data-bs-target='#staticBackdropBundlingHapus'";
          html += "data-id='" + data[i].id + "'";
          html += "data-name='" + data[i].name + "'";
          html += ">Delete</button>";
          html += "</td>";

          html += "</tr>";
        }
        $("#bundling_table").html(html);
      },
    });
  }

  $(document).on(
    "click",
    "button[data-bs-target='#staticBackdropBundlingEdit']",
    function () {
      var name = $(this).data("name");
      var price = $(this).data("price");
      var id = $(this).data("id");
      var facilitiesId = $(this).data("facility-id");
      var rulesId = $(this).data("rule-id");
      console.log(isReady);
      $("#edit_id").val(id);
      $("#edit_nama").val(name);
      $("#edit_price").val(price);
      if (isReady == 1) {
        $("#edit_isReady").html(
          "<label class='form-check-label' for='edit_isReady'>No / Ready</label> <input class='form-check-input' type='checkbox' value='1' id='edit_isReady' name='edit_isReady' checked>"
        );
      } else {
        $("#edit_isReady").html(
          "<label class='form-check-label' for='edit_isReady'>No / Ready</label> <input class='form-check-input' type='checkbox' value='1' id='edit_isReady' name='edit_isReady'>"
        );
      }

      $.ajax({
        url: "ajax/fasilitas.php?action=loadUmum",
        type: "GET",
        dataType: "json",
        success: function (data) {
          var html = "";
          for (var i = 0; i < data.length; i++) {
            html += "<div class='form-check'>";
            html +=
              "<input class='form-check-input' type='checkbox' value='" +
              data[i].id +
              "' id='edit_facility" +
              data[i].id +
              "' name='edit_facility[]'";
            if (facilitiesId.includes(data[i].id)) {
              html += "checked";
            }
            html += ">";
            html +=
              "<label class='form-check-label' for='edit_facility" +
              data[i].id +
              "'>" +
              data[i].name +
              "</label>";
            html += "</div>";
          }
          $("#edit_room_facility").html(html);
        },
      });
      // get list rules and check the selected one
      $.ajax({
        url: "ajax/ketentuan.php?action=loadUmum",
        type: "GET",
        dataType: "json",
        success: function (data) {
          var html = "";
          for (var i = 0; i < data.length; i++) {
            html += "<div class='form-check'>";
            html +=
              "<input class='form-check-input' type='checkbox' value='" +
              data[i].id +
              "' id='edit_rule" +
              data[i].id +
              "' name='edit_rule[]'";
            if (rulesId.includes(data[i].id)) {
              html += "checked";
            }
            html += ">";
            html +=
              "<label class='form-check-label' for='edit_rule" +
              data[i].id +
              "'>" +
              data[i].description +
              "</label>";
            html += "</div>";
          }
          $("#edit_room_rule").html(html);
        },
      });
    }
  );

  $(document).on(
    "click",
    "button[data-bs-target='#staticBackdropBundlingHapus']",
    function () {
      var name = $(this).data("name");
      var id = $(this).data("id");
      $("#hapus_id").val(id);
      $("#hapus_nama").text(name);
    }
  );

  $("#tambahBundlingPERUSAHAAN").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    console.log(formData);
    var selectedKetentuan = [];
    $("input[name='rule[]']:checked").each(function () {
      selectedKetentuan.push($(this).val());
    });

    var selectedFasilitas = [];
    $("input[name='facility[]']:checked").each(function () {
      selectedFasilitas.push($(this).val());
    });
    if (selectedKetentuan.length > 0) {
      formData.append("selected_ketentuan", selectedKetentuan);
    }

    if (selectedFasilitas.length > 0) {
      formData.append("selected_fasilitas", selectedFasilitas);
    }
    $.ajax({
      url: "ajax/bundling.php?action=tambahBundlingPERUSAHAAN",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        $("#tambahBundlingPERUSAHAAN")[0].reset();
        loadPERUSAHAAN();
      },
    });
  });

  $("#editBundling").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    var selectedKetentuan = [];
    $("input[name='edit_rule[]']:checked").each(function () {
      selectedKetentuan.push($(this).val());
    });

    var selectedFasilitas = [];
    $("input[name='edit_facility[]']:checked").each(function () {
      selectedFasilitas.push($(this).val());
    });
    var selectedCapacity = $("input[name='edit_capacity']:checked").val();
    if (selectedKetentuan.length > 0) {
      formData.append("selected_ketentuan", selectedKetentuan);
    }

    if (selectedFasilitas.length > 0) {
      formData.append("selected_fasilitas", selectedFasilitas);
    }

    if (selectedCapacity !== undefined) {
      formData.append("selected_capacity", selectedCapacity);
    }

    console.log(formData.get("edit_image")["name"]);

    if (formData.get("edit_image")["name"] != "") {
      $.ajax({
        url: "ajax/bundling.php?action=editBundlingPERUSAHAAN",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(response);
          loadPERUSAHAAN();
          $("#editBundling")[0].reset();
        },
      });
    } else {
      return "Image is empty";
    }
  });

  $("#hapusBundling").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "ajax/bundling.php?action=hapusBundlingPERUSAHAAN",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        loadPERUSAHAAN();
      },
    });
  });
});
