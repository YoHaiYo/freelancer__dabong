var pageHash = URLParser(window.location.href).getHash();
if ($(".section").children().is(".sub-tabs-list")) {
  $(document).on("click", ".sub-tabs-list ul li a", function (e) {
    e.preventDefault();
    $(this).parent().parent().find("li").removeClass("active");
    $(this).parent().addClass("active");
    $(".tabContent").removeClass("active");
    $(".tabContent#" + $(this).parent().data("id")).addClass("active");
    history.pushState(null, null, "#" + $(this).parent().data("id"));
    $(".location-inner ul li:last-child")
      .children()
      .html(
        $(this)
          .html()
          .replace(/(<([^>]+)>)/gi, "")
      );
    if (typeof initTabFunc == "function") {
      initTabFunc($(this).parent().data("id"));
    }
  });

  $(".sidebar-fixed>a").click(function (e) {
    //e.preventDefault();
    var thisHref = $(this).attr("href");
    if ($(this)[0].pathname == window.location.pathname) {
      $("[data-id=" + URLParser(thisHref).getHash() + "]")
        .find("a")
        .click();
    }
  });
  if (pageHash) {
    $("[data-id=" + pageHash + "]")
      .find("a")
      .click();
  } /*else{
        $('.sub-tabs-list ul li').eq(0).addClass('active');
        $('.sub-tabs-content .tabContent').eq(0).addClass('active');
    }*/
}
$(function () {
  $("#open-menus").on("click", function () {
    $("body").removeClass("submenu-on");
    $(
      ".navbar .main-nav,body .navbar .banner-right,body .navbar .banner-bg"
    ).removeAttr("style");
    if ($("body").hasClass("navbar-open")) {
      TweenLite.fromTo(
        ".sub-nav",
        0.2,
        { y: "0%" },
        {
          y: "-100%",
          ease: Power2.easeOut,
          onComplete: function () {},
        }
      );
      setTimeout(function () {
        $("body").removeClass("navbar-open");
        $(".navbar .main-nav").addClass("menu-over");
      }, 120);
    } else {
      $("body").addClass("navbar-open");
      $(".navbar .main-nav").removeClass("menu-over");
      TweenLite.fromTo(
        ".sub-nav",
        0.5,
        { y: "-100%" },
        {
          y: "0%",
          ease: Power2.easeOut,
          onComplete: function () {},
        }
      );
    }
  });
  var tweenMenu = new TimelineMax();
  var menuOpen = false;
  $(document).on(
    "mouseenter",
    ".navbar .main-nav.menu-over .menus",
    function () {
      $("body").addClass("submenu-on");
      if (menuOpen == false) {
        tweenMenu.clear();
        // sshwork : 0초 실행,ease 제거
        tweenMenu.to(".navbar", 0.0, { backgroundColor: "#fff" }, "on-step1");
        tweenMenu.fromTo(
          "body.submenu-on .navbar .main-nav .menus>ul>li>.sub-menus",
          0.5,
          { height: 0 },
          { height: 230, ease: Power2.easeOut },
          "on-step1"
        );
        tweenMenu.fromTo(
          "body.submenu-on .navbar .main-nav .banner-right",
          0.5,
          { height: 0 },
          { height: 200, ease: Power2.easeOut },
          "on-step1"
        );
        tweenMenu.fromTo(
          "body.submenu-on .navbar .main-nav .navbar-bg",
          0.5,
          { height: 0 },
          { height: 280, ease: Power2.easeOut },
          "on-step1"
        );
      }
      menuOpen = true;
    }
  );
  // sshwork
  $(document).on("mouseleave", ".navbar", function () {
    tweenMenu.clear();
    tweenMenu.to(
      "body.submenu-on .navbar .main-nav .menus>ul>li>.sub-menus",
      0.5,
      { height: 0, ease: Power2.easeOut },
      "step1"
    );
    tweenMenu.to(
      "body.submenu-on .navbar .main-nav .banner-right",
      0.5,
      { height: 0, ease: Power2.easeOut },
      "step1"
    );
    tweenMenu.to(
      "body.submenu-on .navbar .main-nav .navbar-bg",
      0.5,
      {
        height: 0,
        ease: Power2.easeOut,
        onComplete: function () {
          $("body").removeClass("submenu-on");
        },
      },
      "step1"
    );
    // sshwork
    tweenMenu.to(
      ".navbar",
      0.5,
      { backgroundColor: "transparent", ease: Power2.easeOut },
      "step1"
    );
    menuOpen = false;
  });
  $("body .navbar .main-nav .menus>ul>li>.sub-menus").hover(
    function () {
      $(this).parent().addClass("hover");
    },
    function () {
      $(this).parent().removeClass("hover");
    }
  );

  var scrolltop = 0;
  // jQuery for page scrolling feature - requires jQuery Easing plugin
  $("a.page-scroll").on("click", function (event) {
    var $anchor = $(this);
    var scrollVar = 0;
    if (typeof $anchor.data("scrolltop") == "number") {
      scrolltop = $anchor.data("scrolltop");
    }

    //scrollVar =  ($($anchor.attr('href')).offset().top - scrolltop);

    if ($anchor.attr("href") != "#top") {
      scrollVar = $($anchor.attr("href")).offset().top - scrolltop;
    }
    $("html, body").stop().animate(
      {
        scrollTop: scrollVar,
      },
      768,
      "easeInOutExpo"
    );
    event.preventDefault();
  });
  $(window).scroll(function () {
    sidebarFix();
  });

  $(window).resize(function () {
    sidebarFix();
  });
  function sidebarFix() {
    var scltop = $(window).scrollTop();
    if ($(".sidebar").is(":visible")) {
      var sclele = $(".sidebar");
      sclele.addClass("fixed");
      var sideTop = $(".sub-page #headers .location .location-inner").offset()
        .top;
      sclele.css("top", sideTop + 24);
    }

    /*
        var topEleHeight = $('.sub-page #headers').outerHeight();
        var center= $(window).outerHeight()/2;
		
        if(topEleHeight+(sclele.outerHeight()/2)>=(center+scltop)){
        	sclele.removeClass('fixed');
        }else{
        	sclele.addClass('fixed');
        }
        */
  }
  $(".form-control")
    .on("focus", function () {
      $(this).parents(".form-group").removeClass("is-filled");
      $(this).parents(".form-group").addClass("is-focused");
    })
    .on("blur", function () {
      $(this).parents(".form-group").removeClass("is-focused");
      if ($(this).val() != "") {
        $(this).parents(".form-group").addClass("is-filled");
      }
    });
  $(".select-picker").selectpicker();
  $(document).on("change", "[type=file]", function () {
    var fileExtension = {
      image: ["jpeg", "jpg", "png", "gif"],
      media: ["mp4", "mp3", "mov"],
      text: [
        "jpg",
        "png",
        "ppt",
        "pptx",
        "xlsx",
        "xls",
        "hwp",
        "txt",
        "doc",
        "pdf",
        "docx",
      ],
    };
    var fileMaxSize = {
      image: 1024 * 1024 * 20,
      media: 1024 * 1024 * 100,
      text: 1024 * 1024 * 1,
    };
    var alertfile = "";
    alertfile = $.validator.messages.extension;
    var maxfilesize = $.validator.messages.maxfilesize;
    if (!maxfilesize) {
      maxfilesize = "The file size is too large.";
    }
    var acceptName = "";
    if ($(this).attr("accept")) {
      acceptName = $(this).attr("accept");
    }
    if ($(this).val() != "" && acceptName.indexOf("image/") != -1) {
      if (
        $.inArray(
          $(this).val().split(".").pop().toLowerCase(),
          fileExtension["image"]
        ) == -1
      ) {
        alert(alertfile + " : " + fileExtension["image"].join(", "));
        $(this).val("");
        return false;
      } else {
        if (!checkImgSize($(this), fileMaxSize["image"])) {
          alert("1" + maxfilesize);
          $(this).val("");
          return false;
        }
      }
    } else if (acceptName.indexOf("video/") != -1) {
      if (
        $(this).val() != "" &&
        $.inArray(
          $(this).val().split(".").pop().toLowerCase(),
          fileExtension["media"]
        ) == -1
      ) {
        alert(alertfile + " : " + fileExtension["media"].join(", "));
        $(this).val("");
        return false;
      } else {
        if (!checkImgSize($(this), fileMaxSize["media"])) {
          alert(maxfilesize);
          $(this).val("");
          return false;
        }
      }
    } else {
      if (
        $(this).val() != "" &&
        $.inArray(
          $(this).val().split(".").pop().toLowerCase(),
          fileExtension["text"]
        ) == -1
      ) {
        alert(alertfile + " : " + fileExtension["text"].join(", "));
        $(this).val("");
        return false;
      } else {
        if (!checkImgSize($(this), fileMaxSize["text"])) {
          alert(maxfilesize);
          $(this).val("");
          return false;
        }
      }
    }
  });
  if ($("#headers .row").hasClass("aside")) {
    $("#headers .aside").sticky({ topSpacing: 0 });
  }
  $(document).on("click", ".custom-radio", function () {
    $(this).children("input").prop("checked", true);
  });
  $(document).on("click", ".brief-popup", function () {
    $("#briefPopup").modal("show");
  });
  if (pageHash == "brief") {
    $("#briefPopup").modal("show");
  }
  var $briefSlick = $(".brief-cont");
  $("#briefPopup").on("shown.bs.modal", function () {
    $(".brief-pagination ul li").on("click", function (event) {
      $(".brief-pagination ul li").removeClass("on");
      $(this).addClass("on");
      $(".brief-cont").slick("slickGoTo", $(this).data("brief-page"));
    });

    $briefSlick
      .on("init", function () {
        mouseWheel($briefSlick);
      })
      .slick({
        dots: false,
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: "",
        arrows: false,
        autoplay: false,
        touchMove: false,
      });
    $(".brief-cont").on(
      "beforeChange",
      function (event, slick, currentSlide, nextSlide) {
        $(".modal.brief .modal-content .modal-body .modal-body-cont").attr(
          "id",
          "item" + nextSlide
        );
        $(".brief-pagination ul li").removeClass("on");
        $(".brief-pagination ul li").eq(nextSlide).addClass("on");
      }
    );
    $(".brief-cont").slick("slickGoTo", 0);

    $(".brief-page-2 .tab li").on("click", function () {
      $(".brief-page-2 .tab li").removeClass("active");
      $(this).addClass("active");
      $(".brief-page-2 .cont-right .tab-content").removeClass("active");
      $(
        ".brief-page-2 .cont-right .tab-content#" + $(this).data("tab")
      ).addClass("active");
      $(".brief-page-2 .trans").removeClass("active");
      $(".brief-page-2 .trans#" + $(this).data("tab")).addClass("active");
    });
    var caronum = 0;
    $(".brief-page-7 .caro-arrow .caro-left").on("click", function () {
      if (caronum == 0) {
        $(".brief-page-7 .cont-right .caro-item").eq(0).hide();
        $(".brief-page-7 .cont-right .caro-item").eq(1).show();
        caronum = 1;
      } else {
        $(".brief-page-7 .cont-right .caro-item").eq(1).hide();
        $(".brief-page-7 .cont-right .caro-item").eq(0).show();
        caronum = 0;
      }
    });
    $(".brief-page-7 .caro-arrow .caro-right").on("click", function () {
      if (caronum == 0) {
        $(".brief-page-7 .cont-right .caro-item").eq(0).hide();
        $(".brief-page-7 .cont-right .caro-item").eq(1).show();
        caronum = 1;
      } else {
        $(".brief-page-7 .cont-right .caro-item").eq(1).hide();
        $(".brief-page-7 .cont-right .caro-item").eq(0).show();
        caronum = 0;
      }
    });
  });
  $("#briefPopup").on("hidden.bs.modal", function () {
    $(".brief-pagination ul li").off("click");
  });

  function mouseWheel($briefSlick) {
    $briefSlick.on(
      "mousewheel",
      $.debounce(0, function (event, delta) {
        event.preventDefault();
        if (delta < 0) {
          $briefSlick.slick("slickNext");
        }
        if (delta > 0) {
          $briefSlick.slick("slickPrev");
        }
      })
    );
  }

  $(document).on("click", ".subnav-inner ul li dl dd .menu-sub a", function () {
    var href = $(this).attr("href");
    if (href.indexOf(location.pathname) > -1) {
      window.location.hash = "#" + URLParser(href).getHash();
      location.reload();
    }
  });
});

