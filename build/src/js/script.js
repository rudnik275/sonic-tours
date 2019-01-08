import Siema from 'siema'

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