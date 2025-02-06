function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  const generateBreadcrumbs = (pathname) => {
  const pathNames = pathname.split("/").filter((path) => path);
  const breadcrumbs = pathNames.map((item, i) => {
    const href = `/${pathNames.slice(0, i + 1).join("/")}`;
    const anchor = `${item.replaceAll("-", " ")}`;
    return {
      href,
      anchor,
    };
  });

  breadcrumbs.unshift({ href: "/", anchor: "Home" });

  return breadcrumbs;
};


window.onload = () => {
  // (A) GET LIGHTBOX & ALL .ZOOMD IMAGES
  let all = document.getElementsByClassName("zoomD"),
      lightbox = document.getElementById("lightbox");
 
  // (B) CLICK TO SHOW IMAGE IN LIGHTBOX
  // * SIMPLY CLONE INTO LIGHTBOX & SHOW
  if (all.length>0) { for (let i of all) {
    i.onclick = () => {
      let clone = i.cloneNode();
      clone.className = "";
      lightbox.innerHTML = "";
      lightbox.appendChild(clone);
      lightbox.className = "show";
    };
  }}
 
  // (C) CLICK TO CLOSE LIGHTBOX
  lightbox.onclick = () => lightbox.className = " ";
};



/*
console.log(generateBreadcrumbs('/nike/shoes/sports/red'))
[
  { href: '/', anchor: 'Home' },
  { href: '/nike', anchor: 'nike' },
  { href: '/nike/shoes', anchor: 'shoes' },
  { href: '/nike/shoes/sports', anchor: 'sports' },
  { href: '/nike/shoes/sports/red', anchor: 'red' }
]
*/
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = document.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}