function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

function setFormValidation(id) {
  $(id).validate({
    highlight: function (element) {
      $(element)
        .closest(".form-group")
        .removeClass("has-success")
        .addClass("has-danger");
      $(element)
        .closest(".form-check")
        .removeClass("has-success")
        .addClass("has-danger");
    },
    success: function (element) {
      $(element)
        .closest(".form-group")
        .removeClass("has-danger")
        .addClass("has-success");
      $(element)
        .closest(".form-check")
        .removeClass("has-danger")
        .addClass("has-success");
      $(element).removeClass("inp-error");
    },
    errorPlacement: function (error, element) {
      $(element).closest(".form-group").append(error);
    },
  });
}

function getAllUrlParams(url) {
  // get query string from url (optional) or window
  var queryString = url ? url.split("?")[1] : window.location.search.slice(1);

  // we'll store the parameters here
  var obj = {};

  // if query string exists
  if (queryString) {
    // stuff after # is not part of query string, so get rid of it
    queryString = queryString.split("#")[0];

    // split our query string into its component parts
    var arr = queryString.split("&");

    for (var i = 0; i < arr.length; i++) {
      // separate the keys and the values
      var a = arr[i].split("=");

      // set parameter name and value (use 'true' if empty)
      var paramName = a[0];
      var paramValue = typeof a[1] === "undefined" ? true : a[1];

      // (optional) keep case consistent
      paramName = paramName.toLowerCase();
      if (typeof paramValue === "string") paramValue = paramValue.toLowerCase();

      // if the paramName ends with square brackets, e.g. colors[] or colors[2]
      if (paramName.match(/\[(\d+)?\]$/)) {
        // create key if it doesn't exist
        var key = paramName.replace(/\[(\d+)?\]/, "");
        if (!obj[key]) obj[key] = [];

        // if it's an indexed array e.g. colors[2]
        if (paramName.match(/\[\d+\]$/)) {
          // get the index value and add the entry at the appropriate position
          var index = /\[(\d+)\]/.exec(paramName)[1];
          obj[key][index] = paramValue;
        } else {
          // otherwise add the value to the end of the array
          obj[key].push(paramValue);
        }
      } else {
        // we're dealing with a string
        if (!obj[paramName]) {
          // if it doesn't exist, create property
          obj[paramName] = paramValue;
        } else if (obj[paramName] && typeof obj[paramName] === "string") {
          // if property does exist and it's a string, convert it to an array
          obj[paramName] = [obj[paramName]];
          obj[paramName].push(paramValue);
        } else {
          // otherwise add the property
          obj[paramName].push(paramValue);
        }
      }
    }
  }

  return obj;
}

