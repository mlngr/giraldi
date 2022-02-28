const images = document.querySelectorAll('.my-animated-box')
const cursor = document.querySelector('.cursor-1')
const title = document.querySelector('.title')

function moveImage() {
	images.forEach(function (image, i) {
		let x = event.clientX - window.innerWidth/2;
		let y = event.clientY - window.innerHeight/2;
		if (i < 7) {
			image.style = `transform: translate(${-(x * (i+1)/15)}px, ${-(y * (i+1)/15)}px);`
		} else {
			image.style = `transform: translate(${-(x * (i+1)/45)}px, ${-(y * (i+1)/40)}px);`
		}
	})
}

function intro() {
	document.querySelector('.intro').classList.remove('intro');
	window.addEventListener('mousemove', () => moveImage())
	window.addEventListener('mousemove', () => customCursor())
}

function clickImage(id) {
	document.querySelector('body').classList.add('intro')
	window.moveImage = function () {return false}
	images.forEach(function (image, i) {
		image.style = `transform: translate(-50%, -50%);`
	})
	const selectedImage = document.querySelector('.project-'+id)
	selectedImage.classList.add('selected')
}

function custom(event) {
	var el = document.getElementById("hov");
	  el.style.top = event.clientY + "px";
	  el.style.left = event.clientX + "px";
		  }


  
window.addEventListener('mousemove', custom);
window.open('https::/www.google.com', "_blank");
  
window.addEventListener('load', () => setTimeout(() => intro(), 500));