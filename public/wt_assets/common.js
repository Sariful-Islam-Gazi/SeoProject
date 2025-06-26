//New Modal Open Close//
function open_modal(self) {
  $(self).addClass("modal_open");
  $("body").addClass("no_scroll");
}
function close_modal(self) {
  $(self).closest(".modal_open").removeClass("modal_open");
  $("body").removeClass("no_scroll");
}

function addLoader() {
  $("body").append("<div style='position: fixed; top: 0; left: 0; right:0; bottom:0; z-index:99999999; display:grid; align-items:center; justify-content:center; background-color:#c0c0c038;' id='loader'><div class='spinner-border text-primary'></div></div>");
}
function removeLoader(ele) {
  $(ele).remove();
}
$(document).on({
  ajaxStart: function () {
    addLoader();
  },
  ajaxStop: function () {
    removeLoader("#loader");
  }
});
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  statusCode: {
    422: function (xhr) {
      let errors = xhr.responseJSON.errors;
      let errorMessage = "<strong>Validation Error:</strong><br>";

      // Loop through errors and concatenate messages
      $.each(errors, function (key, messages) {
        errorMessage += messages.join("<br>") + "<br>";
      });

      // Display in a SweetAlert modal (or replace with another UI alert)
      webinaFire({
        icon: "info",
        title: "Validation Error",
        cancelButton: "Cancel",
        message: errorMessage
      });
    },
    500: function () {
      webinaFire({
        icon: "info",
        title: "Server Error",
        cancelButton: "Cancel",
        message: "Something went wrong on the server."
      });
    }
  }
});


function formatDate(isoDateString) {
  const date = new Date(isoDateString);

  const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  const monthsOfYear = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

  const dayOfWeek = daysOfWeek[date.getUTCDay()];
  const dayOfMonth = date.getUTCDate();
  const month = monthsOfYear[date.getUTCMonth()];
  const year = date.getUTCFullYear();

  // Determine the day suffix
  const suffix = (dayOfMonth % 10 === 1 && dayOfMonth !== 11) ? 'st'
    : (dayOfMonth % 10 === 2 && dayOfMonth !== 12) ? 'nd'
      : (dayOfMonth % 10 === 3 && dayOfMonth !== 13) ? 'rd'
        : 'th';

  return `${dayOfWeek} ${dayOfMonth}${suffix} ${month}, ${year}`;
}


function copyTextData(ele) {
  var copyText = document.getElementById(ele);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}

function time_ago(date) {
  if (typeof date !== 'object') {
    date = new Date(date);
  }
  var seconds = Math.floor((new Date() - date) / 1000);
  var intervalType;
  var interval = Math.floor(seconds / 31536000);
  if (interval >= 1) {
    intervalType = 'year';
  } else {
    interval = Math.floor(seconds / 2592000);
    if (interval >= 1) {
      if (interval == 1) {
        intervalType = "month";
      } else {
        intervalType = "months";
      }
    } else {
      interval = Math.floor(seconds / 86400);
      if (interval >= 1) {
        intervalType = 'days';
      } else {
        interval = Math.floor(seconds / 3600);
        if (interval >= 1) {
          if (interval == 1) {
            intervalType = "hour";
          } else {
            intervalType = "hours";
          }
        } else {
          interval = Math.floor(seconds / 60);
          if (interval >= 1) {
            if (interval == 1) {
              intervalType = "minute";
            } else {
              intervalType = "minutes";
            }
          } else {
            interval = seconds;
            intervalType = "seconds";
          }
        }
      }
    }
  }

  if ((interval < 60) && (intervalType == "second")) {
    return 'just now';
  } else {
    if (interval == 1 && intervalType == "days") {
      return "yesterday";
    }
    return interval + ' ' + intervalType + ' ago';
  }
}