/*
document.write("Host: " + URLParser(url).getHost() + '<br>');
document.write("Path: " + URLParser(url).getPath() + '<br>');
document.write("Query: " + URLParser(url).getQuery() + '<br>');
document.write("Hash: " + URLParser(url).getHash() + '<br>');
document.write("Params Array: " + URLParser(url).getParams() + '<br>');
document.write("Param: " + URLParser(url).getParam('myparam1') + '<br>');
document.write("Has Param: " + URLParser(url).hasParam('myparam1') + '<br>');

// Remove the first parameter
url = URLParser(url).removeParam('myparam1');
document.write(url + ' - Remove the first parameter<br>');

// Add a third parameter
url = URLParser(url).setParam('myparam3',3);
document.write(url + ' - Add a third parameter<br>');

// Remove the second parameter
url = URLParser(url).removeParam('myparam2');
document.write(url + ' - Remove the second parameter<br>');

// Add a hash
url = URLParser(url).setHash('newhash');
document.write(url + ' - Set Hash<br>');

// Remove the last parameter
url = URLParser(url).removeParam('myparam3');
document.write(url + ' - Remove the last parameter<br>');

// Remove a parameter that doesn't exist
url = URLParser(url).removeParam('myparam3');
document.write(url + ' - Remove a parameter that doesn\"t exist<br>');
 */

