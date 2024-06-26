function changeStatus(url) {
  $.get(
    url,
    function (data) {
      var id = data[0];
      var status = data[1];
      var link = data[2];
      var element = "a#status-" + id;
      var classRemove = "publish";
      var classAdd = "unpublish";
      if (status == 1) {
        classRemove = "unpublish";
        classAdd = "publish";
      }
      $(element).attr("href", "javascript:changeStatus('" + link + "')");
      $(element + " span")
        .removeClass(classRemove)
        .addClass(classAdd);
    },
    "json"
  );
}

function submitForm(url) {
  $("#adminForm").attr("action", url);
  $("#adminForm").submit();
}

function sortList(column, order) {
  $("input[name=filter_column]").val(column);
  $("input[name=filter_column_dir]").val(order);
  $("#adminForm").submit();
}

function changePage(page) {
  $("input[name=filter_page]").val(page);
  $("#adminForm").submit();
}

function changeGroupACP(url) {
  $.get(
    url,
    function (data) {
      var id = data[0];
      var group_acp = data[1];
      var link = data[2];
      var element = "a#group-acp-" + id;
      var classRemove = "publish";
      var classAdd = "unpublish";
      if (group_acp == 1) {
        classRemove = "unpublish";
        classAdd = "publish";
      }
      $(element).attr("href", "javascript:changeGroupACP('" + link + "')");
      $(element + " span")
        .removeClass(classRemove)
        .addClass(classAdd);
    },
    "json"
  );
}

$(document).ready(function () {
  $("input[name=checkall-toggle]").change(function () {
    var checkStatus = this.checked;
    $("#adminForm")
      .find(":checkbox")
      .each(function () {
        this.checked = checkStatus;
      });
  });

  $("#filter-bar button[name=submit-keyword]").click(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar button[name=clear-keyword]").click(function () {
    $("#filter-bar input[name=filter_search]").val("");
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_state]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_group_id]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_khoa_id]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_lop_id]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_hocky_id]").change(function () {
    $("#adminForm").submit();
  });
});
