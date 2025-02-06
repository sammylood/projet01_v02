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
  lightbox.onclick = () => lightbox.className = "hidden";
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