function URLParser(u) {
  var path = "",
    query = "",
    hash = "",
    params;
  if (u.indexOf("#") > 0) {
    hash = u.substr(u.indexOf("#") + 1);
    u = u.substr(0, u.indexOf("#"));
  }
  if (u.indexOf("?") > 0) {
    path = u.substr(0, u.indexOf("?"));
    query = u.substr(u.indexOf("?") + 1);
    params = query.split("&");
  } else path = u;
  return {
    getHost: function () {
      var hostexp = /\/\/([\w.-]*)/;
      var match = hostexp.exec(path);
      if (match != null && match.length > 1) return match[1];
      return "";
    },
    getPath: function () {
      var pathexp = /\/\/[\w.-]*(?:\/([^?]*))/;
      var match = pathexp.exec(path);
      if (match != null && match.length > 1) return match[1];
      return "";
    },
    getHash: function () {
      return hash;
    },
    getParams: function () {
      return params;
    },
    getQuery: function () {
      return query;
    },
    setHash: function (value) {
      if (query.length > 0) query = "?" + query;
      if (value.length > 0) query = query + "#" + value;
      return path + query;
    },
    setParam: function (name, value) {
      if (!params) {
        params = new Array();
      }
      params.push(name + "=" + value);
      for (var i = 0; i < params.length; i++) {
        if (query.length > 0) query += "&";
        query += params[i];
      }
      if (query.length > 0) query = "?" + query;
      if (hash.length > 0) query = query + "#" + hash;
      return path + query;
    },
    getParam: function (name) {
      if (params) {
        for (var i = 0; i < params.length; i++) {
          var pair = params[i].split("=");
          if (decodeURIComponent(pair[0]) == name)
            return decodeURIComponent(pair[1]);
        }
      }
      console.log("Query variable %s not found", name);
    },
    hasParam: function (name) {
      if (params) {
        for (var i = 0; i < params.length; i++) {
          var pair = params[i].split("=");
          if (decodeURIComponent(pair[0]) == name) return true;
        }
      }
      console.log("Query variable %s not found", name);
    },
    removeParam: function (name) {
      query = "";
      if (params) {
        var newparams = new Array();
        for (var i = 0; i < params.length; i++) {
          var pair = params[i].split("=");
          if (decodeURIComponent(pair[0]) != name) newparams.push(params[i]);
        }
        params = newparams;
        for (var i = 0; i < params.length; i++) {
          if (query.length > 0) query += "&";
          query += params[i];
        }
      }
      if (query.length > 0) query = "?" + query;
      if (hash.length > 0) query = query + "#" + hash;
      return path + query;
    },
  };
}

