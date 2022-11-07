$(document).ready(function () {
  DataTableUser();
  DataTableArticle();
  DataTableComment();
});

function DataTableUser() {
  var table = $("#table_users").DataTable({
    processing: true,
    serverSide: true,
    ajax: "/datatable?table=user",
    columns: [
      {
        class: "details-control",
        orderable: false,
        data: null,
        defaultContent: "",
      },
      {
        data: "Id",
        class: "user_id",
      },
      {
        data: "Firstname",
        class: "user_firstname",
      },
      {
        data: "Lastname",
        class: "user_lastname",
      },
    ],
    order: [[1, "asc"]],
  });
  // Array to track the ids of the details displayed rows
  var detailRows = [];

  $("#table_users tbody").on("click", "tr td.details-control", function () {
    var tr = $(this).closest("tr");
    var row = table.row(tr);
    var id = row.data().Id;
    window.location.replace("/parametres-edit-user?id=" + id);
  });
  // On each draw, loop over the `detailRows` array and show any child rows
  table.on("draw", function () {
    detailRows.forEach(function (id, i) {
      $("#" + id + " td.details-control").trigger("click");
    });
  });
}

function DataTableArticle() {
  var table = $("#table_articles").DataTable({
    processing: true,
    serverSide: true,
    ajax: "/datatable?table=article",
    columns: [
      {
        class: "details-control",
        orderable: false,
        data: null,
        defaultContent: "",
      },
      {
        data: "Id",
        class: "article_id",
      },
      {
        data: "Slug",
        class: "article_slug",
      },
      // {
      //   data: "Image",
      //   class: "article_img",
      // },
    ],
    order: [[1, "asc"]],
    pageLength: 5,
    // paging: false,
  });
  // Array to track the ids of the details displayed rows
  var detailRows = [];

  $("#table_articles tbody").on("click", "tr td.details-control", function () {
    var tr = $(this).closest("tr");
    var row = table.row(tr);
    var id = row.data().Id;
    // window.location.replace("/article-add?id=" + id);
    window.location.replace("/article-read?id=" + id);
  });
  // On each draw, loop over the `detailRows` array and show any child rows
  table.on("draw", function () {
    detailRows.forEach(function (id, i) {
      $("#" + id + " td.details-control").trigger("click");
    });
  });
}


function DataTableComment() {
  var table = $("#table_comments").DataTable({
    processing: true,
    serverSide: true,
    ajax: "/datatable?table=comment",
    columns: [
      {
        class: "details-control",
        orderable: false,
        data: null,
        defaultContent: "",
      },
      {
        data: "Id",
        class: "user_id",
      },
      {
        data: "Content",
        class: "comment_content",
      },
      {
        data: "Active",
        class: "comment_active",
      },
      {
        class: "signaler",
        orderable: false,
        data: null,
        defaultContent: "",
      },
    ],
    order: [[1, "asc"]],
  });
  // Array to track the ids of the details displayed rows
  var detailRows = [];

  $("#table_comments tbody").on("click", "tr td.details-control", function () {
    var tr = $(this).closest("tr");
    var row = table.row(tr);
    var id = row.data().Id;
    window.location.replace("/commentaire-edition?id=" + id);
  });

  // On each draw, loop over the `detailRows` array and show any child rows
  table.on("draw", function () {
    detailRows.forEach(function (id, i) {
      $("#" + id + " td.details-control").trigger("click");
    });
  });

  $("#table_comments tbody").on("click", "tr td.signaler", function () {
    var tr = $(this).closest("tr");
    var row = table.row(tr);
    var id = row.data().Id;
    window.location.replace("/signaler?id=" + id);
  });
  
  // On each draw, loop over the `detailRows` array and show any child rows
  table.on("draw", function () {
    detailRows.forEach(function (id, i) {
      $("#" + id + " td.signaler").trigger("click");
    });
  });
}