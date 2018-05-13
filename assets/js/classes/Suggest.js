class Suggest {

	constructor(el, data) {
/*
		this.el = el

		this.data = data

		this.suggestions_wrapper = dcoument.createElement('div')

		this.el.onblur = () => {
			this.el.style.display = 'none'
		}

		this.el.onkeyup = (event) => {

			let query = event.target.value

			if (query.length > 1) {

				this.buildList(query)

			}

		}
*/
	}
/*
	buildList(query) {

		this.suggestions_wrapper.classList.add('suggestions-wrapper')

		let suggestions = document.createElement('div')
		suggestions.classList.add('suggestions')

		let ul = document.createElement('ul')
		ul.classList.add('list-group')

		for (let i=0; i<this.data.length; i++) {

			let li = document.createElement('li')
			let a = document.createElement('a')
			a.classList.add('list-group-item')
			a.setAttribute('href', '#')

			a.appendChild(document.createTextNode(this.data[i]))

			li.appendChild(a)

			ul.append(li)

		}

		suggestions.appendChild(ul)
		
		this.suggestions_wrapper.appendChild(suggestions)

		const parent = this.el.parentNode

		if (parent.lastChild == this.el) {

			parent.appendChild(this.suggestions_wrapper);

		} else {

			parent.insertBefore(this.suggestions_wrapper, this.el.nextSibling);

		}
	}
*/
}