function checkImgSize(obj, size) {
  var check = false;
  var sizeinbytes = 0;
  if (window.ActiveXObject) {
    var fso = new ActiveXObject("Scripting.FileSystemObject");
    var filepath = obj[0].value;
    var thefile = fso.getFile(filepath);
    sizeinbytes = thefile.size;
  } else {
    sizeinbytes = obj[0].files[0].size;
  }
  var fSExt = new Array("Bytes", "KB", "MB", "GB");
  var i = 0;
  var checkSize = size;
  while (checkSize > 900) {
    checkSize /= 1024;
    i++;
  }
  checkSize = Math.round(checkSize * 100) / 100 + " " + fSExt[i];
  var fSize = sizeinbytes;
  if (fSize > size) {
    check = false;
  } else {
    check = true;
  }
  return check;
}

function strip_tags(input, allowed) {
  allowed = (
    ((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []
  ).join(""); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
    commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
  return input.replace(commentsAndPhpTags, "").replace(tags, function ($0, $1) {
    return allowed.indexOf("<" + $1.toLowerCase() + ">") > -1 ? $0 : "";
  });
}

function setCookie(name, value, expirehours) {
  console.log(name);
  var todayDate = new Date();
  todayDate.setHours(todayDate.getHours() + expirehours);
  document.cookie =
    name +
    "=" +
    escape(value) +
    "; path=/; expires=" +
    todayDate.toGMTString() +
    ";";
}
function getCookie(name) {
  var nameOfCookie = name + "=";
  var x = 0;
  while (x <= document.cookie.length) {
    var y = x + nameOfCookie.length;
    if (document.cookie.substring(x, y) == nameOfCookie) {
      if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
        endOfCookie = document.cookie.length;
      return unescape(document.cookie.substring(y, endOfCookie));
    }
    x = document.cookie.indexOf(" ", x) + 1;
    if (x == 0) break;
  }
  return "";
}

$(function () {
  $("#content03 dl").click(function () {
    $(this).siblings().toggleClass("on");
    $(this).toggleClass("on");
  });
  $("#content03 .content03-btn").click(function () {
    $(this).siblings().toggleClass("on");
    $(this).toggleClass("on");
  });
});
