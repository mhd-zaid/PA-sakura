$(document).ready(function () {
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json",
    },
  });
  DataTableUser();
  DataTableArticle();
  DataTableComment();
  DataTablePage();
  DataTableCategory();
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
        data: "firstname",
        class: "user_firstname",
      },
      {
        data: "lastname",
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
        data: "title",
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
    var slug = row.data().Slug;
    var rewriteUrl = row.data().Rewrite_Url;
    if (rewriteUrl == 1) {
      window.location.replace("/article-add/" + id);
    } else {
      window.location.replace("/article-add/" + slug);
    }
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
        data: "content",
        class: "comment_content",
      },
      {
        data: "active",
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

function DataTablePage() {
  var table = $("#table_pages").DataTable({
    processing: true,
    serverSide: true,
    ajax: "/datatable?table=page",
    columnDefs: [
      {
        orderable: false,
        className: "select-checkbox",
        targets: 0,
      },
    ],
    columns: [
      {
        class: "details-control",
        orderable: false,
        data: null,
        defaultContent: "",
      },
      {
        data: "Id",
        class: "page_id",
      },
      {
        data: "title",
        class: "page_title",
      },
      {
        data: "Date_Created",
        class: "page_date_publi",
      },
      {
        data: "Date_Updated",
        class: "page_date_modif",
      },
      {
        data: "User_Id",
        class: "page_userid",
      },
      {
        data: "active",
        class: "page_active",
      },
    ],
    order: [[1, "asc"]],
  });
  // Array to track the ids of the details displayed rows
  var detailRows = [];

  $("#table_pages tbody").on("click", "tr td.details-control", function () {
    var tr = $(this).closest("tr");
    var row = table.row(tr);
    var id = row.data().Id;
    var slug = row.data().Slug;
    var rewriteUrl = row.data().Rewrite_Url;
    if (rewriteUrl == 1) {
      window.location.replace("/page-add/" + id);
    } else {
      window.location.replace("/page-add/" + slug);
    }
  });
  // On each draw, loop over the `detailRows` array and show any child rows
  table.on("draw", function () {
    detailRows.forEach(function (id, i) {
      $("#" + id + " td.details-control").trigger("click");
    });
  });
}

function DataTableCategory() {
  var table = $("#table_categorys").DataTable({
    processing: true,
    serverSide: true,
    ajax: "/datatable?table=category",
    columns: [
      {
        class: "details-control",
        orderable: false,
        data: null,
        defaultContent: "",
      },
      {
        data: "Id",
        class: "category_id",
      },
      {
        data: "titre",
        class: "category_titre",
      },
    ],
    order: [[1, "asc"]],
  });
  // Array to track the ids of the details displayed rows
  var detailRows = [];

  $("#table_categorys tbody").on("click", "tr td.details-control", function () {
    var tr = $(this).closest("tr");
    var row = table.row(tr);
    var id = row.data().Id;
    window.location.replace("/category-add?id=" + id);
  });

  // On each draw, loop over the `detailRows` array and show any child rows
  table.on("draw", function () {
    detailRows.forEach(function (id, i) {
      $("#" + id + " td.details-control").trigger("click");
    });
  });
}
