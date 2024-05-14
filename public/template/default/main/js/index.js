function Validator(formSelector) {
  function getParent(element, selector) {
    while (element.parentElement) {
      if (element.parentElement.matches(selector)) {
        return element.parentElement;
      }
      element = element.parentElement;
    }
  }

  var formRules = {};
  var validatorRules = {
    required: function (value) {
      return value ? undefined : "Vui lòng nhập trường này";
    },
    email: function (value) {
      var regex =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return regex.test(value) ? undefined : "Vui long nhap email";
    },
    min: function (min) {
      return function (value) {
        return value.length >= min
          ? undefined
          : `Vui lòng nhập đủ ${min} kí tự`;
      };
    },
    max: function (max) {
      return function (value) {
        return value <= max ? undefined : `Vui long nhap so nho hon ${max}`;
      };
    },
  };

  var formElement = document.querySelector(formSelector);

  if (formElement) {
    var inputs = formElement.querySelectorAll("[name][rules]");
    for (var input of inputs) {
      var rules = input.getAttribute("rules").split("|");
      // console.log(rules);
      for (var rule of rules) {
        var ruleInfo;
        var isRuleHasValue = rule.includes(":");

        if (isRuleHasValue) {
          ruleInfo = rule.split(":");
          rule = ruleInfo[0];
        }
        var ruleFunc = validatorRules[rule];

        if (isRuleHasValue) {
          ruleFunc = ruleFunc(ruleInfo[1]);
        }

        if (Array.isArray(formRules[input.name])) {
          formRules[input.name].push(ruleFunc);
        } else {
          formRules[input.name] = [ruleFunc];
        }
      }

      input.onblur = handleValidate;
      input.oninput = handleClearError;
    }
    function handleValidate(event) {
      var rules = formRules[event.target.name];
      var errorMessage;

      rules.find(function (rule) {
        errorMessage = rule(event.target.value);
        return errorMessage;
      });

      if (errorMessage) {
        var formGroup = getParent(event.target, ".form-group");
        if (formGroup) {
          formGroup.classList.add("invalid");
          var formMessage = formGroup.querySelector(".form-message");
          if (formMessage) {
            formMessage.innerText = errorMessage;
          }
        }
      }
    }

    function handleClearError(event) {
      var formGroup = getParent(event.target, ".form-group");
      if (formGroup.classList.contains("invalid")) {
        formGroup.classList.remove("invalid");
        var formMessage = formGroup.querySelector(".form-message");
        if (formMessage) {
          formMessage.innerText = "";
        }
      }
    }
  }
}
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
