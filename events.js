"use strict";

window.addEventListener("load", () => {
  let table1 = $("#articlestable").DataTable({
    ajax: {
      url: "data.php?action=list",
      dataSrc: "",
    },
    columns: [
      {
        data: "code",
      },
      {
        data: "description",
      },
      {
        data: "price",
      },
      {
        data: null,
        orderable: false,
      },
      {
        data: null,
        orderable: false,
      },
    ],
    columnDefs: [
      {
        targets: 3,
        defaultContent:
          "<button class='btn btn-sm btn-primary modifybtn'>Modify</button>",
        data: null,
      },
      {
        targets: 4,
        defaultContent:
          "<button class='btn btn-sm btn-primary delbtn'>Delete</button>",
        data: null,
      },
    ],
    /*language: {
      url: "DataTables/english.json",
    },*/
  });

  $("#addBtn").click(function () {
    $("#addConfirm").show();
    $("#modConfirm").hide();
    resetForm();
    $("#artForm").modal("show");
  });

  $("#addConfirm").click(function () {
    $("#artForm").modal("hide");
    let reg = getFormData();
    addReg(reg);
  });

  $("#modConfirm").click(function () {
    $("#artForm").modal("hide");
    let reg = getFormData();
    modReg(reg);
  });

  $("#articlestable tbody").on("click", "button.modifybtn", function () {
    $("#addConfirm").hide();
    $("#modConfirm").show();
    let reg = table1.row($(this).parents("tr")).data();
    getReg(reg.code);
  });

  $("#articlestable tbody").on("click", "button.delbtn", function () {
    if (confirm("¿Delete item?")) {
      let reg = table1.row($(this).parents("tr")).data();
      delReg(reg.code);
    }
  });

  function resetForm() {
    $("#code").val("");
    $("#description").val("");
    $("#price").val("");
  }

  function getFormData() {
    let reg = {
      code: $("#code").val(),
      description: $("#description").val(),
      price: $("#price").val(),
    };
    return reg;
  }

  function addReg(reg) {
    $.ajax({
      type: "POST",
      url: "data.php?action=add",
      data: reg,
      success: function (msg) {
        table1.ajax.reload();
      },
      error: function () {
        alert("Something went wrong");
      },
    });
  }

  function modReg(reg) {
    $.ajax({
      type: "POST",
      url: "data.php?action=mod&code=" + reg.code,
      data: reg,
      success: function (msg) {
        table1.ajax.reload();
      },
      error: function () {
        alert("Something went wrong");
      },
    });
  }

  function getReg(code) {
    $.ajax({
      type: "GET",
      url: "data.php?action=get&code=" + code,
      success: function (data) {
        $("#code").val(data[0].code);
        $("#description").val(data[0].description);
        $("#price").val(data[0].price);
        $("#artForm").modal("show");
      },
      error: function () {
        alert("Something went wrong");
      },
    });
  }

  function delReg(code) {
    $.ajax({
      type: "GET",
      url: "data.php?action=del&code=" + code,
      success: function (msg) {
        table1.ajax.reload();
      },
      error: function () {
        alert("Something went wrong");
      },
    });
  }
});
