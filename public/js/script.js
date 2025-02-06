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


const img = document.querySelector('.preview-image');

function zoom(event) {
  const img = event.target;
  img.style.transformOrigin = event.offsetX + 'px ' + event.offsetY + 'px';  
  img.classList.toggle('zoom');  
}

img.addEventListener('click', zoom);

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
