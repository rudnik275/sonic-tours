import Siema from 'siema'
import axios from 'axios'

const sliders = []
document.querySelectorAll('.section_slider_container').forEach(s => {
	sliders.push(s.id)
})

for (const sliderID of sliders){
	const slider = new Siema({
	  selector: '#' + sliderID + ' .section_slider',
	  duration: 300,
	  easing: 'ease-out',
	  perPage: 1,
	  startIndex: 0,
	  draggable: true,
	  multipleDrag: true,
	  threshold: 20,
	  loop: false,
	  rtl: false,

	  onInit(){
	  	const slidesLength = this.innerElements.length
	  	const pagerEl = document.createElement('div')
	  	pagerEl.classList.add('slider_pager')

	 		for (let i=0; i<slidesLength; i++){
	 			const page = document.createElement('span')
	 			if (i === 0){
	 				page.classList.add('active')
	 			}
	 			page.addEventListener('click', () => {
	 				this.goTo(i)
	 			})
	 			pagerEl.append(page)
	 		}

	  	const sliderEl = document.getElementById(sliderID)
	  	sliderEl.append(pagerEl)
	  },

	  onChange(){
	  	const {currentSlide} = this
  		const pagers = document.getElementById(sliderID).querySelectorAll('.slider_pager span')

  		pagers.forEach((slide, index) => {
  			if (index === currentSlide){
  				slide.classList.add('active')
  			} else {
  				slide.classList.remove('active')
  			}
  		})
	  }
	})

	setInterval(() => {
		const {currentSlide} = slider
		const slidesLength = slider.innerElements.length-1

		if (currentSlide === slidesLength){
			slider.goTo(0)
		} else {
			slider.next()
		}
	}, 6000)
}


const addCommentBtns = document.querySelectorAll('.add_comment_btn')
const commentPopupCloseBtns = document.querySelectorAll('.comment_popup_close')
const commentPopup = document.getElementById('comment_popup_form')
const commentPopupSuccessBtn = document.getElementById('comment_popup_success_btn')
const commentPopupSuccess = document.getElementById('comment_popup_success')

function commentPopupVisibility(state){
	if (state){
		commentPopup.classList.remove('hidden')
	} else {
		commentPopup.classList.add('hidden')
	}
}

addCommentBtns.forEach(el => {
	el.addEventListener('click', () => {
		commentPopupVisibility(true)
	})
})

commentPopupCloseBtns.forEach(el => {
	el.addEventListener('click', () => {
		commentPopupVisibility(false)
	})
})

commentPopupSuccessBtn.addEventListener('click', () => {
	commentPopupSuccess.classList.add('hidden')
})

commentPopup.addEventListener('click', (e) => {
	const isPopup = e.target.closest('.comment_popup')
	if (!isPopup){
		commentPopupVisibility(false)
	}
})

window.sendComment = function (e){
	e.preventDefault()
	const form = e.target
	const url = form.action
	const data = new FormData(form)
	const config = {
    headers: { 'content-type': 'multipart/form-data' }
  }
  
  const photos = data.getAll('photos')
  let i = 0
  for (const photo of photos){
  	if (photo.size !== 0){
	  	data.append('image'+i, photo, photo.name)
	  	i++
  	}
  }
	data.delete('photos')

	axios.post(url, data, config)
	  .then(({data}) => {
	  	commentPopupVisibility(false)
	  	form.reset()
	    document.getElementById('comment_popup_response').innerHTML = data
	    commentPopupSuccess.classList.remove('hidden')
	  })
	  .catch(error => {
	    console.log(error)
	  })
}

const reviewImages = document.querySelectorAll('.reviews_photos img')
reviewImages.forEach(img => {
	img.addEventListener('click', () => {
		const src = img.getAttribute('data-big')
		showReviewImagePopup(src)
	})
})

const reviewsImagePopup = document.getElementById('reviews_image_popup')

function showReviewImagePopup(src){
	reviewsImagePopup.classList.remove('hidden')
	reviewsImagePopup.querySelector('img').src = src
}

reviewsImagePopup.querySelector('.reviews_image_popup_close').addEventListener('click', () => {
	reviewsImagePopup.classList.add('hidden')
})

reviewsImagePopup.addEventListener('click', (e) => {
	const isPopup = e.target.closest('.reviews_image_popup')
	if (!isPopup){
		reviewsImagePopup.classList.add('hidden')
	}
})